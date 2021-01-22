<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진예약</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		#hospitalInfos {
			width: 100%;
		}

		#hospitalInfos td {
			width: 50%;
			padding: 0.5rem;
		}

		#hospitalInfos .hos-img {
			width: 80%;
			height: 18.5rem;
			position: relative;
		}

		.layer {
			display: none;
			width: 100%;
			height: 100%;
			position: relative;
			cursor: pointer;
			color: white;
			text-align: center;
			line-height: 18.5rem;
			background: rgba(0, 0, 0, 0.4);
		}

		#hospitalInfos .hos-content {
			width: 100%;
			padding: 1rem 1rem 1rem 2rem;
			display: block;
			height: 18.5rem;
		}

		#hospitalInfos .hos-content .hos-name {
			font-size: 2.3rem;
			margin-bottom: 0.5rem;
			font-weight: bolder;
		}

		#hospitalInfos .hos-content .hos-point {
			font-size: 2.3rem;
			margin-top: 1rem;
			font-weight: bolder;
		}

		.hos-btn {
			float: right;
			vertical-align: bottom;
			padding: 0.6rem 2.2rem;
			cursor: pointer;
			display: inline-block;
			background: white;
			text-align: center;
			border: 1px solid #383838;
			color: #383838;
			font-size: 1.5rem;
			text-decoration: none;
			font-weight: bolder;
		}

		.hos-btn:hover {
			background: #383838;
			color: #fff;
		}

		.hos-card {
			border: 1px solid #d5d5d5;
			display: flex;
		}

		.hos-card:hover {
			box-shadow: 0px 0px 10px #bbbbbb;
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
					 style="background-image: url(../../../../asset/images/title3.jpg); height: 30rem;text-align: center;">
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
					<div class="container content-view">
						<div class="row" style="margin-top: 3rem">
							<div style="margin: 0 auto; font-weight: 500">
								<div style="font-size: 2.3rem;margin-bottom: 4rem">검진예약절차</div>
								<img class="reservation-order" src="/asset/images/step1.png">
							</div>
						</div>
						<div class="row" style="display:block;text-align: left;margin-top: 5rem">
							<div style="font-size: 2.9rem;font-weight: 500;margin-bottom: 3rem">
								병원검색
							</div>
							<br>
							<div style="margin-bottom: 1.5rem">
								<div style="float:left">
									총 <span id="hosCount"></span>개 병원
								</div>
								<div style="display: flex; float:right">
									<select id="searchWordSelect" class="search-input" style="margin-right: 3px">
										<option value="all" selected>지역 전체</option>
									</select>
									<input type="text" id="searchWord" class="search-input" placeholder="검색어를 입력하세요"
										   onkeyup="enterKey()">
									<div class="search-btn" onclick="searchInformation(0)">
										<img src="/asset/images/icon_search.png">
									</div>
								</div>
							</div>
							<br>
							<div>
								<hr style="height: 0;border: 0; border-top: 2px solid black">
								<table id="hospitalInfos">

								</table>
								<hr style="height: 0;border: 0; border-top: 1px solid black">
							</div>
						</div>
						<div class="row" style="margin-top: 3rem">
							<form style="margin: 0 auto; width: 85%; padding: 1rem">
								<div class="page_wrap">
									<div class="page_nation" id="paging">
									</div>
								</div>
							</form>
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
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/paging.js');
	?>

	var pageCount = 0;
	var pageNum = 0;

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	userData.famId = location.href.substr(
			location.href.lastIndexOf('=') + 1
	);
	userData.pageNum = pageNum;

	searchInformation(0);

	//페이징-숫자클릭
	function searchInformation(index) {
		if ($("#searchWord").val().length == 1) {
			alert('두 글자 이상 검색어로 입력주세요.');
			return false;
		}

		pageNum = index;
		drawTable();
	}

	//병원 검색
	function drawTable() {
		pageNum = parseInt(pageNum);

		userData.pageNum = pageNum;
		userData.region = $("#searchWordSelect").val();
		userData.searchWord = $("#searchWord").val();

		console.log(userData);

		instance.post('CU_003_002', userData).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 6) {
				pageCount++;
			}

			$("#hosCount").empty();
			$("#hosCount").append(res.data.count);

			addSelectOption(res.data.regionList);
			setHospitalCard(res.data.hospitalList, pageNum);

			console.log(res.data);
		}).catch(function (error) {
			alert("잘못된 접근입니다.");
			console.log(error);
		});
	}

	//셀렉터 옵션 추가
	function addSelectOption(regionList) {
		$("#searchWordSelect").empty();
		var html = '';
		html += '<option value="all">지역 전체</option>';
		for (let i = 0; i < regionList.length; i++) {
			html += '<option value=\'' + regionList[i] + '\'>' + regionList[i] + '</option>';
		}
		$("#searchWordSelect").append(html);
	}

	//병원 카드 셋팅
	function setHospitalCard(data, index) {
		setPaging(index);

		$("#hospitalInfos").empty();

		if (data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="2" style="text-align: center">해당하는 병원이 없습니다.</td>';
			html += '</tr>';
			$("#hospitalInfos").append(html);
			$("#paging").empty();
			return false;
		}

		var count = 0;
		var html = "";

		for (i = 0; i < data.length; i++) {
			count += 1;
			if (count == 1) {
				html += '<tr>';
			}
			html += '<td>' +
					'<div class="hos-card">' +
					'<div class="hos-img" onmouseover="hospitalCardHover(this, \'' + data[i].hosURL + '\')" onmouseleave="hospitalCardLeave()"' +
					'style="background: url(https://file.dualhealth.kr/images/' + data[i].hosImage + ');background-size: 100% 100%;">' +
					'<div class="layer">홈페이지 바로가기<br></div></div>' +
					'<div class="hos-content">' +
					'<div style="height: 78%">' +
					'<div class="hos-name">' + data[i].hosName + '</div>' + data[i].hosAddress + '<br>' +
					'<div class="hos-point">' + data[i].totalPoint + '<span style="font-size: 1.5rem">/10 &nbsp</span>';
			html += starPoint(data[i].totalPoint);
			html += '</div>' +
					'</div>' +
					'<div>' +
					'<div class="hos-btn" onclick="doReservation(\'' + data[i].hosId + '\')">예약하기' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</td>';

			if (count == 2) {
				count = 0;
				html += '</tr>';
			}
		}

		if (count == 1) {
			html += '<td></td>';
			html += '</tr>';
		}

		$("#hospitalInfos").append(html);

	}

	//홈페이지 바로가기 버튼 활성화
	function hospitalCardHover(layer, url) {

		$(layer).children('.layer').css("display", "block");
		url.replaceAll("http://", "");
		url.replaceAll("https://", "");


		$(layer).click(function () {
			alert("간다!");
			window.open("https://" + url);
		});

	}

	//홈페이지 바로가기 버튼 비활성화
	function hospitalCardLeave() {
		$('.layer').css("display", "none");
	}

	//다음 페이지에 가족 id 값, 병원 id 값 넘기기
	function doReservation(hosId) {
		location.href = "reservation_step3?famId=" + userData.famId + "?hosId=" + hosId;
	}

</script>

</html>
