<?php /* Smarty version Smarty-3.1.6, created on 2018-03-31 17:42:12
         compiled from "./Application/Home/View/Index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:14542462005abf533b01d887-84226042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5c4efec70a0a967b5684ac66a58dba13edd61fd' => 
    array (
      0 => './Application/Home/View/Index/index.html',
      1 => 1522489310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14542462005abf533b01d887-84226042',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5abf533b0e675',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5abf533b0e675')) {function content_5abf533b0e675($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>记账后台</title>
  <link rel="stylesheet" href="<?php echo @JS_URL;?>
layui/css/layui.css">
  <style>
  .layui-show{
    height: 100%;
  }
  .layui-form-pane .layui-form-label{
    width: 130px;
  }  
  </style>
</head>

<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">记账后台</div>
    <!-- 头部区域 -->
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="<?php echo @IMG_URL;?>
/photo.jpg" class="layui-nav-img">
          <?php echo $_SESSION['user'];?>

        </a>
        <dl class="layui-nav-child">
          <dd><a href="javascript:;">基本资料</a></dd>
          <dd><a href="javascript:;">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="<?php echo U('Index/logout');?>
">退了</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域-->
      <ul class="layui-nav layui-nav-tree site-demo-nav" lay-filter="demo">
        <li class="layui-nav-item layui-this"> 
          <a href="javascript:;"><i class="layui-icon">&#xe642;</i> 记一笔</a>
        </li>
        <li class="layui-nav-item"> 
          <a href="javascript:;" data-type="tabAdd"><i class="layui-icon">&#xe63c;</i> 账单列表</a>
        </li>
        <li class="layui-nav-item"> 
          <a href="javascript:;"><i class="layui-icon">&#xe61e;</i> 导出账单</a>
        </li>
        <li class="layui-nav-item"> 
          <a href="javascript:;"><i class="layui-icon">&#xe614;</i> 分类管理</a>
        </li>
        <li class="layui-nav-item"> 
          <a href="javascript:;"><i class="layui-icon">&#xe629;</i> 数据统计</a>
        </li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body layui-tab-content clildFrame">
    <!-- 内容主体区域 -->
    <!-- 记账 -->
    <div class="layui-tab-item layui-show"><iframe src="<?php echo U('Index/accounting');?>
" frameborder="0" scrolling="auto" width="100%" height="100%"></iframe></div>
    <!-- 账单列表 -->
    <div class="layui-tab-item"><iframe src="<?php echo U('Index/bill');?>
" frameborder="0" scrolling="auto" width="100%" height="100%"></iframe></div>
    <!-- 导出账单 -->
    <div class="layui-tab-item">
      <div class="layui-tab layui-tab-card">
        <ul class="layui-tab-title">
          <li class="layui-this"><i class="layui-icon">&#xe601;</i> 账单导出</li>
        </ul>
        <div class="layui-tab-content">
          <div class="layui-tab-item layui-show">
            <form action="" method="post" class="layui-form layui-form-pane">
              <div class="layui-form-item">
                <label class="layui-form-label"><i class="layui-icon">&#xe601;</i> 导出账单：</label>
                <div class="layui-input-inline" style="text-align: center;">
                  <button class="layui-btn" lay-submit="" lay-filter="">立即导出</button>
                </div>
                <div class="layui-form-mid layui-word-aux">注意：文件超过2m，有可能导不出，尽量不要导出数据太大！</div>
              </div>
            </form>
            <!-- 导出历史 -->
            <table id="billExport" lay-filter="export"></table>
          </div>
        </div>
      </div>      
    </div>
    <!-- 分类管理 -->
    <div class="layui-tab-item"><iframe src="<?php echo U('Index/sortManagement');?>
" frameborder="0" scrolling="auto" width="100%" height="100%"></iframe></div>
    <!-- 帐目统计 -->
    <div class="layui-tab-item"><iframe src="<?php echo U('Index/statistics');?>
" frameborder="0" scrolling="auto" width="100%" height="100%"></iframe></div>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
   杨文迪 © 992307026@qq.com
  </div>
</div>
<script src="<?php echo @JS_URL;?>
layui/layui.js"></script>
<script src="<?php echo @JS_URL;?>
index.js"></script>
</body>
</html><?php }} ?>