<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.main-row {
			width: 100%;
			height: 35rem;
			padding: 0;
			margin: 0;
		}

		.row {
			width: 100%;
		}

		.col {
			padding: 1.2rem;
		}

		.doughnuts {
			position: relative;
			width: 17rem;
			height: 17rem;
		}

		.doughnut1 {
			position: absolute;
			z-index: 1;
		}

		.doughnut2 {
			position: absolute;
		}

		.chart-text1, .chart-text2, .chart-text3 {
			width: 100%;
			margin: 0 auto;
			color: white;
			font-size: 1.2rem;
			position: absolute;
			z-index: 5;
		}

		.chart-text1 {
			bottom: 1px;
		}

		.chart-text2 {
			bottom: 1.8rem;
			color: #29af8f;
			text-shadow: 1px 1px white;
		}

		.chart-text3 {
			bottom: 7rem;
			color: #914cbd;
		}

		#noticeTable .title {
			cursor: pointer;
			text-align: left;
		}

		.all-menu {
			float: right;
			margin-bottom: 0.5rem;
			cursor: pointer;
		}

		.all-menu:hover {
			color: #5645ed;
		}

		.down-btn {
			width: 28rem;
			height: 13rem;
			cursor: pointer;
		}
	</style>
</head>
<body>

<!--상단 메뉴-->
<header>
	<?php
	require('common/header.php');
	?>
</header>

<!--콘텐츠 내용-->

<div class="main">
	<div class="container">
		<div class="row main-row">
			<div class="col">
				<div class="box">
					<div class="box-title">
						<img src="/asset/images/icon_title.png">
						<h2>예약현황판</h2>
					</div>
					<div style="display: flex">
						<div style="width: 50%">
							<table id="reservationTable" class="basic-table table-hover">
								<thead>
								<tr>
									<th>서비스</th>
									<th>대상자</th>
									<th>예약자</th>
									<th>완료자</th>
								</tr>
								</thead>
							</table>
						</div>
						<div style="width: 50%;text-align: center;font-weight: 400">
							<!--예약현황판 도넛 그래프-->
							<div id="graphView" style="display: flex;width: fit-content;margin: 0 auto">

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="box">
					<div class="box-title" style="margin-bottom: 0">
						<img src="/asset/images/icon_title.png">
						<h2>운영정보</h2>
					</div>
					<div class="row" style="display: block;">
						<div class="all-menu" onclick="location.href='/company/confirm_package'">
							전체보기
						</div>
					</div>
					<div class="row">
						<table id="examinationTable" class="basic-table table-hover">
							<thead>
							<tr>
								<th>서비스</th>
								<th>오픈일</th>
								<th>예약종료일</th>
								<th>사업종료일</th>
								<th>병원수</th>
								<th>정산주기</th>
								<th>최근정산일</th>
							</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row main-row">
			<div class="col">
				<div class="box">
					<div class="box-title" style="margin-bottom: 0">
						<img src="/asset/images/icon_title.png">
						<h2>공지사항</h2>
					</div>
					<div class="row" style="display: block;">
						<div class="all-menu" onclick="location.href='/company/notice_list'">
							전체보기
						</div>
					</div>
					<div class="row">
						<table id="noticeTable" class="basic-table table-hover">
							<thead>
							<tr>
								<th style="width: 10%">NO</th>
								<th>제목</th>
								<th>작성자</th>
								<th>등록일</th>
							</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="box" style="height: fit-content !important;">
					<div class="box-title">
						<img src="/asset/images/icon_title.png">
						<h2>(주)듀얼헬스케어 고객센터</h2>
					</div>
					<div>
						<div>
							<img src="/asset/images/main_list_ico01.png">
							담당자 : 김듀얼
						</div>
						<div style="padding: 0.5rem 0">
							<img src="/asset/images/main_list_ico02.png">
							이메일 : kimdd.dualhealth@gmail.com
						</div>
						<div>
							<img src="/asset/images/main_list_ico03.png">
							전화 : 1661-2645
						</div>
					</div>
				</div>
				<div style="padding-top: 3rem">
					<div class="down-btn"
						 style="background-image: url(../../../asset/images/btn_manual.png);background-size: 100% 100%;"
						 onclick="downloadBasicSheet('company_manual', '매뉴얼.pptx')"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>

<script>
	var coIdObj = new Object();
	coIdObj.coId = sessionStorage.getItem("userCoID");

	instance.post('C0101', coIdObj).then(res => {
		console.log(res.data);
		setReservationData(res.data.reservationInfoDTOList, 1, 2, 3);
		setExaminationData(res.data.examinationInfoDTOList);
		setNoticeData(res.data.noticeDTOList);
	});

	var chart1 = new Array();
	var chart2 = new Array();
	var chart3 = new Array();

	//예약현황판
	function setReservationData(data, idx1, idx2, idx3) {
		let id1 = 'doughnut' + idx1;
		let id2 = 'doughnut' + idx2;
		let id3 = 'doughnut' + idx3;

		var html = '';
		html += '<tbody>'
		for (i = 0; i < data.length; i++) {

			html += '<tr>';
			html += '<td>' + data[i].service + '</td>';
			html += '<td>' + data[i].targetNum.toLocaleString() + '명</td>';
			html += '<td>' + data[i].reservedNum.toLocaleString() + '명</td>';
			html += '<td>' + data[i].completeNum.toLocaleString() + '명</td>';
			html += '</tr>';

			$('#graphView').append(
					'<div class="doughnuts">' +
					'<canvas id=\'' + id1 + '\' class="doughnut1" width="170" height="170"></canvas>' +
					'<canvas id=\'' + id2 + '\' class="doughnut2" width="170" height="170"></canvas>' +
					'<canvas id=\'' + id3 + '\' class="doughnut3" width="170" height="170"></canvas>' +
					'<div class="chart-text1" id="chart1"></div>' +
					'<div class="chart-text2" id="chart2"></div>' +
					'<div class="chart-text3" id="chart3"></div>' +
					'<div style="line-height: 4rem">' + data[i].service + '</div>' +
					'</div>' +
					'<div style="font-size: 1.3rem; padding:6.5rem 2rem">' +
					'<div style="color: #4564b1">● 대상자</div>' +
					'<div style="color: #29af8f">● 예약자</div>' +
					'<div style="color: #914cbd">● 완료자</div>' +
					'</div>');

			$('#chart1').text(data[i].targetNum.toLocaleString() + '명');
			chart1.push(data[i].targetNum);
			$('#chart2').text(data[i].reservedNum.toLocaleString() + '명');
			chart2.push(data[i].reservedNum);
			$('#chart3').text(data[i].completeNum.toLocaleString() + '명');
			chart3.push(data[i].completeNum);
		}
		html += '</tbody>'

		$("#reservationTable").append(html);

		chart1.push(0);
		chart2.push(chart1[0] - chart2[0]);
		if (chart2[1] < chart2[0] / 3) {
			$('#chart2').css('color', 'white');
		}
		chart3.push(chart1[0] - chart3[0]);

		console.log(chart1, chart2, chart3);

		setGraphDoughnutChart();
	}

	//예약현황판 도넛차트 그리기
	function setGraphDoughnutChart() {
		var ctx = document.getElementById('doughnut1').getContext('2d');
		var ctx1 = document.getElementById('doughnut2').getContext('2d');
		var ctx2 = document.getElementById('doughnut3').getContext('2d');

		var doughnut1 = new Chart(ctx, {
			type: 'doughnut',
			data: {
				datasets: [{
					data: chart1,
					backgroundColor: [
						'#4564b1', '#ffffff'
					]
				}],

			},
			options: {
				events: [],
				cutoutPercentage: 80,
				scales: {
					display: false,
				}
			}
		});

		var doughnut2 = new Chart(ctx1, {
			type: 'doughnut',
			data: {
				datasets: [{
					data: chart2,
					backgroundColor: [
						'#29af8f', '#ffffff'
					]
				}],

			},
			options: {
				events: [],
				cutoutPercentage: 60,
				scales: {
					display: false,
				}
			}
		});

		var doughnut3 = new Chart(ctx2, {
			type: 'doughnut',
			data: {
				datasets: [{
					data: chart3,
					backgroundColor: [
						'#914cbd', '#ffffff'
					]
				}],

			},
			options: {
				events: [],
				cutoutPercentage: 40,
				scales: {
					display: false,
				}
			}
		});
	}

	//운영정보
	function setExaminationData(data) {
		var html = '';
		html += '<tbody>'
		for (i = 0; i < data.length; i++) {
			html += '<tr>';
			html += '<td>' + data[i].service + '</td>';
			html += '<td>' + data[i].serviceStartDate + '</td>';
			html += '<td>' + data[i].reservationEndDate + '</td>';
			html += '<td>' + data[i].serviceEndDate + '</td>';
			html += '<td>' + data[i].hospitalCount + '</td>';
			html += '<td>' + data[i].paymentCode + '</td>';
			if (data[i].lastBilled == null) {
				html += '<td> </td>';
			} else {
				html += '<td>' + data[i].lastBilled + '</td>';
			}
			html += '</tr>';
		}
		html += '</tbody>'
		$("#examinationTable").append(html);
	}

	//공지사항
	function setNoticeData(data) {
		var html = '';
		html += '<tbody>'
		for (i = 0; i < data.length; i++) {
			html += '<tr>';
			html += '<td style="width: 10%">' + (i + 1) + '</td>';
			html += '<td class="title" onclick="sendNoticeID(\'' + data[i].no + '\')">' + data[i].title + '</td>';
			html += '<td style="width: 20%">' + data[i].author + '</td>';
			html += '<td style="width: 20%">' + data[i].createDate + '</td>';
			html += '</tr>';
		}

		html += '</tbody>'
		$("#noticeTable").append(html);
	}

	//공지 게시글 디테일에 값 던지기
	function sendNoticeID(index) {
		location.href = "/company/notice_detail?id=" + index;
	}

	<?php
	require('common/file_data.js');
	?>
</script>
