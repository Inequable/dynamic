<?php 
/**
* 账单列表
*/
namespace Home\Model;
use Think\Model;

class AccountModel extends Model{
	protected $updateFields = 'Id,a_cols,money,a_account,a_info';

	/**
	 * 处理查询表单提交的数据，由数组转换成sql字符串
	 * @param  array  $array 表单数据数组
	 * @return [type]        [description]
	 */
	public function getProcessingData($array=array()){
		// 判断数组是否为空，若为空直接返回空值
		if (empty($array)) {
			return '';
		}
		// 拼接sql中时间段
		if ($array['endTime'] || $array['startTime']) {
			// 三元运算符判断哪个时间段为空，为空的预先赋值
			$array['startTime'] = $array['startTime'] ? $array['startTime'] : '2018-01-01';
			$array['endTime'] = $array['endTime'] ? $array['endTime'] : date('Y-m-d');
			// 查询这两个时间的中间数据
			$sql .=' and a_date between \''.$array['startTime'].'\' and \''.$array['endTime'].'\'';
		}
		// 在下列foreach循环中不需要处理这两个字段，故清除掉
		unset($array['endTime']);
		unset($array['startTime']);
		// 循环剩下的字段，进行sql拼接
		foreach ($array as $key => $value) {
			// 值不为空的才进行拼接
			if ($value) {
				$sql .=' and '.$key.'=\''.$value.'\'';
			}
		}
		// 返回拼接好的字符串
		return $sql;
	}

	//更新数据之前的操作
	protected function _before_update(&$data, $option){
		$data['a_finallydate'] = date('Y-m-d H:i:s',time());
	}

}