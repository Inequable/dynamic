layui.use(['table','element','form','laypage','layer','flow'], function(){
  var table = layui.table,//表格
  element=layui.element,//元素操作
  form=layui.form,//表单
  laypage=layui.laypage,//分页
  layer=layui.layer,//弹窗
  $=layui.jquery;//jquery插件
  flow=layui.flow;//流加载

  //流加载
  // flow.load({
  //   elem:'.layui-table tbody',//流加载容器
  //   scrollElem:'.layui-table tbody',//
  //   done:function (page,next) {
      
  //   },
  // });

  table.render({
    id:'colData',
    elem: '#colData',
    url:url_json,
    cellMinWidth: 80, //全局定义常规单元格的最小宽度，layui 2.2.1 新增
    cols: [[
      {field:'id', width:80, title: 'ID', sort: true,align:'center'},
      {field:'cols', width:100, title: '分类名称', edit:'text', align:'center'},
      {field:'cols_account', width:120, title: '收支分类', sort: true, align:'center', edit: 'text'},
      {field:'cols_info', title: '备注信息', event: 'setInfo', edit:'text'},
      {field:'cols_date', width:200, title: '分类创建时间', align:'center'},
      {field:'cols_finallydate', width:200, title: '最后修改时间', align:'center'},
      {fixed: 'right', width:125, title:'操作', align:'center', toolbar: '#column'}
    ]],
    // page: {layout: ['prev', 'page', 'next', 'skip','count',],},
    page: true,
  });

  //监听工具条
  table.on('tool(colData)', function(obj){ //注：tool是工具条事件名，billData是table原始容器的属性 lay-filter="对应的值"
    var data = obj.data //获得当前行数据
    ,layEvent = obj.event; //获得 lay-event 对应的值
    if(layEvent === 'colDel'){
      layer.confirm('真的删除行么', function(index){
        obj.del(); //删除对应行（tr）的DOM结构
        layer.close(index);
        //向服务端发送删除指令，路径为 url_del
        $.ajax({
          type:'get',
          url:url_del,
          data:{id:data.id},
          success:function (result) {
            layer.msg(result);
          },
        });
      });
    } else if(layEvent === 'colModify'){
      //路径为 url_mod
      //当data.cols_account的值为收入或支出并且data.cols_info.length小于等于200个字符，进行修改操作
      if ((data.cols_account=='收入' || data.cols_account=='支出') && data.cols_info.length<=200) {
        $.ajax({
          // async:false,
          type:'post',
          url:url_mod,
          data:{id:data.id,cols:data.cols,cols_account:data.cols_account,cols_info:data.cols_info},
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
        value: data.cols_info
      }, function(value, index){
        layer.close(index);
        //这里一般是发送修改的Ajax请求.路径为 url_mod

        //同步更新表格和缓存对应的值
        obj.update({
          cols_info: value
        });
      });
    }
  });

  //监听单元格编辑
  table.on('edit(colData)', function(obj){
    var value = obj.value, //得到修改后的值
    data = obj.data, //得到所在行所有键值
    field = obj.field; //得到字段
    layer.msg('[ID: '+ data.id +'] ' + field + ' 字段更改为：'+ value);
  });

  //节点克隆,并清空节点内容
  $('#addCol').on('click',function () {
    //只clone第一个
    $(".col-node").append($(".col .site-block:first").clone(true));
    //重新渲染组件
    form.render('select');
    //清空表单的数据后clone
    $(':input','.col-node')  
    .not(':button, :submit, :reset, :hidden')  
    .val('')  
    .removeAttr('checked')  
    .removeAttr('selected');
    checkNode();
  });
  
  checkNode();//时刻检查
  //检查节点个数，判断是否让 删除节点按钮显示
  function checkNode() {
    if ($('.col-node .site-block').length<=0) {
      // console.log('asdjkhk');
      $('#delCol').hide();
    }else{
      // console.log($('.col-node .site-block').length);
      $('#delCol').show();
    }
  }
  
  //删除clone节点
  $('#delCol').on('click',function () {
    $(".col-node .site-block:last").remove();
    checkNode();
  });

});