<div class="row" style="display: block; margin-top: 40px">
	<div style="display: flex">
		<div class="btn btn-outline-dark" onclick="searchYearStatisticsDate(2021)">2021년</div>
		<div class="btn btn-outline-dark" onclick="searchYearStatisticsDate(2020)">2020년</div>
		<div class="btn btn-outline-dark" onclick="searchYearStatisticsDate(2019)">2019년</div>
	</div>

	<hr>

	<div style="padding-top: 10px;font-size: 1.4rem">
		<div style="font-weight: 400;padding: 2px">예약기간</div>
		<div style="width: 100%;display: block">
			<input type="date" id="reservationYearStartDate">
			<span>&nbsp;~&nbsp;</span>
			<input type="date" id="reservationYearEndDate">
			<div class="btn btn-dark" onclick="searchYearStatisticsDate(0)"
				 style="margin-left: 4px">검색
			</div>
		</div>
	</div>
</div>

<form id="yearChartView">
	<div class="row canvas-box">
		<div class="title">수검현황(전체)</div>
		<canvas id="totalStatistics"></canvas>
		<table>
			<tr>
				<td>
					<span style="color:#474457;">●</span>&nbsp;대상자&nbsp;
					<span id="totalStatisticsNumOfTarget"></span>
				</td>
				<td>
					<span style="color:#fea555;">●</span>&nbsp;예약자&nbsp;
					<span id="totalStatisticsNumOfReservation"></span>
				</td>
				<td>
					<span style="color:#86c155;">●</span>&nbsp;수검자&nbsp;
					<span id="totalStatisticsNumOfInspection"></span>
				</td>
			</tr>
		</table>
	</div>

	<div class="row canvas-box">
		<div class="title">수검현황(직원)</div>
		<canvas id="customerStatistics"></canvas>
		<table>
			<tr>
				<td>
					<span style="color:#474457;">●</span>&nbsp;대상자&nbsp;
					<span id="customerStatisticsNumOfTarget"></span>
				</td>
				<td>
					<span style="color:#fea555;">●</span>&nbsp;예약자&nbsp;
					<span id="customerStatisticsNumOfReservation"></span>
				</td>
				<td>
					<span style="color:#86c155;">●</span>&nbsp;수검자&nbsp;
					<span id="customerStatisticsNumOfInspection"></span>
				</td>
			</tr>
		</table>
	</div>

	<div class="row canvas-box">
		<div class="title">수검현황(가족)</div>
		<canvas id="familyStatistics"></canvas>
		<table>
			<tr>
				<td>
					<span style="color:#474457;">●</span>&nbsp;대상자&nbsp;
					<span id="familyStatisticsNumOfTarget"></span>
				</td>
				<td>
					<span style="color:#fea555;">●</span>&nbsp;예약자&nbsp;
					<span id="familyStatisticsNumOfReservation"></span>
				</td>
				<td>
					<span style="color:#86c155;">●</span>&nbsp;수검자&nbsp;
					<span id="familyStatisticsNumOfInspection"></span>
				</td>
			</tr>
		</table>
	</div>

	<div class="row canvas-box">
		<div class="title">개인 정보 동의</div>
		<canvas id="inspectionStatistics"></canvas>
		<table>
			<tr>
				<td>
					<span style="color:#474457;">●</span>&nbsp;동의&nbsp;
					<span id="inspectionStatisticsNumOfAgree"></span>
				</td>
				<td>
					<span style="color:#868686;">●</span>&nbsp;거부&nbsp;
					<span id="inspectionStatisticsNumOfDegree"></span>
				</td>
				<td>
					<span style="color:#cccccc;">●</span>&nbsp;미작성&nbsp;
					<span id="inspectionStatisticsNumOfNone"></span>
				</td>
			</tr>
		</table>
	</div>
</form>


<script>
	$('#yearChartView').hide();

	//날짜검색
	function searchYearStatisticsDate(type) {
		var sendItems = new Object();
		sendItems.coId = sessionStorage.getItem('userCoID');

		if (type == 0) {
			sendItems.reservationStartDate = $('#reservationYearStartDate').val();
			sendItems.reservationEndDate = $('#reservationYearEndDate').val();
		} else {
			sendItems.reservationStartDate = type + '-01-01';
			$('#reservationYearStartDate').val(type + '-01-01');
			sendItems.reservationEndDate = type + '-12-31';
			$('#reservationYearEndDate').val(type + '-12-31');
		}

		if (sendItems.reservationStartDate == null || sendItems.reservationEndDate == null ||
				sendItems.reservationStartDate == '' || sendItems.reservationEndDate == '') {
			alert('예약기간을 선택해주세요.')
			return false;
		} else {
			instance.post('C0401', sendItems).then(res => {
				setYearStatisticsData(res.data);
			}).catch(function (error) {
			});
		}
	}

	//통계 표 셋팅
	function setYearStatisticsData(data) {

		$('#yearChartView').show();

		//전체
		drawDoughnutChart('totalStatistics', data.totalStatistics);
		$('#totalStatisticsNumOfTarget').text(data.totalStatistics.numOfTarget + '명');
		$('#totalStatisticsNumOfReservation').text(data.totalStatistics.numOfReservation + '명');
		$('#totalStatisticsNumOfInspection').text(data.totalStatistics.numOfInspection + '명');

		//본인
		drawDoughnutChart('customerStatistics', data.customerStatistics);
		$('#customerStatisticsNumOfTarget').text(data.customerStatistics.numOfTarget + '명');
		$('#customerStatisticsNumOfReservation').text(data.customerStatistics.numOfReservation + '명');
		$('#customerStatisticsNumOfInspection').text(data.customerStatistics.numOfInspection + '명');

		//가족
		drawDoughnutChart('familyStatistics', data.familyStatistics);
		$('#familyStatisticsNumOfTarget').text(data.familyStatistics.numOfTarget + '명');
		$('#familyStatisticsNumOfReservation').text(data.familyStatistics.numOfReservation + '명');
		$('#familyStatisticsNumOfInspection').text(data.familyStatistics.numOfInspection + '명');

		//개인 정보 동의
		drawAgreeDoughnutChart('inspectionStatistics', data.inspectionStatistics);
		$('#inspectionStatisticsNumOfAgree').text(data.inspectionStatistics.numOfAgree + '명');
		$('#inspectionStatisticsNumOfDegree').text(data.inspectionStatistics.numOfDegree + '명');
		$('#inspectionStatisticsNumOfNone').text(data.inspectionStatistics.numOfNone + '명');
	}

	function drawDoughnutChart(id, obj) {
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
				},
				events: [],
				scales: {
					display: false
				}
			}
		});
	}
</script>
