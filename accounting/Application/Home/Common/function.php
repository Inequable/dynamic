<?php 
/**
 * 重写var_dump函数
 * @param  mixed $data 混合数据，数组，字符串都行
 * @return print       打印输出
 */
function d_dump($data){
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
}

/**
 * 打印输出sql语句，需要传入模型对象
 * @param  object $model 模型
 * @return string      SQL语句
 */
function printSQL($model){
	echo $model->_sql();
}

/**
 * 数据导出与下载模板
 * @param  array      $titles   标题行名称
 * @param  array      $datas    导出数据
 * @param  string     $fileName 文件名,默认为test.xlsx
 * @return [type]               [description]
 */
function exportExcel($titles=array(), $datas=array(), $fileName = 'test'){
	vendor("PHPExcel.PHPExcel");
	// $PHPReader=new \PHPExcel_Reader_Excel2007();
	$obj = new PHPExcel();  
	// return $obj;

	//横向单元格标识  
	$cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');
	$obj->getActiveSheet(0)->setTitle($fileName);   //设置sheet名称
	$_row = 1;   //设置纵向单元格标识  
	if($titles){
		$i = 0;  
		foreach($titles as $v){   //设置列标题  
			$obj->setActiveSheetIndex(0)->setCellValue($cellName[$i].$_row, $v)->getStyle($cellName[$i].$_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$obj->getActiveSheet()->getColumnDimension($cellName[$i])->setWidth(15);
			$i++;  
		}  
		$_row++;  
	}
	// 判断是否数据不为空并填写数据
	if($datas){  
		$i = 0;  
		foreach($datas as $_v){  
			$j = 0;  
			foreach($_v as $_cell){  
				$obj->getActiveSheet()->setCellValue($cellName[$j].($i+$_row), $_cell)->getStyle($cellName[$j].($i+$_row))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setWrapText(true)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$j++;  
			}  
			$i++;  
		}  
	}
	
	$obj->getActiveSheet()->freezePane('A2');// 设置第一行不滚动
	// 设置默认第一行高度
	$obj->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
	ob_end_clean();//清除缓冲区,避免乱码 
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8;');
	header('Content-Disposition: attachment;filename="'.$fileName.'.xlsx"');
	header('Cache-Control: max-age=0');
	$objWriter = new PHPExcel_Writer_Excel2007($obj);
	$objWriter->save('php://output');
	return true;
}

/**
 * 根据layui框架设计的json相应格式
 * @param  integer $code  0成功，-1失败
 * @param  integer $count 数据总数
 * @param  array   $data  数据
 * @param  string  $msg   信息
 * @return json         返回json数据
 */
function jsonResponseFormat($code=0,$count=0,$data=array(),$msg=''){
	$json=json_encode(array(
		"code"=>$code,
		"msg"=>$msg,//JSON数据返回错误(;´༎ຶД༎ຶ`)
		"count"=>$count,
		"data"=>$data,//利用layui默认参数page，将page接收进行分页
	),JSON_UNESCAPED_UNICODE);//将数据转换成数组字符串
	$json=json_decode($json);//读取时，在转码回json数据，进行返回
	return $json;
}

/**
 * 修改tp3.2.3的原get_client_ip函数，总感觉有问题
 * @param  integer $type [description]
 * @return [type]        [description]
 */
function getIP($type = 0) {
	$type = $type ? 1 : 0;
	static $ip = NULL;
	if ($ip !== NULL) return $ip[$type];
	if($_SERVER['HTTP_X_REAL_IP']){//nginx 代理模式下，获取客户端真实IP
		$ip=$_SERVER['HTTP_X_REAL_IP'];     
	}elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {//客户端的ip
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {//浏览当前页面的用户计算机的网关
		$arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
		$pos = array_search('unknown',$arr);
		if(false !== $pos) unset($arr[$pos]);
		$ip = trim($arr[0]);
	}elseif (isset($_SERVER['REMOTE_ADDR'])) {
		$ip = $_SERVER['REMOTE_ADDR'];//浏览当前页面的用户计算机的ip地址
	}else{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	// IP地址合法验证
	$long = sprintf("%u",ip2long($ip));
	$ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
	return $ip[$type];
}