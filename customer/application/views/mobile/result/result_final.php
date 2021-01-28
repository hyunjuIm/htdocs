<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:종합결과</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

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
			text-align: center;
			padding: 1rem 2rem;
			vertical-align: middle;
			font-weight: 400;
		}

		.result-table td {
			vertical-align: middle;
			padding: 1rem 2rem;
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
			max-width: 72px;
			max-height: 72px;
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
			padding: 0.5rem 0;
			border-bottom: 1px solid #DCDCDC;
			font-size: 1.3rem;
		}

		.mainInspectionTable .grade {
			padding: 0.7rem 0;
		}

		.bar-div {
			position: relative;
			top: 1.6rem;
		}

		.bar-div img {
			width: 27rem;
			height: 2rem;
		}

		.year-arrow {
			width: 100%;
			font-size: 1rem;
			margin: -1.8rem auto;
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
				<h1>종합결과</h1>
			</div>

			<div class="row" style="margin-top: 5rem;">
				<div style="margin: 0 auto 1rem auto">
					<select id="familySelect" onchange="setDataSelectOption()">
						<option value="ch">수검자 선택</option>
					</select>
					<select id="dateSelect" onchange="setChoiceFamilyData()">
					</select>
				</div>

				<table class="result-table" id="resultView1" style="display: none">
					<tr>
						<th width="30%">검진종류</th>
						<td id="service"></td>
					</tr>
					<tr>
						<th>검진센터</th>
						<td id="hospitalName"></td>
					</tr>
					<tr>
						<th>검진일</th>
						<td id="year"></td>
					</tr>
					<tr>
						<th colspan="2" style="text-align: center">종합소견</th>
					</tr>
					<tr>
						<td colspan="2" id="totalResult"
							style="height: 10rem;max-height: 30rem;vertical-align: top">
						</td>
					</tr>
				</table>
			</div>

			<div class="row" class="result-view" id="resultView2" style="display:none; margin-top: 5rem">
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

			<div class="row" style="display:block; margin-top: 4rem">
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
		$("#categoryTable_3").empty();
		$("#categoryTable_4").empty();

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
				'<th style="width: 50%">검사항목</th>' +
				'<th style="width: 50%">결과수치</th>' +
				'</tr>';

		let html = "";
		let categoryList = result[idx].list;
		console.log(categoryList);
		for (let i = 0; i < categoryList.length; i++) {
			html += '<h2 style="text-align: left">' + categoryList[i].category + '</h2>' +
					'<table class="mainInspectionTable table-striped">' +
					'<thead>' +
					tableHead +
					'</thead>' +
					'<tbody>';
			let categoryListB = categoryList[i].list;
			for (let j = 0; j < categoryListB.length; j++) {
				html += '<tr>' +
						'<td colspan="2">' +
						'<div style="display: block">' +
						'<div style="width: 50%;float: left;padding: 0 0.8rem">' +
						categoryListB[j].inspection +
						'</div>' +
						'<div style="width: 50%;float: right;padding: 0 0.8rem">' +
						categoryListB[j].result + categoryListB[j].unit +
						'</div>' +
						'</div>';

				let resultRatio = (categoryListB[j].resultRatio < 0) ? -1 : (categoryListB[j].resultRatio - 50);
				resultRatio = resultRatio * 2.7;

				if (resultRatio !== -2.7) {
					html += '<div style="display: inline-block;width: 100%;padding-bottom: 1.8rem">';
					html += '<div style="width: 100%;margin: 0 auto">';

					html += '<div class="year-arrow" style=" ' +
							'margin-left: ' + (resultRatio * 0.1) + 'rem">' +
							'▼' + '</div>';

					if (categoryListB[j].resultCase === 'B') {
						html += '<div class="bar-div">' +
								'<img src="/asset/images/img_grade_bar.png">' +
								'</div>';
					} else {
						html += '<div class="bar-div">' +
								'<img src="/asset/images/img_true_false_bar.png">' +
								'</div>';
					}

					html += '</div></div></td>' +
							'</tr>';

				}
			}

			html += '</tbody>' +
					'</table><br>';
		}
		$("#resultTable").append(html);
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
