<?php /* Smarty version Smarty-3.1.6, created on 2018-03-31 17:22:03
         compiled from "./Application/Home/View/Index/bill.html" */ ?>
<?php /*%%SmartyHeaderCode:8387995955abf533b3a6f89-82012053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cc8de1a51a8428ff4d4369f2df5bd01b8f084e0' => 
    array (
      0 => './Application/Home/View/Index/bill.html',
      1 => 1522479948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8387995955abf533b3a6f89-82012053',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5abf533b40be4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5abf533b40be4')) {function content_5abf533b40be4($_smarty_tpl) {?><!DOCTYPE html>
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
          <form action="" method="post" class="layui-form layui-form-pane">
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
                <select name="a_cols">
                  <option value="">用途分类</option>
                  <option value="1">早餐</option>
                  <option value="2">午餐</option>
                  <option value="3">晚餐</option>
                </select>
              </div>
            </div>
            <div class="layui-form-item layui-inline">
              <div class="layui-input-inline">
                <button class="layui-btn" type="submit" lay-filter="billSbt">立即提交</button> 
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