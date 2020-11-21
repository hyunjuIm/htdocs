<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진예약</title>

	<?php
	require('head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/calendar.css"/>

	<style>
		html {
			font-size: 10px;
		}

		body {
			font-size: 1.6rem;
		}

		.container {
			width: 100%;
			max-width: none;
			font-size: 1.7rem;
			text-align: center;
		}

		.wrap {
			display: flex;
			justify-content: center;
		}

		.inner {
			align-self: center;
			padding: 2rem;
		}

		.title-menu, .title-menu-select {
			width: 30rem;
			height: 4.5rem;
			background-color: rgba(0, 0, 0, 0.5);
			color: white;
			line-height: 4.5rem;
			cursor: pointer;
			align-self: flex-end;
		}

		.title-menu:hover, .title-menu-select {
			background: #5645ED;
		}

		.form-check {
			padding: 0.5rem;
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
		}

		#choiceInjectionTable .name {
			width: 30%;
			background: white;
			text-align: center;
			vertical-align: middle;
			font-weight: bolder;
		}

		#choiceInjectionTable .memo {
			width: 40%;
			text-align: center;
			vertical-align: middle;
			font-weight: bolder;
		}

		#choiceInjectionTable td {
			text-align: left;
			padding-left: 2rem;
			vertical-align: middle;
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

		@media only screen and (max-width: 1700px) {
			html {
				font-size: 8px;
			}
		}

		@media only screen and (max-device-width: 480px) {
			html {
				font-size: 7px;
			}
		}
	</style>

</head>
<body>

<header>
	<?php
	require('header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		require('side_bar_light.php');
		?>
		<!-- 우측 컨텐츠 -->
		<div class="col"
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
			<div style="height:100vh; overflow-y: scroll;min-height: 90rem;">
				<!-- 상단 메뉴 -->
				<div class="container"
					 style="background-image: url(../../asset/images/title1.jpg); height: 30rem">
					<div class="row" style="min-width:inherit; height: 3.5rem;border-bottom:1px solid #9a9a9a">
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner" style="margin: 0 auto; ">
							<span style="font-size: 3.2rem">예약서비스<br></span>
							Reservation service
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<div class="title-menu-select" style="border-right: #828282 1px solid">
								검진예약
							</div>
							<a href="/customer/">
								<div class="title-menu">
									예약현황
								</div>
							</a>
						</div>
					</div>
				</div>

				<!-- 컨텐츠내용 -->
				<div class="container" style="color: black;width: 130rem;padding: 6rem;">
					<div class="row" id="step1">
						<div class="container">
							<div class="row" style="margin-top: 3rem">
								<div style="margin: 0 auto; font-weight: 500">
									<div style="font-size: 2.3rem;margin-bottom: 4rem">검진예약절차</div>
									<img class="reservation-order" src="/asset/images/step2.png">
								</div>
							</div>

							<!--검진유형선택-->

							<div class="row" style="margin-top: 3rem">
								선택한 병원 정보 들어갈 자리
							</div>
							<div class="row" style="display:block;margin-top: 5rem">
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

									<div>
										<table class="table table-bordered table-striped" id="choiceInjectionTable">
										</table>
									</div>
								</div>
								<div class="row" style="display:block;margin-top: 5rem">
									<div style="font-size: 2.6rem;font-weight: 500;margin-bottom: 2.5rem;text-align: left">
										추가검사
									</div>
									<div>
										<table class="table table-bordered table-striped" id="addInjectionTable">
											<thead>
											<tr>
												<th width="5%"><input type="checkbox" id="addInjectionCheck"
																	  name="addInjectionCheck"
																	  onclick="clickAll(id, name)"></th>
												<th width="40%">검사명</th>
												<th width="15%">추가금</th>
												<th width="">비고</th>
											</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>

								<div class="row" style="display:flex;margin-top: 5rem">
									<div style="margin: 0 auto">
										<div class="btn-cancel-square" style="font-size: 1.4rem" onclick="cancelBack()">
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

					<div class="row" id="step2" style="display: none">
						<div class="container">
							<div class="container">
								<div class="row" style="margin-top: 3rem">
									<div style="margin: 0 auto; font-weight: 500">
										<div style="font-size: 2.3rem;margin-bottom: 4rem">검진예약절차</div>
										<img class="reservation-order" src="/asset/images/step3.png">
									</div>
								</div>

								<!--검진일선택-->
								<div class="row" style="display:block;margin-top: 10rem">
									<div style="font-size: 2.6rem;font-weight: 500;margin-bottom: 2.5rem">
										검진일선택
									</div>

									<hr>
									<!--TODO:달력-->
									<div style="display: flex; margin: 5rem">
										<div ng-app="app" style="margin: 0 auto;display: flex">
											<div style="display: block; margin: 0 5rem">
												<div style="font-size: 2rem; font-weight: bolder">
													1차 예약일
												</div>
												<div id="firstWishDate" style="font-size: 2.4rem;margin-bottom: 2rem">
													&nbsp
												</div>
												<div ng-controller="MainController">
													<div class="wrapp">
														<flex-calendar options="options"></flex-calendar>
													</div>
													<br/>
												</div>
											</div>

											<div style="display: block;margin: 0 5rem">
												<div ng-controller="Sub">
													<div style="font-size: 2rem; font-weight: bolder">
														2차 예약일
													</div>
													<div id="secondWishDate"
														 style="font-size: 2.4rem;margin-bottom: 2rem">
														&nbsp
													</div>
													<div class="wrapp">
														<flex-calendar options="options"></flex-calendar>
													</div>
													<br/>
												</div>
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

<?php
require('check_data.php');
?>
<?php
require('calendar.php');
?>

<script>
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

	// 패키지 목록 가져오기
	instance.post('CU_003_003', userData).then(res => {
		setPackageList(res.data)
	}).catch(function (error) {
		alert("잘못된 접근입니다.")
		console.log(error);
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
			console.log(res.data);
			setBaseInjectionList(res.data);
			setChoiceInjectionList(res.data);
			setAddInjectionList(res.data);
			$("#packageForm").show();
		});
	}

	var injectionData = new Array();

	//기본검사 항목 테이블
	function setBaseInjectionList(data) {
		$("#injectionBaseList").empty();

		injectionData = data;
		var injectionList = new Array(0, 0, 0, 0);

		//각 카테고리별 개수
		for (i = 0; i < data.length; i++) {
			if (data[i].ipClass == '기본') {
				if (data[i].category == "기본검사") {
					injectionList[0] += 1;
				} else if (data[i].category == "혈액검사") {
					injectionList[1] += 1;
				} else if (data[i].category == "장비검사") {
					injectionList[2] += 1;
				} else if (data[i].category == "기타검사") {
					injectionList[3] += 1;
				}
			}
		}

		//검사 목록 셋팅
		for (i = 0; i < 4; i++) {
			var injectionText;
			if (injectionList[i] > 0) {
				var html = "";
				html += '<li class="nav-item">' +
						'<a class="nav-link" data-toggle="tab" href="#" id=injection' + i + ' onclick="setInjectionData(id, value)">';
				if (i == 0) {
					injectionText = '기본검사';
				} else if (i == 1) {
					injectionText = '혈액검사';
				} else if (i == 2) {
					injectionText = '장비검사';
				} else if (i == 3) {
					injectionText = '기타검사';
				}
				html += injectionText + '(' + injectionList[i] + ')' +
						'</a>' +
						'</li>';

				$("#injectionBaseList").append(html);
				$("#injection" + i).val(injectionText);
			}
		}

		//처음에는 무조건 기본검사 펼치기
		$("#injection0").addClass('active');
		setInjectionData('injection0', '기본검사');
	}

	//기본검사 테이블 출력
	function setInjectionData(id, value) {
		$("#baseInjectionTable").empty();

		$('.nav-item a id').toggleClass('active');

		var count = 0;
		for (i = 0; i < injectionData.length; i++) {
			if (injectionData[i].ipClass == '기본' && value == injectionData[i].category) {
				var html = "";
				count += 1;
				html += '<td>' + injectionData[i].inspection + '</td>';

				$("#baseInjectionTable").append(html);

				if (count == 6) {
					count = 0;
					$("#baseInjectionTable").append('<tr></tr>');
				}
			}
		}

		if (count != 0 && count < 6) {
			var index = 6 - count;
			for (i = 0; i < index; i++) {
				$("#baseInjectionTable").append('<td>&nbsp</td>');
			}
		}
	}

	//선택검사 항목 리스트
	var choiceList = new Array();

	//선택검사 테이블 출력
	function setChoiceInjectionList(data) {
		$("#choiceInjectionTable").empty();
		choiceList = [];

		//선택검사 항목 어떤게 있고 몇 개인지
		for (i = 0; i < data.length; i++) {
			if ((data[i].ipClass).indexOf("선택") != -1) {
				var count = 0;
				for (j = 0; j < choiceList.length; j++) {
					if (choiceList[j].title == data[i].ipClass) {
						count += 1;
					}
				}
				if (count == 0) {
					var ijObject = new Object();
					ijObject.title = data[i].ipClass;
					ijObject.count = data[i].choiceLimit;
					choiceList.push(ijObject);
					count = 0;
				}
			}
		}

		//선택검사 항목 출력
		for (i = 0; i < choiceList.length; i++) {
			var rowSpan = 0;
			var td1 = "";
			var td2 = "";
			for (j = 0; j < data.length; j++) {
				if (choiceList[i].title == data[j].ipClass) {
					rowSpan += 1;
					if (rowSpan == 1) {
						td1 += '<td>';
						td1 += '<div class="form-check form-check-inline">' +
								'<input class="form-check-input" type="checkbox" id=\'' + data[j].ipCode + '\'' +
								'name=\'' + choiceList[i].title + '\' value=\'' + data[j].id + '\' ' +
								'onclick="choiceInjectionCount(this, name, \'' + choiceList[i].count + '\')">' +
								'<label class="form-check-label" for=\'' + data[j].ipCode + '\'>&nbsp' + data[j].inspection + '</label>' +
								'</div>';
						td1 += '</td>';
						td1 += '<td class="memo">' + data[j].memo + '</td>'
					} else {
						td2 += '<tr><td>' +
								'<div class="form-check form-check-inline">' +
								'<input class="form-check-input" type="checkbox" id=\'' + data[j].ipCode + '\'' +
								'name=\'' + choiceList[i].title + '\' value=\'' + data[j].id + '\' ' +
								'onclick="choiceInjectionCount(this, name, \'' + choiceList[i].count + '\')">' +
								'<label class="form-check-label" for=\'' + data[j].ipCode + '\'>&nbsp' + data[j].inspection + '</label>' +
								'</div></td>';
						td2 += '<td class="memo">' + data[j].memo + '</td></tr>';
					}
				}
			}
			var html = "";
			html += '<tbody><tr><td class="name" rowspan=\'' + rowSpan + '\'>' +
					choiceList[i].title + ' (' + choiceList[i].count + ')' +
					td1 + '</tr>' + td2 + '</tbody>';
			$("#choiceInjectionTable").append(html);
		}
	}

	//체크박스 선택검사 항목 체크 개수 제한
	function choiceInjectionCount(chk, name, max) {
		if ($('input:checkbox[name=' + name + ']:checked').length > max) {
			alert("최대 선택 개수를 초과하였습니다.");
			chk.checked = false;
		}
	}

	//추가검사 테이블 셋팅
	function setAddInjectionList(data) {
		for (i = 0; i < data.length; i++) {
			if (data[i].ipClass == '추가') {
				var html = "";
				html += '<tr>' +
						'<td><input type="checkbox" name="addInjectionCheck" value=\'' + data[i].id + '\' onclick="clickOne(name)"></td>' +
						'<td style="text-align: left">' + data[i].inspection + '</td>' +
						'<td>' + data[i].price + '</td>' +
						'<td>' + data[i].memo + '</td>' +
						'</tr>';
				$("#addInjectionTable").append(html);
			}
		}
	}

	var pipList = new Array();

	//검진유형 -> 검진일선택 탭전환
	function nextStep1() {
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

		//다음페이지에 체크된 패키지 id 값 넘겨줄 배열
		var data = checkValueData('addInjectionCheck');
		for (j = 0; j < data.length; j++) {
			pipList.push(data[j]);
		}

		$("#step1").hide();
		$("#step2").show();
	}

	//검진일선택 -> 검진유형 탭전환
	function backStep1() {
		$("#step1").show();
		$("#step2").hide();
	}


	var firstWishDate;
	var secondWishDate;

	//예약완료
	function successRegister() {
		var sendItems = new Object();
		sendItems.cusId = userData.cusId;
		sendItems.famId = userData.famId;
		sendItems.pkgId = pkgId;
		sendItems.pipList = pipList;
		sendItems.firstWishDate = firstWishDate;
		sendItems.secondWishDate = secondWishDate;

		console.log(sendItems);

		if (confirm("예약하시겠습니까?") == true) {
			instance.post('CU_003_005', sendItems).then(res => {
				console.log(res.data);
				if (res.data.message == "success") {
					alert("예약되었습니다.");
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
