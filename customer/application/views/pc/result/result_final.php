<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진결과</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css?ver=1.1"/>

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
							<span>종합결과</span>
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
							<div class="title-menu-select" style="border-right: #828282 1px solid">
								종합결과
							</div>
							<a href="/customer/result_main">
								<div class="title-menu">
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
							<div class="sub-title">종합결과</div>
						</div>

						<div class="row empty-box" id="empty" style="display: none;">
							<div>
								검사 결과가 없습니다.
							</div>
						</div>

						<div class="row" id="select" style="display: none;margin-top: 2.5rem;">
							<div style="margin-bottom: 0.6rem;display: inline-block;width: 100%">
								<div style="float:left;">
									<select id="familySelect" onchange="setDataSelectOption()">
										<option value="ch">- 수검자 선택 -</option>
									</select>
								</div>
								<div style="float:right;">
									검진결과선택
									<select id="dateSelect" onchange="setChoiceFamilyData()">
									</select>
								</div>
							</div>


							<table class="result-table" id="resultView1" style="display: none">
								<tr>
									<th width="10%">검진종류</th>
									<td width="20%" id="service"></td>
									<th width="10%">검진센터</th>
									<td width="20%" id="hospitalName"></td>
									<th width="10%">검진일</th>
									<td width="20%" id="year"></td>
								</tr>
								<tr>
									<th style="vertical-align: top">종합소견</th>
									<td colspan="5" id="totalResult"
										style="height: 30rem;min-height: 30rem;max-height: 30rem;vertical-align: top">
									</td>
								</tr>
							</table>
						</div>

						<div class="row" id="resultView2" style="display:none; margin-top: 5rem">
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
		if(data.length == 0) {
			$('#empty').show();
			$('#select').hide();
			return false;
		} else {
			$('#empty').hide();
			$('#select').show();
		}

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

			resultData.sort(function (a, b) {
				const yearA = a.year.toUpperCase(); // ignore upper and lowercase
				const yearB = b.year.toUpperCase(); // ignore upper and lowercase
				if (yearA > yearB) {
					return -1;
				}
				if (yearA < yearB) {
					return 1;
				}
				return 0;
			});



			$("#dateSelect").append('<option value="ch">날짜 선택</option>');
			for (i = 0; i < resultData.length; i++) {
				var html = '';
				html += '<option>' + resultData[i].year + '</option>'
				$("#dateSelect").append(html);
			}
		});
	}

	//선택한 날짜 종합결과 데이터 셋팅
	function setChoiceFamilyData() {
		var date = $("#dateSelect option:selected").val();

		if (date == 'ch') {
			return;
		}

		$('#resultView1').show();
		$('#resultView2').show();

		for (i = 0; i < resultData.length; i++) {
			if (date == resultData[i].year) {
				$("#service").html(resultData[i].service);
				$("#hospitalName").html(resultData[i].hospitalName);
				$("#year").html(resultData[i].year);
				$("#totalResult").html(resultData[i].totalResult);
				result = setCategory(resultData[i].resultItemList);
				setInspectionItemTable();
			}
		}
	}

	let categoryList = [];

	let baseCategory = ['기본검사', '신장검사', '일반혈액검사', '심혈관계검사', '간기능/간염검사'
		, '당뇨/췌장/빈혈검사', '갑상선/류마티스/통풍검사', '종양검사'
		, '비뇨생식계 및 성별 질환', '장비검사', '기타검사'];

	let result = new Array();

	//검사결과 카테고리 디스플레이
	function setInspectionItemTable() {
		$("#categoryTable_1").empty();
		$("#categoryTable_2").empty();
		let cnt = 0;
		for (let i = 0; i < categoryList.length; i++) {
			let imgIdx = baseCategory.indexOf(categoryList[i]) + 1;
			let html =
					'<td onclick="categoryClick(this, \'' + i + '\')">' +
					'<div class="item">' +
					'<img src="/asset/images/icon_inspection' + imgIdx + '_2.png">' +
					'<div class="item-content">' +
					categoryList[i] +
					'</div>' +
					'</div>' +
					'<div class="item-hover">' +
					'<img src="/asset/images/icon_inspection' + imgIdx + '_1.png">' +
					'<div class="item-content">' +
					categoryList[i] +
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

	//카테고리 클릭 테이블 뷰 셋팅
	function categoryClick(item, idx) {
		$(item).children('.item').hide();
		$(item).children('.item-hover').show();
		$(item).addClass('active');

		$('.item-table td').not(item).children('.item').show();
		$('.item-table td').not(item).children('.item-hover').hide();
		$('.item-table td').not(item).removeClass('active');

		$("#resultTable").empty();

		let tableHead =
				'<tr>' +
				'<th width="34%">검사항목</th>' +
				'<th width="18%">정상수치</th>' +
				'<th width="18%">결과수치</th>' +
				'<th width="30%">검사결과</th>' +
				'</tr>';

		let html = "";
		let categoryList = result[idx].list;
		for (let i = 0; i < categoryList.length; i++) {
			html += '<div style="width: 100%;height: 4rem">' +
					'<div style="float: left">' +
					'<h1>' + categoryList[i].category + '</h1>' +
					'</div>' +
					'</div>' +
					'<table class="mainInspectionTable table-striped">' +
					'<thead>' +
					tableHead +
					'</thead>' +
					'<tbody>';
			let categoryListB = categoryList[i].list;
			for (let j = 0; j < categoryListB.length; j++) {
				html += '<tr>' +
						'<td>' + categoryListB[j].inspection + '</td>' +
						'<td>' + categoryListB[j].normalRange + '</td>' +
						'<td>' + categoryListB[j].result + categoryListB[j].unit + '</td>' +
						'<td>';
				html += '<div>';

				let resultRatio = (categoryListB[j].resultRatio < 0) ? -1 : (categoryListB[j].resultRatio - 50) * 2;
				resultRatio = resultRatio * 2.7;

				if (resultRatio !== -2.7) {
					html += '<div style="height:5px;margin: 0">' +
							'<img src="/asset/images/img_grade_arrow.png" style="margin-left:' + resultRatio + 'px;margin-top: -20px; ">' +
							'</div>';

					if (categoryListB[j].resultCase === 'B') {
						html += '<div style="width:fit-content;margin: 0 auto">' +
								'<img src="/asset/images/img_grade_bar.png">' +
								'</div>';
					} else {
						html += '<div style="width:fit-content;margin: 0 auto">' +
								'<img src="/asset/images/img_true_false_bar.png">' +
								'</div>';
					}

					html += '</div>' +
							'</td>' +
							'</tr>';

				}
			}

			html += '</tbody>' +
					'</table><br>';
		}
		$("#resultTable").append(html);
	}

	function categoryADraw(i, html) {
		if (i < 6) {
			$("#categoryTable_1").append(html);
		} else {
			$("#categoryTable_2").append(html);
		}
	}

	//어떤 카테고리를 노출시킬지 세팅하는 함수
	function setCategory(data) {
		/*카테고리 A 세팅*/
		let categoryASet = new Set();
		//해당되는 카테고리 생성
		for (let i = 0; i < data.length; i++) {
			if (data[i].categoryA.length > 0) {
				categoryASet.add(data[i].categoryA);
			}
		}
		//set -> array 자료형 변환
		let categoryAList = Array.from(categoryASet);

		//array를 baseCategory 순서에 맞게 정렬
		categoryAList.sort(function (a, b) {
			if (baseCategory.indexOf(a) > baseCategory.indexOf(b)) return 1;
			else if (baseCategory.indexOf(a) === baseCategory.indexOf(b)) return 0;
			else if (baseCategory.indexOf(a) < baseCategory.indexOf(b)) return -1;
		});
		categoryList = categoryAList
		/*카테고리 A 세팅*/
		//결과물, A 카테고리를 담은 배열: categoryAList

		/*카테고리 B 세팅*/
		let categoryABList = new Array();
		for (let i = 0; i < categoryAList.length; i++) {
			let categoryBSet = new Set();
			for (let j = 0; j < data.length; j++) {
				if (data[j].categoryA === categoryAList[i]) {
					categoryBSet.add(data[j].categoryB);

				}
			}
			categoryABList.push(Array.from(categoryBSet));
		}
		/*카테고리 B 세팅*/
		//결과물, A, B 카테고리를 담은 배열: categoryABList

		let result = new Array();
		/*검사결과 세팅*/
		for (let i = 0; i < categoryABList.length; i++) {
			let resultA = new Object();
			let categoryA = new Array();
			for (let j = 0; j < categoryABList[i].length; j++) {
				let resultB = new Object();
				let categoryB = new Array();
				for (let k = 0; k < data.length; k++) {
					if (data[k].categoryA === categoryAList[i] && data[k].categoryB === categoryABList[i][j]) {
						let inspectionResult = new Object();
						inspectionResult.inspection = data[k].inspection;
						inspectionResult.result = data[k].result;
						inspectionResult.normalRange = data[k].normalRange;
						inspectionResult.unit = data[k].unit;
						inspectionResult.resultRatio = data[k].resultRatio;
						inspectionResult.resultCase = data[k].resultCase;
						categoryB.push(inspectionResult);
					}
				}
				resultB.category = categoryABList[i][j];
				resultB.list = categoryB;
				categoryA.push(resultB);
			}
			resultA.category = categoryAList[i];
			resultA.list = categoryA;
			result.push(resultA);
		}
		/*검사결과 세팅*/

		return result;
	}

</script>

</html>
