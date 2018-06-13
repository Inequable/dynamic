layui.use(['element','form','table','laydate'], function(){
  var $ = layui.jquery,
  element = layui.element,
  form=layui.form,
  table=layui.table,
  laydate=layui.laydate;

  laydate.render({
    elem:'#a_date',
    range:'~'
  });

  element.tab({
    headerElem: '.site-demo-nav>li', //指定tab头元素项
    bodyElem: '.layui-body>.layui-tab-item' //指定tab主体元素项
  });

  table.render({
    elem: '#billExport',
    // height: 315,
    url: getBillExportData_url, //数据接口
    page: true, //开启分页
    cellMinWidth:80,
    cols: [[ //表头
      {field: 'id', title: 'ID', sort: true, fixed: 'left',width:80},
      {field: 'condition', title: '导出时的条件',align:'center'},
      {field: 'ip', title: 'IP（服务器--客户端）',align:'center'},
      {field: 'adate', title: '导出时间',align:'center'} 
    ]],
    id:'reloadBill'
  }); 

  form.on('submit(exportSbt)',function (_data) {
    var data = _data.field;
    var searchArray = [];
    var sc = '';
    // console.log(data);
    for(var key in data){
      var value = data[key];
      if (value!='') {
        searchArray.push('search['+key+']='+value);
      }
    }
    var searchStr = searchArray.join('&');
    if (searchStr) {
      sc='?'+searchStr;
    }
    location.href=export_url+sc;
  });

});