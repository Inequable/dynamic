<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;

/**
 * 因为项目有点小，所以所有的控制器方法都在这个控制器了
 * ps：懒得分类管理了，但是还能按照类别看出那一部分是那一部分的
 */

class IndexController extends Controller {
	/**
	 * 登录方法
	 * @return [type] [description]
	 */
	public function login(){
		if (IS_POST) {
			$username = I('post.username');
			$password = I('post.password');
			$code = I('post.code');
			$m_user = D('User');
			$login_info = $m_user->checkNM($username,$password);
			$verify = new Verify();
			if ( $login_info && ($verify->check($code)) ) {
				session('username',md5($login_info['username'].'DI'));
				session('user',$login_info['username']);
				session('ID',md5($login_info['Id'].'Y'));
				$this->redirect('Index:index');
			}else{
				$this->error('Login failed, after 3 seconds to jump back to the login page!',U('Index/login'),3);
			}
		}
		$this->display();
	}

	/**
	 * 验证码方法
	 * @return [type] [description]
	 */
	public function verifyImg(){
		$config = array(
				'imageH' 	=> 38, 
				'imageW' 	=> 80,
				'fontSize'	=> 12,
				'fontttf'	=> '4.ttf',
				'length'	=> 4,
			);
		$verifyImg = new Verify($config);
		$verifyImg -> entry();//输出验证码
	}

	/**
	 * 登出方法，清除session
	 * 注：有一个需要注意的，跳转信息需要编码后发出，否则会乱码
	 * @return [type] [description]
	 */
	public function logout(){
		session_unset();
		session_destroy();
		$this->redirect('Index:login',array(),3,'You have been safe to leave the system and return to the login page in 3 seconds!');
	}

	/**
	 * 记账后台主页
	 * @return [type] [description]
	 */
	public function index(){
		if (session('?username')) {
			$user=session('user');
			$m_Classify=D('Classify');
			$list=$m_Classify->field('cols')->where("cols_user='$user' ")->select();
			$this->assign('list',$list);
			$this->display();
		}else{
			$this->redirect('Index/login',array(),3,'You are not logged in, can not log in to other pages with the address bar, and return to the login page after 3 seconds！');
		}
	}

	/**
	 * 分类管理部分
	 * 添加分类的方法/列表显示
	 * @return [type] [description]
	 * ps：这个方法中虽然可以批量与单条插入，但是缺点是，没有经过后台的数据校验
	 * 所以校验这部分要在前端做好
	 */
	public function sortManagement(){
		$m_column = D('Classify');
		if (IS_POST) {
			//获取到的字段全是二维数组
			$cols[] = I('post.cols');
			$cols_account[] = I('post.cols_account');
			$cols_info[] = I('post.cols_info');
			for ($i=0; $i < count($cols[0]); $i++) { 
				$dataList = array('cols_user'=>session('user'),'cols'=>$cols[0][$i],'cols_account'=>$cols_account[0][$i],'cols_info'=>$cols_info[0][$i],'cols_date'=>date('Y-m-d H:i:s',time()));
				$data[] = $dataList;
			}
			if ($m_column->addALL($data)) {//可以批量插入，也可以单条插入
				$this->success('添加成功！');
				die();
			}
			$error = $m_column->getError();
			$this->error($error,U('Index/sortManagement'),6);
		}
		$this->display();
	}

	/**
	 * 分类 包装数据接口
	 * @return [type] [description]
	 * ps：在包装数据接口时，应当有两个行数要配合使用json_encode()/json_decode()
	 * 先用前面一个，读取时用后面一个
	 */
	public function jsonDataCol(){
		$page=I('get.page');
		$limit=I('get.limit');
		$first=($page-1)*$limit;//处理分页条数
		$user=session('user');
		$m_column = D('Classify');
		$data=$m_column->limit("$first,$limit")->where("cols_user='$user'")->select();
		$count = $m_column->where("cols_user='$user'")->count();
		$json = jsonResponseFormat(0,$count,$data,'');
		$this->ajaxReturn($json);
	}    

	/**
	 * 分类删除方法
	 * @return [type] [description]
	 */
	public function colDel(){
		$id = I('get.id');
		$m_column = D('Classify');
		$result = $m_column->delete($id);
		if ($result) {
			$result = '删除成功';
		}else{
			$result = '删除失败';
		}
		$this->ajaxReturn($result);
	}

	/**
	 * 分类修改方法
	 * @return [type] [description]
	 */
	public function colMod(){
		$data['id'] = I('post.id');
		$data['cols'] = I('post.cols');
		$data['cols_info'] = I('post.cols_info');
		$data['cols_account'] = I('post.cols_account');
		$id = $data['id'];//因为$data['id']无法当做条件使用，所以转换一下
		$m_column = D('Classify');
		$result = $m_column->where("Id='$id'")->save($data);
		if ($result) {
			$result = '修改成功';
		}else{
			$result = '修改失败-.-';
		}
		$this->ajaxReturn($result);
	}

	/**
	 * 记账
	 * @return [type] [description]
	 */
	public function accounting(){
		$flag = I('get.flag');//flag用来区别是收入还是支出的表单提交
		$m_account = D('Account');
		$money[] = I('post.money');
		$a_date[] = I('post.a_date');
		$a_cols[] = I('post.a_cols');
		$a_info[] = I('post.a_info');
		if (IS_POST) {
			if ($flag=='income') {
				//收入
				for ($i=0; $i < count($a_cols[0]); $i++) { 
					$dataList = array('a_user'=>session('user'),'money'=>$money[0][$i],'account'=>'收入','a_cols'=>$a_cols[0][$i],'a_info'=>$a_info[0][$i],'a_date'=>$a_date[0][$i]);
					$data[] = $dataList;
				}
				if ($m_account->addALL($data)) {
					$this->success('添加成功！');
					die();
				}
				$error = $m_account->getError();
				$this->error($error,U('Index/accounting'),6);
			}elseif ($flag=='pay') {
				//支出
				for ($i=0; $i < count($a_cols[0]); $i++) { 
					$dataList = array('a_user'=>session('user'),'money'=>$money[0][$i],'account'=>'支出','a_cols'=>$a_cols[0][$i],'a_info'=>$a_info[0][$i],'a_date'=>$a_date[0][$i]);
					$data[] = $dataList;
				}
				if ($m_account->addALL($data)) {
					$this->success('添加成功！');
					die();
				}
				$error = $m_account->getError();
				$this->error($error,U('Index/accounting'),6);
			}else{
				//其他的参数均是非法操作
				$this->error('Illegal operation, please contact the administrator to give the authority!',U('Index/accounting'),6);
			}
		}
		$m_column = D('Classify');
		$user=session('user');
		$result = $m_column->field('Id,cols,cols_account')->where("cols_user='$user'")->select();
		$this->assign('cols',$result);
		$this->display();
	}

	/**
	 * 账单列表
	 * @return [type] [description]
	 */
	public function bill(){
		$user=session('user');
		$m_account=D('Account');
		$list=$m_account->field('distinct a_cols')->where("a_user='$user' ")->select();
		$this->assign('list',$list);
		$this->display();
	}

	/**
	 * [jsonDataBill 账单列表json数据接口]
	 * @return [type] [description]
	 */
	public function jsonDataBill(){
		$selectData=I('get.data');
		$page=I('get.page');
		$limit=I('get.limit');
		$first=($page-1)*$limit;
		$user=session('user');
		$m_account = D('Account');
		$selectData = $m_account->getProcessingData($selectData);
		$data = $m_account->limit("$first,$limit")->where("a_user='$user'".$selectData)->order('id desc')->select();
		$count = $m_account->where("a_user='$user'".$selectData)->count();
		$json = jsonResponseFormat(0,$count,$data,'');
		$this->ajaxReturn($json);
	}

	/**
	 * 账单列表删除方法
	 * @return [type] [description]
	 */
	public function billDel(){
		$id = I('get.id');
		$m_account = D('Account');
		$result = $m_account->delete($id);
		if ($result) {
			$result = '删除成功';
		}else{
			$result = '删除失败';
		}
		$this->ajaxReturn($result);
	}

	/**
	 * 账单列表修改方法
	 * @return [type] [description]
	 */
	public function billMod(){
		$data['id'] = I('post.id');
		$data['money'] = I('post.money');
		$data['account'] = I('post.account');
		$data['a_cols'] = I('post.a_cols');
		$data['a_info'] = I('post.a_info');
		$id = $data['id'];//因为$data['id']无法当做条件使用，所以转换一下
		$m_account = D('Account');
		$result = $m_account->where("Id='$id'")->save($data);
		if ($result) {
			$result = '修改成功';
		}else{
			$result = '修改失败-.-';
		}
		$this->ajaxReturn($result);
	}

	/**
	 *帐目统计显示层方法
	 */
	public function statistics(){
		$user=session('user');
		$year=(I('get.year')==null) ? '2018' : I('get.year');
		$m_account=D('Account');
// echo $year;exit();
		$res=$m_account->field("DATE_FORMAT(a_date,'%m') as months,sum(money) as sum,account,a_cols")->where("a_user='$user' and DATE_FORMAT(a_date,'%Y')='$year'")->group("months,a_cols,account")->select();
		// 判断收支类型，如果是支出则为金额加上负号（-）
		for ($i=0; $i < count($res); $i++) { 
			if ($res[$i]['account'] === '支出') {
				$res[$i]['sum'] = '-'.$res[$i]['sum'];
			}
		}
		
		// 存储类目/月关联数组
		$data=array();
		foreach ($res as $v) {
			$key=$v['a_cols'];
			$data[$key][$v['months']] = $v['sum'];
		}

		// 提取$data中的key值
		$data_name_key = array_keys($data);
		// 提取$data中的value值数组，月数组
		$data_month_values = array_values($data);
		// 定义一个12月的空数组
		$month = array('01'=>0,'02'=>0,'03'=>0,'04'=>0,'05'=>0,'06'=>0,'07'=>0,'08'=>0,'09'=>0,'10'=>0,'11'=>0,'12'=>0);
		// 循环月数组的组成一个拥有12个月的二维数组
		for ($i=0; $i < count($data_month_values); $i++) { // 外层循环二维数组个数
			foreach ($data_month_values[$i] as $key => $value) { // 数组名值对循环
				// 判断第i个数组的键名是否在空的月数组$month中
				if (array_key_exists($key,$month)) {
					// 如果存在则为其赋值,并且强制转换成int类型，因为highcharts的本身原因，不能是字符串的类型
					$month[$key] = (double)$value;
				}
			}
			// 获得赋值过后的月数组
			$month = array_values($month);
			// 为第i个$data_month_values赋值
			$data_month_values[$i] = $month;
			// 初始化月数组$month
			$month = array('01'=>0,'02'=>0,'03'=>0,'04'=>0,'05'=>0,'06'=>0,'07'=>0,'08'=>0,'09'=>0,'10'=>0,'11'=>0,'12'=>0);
		}

		// 定义一个与highcharts相关的关联数组，要形成一个json数据的
		$names_months = array();
		for ($i=0; $i < count($data_name_key); $i++) { 
			$names_months[$i] = array('name'=>$data_name_key[$i],'data'=>$data_month_values[$i]);
		}
		// 形成json数据
		$json_name_month = json_encode($names_months,JSON_UNESCAPED_UNICODE);
		
		// 为$data数据多添加一个列总计的字段 ,
		foreach ($data as $key => $value) {
			$data[$key]['cols_total'] = array_sum($data[$key]);
		}
		
		// 输出sql语句
		// echo $m_account->_sql();
		// echo '<pre>';
		// print_r($names_months);
		// print_r(json_encode($names_months,JSON_UNESCAPED_UNICODE));
		// echo '</pre>';
		// exit();

		$this->assign('data',$data);
		$this->assign('json',$json_name_month);
		$this->display();
	}

	/**
	 * 账单导出列表
	 * @return [type] [description]
	 */
	public function getBillExportData(){
		$user=session('user');
		$page = I('get.page');
		$limit = I('get.limit');
		$first=($page-1)*$limit;
		$m_log = D('Log');
		$data = $m_log -> where('l_user=\''.$user.'\'') -> select();
		$count = count($data);
		$json = jsonResponseFormat(0,$count,$data,'');
		$this->ajaxReturn($json);
	}

	/**
	 * 选择完条件后，导出数据
	 * @return [type] [description]
	 */
	public function export(){
		$user=session('user');
		$IP = getIP();
		$data = I('get.search');
		$where = '';
		$condition = '';
		if ($data['a_cols']) {
			$where .= ' and a_cols=\''.$data['a_cols'].'\'';
		}
		if ($data['a_date']) {
			$data['a_date'] = str_replace(' ~ ', "' and '", $data['a_date']);
			$where .= ' and a_date between \''.$data['a_date'].'\'';
		}
		foreach ($data as $key => $value) {
			if ($value) {
				$condition .= $key.'--';
			}
		}
		$field = 'a_cols,account,money,a_info,a_date,a_finallydate';
		$titles = array('收支类目','收/支','金额（￥）','收支信息','收支信息','最后修改时间');
		$m_account = D('Account');
		$data = $m_account -> field($field) -> where('a_user=\''.$user.'\''.$where) -> select();
		// printSQL($m_account);
		if ($data) {
			$flag = exportExcel($titles, $data, '账单数据'.time());
			if ($flag) {
				$m_log = D('Log');
				$data = array('l_user'=>$user,'condition'=>substr($condition,0, strlen($condition)-2),'ip'=>$IP);
				$res = $m_log -> add($data);
				// d_dump($res);exit();
			}
			exit();
		}else{
			// 查无数据，给用户提示，不导出
			$this->error('查无数据,导出失败,3秒后返回首页',U('Index/index'),3);
		}
		// d_dump(exportExcel());exit;
	}

	public function test(){
		header( 'Content-Type:text/html;charset=utf-8 ');  
		// 用ajax/get接收年份
		// $year=I('get.year');
		// for ($i=1; $i <= 12; $i++) { 
		//   $day=date('t', strtotime($year.'-'.$i));//判断每一年月份有几天
		//   echo $day.'<br>';
		// }
		$m_account=D('Account');
		// 按月份\收支分类和类目查询出金额并累加
		// mysql查询语句为:select DATE_FORMAT(a_date,'%Y') as year,DATE_FORMAT(a_date,'%m') as months,sum(money),account,a_cols from acc_account where a_user='yangwendi' and DATE_FORMAT(a_date,'%Y')='2018' group by year,months,a_cols,account;
		$data=$m_account->field("DATE_FORMAT(a_date,'%Y') as year,DATE_FORMAT(a_date,'%m') as months,sum(money) as sum,a_cols")->where("a_user='tomtset' and DATE_FORMAT(a_date,'%Y')='2018'")->group("year,months,a_cols,account")->select();
		// 存储月数组
		$months=array('01','02','03','04','05','06','07','08','09','10','11','12');
		for ($i=0; $i < count($data); $i++) { 
		  // 存储金额统计  0,0,0,0,0,0,0,0,0,0,0,0初始化数组，如将$sum定在循环外面，则会出现缓存的问题
		  $sum=array(0=>'0',1=>'0',2=>'0',3=>'0',4=>'0',5=>'0',6=>'0',7=>'0',8=>'0',9=>'0',10=>'0',11=>'0');
		  // 内层循环判断月份
		  for ($j=0; $j < count($months); $j++) { 
		    if ($data[$i]['months']==$months[$j]) {
		      $sum[$j]=$data[$i]['sum'];
		    }
		  }
		  $data[$i]['sum']=$sum;//将每个sum数组赋值
		  // 将查询到的数据源中months由单个数改成一样的月数组，从而循环得到一个新的数据源
		  $data[$i]['months']=$months;
		  // 已处理了两个数据，还需要将其他分类归组
			
		}
		// $res=array();
		// foreach ($data as $v) {
		// 	$key=$v['a_cols'];
		// 	$res[$key][$v['months']] = $v['sum'];
			// if (array_key_exists($key, $res)) {
			//   if (is_array($res[$key]['sum'])) {
			//     $res[$key]['sum'][]=$v['sum'];
			//     $res[$key]['months'][]=$v['months'];
			//   }else{
			//     $res[$key]['months']=array($res[$key]['months'],$v['months']);
			//     $res[$key]['sum']=array($res[$key]['sum'],$v['sum']);
			//   }
			// }else{
			//   $res[$key]=$v;
			// }
		// }
		$json=json_decode(json_encode($data,JSON_UNESCAPED_UNICODE));
		$this->ajaxReturn($json);
	}

}