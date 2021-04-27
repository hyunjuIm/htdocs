<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진예약</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<style>
		#hospitalInfos {
			width: 100%;
		}

		#hospitalInfos td {
			width: 100%;
			padding: 0.5rem;
		}

		#hospitalInfos .hos-img {
			width: 80%;
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
			line-height: 16rem;
			background: rgba(0, 0, 0, 0.4);
		}

		#hospitalInfos .hos-content {
			width: 100%;
			padding: 1rem 1rem 1rem 2rem;
			display: block;
			font-size: 1.2rem;
			height: 16rem;
		}

		#hospitalInfos .hos-content .hos-name {
			font-size: 1.7rem;
			font-weight: bolder;
		}

		#hospitalInfos .hos-content .hos-point {
			font-size: 1.7rem;
			margin-top: 0.7rem;
			font-weight: bolder;
		}

		#hospitalInfos .hos-content .hos-point img {
			width: 1.2rem;
			height: 1.2rem;
		}

		.hos-btn {
			float: right;
			vertical-align: bottom;
			padding: 0.5rem 2rem;
			cursor: pointer;
			display: inline-block;
			background: white;
			text-align: center;
			border: 1px solid #383838;
			color: #383838;
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
					<img class="reservation-order" src="/asset/images/step2.png"
						 style="width: 90%;max-width: fit-content">
				</div>
			</div>
			<div class="row" style="display:block;text-align: left;margin-top: 5rem">
				<div style="display: table">
					<h1 style="display: table-cell;line-height: 5rem">병원검색</h1>
					<div style="margin-left: 1rem;vertical-align: bottom">
						총 <span id="hosCount"></span>개 병원
					</div>
				</div>

				<div style="margin-top: 2rem">
					<div style="display: flex">
						<select id="searchWordSelect" class="search-input" style="width: 35%; margin-right: 3px">
							<option value="all" selected>지역 전체</option>
						</select>
						<input type="text" id="searchWord" class="search-input" placeholder="검색어를 입력하세요"
							   style="width: 65%; " onkeyup="enterKey()">
						<div class="search-btn" onclick="searchInformation(0)">
							<img src="/asset/images/icon_search.png">
						</div>
					</div>
				</div>
				<div>
					<hr style="height: 0;border: 0; border-top: 2px solid black">
					<table id="hospitalInfos">

					</table>
					<hr style="height: 0;border: 0; border-top: 1px solid black">
				</div>
			</div>
			<div class="row" style="margin-top: 3rem">
				<form style="margin: 0 auto; padding: 1rem 0">
					<div class="page_wrap">
						<div class="page_nation" id="paging">
						</div>
					</div>
				</form>
			</div>

			<div class="row" style="display:flex;margin-top: 5rem">
				<div style="margin: 0 auto">
					<div class="btn-cancel-square btn-scroll" onclick="history.back()">
						이전단계
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



		instance.post('CU_003_002', userData).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 6) {
				pageCount++;
			}

			$("#hosCount").empty();
			$("#hosCount").append(res.data.count);

			addSelectOption(res.data.regionList);
			setHospitalCard(res.data.hospitalList, pageNum);


		}).catch(function (error) {

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

		var html = "";
		for (i = 0; i < data.length; i++) {
			html += '<tr><td>' +
					'<div class="hos-card">' +
					'<div class="hos-img" onmouseover="hospitalCardHover(this)" ' +
					'onmouseleave="hospitalCardLeave()"' +
					'style="background-image: url(https://file.dualhealth.kr/images/' + data[i].hosImage + ');' +
					'background-size: auto 100%;background-position: center">' +
					'<div class="layer" onclick="hospitalCardUrlEnter(\'' + data[i].hosURL + '\')">홈페이지 바로가기<br></div></div>' +
					'<div class="hos-content">' +
					'<div style="height: 78%">' +
					'<div class="hos-name">' + data[i].hosName + '</div>' + data[i].hosAddress + '<br>' +
					'<div class="hos-point">' + (data[i].totalPoint / 2).toFixed(1) + '<span style="font-size: 1.5rem">/10 &nbsp</span>';
			html += starPoint(data[i].totalPoint);
			html += '</div>' +
					'</div>' +
					'<div>' +
					'<div class="hos-btn" onclick="doReservation(\'' + data[i].hosId + '\')">예약하기' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</td></tr>';
		}
		$("#hospitalInfos").append(html);
	}

	//홈페이지 바로가기 버튼 보이게
	function hospitalCardHover(layer, url) {
		$(layer).children('.layer').css("display", "block");
	}

	//홈페이지 바로가기 버튼 활성화
	function hospitalCardUrlEnter(url) {
		if (!url.match(/^http?:\/\//i) || !url.match(/^https?:\/\//i)) {
			url = 'http://' + url;
		}
		window.open(url);
	}

	//홈페이지 바로가기 버튼 안보이게
	function hospitalCardLeave() {
		$('.layer').css("display", "none");
	}

	//다음 페이지에 가족 id 값, 병원 id 값 넘기기
	function doReservation(hosId) {
		location.href = "reservation_step3?famId=" + userData.famId + "?hosId=" + hosId;
	}

</script>

</html>
