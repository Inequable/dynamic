<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 20:23:52
         compiled from "./Application/Home/View\Tpl\dispatch_jump.html" */ ?>
<?php /*%%SmartyHeaderCode:207235aa9e4657ec8d3-85432079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7015cba39674d8bdbd0f57556939dc993daf5ae0' => 
    array (
      0 => './Application/Home/View\\Tpl\\dispatch_jump.html',
      1 => 1523263972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207235aa9e4657ec8d3-85432079',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aa9e465878a8',
  'variables' => 
  array (
    'message' => 0,
    'error' => 0,
    'jumpUrl' => 0,
    'waitSecond' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa9e465878a8')) {function content_5aa9e465878a8($_smarty_tpl) {?><?php if (C('LAYOUT_ON')){?>
	<?php echo @__NOLAYOUT__;?>

<?php }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
.system-message{ padding: 24px 48px; }
.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
.system-message .jump{ padding-top: 10px}
.system-message .jump a{ color: #333;}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
</style>
</head>
<body>
<div class="system-message">
<?php if (isset($_smarty_tpl->tpl_vars['message']->value)){?>
	<h1>:)</h1>
	<p class="success"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
<?php }else{ ?>
	<h1>:(</h1>
	<p class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
<?php }?>
<p class="detail"></p>
<p class="jump">
页面自动 <a id="href" href="<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
">跳转</a> 等待时间： <b id="wait"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</b>
</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>
<?php }} ?>