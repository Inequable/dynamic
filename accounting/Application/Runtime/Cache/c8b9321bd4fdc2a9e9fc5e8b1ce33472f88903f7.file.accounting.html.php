<?php /* Smarty version Smarty-3.1.6, created on 2018-03-31 17:22:03
         compiled from "./Application/Home/View/Index/accounting.html" */ ?>
<?php /*%%SmartyHeaderCode:18020172335abf533b238ff7-17230381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8b9321bd4fdc2a9e9fc5e8b1ce33472f88903f7' => 
    array (
      0 => './Application/Home/View/Index/accounting.html',
      1 => 1522479948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18020172335abf533b238ff7-17230381',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cols' => 0,
    'column' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5abf533b349b6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5abf533b349b6')) {function content_5abf533b349b6($_smarty_tpl) {?><!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <title>记一笔</title> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo @JS_URL;?>
layui/css/layui.css" /> 
  <link rel="stylesheet" href="<?php echo @CSS_URL;?>
config.css" />
  <script src="<?php echo @JS_URL;?>
WdatePicker/WdatePicker.js"></script>
 </head> 
 <body> 
  <div class="container"> 
   <div class="layui-row"> 
    <div class="layui-tab layui-tab-card"> 
     <ul class="layui-tab-title"> 
      <li class="layui-this"><i class="layui-icon">&#xe69c;</i> 支出</li> 
      <li><i class="layui-icon">&#xe6af;</i> 收入</li> 
     </ul> 
     <div class="layui-tab-content"> 
     <!-- 支出 -->
      <div class="layui-tab-item layui-show"> 
       <form action="<?php echo U('Index/accounting','flag=pay');?>
" method="post" class="layui-form layui-form-pane pay">
        <div class="site-block"> 
         <div class="layui-form-item"> 
          <label class="layui-form-label"><i class="layui-icon">&#xe65e;</i> 支出金额：</label> 
          <div class="layui-input-inline"> 
           <input type="text" name="money[]" required="" class="layui-input" placeholder="请输入金额（￥）" required lay-verify="required|money" autocomplete="off" /> 
          </div> 
         </div> 
         <div class="layui-form-item"> 
          <label class="layui-form-label"><i class="layui-icon">&#xe735;</i> 支出分类：</label> 
          <div class="layui-input-inline"> 
           <select name="a_cols[]" lay-verify="required">
            <option value="">请选择一个类别</option>
            <?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cols']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
              <?php if ($_smarty_tpl->tpl_vars['column']->value['cols_account']=='支出'){?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['column']->value['cols'];?>
"><?php echo $_smarty_tpl->tpl_vars['column']->value['cols'];?>
</option>
              <?php }?>
            <?php } ?>
           </select> 
          </div> 
         </div> 
         <div class="layui-form-item layui-form-text"> 
          <label class="layui-form-label"><i class="layui-icon">&#xe705;</i> 备注：</label> 
          <div class="layui-input-block"> 
           <textarea name="a_info[]" placeholder="有需要的请备注" class="layui-textarea" lay-verify="info"></textarea> 
          </div> 
         </div> 
         <div class="layui-form-item"> 
          <label class="layui-form-label"><i class="layui-icon">&#xe637;</i> 支出时间：</label> 
          <div class="layui-input-inline"> 
           <input type="text" name="a_date[]" class="layui-input" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd' })" required lay-verify="required" autocomplete="off" placeholder="点击选择支出时间" readonly /> 
          </div> 
         </div> 
        </div> 
        <div class="pay-node"></div>
        <div class="layui-form-item"> 
          <div class="layui-input-block"> 
           <button lay-submit="" class="layui-btn" lay-filter="pay">立即提交</button> 
           <button type="reset" class="layui-btn layui-btn-primary">重置</button>
           <span class="layui-btn layui-btn-normal" id="addPay">追加一笔支出</span> 
           <span class="layui-btn layui-btn-danger" id="delPay" style="display: none;">删除一笔支出</span> 
          </div> 
         </div> 
       </form> 
      </div> 
      <!-- 收入 -->
      <div class="layui-tab-item">
       <form action="<?php echo U('Index/accounting','flag=income');?>
" method="post" class="layui-form layui-form-pane income"> 
        <div class="site-block"> 
         <div class="layui-form-item"> 
          <label class="layui-form-label"><i class="layui-icon">&#xe65e;</i> 收入金额：</label> 
          <div class="layui-input-inline"> 
           <input type="text" name="money[]" class="layui-input" placeholder="请输入金额（￥）" required="" lay-verify="required|money" autocomplete="off" /> 
          </div> 
         </div> 
         <div class="layui-form-item"> 
          <label class="layui-form-label"><i class="layui-icon">&#xe735;</i> 收入分类：</label> 
          <div class="layui-input-inline"> 
           <select name="a_cols[]" lay-verify="required">
            <option value="">请选择一个类别</option>
            <?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cols']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
              <?php if ($_smarty_tpl->tpl_vars['column']->value['cols_account']=='收入'){?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['column']->value['cols'];?>
"><?php echo $_smarty_tpl->tpl_vars['column']->value['cols'];?>
</option>
              <?php }?>
            <?php } ?>
           </select> 
          </div> 
         </div> 
         <div class="layui-form-item layui-form-text"> 
          <label class="layui-form-label"><i class="layui-icon">&#xe705;</i> 备注：</label> 
          <div class="layui-input-block"> 
           <textarea name="a_info[]" placeholder="有需要的请备注" class="layui-textarea" lay-verify="info"></textarea> 
          </div> 
         </div> 
         <div class="layui-form-item"> 
          <label class="layui-form-label"><i class="layui-icon">&#xe637;</i> 收入时间：</label> 
          <div class="layui-input-inline"> 
           <input type="text" name="a_date[]" class="layui-input pay" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd' })" required lay-verify="required" autocomplete="off" placeholder="点击选择收入时间" readonly /> 
          </div> 
         </div> 
        </div> 
        <div class="income-node"></div>
        <div class="layui-form-item"> 
          <div class="layui-input-block"> 
           <button class="layui-btn" lay-submit="" lay-filter="sbt">立即提交</button> 
           <button type="reset" class="layui-btn layui-btn-primary">重置</button>
           <span class="layui-btn layui-btn-normal" id="income">追加一笔收入</span> 
           <span class="layui-btn layui-btn-danger" id="delIncome" style="display: none;">删除一笔收入</span> 
          </div> 
         </div> 
       </form> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <script src="<?php echo @JS_URL;?>
layui/layui.all.js"></script> 
  <script src="<?php echo @JS_URL;?>
accounting.js"></script>  
  <script src="<?php echo @JS_URL;?>
customValidation.js"></script> 
 </body>
</html><?php }} ?>