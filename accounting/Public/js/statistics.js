// 账单统计
layui.use(['form','table','layer','laydate','laypage'],function () {
	var form=layui.form, //加载form表单
	table=layui.table,//加载table
	layer=layui.layer,//加载layer弹出层
	laydate=layui.laydate,//加载日期插件
	laypage=layui.laypage,//架子啊分页插件
	//加载jquery框架，但无法让除layui的插件使用，如： 图表 下面用到的图表，需要另外引用jquery
	$=layui.jquery;

	//渲染一个日期控件
	// 在使用frame框架时，用火狐浏览会出现bug，js无法使用，单个页面使用没问题，估计是各个页面的js代码冲突了
  laydate.render({
    elem: '#year',
    value:'2018',//默认是2018年的月份
    type: 'year',//只允许出现年份
  });

// 点击按钮触发事件
  $('.one').on('click',function () {
  	// 获取按钮文本值
  	var val=$('.one').text();
  	// alert(val);
// 	当文本值为  显示图表  时，
  	if (val==='显示图表') {
//   		alert(val);
// 			隐藏表格显示
			$('.layui-form').css('display','none');
// 			调用图表的方法
			chart();
// 			配合图表的方法使用，等下一轮点击此事件时，不会受上一轮none的影响
			$('.chart').css('display','block');
// 			将按钮的文本改为 都显示 用来触发下一次点击的事件
			$('.one').text('都显示');
// 			并且为了显示变化，更改按钮的颜色，由于用的是layui框架，样式已经事先设定好，
// 			如果不是，我们可以用jquery中css（）方法更改样式
			$('.one').addClass('layui-btn-normal');
  	}else if(val==='都显示'){//下一次的事件触发
// 		将表格显现出来，达到效果
  		$('.layui-form').css('display','block');
// 		移除按钮上一次点击更改
			$('.one').removeClass('layui-btn-normal');
// 			将按钮更改成另外一种颜色，用来区分
			$('.one').addClass('layui-btn-warm');
// 			将按钮的文本改为  默认
			$('.one').text('默认');
  	}else{//其他事件的触发	
// 			将按钮改为一开始的颜色及文本
			$('.one').text('显示图表');
			$('.one').removeClass('layui-btn-warm');
// 			将图表隐藏
			$('.chart').css('display','none');
		}
  });

// 定义曲线图方法，调用其方法来显示图表
  function chart() {
  		var title = {
		    text: '月收支明细曲线图'
		  };
		  var subtitle = {
		    text: '收入在零的上方，支出在零的下方'
		  };
		  var xAxis = {
		    categories: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月']
		  };
		  var yAxis = {
		    title: {
		      text: '金额 (￥)'
		    },
		    plotLines: [{
		      value: 0,
		      width: 1,
		      color: '#808080'
		    }]
		  };

		  var tooltip = {
		    valueSuffix: '￥'
		  }

		  var legend = {
		    layout: 'vertical',
		    align: 'right',
		    verticalAlign: 'middle',
		    borderWidth: 0
		  };

		  //用没有索引的数组
		  var series = [{
		    name: 'Tokyo',
		    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		  },{
		    name: 'New York',
		    data: [ - 0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
		  },{
		    name: 'Berlin',
		    data: [ - 0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
		  },{
		    name: 'London',
		    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
		  }];

		  var chart={
		  	zoomType:'x'
		  };

		  var json = {};

		  json.chart = chart;
		  json.title = title;
		  // json.subtitle = subtitle;
		  json.xAxis = xAxis;
		  json.yAxis = yAxis;
		  json.tooltip = tooltip;
		  json.legend = legend;
		  json.series = series;

		  $('.chart').highcharts(json);

  }

});