<?php 
/**
* 用户模型表
*/
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
	//添加时调用create方法允许接收的字段
	protected $insertFields = 'username,password,ask,verify,date';

	//定义验证规则，虽然前端有验证规则，后端这部分最好也验证
	protected $_validate = array(
		array('username','required','用户名不能为空',1),
		array('password','required','用户密码不能为空',1),
	);

	/**
	 * 登录验证
	 * @param  string $username 用户名
	 * @param  string $password 用户密码
	 * @return [type]           [description]
	 */
	public function checkNM($username='', $password=''){
		//当然密码后期需要处理

		$info = $this->where("username='$username'")->find();
		if ($info['password']==$password) {
			return $info;
		}
		return null;
	}
}