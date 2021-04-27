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
			width: 10rem;
			vertical-align: middle;
		}

		.result-table th, td {
			padding: 8px 15px;
			text-align: left;
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
					<img class="reservation-order" src="/asset/images/step4.png"
						 style="width: 90%;max-width: fit-content">
				</div>
			</div>
			<div class="row" style="margin-top: 7rem">
				<h1 style="margin: 0 auto">예약신청이 완료되었습니다.</h1>
			</div>

			<div class="row" style="margin-top:5rem">
				<table class="result-table">
					<tr>
						<th>병원</th>
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
				<table class="result-table">
					<tr>
						<th>예약일</th>
						<td style="border-right: 1px solid #a7a7a7;width: 15rem">
							1차 예약일<br>
							<span style="font-weight: bolder;font-size: 1.6rem" id="firstWishDate"></span>
						</td>
						<td style="width: 15rem">
							2차 예약일<br>
							<span style="font-weight: bolder;font-size: 1.6rem" id="secondWishDate"></span>
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
				<div style="font-size: 1.1rem;font-weight: 500;color: #5849ea;text-align: right;margin-top: 0.5rem">
					※ 예약 신청 후 3일 이내에 검진기관에서 확정일자를 통보합니다.
					<br>일정 조율이 필요할 시, 검진기관에서 가능한 일정을 안내해드립니다.
				</div>
			</div>

			<div class="row" style="margin-top: 5rem;display: block">
				<div class="btn-cancel-square" onclick="location.href = '/m/reservation_list';"
					 style="margin: 0 auto;color: black;border-color: black">예약현황으로
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
	require($parentDir . '/common/sub_drop_down.js');
	?>

	//famId 값 받기
	$(document).ready(function () {
		var val = location.href.substr(
				location.href.lastIndexOf('=') + 1
		);

		var userData = new Object();
		userData.famId = val;

		// 패키지 목록 가져오기
		instance.post('CU_003_006', userData).then(res => {
			setReservationResult(res.data);
		}).catch(function (error) {


		});
	})

	//예약 완료 정보 셋팅
	function setReservationResult(data) {

		$("#hosName").text(data.hosName);
		$("#hosAddress").text('(' + data.hosZipCode + ') ' + data.hosAddress + ' ' + data.hosBuildingNum);
		$("#hosPhone").text(data.hosPhone);

		$("#famName").text(data.famName);
		$("#famAddress").text('(' + data.famZipCode + ') ' + data.famAddress + ' ' + data.famBuildingNum);
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
				html += data.choiceList[i] + '<br>';
			}
		}
		$("#choiceList").html(html);
	}

</script>

</html>
