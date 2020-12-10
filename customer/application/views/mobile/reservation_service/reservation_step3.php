<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진예약</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<style>
		.form-check {
			padding: 0.5rem;
		}

		.select-hos {
			width: 100%;
			height: fit-content;
			background: #F6F6F6;
			border-radius: 1.5rem;
			padding: 2rem;
		}

		.select-hos .cell:not(:first-child) {
			margin-top: 1.5rem;
			/*padding: 1.5rem;*/
		}

		.select-hos #name {
			font-size: 1.6rem;
		}

		.select-hos .title {
			font-weight: 500;
		}

		.select-hos .content {
			margin-top: 0.3rem;
			margin-left: 1rem;
			font-size: 1.3rem;
		}

		#hosImg {
			float: left;
			width: 10rem;
			height: 10rem;
			border-radius: 70%;
			overflow: hidden;
			margin: 1rem;
		}

		.point-table img {
			width: 12px;
		}

		#baseInjectionTable, #choiceInjectionTable, #addInjectionTable {
			border-top: 2px solid black;
			width: 100%;
		}

		#baseInjectionTable td {
			width: calc(100% / 6);
			max-width: calc(100% / 6);
			min-width: calc(100% / 6);
			vertical-align: middle;
			font-size: 1.5rem;
		}

		.card-set {
		}

		.card-header {
			border: 1px solid grey;
			background: white;
			font-weight: bolder;
			padding: 1rem 3rem;
			font-size: 1.6rem;
			cursor: pointer;
			margin-top: 1.5rem;
		}

		.card-body {
			padding: 0;
			height: 30rem;
			overflow-y: scroll;
		}

		.injection-count {
			font-size: 1.5rem;
		}

		.injection-content, .injection-choice {
			width: 100%;
			margin: 0;
			border: 1px solid #c6c6c6;
			border-top: none;
			padding: 1rem 3rem;
			text-align: left;
		}

		.injection-choice {
			padding: 1.5rem 3rem;
			background: #f9f9ff;
		}

		.injection-memo {
			font-size: 1.5rem;
			color: grey;
			font-weight: bolder;
		}

		.injection-price {
			font-weight: bolder;
		}

		#addInjectionTable th {
			font-weight: 500;
			vertical-align: middle;
		}

		#addInjectionTable td {
			padding-left: 2rem;
			padding-right: 2rem;
			vertical-align: middle;
		}

		#addInjectionPrice {
			font-size: 2rem;
			color: #5849ea;
		}

		.nav-item {
			font-weight: bolder;
			padding: 1rem 0.5rem 1rem 0;
			border: none;
		}

		.nav-item a {
			color: black;
			/*margin-bottom: 1.4rem;*/
		}

		.nav-item a:hover, .nav-item > .active {
			color: #5645ED;
			border-bottom: 2px solid #5645ED;
		}

		.date-view {
			width: 50% !important;
			border: none !important;
			border-bottom: 2px solid black !important;
			font-size: 2.5rem;
			text-align: center;
			cursor: default;
			margin: 0 auto;
		}

		.ui-datepicker {
			margin: 0 auto;
		}

		.ui-datepicker-prev, .ui-corner-all {
			border: none !important;
		}

		.ui-widget-content,
		.ui-widget-content,
		.ui-datepicker .ui-datepicker-header,
		.ui-datepicker .ui-datepicker-title,
		.ui-datepicker .ui-datepicker-title,
		.ui-datepicker .ui-datepicker-prev,
		.ui-datepicker .ui-datepicker-next,
		.ui-datepicker table,
		.ui-state-default,
		.ui-widget-content .ui-state-default,
		.ui-widget-header .ui-state-default,
		.ui-state-default {
			background: ghostwhite;
		}

		.ui-datepicker-inline {
			padding: 0 15px;
		}

		.ui-widget-header {
			border: none;
		}

		.ui-datepicker-title {
			font-size: 25px;
		}

		.ui-datepicker .ui-datepicker-header {
			padding: 20px 0;
		}

		.ui-datepicker .ui-datepicker-prev, .ui-datepicker .ui-datepicker-next {
			top: 25px;
		}

		.ui-state-hover, .ui-datepicker-prev, .ui-datepicker-prev-hover, .ui-datepicker-prev-focus {
			border: none;
		}

		.ui-icon,
		.ui-datepicker-month,
		.ui-datepicker-year {
			color: black;
		}

		a.ui-state-default,
		.ui-datepicker th {
			color: black !important;
			border: none !important;
			text-align: center !important;
		}

		.ui-datepicker {
			width: 450px;
			text-transform: uppercase;
		}

		.ui-datepicker td {
			width: 50px;
			padding: 15px 5px;
			border: none !important;
		}

		.ui-state-default {
			text-align: center !important;
			border: none !important;
		}

		.ui-state-active,
		.ui-widget-content .ui-state-active,
		.ui-widget-header .ui-state-active {
			background-color: #5849ea;
			color: white !important;
			font-weight: bold;
		}

		/*.ui-state-highlight,*/
		/*.ui-widget-content .ui-state-highlight,*/
		/*.ui-widget-header .ui-state-highlight {*/
		/*	background-color: #ffe800;*/
		/*	color: #484848 !important;*/
		/*}*/

		.ui-widget {
			font-family: Verdana, Arial, sans-serif;
			font-size: 19px;
		}

		.ui-datepicker td span, .ui-datepicker td a {
			padding: 10px 0;
		}

		.ui-datepicker-calendar > tbody td.ui-datepicker-week-end:first-child > .ui-state-default,
		.ui-datepicker-calendar > thead th.ui-datepicker-week-end:first-child {
			color: red !important;
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
		 style="background-image: url(../../../../asset/images/mobile/bg_sub2.jpg);
		 background-size: 100%;background-position: center">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">예약서비스</span><br>
					원하시는 검진 프로그램을<br>
					편리하게 예약하실 수 있습니다.
				</div>
			</div>

			<div class="row" style="position: relative">
				<?php
				$parentDir = dirname(__DIR__ . '..');
				require($parentDir . '/common/sub_drop_down.php');
				?>
			</div>

			<!--본문-->
			<div class="row" style="margin-top: 9rem">
				<div style="margin: 0 auto">
					<h2>검진예약절차</h2><br>
					<img class="reservation-order" src="/asset/images/step3.png"
						 style="width: 90%;max-width: fit-content">
				</div>
			</div>
			<!--선택한 병원 상단바-->
			<div class="row" style="margin-top: 7rem;text-align: left">
				<div class="select-hos">
					<div class="cell" style="font-weight: 500;font-size: 1.3rem">
						<table>
							<tr>
								<td width="30%">
									<div id="hosImg"></div>
								</td>
								<td>
									<div style="" id="name">병원이름</div>
									<div style="font-weight: 300;word-break:keep-all;padding: 0.5rem 0" id="address">
										주소
									</div>
									문의&nbsp&nbsp<span style="font-weight: 300" id="phone"></span><br>
									운영시간&nbsp&nbsp<span style="font-weight: 300" id="operatingHours"></span><br>
								</td>
							</tr>
						</table>
					</div>
					<hr>
					<div class="cell">
						<div class="title">추천정보</div>
						<table class="point-table content">
							<tr>
								<td width="20%">검사항목</td>
								<td id="onePoint"></td>
								<td width="20%">접근성</td>
								<td id="twoPoint"></td>
							</tr>
							<tr>
								<td>전문성</td>
								<td id="threePoint"></td>
								<td>시설</td>
								<td id="fourPoint"></td>
							</tr>
						</table>
					</div>
					<div class="cell">
						<table>
							<tr>
								<td width="50%" style="vertical-align: top">
									<div class="title">공지사항</div>
									<div class="content" id="notice" style="color: grey"></div>
								</td>
								<td style="vertical-align: top">
									<div class="title">기관정보</div>
									<div class="content" id="plusInfo"></div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<!--검진유형선택-->
			<div class="row" id="step1">
				<!--검진유형선택-->
				<div class="container" style="padding: 0">
					<div class="row" style="display:block;margin-top: 3rem">
						<h2>검진유형</h2>
						<hr>
						<div id="packageList">

						</div>
						<hr>
					</div>
					<form id="packageForm" style="display: none">
						<div class="row" style="display:block;margin-top: 5rem">
							<h2 style="text-align: left">기본검사</h2>

							<ul class="nav" id="injectionBaseList">
							</ul>

							<div>
								<table class="table table-bordered" id="baseInjectionTable">
								</table>
							</div>
						</div>
						<div class="row" style="display:block;margin-top: 5rem">
							<h2 style="text-align: left">선택검사</h2>

							<div class="accordion" id="accordionExample">

							</div>
						</div>
						<div class="row" style="display:block;margin-top: 5rem">
							<h2 style="text-align: left">추가검사</h2>
							<div class="accordion" id="accordionExample">
								<div class="card-header" id="headingOne">
									<div class="text-left"
										 data-toggle="collapse" data-target="#collapseOne"
										 aria-expanded="false"
										 aria-controls="collapseOne">
										추가검사
										<div style="float:right">
											<img src="/asset/images/icon_drop_down.png">
										</div>
									</div>
								</div>
								<div id="addInjectionList">

								</div>
								<div id="collapseOne" class="collapse" aria-labelledby="headingOne"
									 data-parent="#accordionExample">
									<div class="card-body" id="addInjection">

									</div>
								</div>
							</div>
							<div style="float: right;font-weight: 400;margin-top: 1rem">
								총 추가금액 : <span id="addInjectionPrice">0</span>원
							</div>
						</div>

						<div class="row" style="display:flex;margin-top: 5rem">
							<div style="margin: 0 auto">
								<div class="btn-cancel-square" style="font-size: 1.4rem"
									 onclick="cancelBack()">
									이전단계
								</div>
								<div class="btn-light-purple-square" style="font-size: 1.4rem"
									 onclick="nextStep1()">
									다음단계
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!--검진일선택-->
			<div class="row" id="step2" style="display: none">
				<div class="container">
					<div class="row" style="display:block;margin-top: 10rem">
						<div style="font-size: 2.6rem;font-weight: 500;margin-bottom: 2.5rem">
							검진일선택
						</div>

						<hr>

						<div class="container">
							<div class="row">
								<div class="col" style="padding: 3rem 0">
									<div style="font-size: 2rem; font-weight: bolder">
										1차 예약일
									</div>
									<div id="firstWishDate" class="date-view">
										&nbsp
									</div>
									<div id="firstDatepicker" style="margin-top: 3rem"></div>
								</div>
								<div class="col" style="padding: 3rem 0">
									<div style="font-size: 2rem; font-weight: bolder">
										2차 예약일
									</div>
									<div id="secondWishDate" class="date-view">
										&nbsp
									</div>
									<div id="secondDatepicker" style="margin-top: 3rem"></div>
								</div>
							</div>
						</div>

						<hr>

						<div class="row" style="display:flex;margin-top: 5rem">
							<div style="margin: 0 auto">
								<div class="btn-cancel-square" style="font-size: 1.4rem"
									 onclick="backStep1()">
									이전단계
								</div>
								<div class="btn-light-purple-square" style="font-size: 1.4rem"
									 onclick="successRegister()">
									다음단계
								</div>
							</div>
						</div>
					</div>
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
	$('#menu1 .nav-button').text('예약서비스');
	var menu2 = '검진예약';

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/sub_drop_down.js');
	?>

	//예약을 위한 id 가져오기
	var get = location.href.substr(
			location.href.indexOf('=', 1) + 1
	);
	var famId = get.split("?");
	famId = famId[0];

	//넘겨줄 user data 셋팅
	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	userData.famId = famId;
	userData.hosId = location.href.substr(
			location.href.lastIndexOf('=') + 1
	);

	//선택한 병원 정보
	instance.post('CU_003_003_2', userData).then(res => {
		setSelectHospital(res.data);
	});

	function setSelectHospital(data) {
		$("#hosImg").append('<img class="profile"' +
				' src=https://file.dualhealth.kr/images/' + data.fileName + '' +
				' style=" width: 100%;height: 100%;object-fit: cover;">');
		$("#name").text(data.name);
		$("#address").text(data.address + ' ' + data.buildingNum);
		$("#operatingHours").text(data.operatingHours);
		$("#phone").text(data.phone);
		$("#onePoint").append(starPoint(data.onePoint));
		$("#twoPoint").append(starPoint(data.twoPoint));
		$("#threePoint").append(starPoint(data.threePoint));
		$("#fourPoint").append(starPoint(data.fourPoint));
		$("#notice").text(data.notice);
		$("#plusInfo").text(data.plusInfo);
	}

	// 패키지 목록 가져오기
	instance.post('CU_003_003', userData).then(res => {
		setPackageList(res.data)
	}).catch(function (error) {
		alert("잘못된 접근입니다.")
	});

	//패키지 목록
	function setPackageList(data) {
		for (i = 0; i < data.length; i++) {
			var html = "";
			html += '<div class="form-check form-check-inline">' +
					'<input class="form-check-input" type="radio" name="package" id=\'' + data[i].pkgId + '\'' +
					'   value="true" onclick="choicePackage(id)">' +
					'<label class="form-check-label" for=\'' + data[i].pkgId + '\'>' +
					'&nbsp' + data[i].pkgName +
					'</label>' +
					'</div>'
			$("#packageList").append(html);
		}
	}

	var pkgId;

	//선택한 패키지 검사항목
	function choicePackage(id) {
		var sendItems = new Object();

		sendItems.famId = famId;
		sendItems.pkgId = id;

		pkgId = id;

		instance.post('CU_003_004', sendItems).then(res => {
			setBaseInjectionList(res.data);
			setChoiceInjectionList(res.data);
			setAddInjectionList(res.data);
			$("#packageForm").show();
		});
	}

	<?php
	require('reservation_injection.js');
	?>

	var pipList = new Array();

	//검진유형 -> 검진일선택 탭전환
	function nextStep1() {
		$("#step").attr("src", '/asset/images/step3.png');

		pipList = [];

		for (i = 0; i < choiceList.length; i++) {
			var data = checkValueData(choiceList[i].title);
			for (j = 0; j < data.length; j++) {
				pipList.push(data[j]);
			}

			//선택검사 선택 개수가 부족할 때 알림창
			if ($('input:checkbox[name=' + choiceList[i].title + ']:checked').length < choiceList[i].count) {
				var num = parseInt(choiceList[i].count) - $('input:checkbox[name=' + choiceList[i].title + ']:checked').length
				alert('[' + choiceList[i].title + '] ' + num + '개 추가 선택이 필요합니다.');
				return;
			}
		}

		//다음 페이지에 체크된 패키지 id 값 넘겨줄 배열
		var data = checkValueData('addInjectionCheck');
		for (j = 0; j < data.length; j++) {
			pipList.push(data[j]);
		}

		$("#step1").hide();
		$("#step2").show();
	}

	//검진일선택 -> 검진유형 탭전환
	function backStep1() {
		$("#step").attr("src", '/asset/images/step2.png');

		$("#step1").show();
		$("#step2").hide();
	}

	var firstWishDate;
	var secondWishDate;

	$.datepicker.setDefaults({
		dateFormat: 'yy-mm-dd',
		prevText: '이전 달',
		nextText: '다음 달',
		monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
		monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
		dayNames: ['일', '월', '화', '수', '목', '금', '토'],
		dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
		dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
		showMonthAfterYear: true,
		yearSuffix: '년',
		minDate: 14,
		maxDate: '+2m',
		//일요일 선택 불가
		beforeShowDay: function (date) {
			var day = date.getDay();
			return [(day != 0)];
		}
	});

	$(function () {
		$("#firstDatepicker").datepicker({
			onSelect: function (d) {
				//요일 가져오기
				//데이터를 먼저 가져오고 (숫자로 넘어옴)
				var date = new Date($("#firstDatepicker").datepicker({dateFormat: "yy-mm-dd"}).val());

				firstWishDate = d;

				var arr = d.split("-");
				var year = arr[0];
				var month = arr[1];
				var day = arr[2];

				var week = new Array("일", "월", "화", "수", "목", "금", "토");

				var html = year + '.' + month + '.' + day + '(' + week[date.getDay()] + ')';
				console.log(html);
				$("#firstWishDate").text(html);
			}
		});

		$("#secondDatepicker").datepicker({
			onSelect: function (d) {
				//요일 가져오기
				//데이터를 먼저 가져오고 (숫자로 넘어옴)
				var date = new Date($("#secondDatepicker").datepicker({dateFormat: "yy-mm-dd"}).val());

				secondWishDate = d;

				var arr = d.split("-");
				var year = arr[0];
				var month = arr[1];
				var day = arr[2];

				var week = new Array("일", "월", "화", "수", "목", "금", "토");

				var html = year + '.' + month + '.' + day + '(' + week[date.getDay()] + ')';
				console.log(html);
				$("#secondWishDate").text(html);
			}
		});
	});

	//예약완료
	function successRegister() {
		var sendItems = new Object();
		sendItems.cusId = userData.cusId;
		sendItems.famId = userData.famId;
		sendItems.pkgId = pkgId;
		sendItems.pipList = pipList;
		sendItems.firstWishDate = firstWishDate;
		sendItems.secondWishDate = secondWishDate;

		if (confirm("예약하시겠습니까?") == true) {
			instance.post('CU_003_005', sendItems).then(res => {
				console.log(res.data);
				if (res.data.message == "success") {
					location.href = "reservation_step4?famId=" + famId;
				}
			}).catch(function (error) {
				alert("잘못된 접근입니다.")
				console.log(error);
			});
		} else {
			return false;
		}
	}
</script>

</html>
