layui.use(['table','element','form','laypage','layer'], function(){
  var table = layui.table,//表格
  element=layui.element,//元素操作
  form=layui.form,//表单
  laypage=layui.laypage,//分页
  layer=layui.layer,//弹窗
  $=layui.jquery;//jquery插件

  //实例化table
  table.render({
    elem: '#listData',
    url: url_json,
    cellMinWidth: 80, //全局定义常规单元格的最小宽度，layui 2.2.1 新增
    cols: [[
      {field:'id', width:80, title: 'ID', sort: true, align:'center'},
      {field:'account', width:100, title: '收支分类', align:'center', edit:'text'},
      {field:'a_cols', width:100, title: '用途分类', align:'center'},
      {field:'money', width:120, title: '金额', sort:true, align:'center', edit:'text'},
      {field:'a_info', title: '备注信息', event: 'setInfo', style:'cursor: pointer;'},
      {field:'a_date', width:120, title: '时间', align:'center'},
      {field:'a_finallydate', width:200, title: '最后修改时间', align:'center'},
      {fixed: 'right', title:'操作', width:125, align:'center', toolbar: '#bill'}
    ]],
    page: true,
  });

  //监听工具条
  table.on('tool(billData)', function(obj){ //注：tool是工具条事件名，billData是table原始容器的属性 lay-filter="对应的值"
    var data = obj.data, //获得当前行数据
    layEvent = obj.event; //获得 lay-event 对应的值
    if(layEvent === 'del'){
      layer.confirm('真的删除行么', function(index){
        obj.del(); //删除对应行（tr）的DOM结构
        layer.close(index);
        //向服务端发送删除指令,用ajax发送
        $.ajax({
          type:'get',
          url:url_del,
          data:{id:data.id},
          success:function (result) {
            layer.msg(result);
          },
        });
      });
     } else if(layEvent === 'modify'){
      if ((data.cols_account=='收入' || data.account=='支出') && data.a_info.length<=200) {
        $.ajax({
          // async:false,
          type:'post',
          url:url_mod,
          data:{
            id:data.id,
            money:data.money,
            account:data.account,
            a_cols:data.a_cols,
            a_info:data.a_info,
          },
          success:function (result) {
            layer.msg(result);
          },
        });
      }else{
        layer.msg('修改失败+.+，收支分类不合法！备注信息超出200字符限制！');
        table.reload('colData',{//表格重载
          // page:{curr:1} //从第一页开始，不设置就是原页ajax刷新
        });
      }
    } else if(obj.event === 'setInfo'){
      layer.prompt({
        formType: 2,
        title: '修改 ID 为 ['+ data.id +'] 的备注信息',
        value: data.a_info
      }, function(value, index){
        layer.close(index);
        //这里一般是发送修改的Ajax请求
        
        //同步更新表格和缓存对应的值
        obj.update({
          a_info: value
        });
      });
    }
  });

  //监听单元格编辑
  table.on('edit(billData)', function(obj){
    var value = obj.value, //得到修改后的值
    data = obj.data, //得到所在行所有键值
    field = obj.field; //得到字段
    layer.msg('[ID: '+ data.id +'] 的一行被更改为：'+ value);
  });

  //时间范围选择
  $(function(){
    $("#startTime").bind("click",function(){
      WdatePicker({doubleCalendar:true,startDate:'%y-{%M-1}-%d',dateFmt:'yyyy-MM-dd',autoPickDate:true,maxDate:'#F{$dp.$D(\'endTime\')||\'%y-%M-%d\'}',onpicked:function(){endTime.click();}});
    });
    $("#endTime").bind("click",function(){
      WdatePicker({doubleCalendar:true,startDate:'%y-{%M-1}-%d',minDate:'#F{$dp.$D(\'startTime\')}',maxDate:'%y-%M-%d',dateFmt:'yyyy-MM-dd',autoPickDate:true});
    });
  });

});