<?php 
/**
* 账单列表
*/
namespace Home\Model;
use Think\Model;

class AccountModel extends Model{
	protected $updateFields = 'Id,a_cols,money,a_account,a_info';

	//更新数据之前的操作
	protected function _before_update(&$data, $option){
		$data['a_finallydate'] = date('Y-m-d H:i:s',time());
	}

}