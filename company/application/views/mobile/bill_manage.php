<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.line {
			border-top: 1px solid #DCDCDC;
			border-bottom: 1px solid #DCDCDC;
			padding: 1rem;
		}

		/*셀렉트 테이블*/
		.select-table {
			width: 100%;
		}

		.select-table th, .select-table td {
			padding: 5px 0;
			font-weight: 300;
		}

		.select-table th {
			width: 20%;
		}

		select, input[type="date"] {
			border: 1px solid #cccccc;
			outline: none;
			padding: 2px 10px;
			font-weight: 300;
			width: 100%;
		}

		option {
			font-weight: 300;
		}

		input[type="date"] {
			font-size: 1.3rem;
			padding: 5px 10px;
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
			<h2>청구관리</h2>
		</div>
	</div>

	<div class="row" style="display: block">
		<div style="width: 20rem;height: 3rem;display: flex;font-size: 1.4rem">
			<div style="margin-right: 1rem;line-height: 30px">
				사업연도
			</div>
			<select id="servedYear" onchange="searchInformation()">
				<option selected>선택</option>
				<option>2020</option>
				<option>2019</option>
				<option>2018</option>
			</select>
		</div>

		<table class="basic-table" id="billAllTable" style="margin-top: 1rem;display: none">
			<thead>
			<tr>
				<th>기업명</th>
				<th>청구년월</th>
				<th>청구조건</th>
				<th>기준일자</th>
				<th>계산서일자</th>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>

	<div class="row" id="billMonthView" style="display: none;margin-top: 3rem">
		<div>월별청구리스트</div>

		<table class="basic-table" id="billMonthTable" style="margin-top: 1rem">
			<thead>
			<tr>
				<th>병원</th>
				<th>인원</th>
				<th>청구금액</th>
				<th>정보이용료</th>
				<th>수신여부</th>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>

</body>
</html>

<script>
	var coIdObj = new Object();
	coIdObj.coId = sessionStorage.getItem("userCoID");

	//검색
	function searchInformation() {
		var searchItems = new Object();

		searchItems.coId = coIdObj.coId;
		searchItems.year = $("#servedYear option:selected").val();

		if (searchItems.year == '선택') {
			return false;
		}

		instance.post('C0501', searchItems).then(res => {
			$('#billAllTable > tbody').empty();
			$('#billMonthTable > tbody').empty();

			setBillAllTable(res.data);
		});
	}

	//전체 청구데이터 셋팅
	function setBillAllTable(data) {
		if (data.length > 0) {
			$('#billAllTable').show();
		} else {
			$('#billAllTable').hide();
			$('#billMonthView').hide();
			alert('해당기간 자료가 없습니다.')
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			var coNameBranch = data[i].coNameBranch.replace(/-/gi, '<br>');
			var calculateStartDate = data[i].calculateStartDate.replace(/-/gi, '.');
			var calculateEndDate = data[i].calculateEndDate.replace(/-/gi, '.');
			var calculateDate = data[i].calculateDate.replace(/-/gi, '.');
			html += '<tr onClick="clickBillMonthData(\'' + data[i].billingId + '\')">' +
				'<td>' + coNameBranch + '</td>' +
				'<td>' + data[i].billingMonth + '</td>' +
				'<td>' + data[i].standard + '</td>' +
				'<td>' + calculateStartDate + '<br> ~ ' + calculateEndDate + '</td>' +
				'<td>' + calculateDate + '</td>' +
				'</tr>';

			$("#billAllTable > tbody").append(html);
		}
	}

	//해당 기업 클릭 -> 월별청구리스트
	function clickBillMonthData(id) {
		var searchItems = new Object();

		searchItems.coId = coIdObj.coId;
		searchItems.billingId = id;

		instance.post('C0502', searchItems).then(res => {
			setBillMonthData(res.data, searchItems.billingId);
		});
	}

	//월별청구리스트 셋팅
	function setBillMonthData(data, billingId) {
		$('#billMonthTable > tbody').empty();

		if (data.length > 0) {
			$('#billMonthView').show();
		} else {
			$('#billMonthView').hide();
		}

		var countTotal = 0;
		var inspectionTotal = 0;
		var billingTotal = 0;
		var calculateTotal = 0;
		var rebateTotal = 0;

		for (i = 0; i < data.length; i++) {
			var no = i + 1;
			var html = '';
			countTotal += data[i].countOfReservation;
			inspectionTotal += data[i].priceOfTotalInspection;
			billingTotal += data[i].priceOfBilling;
			calculateTotal += data[i].priceOfCalculate;
			rebateTotal += data[i].priceOfRebate;
			html += '<tr>' +
				'<td>' + data[i].hosName + '</td>' +
				'<td>' + data[i].countOfReservation + '</td>' +
				'<td>' + data[i].priceOfBilling.toLocaleString() + '</td>' +
				'<td>' + data[i].priceOfRebate.toLocaleString() + '</td>';
			if (data[i].companyConfirm) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}
			html += '</td>' + '</tr>';
			$("#billMonthTable > tbody").append(html);
		}
		//setTotal(countTotal.toLocaleString(), inspectionTotal.toLocaleString(), billingTotal.toLocaleString(), calculateTotal.toLocaleString(), rebateTotal.toLocaleString());
	}

	function setTotal(countTotal, inspectionTotal, billingTotal, calculateTotal, rebateTotal) {
		let html = '' +
			'<tr class="sum">' +
			'<td colspan="2"></td>' +
			'<td>계</td>' +
			'<td>' + countTotal + '</td>' +
			'<td>' + inspectionTotal + '</td>' +
			'<td>' + billingTotal + '</td>' +
			'<td>' + calculateTotal + '</td>' +
			'<td>' + rebateTotal + '</td>' +
			'<td colspan="4"></td>' +
			'</tr>'
		$("#billMonthTable > tbody").append(html);
	}

</script>
