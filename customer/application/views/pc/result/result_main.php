<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진결과</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

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
			box-shadow: 0 0 0 2px #3529b1 inset;
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
			<div style="height:100vh; overflow-y: scroll;min-height: 90rem;">
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
								<div style="float:left;">
									<select id="familySelect" onchange="setDataSelectOption()">
										<option value="ch">- 수검자 선택 -</option>
									</select>
								</div>
							</div>


						</div>

						<div class="row" style="display:block; margin-top: 5rem">
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

						<div class="row" style="display:block; margin-top: 4rem">
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

		var sendItems = new Object();
		sendItems.famId = val;

		instance.post('CU_005_002', sendItems).then(res => {
			resultData = res.data;

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

		console.log(category);


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
			categoryADraw(i, html)
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

	//카테고리 클릭 테이블 뷰 셋팅
	function categoryClick(item, idx) {
		$(item).children('.item').hide();
		$(item).children('.item-hover').show();
		$(item).addClass('active');

		$('.item-table td').not(item).children('.item').show();
		$('.item-table td').not(item).children('.item-hover').hide();
		$('.item-table td').not(item).removeClass('active');

		$("#resultTable").empty();

		var tableHead = '';
		tableHead += '<tr><th width="35%">검사항목</th>';
		var year = '';
		for (i = 0; i < resultData.length; i++) {
			tableHead += '<th>' + resultData[i].year.split('-')[0] + '</th>';
			let color = (i === 0) ? '#000000' : (i === 1) ? '#717171' : '#bbbbbb';
			year += '<span style="color:' + color + '">▲&nbsp;</span>' + resultData[i].year.split('-')[0];
			if (i != resultData.length - 1) {
				year += '&nbsp;&nbsp';
			}
		}
		tableHead += '<th width="35%">검사결과 <span style="font-size: 1.3rem">(' + year + ')</span></th></tr>';

		let html = '';

		let selectedCategory = category[idx].list;

		console.log(resultData);
		console.log(selectedCategory);


		for (i = 0; i < selectedCategory.length; i++) {
			let inspectionList = selectedCategory[i].list;
			let categoryBTitle = selectedCategory[i].title;

			var canWrite = false;
			var subHtml = '';
			subHtml += '<div style="width: 100%;height: 4rem">' +
					'<div style="float: left">' +
					'<h1>' + categoryBTitle + '</h1>' +
					'</div>' +
					'</div>' +
					'<table class="mainInspectionTable table-striped">' +
					'<thead>' +
					tableHead +
					'</thead>' +
					'<tbody>';

			for (j = 0; j < inspectionList.length; j++) {
				let inspection = inspectionList[j];

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

								console.log(inspection + "이 들어왔는데 " + resultItemList[l].resultCase + "케이스고 " + resultItemList[l].resultRatio + "점수여서" + canDraw + "여");

							}
							break;
						} else if (l === resultItemList.length - 1) {
							tmpHtml += '<td></td>';
						}
					}
				}
				console.log(arrowArr);

				tmpHtml += '<td><div style="width: 100%;padding-bottom: 1.2rem">';

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
							let color = (k === 0) ? '#000000' : (k === 1) ? '#717171' : '#bbbbbb';
							if (rCase !== 'A') {
								tmpHtml += '<div style="width: 100%; color:' + color + ';margin: 0 auto 0 ' +
										rRatio + 'rem;font-size: 1.2rem;position: absolute">▼</div>';
							}
						}
					}
					tmpHtml += '</div>';

					if (rCase === 'B') {
						tmpHtml += '<div style="position: relative;top: 1.2rem;">' +
								'<img style="width: 27rem;height: 2rem" src="/asset/images/img_grade_bar.png">' +
								'</div>';
					} else {
						tmpHtml += '<div style="position: relative;top: 1.2rem;">' +
								'<img style="width: 27rem;height: 2rem" src="/asset/images/img_true_false_bar.png">' +
								'</div>';
					}

					tmpHtml += '</div></td></tr>';

					subHtml += tmpHtml
				} else {
					console.log(inspection);
				}


			}

			if (canWrite) {
				html += subHtml;
				html += '</tbody>';
				html += '</table><br>';

			}

		}

		$("#resultTable").append(html);
	}

</script>

</html>
