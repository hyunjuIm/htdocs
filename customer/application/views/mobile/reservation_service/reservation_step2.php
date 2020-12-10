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
			line-height: 18.5rem;
			background: rgba(0, 0, 0, 0.4);
		}

		#hospitalInfos .hos-content {
			width: 100%;
			padding: 1rem 1rem 1rem 2rem;
			display: block;
			font-size: 1.3rem;
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
				<h1 style="line-height: 5rem">병원검색</h1>
				<div style="margin-bottom: 1rem">
					<div style="float:left">
						총 <span id="hosCount"></span>개 병원
					</div>
					<div style="display: flex; float:right">
						<input type="text" id="searchWord" class="search-input" placeholder="검색어를 입력하세요"
							   onkeyup="enterKey()">
						<div class="search-btn" onclick="searchHospital(0)">
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

	var pagingNum = 0;
	var pageCount = 0;
	var searchWord = "";

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	userData.famId = location.href.substr(
			location.href.lastIndexOf('=') + 1
	);
	userData.pagingNum = pagingNum;
	userData.searchWord = searchWord;

	searchHospital(0);

	//검색 - 엔터키
	function enterKey() {
		if (window.event.keyCode == 13) {
			// 엔터키가 눌렸을 때 실행할 내용
			searchHospital(0);
		}
	}

	//페이징 - 화살표클릭
	function pmPageNum(val) {//화살표클릭
		console.log("before: pagingNum: " + pagingNum + ", pageCount: " + pageCount + ", val: " + val);

		pagingNum += parseInt(val);
		if (pagingNum < 0) pagingNum = 0;
		if (pageCount <= pagingNum) pagingNum = pageCount - 1;

		console.log("after: pageNum: " + pagingNum + ", pageCount: " + pageCount + ", val: " + val);
		searchHospital(pagingNum);
	}

	//병원 검색
	function searchHospital(index) {
		pagingNum = index;

		userData.pagingNum = pagingNum;
		userData.searchWord = $("#searchWord").val();

		instance.post('CU_003_002', userData).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 8) {
				pageCount++;
			}
			setHospitalCard(res.data.hospitalList);

			console.log(res.data);
		}).catch(function (error) {
			alert("잘못된 접근입니다.")
			console.log(error);
		});
	}


	//병원 카드 셋팅
	function setHospitalCard(data) {
		$("#hosCount").empty();
		$("#hosCount").append(data.length);
		$("#hospitalInfos").empty();
		$("#paging").empty();

		var html = "";
		var pre = pagingNum - 1;
		if (pre < 0) {
			pre = 0;
		}
		html += '<a class="arrow pprev" onclick= "searchHospital(\'' + 0 + '\')" href="#"></a>'
		html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -1 + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < pageCount; i++) {
			var html = '';

			var num = i + 1;

			if (i == pagingNum) {
				html += '<a onclick= "searchHospital(\'' + i + '\')" class="active">' + num + '</a>';
			} else {
				html += '<a onclick= "searchHospital(\'' + i + '\')" href="#">' + num + '</a>';
			}

			$("#paging").append(html);
		}

		var html = "";
		html += '<a class="arrow next" onclick= "pmPageNum(\'' + 1 + '\')" href="#"></a>'
		html += '<a class="arrow nnext" onclick= "searchHospital(\'' + (pageCount - 1) + '\')" href="#"></a>'
		$("#paging").append(html);

		var html = "";
		for (i = 0; i < data.length; i++) {
			html += '<tr><td>' +
					'<div class="hos-card">' +
					'<div class="hos-img" onmouseover="hospitalCardHover(this, \'' + data[i].hosURL + '\')" ' +
					'onmouseleave="hospitalCardLeave()"' +
					'style="background-image: url(https://file.dualhealth.kr/images/' + data[i].hosImage + ');' +
					'background-size: 100% 100%;background-position: center">' +
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
					'</td></tr>';
		}
		$("#hospitalInfos").append(html);
	}

	//홈페이지 바로가기 버튼 활성화
	function hospitalCardHover(layer, url) {
		console.log();
		$(layer).children('.layer').css("display", "block");
		$(layer).click(function () {
			window.open(url, "hospital");
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
