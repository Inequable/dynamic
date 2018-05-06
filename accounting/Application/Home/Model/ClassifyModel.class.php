<?php 
namespace Home\Model;
use Think\Model;

/**
* 分类表
*/
class ClassifyModel extends Model{
	// protected $insertFields = 'cols,cols_account,cols_info';
	protected $updateFields = 'Id,cols,cols_info,cols_account';

	//数据校验让前端来完成吧
	// protected $_validate = array(
	// 	array('cols','require','请填写分类名',1),
	// 	array('cols_account','require','收支类别不能为空',1),
	// );

	//更新数据之前的操作
	protected function _before_update(&$data, $option){
		$data['cols_finallydate'] = date('Y-m-d H:i:s',time());
	}

}