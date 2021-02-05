<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진예약</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		.form-check {
			padding: 0.5rem;
		}

		.select-hos {
			width: 100%;
			min-height: 20rem;
			background: #F6F6F6;
			border-radius: 10rem;
			font-size: 1.5rem;
			display: flex;
		}

		.select-hos .cell {
			padding: 2rem;
			width: 20%;
		}

		.select-hos .title {
			font-size: 1.8rem;
			font-weight: 500;
		}

		#hosImg {
			display: table;
			float: left;
			width: 18rem;
			height: 18rem;
			border-radius: 70%;
			overflow: hidden;
			margin: 1rem;
		}

		.point-table td {
			padding: 0.3rem 0.7rem;
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
			margin-bottom: 3rem;
		}

		.card-header {
			border: 1px solid grey;
			background: white;
			font-size: 1.9rem;
			font-weight: bolder;
			padding: 1.5rem 3rem;
			cursor: pointer;
		}

		.card-body {
			padding: 0;
			max-height: 30rem;
			overflow-y: auto;
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
			background: #dddddd;
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

		.nav {
			height: 6rem;
		}

		.nav-item {
			font-weight: bolder;
			padding: 1rem 2rem 1rem 0;
			border: none;
		}

		.nav-item a {
			color: black;
			margin-bottom: 1.4rem;
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
		.ui-datepicker-calendar > thead th.ui-datepicker-week-end:first-child, .holiday span {
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
					 style="background-image: url(../../../../asset/images/title3.jpg); height: 30rem">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>예약서비스</span>
							<span>｜</span>
							<span>검진예약</span>
						</div>
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner " style="margin: 0 auto; ">
							<span class="title">예약서비스<br></span>
							Reservation service
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<div class="title-menu-select" style="border-right: #828282 1px solid">
								검진예약
							</div>
							<a href="/customer/reservation_list">
								<div class="title-menu">
									예약현황
								</div>
							</a>
						</div>
					</div>
				</div>

				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view" style="color: black;width: 130rem;padding: 6rem;">

						<div class="row" style="margin-top: 3rem">
							<div style="margin: 0 auto; font-weight: 500">
								<div style="font-size: 2.3rem;margin-bottom: 4rem">검진예약절차</div>
								<img id="step" class="reservation-order" src="/asset/images/step2.png">
							</div>
						</div>

						<!--선택한 병원 상단바-->
						<div class="row" style="margin-top: 7rem;text-align: left">
							<div class="select-hos">
								<div id="hosImg"></div>
								<div class="cell" style="margin-left: 2rem">
									<div style="font-size: 2.1rem;font-weight: 500" id="name">병원이름</div>
									<div style="word-break:keep-all;padding: 1.3rem 0;font-size: 1.35rem"
										 id="address">
										주소
									</div>
									<span style="font-weight: 500;font-size: 1.4rem">문의</span>
									<span style="font-size: 1.3rem" id="phone"></span><br>
									<span style="font-weight: 500;font-size: 1.4rem">운영시간</span>
									<span style="font-size: 1.3rem" id="operatingHours"></span><br>
								</div>
								<div class="cell">
									<div class="title">안내사항</div>
									<div id="notice" style="margin-top: 1rem;color: grey"></div>
								</div>
								<div class="cell">
									<div class="title">추천정보</div>
									<table class="point-table" style="margin-top: 1rem">
										<tr>
											<td>검사항목</td>
											<td id="onePoint">
											</td>
										</tr>
										<tr>
											<td>접근성</td>
											<td id="twoPoint"></td>
										</tr>
										<tr>
											<td>전문성</td>
											<td id="threePoint"></td>
										</tr>
										<tr>
											<td>시설</td>
											<td id="fourPoint"></td>
										</tr>
									</table>
								</div>
								<div class="cell">
									<div class="title">기관정보</div>
									<div id="plusInfo" style="margin-top: 1rem"></div>
								</div>
							</div>
						</div>


						<!--검진유형선택-->
						<div class="row" id="step1">
							<!--검진유형선택-->
							<div class="container">

								<div class="row" style="display:block;margin-top: 7rem;margin-bottom: 7rem">
									<div style="font-size: 2.6rem;font-weight: 500;margin-bottom: 2.5rem">
										검진유형
									</div>
									<hr>
									<div id="packageList">

									</div>
									<hr>
								</div>
								<form id="packageForm" style="display: none">
									<div class="row" style="display:block;margin-top: 5rem">
										<div style="font-size: 2.6rem;font-weight: 500;margin-bottom: 2.5rem;text-align: left">
											기본검사
										</div>

										<ul class="nav" id="injectionBaseList">
										</ul>

										<div>
											<table class="table table-bordered" id="baseInjectionTable">
											</table>
										</div>
									</div>
									<div class="row" style="display:block;margin-top: 5rem">
										<div style="font-size: 2.6rem;font-weight: 500;margin-bottom: 2.5rem;text-align: left">
											선택검사
										</div>

										<div class="accordion" id="choiceInjectionList">

										</div>
									</div>
									<div class="row" id="addInjectionView" style="display:block;margin-top: 5rem">
										<div style="font-size: 2.6rem;font-weight: 500;margin-bottom: 2.5rem;text-align: left">
											추가검사
										</div>
										<div class="accordion" id="addInjectionTitle">
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
												 data-parent="#addInjectionTitle">
												<div class="card-body" id="addInjection">

												</div>
											</div>
											<div id="choiceAddView">

											</div>
										</div>
									</div>

									<div class="row" style="display:block;margin-top: 5rem">
										<div style="font-weight: 400;text-align: right">
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
									<div style="font-size: 2.6rem;font-weight: 500;line-height: 4.5rem">
										검진일선택
									</div>
									<div style="font-size: 1.5rem;margin-bottom: 2.5rem;color: #5849ea; font-weight: bolder">
										※ 검진일은 현재 날짜 기준, 2주 후 날짜부터 선택이 가능합니다.
									</div>

									<hr>

									<div class="container">
										<div class="row">
											<div class="col" style="padding: 3rem 0">
												<div style="font-size: 2rem; font-weight: bolder">
													1차 예약일
												</div>
												<div id="firstWishDate" class="date-view">
													&nbsp;
												</div>
												<div id="firstDatepicker" style="margin-top: 3rem"></div>
											</div>
											<div class="col" style="padding: 3rem 0">
												<div style="font-size: 2rem; font-weight: bolder">
													2차 예약일
												</div>
												<div id="secondWishDate" class="date-view">
													&nbsp;
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

	// console.log(getRestDateList('2021', '9') + '<<');
	//
	// function getRestDateList(year, month) {
	// 	let restDateSet = new Set();
	//
	// 	month = (month < 10) ? 0 + '' + month : month + '';
	// 	var xhr = new XMLHttpRequest();
	// 	xhr.
	// 	xhr.onreadystatechange = function () {
	// 		if (this.readyState == 4 && this.status == 200) {
	// 			var str = this.response;
	// 			var cut = 0;
	// 			while (str.indexOf("2021") > -1) {
	// 				let startIndex = str.indexOf("2021");
	// 				let endIndex = startIndex + 8;
	// 				let dateNum = str.substring(startIndex, endIndex);
	// 				restDateSet.add(dateNum);
	// 				cut++;
	// 				str = str.substring(endIndex, str.length)
	// 			}
	// 			console.log(restDateSet);
	// 		}
	// 	};
	// 	xhr.open("GET", "http://customer.localhost/customer/doIt?year=" + year + "&month=" + month);
	// 	xhr.send();
	// 	console.log(xhr.send());
	// 	console.log("나간다");
	// 	return (Array.from(restDateSet).sort());
	// }


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

	// 제외할 날짜
	var disabledDays = ["2021-1-1",
		"2021-2-11", "2021-2-12", "2021-2-13",
		"2021-3-1",
		"2021-5-5", "2021-5-19",
		"2021-6-6",
		"2021-8-15",
		"2021-9-20", "2021-9-21", "2021-9-22",
		"2021-10-3", "2021-10-9",
		"2021-12-25"];

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
		// maxDate: '+2m',

		//일요일 선택 불가
		beforeShowDay: disableSomeDay
	});

	// 날짜를 나타내기 전에(beforeShowDay) 실행할 함수
	function disableSomeDay(date) {
		var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
		for (i = 0; i < disabledDays.length; i++) {
			if ($.inArray(y + '-' + (m + 1) + '-' + d, disabledDays) != -1) {
				return [false, 'holiday', 'holiday'];
			}
		}
		return [date.getDay() != 0];
	}

	// // 일요일만 선택 막기
	// function noSundays(date) {
	// 	return [date.getDay() != 0, ''];
	// }

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
		sendItems.additionalPrice = sum;



		if (firstWishDate == null || firstWishDate == '') {
			alert('1차 예약일을 선택해주세요.');
			return false;
		} else if (secondWishDate == null || secondWishDate == '') {
			alert('2차 예약일을 선택해주세요.');
			return false;
		} else if (firstWishDate == secondWishDate) {
			alert('1차, 2차 동일한 날짜로 예약하실 수 없습니다. 다시 설정해주세요.');
			return false;
		}

		if (confirm("예약하시겠습니까?") == true) {
			instance.post('CU_003_005', sendItems).then(res => {

				if (res.data.message == "success") {
					location.href = "reservation_step4?famId=" + famId;
				}
			}).catch(function (error) {
				alert("잘못된 접근입니다.")

			});
		} else {
			return false;
		}
	}
</script>

</html>
