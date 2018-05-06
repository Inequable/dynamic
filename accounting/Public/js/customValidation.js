//自定义验证
layui.use(['form','layer'],function () {
	var form=layui.form,
	layer=layui.layer;

	form.verify({
		username:function(value){//用户名验证
			if (value.length < 5) {
				return '用户名不符合长度！！！';
			}else if(/^\d+\d+\d$/.test(value)){
				return '用户名不能全为数字';
			}
		},
		password:[/^[\S]{6,12}$/,'密码必须6到12位，且不能出现空格'],//密码验证
		code:[/^[\S]{4}$/,'验证码必须4位，且不能出现空格'],//验证码验证
		//货币验证
		money:[/^([1-9]\d{0,9}|0)([.]?|(\.\d{1,2})?)$/,'货币必须是数字，或为正浮点数或正整数,只有双精度'],
		info:[/^.{0,200}$/,'备注信息超过200字符！'],
		account:function () {
			if (value!='收入' || value!='支出') {
				return '必须填上支出或收入二者其一';
			}
		}
	});
	
	
});