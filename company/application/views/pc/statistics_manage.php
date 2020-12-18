<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.tab {
			position: relative;
			overflow: hidden;
			width: 100%;
			margin: 0 auto;
			color: #888;
			-webkit-font-smoothing: antialiased;
		}

		.tabs {
			display: table;
			position: relative;
			overflow: hidden;
			margin: 0;
			width: 100%;
		}

		.tabs li {
			width: 11rem;
			float: left;
			line-height: 3.8rem;
			overflow: hidden;
			padding: 0;
			position: relative;
			text-align: center;
		}

		.tabs a {
			background-color: #eff0f2;
			border-bottom: 1px solid #fff;
			color: #888;
			display: block;
			outline: none;
			padding: 0 2rem;
			text-decoration: none;
			-webkit-transition: all 0.2s ease-in-out;
			-moz-transition: all 0.2s ease-in-out;
			transition: all 0.2s ease-in-out;
			border-bottom: 2px solid #3529b1;
		}

		.tabs li a:hover {
			color: white;
		}

		.tabs li:not(.current) a:hover {
			color: #3529b1;
		}

		}
		.tabs_item {
			display: block;
		}

		.current a {
			color: #fff;
			background: #3529b1;
		}

		input[type=date] {
			outline: none;
			font-size: 1.4rem;
			border: 1px solid #DCDCDC;
			padding: 0.5rem 1rem;
		}

		.btn {
			font-size: 1.5rem;
			margin-right: 1rem;
		}

		.basic-table th, .basic-table td {
			border: 1px solid #dcdcdc;
		}

		.basic-table .title {
			background: #555555;
			color: white;
		}

		.statistics-table {
			width: 80%;
			margin: 0 auto;
			font-size: 1.3rem;
			text-align: center;
		}

		.statistics-table td {
			width: 25%;
		}


		canvas {
			width: 15rem;
			height: 15rem;
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
	<div class="container" style="width:80%;margin: 0 auto">
		<div class="row">
			<div class="box-title">
				<img src="/asset/images/icon_title.png">
				<h2 style="font-weight: 300;font-size: 2.3rem">통계관리</h2>
			</div>
		</div>

		<div class="row" style="display: block">
			<div class="tab">

				<ul class="tabs">
					<li><a href="#">연도별</a></li>
					<li><a href="#">병원별</a></li>
					<li><a href="#">지역별</a></li>
				</ul>

				<div class="tab_content">
					<div class="tabs_item" style="padding: 5rem">
						<table class="statistics-table" id="chart">
							<tr>
								<td>
									<canvas id="totalStatistics"></canvas>
								</td>
								<td>
									<canvas id="customerStatistics"></canvas>
								</td>
								<td>
									<canvas id="familyStatistics"></canvas>
								</td>
								<td>
									<canvas id="inspectionStatistics"></canvas>
								</td>
							</tr>
							<tr>
								<td>
									<div>
										<table>
											<tr>
												<td></td>
											</tr>
										</table>
										<span>●</span> 대상자 <span></span><br>
										<span>●</span> 예약자 <span></span><br>
										<span>●</span> 수검자 <span></span>
									</div>
								</td>
								<td>
									<div>
										<span>●</span> 대상자 <span></span><br>
										<span>●</span> 예약자 <span></span><br>
										<span>●</span> 수검자 <span></span>
									</div>
								</td>
								<td>
									<div>
										<span>●</span> 대상자 <span></span><br>
										<span>●</span> 예약자 <span></span><br>
										<span>●</span> 수검자 <span></span>
									</div>
								</td>
								<td>
									<div>
										<span>●</span> 동의 <span></span><br>
										<span>●</span> 거부 <span></span><br>
										<span>●</span> 미작성 <span></span>
									</div>
								</td>
							</tr>
						</table>

					</div>
				</div>
			</div>
		</div>

		<div class="row" style="display: block;margin-top: 5rem">
			<hr>

			<div style="display: flex">
				<div class="btn btn-outline-dark" onclick="searchStatisticsDate(2020)">2020년</div>
				<div class="btn btn-outline-dark" onclick="searchStatisticsDate(2019)">2019년</div>
				<div class="btn btn-outline-dark" onclick="searchStatisticsDate(2018)">2018년</div>
			</div>

			<hr>

			<div>
				<span style="margin-right: 0.5rem;line-height: 3.5rem">예약기간</span>
				<input type="date" id="reservationStartDate">
				<span style="line-height: 3.5rem">~</span>
				<input type="date" id="reservationEndDate">
				<div class="btn-light-grey-square" style="height: 3.5rem"
					 onclick="searchStatisticsDate(0)">검색
				</div>
			</div>

			<table class="basic-table" style="margin-top: 3rem">
				<thead>
				<tr>
					<th colspan="5" class="title">전체</th>
					<th colspan="5" class="title">본인</th>
					<th colspan="5" class="title">가족</th>
					<th colspan="4" class="title">개인 정보 동의</th>
				</tr>
				<tr>
					<th>대상자</th>
					<th>예약자</th>
					<th>예약률</th>
					<th>수검자</th>
					<th>수검률</th>

					<th>대상자</th>
					<th>예약자</th>
					<th>예약률</th>
					<th>수검자</th>
					<th>수검률</th>

					<th>대상자</th>
					<th>예약자</th>
					<th>예약률</th>
					<th>수검자</th>
					<th>수검률</th>

					<th>전체</th>
					<th>동의</th>
					<th>거부</th>
					<th>미작성</th>
				</tr>
				</thead>
				<tbody id="statisticsTable">
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>

<script>
	//상단바 선택된 메뉴
	$('#topMenu3').addClass('active');
	$('#topMenu3').before('<div class="menu-select-line"></div>');

	$(document).ready(function () {
		(function ($) {
			$('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');

			$('.tab ul.tabs li a').click(function (g) {
				var tab = $(this).closest('.tab'),
						index = $(this).closest('li').index();

				tab.find('ul.tabs > li').removeClass('current');
				$(this).closest('li').addClass('current');

				g.preventDefault();
			});
		})(jQuery);
	});

	//날짜검색
	function searchStatisticsDate(type) {
		var sendItems = new Object();
		sendItems.coId = sessionStorage.getItem('userCoID');

		if (type == 0) {
			sendItems.reservationStartDate = $('#reservationStartDate').val();
			sendItems.reservationEndDate = $('#reservationEndDate').val();
		} else if (type == 2020) {
			sendItems.reservationStartDate = '2020-01-01';
			$('#reservationStartDate').val('2020-01-01');
			sendItems.reservationEndDate = '2020-12-31';
			$('#reservationEndDate').val('2020-12-31');
		} else if (type == 2019) {
			sendItems.reservationStartDate = '2019-01-01';
			$('#reservationStartDate').val('2019-01-01');
			sendItems.reservationEndDate = '2019-12-31';
			$('#reservationEndDate').val('2019-12-31');
		} else if (type == 2018) {
			sendItems.reservationStartDate = '2018-01-01';
			$('#reservationStartDate').val('2018-01-01');
			sendItems.reservationEndDate = '2018-12-31';
			$('#reservationEndDate').val('2018-12-31');
		}

		if (sendItems.reservationStartDate == null || sendItems.reservationEndDate == null ||
				sendItems.reservationStartDate == '' || sendItems.reservationEndDate == '') {
			alert('예약기간을 선택해주세요.')
			return false;
		} else {
			console.log(sendItems);
			instance.post('C0401', sendItems).then(res => {
				setStatisticsData(res.data);
			}).catch(function (error) {
			});
		}

	}

	var totalStatistics = new Object();
	var customerStatistics = new Object();
	var familyStatistics = new Object();
	var inspectionStatistics = new Object();

	//통계 표 셋팅
	function setStatisticsData(data) {
		console.log(data);

		$('#statisticsTable').empty();

		var html = '<tr>';

		//전체
		html += '<td>' + data.totalStatistics.numOfTarget + '</td>' +
				'<td>' + data.totalStatistics.numOfReservation + '</td>' +
				'<td>' + Math.floor(data.totalStatistics.percentOfReservation) + '%</td>' +
				'<td>' + data.totalStatistics.numOfInspection + '</td>' +
				'<td>' + Math.floor(data.totalStatistics.percentOfInspection) + '%</td>';
		totalStatistics = data.totalStatistics;
		drawDoughnutChart('totalStatistics',totalStatistics);

		//본인
		html += '<td>' + data.customerStatistics.numOfTarget + '</td>' +
				'<td>' + data.customerStatistics.numOfReservation + '</td>' +
				'<td>' + Math.floor(data.customerStatistics.percentOfReservation) + '%</td>' +
				'<td>' + data.customerStatistics.numOfInspection + '</td>' +
				'<td>' + Math.floor(data.customerStatistics.percentOfInspection) + '%</td>';
		customerStatistics = data.customerStatistics;
		drawDoughnutChart('customerStatistics', customerStatistics);

		//가족
		html += '<td>' + data.familyStatistics.numOfTarget + '</td>' +
				'<td>' + data.familyStatistics.numOfReservation + '</td>' +
				'<td>' + Math.floor(data.familyStatistics.percentOfReservation) + '%</td>' +
				'<td>' + data.familyStatistics.numOfInspection + '</td>' +
				'<td>' + Math.floor(data.familyStatistics.percentOfInspection) + '%</td>';
		familyStatistics = data.familyStatistics;
		drawDoughnutChart('familyStatistics', familyStatistics);

		//개인 정보 동의
		html += '<td>' + data.inspectionStatistics.numOfTotal + '</td>' +
				'<td>' + data.inspectionStatistics.numOfAgree + '</td>' +
				'<td>' + data.inspectionStatistics.numOfDegree + '</td>' +
				'<td>' + data.inspectionStatistics.numOfNone + '</td>';
		inspectionStatistics = data.inspectionStatistics;
		drawAgreeDoughnutChart('inspectionStatistics', inspectionStatistics);

		html += '</tr>';

		$('#statisticsTable').append(html);

		drawDoughnutChart();
	}

	function drawDoughnutChart(id, obj) {
		console.log(id);
		var ctx = document.getElementById(id);
		var data = {
			datasets: [{
				data: [obj.numOfTarget, 0],
				backgroundColor: ["#474457", "#f6f6f6"],
				borderColor: "#f6f6f6"
			}, {
				data: [obj.numOfReservation, obj.numOfTarget - obj.numOfReservation],
				backgroundColor: ["#fea555", "#f6f6f6"],
				borderColor: "#f6f6f6"
			}, {
				data: [obj.numOfInspection, obj.numOfTarget - obj.numOfInspection],
				backgroundColor: ["#86c155", "#f6f6f6"],
				borderColor: "#f6f6f6"
			}]
		};
		var chart = new Chart(ctx, {
			type: 'doughnut',
			data: data,
			options: {
				maintainAspectRatio: false,
				events: [],
				cutoutPercentage: 30,
				scales: {
					display: false,
				}
			}
		});
	}

	function drawAgreeDoughnutChart(id, obj) {
		var ctx = document.getElementById(id);
		var data = {
			labels: ["동의", "거부", "미작성"],
			datasets: [{
				data: [obj.numOfAgree, obj.numOfDegree, obj.numOfNone],
				backgroundColor: ["#474457", "#868686", "#cccccc"],
				borderColor: "#f6f6f6"
			}]
		};
		var chart = new Chart(ctx, {
			type: 'doughnut',
			data: data,
			options: {
				maintainAspectRatio: false,
				legend: {
					display: false
				}
			}
		});
	}



</script>

