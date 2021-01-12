<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:기업관리</title>

	<?php
	require('head.php');
	?>

	<style>
		#companyInfo tbody tr {
			cursor: pointer;
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
<div class="container" style="padding-top: 50px; max-width: none">
	<div class="row">
		<div class="col">
			<form style="margin: 0 auto; width: 95%; max-width: 1150px; padding: 20px">
				<ul class="img-circle">
					<div class="menu-title" style="font-size: 22px">
						<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
						기업관리
					</div>
					<hr>
					<div class="form-row row">
						<label class="col-form-label">
							<li>사업연도</li>
						</label>
						<div class="form-group col">
							<select id="year" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>서비스</li>
						</label>
						<div class="form-group col">
							<select id="service" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>진행상태</li>
						</label>
						<div class="form-group col">
							<select id="status" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>계약유무</li>
						</label>
						<div class="form-group col">
							<select id="contract" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
					</div>
					<hr>
					<div style="float: right">
						<div class="btn-purple-square" data-toggle="modal" data-target="#companyCreateModal">
							기업신규등록
						</div>
						<div class="btn-save-square" onclick="searchInformation(0)">
							검색
						</div>
					</div>
				</ul>
			</form>
		</div>
	</div>

	<div class="row" style="margin-top:100px">
		<div class="col">
			<div class="d-flex justify-content-center px-5">
				<h6>
					<div style="margin-right: 15px">통합검색</div>
					<div class="search">
						<input type="text" id="searchWord" class="search-input" placeholder="회사명으로 검색하세요"
							   onkeyup="enterKey()">
						<div class="search-icon" onclick="searchInformation(0)"></div>
					</div>
				</h6>
			</div>
		</div>
	</div>

	<div class="row " style="margin-left: 30px; margin-right: 30px; margin-top: 20px">
		<form class="table-responsive" style="margin: 0 auto">
			<div
					class="btn-default-small excel" style="float: right" onclick="tableExcelDownload()"></div>
			<table id="companyInfo" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 4%"><input type="checkbox" id="companyCheck" name="companyCheck"
												 onclick="clickAll(id, name)"></th>
					<th style="width: 4%">NO</th>
					<th style="width: 12%">고객사</th>
					<th>사업장</th>
					<th style="width: 12%">서비스</th>
					<th>계약유무</th>
					<th>직원 수</th>
					<th>진행상태</th>
					<th style="width: 15%">예약기간</th>
					<th style="width: 15%">검진기간</th>
					<th>사업자등록</th>
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
require('company_modal.php');
?>

</body>
</html>

<!--체크박스 검사-->
<?php
require('check_data.php');
?>

<script type="text/javascript">
	var pageCount = 0;
	var pageNum = 0;

	//검색항목리스트
	instance.post('M004001_RES').then(res => {
		setCompanySelectData(res.data);
	});

	//검색 selector
	function setCompanySelectData(data) {
		//사업연도
		for (i = 0; i < data.year.length; i++) {
			var html = '';
			html += '<option>' + data.year[i] + '</option>'
			$("#year").append(html);
		}
		//서비스
		for (i = 0; i < data.service.length; i++) {
			var html = '';
			html += '<option>' + data.service[i] + '</option>'
			$("#service").append(html);
		}
		//진행상태
		for (i = 0; i < data.status.length; i++) {
			var html = '';
			if (data.status[i] == "true") {
				html += '<option value="true">Y</option>'
			} else {
				html += '<option value="false">N</option>'
			}
			$("#status").append(html);
		}
		//계약유무
		for (i = 0; i < data.contract.length; i++) {
			var html = '';
			if (data.contract[i] == "true") {
				html += '<option value="true">Y</option>'
			} else {
				html += '<option value="false">N</option>'
			}
			$("#contract").append(html);
		}

		//로딩 되자마자 초기 셋팅
		searchInformation(0);
	}

	//페이징-숫자클릭
	function searchInformation(index) {//숫자클릭
		if ($("#searchWord").val().length == 1) {
			alert('두 글자 이상 검색어로 입력주세요.');
			return false;
		}

		pageNum = index;
		drawTable();
	}

	function drawTable() {
		pageNum = parseInt(pageNum);
		var searchItems = new Object();

		searchItems.year = $("#year option:selected").val();
		searchItems.service = $("#service option:selected").val();
		searchItems.status = $("#status option:selected").val();
		searchItems.contract = $("#contract option:selected").val();

		searchItems.pageNum = pageNum;
		searchItems.searchWord = $("#searchWord").val();

		console.log(searchItems);

		instance.post('M004002_REQ_RES', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}

			console.log(res.data);
			setCompanyData(res.data.companyDTOList, pageNum);
		});
	}

	<?php
	require('paging.js');
	?>

	//기업관리 테이블
	function setCompanyData(data, index) {
		setPaging(index);

		$('#companyInfo > tbody').empty();

		if (data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="11">해당하는 검색 결과가 없습니다.</td>';
			html += '</tr>';
			$("#companyInfo").append(html);
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr data-toggle="modal" data-target="#companyDetailModal" onClick="clickCompanyDetail(\'' + data[i].id + '\')">"';
			html += '<td><input type="checkbox" name="companyCheck" onclick="clickOne(name)"></td>';

			var no = 0;
			if (index == 0) {
				no = (index + 1) + i;
			} else {
				no = index * 10 + (i + 1);
			}

			html += '<td>' + no + '</td>';
			html += '<td>' + data[i].name + '</td>';
			html += '<td>' + data[i].branch + '</td>';
			html += '<td>' + regExp(data[i].services) + '</td>';
			html += '<td>' + (data[i].contract ? 'Y' : 'N') + '</td>';
			html += '<td>' + data[i].customers.toLocaleString() + '</td>';
			html += '<td>' + (data[i].status ? 'Y' : 'N') + '</td>';
			html += '<td>' + data[i].reservationStartDate + " ~ " + data[i].reservationEndDate + '</td>';
			html += '<td>' + data[i].inspectionStartDate + " ~ " + data[i].inspectionEndDate + '</td>';
			html += '<td>' + (data[i].license ? 'Y' : 'N') + '</td>';
			html += '</tr>';

			$("#companyInfo").append(html);
		}
	}

	function tableExcelDownload() {
		var searchItems = new Object();

		searchItems.year = $("#year option:selected").val();
		searchItems.service = $("#service option:selected").val();
		searchItems.status = $("#status option:selected").val();
		searchItems.contract = $("#contract option:selected").val();

		searchItems.pageNum = pageNum;
		searchItems.searchWord = $("#searchWord").val();

		fileURL.post('downloadExcel/M0402', searchItems).then(res => {
			console.log(res.data);
			exportExcel(res.data);
		});
	}

	function exportExcel(data) {
		var excelHandler = {
			getExcelFileName: function () {
				return '[' + todayString() + ']' + ' 기업목록.xlsx';
			},
			getSheetName: function () {
				return 'sheet 1';
			},
			getExcelData: function () {
				const table = [];
				const tt = [];
				tt.push("사업연도");
				tt.push("기업명");
				tt.push("사업장명");
				tt.push("시스템오픈");
				tt.push("서비스");
				tt.push("계약유무");
				tt.push("예약기간");
				tt.push("검진기간");
				tt.push("서비스이용료");
				tt.push("패키지");
				tt.push("지원금");
				tt.push("공단대상");
				tt.push("가족지원");

				var max = 0;
				for (var i = 0; i < data.length; i++) {
					max = (data[i].companyManagerDTOList.length > max) ? data[i].companyManagerDTOList.length : max;
				}
				for (var i = 0; i < max; i++) {
					tt.push("담당자" + (i + 1) + " 이름");
					tt.push("담당자" + (i + 1) + " 연락처");
					tt.push("담당자" + (i + 1) + " 이메일");
				}

				table.push(tt);
				for (var i = 0; i < data.length; i++) {
					const td = [];
					td.push(data[i].serviceYear);
					td.push(data[i].companyName);
					td.push(data[i].companyBranch);
					td.push(data[i].systemOpen ? 'Y' : 'N');
					td.push(regExp(data[i].serviceName));
					td.push(data[i].contract ? 'Y' : 'N');
					td.push(data[i].reservationStartDate + '~' + data[i].reservationEndDate);
					td.push(data[i].inspectionStartDate + '~' + data[i].inspectionEndDate);
					td.push(data[i].rebatePrice.toLocaleString());

					var packagePriceList = Array();
					for (var j = 0; j < data[i].packagePriceList.length; j++) {
						packagePriceList[j] = parseInt(data[i].packagePriceList[j]).toLocaleString();
					}
					td.push(packagePriceList.join("/"));

					var supportPriceList = Array();
					for (var j = 0; j < data[i].supportPriceList.length; j++) {
						supportPriceList[j] = parseInt(data[i].supportPriceList[j]).toLocaleString();
					}
					td.push(supportPriceList.join("/"));

					td.push(data[i].pcDiscount ? 'Y' : 'N');
					td.push(data[i].familySupport ? 'Y' : 'N');

					for (var j = 0; j < data[i].companyManagerDTOList.length; j++) {
						td.push(data[i].companyManagerDTOList[j].name);
						td.push(data[i].companyManagerDTOList[j].phone);
						td.push(data[i].companyManagerDTOList[j].email);
					}

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
