<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>
		.btn {
			font-size: 1.4rem;
		}

		.basic-table .sum td {
			background: #555555;
			color: white;
			cursor: default;
		}

		#billAllTable tbody tr,
		#billMonthTable tbody tr {
			cursor: pointer;
		}

		#billAllTable tbody tr:hover {
			background: whitesmoke;
		}
	</style>
</head>
<body>

<!--상단 메뉴-->
<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
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
					<option>2021</option>
					<option selected>2020</option>
					<option>2019</option>
					<option>2018</option>
				</select>
			</div>

			<table class="basic-table" id="billAllTable" style="margin-top: 1rem;display: none">
				<thead>
				<tr>
					<th>기업 ID</th>
					<th>고객사</th>
					<th>청구년월</th>
					<th>청구조건</th>
					<th width="22%">기준일자</th>
					<th>계산서일자</th>
					<th>청구승인</th>
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
					<th>NO</th>
					<th>병원 ID</th>
					<th>병원</th>
					<th>인원</th>
					<th>검진비용 총합</th>
<!--					<th style="line-height: 1.5rem">-->
<!--						청구금액<br>-->
<!--						<span style="font-size: 1.3rem">(급여+기업+포인트<br>선택검사회사분)</span>-->
<!--					</th>-->
					<th>계산서금액</th>
					<th>정보이용료</th>
					<th>병원확인</th>
					<th>기업확인</th>
				</tr>
				</thead>
				<tbody>
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

	searchInformation();

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
			alert('해당기간 자료가 없습니다.');
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr onClick="clickBillMonthData(\'' + data[i].billingId + '\')">' +
					'<td>' + data[i].coId + '</td>' +
					'<td>' + data[i].coNameBranch + '</td>' +
					'<td>' + data[i].billingMonth + '</td>' +
					'<td>' + data[i].standard + '</td>' +
					'<td>' + data[i].calculateStartDate + ' ~ ' + data[i].calculateEndDate + '</td>' +
					'<td>' + data[i].calculateDate + '</td>'+
					'<td id=\'' + data[i].billingId.replace("#", "") + '\'>';
			if (data[i].companyConfirm) {
				html += '<div class="btn btn-danger" onClick="companyConfirm(\'' + data[i].billingId + '\',false)" >취소</div>'
			} else {
				html += '<div class="btn btn-primary" onClick="companyConfirm(\'' + data[i].billingId + '\',true)" >승인</div>'
			}
			html += '</td></tr>';

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
			var html = '';
			countTotal += data[i].countOfReservation;
			inspectionTotal += data[i].priceOfTotalInspection;
			billingTotal += data[i].priceOfBilling;
			calculateTotal += data[i].priceOfCalculate;
			rebateTotal += data[i].priceOfRebate;

			html += '<tr data-toggle="modal" data-target="#billDetailModal" onClick="clickBillDetail(\'' + billingId + '\', \'' + data[i].hosId + '\')">' +
					'<td>' + (i + 1) + '</td>' +
					'<td>' + data[i].hosId + '</td>' +
					'<td>' + data[i].hosName + '</td>' +
					'<td>' + data[i].countOfReservation.toLocaleString() + '</td>' +
					'<td>' + data[i].priceOfTotalInspection.toLocaleString() + '</td>' +
					// '<td>' + data[i].priceOfBilling.toLocaleString() + '</td>' +
					'<td>' + data[i].priceOfCalculate.toLocaleString() + '</td>' +
					'<td>' + data[i].priceOfRebate.toLocaleString() + '</td>';
			if (data[i].hospitalConfirm) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}
			if (data[i].companyConfirm) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}
			html += '</tr>';
			$("#billMonthTable > tbody").append(html);
		}

		setTotal(countTotal.toLocaleString(), inspectionTotal.toLocaleString(), billingTotal.toLocaleString(),
				calculateTotal.toLocaleString(), rebateTotal.toLocaleString());
	}

	function setTotal(countTotal, inspectionTotal, billingTotal, calculateTotal, rebateTotal) {
		let html = '' +
				'<tr class="sum">' +
				'<td colspan="2"></td>' +
				'<td>계</td>' +
				'<td>' + countTotal + '</td>' +
				'<td>' + inspectionTotal + '</td>' +
				// '<td>' + billingTotal + '</td>' +
				'<td>' + calculateTotal + '</td>' +
				'<td>' + rebateTotal + '</td>' +
				'<td colspan="4"></td>' +
				'</tr>'
		$("#billMonthTable > tbody").append(html);
	}

	function companyConfirm(billingId, value) {
		var searchItems = new Object();

		searchItems.billingId = billingId;
		searchItems.confirm = value;

		if (searchItems.confirm == 'true' || searchItems.confirm == true) {
			if (confirm("승인하시겠습니까?") == true) {
				instance.post('C0504', searchItems).then(res => {

					if (res.data.message == "success") {
						alert("승인되었습니다.");
						$('#' + billingId.replace("#", "")).html('<div class="btn btn-danger" onClick="companyConfirm(\'' + billingId + '\', false)" >취소</div>');
					}
				}).catch(function (error) {
					alert("잘못된 접근입니다.")
				});
			} else {
				return false;
			}
		} else {
			if (confirm("취소하시겠습니까?") == true) {
				instance.post('C0504', searchItems).then(res => {

					if (res.data.message == "success") {
						alert("취소되었습니다.");
						$('#' + billingId.replace("#", "")).html('<div class="btn btn-primary" onClick="companyConfirm(\'' + billingId + '\',true)" >승인</div>');
					}
				}).catch(function (error) {
					alert("잘못된 접근입니다.")
				});
			} else {
				return false;
			}
		}

	}
</script>

