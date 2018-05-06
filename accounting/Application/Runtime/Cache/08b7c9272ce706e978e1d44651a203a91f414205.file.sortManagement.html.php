<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 16:55:17
         compiled from "./Application/Home/View\Index\sortManagement.html" */ ?>
<?php /*%%SmartyHeaderCode:284855aaa03b52ba6d3-01352090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08b7c9272ce706e978e1d44651a203a91f414205' => 
    array (
      0 => './Application/Home/View\\Index\\sortManagement.html',
      1 => 1523263972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '284855aaa03b52ba6d3-01352090',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aaa03b5373e9',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaa03b5373e9')) {function content_5aaa03b5373e9($_smarty_tpl) {?><!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <title>管理账单</title> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo @JS_URL;?>
layui/css/layui.css" />
  <link rel="stylesheet" href="<?php echo @CSS_URL;?>
config.css" />
  </head>
 <body>
	<div class="layui-tab layui-tab-card">
	  <ul class="layui-tab-title">
	    <li class="layui-this"><i class="layui-icon">&#xe614;</i> 分类管理</li>
	    <li><i class="layui-icon">&#xe60a;</i> 分类列表</li>
	  </ul>
	  <div class="layui-tab-content">
	    <div class="layui-tab-item layui-show">
		  <form action="<?php echo @__SELF__;?>
" method="post" class="layui-form layui-form-pane col">
			<div class="site-block">
			  <div class="layui-form-item">
			    <label class="layui-form-label"><i class="layui-icon">&#xe614;</i> 新建分类：</label>
			    <div class="layui-input-inline">
				  <input type="text" name="cols[]" required lay-verify="required" class="layui-input" placeholder="请填写分类名称">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><i class="layui-icon">&#xe636;</i> 收支分类：</label>
			    <div class="layui-input-inline">
				  <select name="cols_account[]">
				    <option value="">收入&支出</option>
				    <option value="收入">收入</option>
				    <option value="支出">支出</option>
				  </select>
			    </div>
			  </div>
			  <div class="layui-form-item layui-form-text">
			    <label class="layui-form-label"><i class="layui-icon">&#xe705;</i> 备注信息：</label>
			    <div class="layui-input-block">
				  <textarea name="cols_info[]" class="layui-textarea" placeholder="有需要的请备注"></textarea>
			    </div>
			  </div>			  
			</div>
			<div class="col-node"></div>
			<div class="layui-form-item">
			  <div class="layui-input-block">
				<button class="layui-btn" type="submit">新建</button>
				<span class="layui-btn layui-btn-normal" id="addCol">追加类目</span>
				<span class="layui-btn layui-btn-danger" id="delCol" style="display: none;">删除类目</span>
			  </div>
			</div>
		  </form>
	    </div>
	    <div class="layui-tab-item">
			<table class="layui-hide" id="colData" lay-filter="colData"></table>
			<script type="text/html" id="column">
			  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="colDel">删除</a>
			  <a class="layui-btn layui-btn-xs" lay-event="colModify">修改</a>
			</script>
	    </div>
	  </div>
	</div>
  <script>
  	var url_json="<?php echo U('Index:jsonDataCol');?>
";
  	// var url_json="/accounting/Application/Home/View/Tpl/classify.json";
		var url_del="<?php echo U('Index:colDel');?>
";
		var url_mod="<?php echo U('Index:colMod');?>
";
  </script>
  <script src="<?php echo @JS_URL;?>
layui/layui.js"></script> 
  <script src="<?php echo @JS_URL;?>
sortManagement.js"></script>
 </body>
</html><?php }} ?>