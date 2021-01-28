<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진결과</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


	<style>
		.result-table {
			width: 100%;
			border-top: black 2px solid;
			text-align: left;
		}

		.result-table tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.result-table th {
			background: #f6f6f6;
			text-align: left;
			padding: 1.3rem 3rem;
			vertical-align: middle;
			font-weight: 400;
		}

		.result-table td {
			vertical-align: middle;
			padding: 1.3rem 3rem;
			max-width: 30%;
		}

		.result-table td div {
			padding: 0.5rem;
		}

		.item-table {
			width: 100%;
			margin-top: 1rem;
			border: none;
		}

		.item-table img {
			width: 72px;
			height: 72px
		}

		.item-table td {
			text-align: center;
			width: calc(120rem / 6);
			height: calc(120rem / 6);
			font-weight: bolder;
			font-size: 1.7rem;
			cursor: pointer;
			border: 1px solid #DCDCDC;
		}

		.item-table .active, .item-table td:hover {
			background: #f1f1fa;
		}

		.item, .item-hover {
			align-items: center;
			font-size: 1.5rem;
			cursor: pointer;
		}

		.item-hover {
			display: none;
		}

		.item-content {
			margin-top: 1rem;
		}

		#resultCarousel .carousel-control-prev,
		#resultCarousel .carousel-control-next {
			position: relative;
			width: fit-content;
			height: fit-content;
			padding-left: 1rem;
		}

		select {
			width: 15rem;
			padding: 0 0.5rem;
			border-color: #d5d5d5;
		}

		.mainInspectionTable {
			width: 100%;
		}

		.mainInspectionTable thead {
			border-top: 2px solid black;
			border-bottom: 1px solid black;
		}

		.mainInspectionTable th {
			padding: 1.5rem;
			font-size: 1.8rem;
			font-weight: 500;
		}

		.mainInspectionTable td {
			border-bottom: 1px solid #DCDCDC;
		}

		.mainInspectionTable td:not(:last-child) {
			padding: 1.3rem;
		}

		.year-arrow {
			width: 100%;
			line-height: 1rem;
			position: absolute;
			font-size: 1rem;
			margin: 0 auto;
		}

		.bar-div {
			position: relative;
			top: 1.6rem;
		}

		.bar-div img {
			width: 27rem;
			height: 2rem;
		}

		a {
			text-decoration: none;
		}

		#navResult {
			display: none;
			border-radius: 4px;
			border-top: 1px solid #c4c4c4;
			border-left: 1px solid #c4c4c4;
			border-right: 1px solid #c4c4c4;
		}

		#navResult li a {
			display: block;
			padding: 1.2rem 2.7rem;
			text-decoration: none;
			color: black;
			text-align: left;
		}

		#navResult li ul {
			display: none;
		}

		#navResult .main-menu {
			background-color: #ece7f3;
			border-bottom: 1px solid #c4c4c4;
		}

		#navResult .sub-menu {
			border-bottom: none;
			color: #404044;
			background: white;
			font-size: 1.4rem;
		}

		#navResult .main-menu a:hover,
		#navResult .main-menu .active,
		#navResult .sub-menu a:hover,
		#navResult .sub-menu .active {
			font-weight: 500;
			color: #404044;
		}

		#navResult .sub-menu a:hover,
		#navResult .sub-menu .active {
			background-color: #f1f1fa;
		}

		.simple-result {
			width: 100%;
			height: 90%;
			max-width: 100%;
			max-height: 90%;
			min-width: 100%;
			min-height: 90%;
		}

		.simple-result td {
			vertical-align: middle;
			padding: 1rem 3rem;
			word-break: break-all;
		}

		.simple-result .year {
			font-size: 2rem;
			font-weight: 400;
		}

		.simple-result .content-1 {
			font-size: 6rem;
			font-weight: 500;
		}

		.simple-result .content-2 {
			font-size: 3rem;
			font-weight: 500;
		}
	</style>

</head>
<body>

<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/menu/side_bar_light.php');
		?>
		<!-- 우측 컨텐츠 -->
		<div class="col"
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
			<div style="height:100vh; overflow-y: auto;min-height: 90rem;">
				<!-- 상단 메뉴 -->
				<div class="container top-menu"
					 style="background-image: url(../../../../asset/images/title2.jpg)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>검진결과</span>
							<span>｜</span>
							<span>주요결과</span>
						</div>
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner" style="margin: 0 auto; ">
							<span class="title">검진결과<br></span>
							Examination Results
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="/customer/result_final">
								<div class="title-menu" style="border-right: #828282 1px solid">
									종합결과
								</div>
							</a>
							<a href="/customer/result_main">
								<div class="title-menu-select">
									주요결과
								</div>
							</a>
						</div>
					</div>
				</div>

				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="padding-top: 3rem">
							<div class="sub-title">주요결과</div>
						</div>

						<div class="row" style="margin-top: 2.5rem;">
							<div style="margin-bottom: 0.6rem;display: inline-block;width: 100%">
								<div style="float:right;">
									<select id="familySelect" onchange="setDataSelectOption()">
										<option value="ch">- 수검자 선택 -</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row" id="resultView1" style="display:none; margin-top: 2rem">
							<div style=" text-align: left;font-size: 2rem;font-weight: bolder">
								주요결과
							</div>
							<div id="resultCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
								<div style="float: left">
									항목을 클릭하면 세부 내용을 확인할 수 있습니다.
								</div>
								<div style="display: flex;float: right">
									<a class="carousel-control-prev" href="#resultCarousel" role="button"
									   data-slide="prev"><img src="/asset/images/icon_prev.png">
									</a>
									<a class="carousel-control-next" href="#resultCarousel" role="button"
									   data-slide="next"><img src="/asset/images/icon_next.png">
									</a>
								</div>

								<div class="carousel-inner">
									<div class="carousel-item active">
										<table class="table-bordered item-table" id="inspectionItemTable">
											<tr id="categoryTable_1">

											</tr>
										</table>
									</div>
									<div class="carousel-item">
										<table class="table-bordered item-table">
											<tr id="categoryTable_2">

											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>

						<div class="row" style="display:flex; margin-top: 4rem">
							<div style="width: 70%;padding-right: 2rem" id="simpleDraw">

							</div>
							<div style="width: 30%;overflow-y: auto;height: 40rem">
								<ul id="navResult">

								</ul>
							</div>
						</div>

						<div class="row" style="display:block; margin-top: 5rem">
							<div id="resultTable">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<script>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	// 결과 업로드 된 가족 목록
	instance.post('CU_005_001', userData).then(res => {
		setFamilySelectOption(res.data);
	});

	//수검자 이름 셀렉트 셋팅
	function setFamilySelectOption(data) {
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<option value=\'' + data[i].famId + '\'>' + data[i].famName + '</option>'
			$("#familySelect").append(html);
		}
	}

	var resultData = new Object();

	//수검자 선택 데이터 받기
	function setDataSelectOption() {
		$("#dateSelect").empty();
		var val = $("#familySelect option:selected").val();
		if (val == 'ch') {
			return;
		}

		$('#resultView1').show();

		var sendItems = new Object();
		sendItems.famId = val;

		instance.post('CU_005_002', sendItems).then(res => {
			resultData = res.data;
			// 연도별 정렬

			resultData.sort(function (a, b) {
				const yearA = a.year.toUpperCase(); // ignore upper and lowercase
				const yearB = b.year.toUpperCase(); // ignore upper and lowercase
				if (yearA < yearB) {
					return -1;
				}
				if (yearA > yearB) {
					return 1;
				}
				return 0;
			});

			classifyCategory();
		});
	}

	let baseCategory = ['기본검사', '신장검사', '일반혈액검사', '심혈관계검사', '간기능/간염검사'
		, '당뇨/췌장/빈혈검사', '갑상선/류마티스/통풍검사', '종양검사'
		, '비뇨생식계 및 성별 질환', '장비검사', '기타검사'];

	var categoryA = [];
	//var categoryB = new Set();
	var categoryC = new Set();

	var category = [];

	//카테고리 분류
	function classifyCategory() {
		var tempA = new Set();
		//전체 카테고리 중복제거 분류
		for (i = 0; i < resultData.length; i++) {
			for (j = 0; j < resultData[i].resultItemList.length; j++) {
				tempA.add(resultData[i].resultItemList[j].categoryA);
				categoryC.add(resultData[i].resultItemList[j].inspection);
			}
		}

		categoryA = Array.from(tempA);

		//array를 baseCategory 순서에 맞게 정렬
		categoryA.sort(function (a, b) {
			if (baseCategory.indexOf(a) > baseCategory.indexOf(b)) return 1;
			else if (baseCategory.indexOf(a) === baseCategory.indexOf(b)) return 0;
			else if (baseCategory.indexOf(a) < baseCategory.indexOf(b)) return -1;
		});

		var categoryAB = [];

		//A-B 세팅
		for (let i = 0; i < categoryA.length; i++) {
			let targetCategory = categoryA[i];
			var targetCategoryBSet = new Set();

			for (let j = 0; j < resultData.length; j++) {//3개년도
				for (let k = 0; k < resultData[j].resultItemList.length; k++) {//모든항목
					var row = resultData[j].resultItemList[k];
					if (row.categoryA === targetCategory) {
						targetCategoryBSet.add(row.categoryB);
					}
				}
			}
			let targetCategoryBList = Array.from(targetCategoryBSet);
			var obj = {};
			obj.title = targetCategory;
			obj.list = targetCategoryBList;
			categoryAB.push(obj);
		}

		//A-B-검사항목 세팅
		for (let i = 0; i < categoryAB.length; i++) {
			let categoryTitleA = categoryAB[i].title;
			let categoryListA = categoryAB[i].list;

			var categoryBList = [];

			for (let j = 0; j < categoryListA.length; j++) {
				let categoryTitleB = categoryListA[j];
				var targetInspectionSet = new Set();

				for (let k = 0; k < resultData.length; k++) {//모든항목
					for (let l = 0; l < resultData[k].resultItemList.length; l++) {//모든항목
						var row = resultData[k].resultItemList[l];
						if (row.categoryA === categoryTitleA && row.categoryB === categoryTitleB) {
							targetInspectionSet.add(row.inspection);
						}
					}
				}

				let targetInspectionList = Array.from(targetInspectionSet);

				var obj = {};
				obj.title = categoryTitleB;
				obj.list = targetInspectionList;
				categoryBList.push(obj);
			}

			var obj = {};
			obj.title = categoryTitleA;
			obj.list = categoryBList;
			category.push(obj);
		}
		setInspectionItemTable();
	}

	//검사결과 카테고리 디스플레이
	function setInspectionItemTable() {
		$("#categoryTable_1").empty();
		$("#categoryTable_2").empty();
		let cnt = 0;
		for (let i = 0; i < categoryA.length; i++) {
			let imgIdx = baseCategory.indexOf(categoryA[i]) + 1;
			let html =
					'<td onclick="categoryClick(this, \'' + i + '\')">' +
					'<div class="item">' +
					'<img src="/asset/images/icon_inspection' + imgIdx + '_2.png">' +
					'<div class="item-content">' +
					categoryA[i] +
					'</div>' +
					'</div>' +
					'<div class="item-hover">' +
					'<img src="/asset/images/icon_inspection' + imgIdx + '_1.png">' +
					'<div class="item-content">' +
					categoryA[i] +
					'</div>' +
					'</div>' +
					'</td>';
			categoryADraw(i, html);
			cnt = i;
		}

		for (let i = cnt; i < baseCategory.length; i++) {
			let html = '<td></td>';
			categoryADraw(i, html)
		}
	}

	function categoryADraw(i, html) {
		if (i < 6) {
			$("#categoryTable_1").append(html);
		} else {
			$("#categoryTable_2").append(html);
		}
	}

	var yearArr = new Array();

	function settingTable(item, idx) {
		$(item).children('.item').hide();
		$(item).children('.item-hover').show();
		$(item).addClass('active');

		$('.item-table td').not(item).children('.item').show();
		$('.item-table td').not(item).children('.item-hover').hide();
		$('.item-table td').not(item).removeClass('active');

		$("#resultTable").empty();
		$("#resultAcc").empty();
		yearArr = [];

		var tableHead = '';
		tableHead += '<tr><th width="35%">검사항목</th>';
		var yearString = '';
		for (i = 0; i < resultData.length; i++) {
			yearArr.push(resultData[i].year.split('-')[0]);
			tableHead += '<th>' + resultData[i].year.split('-')[0] + '</th>';
			let color = (i === 0) ? '#af7f36' : (i === 1) ? '#3480bf' : '#000000';
			yearString += '<span style="color:' + color + '">▲&nbsp;</span>' + resultData[i].year.split('-')[0];
			if (i != resultData.length - 1) {
				yearString += '&nbsp;&nbsp';
			}
		}
		tableHead += '<th width="35%">검사결과 ' +
				'<span style="font-size: 1.3rem">(' + yearString + ')</span>' +
				'</th></tr>';

		let html = '';
		var AccHtml = '';

		let selectedCategory = category[idx].list;

		for (i = 0; i < selectedCategory.length; i++) {
			let inspectionList = selectedCategory[i].list;
			let categoryBTitle = selectedCategory[i].title;

			var canWrite = false;
			var subHtml = '';
			subHtml += '<div style="width: 100%;height: 4rem">' +
					'<div style="float: left">' +
					'<h1>' + categoryBTitle + '</h1>' + //중분류 검사명
					'</div>' +
					'</div>' +
					'<table class="mainInspectionTable table-striped">' +
					'<thead>' +
					tableHead +
					'</thead>' +
					'<tbody>';

			AccHtml += '<li>' +
					'<div class="dropdownlink">' + categoryBTitle + '</div>' +
					'<ul class="submenuItems">';

			for (j = 0; j < inspectionList.length; j++) {
				let inspection = inspectionList[j];

				//검사항목명
				var tmpHtml = '<tr><td>' + inspection + '</td>';
				var canDraw = false;
				var arrowArr = ['blank', 'blank', 'blank'];

				for (let k = 0; k < resultData.length; k++) {
					let resultItemList = resultData[k].resultItemList;
					for (let l = 0; l < resultItemList.length; l++) {
						if (resultItemList[l].inspection === inspection) {
							tmpHtml += '<td>' + resultItemList[l].result + '</td>';
							arrowArr[k] = resultItemList[l].resultCase + "/" + resultItemList[l].resultRatio;
							if (!canDraw) {
								if (resultItemList[l].resultCase === 'B') {//낮정~높정 아니면 비정상
									canDraw = resultItemList[l].resultRatio < 33 || resultItemList[l].resultRatio > 66;
								} else if (resultItemList[l].resultCase === 'C') {//낮으면 비정상
									canDraw = resultItemList[l].resultRatio < 50;
								} else if (resultItemList[l].resultCase === 'D') {//높으면 비정상
									canDraw = resultItemList[l].resultRatio > 50;
								}
							}
							break;
						} else if (l === resultItemList.length - 1) {
							tmpHtml += '<td></td>';
						}
					}
				}

				tmpHtml += '<td><div style="width: 100%;padding-bottom: 1.8rem">';

				if (canDraw) {
					canWrite = true;
					let rCase = 'A';

					for (let k = 0; k < resultData.length; k++) {
						if (arrowArr[k] !== 'blank') {
							rCase = arrowArr[k].split("/")[0];
						}
					}

					tmpHtml += '<div style="position: relative;width: 100%;margin: 0 auto">';

					for (let k = 0; k < resultData.length; k++) {
						if (arrowArr[k] !== 'blank') {
							let a = parseFloat(arrowArr[k].split("/")[1]);
							let rRatio = (a - 50) * 2.7 * 0.1;
							let color = (k === 0) ? '#af7f36' : (k === 1) ? '#3480bf' : '#000000';
							if (rCase !== 'A') {
								tmpHtml += '<div class="year-arrow" ' +
										'style="color:' + color + '; ' +
										'margin-left: ' + rRatio + 'rem">' +
										'<span style="font-size: 0.6rem">' + yearArr[k] +
										'</span><br>▼' + '</div>';
							}
						}
					}
					tmpHtml += '</div>';
					if (rCase === 'B') {
						tmpHtml += '<div class="bar-div">' +
								'<img src="/asset/images/img_grade_bar.png">' +
								'</div>';
					} else {
						tmpHtml += '<div class="bar-div">' +
								'<img src="/asset/images/img_true_false_bar.png">' +
								'</div>';
					}
					tmpHtml += '</div></td></tr>';
					subHtml += tmpHtml;
				}
			}
			if (canWrite) {
				html += subHtml;
				html += '</tbody>';
				html += '</table><br>';
				AccHtml += '</ul></li>';
			}
		}

		$("#resultAcc").append(AccHtml);
		$("#resultTable").append(html);

		if ($("#resultTable").text() == '') {
			$("#resultTable").append('<tr><td>해당 결과에 이상이 없습니다.</td></tr>');
		}
	}

	function settingGraph(item, idx) {
		$('#navResult').show();

		$('#navResult').empty();
		var html = '';
		let categoryAList = category[idx].list;
		for (let i = 0; i < categoryAList.length; i++) {
			html += '<li class="main-menu">' +
					'<a class="main-menu-item" href="#">' +
					(categoryAList[i].title == '' ? category[idx].title : categoryAList[i].title)
					+ '</a>' + '<ul>';
			let categoryBList = categoryAList[i].list;
			for (let j = 0; j < categoryBList.length; j++) {
				html += '<li class="sub-menu" onclick="setSimpleResult(\'' + categoryBList[j] + '\')">' +
						'<a href="#">' + categoryBList[j] + '</a></li>';
			}
			html += '</ul>' +
					'</li>';
		}
		$('#navResult').append(html);
	}

	function setSimpleResult(inspection) {
		var inspectionResult = new Array();
		var basic = '';

		console.log(resultData);
		for (i = 0; i < resultData.length; i++) {
			for (j = 0; j < resultData[i].resultItemList.length; j++) {
				if (resultData[i].resultItemList[j].inspection == inspection) {
					inspectionResult.push(resultData[i].resultItemList[j].result);
					basic = resultData[i].resultItemList[j].normalRange;
				}
			}
		}

		if (isNaN(parseInt(inspectionResult[0]))) {
			drawString(inspection, inspectionResult);
		} else {
			drawGraph(inspection, inspectionResult, basic);
		}
	}

	function drawGraph(inspection, inspectionResult, basic) {
		$('#simpleDraw').html('<canvas id="chart" style="width: 100%;height: 100%"></canvas>' +
				'<div style="text-align: right"><span style="color:rgb(195,255,195) ">■</span> 정상수치범위</div>');

		var ctx = document.getElementById('chart');

		var originalLineDraw = Chart.controllers.line.prototype.draw;
		Chart.helpers.extend(Chart.controllers.line.prototype, {
			draw: function () {
				var chart = this.chart;
				var yHighlightRange = chart.config.data.yHighlightRange;

				if (yHighlightRange !== undefined) {
					var ctx = chart.chart.ctx;

					var yRangeBegin = yHighlightRange.begin;
					var yRangeEnd = yHighlightRange.end;

					var xaxis = chart.scales['x-axis-0'];
					var yaxis = chart.scales['y-axis-0'];

					var yRangeBeginPixel = yaxis.getPixelForValue(yRangeBegin);
					var yRangeEndPixel = yaxis.getPixelForValue(yRangeEnd);
					ctx.fillStyle = 'rgba(150,255,150,0.1)';
					ctx.fillRect(xaxis.left, Math.min(yRangeBeginPixel, yRangeEndPixel), xaxis.right - xaxis.left,
							Math.max(yRangeBeginPixel, yRangeEndPixel) - Math.min(yRangeBeginPixel, yRangeEndPixel));

					ctx.save();
					ctx.restore();
				}

				originalLineDraw.apply(this, arguments);
			}
		});

		var basicArr = new Array();
		if (basic.indexOf('이상') != -1) {
			basicArr[0] = basic.split('이상')[0];
			basicArr[1] = 1000;

		} else if(basic.indexOf('이하') != -1) {
			basicArr[0] = -1000;
			basicArr[1] = basic.split('이하')[0];
		} else {
			basicArr = basic.split('~');
		}
		console.log(basicArr);

		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: yearArr,
				datasets: [{
					label: inspection,
					data: inspectionResult,
					fill: false,
					borderColor: 'rgb(255,153,0)',
					pointBackgroundColor: 'rgb(255,153,0)',
					borderWidth: 3
				}],
				yHighlightRange: {
					begin: basicArr[0],
					end: basicArr[1]
				}
			},
			options: {}
		});
	}

	function drawString(inspection, inspectionResult) {
		var html = '';
		html += '<h2 style="float: left">' + inspection + '</h2>' +
				'<table class="simple-result">' +
				'<tr>';

		for (i = 0; i < inspectionResult.length; i++) {
			if (i % 2 == 0) {
				html += '<td style="background: #f8eece">';
			} else {
				html += '<td style="background: #d7e3ec">';
			}
			html += '<div class="year">' + yearArr[i] + '</div>';

			if (inspectionResult[i].length < 10) {
				html += '<div class="content-1">' + inspectionResult[i] + '</div>';
			} else {
				html += '<div class="content-2">' + inspectionResult[i] + '</div>';
			}
			html += '</td>';
		}
		$('#simpleDraw').html(html);
	}

	//카테고리 클릭 테이블 뷰 셋팅
	function categoryClick(item, idx) {
		settingTable(item, idx);
		settingGraph(item, idx);
	}

	$(document).on("click", "#navResult > li > a", function () {
		$(this).next().slideToggle(300);
		$(this).addClass('active');
		$('#navResult > li > a').not(this).next().slideUp(300);
	});

	$(document).on("click", ".sub-menu a", function () {
		$(this).addClass('active');
		$('.sub-menu a').not(this).removeClass('active');
	});
</script>

</html>
