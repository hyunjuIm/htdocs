<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:패키지생성</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>

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

	<table class="table table-bordered" id="pckExcel" style="display: none">

	</table>

	<div class="row">
		<div class="col">
			<form style="margin: 0 auto; width: 95%; max-width: 1150px; padding: 20px">
				<ul class="img-circle">
					<div class="menu-title" style="font-size: 22px">
						<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
						패키지생성
					</div>
					<hr>
					<div class="form-row row">
						<label class="col-form-label">
							<li>고객사</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="pacComName" class="form-control" style="margin-right: 10px"
									onchange="setCompanySelectOption(this, 'pacComBranch')">
								<option value="all" selected>-전체-</option>
							</select>
							<select id="pacComBranch" class="form-control">
								<option value="all" selected>-선택-</option>
							</select>
						</div>

						<label class="col-form-label" style="margin-left: 20px">
							<li>패키지</li>
						</label>
						<div class="form-group col">
							<select id="pkgName" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>단가</li>
						</label>
						<div class="form-group col">
							<select id="price" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>병원</li>
						</label>
						<div class="form-group col">
							<select id="hosName" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>사용</li>
						</label>
						<div class="form-group col">
							<select id="coApprove" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>세부항목</li>
						</label>
						<div class="form-group col">
							<select id="ijSet" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>상태</li>
						</label>
						<div class="form-group col">
							<select id="status" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
						</label>
						<div class="form-group col">
						</div>
					</div>
					<hr>
					<div style="float: right">
						<div class="btn-purple-square" data-toggle="modal" data-target="#hospitalSendModal">
							병원전송
						</div>
						<div class="btn-light-purple-square" data-toggle="modal" data-target="#packageCreateModal">
							신규생성
						</div>
						<div class="btn-save-square" onclick="searchInformation(0)">
							검색
						</div>
					</div>
				</ul>
			</form>
		</div>
	</div>

	<div class="row " style="margin-left: 30px; margin-right: 30px; margin-top: 120px">
		<form class="table-responsive" style="margin: 0 auto">
			<div class="btn-default-small excel" onclick="tableExcelDownload()" style="float: right"></div>
			<table id="packageCreateInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 4%"><input type="checkbox" id="packageCheck" name="packageCheck"
												 onclick="clickAll(id, name)"></th>
					<th style="width: 5%">NO</th>
					<th style="width: 5%">사용</th>
					<th style="width: 10%">병원</th>
					<th style="width: 10%">고객사</th>
					<th style="width: 10%">사업장</th>
					<th style="width: 10%">패키지</th>
					<th>패키지단가</th>
					<th>기업승인여부</th>
					<th style="width: 15%">기간</th>
					<th>세부항목 상태</th>
					<th>세부항목 설정</th>
				</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</form>
	</div>

	<!--페이징-->
	<div class="row">
		<form style="margin: 0 auto; width: 85%; padding: 10px">
			<div class="page_wrap">
				<div class="page_nation" id="paging">
				</div>
			</div>
		</form>
	</div>

</div>
<!--콘텐츠 내용-->

<!--Modal-->
<?php
require('package_modal.php');
?>

</body>

</html>

<script type="text/javascript">
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/paging.js');
	?>

	var pageCount = 0;
	var pageNum = 0;

	//검색항목리스트
	instance.post('M007007_RES').then(res => {
		setPackageCreateSelectData(res.data);
	});

	//검색 selector
	function setPackageCreateSelectData(data) {
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
			$("#pacComName").append(html);
		}

		companySelect = data.coNameBranch;

		//패키지
		data.pkgName.sort();
		for (i = 0; i < data.pkgName.length; i++) {
			var html = '';
			html += '<option>' + data.pkgName[i] + '</option>'
			$("#pkgName").append(html);
		}
		//단가
		var price = Array.from((data.price), x => Number(x));
		price.sort(function (a, b) { // 오름차순
			return a - b;
		});
		for (i = 0; i < price.length; i++) {
			var html = '';
			html += '<option value=\'' + price[i] + '\'>' + price[i].toLocaleString() + '</option>'
			$("#price").append(html);
		}
		//병원
		for (i = 0; i < data.hosName.length; i++) {
			var html = '';
			html += '<option>' + data.hosName[i] + '</option>'
			$("#hosName").append(html);
		}
		//사용
		for (i = 0; i < data.coApprove.length; i++) {
			var html = '';
			if (data.coApprove[i] == "true") {
				html += '<option value="true">Y</option>'
			} else {
				html += '<option value="false">N</option>'
			}
			$("#coApprove").append(html);
		}
		//세부항목
		for (i = 0; i < data.ijSet.length; i++) {
			var html = '';
			if (data.ijSet[i] == "true") {
				html += '<option value="true">설정완료</option>'
			} else {
				html += '<option value="false">미완료</option>'
			}
			$("#ijSet").append(html);
		}
		//상태
		for (i = 0; i < data.status.length; i++) {
			var html = '';
			if (data.status[i] == "true") {
				html += '<option value="true">승인</option>'
			} else {
				html += '<option value="false">미승인</option>'
			}
			$("#status").append(html);
		}

		//로딩 되자마자 초기 셋팅
		searchInformation(0);
	}

	//페이징-숫자클릭
	function searchInformation(index) {//숫자클릭
		pageNum = index;
		drawTable();
	}

	//검색
	function drawTable() {
		pageNum = parseInt(pageNum);
		var searchItems = new Object();

		searchItems.coName = $("#pacComName option:selected").val();
		searchItems.coBranch = $("#pacComBranch option:selected").val();
		searchItems.pkgName = $("#pkgName option:selected").val();
		searchItems.price = $("#price option:selected").val();
		searchItems.hosName = $("#hosName option:selected").val();
		searchItems.coApprove = $("#coApprove option:selected").val();
		searchItems.ijSet = $("#ijSet option:selected").val();
		searchItems.status = $("#status option:selected").val();

		searchItems.pageNum = pageNum;

		if (searchItems.coName != 'all' && searchItems.coBranch == 'all') {
			alert("사업장을 선택해주세요.");
			return false;
		}

		instance.post('M007008_REQ_RES', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}

			setPackageCreateData(res.data.packageDTOList, pageNum);
		});
	}

	//패키지 생성 테이블
	function setPackageCreateData(data, index) {
		setPaging(index);

		$('#packageCreateInfos > tbody').empty();

		if (data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="20">해당하는 결과가 없습니다.</td>';
			html += '</tr>';
			$("#packageCreateInfos").append(html);
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td><input type="checkbox" name="packageCheck" onclick="clickOne(name)"></td>';

			var no = 0;
			if (index == 0) {
				no = (index + 1) + i;
			} else {
				no = index * 10 + (i + 1);
			}
			html += '<td>' + no + '</td>';
			html += '<td>' + (data[i].status ? 'Y' : 'N') + '</td>';
			html += '<td>' + data[i].hoName + '</td>';
			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';
			html += '<td>' + data[i].pkgName + '</td>';
			html += '<td>' + data[i].price.toLocaleString() + '</td>';
			html += '<td>' + (data[i].coApprove ? 'Y' : 'N') + '</td>';
			html += '<td style="width: 15%">' + data[i].reservationStartDate + "~" + data[i].reservationEndDate + '</td>';
			html += '<td>' + (data[i].ijSet ? 'Y' : 'N') + '</td>';
			html += '<td><a style="color: white" onclick="sendPackageID(\'' + data[i].pkgId + '\')">' +
					'<div class="btn-purple-square" style="padding: 2px 8px; font-size: 13px">설정</div></a></td>';
			html += '</tr>';

			$("#packageCreateInfos").append(html);
		}
	}

	//세부항목 설정에 pkgID 값 던지기
	function sendPackageID(index) {
		location.href = "package_injection_item?pkgID=" + index;
	}

	function tableExcelDownload() {
		var searchItems = new Object();

		searchItems.coName = $("#pacComName option:selected").val();
		searchItems.coBranch = $("#pacComBranch option:selected").val();
		searchItems.pkgName = $("#pkgName option:selected").val();
		searchItems.hosName = $("#hosName option:selected").val();

		if (searchItems.coName == 'all') {
			alert("고객사를 선택해주세요.");
			return false;
		}
		if (searchItems.coBranch == 'all') {
			alert("사업장을 선택해주세요.");
			return false;
		}

		fileURL.post('downloadExcel/M0708', searchItems).then(res => {
			makeTable(res.data);
			// exportExcel(res.data);
		});
	}

	function makeTable(data) {
		$('#pckExcel').empty();


		const serviceYear = data.serviceYear;
		const coNameBranch = data.coNameBranch;
		const packageDetailDTOList = data.packageDetailDTOList;
		const basicInspectionList_1 = data.basicInspectionList;

		const column = [];

		var html = '';

		var today = todayString();
		html += '<tr>'
		html += '<th colspan=\'' + (packageDetailDTOList.length + 3) + '\'>[' + today + ']&nbsp;' +
				coNameBranch + '&nbsp;듀얼헬스케어 제안서</th>';
		html += '</tr>';

		html += '<tr>' +
				'<th rowspan="3" colspan="3"></th>';

		//병원 정렬
		packageDetailDTOList.sort(function (a, b) {
			const titleA = a.hosName.toUpperCase(); // ignore upper and lowercase
			const titleB = b.hosName.toUpperCase(); // ignore upper and lowercase
			if (titleA < titleB) {
				return -1;
			}
			if (titleA > titleB) {
				return 1;
			}
			return 0;
		});

		//병원 출력
		var count = 1;
		for (let i = 0; i < packageDetailDTOList.length - 1; i++) {
			if (packageDetailDTOList[i].hosName == packageDetailDTOList[i + 1].hosName) {
				count += 1;
			}
			if (packageDetailDTOList[i].hosName != packageDetailDTOList[i + 1].hosName) {
				html += '<th colspan=\'' + count + '\'>' + packageDetailDTOList[i].hosName + '</th>';
				count = 1;
			}
			if (i == packageDetailDTOList.length - 2) {
				html += '<th colspan=\'' + count + '\'>' + packageDetailDTOList[i + 1].hosName + '</th>';
			}
		}
		html += '</tr>';


		//패키지명 출력
		html += '<tr>';
		for (let i = 0; i < packageDetailDTOList.length; i++) {
			html += '<th>' + packageDetailDTOList[i].pkgName + '</th>';
		}
		html += '</tr>';

		//패키지가격 출력
		html += '<tr>';
		for (let i = 0; i < packageDetailDTOList.length; i++) {
			html += '<th>' + packageDetailDTOList[i].pkgPrice.toLocaleString() + '</th>';
		}
		html += '</tr>';

		//TH및 패키지 간략정보 출력
		html += '<tr>';
		html += '<th>검진분류</th>';
		html += '<th>항목명</th>';
		html += '<th>검진설명</th>';
		for (let i = 0; i < packageDetailDTOList.length; i++) {
			html += '<th>' + packageDetailDTOList[i].pkgMemo.replaceAll('\n', '<br>') + '</th>';
		}
		html += '</tr>';

		for (let i = 0; i < basicInspectionList_1.length; i++) {
			const string = basicInspectionList_1[i].split("!@#");
			html += '<tr>';
			html += '<th>' + string[0] + '</th>';
			html += '<th>' + string[1] + '</th>';
			html += '<th>' + string[2] + '</th>';
			for (let j = 0; j < packageDetailDTOList.length; j++) {
				if (packageDetailDTOList[j].basicInspectionSheet[i]) {
					html += '<td>O</td>';
				} else {
					html += '<td></td>';
				}
			}
			html += '</tr>';
		}

		let maxChoiceCategoryNum = 0;

		for (let i = 0; i < packageDetailDTOList.length; i++) {
			let count = 0;
			for (let j = 0; j < packageDetailDTOList[i].packageItemDTOList.length; j++) {
				if (packageDetailDTOList[i].packageItemDTOList[j].ipClass.indexOf("선택") !== -1) {
					count++;
				}
			}
			maxChoiceCategoryNum = (maxChoiceCategoryNum < count) ? count : maxChoiceCategoryNum;
		}


		for (let i = 0; i < maxChoiceCategoryNum; i++) {
			const category = (i === 0) ? 'A' : (i === 1) ? 'B' : (i === 2) ? 'C' : (i === 3) ? 'D' : 'Error';
			html += '<tr>';
			html += '<th>' + '선택' + category + '</th>';
			html += '<th>' + '-' + '</th>';
			html += '<th>' + '-' + '</th>';

			for (j = 0; j < packageDetailDTOList.length; j++) {
				html += '<td>';
				var testHtml = ''
				for (k = 0; k < packageDetailDTOList[j].packageItemDTOList.length; k++) {
					if (packageDetailDTOList[j].packageItemDTOList[k].ipClass == ('선택' + category)) {
						testHtml += packageDetailDTOList[j].packageItemDTOList[k].inspection.join("<br/>");
					}
				}
				html += testHtml;
				html += '</td>';
			}
			html += '</tr>';
		}


		$('#pckExcel').append(html);

		fnExcelReport('pckExcel', ('[' + todayString() + ']' + ' 듀얼제안서'), data.serviceYear);
	}

	function fnExcelReport(id, title, year) {
		var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
		tab_text = tab_text
				+ '<head><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">';
		tab_text = tab_text
				+ '<xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>'
		tab_text = tab_text + '<x:Name>' + year + '</x:Name>';
		tab_text = tab_text
				+ '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
		tab_text = tab_text
				+ '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';
		tab_text = tab_text + "<table border='1px'>";
		var exportTable = $('#' + id).clone();
		exportTable.find('input').each(function (index, elem) {
			$(elem).remove();
		});
		tab_text = tab_text + exportTable.html();
		tab_text = tab_text + '</table></body></html>';
		var data_type = 'data:application/vnd.ms-excel';
		var ua = window.navigator.userAgent;
		var msie = ua.indexOf("MSIE ");
		var fileName = title + '.xls';
		//Explorer 환경에서 다운로드
		if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
			if (window.navigator.msSaveBlob) {
				var blob = new Blob([tab_text], {
					type: "application/csv;charset=utf-8;"
				});
				navigator.msSaveBlob(blob, fileName);
			}
		} else {
			var blob2 = new Blob([tab_text], {
				type: "application/csv;charset=utf-8;"
			});
			var filename = fileName;
			var elem = window.document.createElement('a');
			elem.href = window.URL.createObjectURL(blob2);
			elem.download = filename;
			document.body.appendChild(elem);
			elem.click();
			document.body.removeChild(elem);
		}
	}

	function tableToExcel(id) {
		var data_type = 'data:application/vnd.ms-excel;charset=utf-8';
		var table_html = encodeURIComponent(document.getElementById(id).outerHTML);

		var a = document.createElement('a');
		a.href = data_type + ',%EF%BB%BF' + table_html;
		a.download = id + '_excel' + '.xls';
		a.click();

		$('#pckExcel').hide();
	}

	// function exportExcel(data) {
	// 	var excelHandler = {
	// 		getExcelFileName: function () {
	// 			return '[' + todayString() + ']' + ' 듀얼제안서.xlsx';
	// 		},
	// 		getSheetName: function () {
	// 			return data.serviceYear;
	// 		},
	// 		getExcelData: function () {
	// 			return document.getElementById('pckExcel');
	// 		},
	// 		getWorksheet: function () {
	// 			return XLSX.utils.table_to_sheet(this.getExcelData());
	// 		}
	// 	}
	//
	// 	// step 1. workbook 생성
	// 	var wb = XLSX.utils.book_new();
	//
	// 	// step 2. 시트 만들기
	// 	var newWorksheet = excelHandler.getWorksheet();
	//
	// 	// step 3. workbook에 새로만든 워크시트에 이름을 주고 붙인다.
	// 	XLSX.utils.book_append_sheet(wb, newWorksheet, excelHandler.getSheetName());
	//
	// 	// step 4. 엑셀 파일 만들기
	// 	var wbout = XLSX.write(wb, {bookType: 'xlsx', type: 'binary'});
	//
	// 	// step 5. 엑셀 파일 내보내기
	// 	saveAs(new Blob([s2ab(wbout)], {type: "application/octet-stream"}), excelHandler.getExcelFileName());
	// }
</script>
