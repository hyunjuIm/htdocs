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
		.personal-info-table {
			text-align: left;
			font-size: 1.4rem;
		}

		.personal-info-table:not(:last-child) {
			margin-bottom: 2rem;
		}

		.personal-info-table tr {
			border-bottom: 1px solid #e5e5e5;
		}

		.personal-info-table th {
			width: 22%;
			background: #f6f6f6;
			font-weight: 300;
		}

		.personal-info-table td:not(.name), .personal-info-table th {
			padding: 8px 15px;
			vertical-align: middle;
		}

		.personal-info-table .title {
			width: 8.5rem;
			border-right: 1px solid #e5e5e5;
		}

		.personal-info-table .name {
			font-size: 2.8rem;
			font-weight: 500;
			padding: 30px 3px 5px 3px;
		}

		.personal-info-table .name span {
			font-size: 1.4rem;
			font-weight: 300;
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
			<div class="row" style="display: block;margin-top: 9rem">
				<img src="/asset/images/mobile/icon_sub_title_bar.png">
				<h1>예약현황</h1>
			</div>

			<div class="row" style="display: block;margin-top: 5rem">
				<div class="row" id="resultTable">
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
	var menu2 = '예약현황';

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/sub_drop_down.js');
	?>

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");

	// 예약된 가족들 목록 가져오기
	instance.post('CU_004_001', userData).then(res => {
		setReservationList(res.data);
	}).catch(function (error) {
		alert("잘못된 접근입니다.")

	});

	function setReservationList(data) {


		if (data.length == 0) {
			var html = '';
			html += '<hr>' +
					'<div style="font-weight: bolder;font-size: 1.7rem;padding: 1.5rem">' +
					'예약 내역이 없습니다.' +
					'</div>' +
					'<hr>';
			$("#resultTable").append(html);
		}

		for (i = 0; i < data.length; i++) {
			var html = '';

			html += '<table class="personal-info-table">' +
					'<tr>' +
					'<td class="name" colspan="3">' +
					'<div style="float:left;">' + data[i].famName + '<span> (' + data[i].famGrade + ')</span>' +
					'</div>' +
					'<div style="float:right;">';

			if (data[i].ipDate != null) {
				html += '<div class="btn-cancel-square" style="border-color: #c9c9c9; color: grey">취소불가</div>' +
						'</div>' +
						'</td>' +
						'</tr>' +
						'<tr>' +
						'<th>예약일</th>' +
						'<td colspan="2" style="font-weight: bolder">' + data[i].ipDate +
						'<div style="font-size: 1.2rem;font-weight: 400;color: #DB0000">' +
						'※ 예약일이 확정된 경우, 예약취소는 담당자에게 문의해주세요.</div></td>';
			} else {
				html += '<div class="btn-cancel-square" onclick="deleteReservation(\'' + data[i].rsvId + '\')" ' +
						'style="border-color: #DB0000; color: #DB0000">예약취소</div>' +
						'</div>' +
						'</td>' +
						'</tr>' +
						'<tr>' +
						'<th>예약일</th>' +
						'<td colspan="2">1차 예약일 : ' + data[i].firstWishDate + '<br>2차 예약일 : ' + data[i].secondWishDate + '</td>';
			}

			html += '</tr>' +
					'<tr>' +
					'<th rowspan="3">예약병원</th>' +
					'<td class="title">병원</td>' +
					'<td>' + data[i].hoName + '</td>' +
					'</tr>' +
					'<tr>' +
					'<td class="title">전화번호</td>' +
					'<td>' + data[i].hoPhone + '</td>' +
					'</tr>' +
					'<tr>' +
					'<td class="title">주소</td>' +
					'<td> (' + data[i].hoZipCode + ') ' + data[i].hoAddress + ' ' + data[i].hoBuildingNum + '</td>' +
					'</tr>' +
					'<tr>' +
					'<th rowspan="2">검진항목</th>' +
					'<td class="title">검진명</td>' +
					'<td>' + data[i].rsvName + '</td>' +
					'</tr>' +
					'<tr>' +
					'<td class="title">선택검사</td>' +
					'<td>';

			for (j = 0; j < data[i].ipiList.length; j++) {
				if (j == data[i].ipiList.length - 1) {
					html += data[i].ipiList[j];
				} else {
					html += data[i].ipiList[j] + '<br>';
				}
			}

			html += '</td>' +
					'</tr>' +
					'</table>';

			$("#resultTable").append(html);
		}
	}

	function deleteReservation(id) {
		var sendItems = new Object();
		sendItems.rsvId = id;



		if (confirm("예약을 취소하시겠습니까?") == true) {
			instance.post('CU_004_002', sendItems).then(res => {

				if (res.data.message == "success") {
					alert("취소되었습니다.");
					location.reload();
				}
			});
		} else {
			return false;
		}
	}
</script>

</html>
