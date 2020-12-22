<div class="row" style="display: block;" id="areaChartView">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="area-title">지역별</div>
				<div id="areaBarContent" style="height: 40rem">
				</div>
			</div>
			<div class="col">
				<div class="area-title" id="areaHosTitle">병원별</div>
				<div id="hosBarContent" style="height: 40rem">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row" style="display: block;margin-top: 4rem">
	<div style="display: flex">
		<div class="btn btn-outline-dark" onclick="searchAreaStatisticsDate(2020)">2020년</div>
		<div class="btn btn-outline-dark" onclick="searchAreaStatisticsDate(2019)">2019년</div>
		<div class="btn btn-outline-dark" onclick="searchAreaStatisticsDate(2018)">2018년</div>
	</div>

	<hr>

	<div style="padding-top: 1rem">
		<span style="margin-right: 0.5rem;line-height: 3.5rem">예약기간</span>
		<input type="date" id="reservationAreaStartDate">
		<span style="line-height: 3.5rem">~</span>
		<input type="date" id="reservationAreaEndDate">
		<div class="btn-light-grey-square" style="height: 3.5rem"
			 onclick="searchAreaStatisticsDate(0)">검색
		</div>
	</div>
</div>

<div class="row" id="areaTableView" style="display: block">
	<div style="float:right;font-size: 1.4rem;color: #5645ed;font-weight: 400">
		※ 지역명을 누르면 해당 지역의 병원별 그래프를 확인하실 수 있습니다.
	</div>

	<table class="basic-table">
		<thead>
		<tr>
			<th rowspan="2" width="12%">지역</th>
			<th colspan="5">병원</th>
			<th colspan="2">예약자</th>
			<th colspan="2">수검자</th>
			<th colspan="2">수검률</th>
		</tr>
		<tr>
			<th width="8%">상급 종합</th>
			<th width="8%">종합</th>
			<th width="8%">병원</th>
			<th width="8%">검진센터<br>(의원)</th>
			<th width="8%">합계</th>
			<th width="8%">본인</th>
			<th width="8%">가족</th>
			<th width="8%">본인</th>
			<th width="8%">가족</th>
			<th width="8%">본인</th>
			<th width="8%">가족</th>
		</tr>
		</thead>
		<tbody id="areaStatisticsTable">
		</tbody>
	</table>
</div>

<script>
	$('#areaChartView').css('visibility', 'hidden');
	$('#areaTableView').css('visibility', 'hidden');

	//날짜검색
	function searchAreaStatisticsDate(type) {
		var sendItems = new Object();
		sendItems.coId = sessionStorage.getItem('userCoID');

		if (type == 0) {
			sendItems.reservationStartDate = $('#reservationAreaStartDate').val();
			sendItems.reservationEndDate = $('#reservationAreaEndDate').val();
		} else {
			sendItems.reservationStartDate = type + '-01-01';
			$('#reservationAreaStartDate').val(type + '-01-01');
			sendItems.reservationEndDate = type + '-12-31';
			$('#reservationAreaEndDate').val(type + '-12-31');
		}

		if (sendItems.reservationStartDate == null || sendItems.reservationEndDate == null ||
				sendItems.reservationStartDate == '' || sendItems.reservationEndDate == '') {
			alert('예약기간을 선택해주세요.')
			return false;
		} else {
			instance.post('C0403', sendItems).then(res => {
				setAreaStatisticsData(res.data);
			}).catch(function (error) {
			});
		}
	}

	let allData = {};
	var regionDataArr = [];
	var regionArr = [];

	function setAreaStatisticsData(data) {
		var regionData = [];
		regionArr = [];
		$('#areaStatisticsTable').empty();
		allData = data;

		if (data.length > 0) {
			$('#areaChartView').css('visibility', 'visible');
			$('#areaTableView').css('visibility', 'visible');
		} else {
			$('#areaChartView').css('visibility', 'hidden');
			$('#areaTableView').css('visibility', 'hidden');
			alert('해당기간 자료가 없습니다.');
		}

		for (i = 0; i < data.length; i++) {
			var countOfHos1 = 0;
			var countOfHos2 = 0;
			var countOfHos3 = 0;
			var countOfHos4 = 0;
			var countOfHosTotal = 0;

			var numOfCustomerReservation = 0;
			var numOfCustomerInspection = 0;
			var numOfFamilyReservation = 0;
			var numOfFamilyInspection = 0;
			var perOfFamilyReservation = 0.0;
			var perOfFamilyInspection = 0.0;

			var html = '<tr>';
			html += '<td class="choice" onclick="drawSelectedChart(\'' + data[i].region + '\')">' + data[i].region + '</td>'
			regionArr.push(data[i].region);
			for (j = 0; j < data[i].countByGradeListDTOS.length; j++) {
				let grade = data[i].countByGradeListDTOS[j].grade;
				let gradeCount = data[i].countByGradeListDTOS[j].gradeCount;
				if (grade === "상급 종합") {
					countOfHos1 = gradeCount;
				}
				if (grade === "종합") {
					countOfHos2 = gradeCount;
				}
				if (grade === "병원") {
					countOfHos3 = gradeCount;
				}
				if (grade === "검진센터(의원)") {
					countOfHos4 = gradeCount;
				}
				countOfHosTotal += gradeCount;

				let customerStatistics = data[i].countByGradeListDTOS[j].numOfCustomerStatisticsDTO;
				let familyStatistics = data[i].countByGradeListDTOS[j].numOfFamilyStatisticsDTO;
				numOfCustomerReservation += customerStatistics.numOfReservation;
				numOfCustomerInspection += customerStatistics.numOfInspection;
				numOfFamilyReservation += familyStatistics.numOfReservation;
				numOfFamilyInspection += familyStatistics.numOfInspection;

			}
			perOfFamilyReservation = (numOfCustomerReservation === 0) ? 0 : numOfCustomerInspection * 100 / numOfCustomerReservation;
			perOfFamilyInspection = (numOfFamilyReservation === 0) ? 0 : numOfFamilyInspection * 100 / numOfFamilyReservation;

			html += '<td>' + countOfHos1 + '</td>'
			html += '<td>' + countOfHos2 + '</td>'
			html += '<td>' + countOfHos3 + '</td>'
			html += '<td>' + countOfHos4 + '</td>'
			html += '<td>' + countOfHosTotal + '</td>'
			html += '<td>' + numOfCustomerReservation + '</td>'
			html += '<td>' + numOfCustomerInspection + '</td>'
			html += '<td>' + numOfFamilyReservation + '</td>'
			html += '<td>' + numOfFamilyInspection + '</td>'
			html += '<td>' + Math.floor(perOfFamilyReservation) + '%</td>'
			html += '<td>' + Math.floor(perOfFamilyInspection) + '%</td>'
			regionData = [];

			regionData.push(data[i].region);
			regionData.push(countOfHos1);
			regionData.push(countOfHos2);
			regionData.push(countOfHos3);
			regionData.push(countOfHos4);
			regionData.push(countOfHosTotal);
			regionData.push(numOfCustomerReservation);
			regionData.push(numOfCustomerInspection);
			regionData.push(numOfFamilyReservation);
			regionData.push(numOfFamilyInspection);
			regionData.push(perOfFamilyReservation);
			regionData.push(perOfFamilyInspection);
			regionDataArr.push(regionData);


			html += '</tr>';
			$('#areaStatisticsTable').append(html);
		}
		drawBarChart();
		if (data.length > 0) drawSelectedChart(data[0].region)
	}

	function drawBarChart() {
		var labels = [];
		var datasets = [];

		for (var i = 0; i < regionDataArr.length; i++) {
			labels.push(regionDataArr[i][0]);
		}

		if (regionDataArr.length > 7) {
			$('#areaBarContent').height('100rem');
		} else {
			$('#areaBarContent').height('40rem');
		}
		$('#areaBarContent').html('<canvas id="areaBar"></canvas>');

		for (var z = 6; z < 10; z++) {
			var label = (z === 6) ? "예약자(본인)" : (z === 7) ? "수검자(본인)" : (z === 8) ? "예약자(가족)" : "수검자(가족)";
			var data = [];
			for (var i = 0; i < regionDataArr.length; i++) {
				data.push(regionDataArr[i][z])
			}
			var backgroundColor = (z === 6) ? "#8064a2" : (z === 7) ? "#9bbb59" : (z === 8) ? "#c0504d" : "#4f81bd";
			var datasetObj = {
				label: label,
				data: data,
				backgroundColor: backgroundColor,
			};
			datasets.push(datasetObj);
		}
		var dataBar1 = {labels, datasets};

		var areaBar = document.getElementById('areaBar').getContext('2d');
		new Chart(areaBar, {
			type: "horizontalBar",
			data: dataBar1,
			options: {
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero: true,
							min: 0
						}
					}]
				},
				maintainAspectRatio: false,
				elements: {
					rectangle: {
						borderWidth: 2
					}
				},
				responsive: true,
				legend: {
					position: "bottom"
				}
			}
		});

		regionDataArr = [];
	}


	function drawSelectedChart(region) {
		let index = regionArr.indexOf(region);
		let selectedData = allData[index].countByGradeListDTOS;

		$('#areaHosTitle').html('병원별 <span style="color: #3529b1;font-size: 1.9rem;font-weight: bold">(' + region + ')</span>');

		var labels = [];
		var datasets = [];

		for (var i = 0; i < selectedData.length; i++) {
			labels.push(selectedData[i].grade);
		}

		if (selectedData.length > 7) {
			$('#hosBarContent').height('100rem');
		} else {
			$('#hosBarContent').height('40rem');
		}
		$('#hosBarContent').html('<canvas id="hosBar"></canvas>');

		for (var z = 0; z < 4; z++) {
			var label = (z === 0) ? "예약자(본인)" : (z === 1) ? "수검자(본인)" : (z === 2) ? "예약자(가족)" : "수검자(가족)";
			var data = [];
			for (var i = 0; i < selectedData.length; i++) {
				let cuStat = selectedData[i].numOfCustomerStatisticsDTO;
				let faStat = selectedData[i].numOfFamilyStatisticsDTO;
				let d = (z === 0) ? cuStat.numOfReservation : (z === 1) ? cuStat.numOfInspection : (z === 2) ? faStat.numOfReservation : faStat.numOfInspection;
				data.push(d)
			}
			var backgroundColor = (z === 0) ? "#8064a2" : (z === 1) ? "#9bbb59" : (z === 2) ? "#c0504d" : "#4f81bd";
			var datasetObj = {
				label: label,
				data: data,
				backgroundColor: backgroundColor,
			};
			datasets.push(datasetObj);

		}

		var dataBar1 = {labels, datasets};

		var hosBar = document.getElementById('hosBar').getContext("2d");
		new Chart(hosBar, {
			type: "horizontalBar",
			data: dataBar1,
			options: {
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero: true,
							min: 0
						}
					}]
				},
				maintainAspectRatio: false,
				elements: {
					rectangle: {
						borderWidth: 2
					}
				},
				responsive: true,
				legend: {
					position: "bottom"
				}
			}
		});
	}


</script>
