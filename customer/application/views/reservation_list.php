
<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:예약현황</title>

	<?php
	require('head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		.personal-info-table {
			width: 100%;
			border-top: black 2px solid;
			margin-bottom: 5rem;
		}

		.personal-info-table tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.personal-info-table th {
			background: #f6f6f6;
			font-weight: normal !important;
			min-width: 13rem;
			text-align: center;
			padding: 1.3rem 3rem;
			vertical-align: middle;
		}

		.personal-info-table td {
			min-width: 19rem;
			padding: 1rem 2rem;
			text-align: left;
			vertical-align: middle;
		}

		.personal-info-table .name {
			max-width: 22rem;
			min-width: 22rem;
			width: 22rem
			text-align: center;
			background: #fbfbfb;
			border-right: 1px solid #a7a7a7;
		}

		.name {
			font-size: 2.5rem;
			line-height: 2.7rem;
		}

		.name span {
			font-size: 1.6rem;
		}

		.personal-info-table .title {
			width: 12rem;
			min-width: 12rem;
			border-left: 1px solid #DEE2E6;
			border-right: 1px solid #DEE2E6;
		}

		.personal-info-table .cancel {
			width: 15rem;
			min-width: 14rem;
			vertical-align: middle;
			text-align: center;
			border-left: 1px solid #a7a7a7;
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
				<div class="container top-menu"
					 style="background-image: url(../../asset/images/title3.jpg)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>예약서비스</span>
							<span>｜</span>
							<span>예약현황</span>
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
							<a href="/customer/reservation_step1">
								<div class="title-menu" style="border-right: #828282 1px solid">
									검진예약
								</div>
							</a>
							<div class="title-menu-select">
								예약현황
							</div>
						</div>
					</div>
				</div>


				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="padding-top: 3rem">
							<div class="sub-title">예약현황</div>
						</div>
						<div class="row" id="resultTable" style="display: block;padding: 6rem 0">

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

<script>
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
			var html = "";
			html += '<table class="table personal-info-table">' +
					'<tr>' +
					'<th class="name" rowspan="5">' + data[i].famName + '<br><span>(' + data[i].famGrade + ')</span></th>' +
					'<th>예약일</th>';

			if (data[i].ipDate != null) {
				html += '<td colspan="4" style="border-left: 1px solid #DEE2E6">' + data[i].ipDate + '</td>' +
						'<td rowspan="5" class="cancel">' +
						'<div style="font-size: 1.3rem;font-weight: bolder;color: #DB0000">' +
						'※ 예약일이 확정된 경우, 예약취소는 담당자에게 문의해주세요.</div>'
			} else {
				html += '<td class="title">1차</td>' +
						'<td>' + data[i].firstWishDate + '</td>' +
						'<td class="title">2차</td>' +
						'<td>' + data[i].secondWishDate + '</td>' +
						'<td rowspan="5" class="cancel">' +
						'<div class="btn-cancel-square" onclick="deleteReservation(\'' + data[i].rsvId + '\')" style="border-color: #DB0000; color: #DB0000">예약취소</div>';
			}
			html += '</td>' +
					'</tr>' +
					'<tr>' +
					'<th rowspan="2">예약병원</th>' +
					'<td class="title">병원명</td>' +
					'<td>' + data[i].hoName + '</td>' +
					'<td class="title">전화번호</td>' +
					'<td>' + data[i].hoPhone + '</td>' +
					'</tr>' +
					'<tr>' +
					'<td class="title">주소</td>' +
					'<td colspan="3"> (' + data[i].hoZipCode + ') ' + data[i].hoAddress + ' ' + data[i].hoBuildingNum + '</td>' +
					'</tr>' +
					'<tr>' +
					'<th rowspan="2">검진항목</th>' +
					'<td class="title">검진명</td>' +
					'<td colspan="3">' + data[i].rsvName + '</td>' +
					'</tr>' +
					'<tr>' +
					'<td class="title">선택검사</td>' +
					'<td colspan="3">';

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

		console.log(sendItems);

		if (confirm("예약을 취소하시겠습니까?") == true) {
			instance.post('CU_004_002', sendItems).then(res => {
				console.log(res.data.message);
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
