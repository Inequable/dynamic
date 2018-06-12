<?php /* Smarty version Smarty-3.1.6, created on 2018-06-12 12:38:18
         compiled from "./Application/Home/View\Index\statistics.html" */ ?>
<?php /*%%SmartyHeaderCode:223165acb2a75d38573-15186843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a15ed988ba88b54b2d2271b4c61691b717f7279b' => 
    array (
      0 => './Application/Home/View\\Index\\statistics.html',
      1 => 1528778293,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '223165acb2a75d38573-15186843',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb2a75e0965',
  'variables' => 
  array (
    'data' => 0,
    'k' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb2a75e0965')) {function content_5acb2a75e0965($_smarty_tpl) {?><!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <title>账单统计</title> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo @JS_URL;?>
layui/css/layui.css" media="all"/>
  <link rel="stylesheet" href="<?php echo @CSS_URL;?>
statistics.css"/>
</head>
<body>
	<div class="layui-tab layui-tab-card">
		<ul class="layui-tab-title">
			<li class="layui-this"><i class="layui-icon">&#xe629;</i> 帐目统计</li>
		</ul>
		<div class="layui-tab-content">
			<div class="layui-btn-container">
				<button class="layui-btn one">显示图表</button>
			</div>
			<div class="layui-tab-item layui-show">
				<div class="layui-form">
					<table class="layui-table" lay-size="sm">
						<colgroup>
							<col width="90px">
						</colgroup>
				    <thead>
				    	<tr>
				    		<th><input type="text" name="year" class="layui-input" id="year" placeholder="年份"></th>
				    		<th>一月</th>
				    		<th>二月</th>
				    		<th>三月</th>
				    		<th>四月</th>
				    		<th>五月</th>
				    		<th>六月</th>
				    		<th>七月</th>
				    		<th>八月</th>
				    		<th>九月</th>
				    		<th>十月</th>
				    		<th>十一月</th>
				    		<th>十二月</th>
				    		<th class="count">合计</th>
				    	</tr>
				    </thead>
				    <tbody>
				    	<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
				    	<tr>
				    		<th><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</th>
				    		<th><?php if (isset($_smarty_tpl->tpl_vars['list']->value['01'])){?><?php echo $_smarty_tpl->tpl_vars['list']->value['01'];?>
<?php }else{ ?>0<?php }?>元</th>
				    		<th><?php if (isset($_smarty_tpl->tpl_vars['list']->value['02'])){?><?php echo $_smarty_tpl->tpl_vars['list']->value['02'];?>
<?php }else{ ?>0<?php }?>元</th>
				    		<th><?php if (isset($_smarty_tpl->tpl_vars['list']->value['03'])){?><?php echo $_smarty_tpl->tpl_vars['list']->value['03'];?>
<?php }else{ ?>0<?php }?>元</th>
				    		<th><?php if (isset($_smarty_tpl->tpl_vars['list']->value['04'])){?><?php echo $_smarty_tpl->tpl_vars['list']->value['04'];?>
<?php }else{ ?>0<?php }?>元</th>
				    		<th><?php if (isset($_smarty_tpl->tpl_vars['list']->value['05'])){?><?php echo $_smarty_tpl->tpl_vars['list']->value['05'];?>
<?php }else{ ?>0<?php }?>元</th>
				    		<th><?php if (isset($_smarty_tpl->tpl_vars['list']->value['06'])){?><?php echo $_smarty_tpl->tpl_vars['list']->value['06'];?>
<?php }else{ ?>0<?php }?>元</th>
				    		<th><?php if (isset($_smarty_tpl->tpl_vars['list']->value['07'])){?><?php echo $_smarty_tpl->tpl_vars['list']->value['07'];?>
<?php }else{ ?>0<?php }?>元</th>
				    		<th><?php if (isset($_smarty_tpl->tpl_vars['list']->value['08'])){?><?php echo $_smarty_tpl->tpl_vars['list']->value['08'];?>
<?php }else{ ?>0<?php }?>元</th>
				    		<th><?php if (isset($_smarty_tpl->tpl_vars['list']->value['09'])){?><?php echo $_smarty_tpl->tpl_vars['list']->value['09'];?>
<?php }else{ ?>0<?php }?>元</th>
				    		<th><?php if (isset($_smarty_tpl->tpl_vars['list']->value['10'])){?><?php echo $_smarty_tpl->tpl_vars['list']->value['10'];?>
<?php }else{ ?>0<?php }?>元</th>
				    		<th><?php if (isset($_smarty_tpl->tpl_vars['list']->value['11'])){?><?php echo $_smarty_tpl->tpl_vars['list']->value['11'];?>
<?php }else{ ?>0<?php }?>元</th>
				    		<th><?php if (isset($_smarty_tpl->tpl_vars['list']->value['12'])){?><?php echo $_smarty_tpl->tpl_vars['list']->value['12'];?>
<?php }else{ ?>0<?php }?>元</th>
				    		<th class="count"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['list']->value['cols_total'])===null||$tmp==='' ? '0' : $tmp);?>
元</th>
				    	</tr>
				    	<?php } ?>
				    	<!-- <tr class="income">
				    		<th>月收入</th>
				    		<th>1.00元</th>
				    		<th>2.00元</th>
				    		<th>3.00元</th>
				    		<th>4.00元</th>
				    		<th>5.00元</th>
				    		<th>6.00元</th>
				    		<th>7.00元</th>
				    		<th>8.00元</th>
				    		<th>9.00元</th>
				    		<th>10.00元</th>
				    		<th>11.00元</th>
				    		<th>12.00元</th>
				    		<th>78.00元</th>
				    	</tr>
				    	<tr class="pay">
				    		<th>月支出</th>
				    		<th>1.00元</th>
				    		<th>2.00元</th>
				    		<th>3.00元</th>
				    		<th>4.00元</th>
				    		<th>5.00元</th>
				    		<th>6.00元</th>
				    		<th>7.00元</th>
				    		<th>8.00元</th>
				    		<th>9.00元</th>
				    		<th>10.00元</th>
				    		<th>11.00元</th>
				    		<th>12.00元</th>
				    		<th>78.00元</th>
				    	</tr>
				    	<tr class="count">
				    		<th>合计</th>
				    		<th>1.00元</th>
				    		<th>2.00元</th>
				    		<th>3.00元</th>
				    		<th>4.00元</th>
				    		<th>5.00元</th>
				    		<th>6.00元</th>
				    		<th>7.00元</th>
				    		<th>8.00元</th>
				    		<th>9.00元</th>
				    		<th>10.00元</th>
				    		<th>11.00元</th>
				    		<th>12.00元</th>
				    		<th>78.00元</th>
				    	</tr> -->
				    </tbody>
					</table>
				</div>
				<!-- 曲线图容器 -->
				<div class="chart"></div>

			</div>
		</div>
	</div>

  <script src="<?php echo @JS_URL;?>
jquery-3.3.1.min.js"></script>
  <script src="<?php echo @JS_URL;?>
layui/layui.js" charset="utf-8"></script>
  <!-- Highcharts 是一个用纯JavaScript编写的一个图表库。 -->
  <script src="<?php echo @JS_URL;?>
highcharts.js"></script>
  <script src="<?php echo @JS_URL;?>
statistics.js"></script>
  <script>
  $(document).ready(function(){
  	
  });
  </script>

 </body>
</html><?php }} ?>