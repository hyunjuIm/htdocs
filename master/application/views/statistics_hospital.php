<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:병원통계</title>

	<?php
	require('head.php');
	?>

	<style>
		.table {
			font-size: 15px;
		}

		th {
			background: #e6e6e6;
		}

		td {
			background: white;
		}

		.sum-td {
			font-weight: bold;
			color: red;
		}

		.row {
			padding: 0;
			margin: 0 auto;
			width: 100%;
		}

		.table-bordered > thead > tr > th,
		.table-bordered > tbody > tr > th,
		.table-bordered > tfoot > tr > th,
		.table-bordered > thead > tr > td,
		.table-bordered > tbody > tr > td,
		.table-bordered > tfoot > tr > td {
			padding: 5px;
			border: 0.5px solid #b6b6b6;
		}

		.btn {
			font-size: 13px;
			margin: 0 2px;
			border-radius: 0;
		}

		input[type=date] {
			width: fit-content;
			border: 1px solid #DCDCDC;
			padding: 3px 5px;
			text-align: left;
		}

		.order {
			background: #dedede;
			font-weight: 500;
			cursor: pointer;
			color: #3529b1;
		}

		.order:hover {
			background: #CCCCCC;
		}
	</style>

</head>

<body>

<!--상단 네비바-->
<header>
	<?php
	require('header.php');
	?>
</header>
<!--상단 네비바-->

<!--콘텐츠 내용-->
<div class="container" style="padding: 50px; max-width: none; width: 100%;">
	<div class="row">
		<form style="margin: 0 auto; width: 100%;">
			<ul class="img-circle">
				<div class="menu-title" style="font-size: 22px">
					<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
					병원통계
				</div>
				<div class="form-row row" style="margin: 0 auto;width: 60%">
					<label class="col-form-label" style="margin-left: 20px">
						<li>고객사</li>
					</label>
					<div class="form-group col" style="display: flex">
						<select id="stComName" class="form-control"
								onchange="setCompanySelectOption(this, 'stComBranch')">
							<option value="choice" selected>-선택-</option>
						</select>
					</div>
					<label class="col-form-label" style="margin-left: 20px">
						<li>사업장</li>
					</label>
					<div class="form-group col">
						<select id="stComBranch" class="form-control">
							<option value="choice" selected>-선택-</option>
						</select>
					</div>
				</div>
			</ul>
		</form>
	</div>

	<div class="row" style="margin: 0 auto; width: 95%;">
		<div class="row" style="display: block">
			<div style="display: flex">
				<div class="btn btn-outline-dark" onclick="searchHospitalStatisticsDate(2021)">2021년</div>
				<div class="btn btn-outline-dark" onclick="searchHospitalStatisticsDate(2020)">2020년</div>
				<div class="btn btn-outline-dark" onclick="searchHospitalStatisticsDate(2019)">2019년</div>
			</div>

			<hr>

			<div style="padding-top: 10px;display: table">
				<div style="display: table-cell; vertical-align: middle">
					<span style="margin-right: 5px;line-height: 35px">예약기간</span>
					<input type="date" id="reservationHosStartDate">
					<span style="line-height: 35px">~</span>
					<input type="date" id="reservationHosEndDate">
				</div>
				<div style="display: table-cell; vertical-align: middle;padding-left: 3px">
					<div class="btn btn-dark" style="height: 32px"
						 onclick="searchHospitalStatisticsDate(0)">검색
					</div>
				</div>
			</div>
		</div>

		<div class="row" style="display: block" id="hosTableView">
			<div style="float:right;font-size: 14px;color: #5645ed;font-weight: 400">
				※ 본인-예약자를 클릭하면 오름차순 또는 내림차순으로 정렬됩니다.
			</div>

			<table class="table table-bordered">
				<thead>
				<tr>
					<th rowspan="2" width="10%">NO</th>
					<th rowspan="2" width="20%">병원</th>
					<th rowspan="2">지역</th>
					<th colspan="3">본인</th>
					<th colspan="3">가족</th>
				</tr>
				<tr>
					<th width="10%" class="order" onclick="switchTag()">예약자<span
								style="letter-spacing: -10px;">↓↑</span>
					</th>
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
	</div>

</div>
<!--콘텐츠 내용-->

</body>
<!--체크박스 검사-->
<?php
require('check_data.php');
?>
</html>

<script type="text/javascript">
	$('#hosTableView').css('visibility', 'hidden');

	//검색항목리스트
	instance.post('M012001_RES').then(res => {
		setStaticsHospitalOption(res.data);
	});

	//검색 selector
	function setStaticsHospitalOption(data) {
		//회사
		var name = [];
		var nameSize = 0;

		for (i = 0; i < data.coNameBranch.length; i++) {
			var check = 0;

			//회사명 - 지점있을때
			var jbSplit = data.coNameBranch[i].split('-');
			var companyName = jbSplit[0];

			for (var j = 0; j < nameSize; j++) {
				if (name[j] == companyName) {
					check += 1;
				}
			}
			if (check < 1) {
				name[nameSize] = companyName;
				nameSize += 1;
			}
		}

		for (i = 0; i < nameSize; i++) {
			var html = '';
			html += '<option value=\'' + name[i] + '\'>' + name[i] + '</option>'
			$("#stComName").append(html);
		}

		companySelect = data.coNameBranch;
	}

	//검색
	function searchHospitalStatisticsDate(type) {
		var searchItems = new Object();
		searchItems.coName = $("#stComName option:selected").val();
		searchItems.coBranch = $("#stComBranch option:selected").val();

		if (type == 0) {
			searchItems.reservationStartDate = $('#reservationHosStartDate').val();
			searchItems.reservationEndDate = $('#reservationHosEndDate').val();
		} else {
			searchItems.reservationStartDate = type + '-01-01';
			$('#reservationHosStartDate').val(type + '-01-01');
			searchItems.reservationEndDate = type + '-12-31';
			$('#reservationHosEndDate').val(type + '-12-31');
		}

		if (searchItems.reservationStartDate == null || searchItems.reservationEndDate == null ||
				searchItems.reservationStartDate == '' || searchItems.reservationEndDate == '') {
			alert('예약기간을 선택해주세요.');
		} else if (searchItems.coName == "choice") {
			alert("고객사명을 선택해주세요.");
		} else if (searchItems.coBranch == "choice") {
			alert("사업장명을 선택해주세요.");
		} else {
			instance.post('M1203', searchItems).then(res => {
				tableData = res.data.statisticsList;
				displayTable();
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
