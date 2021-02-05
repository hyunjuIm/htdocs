<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:기업통계</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
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

		.table-bordered > thead > tr > th,
		.table-bordered > tbody > tr > th,
		.table-bordered > tfoot > tr > th,
		.table-bordered > thead > tr > td,
		.table-bordered > tbody > tr > td,
		.table-bordered > tfoot > tr > td {
			padding: 5px;
			border: 0.5px solid #b6b6b6;
		}
	</style>

</head>

<body>

<!--상단 네비바-->
<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>
<!--상단 네비바-->

<!--콘텐츠 내용-->
<div class="container" style="padding-top: 50px; max-width: none">
	<div class="row">
		<div class="col">
			<form style="margin: 0 auto; width: 95%; padding: 0px 10px">
				<ul class="img-circle">
					<div class="menu-title" style="font-size: 22px;margin-bottom: 25px">
						<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px">
						기업통계
					</div>
					<div class="form-row row" style="margin: 0 auto;width: 90%">
						<label class="col-form-label">
							<li>고객사</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="stComName" class="form-control" style="margin-right: 10px"
									onchange="setCompanySelectOption(this, 'stComBranch')">
								<option value="all" selected>-선택-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>사업장</li>
						</label>
						<div class="form-group col">
							<select id="stComBranch" class="form-control">
								<option value="all" selected>-선택-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>사업연도</li>
						</label>
						<div class="form-group col">
							<select id="stYear" class="form-control">
							</select>
						</div>
						<div style="margin-left: 50px">
							<div class="btn-save-square" onclick="searchStaticsCompanyData()">
								검색
							</div>
						</div>
					</div>
				</ul>
			</form>
			<hr>
		</div>
	</div>

	<div class="row" id="companyChartView" style="margin: 0 auto;padding: 50px">
		<canvas id="companyChart" width="90%" height="15%"></canvas>
	</div>

	<div class="row " style="margin: 0px 30px">
		<div class="table-responsive" id="statisticsCompanyView" style="margin: 0 auto;display: none">
			<div
					class="btn-default-small excel" style="float: right" onclick="tableExcelDownload()"></div>
			<table id="statisticsCompanyInfos" class="table table-bordered" style="margin-top: 45px">
				<tbody>
				<tr>
					<th colspan="3" id="year">사업연도</th>
					<th style="color: red">합계</th>
					<th>1</th>
					<th>2</th>
					<th>3</th>
					<th>4</th>
					<th>5</th>
					<th>6</th>
					<th>7</th>
					<th>8</th>
					<th>9</th>
					<th>10</th>
					<th>11</th>
					<th>12</th>
				</tr>
				<tr id="targetCount">
					<th rowspan="6">예약현황</th>
					<th rowspan="2">대상자수</th>
					<th>직원</th>
				</tr>
				<tr id="famTargetCount">
					<th>가족</th>
				</tr>
				<tr id="rsvCount">
					<th rowspan="2">예약자수</th>
					<th>직원</th>
				</tr>
				<tr id="famRsvCount">
					<th>가족</th>
				</tr>
				<tr id="ispCount">
					<th rowspan="2">수검자수</th>
					<th>직원</th>
				</tr>
				<tr id="famIspCount">
					<th>가족</th>
				</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>
<!--콘텐츠 내용-->

</body>
</html>

<script type="text/javascript">
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	//검색항목리스트
	instance.post('M011001_RES').then(res => {
		setStaticsCompanyOption(res.data);
	});

	//검색
	function searchStaticsCompanyData() {
		var searchItems = new Object();

		searchItems.coName = $("#stComName option:selected").val();
		searchItems.coBranch = $("#stComBranch option:selected").val();
		searchItems.year = $("#stYear option:selected").val();

		if (searchItems.coName == 'all') {
			alert("고객사를 선택해주세요.");
			return false;
		}
		if (searchItems.coBranch == 'all') {
			alert("사업장을 선택해주세요.");
			return false;
		}

		instance.post('M011002_REQ_RES', searchItems).then(res => {
			setStaticsCompanyData(res.data);
		});
	}

	//검색 selector
	function setStaticsCompanyOption(data) {

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

		//사업연도
		for (i = 0; i < data.year.length; i++) {
			var html = '';
			html += '<option>' + data.year[i] + '</option>'
			$("#stYear").append(html);
		}

	}

	//기업 통계 테이블
	function setStaticsCompanyData(data) {
		$('#statisticsCompanyView').show();
		$('#statisticsCompanyInfos > tbody > tr > td').remove();
		$('#year').text('사업연도) ' + ($("#stYear option:selected").val()));

		//합계
		var targetSum = 0;
		var famTargetSum = 0;
		var rsvSum = 0;
		var famRsvSum = 0;
		var ispSum = 0;
		var famIspSum = 0;

		for (i = 0; i < data.length; i++) {
			targetSum += data[i].targetCount;
			famTargetSum += data[i].famTargetCount;
			rsvSum += data[i].rsvCount;
			famRsvSum += data[i].famRsvCount;
			ispSum += data[i].ispCount;
			famIspSum += data[i].famIspCount;
		}

		$("#targetCount").append('<td class="sum-td">' + targetSum + '</td>');
		$("#famTargetCount").append('<td class="sum-td">' + famTargetSum + '</td>');
		$("#rsvCount").append('<td class="sum-td">' + rsvSum + '</td>');
		$("#famRsvCount").append('<td class="sum-td">' + famRsvSum + '</td>');
		$("#ispCount").append('<td class="sum-td">' + ispSum + '</td>');
		$("#famIspCount").append('<td class="sum-td">' + famIspSum + '</td>');


		//그래프를 위한 월별 통계
		var rsvCount = new Array();
		var famRsvCount = new Array();
		var ispCount = new Array();
		var famIspCount = new Array();

		//월별 통계
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<td>' + data[i].targetCount + '</td>';
			$("#targetCount").append(html);

			var html = '';
			html += '<td>' + data[i].famTargetCount + '</td>';
			$("#famTargetCount").append(html);

			var html = '';
			html += '<td>' + data[i].rsvCount + '</td>';
			$("#rsvCount").append(html);
			rsvCount.push(data[i].rsvCount);

			var html = '';
			html += '<td>' + data[i].famRsvCount + '</td>';
			$("#famRsvCount").append(html);
			famRsvCount.push(data[i].famRsvCount);

			var html = '';
			html += '<td>' + data[i].ispCount + '</td>';
			$("#ispCount").append(html);
			ispCount.push(data[i].ispCount);

			var html = '';
			html += '<td>' + data[i].famIspCount + '</td>';
			$("#famIspCount").append(html);
			famIspCount.push(data[i].famIspCount);
		}

		$('#companyChartView').html('<canvas id="companyChart" width="90%" height="15%"></canvas>');

		//기업 통계 그래프 그리기
		var ctx = document.getElementById("companyChart");
		var companyChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"],
				datasets: [{
					label: '직원예약자수',
					data: rsvCount,
					backgroundColor: '#3529b1'
				}, {
					label: '가족예약자수',
					data: famRsvCount,
					backgroundColor: '#5645ED'
				}, {
					label: '직원수검자수',
					data: ispCount,
					backgroundColor: '#FBC805'
				}, {
					label: '가족수검자수',
					data: famIspCount,
					backgroundColor: '#10B64A'
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	}

	function tableExcelDownload() {
		var searchItems = new Object();

		searchItems.coName = $("#stComName option:selected").val();
		searchItems.coBranch = $("#stComBranch option:selected").val();
		searchItems.year = $("#stYear option:selected").val();

		if (searchItems.coName == 'all') {
			alert("고객사를 선택해주세요.");
			return false;
		}
		if (searchItems.coBranch == 'all') {
			alert("사업장을 선택해주세요.");
			return false;
		}

		fileURL.post('downloadExcel/M1102', searchItems).then(res => {

			exportExcel(res.data);
		});
	}

	function exportExcel(data) {
		var excelHandler = {
			getExcelFileName: function () {
				return '[' + todayString() + ']' + ' 기업통계.xlsx';
			},
			getSheetName: function () {
				return 'sheet 1';
			},
			getExcelData: function () {
				return document.getElementById('statisticsCompanyInfos');
			},
			getWorksheet: function () {
				return XLSX.utils.table_to_sheet(this.getExcelData());
			}
		}

		// step 1. workbook 생성
		var wb = XLSX.utils.book_new();

		// step 2. 시트 만들기
		var newWorksheet = excelHandler.getWorksheet();

		// step 3. workbook에 새로만든 워크시트에 이름을 주고 붙인다.
		XLSX.utils.book_append_sheet(wb, newWorksheet, excelHandler.getSheetName());

		// step 4. 엑셀 파일 만들기
		var wbout = XLSX.write(wb, {bookType: 'xlsx', type: 'binary'});

		// step 5. 엑셀 파일 내보내기
		saveAs(new Blob([s2ab(wbout)], {type: "application/octet-stream"}), excelHandler.getExcelFileName());
	}
</script>
