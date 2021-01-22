<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:주요결과</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>
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
			width: 50%;
			height: 50%;
		}

		.item-table td {
			text-align: center;
			font-weight: bolder;
			cursor: pointer;
			border: 1px solid #DCDCDC;
			word-break:break-all;
			padding: 0 1rem;
		}

		.item-table .active, .item-table td:hover {
			background: #f1f1fa;
		}

		.item, .item-hover {
			align-items: center;
			font-size: 1.4rem;
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
			padding: 0.5rem;
			font-size: 1.4rem;
			font-weight: 500;
		}

		.mainInspectionTable td {
			padding: 0.5rem;
			border-bottom: 1px solid #DCDCDC;
			font-size: 1.3rem;
		}

		.mainInspectionTable .grade {
			padding: 0.7rem 0;
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
		}

		#simpleDraw {
			display: block;
			width: 100%;
			margin-top: 2rem;
		}

		.table-box {
			margin: 0.3rem;
			background-color: white;
			box-shadow: 0px 0px 15px #cdcdcd;
			border-radius: 4px;
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
			width: 100%;
			vertical-align: middle;
			padding: 0.3rem 2rem;
			word-break: break-all;
			text-align: left;
		}

		.simple-result .year {
			font-size: 1.5rem;
			font-weight: 400;
			background: #f8eece;
		}

		.simple-result .content {
			font-size: 2rem;
			font-weight: 300;
			padding: 0.3rem 3rem;
		}
	</style>

</head>
<body>

<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/menu/side.php');
	?>
</header>

<div id="main">
	<div class="sub-title-height"
		 style="background-image: url(../../../../asset/images/mobile/bg_sub3.jpg);
		 background-size: 100%;background-position: center">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">검진결과</span><br>
					쉽고 간편하게 지난 검진 결과를 <br>
					확인하실 수 있습니다.
				</div>
			</div>

			<div class="row" style="position: relative">
				<?php
				$parentDir = dirname(__DIR__ . '..');
				require($parentDir . '/common/sub_drop_down.php');
				?>
			</div>

			<!--본문-->
			<div class="row" style="display: block;margin-top: 9rem">
				<img src="/asset/images/mobile/icon_sub_title_bar.png">
				<h1>주요결과</h1>
			</div>

			<div class="row" style="margin-top: 5rem;display: inline-block">
				<select id="familySelect" style="float:right;"
						onchange="setDataSelectOption()">
					<option value="ch">- 수검자 선택 -</option>
				</select>
			</div>

			<hr>

			<div class="row" id="resultView1" style="display:none;">
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
						<div class="carousel-item">
							<table class="table-bordered item-table">
								<tr id="categoryTable_3">

								</tr>
							</table>
						</div>
						<div class="carousel-item">
							<table class="table-bordered item-table">
								<tr id="categoryTable_4">

								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="margin-top: 4rem">
				<div id="navResult" style="margin: 0 auto">
					<div style="font-size: 1.3rem; color: #5849ea; font-weight: 400">선택한 검사의 결과수치를 그래프로 확인하실 수 있습니다.
					</div>
					<select id="resultOption1" onchange="setSelectSubOption()">
					</select>
					<select id="resultOption2" onchange="setSimpleResult();">
					</select>
				</div>
				<div id="simpleDraw">

				</div>
			</div>

			<div class="row" style="display:block; margin-top: 5rem">
				<div id="resultTable">

				</div>
			</div>
		</div>

		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/common/footer.php');
		?>
	</div>
</div>
</body>

<script>
	$('#menu1 .nav-button').text('검진결과');
	var menu2 = '종합결과';

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/sub_drop_down.js');
	?>

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
		$("#categoryTable_3").empty();
		$("#categoryTable_4").empty();

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

		var size = $('#resultCarousel').width() / 3;
		console.log(size);
		$('.item-table td').width(size);
		$('.item-table td').height(size);
	}

	function categoryADraw(i, html) {
		if (i < 3) {
			$("#categoryTable_1").append(html);
		} else if (i < 6) {
			$("#categoryTable_2").append(html);
		} else if (i < 9) {
			$("#categoryTable_3").append(html);
		} else {
			$("#categoryTable_4").append(html);
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
		tableHead += '</tr>';

		let html = '';
		var AccHtml = '';

		let selectedCategory = category[idx].list;

		for (i = 0; i < selectedCategory.length; i++) {
			let inspectionList = selectedCategory[i].list;
			let categoryBTitle = selectedCategory[i].title;

			var canWrite = false;
			var subHtml = '';
			subHtml += '<h2 style="float: left">' + categoryBTitle + '</h2>' + //중분류 검사명
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
							arrowArr[k] = resultItemList[l].resultCase + "/" + resultItemList[l].resultRatio;
							if (resultItemList[l].resultCase === 'B') {//낮정~높정 아니면 비정상
								canDraw = resultItemList[l].resultRatio < 33 || resultItemList[l].resultRatio > 66;
								if (resultItemList[l].resultRatio < 33) {
									tmpHtml += '<td style="color: blue">' + resultItemList[l].result + ' ▼</td>';
								} else if (resultItemList[l].resultRatio > 66) {
									tmpHtml += '<td style="color: red">' + resultItemList[l].result + ' ▲</td>';
								} else tmpHtml += '<td>' + resultItemList[l].result + '</td>';
							} else if (resultItemList[l].resultCase === 'C') {//낮으면 비정상
								canDraw = resultItemList[l].resultRatio < 50;
								if (resultItemList[l].resultRatio < 50) {
									tmpHtml += '<td style="color: blue">' + resultItemList[l].result + ' ▼</td>';
								} else tmpHtml += '<td>' + resultItemList[l].result + '</td>';
							} else if (resultItemList[l].resultCase === 'D') {//높으면 비정상
								canDraw = resultItemList[l].resultRatio > 50;
								if (resultItemList[l].resultRatio > 50) {
									tmpHtml += '<td style="color: red">' + resultItemList[l].result + ' ▲</td>';
								} else tmpHtml += '<td>' + resultItemList[l].result + '</td>';
							}
							break;
						} else if (l === resultItemList.length - 1) {
							tmpHtml += '<td></td>';
						}
					}
				}

				if (canDraw) {
					canWrite = true;
					subHtml += tmpHtml;
				}
			}
			if (canWrite) {
				html += subHtml;
				html += '</tr></tbody>';
				html += '</table><br>';
				AccHtml += '</ul></li>';
			}
		}

		$("#resultAcc").append(AccHtml);
		$("#resultTable").append(html);

		console.log(resultData);

		if ($("#resultTable").text() == '') {
			$("#resultTable").append('<tr><td>해당 결과에 이상이 없습니다.</td></tr>');
		}
	}

	function settingGraph(item, idx) {
		$('#navResult').show();
		$('#resultOption1').empty();
		$('#resultOption2').empty();

		var html = '<option>선택</option>';
		let categoryAList = category[idx].list;

		for (let i = 0; i < categoryAList.length; i++) {
			var option = (categoryAList[i].title == '' ? category[idx].title : categoryAList[i].title);
			html += '<option value=\'' + idx + '\')">' + option + '</option>'
		}

		$('#resultOption1').append(html);
	}

	function setSelectSubOption() {
		$('#resultOption2').empty();
		var idx = $("#resultOption1 option:selected").val();
		if (idx == '선택') {
			return false;
		}

		let categoryAList = category[idx].list;

		var index = $("#resultOption1 option").index($("#resultOption1 option:selected")) - 1;

		console.log(categoryAList[index].list);

		var html = '';

		for (let j = 0; j < categoryAList[index].list.length; j++) {
			let categoryBList = categoryAList[index].list;
			html += '<option>' + categoryBList[j] + '</option>';
		}

		$('#resultOption2').append(html);
		setSimpleResult();
	}

	function setSimpleResult() {
		var inspection = $("#resultOption2 option:selected").val();
		var inspectionResult = new Array();
		var basic = new Array();

		console.log(resultData);
		for (i = 0; i < resultData.length; i++) {
			for (j = 0; j < resultData[i].resultItemList.length; j++) {
				if (resultData[i].resultItemList[j].inspection == inspection) {
					inspectionResult.push(resultData[i].resultItemList[j].result);
					basic.push(resultData[i].resultItemList[j].normalRange);
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
		$('#simpleDraw').html('<canvas id="chart" style="width: 100%;height: 100%"></canvas>');

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

					ctx.fillStyle = 'rgba(195,255,195,0.2)';
					ctx.fillRect(xaxis.left, Math.min(yRangeBeginPixel, yRangeEndPixel), xaxis.right - xaxis.left,
							Math.max(yRangeBeginPixel, yRangeEndPixel) - Math.min(yRangeBeginPixel, yRangeEndPixel));


					ctx.save();
					ctx.restore();
				}

				originalLineDraw.apply(this, arguments);
			}
		});

		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: yearArr,
				datasets: [{
					label: inspection,
					data: inspectionResult,
					fill: false,
					borderColor: 'rgb(255,153,0)',
					pointBackgroundColor: 'rgb(255,153,0)'
				}],
				yHighlightRange: {
					begin: 50,
					end: 100
				}
			},
			options: {}
		});
	}

	function drawString(inspection, inspectionResult) {
		var html = '';

		html += '<div class="table-box"><table class="simple-result">';

		for (i = 0; i < inspectionResult.length; i++) {
			html += '<tr><td class="year">' + yearArr[i] + '</td></tr>';
			html += '<tr><td class="content">' + inspectionResult[i] + '</td></tr>';
		}
		html += '</div>';
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
