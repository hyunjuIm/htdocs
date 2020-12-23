<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.btn {
			font-size: 1.4rem;
		}

		.basic-table .sum td {
			background: #555555;
			color: white;
		}

		#billAllTable th {
			/*width: calc(100% / 6);*/
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
				<h2 style="font-weight: 300;font-size: 2.3rem">청구관리</h2>
			</div>
		</div>

		<div class="row" style="display: block">
			<div class="select-list" style="width: 20rem;height: 3rem">
				<div style="margin-right: 1rem;line-height: 3rem">
					사업연도
				</div>
				<select id="servedYear" onchange="searchInformation()">
					<option selected>선택</option>
					<option>2020</option>
					<option>2019</option>
					<option>2018</option>
				</select>
			</div>

			<table class="basic-table" id="billAllTable" style="margin-top: 1rem">
				<thead>
				<tr>
					<th>기업 ID</th>
					<th>기업명</th>
					<th>청구년월</th>
					<th>청구조건</th>
					<th width="22%">기준일자</th>
					<th>계산서일자</th>
				</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>

		<div class="row" style="display: block;margin-top: 3rem">
			<div>월별청구리스트</div>

			<table class="basic-table" id="billMonthTable" style="margin-top: 1rem">
				<thead>
				<tr>
					<th width="7%">순번</th>
					<th width="10%">병원 ID</th>
					<th width="12%">병원</th>
					<th width="5%">인원</th>
					<th width="12%">검진비용 총합</th>
					<th width="11%" style="line-height: 1.5rem">
						청구금액<br>
						<span style="font-size: 1.3rem">(급여+기업+포인트<br>선택검사회사분)</span>
					</th>
					<th width="12%">계산서금액</th>
					<th width="12%">정보이용료</th>
					<th width="5%">수신여부</th>
					<th width="14%">청구리스트</th>
				</tr>
				</thead>
				<tbody>
				<tr class="sum">
					<td colspan="2"></td>
					<td>계</td>
					<td>187</td>
					<td>56,230,000</td>
					<td>51,464,400</td>
					<td>42,884,400</td>
					<td>42,884,400</td>
					<td colspan="2"></td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>

<?php
require('bill_modal.php');
?>

<script>
	//상단바 선택된 메뉴
	$('#topMenu4').addClass('active');
	$('#topMenu4').before('<div class="menu-select-line"></div>');

	var coIdObj = new Object();
	coIdObj.coId = sessionStorage.getItem("userCoID");

	//검색
	function searchInformation() {
		var searchItems = new Object();

		searchItems.coId = coIdObj.coId;
		searchItems.year = $("#servedYear option:selected").val();

		if(searchItems.year == '선택') {
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
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr onClick="clickBillMonthData(\'' + data[i].billingId + '\')">' +
				'<td>' + data[i].coId + '</td>' +
				'<td>' + data[i].coNameBranch + '</td>' +
				'<td>' + data[i].billingMonth + '</td>' +
				'<td>' + data[i].standard + '</td>' +
				'<td>' + data[i].calculateStartDate + ' ~ ' + data[i].calculateEndDate + '</td>' +
				'<td>' + data[i].calculateDate + '</td>' +
				'</tr>';

			$("#billAllTable > tbody").append(html);
		}
	}

	function clickBillMonthData(id) {
		var searchItems = new Object();

		searchItems.coId = coIdObj.coId;
		searchItems.billingId = id;

		instance.post('C0502', searchItems).then(res => {
			console.log(res.data);
			setBillMonthData(res.data);
		});
	}

	function setBillMonthData(data) {
		for (i = 0; i < data.length; i++) {
			var no = i+1;
			var html = '';
			html += '<tr>' +
				'<td>' + no + '</td>' +
				'<td>' + data[i].hosId + '</td>' +
				'<td>' + data[i].hosName + '</td>' +
				'<td>' + data[i].countOfReservation + '</td>' +
				'<td>' + data[i].priceOfTotalInspection + '</td>' +
				'<td>' + data[i].priceOfBilling + '</td>' +
				'<td>' + data[i].priceOfCalculate + '</td>' +
				'<td>' + data[i].hospitalConfirm + '</td>' +
				'<td>' + data[i].companyConfirm + '</td>' +
				'<td>' +
					'<div class="btn btn-secondary" data-toggle="modal" data-target="#billDetailModal"' +
					'onClick="clickBillDetail(\'' + data[i].billingId + '\')" >보기</div>' +
				'</td>' +
				'</tr>';

			$("#billMonthTable > tbody").append(html);
		}
	}
</script>

