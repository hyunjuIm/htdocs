<div class="row" id="yearChartView" style="display: block;padding-top: 4rem">
	<table class="statistics-table" id="chart">
		<tr style="font-size: 1.6rem;font-weight: 400">
			<td>
				수검현황(전체)
			</td>
			<td>
				수검현황(직원)
			</td>
			<td>
				수검현황(가족)
			</td>
			<td>
				개인 정보 동의
			</td>
		</tr>
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
				<div class="state-text">
					<div>
						<div style="float:left;">
							<span style="color:#474457;">●</span>&nbsp;대상자&nbsp;
						</div>
						<div id="totalStatisticsNumOfTarget" style="float: right"></div>
					</div>
					<div>
						<div style="float:left;">
							<span style="color:#fea555;">●</span>&nbsp;예약자&nbsp;
						</div>
						<div id="totalStatisticsNumOfReservation" style="float: right"></div>
					</div>
					<div>
						<div style="float:left;">
							<span style="color:#86c155;">●</span>&nbsp;수검자&nbsp;
						</div>
						<div id="totalStatisticsNumOfInspection" style="float: right"></div>
					</div>
				</div>
			</td>
			<td>
				<div class="state-text">
					<div>
						<div style="float:left;">
							<span style="color:#474457;">●</span>&nbsp;대상자&nbsp;
						</div>
						<div id="customerStatisticsNumOfTarget" style="float: right"></div>
					</div>
					<div>
						<div style="float:left;">
							<span style="color:#fea555;">●</span>&nbsp;예약자&nbsp;
						</div>
						<div id="customerStatisticsNumOfReservation" style="float: right"></div>
					</div>
					<div>
						<div style="float:left;">
							<span style="color:#86c155;">●</span>&nbsp;수검자&nbsp;
						</div>
						<div id="customerStatisticsNumOfInspection" style="float: right"></div>
					</div>
				</div>
			</td>
			<td>
				<div class="state-text">
					<div>
						<div style="float:left;">
							<span style="color:#474457;">●</span>&nbsp;대상자&nbsp;
						</div>
						<div id="familyStatisticsNumOfTarget" style="float: right"></div>
					</div>
					<div>
						<div style="float:left;">
							<span style="color:#fea555;">●</span>&nbsp;예약자&nbsp;
						</div>
						<div id="familyStatisticsNumOfReservation" style="float: right"></div>
					</div>
					<div>
						<div style="float:left;">
							<span style="color:#86c155;">●</span>&nbsp;수검자&nbsp;
						</div>
						<div id="familyStatisticsNumOfInspection" style="float: right"></div>
					</div>
				</div>
			</td>
			<td>
				<div class="state-text">
					<div>
						<div style="float:left;"><span style="color:#474457;">●</span>&nbsp;동의&nbsp;
						</div>
						<div id="inspectionStatisticsNumOfAgree" style="float: right"></div>
					</div>
					<div>
						<div style="float:left;"><span style="color:#868686;">●</span>&nbsp;거부&nbsp;
						</div>
						<div id="inspectionStatisticsNumOfDegree" style="float: right"></div>
					</div>
					<div>
						<div style="float:left;"><span style="color:#cccccc;">●</span>&nbsp;미작성&nbsp;
						</div>
						<div id="inspectionStatisticsNumOfNone" style="float: right"></div>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>

<div class="row" style="display: block;margin-top: 4rem">
	<div style="display: flex">
		<div class="btn btn-outline-dark" onclick="searchYearStatisticsDate(2020)">2020년</div>
		<div class="btn btn-outline-dark" onclick="searchYearStatisticsDate(2019)">2019년</div>
		<div class="btn btn-outline-dark" onclick="searchYearStatisticsDate(2018)">2018년</div>
	</div>

	<hr>

	<div style="padding: 1rem 0">
		<span style="margin-right: 0.5rem;line-height: 3.5rem">예약기간</span>
		<input type="date" id="reservationYearStartDate">
		<span style="line-height: 3.5rem">~</span>
		<input type="date" id="reservationYearEndDate">
		<div class="btn-light-grey-square" style="height: 3.5rem"
			 onclick="searchYearStatisticsDate(0)">검색
		</div>
	</div>

	<table class="basic-table" id="yearTableView" style="margin-top: 1rem">
		<thead>
		<tr>
			<th colspan="5" class="title division-line">전체</th>
			<th colspan="5" class="title division-line">본인</th>
			<th colspan="5" class="title division-line">가족</th>
			<th colspan="4" class="title">개인 정보 동의</th>
		</tr>
		<tr>
			<th>대상자</th>
			<th>예약자</th>
			<th>예약률</th>
			<th>수검자</th>
			<th class="division-line">수검률</th>

			<th>대상자</th>
			<th>예약자</th>
			<th>예약률</th>
			<th>수검자</th>
			<th class="division-line">수검률</th>

			<th>대상자</th>
			<th>예약자</th>
			<th>예약률</th>
			<th>수검자</th>
			<th class="division-line">수검률</th>

			<th>전체</th>
			<th>동의</th>
			<th>거부</th>
			<th>미작성</th>
		</tr>
		</thead>
		<tbody id="yearStatisticsTable">
		</tbody>
	</table>
</div>

<script>
	$('#yearChartView').hide();
	$('#yearTableView').hide();

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
		$('#yearStatisticsTable').empty();

		$('#yearChartView').show();
		$('#yearTableView').show();

		var html = '<tr>';

		//전체
		html += '<td>' + data.totalStatistics.numOfTarget + '</td>' +
				'<td>' + data.totalStatistics.numOfReservation + '</td>' +
				'<td>' + Math.floor(data.totalStatistics.percentOfReservation) + '%</td>' +
				'<td>' + data.totalStatistics.numOfInspection + '</td>' +
				'<td class="division-line">' + Math.floor(data.totalStatistics.percentOfInspection) + '%</td>';
		drawDoughnutChart('totalStatistics', data.totalStatistics);
		$('#totalStatisticsNumOfTarget').text(data.totalStatistics.numOfTarget + '명');
		$('#totalStatisticsNumOfReservation').text(data.totalStatistics.numOfReservation + '명');
		$('#totalStatisticsNumOfInspection').text(data.totalStatistics.numOfInspection + '명');

		//본인
		html += '<td>' + data.customerStatistics.numOfTarget + '</td>' +
				'<td>' + data.customerStatistics.numOfReservation + '</td>' +
				'<td>' + Math.floor(data.customerStatistics.percentOfReservation) + '%</td>' +
				'<td>' + data.customerStatistics.numOfInspection + '</td>' +
				'<td class="division-line">' + Math.floor(data.customerStatistics.percentOfInspection) + '%</td>';
		drawDoughnutChart('customerStatistics', data.customerStatistics);
		$('#customerStatisticsNumOfTarget').text(data.customerStatistics.numOfTarget + '명');
		$('#customerStatisticsNumOfReservation').text(data.customerStatistics.numOfReservation + '명');
		$('#customerStatisticsNumOfInspection').text(data.customerStatistics.numOfInspection + '명');

		//가족
		html += '<td>' + data.familyStatistics.numOfTarget + '</td>' +
				'<td>' + data.familyStatistics.numOfReservation + '</td>' +
				'<td>' + Math.floor(data.familyStatistics.percentOfReservation) + '%</td>' +
				'<td>' + data.familyStatistics.numOfInspection + '</td>' +
				'<td class="division-line">' + Math.floor(data.familyStatistics.percentOfInspection) + '%</td>';
		drawDoughnutChart('familyStatistics', data.familyStatistics);
		$('#familyStatisticsNumOfTarget').text(data.familyStatistics.numOfTarget + '명');
		$('#familyStatisticsNumOfReservation').text(data.familyStatistics.numOfReservation + '명');
		$('#familyStatisticsNumOfInspection').text(data.familyStatistics.numOfInspection + '명');

		//개인 정보 동의
		html += '<td>' + data.inspectionStatistics.numOfTotal + '</td>' +
				'<td>' + data.inspectionStatistics.numOfAgree + '</td>' +
				'<td>' + data.inspectionStatistics.numOfDegree + '</td>' +
				'<td>' + data.inspectionStatistics.numOfNone + '</td>';
		drawAgreeDoughnutChart('inspectionStatistics', data.inspectionStatistics);
		$('#inspectionStatisticsNumOfAgree').text(data.inspectionStatistics.numOfAgree + '명');
		$('#inspectionStatisticsNumOfDegree').text(data.inspectionStatistics.numOfDegree + '명');
		$('#inspectionStatisticsNumOfNone').text(data.inspectionStatistics.numOfNone + '명');

		html += '</tr>';

		$('#yearStatisticsTable').append(html);
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
