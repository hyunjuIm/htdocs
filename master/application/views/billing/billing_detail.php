<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:청구상세</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

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
	<div class="row" style="margin: 30px; padding: 20px">
		<form class="table-box" style="margin: 0 auto; padding: 30px; width: 85%; max-width: 1500px">
			<div class="btn-default-small excel" style="float: right" onclick="tableExcelDownload()"></div>
			<table id="billDetailInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 4%"><input type="checkbox" id="billingDetailCheck" name="billingDetailCheck" onclick="clickAll(id, name)"></th>
					<th style="width: 4%">NO</th>
					<th style="width: 13%">고객사명</th>
					<th style="width: 13%">사업장명</th>
					<th style="width: 13%;color: #3529b1; font-weight: bold">병원명</th>
					<th style="width: 13%">서비스</th>
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
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

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
			html += '<tr>';
			html += '<td><input type="checkbox" name="billingDetailCheck" onclick="clickOne(name)"></td>';

			var no = i+1;
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';
			html += '<td data-toggle="modal" data-target="#billingDetailModal" ' +
					'style="cursor: pointer; color: #3529b1; font-weight: bold" '+
					'onClick="clickBillingDetail(\'' + bId.bId + '\', \'' + data[i].hosId + '\')">' + data[i].hosName + '</td>';
			html += '<td>' + data[i].serviceName + '</td>';
			html += '<td>' + data[i].coCharge.toLocaleString() + '</td>';
			html += '<td>' + data[i].pcCharge.toLocaleString() + '</td>';
			html += '<td>' + data[i].psnCharge.toLocaleString() + '</td>';

			//계산서
			if (data[i].showBill) {
				html += '<td><input type="checkbox" onclick="changeCheck(0, this, \'' + bId.bId + '\', \'' + data[i].hosId + '\')" checked></td>';
			} else {
				html += '<td><input type="checkbox" onclick="changeCheck(0, this, \'' + bId.bId + '\', \'' + data[i].hosId + '\')"></td>';
			}

			//청구서
			if (data[i].showCharge) {
				html += '<td><input type="checkbox" onclick="changeCheck(1, this, \'' + bId.bId + '\', \'' + data[i].hosId + '\')" checked></td>';
			} else {
				html += '<td><input type="checkbox" onclick="changeCheck(1, this, \'' + bId.bId + '\', \'' + data[i].hosId + '\')"></td>';
			}

			html += '</tr>';

			$("#billDetailInfos").append(html);
		}
	}

	//계산서 체크박스 값 저장
	function changeCheck(type, check, saveBId, saveHosId) {
		var saveItems = new Object();
		saveItems.bId = saveBId;
		saveItems.hosId = saveHosId;
		saveItems.value = $(check).is(':checked');

		console.log(saveItems);

		if(type == 0) {
			instance.post('M009006_REQ', saveItems).then(res => {
				if (res.data.message == "success") {
					alert("저장되었습니다.");
				}
			});
		} else if(type == 1) {
			instance.post('M009007_REQ', saveItems).then(res => {
				if (res.data.message == "success") {
					alert("저장되었습니다.");
				}
			});
		}
	}

	function tableExcelDownload() {
		fileURL.post('downloadExcel/M0905', bId).then(res => {
			console.log(res.data);
			exportExcel(res.data);
		});
	}

	function exportExcel(data) {
		var excelHandler = {
			getExcelFileName: function () {
				return '[' + todayString() + ']' + ' 청구상세.xlsx';
			},
			getSheetName: function () {
				return 'sheet 1';
			},
			getExcelData: function () {
				const table = [];
				const tt = [];
				tt.push("사업연도");
				tt.push("고객사명");
				tt.push("사업장명");
				tt.push("서비스");
				tt.push("기업부담금");
				tt.push("공단부담금");
				tt.push("개인부담금");
				tt.push("계산서");
				tt.push("청구서");

				table.push(tt);

				for (var i = 0; i < data.length; i++) {
					const td = [];
					td.push(data[i].serviceYear);
					td.push(data[i].coName);
					td.push(data[i].coBranch);
					td.push(data[i].serviceName);
					td.push(data[i].coCharge.toLocaleString());
					td.push(data[i].pcCharge.toLocaleString());
					td.push(data[i].psnCharge.toLocaleString());
					td.push(data[i].showBill ? 'Y' : 'N');
					td.push(data[i].showCharge ? 'Y' : 'N');

					table.push(td);
				}

				return table;
			},
			getWorksheet: function () {
				return XLSX.utils.aoa_to_sheet(this.getExcelData());
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
