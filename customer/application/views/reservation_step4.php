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
			word-break:keep-all;
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

		.result-table {
			width: 100%;
			border-top: black 2px solid;
			margin: 0 auto;
		}

		.result-table tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.result-table th {
			background: #f6f6f6;
			font-weight: normal !important;
			width: 17rem;
			text-align: left;
			padding: 1.3rem 4rem;
			vertical-align: middle;
		}

		.result-table td {
			width: 30rem;
			padding: 1.3rem 4rem;
			text-align: left;
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
					 style="background-image: url(../../asset/images/title_reservation_service.jpg); height: 30rem">
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
							<a href="/customer/reservation_list">
								<div class="title-menu">
									예약현황
								</div>
							</a>
						</div>
					</div>
				</div>

				<!-- 컨텐츠내용 -->
				<div class="container" style="color: black;width: 130rem;padding: 6rem">

					<div class="row" style="margin-top: 3rem">
						<div style="margin: 0 auto; font-weight: 500">
							<div style="font-size: 2.3rem;margin-bottom: 4rem">검진예약절차</div>
							<img class="reservation-order" src="/asset/images/step4.png">
						</div>
					</div>

					<div class="row" style="margin-top: 7rem">
						<div style="margin: 0 auto; font-weight: bolder">
							<div style="font-size: 3rem">예약신청이 완료되었습니다.</div>
						</div>
					</div>

					<div class="row" style="margin-top: 5rem">
						<table class="result-table">
							<tr>
								<th>병원명</th>
								<td id="hosName"></td>
							</tr>
							<tr>
								<th>병원 주소</th>
								<td id="hosAddress"></td>
							</tr>
							<tr>
								<th>전화번호</th>
								<td id="hosPhone"></td>
							</tr>
						</table>
					</div>

					<div class="row" style="margin-top: 4rem">
						<div style="font-size: 1.9rem;font-weight: bolder;line-height: 4rem">
							<span id="famName">고영희</span>님의 예약정보
						</div>
						<table class="result-table">
							<tr>
								<th>주소</th>
								<td id="famAddress"></td>
							</tr>
							<tr>
								<th>연락처</th>
								<td id="famPhone"></td>
							</tr>
							<tr>
								<th>이메일</th>
								<td id="famEmail"></td>
							</tr>
						</table>
					</div>

					<div class="row" style="margin-top: 4rem;display: block;text-align: left">
						<div style="font-size: 1.9rem;font-weight: bolder;line-height: 3rem">
							예약내용
						</div>
						<div style="font-size: 1.5rem;font-weight: bolder;color: #5849ea">
							※ 예약 신청 후 3일 이내에 검진기관에서 확정일자를 통보합니다. 일정 조율이 필요할 시, 검진기관에서 가능한 일정을 안내해드립니다.
						</div>
						<table class="result-table">
							<tr>
								<th>예약일</th>
								<td style="border-right: 1px solid #a7a7a7;width: 15rem">
									1차 예약일 : <span id="firstWishDate"></span>
								</td>
								<td style="width: 15rem">
									2차 예약일 : <span id="secondWishDate"></span>
								</td>
							</tr>
							<tr>
								<th>검진명</th>
								<td colspan="2" id="pkgName"></td>
							</tr>
							<tr>
								<th>선택검사 항목</th>
								<td colspan="2" id="choiceList"></td>
							</tr>
						</table>
					</div>

					<div class="row" style="margin-top: 5rem;display: block">
						<div class="btn-cancel-square" onclick="location.href = '/customer/reservation_list';"
							 style="margin: 0 auto;color: black;border-color: black">예약현황으로
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	//famId 값 받기
	$(document).ready(function () {
		var val = location.href.substr(
				location.href.lastIndexOf('=') + 1
		);

		var userData = new Object();
		userData.famId = val;

		console.log(userData);

		// 패키지 목록 가져오기
		instance.post('CU_003_006', userData).then(res => {
			setReservationResult(res.data);
		}).catch(function (error) {
			alert("잘못된 접근입니다.")
			console.log(error);
		});
	})

	//예약 완료 정보 셋팅
	function setReservationResult(data) {
		console.log(data);
		$("#hosName").text(data.hosName);
		$("#hosAddress").text('(' + data.hosZipCode + ')' + data.hosAddress + ' ' + data.hosBuildingNum);
		$("#hosPhone").text(data.hosPhone);

		$("#famName").text(data.famName);
		$("#famAddress").text('(' + data.famZipCode + ')' + data.famAddress + ' ' + data.famBuildingNum);
		$("#famPhone").text(data.famPhone);
		$("#famEmail").text(data.famEmail);

		$("#firstWishDate").text(data.firstWishDate);
		$("#secondWishDate").text(data.secondWishDate);
		$("#pkgName").text(data.pkgName);

		var html = "";
		for (i = 0; i < data.choiceList.length; i++) {
			if (i == data.choiceList.length - 1) {
				html += data.choiceList[i];
			} else {
				html += data.choiceList[i] + ' / ';
			}
		}
		$("#choiceList").text(html);
	}

</script>

</html>
