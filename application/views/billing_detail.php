<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:청구상세</title>

	<?php
	require('head.php');
	?>

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
<div class="container" style="padding-top: 50px; max-width: none">
	<div class="row" style="margin: 30px; padding: 20px">
		<form class="table-box" style="margin: 0 auto; padding: 30px; width: 85%; max-width: 1500px">
			<div class="btn-purple-square" style="padding: 6px 18px; margin-right: 5px" onclick="refreshBilling()">
				새로고침
			</div>
			<div class="btn-default-small excel" style="float: right"></div>
			<table id="billDetailInfos" class="table table-hover" style="margin-top: 10px">
				<thead>
				<tr>
					<th style="width: 5%">NO</th>
					<th style="width: 13%">고객사명</th>
					<th style="width: 13%">사업장명</th>
					<th style="width: 13%">병원명</th>
					<th style="width: 13%">서비스명</th>
					<th>기업부담금</th>
					<th>공단부담금</th>
					<th>개인부담금</th>
					<th style="width: 7%">계산서</th>
					<th style="width: 7%">청구서</th>
				</tr>
				</thead>
				<tbody align="center">
				</tbody>
			</table>
		</form>
	</div>
	<hr>
</div>
<!--콘텐츠 내용-->

<!--Modal-->
<?php
require('billing_modal.php');
?>

</body>
</html>


<script>

	//bID 값 받기
	var bId = new Object();
	$(document).ready(function () {
		var val = location.href.substr(
			location.href.lastIndexOf('=') + 1
		);
		bId.bId = val;

		instance.post('M009005_REQ_RES', bId).then(res => {
			setBillDetailData(res.data);
		});

	})

	//청구관리 테이블
	function setBillDetailData(data) {
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr data-toggle="modal" data-target="#billingDetailModal" ' +
				'onClick="clickBillingDetail(\'' + bId.bId + '\', \'' + data[i].hosId + '\')">';
			html += '<td>' + bId.bId + '</td>';
			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';
			html += '<td>' + data[i].hosName + '</td>';
			html += '<td>' + data[i].serviceName + '</td>';
			html += '<td>' + data[i].coCharge + '</td>';
			html += '<td>' + data[i].pcCharge + '</td>';
			html += '<td>' + data[i].psnCharge + '</td>';

			//계산서
			if (data[i].showBill) {
				html += '<td><input class="form-check-input" type="checkbox" id="\'' + data[i].hosId + "Bill" +
					'\'" onclick="changeBillCheck(this, \'' + bId.bId + '\', \'' + data[i].hosId + '\')" checked></td>';
			} else {
				html += '<td><input class="form-check-input" type="checkbox" id="\'' + data[i].hosId + "Bill" +
					'\'" onclick="changeBillCheck(this, \'' + bId.bId + '\', \'' + data[i].hosId + '\')"></td>';
			}

			//청구서
			if (data[i].showCharge) {
				html += '<td><input class="form-check-input" type="checkbox" id="\'' + data[i].hosId + "Charge" +
					'\'" onclick="changeChargeCheck(this, \'' + bId.bId + '\', \'' + data[i].hosId + '\')" checked></td>';
			} else {
				html += '<td><input class="form-check-input" type="checkbox" id="\'' + data[i].hosId + "Charge" +
					'\'" onclick="changeChargeCheck(this, \'' + bId.bId + '\', \'' + data[i].hosId + '\')"></td>';
			}


			html += '</tr>';

			$("#billDetailInfos").append(html);
		}
	}

	//계산서 체크박스 값 저장
	function changeBillCheck(check, saveBId, saveHosId) {
		var value = false;
		if ($(check).is(":checked")) {
			value = true;
		} else {
			value = false;
		}

		var saveBillItems = new Object();
		saveBillItems.bId = saveBId;
		saveBillItems.hosId = saveHosId;
		saveBillItems.value = value;

		instance.post('M009006_REQ', saveBillItems).then(res => {
			console.log(res.data.message);
		});
	}


	//청구서 체크박스 값 저장
	function changeChargeCheck(check, saveBId, saveHosId) {
		var value = false;
		if ($(check).is(":checked")) {
			value = true;
		} else {
			value = false;
		}

		var saveChargeItems = new Object();
		saveChargeItems.bId = saveBId;
		saveChargeItems.hosId = saveHosId;
		saveChargeItems.value = value;

		instance.post('M009007_REQ', saveChargeItems).then(res => {
			console.log(res.data.message);
		});
	}

	//새로고침
	function refreshBilling() {
		instance.post('M009009_REQ', bId).then(res => {
			console.log(res.data.message);
			location.reload();
		});
	}

	//취소 - 되돌아가기
	function cancelBillingDetail() {
		history.back();
	}
</script>
