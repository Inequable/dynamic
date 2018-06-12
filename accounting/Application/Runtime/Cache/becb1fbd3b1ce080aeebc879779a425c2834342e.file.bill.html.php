<?php /* Smarty version Smarty-3.1.6, created on 2018-06-12 14:15:42
         compiled from "./Application/Home/View\Index\bill.html" */ ?>
<?php /*%%SmartyHeaderCode:28545aaa03b4f15781-82845296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'becb1fbd3b1ce080aeebc879779a425c2834342e' => 
    array (
      0 => './Application/Home/View\\Index\\bill.html',
      1 => 1528784105,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28545aaa03b4f15781-82845296',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aaa03b50d2a2',
  'variables' => 
  array (
    'list' => 0,
    'col' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaa03b50d2a2')) {function content_5aaa03b50d2a2($_smarty_tpl) {?><!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <title>管理账单</title> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo @JS_URL;?>
layui/css/layui.css" />
  <script src="<?php echo @JS_URL;?>
WdatePicker/WdatePicker.js"></script>
  <style>
    .layui-form-pane .layui-form-label{
      width: 130px;
    }
  </style>
</head>
<body>
<div class="layui-tab layui-tab-card">
  <ul class="layui-tab-title">
    <li class="layui-this"><i class="layui-icon">&#xe63c;</i> 账单列表</li>
  </ul>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show">
    <div class="layui-collapse">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">选择条件查询</h2>
        <div class="layui-colla-content">

          <form action="" method="post" class="layui-form layui-form-pane" onsubmit="return false;">
            <div class="layui-form-item layui-inline">
              <label class="layui-form-label"><i class="layui-icon">&#xe636;</i> 收支：</label>
              <div class="layui-input-inline">
                <select name="account">
                  <option value="">按收入/支出排序</option>
                  <option value="收入">收入</option>
                  <option value="支出">支出</option>
                </select>
              </div>
            </div>
            <div class="layui-form-item layui-inline">
              <div class="layui-inline">
                <label class="layui-form-label"><i class="layui-icon">&#xe637;</i> 时间范围：</label>
                <div class="layui-input-inline" style="width: 100px;">
                  <input type="text" name="startTime" id="startTime" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid">-</div>
                <div class="layui-input-inline" style="width: 100px;">
                  <input type="text" name="endTime" id="endTime" autocomplete="off" class="layui-input">
                </div>
              </div>
            </div>
            <div class="layui-form-item layui-inline">
              <label class="layui-form-label"><i class="layui-icon">&#xe735;</i> 用途分类：</label>
              <div class="layui-input-inline">
                <select name="a_cols" lay-search>
                  <option value="">用途分类</option>
                  <?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['col']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value){
$_smarty_tpl->tpl_vars['col']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['col']->value['a_cols'];?>
"><?php echo $_smarty_tpl->tpl_vars['col']->value['a_cols'];?>
</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="layui-form-item layui-inline">
              <div class="layui-input-inline">
                <button class="layui-btn" type="submit" lay-filter="billSbt" lay-submit>查询</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
		<table class="layui-hide" id="listData" lay-filter="billData"></table>
    <script type="text/html" id="bill">
      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
      <a class="layui-btn layui-btn-xs" lay-event="modify">修改</a>
    </script>
    </div>
  </div>
</div>	
  <script>
    var url_json="<?php echo U('Index:jsonDataBill');?>
";
    var url_del="<?php echo U('Index:billDel');?>
";
    var url_mod="<?php echo U('Index:billMod');?>
";
  </script>
  <script src="<?php echo @JS_URL;?>
layui/layui.js"></script> 
  <script src="<?php echo @JS_URL;?>
bill.js"></script>
 </body>
</html><?php }} ?>