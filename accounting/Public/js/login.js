//由于模块都一次性加载，因此不用执行 layui.use() 来加载对应模块，直接使用即可：
;!function(){
	var layer = layui.layer
	,form = layui.form;
	// layer.msg('Hello World');
	
	//自定义验证
	form.verify({
		username:function(value){
			if (value.length < 5) {
				return '用户名不符合长度！！！';
			}else if(/^\d+\d+\d$/.test(value)){
				return '用户名不能全为数字';
			}
		},
		password:[/^[\S]{6,12}$/,'密码必须6到12位，且不能出现空格'],
		code:[/^[\S]{4}$/,'验证码必须4位，且不能出现空格']
	});
	
	//监听提交
	form.on('submit(sbt)', function(data){
	  // layer.msg(JSON.stringify(data.field));//会返回提交的信息
	  if (JSON.stringify(data.field)) {
	  	return true;
	  }
	  return false;
	});

}();