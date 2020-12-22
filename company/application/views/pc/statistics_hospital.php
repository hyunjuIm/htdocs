<div class="row" style="display: block; margin-top: 4rem">
	<div style="display: flex">
		<div class="btn btn-outline-dark" onclick="searchHospitalStatisticsDate(2020)">2020년</div>
		<div class="btn btn-outline-dark" onclick="searchHospitalStatisticsDate(2019)">2019년</div>
		<div class="btn btn-outline-dark" onclick="searchHospitalStatisticsDate(2018)">2018년</div>
	</div>

	<hr>

	<div style="padding-top: 1rem">
		<span style="margin-right: 0.5rem;line-height: 3.5rem">예약기간</span>
		<input type="date" id="reservationHosStartDate">
		<span style="line-height: 3.5rem">~</span>
		<input type="date" id="reservationHosEndDate">
		<div class="btn-light-grey-square" style="height: 3.5rem"
			 onclick="searchHospitalStatisticsDate(0)">검색
		</div>
	</div>
</div>

<div class="row" style="display: block" id="hosTableView">
	<div style="float:right;font-size: 1.4rem;color: #5645ed;font-weight: 400">
		※ 본인-예약자를 클릭하면 오름차순 또는 내림차순으로 자동 정렬됩니다.
	</div>

	<table class="basic-table">
		<thead>
		<tr>
			<th rowspan="2" width="10%">NO</th>
			<th rowspan="2" width="20%">병원</th>
			<th rowspan="2">지역</th>
			<th colspan="3">본인</th>
			<th colspan="3">가족</th>
		</tr>
		<tr>
			<th width="10%" class="order" onclick="switchTag()">예약자<span style="letter-spacing: -1rem;">↓↑</span></th>
			<th width="10%">수검자</th>
			<th width="10%">수검률</th>
			<th width="10%">예약자</th>
			<th width="10%">수검자</th>
			<th width="10%">수검률</th>
		</tr>
		</thead>
		<tbody id="hosStatisticsTable">
		</tbody>
	</table>
</div>

<script>
	$('#hosTableView').css('visibility', 'hidden');

	//날짜검색
	function searchHospitalStatisticsDate(type) {
		var sendItems = new Object();
		sendItems.coId = sessionStorage.getItem('userCoID');

		if (type == 0) {
			sendItems.reservationStartDate = $('#reservationHosStartDate').val();
			sendItems.reservationEndDate = $('#reservationHosEndDate').val();
		} else {
			sendItems.reservationStartDate = type + '-01-01';
			$('#reservationHosStartDate').val(type + '-01-01');
			sendItems.reservationEndDate = type + '-12-31';
			$('#reservationHosEndDate').val(type + '-12-31');
		}

		if (sendItems.reservationStartDate == null || sendItems.reservationEndDate == null ||
				sendItems.reservationStartDate == '' || sendItems.reservationEndDate == '') {
			alert('예약기간을 선택해주세요.')
			return false;
		} else {
			instance.post('C0402', sendItems).then(res => {
				tableData = res.data.statisticsList;
				displayTable();
			}).catch(function (error) {
			});
		}
	}

	var tableData = new Array();
	var tag = true;

	function displayTable() {
		sortByReservation();
		setHospitalStatisticsData();
	}

	function setHospitalStatisticsData() {
		$('#hosStatisticsTable').empty();
		$('#hosTableView').css('visibility', 'visible');

		if (tableData.length > 0) {
			$('#hosTableView').css('visibility', 'visible');
		} else {
			$('#hosTableView').css('visibility', 'hidden');
			alert('해당기간 자료가 없습니다.');
		}

		for (i = 0; i < tableData.length; i++) {
			var html = '';
			var no = i + 1;

			html += '<tr>' +
					'<td>' + no + '</td>' +
					'<td>' + tableData[i].hosName + '</td>' +
					'<td>' + tableData[i].region + '</td>';

			html += '<td>' + tableData[i].customerStatistics.numOfReservation + '</td>' +
					'<td>' + tableData[i].customerStatistics.numOfInspection + '</td>' +
					'<td>' + Math.floor(tableData[i].customerStatistics.percentOfInspection) + '%</td>';

			html += '<td>' + tableData[i].familyStatistics.numOfReservation + '</td>' +
					'<td>' + tableData[i].familyStatistics.numOfInspection + '</td>' +
					'<td>' + Math.floor(tableData[i].familyStatistics.percentOfInspection) + '%</td>' +
					'</tr>';
			$('#hosStatisticsTable').append(html);
		}
	}

	function sortByReservation() {
		if (tag) {
			tableData = tableData.sort(function (a, b) {
				var nameA = a.customerStatistics.numOfInspection; // ignore upper and lowercase
				var nameB = b.customerStatistics.numOfInspection; // ignore upper and lowercase
				if (nameA < nameB) {
					return -1;
				}
				if (nameA > nameB) {
					return 1;
				}

				return 0;
			});
		} else {
			tableData = tableData.sort(function (a, b) {
				var nameA = a.customerStatistics.numOfInspection; // ignore upper and lowercase
				var nameB = b.customerStatistics.numOfInspection; // ignore upper and lowercase
				if (nameA > nameB) {
					return -1;
				}
				if (nameA < nameB) {
					return 1;
				}

				return 0;
			});
		}
	}

	function switchTag() {
		tag = !tag;
		displayTable();
	}

</script>
