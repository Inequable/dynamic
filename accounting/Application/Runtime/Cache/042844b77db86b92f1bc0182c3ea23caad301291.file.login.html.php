<?php /* Smarty version Smarty-3.1.6, created on 2018-06-14 10:42:14
         compiled from "./Application/Home/View/Index/login.html" */ ?>
<?php /*%%SmartyHeaderCode:19103996655b21d6065065e6-24737526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '042844b77db86b92f1bc0182c3ea23caad301291' => 
    array (
      0 => './Application/Home/View/Index/login.html',
      1 => 1528885996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19103996655b21d6065065e6-24737526',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b21d6066d959',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b21d6066d959')) {function content_5b21d6066d959($_smarty_tpl) {?><!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <title>记账登录系统</title> 
  <link rel="stylesheet" href="<?php echo @JS_URL;?>
layui/css/layui.css" /> 
  <link rel="stylesheet" href="<?php echo @CSS_URL;?>
login.css" />
 </head> 
 <body> 
  <div class="container"> 
   <div class="logo">
    YWD--LOGO
   </div> 
   <div class="form"> 
    <form action="<?php echo U('Index/login');?>
" method="post" class="layui-form"> 
     <div class="layui-form-item"> 
      <label class="layui-form-label">用户名：</label> 
      <div class="layui-input-block"> 
       <input type="text" name="username" required lay-verify="required|username" placeholder="请输入用户名" autocomplete="off" class="layui-input" /> 
      </div> 
     </div> 
     <div class="layui-form-item"> 
      <label class="layui-form-label">密码：</label> 
      <div class="layui-input-block"> 
       <input type="password" name="password" required="" lay-verify="required|password" placeholder="请输入密码" autocomplete="off" class="layui-input" /> 
      </div> 
     </div> 
     <div class="layui-form-item"> 
      <label class="layui-form-label">验证码：</label> 
      <div class="layui-input-inline"> 
       <input type="text" name="code" required lay-verify="required|code" placeholder="请输入验证码" autocomplete="off" class="layui-input" /> 
      </div> 
      <div class="layui-form-mid layui-word-aux"> 
       <img src="<?php echo U('Index/verifyImg');?>
" alt="验证码" onClick="create_code()" title="看不清！点击图片更换！" id="yzm"/> 
      </div> 
     </div> 
     <div class="layui-form-item"> 
      <label class="layui-form-label">记住密码：</label> 
      <div class="layui-input-block"> 
       <input name="switch" lay-skin="switch" lay-text="YES|NO" type="checkbox" value="1" />
       <div class="layui-unselect layui-form-switch" lay-skin="_switch">
        <em>NO</em>
        <i></i>
       </div> 
      </div> 
     </div> 
     <div class="layui-form-item"> 
      <div class="layui-input-block"> 
       <button class="layui-btn" lay-submit="" lay-filter="sbt">立即提交</button> 
       <button type="reset" class="layui-btn layui-btn-primary">重置</button> 
      </div> 
     </div> 
    </form> 
   </div> 
  </div> 
  <script src="<?php echo @JS_URL;?>
layui/layui.all.js"></script> 
  <script src="<?php echo @JS_URL;?>
login.js"></script> 
  <script>
  function create_code(){
      document.getElementById('yzm').src = "<?php echo U('Index/verifyImg');?>
?"+Math.random()*10000;
  }
  </script>
 </body>
</html><?php }} ?>