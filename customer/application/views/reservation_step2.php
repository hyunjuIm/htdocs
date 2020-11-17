<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진예약</title>

	<?php
	require('head.php');
	?>

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

		table {
			max-width: fit-content;
		}

		table td {
			padding: 0.7rem;
		}

		.hos-card {
			border: 1px solid #a7a7a7;
			width: 28.9rem;
			height: fit-content;
			font-weight: bolder;
		}

		.hos-card:hover {
			box-shadow: 0px 0px 10px #bbbbbb;
		}

		.hos-card-img {
			width: 100%;
			height: 24rem;
			position: relative;
		}

		.hos-card-img:hover {
			text-align: center;
			line-height: 24rem;
			color: white;
			content: "123";
		}

		.layer {
			display: none;
			cursor: pointer;
			background-color: rgba(0, 0, 0, 0.7);
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			text-align: center;
			line-height: 24rem;
			color: white;
		}

		.hos-card-content {
			padding: 1.5rem;
			font-size: 1.6rem;
		}

		.hos-card-btn {
			cursor: pointer;
			background: white;
			padding: 0.2rem 0;
			margin: 2rem 0 0 15.5rem;
			text-align: center;
			color: #5849ea;
			border: 1px solid #5849ea;
			border-radius: 3rem;
			font-weight: 500;
			text-decoration: none;
		}

		.hos-card-btn:hover {
			background: #5849ea;
			color: white;
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
					 style="background-image: url(../../asset/images/title1.jpg); height: 30rem;text-align: center;">
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
				<div class="container" style="text-align: center;color: black;width: 130rem;padding: 6rem;">
					<div class="row" style="margin-top: 3rem">
						<div style="margin: 0 auto; font-weight: 500">
							<p style="font-size: 2.3rem;margin-bottom: 4rem">검진예약절차</p>
							<img class="reservation-order" src="/asset/images/img_reservation_order.png">
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
								<input type="text" id="" class="search-input" placeholder="검색어를 입력하세요">
								<div class="search-btn">
									<img src="/asset/images/icon_search.png">
								</div>
							</div>
						</div>
						<br>
						<div>
							<hr style="height: 0;border: 0; border-top: 2px solid black">
							<table class="" id="hospitalInfos">

							</table>
							<hr style="height: 0;border: 0; border-top: 1px solid black">
						</div>
					</div>
					<div class="row" style="margin-top: 8rem">

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

<script>
	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	userData.famId = location.href.substr(
			location.href.lastIndexOf('=') + 1
	);

	// 병원리스트 받기
	instance.post('CU_003_002', userData).then(res => {
		setHospitalCard(res.data);
	});

	function setHospitalCard(data) {
		console.log(data);
		$("#hosCount").append(data.length);

		var count = 0;
		for (i = 0; i < data.length; i++) {
			var html = "";
			count += 1;
			html += '<td>' +
					'<div class="hos-card">' +
					'<div class="hos-card-img" onmouseover="hospitalCardHover(this, \'' + data[i].hosURL + '\')"' +
					' onmouseleave="hospitalCardLeave()" ' +
					'style="background: url(https://file.dualhealth.kr/images/' + data[i].hosImage + ');' +
					' background-size: 100% 24rem">' +
					'<div class="layer">' +
					'홈페이지 바로가기<br>' +
					'</div>' +
					'</div>' +
					'<div class="hos-card-content">' +
					'<span style="font-size: 2.2rem">' + data[i].hosName + '</span><br>' + data[i].hosAddress + '<br>' +
					'<div class="hos-card-btn" onclick="doReservation(\'' + data[i].hosId + '\')">예약하기</div>' +
					'</div>' +
					'</div>' +
					'</td>';

			if (count == 1) {
				count = 1;
			}

			$("#hospitalInfos").append(html);
		}
	}

	//홈페이지 바로가기 버튼 활성화
	function hospitalCardHover(layer, url) {
		console.log();
		$(layer).children('.layer').css("display", "block");
		$(layer).click(function () {
			window.open(url);
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
