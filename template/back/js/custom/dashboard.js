	var chart;
	AmCharts.ready(function() {
		// SERIAL CHART
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData1;
		chart.categoryField = "country";
		chart.startDuration = 1;
	
		// AXES
		// category
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 45; // this line makes category values to be rotated
		categoryAxis.gridAlpha = 0;
		categoryAxis.fillAlpha = 1;
		categoryAxis.fillColor = "#FAFAFA";
		categoryAxis.gridPosition = "start";
	
		// value
		var valueAxis = new AmCharts.ValueAxis();
		valueAxis.dashLength = 5;
		valueAxis.title = cost_txt;
		valueAxis.axisAlpha = 0;
		chart.addValueAxis(valueAxis);
	
		// GRAPH
		var graph = new AmCharts.AmGraph();
		graph.valueField = "visits";
		graph.colorField = "color";
		graph.balloonText = "<b>[[category]]: "+currency+"[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 1;
		chart.addGraph(graph);
	
		// CURSOR
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
	
		chart.creditsPosition = "top-right";
	
		// WRITE
		chart.write("chartdiv");
	});
	
	var chart;
	AmCharts.ready(function() {
		// SERIAL CHART
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData2;
		chart.categoryField = "country";
		chart.startDuration = 1;
	
		// AXES
		// category
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 45; // this line makes category values to be rotated
		categoryAxis.gridAlpha = 0;
		categoryAxis.fillAlpha = 1;
		categoryAxis.fillColor = "#FAFAFA";
		categoryAxis.gridPosition = "start";
	
		// value
		var valueAxis = new AmCharts.ValueAxis();
		valueAxis.dashLength = 5;
		valueAxis.title = value_txt;
		valueAxis.axisAlpha = 0;
		chart.addValueAxis(valueAxis);
	
		// GRAPH
		var graph = new AmCharts.AmGraph();
		graph.valueField = "visits";
		graph.colorField = "color";
		graph.balloonText = "<b>[[category]]: "+currency+"[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 1;
		chart.addGraph(graph);
	
		// CURSOR
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
	
		chart.creditsPosition = "top-right";
	
		// WRITE
		chart.write("chartdiv2");
	});
	
	
	var chart;
	AmCharts.ready(function() {
		// SERIAL CHART
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData3;
		chart.categoryField = "country";
		chart.startDuration = 1;
	
		// AXES
		// category
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 45; // this line makes category values to be rotated
		categoryAxis.gridAlpha = 0;
		categoryAxis.fillAlpha = 1;
		categoryAxis.fillColor = "#FAFAFA";
		categoryAxis.gridPosition = "start";
	
		// value
		var valueAxis = new AmCharts.ValueAxis();
		valueAxis.dashLength = 5;
		valueAxis.title = loss_txt;
		valueAxis.axisAlpha = 0;
		chart.addValueAxis(valueAxis);
	
		// GRAPH
		var graph = new AmCharts.AmGraph();
		graph.valueField = "visits";
		graph.colorField = "color";
		graph.balloonText = "<b>[[category]]: "+currency+"[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 1;
		chart.addGraph(graph);
	
		// CURSOR
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
	
		chart.creditsPosition = "top-right";
	
		// WRITE
		chart.write("chartdiv3");
	});
	
	
	var chart;
	AmCharts.ready(function() {
		// SERIAL CHART
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData4;
		chart.categoryField = "country";
		chart.startDuration = 1;
	
		// AXES
		// category
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 45; // this line makes category values to be rotated
		categoryAxis.gridAlpha = 0;
		categoryAxis.fillAlpha = 1;
		categoryAxis.fillColor = "#FAFAFA";
		categoryAxis.gridPosition = "start";
	
		// value
		var valueAxis = new AmCharts.ValueAxis();
		valueAxis.dashLength = 5;
		valueAxis.title = pl_txt;
		valueAxis.axisAlpha = 0;
		chart.addValueAxis(valueAxis);
	
		// GRAPH
		var graph = new AmCharts.AmGraph();
		graph.valueField = "visits";
		graph.colorField = "color";
		graph.balloonText = "<b>[[category]]: "+currency+"[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 1;
		chart.addGraph(graph);
	
		// CURSOR
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
	
		chart.creditsPosition = "top-right";
	
		// WRITE
		chart.write("chartdiv4");
	});
	
	$(document).ready(function() {
		var opts1 = {
			//lines: 10, // The number of lines to draw
			angle: 0.36, // The length of each line
			lineWidth: 0.06, // The line thickness
			radiusScale: 1,
			pointer: {
				length: 1, // The radius of the inner circle
				strokeWidth: 0.053, // The rotation offset
				color: '#242d3c' // Fill color
			},
			limitMax: false, // If true, the pointer will not go past the end of the gauge
			limitMin: false,
			colorStart: '#18af92', // Colors
			colorStop: '#18af92', // just experiment with them
			strokeColor: '#ddd', // to see which ones work best for you
			generateGradient: true,
			highDpiSupport: true
		};
	
		var opts2 = {
			//lines: 10, // The number of lines to draw
			angle: 0.36, // The length of each line
			lineWidth: 0.06, // The line thickness
			radiusScale: 1,
			pointer: {
				length: 1, // The radius of the inner circle
				strokeWidth: 0.053, // The rotation offset
				color: '#242d3c' // Fill color
			},
			limitMax: false, // If true, the pointer will not go past the end of the gauge
			limitMin: false,
			colorStart: '#feab34', // Colors
			colorStop: '#feab34', // just experiment with them
			strokeColor: '#ddd', // to see which ones work best for you
			generateGradient: true,
			highDpiSupport: true
		};
	
		var opts3 = {
			//lines: 10, // The number of lines to draw
			angle: 0.36, // The length of each line
			lineWidth: 0.06, // The line thickness
			radiusScale: 1,
			pointer: {
				length: 1, // The radius of the inner circle
				strokeWidth: 0.053, // The rotation offset
				color: '#242d3c' // Fill color
			},
			limitMax: true, // If true, the pointer will not go past the end of the gauge
			limitMin: false,
			colorStart: '#e9573f', // Colors
			colorStop: '#e9573f', // just experiment with them
			strokeColor: '#ddd', // to see which ones work best for you
			generateGradient: true,
			highDpiSupport: true
		};
	
	
		var target = document.getElementById('gauge1'); // your canvas element
		var gauge = new Donut(target).setOptions(opts1); // create sexy gauge!
		gauge.maxValue = stock_max; // set max gauge value
		gauge.animationSpeed = 32; // set animation speed (32 is default value)
		gauge.set(stock); // set actual value
		gauge.setTextField(document.getElementById("gauge1-txt"));
		
		var target = document.getElementById('gauge2'); // your canvas element
		var gauge = new Donut(target).setOptions(opts2); // create sexy gauge!
		gauge.maxValue = sale_max; // set max gauge value
		gauge.animationSpeed = 32; // set animation speed (32 is default value)
		gauge.set(sale); // set actual value
		gauge.setTextField(document.getElementById("gauge2-txt"));
	
		var target = document.getElementById('gauge3'); // your canvas element
		var gauge = new Donut(target).setOptions(opts3); // create sexy gauge!
		gauge.maxValue = destroy_max; // set max gauge value
		gauge.animationSpeed = 32; // set animation speed (32 is default value)
		gauge.set(destroy); // set actual value
		gauge.setTextField(document.getElementById("gauge3-txt"));
		
		var updateGauge;
		var gaugeSwitch = document.getElementById('auto-gauge1');
		gaugeSwitch.checked = false;
		new Switchery(gaugeSwitch);
	
		gaugeSwitch.onchange = function() {
			if (gaugeSwitch.checked) {
				updateGauge = setInterval(function() {
					gauge.set(activeit.randomInt(1, 1500));
				}, 2000)
			} else {
				clearInterval(updateGauge);
			}
		};
	
		var updateGauge;
		var gaugeSwitch = document.getElementById('auto-gauge2');
		gaugeSwitch.checked = false;
		new Switchery(gaugeSwitch);
	
		gaugeSwitch.onchange = function() {
			if (gaugeSwitch.checked) {
				updateGauge = setInterval(function() {
					gauge.set(activeit.randomInt(1, 1500));
				}, 2000)
			} else {
				clearInterval(updateGauge);
			}
		};
	
		var updateGauge;
		var gaugeSwitch = document.getElementById('auto-gauge3');
		gaugeSwitch.checked = false;
		new Switchery(gaugeSwitch);
	
		gaugeSwitch.onchange = function() {
			if (gaugeSwitch.checked) {
				updateGauge = setInterval(function() {
					gauge.set(activeit.randomInt(1, 1500));
				}, 2000)
			} else {
				clearInterval(updateGauge);
			}
		};
	
	});