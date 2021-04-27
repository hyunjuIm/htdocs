<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		table td, table th {
			vertical-align: middle !important;
		}

		.simple-table1 td, .simple-table2 td {
			font-weight: 300;
			color: grey;
		}

		/*운영정보 테이블*/
		.simple-table1 {
			width: 100%;
		}

		.simple-table1 th {
			font-weight: 400;
			padding: 5px;
		}

		.simple-table1 td {
			text-align: center;
		}

		/*예약현황판 테이블*/
		.simple-table2 {
			width: 100%;
			border-top: 1px solid black;
			text-align: center;
		}

		.simple-table2 th, .simple-table2 td {
			padding: 8px;
		}

		.simple-table2 th {
			font-weight: 400;
		}

		.simple-table2 tr {
			border-bottom: 1px solid #DCDCDC;
		}

		#reservationService {
			width: 100%;
			text-align: center;
			margin-top: 10px;
			font-size: 2rem;
			font-weight: 400;
		}

		/*공지사항 테이블*/
		.simple-table3 {
			width: 100%;
		}

		.simple-table3 tr {
			border-bottom: 1px solid #DCDCDC;
		}

		.simple-table3 td, .simple-table3 th {
			padding: 5px 0;
		}

		.simple-table3 .title {
			width: 70%;
			text-align: left;
			color: black;
			font-size: 1.4rem;
		}

		.simple-table3 .title div {
			display: inline-block;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}

		.simple-table3 .date {
			font-size: 1.2rem;
			color: grey;
			text-align: right;
		}

		.plus {
			font-size: 4rem;
			line-height: 19px;
			padding-right: 10px;
			font-weight: 400;
		}

		/*예약현황판 도넛그래프*/
		.doughnut-view {
			position: relative;
			width: 100%;
			height: 150px;
		}

		.doughnut-view .count {
			position: absolute;
			width: 100%;
			text-align: center;
			font-size: 1.2rem;
			font-weight: 400;
		}

		.doughnut-view .count .num1 {
			margin-top: 70px;
			color: #914cbd;
		}

		.doughnut-view .count .num2 {
			margin-top: 22px;
			color: #29af8f;
			text-shadow: -1px 0 #ffffff,
			0 1px #ffffff,
			1px 0 #ffffff,
			0 -1px #ffffff;

		}

		.doughnut-view .count .num3 {
			margin-top: 3px;
			color: white;
		}

		canvas {
			width: 150px;
			height: 150px;
		}

		.ready-box {
			display: flex;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.5);
			color: white;
			margin: 0 auto;
			position: absolute;
			z-index: 777;
			top: 0;
			left: 0;
			align-items: center;
			justify-content: center;
		}
	</style>
</head>
<body>

<header>
	<?php
	require('common/header.php');
	?>
</header>

<div id="main">
	<div class="row">
		<div class="box-title">
			<img src="/asset/images/icon_title.png">
			<h2>운영정보</h2>
		</div>
		<div class="box" style="position: relative">
			<div class="ready-box" id="ready1">
				아직 서비스 운영 전입니다.
			</div>
			<table class="simple-table1">
				<tr id="service">
					<th>서비스</th>
				</tr>
				<tr id="serviceStartDate">
					<th>오픈일</th>
				</tr>
				<tr id="reservationEndDate">
					<th>예약종료일</th>
				</tr>
				<tr id="serviceEndDate">
					<th>사업종료일</th>
				</tr>
				<tr id="hospitalCount">
					<th>병원수</th>
				</tr>
				<tr id="paymentCode">
					<th>정산주기</th>
				</tr>
				<tr id="lastBilled">
					<th>최근정산일</th>
				</tr>
			</table>
		</div>
	</div>

	<div class="row" style="margin-top: 50px">
		<div class="box-title">
			<img src="/asset/images/icon_title.png">
			<h2>예약현황판</h2>
		</div>
		<div class="box" style="position: relative">
			<div class="ready-box" id="ready2">
				아직 서비스 운영 전입니다.
			</div>
			<div class="row">
				<div class="doughnut-view">
					<div class="count">
						<!--데이터 추가되면 수정 필요-->
						<div id="targetNum" class="num1"></div>
						<div id="reservedNum" class="num2"></div>
						<div id="completeNum" class="num3"></div>
					</div>
					<canvas id="reservationStatistics"></canvas>
				</div>
				<div id="reservationService"></div>
			</div>
			<div class="row" style="font-size: 1.4rem;margin-top: 20px">
				<div style="color: #4564b1">● 대상자 &nbsp;</div>
				<div style="color: #29af8f">● 예약자 &nbsp;</div>
				<div style="color: #914cbd">● 완료자</div>
			</div>
			<div class="row" style="margin-top: 10px">
				<table class="simple-table2">
					<thead>
					<tr>
						<th>서비스</th>
						<th>대상자</th>
						<th>예약자</th>
						<th>완료자</th>
					</tr>
					</thead>
					<tbody id="reservationTable">
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 50px">
		<div style="display: block;width: 100%">
			<div style="float:left;">
				<div class="box-title">
					<img src="/asset/images/icon_title.png">
					<h2>공지사항</h2>
				</div>
			</div>
			<div class="plus" style="float:right;" onclick="location.href='/m/notice_list';resetPaging()">
				+
			</div>
		</div>

		<div class="box">
			<table class="simple-table3">
				<tbody id="noticeTable">
				</tbody>
			</table>
		</div>
	</div>

	<div class="row" style="margin-top: 50px">
		<div class="box-title">
			<img src="/asset/images/icon_title.png">
			<h2>(주)듀얼헬스케어 고객센터</h2>
		</div>
		<div class="box">
			담당자 : 고남희<br>
			이메일 : gogonh@dualhealth@gmail.com<br>
			전화 : 1661-2645
		</div>
	</div>
</div>

</body>


<footer>
	<?php
	require('common/footer.php');
	?>
</footer>


</html>

<script>
	var coIdObj = new Object();
	coIdObj.coId = sessionStorage.getItem("userCoID");

	instance.post('C0101', coIdObj).then(res => {
		setReservationData(res.data.reservationInfoDTOList);
		setExaminationData(res.data.examinationInfoDTOList);
		setNoticeData(res.data.noticeDTOList);
	});

	var chart1 = new Array();
	var chart2 = new Array();
	var chart3 = new Array();

	//운영정보
	function setExaminationData(data) {
		if (data.length == null || data.length == 0) {
			$('#ready1').show();
			return false;
		} else {
			$('#ready1').hide();
		}

		var html = '';
		for (i = 0; i < data.length; i++) {
			html = '<td style="color: #5645ED;font-weight: 400">' + data[i].service + '</td>'
			$("#service").append(html);

			html = '<td>' + data[i].serviceStartDate + '</td>'
			$("#serviceStartDate").append(html);

			html = '<td>' + data[i].reservationEndDate + '</td>';
			$("#reservationEndDate").append(html);

			html = '<td>' + data[i].serviceEndDate + '</td>';
			$("#serviceEndDate").append(html);

			html = '<td>' + data[i].hospitalCount + '</td>';
			$("#hospitalCount").append(html);

			html = '<td>' + data[i].paymentCode + '</td>';
			$("#paymentCode").append(html);

			if (data[i].lastBilled == null) {
				html = '<td> </td>';
			} else {
				html = '<td>' + data[i].lastBilled + '</td>';
			}
			$("#lastBilled").append(html);

		}
	}

	//예약현황판
	function setReservationData(data) {
		if (data.length == null || data.length < 0) {
			$('#ready2').show();
			return false;
		} else {
			$('#ready2').hide();
		}

		var html = '';
		for (i = 0; i < data.length; i++) {
			html += '<tr>' +
					'<td style="color: #5645ED;font-weight: 400">' + data[i].service + '</td>' +
					'<td>' + data[i].targetNum.toLocaleString() + '명</td>' +
					'<td>' + data[i].reservedNum.toLocaleString() + '명</td>' +
					'<td>' + data[i].completeNum.toLocaleString() + '명</td>' +
					'</tr>'

			$('#targetNum').text(data[i].targetNum.toLocaleString() + '명');
			$('#reservedNum').text(data[i].reservedNum.toLocaleString() + '명');
			$('#completeNum').text(data[i].completeNum.toLocaleString() + '명');

			drawDoughnutChart('reservationStatistics', data[i]);
		}
		$("#reservationTable").append(html);
	}

	function drawDoughnutChart(id, obj) {
		var ctx = document.getElementById(id);
		var data = {
			datasets: [{
				data: [obj.targetNum, 0],
				backgroundColor: ["#4564b1", "#ffffff"],
				borderColor: "#ffffff"
			}, {
				data: [obj.reservedNum, obj.targetNum - obj.reservedNum],
				backgroundColor: ["#29af8f", "#ffffff"],
				borderColor: "#ffffff"
			}, {
				data: [obj.completeNum, obj.targetNum - obj.completeNum],
				backgroundColor: ["#914cbd", "#ffffff"],
				borderColor: "#ffffff"
			}]
		};
		var chart = new Chart(ctx, {
			type: 'doughnut',
			data: data,
			options: {
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				events: [],
				cutoutPercentage: 30,
				scales: {
					display: false
				}
			}
		});

		$('#reservationService').text(obj.service);
	}

	//공지사항
	function setNoticeData(data) {
		var html = '';
		for (i = 0; i < data.length; i++) {
			html += '<tr>';
			html += '<td class="title" onclick="sendNoticeID(\'' + data[i].no + '\')"><div>' + data[i].title + '</div></td>';
			html += '<td class="date">' + data[i].createDate + '</td>';
			html += '</tr>';
		}
		$("#noticeTable").append(html);

		var width = $('.simple-table3').width() * 0.7;
		$('.simple-table3 .title div').width(width);
	}

	//공지 게시글 디테일에 값 던지기
	function sendNoticeID(index) {
		location.href = "notice_detail?id=" + index;
	}
</script>
