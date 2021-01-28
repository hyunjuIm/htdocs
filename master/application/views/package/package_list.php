<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:패키지관리</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>
		table input[type=text] {
			width: 100%;
			background: none;
			outline: none;
			border: none;
			text-align: center;
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
			<form style="margin: 0 auto; width: 95%; max-width: 1150px; padding: 20px">
				<ul class="img-circle">
					<div class="menu-title" style="font-size: 22px">
						<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
						패키지관리
					</div>
					<hr>
					<div class="form-row row">
						<label class="col-form-label">
							<li>수검연도</li>
						</label>
						<div class="form-group col">
							<select id="year" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>단가</li>
						</label>
						<div class="form-group col">
							<select id="price" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>고객사</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="coName" class="form-control" style="margin-right: 10px"
									onchange="setCompanySelectOption(this, 'coBranch')">
								<option value="all" selected>-전체-</option>
							</select>
							<select id="coBranch" class="form-control">
								<option value="all" selected>-선택-</option>
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
							<li>병원</li>
						</label>
						<div class="form-group col">
							<select id="hoName" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>진행상태</li>
						</label>
						<div class="form-group col">
							<select id="status" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
					</div>
					<hr>
					<div class="btn-save-square" style="float: right;" onclick="searchInformation(0)">
						검색
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
						<input type="text" class="search-input" id="searchWord" placeholder="패키지명으로 검색하세요" onkeyup="enterKey()">
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
			<table id="packageInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 3%"><input type="checkbox" id="packageCheck" name="packageCheck" onclick="clickAll(id, name)"></th>
					<th style="width: 3%">NO</th>
					<th style="width: 10%">고객사</th>
					<th style="width: 5%; color: #3529b1;">사업장</th>
					<th>서비스</th>
					<th style="width: 4%">지역</th>
					<th style="width: 10%; color: #3529b1;">병원</th>
					<th>고객사계약</th>
					<th style="width: 7%">단가</th>
					<th style="width: 5%">직원수</th>
					<th style="width: 13%">예약기간</th>
					<th style="width: 13%">검진기간</th>
					<th>사업현황</th>
					<th>병원계약</th>
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
$parentDir = dirname(__DIR__ . '..');
require($parentDir . '/integrated/company_modal.php');
?>
<?php
$parentDir = dirname(__DIR__ . '..');
require($parentDir . '/integrated/hospital_modal.php');
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
	instance.post('M006001_RES').then(res => {
		setPackageSelectData(res.data);
	});

	var companySelect;
	//검색 selector
	function setPackageSelectData(data) {
		//수검연도
		for (i = 0; i < data.year.length; i++) {
			var html = '';
			html += '<option>' + data.year[i] + '</option>'
			$("#year").append(html);
		}
		//단가
		for (i = 0; i < data.price.length; i++) {
			var html = '';
			var price = parseInt(data.price[i]).toLocaleString();
			html += '<option value=\'' + data.price[i] + '\'>' + price + '</option>'
			$("#price").append(html);
		}
		//회사
		var name = [];
		var nameSize = 0;
		for (i = 0; i < data.coName.length; i++) {
			var check = 0;

			//회사명 - 지점있을때
			var jbSplit = data.coName[i].split('-');
			var companyName = jbSplit[0];

			for(var j=0; j<nameSize; j++) {
				if(name[j] == companyName) {
					check += 1;
				}
			}
			if(check < 1) {
				name[nameSize] = companyName;
				nameSize += 1;
			}
		}
		for(i=0; i<nameSize; i++) {
			var html = '';
			html += '<option value=\'' + name[i] + '\'>' + name[i] + '</option>'
			$("#coName").append(html);
		}
		companySelect = data.coName;
		//서비스
		for (i = 0; i < data.service.length; i++) {
			var html = '';
			html += '<option>' + data.service[i] + '</option>'
			$("#service").append(html);
		}
		//병원
		for (i = 0; i < data.hoName.length; i++) {
			var html = '';
			html += '<option>' + data.hoName[i] + '</option>'
			$("#hoName").append(html);
		}
		//진행상태
		for (i = 0; i < data.status.length; i++) {
			var html = '';
			if(data.status[i] == "true") {
				html += '<option value="true">진행중</option>'
			} else {
				html += '<option value="false">종료</option>'
			}
			$("#status").append(html);
		}

		//로딩 되자마자 초기 셋팅
		searchInformation(0);
	}

	//페이징-숫자클릭
	function searchInformation(index) {//숫자클릭
		if($("#searchWord").val().length == 1) {
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
		searchItems.price = $("#price option:selected").val();
		searchItems.coName = $("#coName option:selected").val();
		searchItems.coBranch = $("#coBranch option:selected").val();
		searchItems.service = $("#service option:selected").val();
		searchItems.hoName = $("#hoName option:selected").val();
		searchItems.status = $("#status option:selected").val();

		searchItems.searchWord =  $("#searchWord").val();
		searchItems.pageNum = pageNum;

		if (searchItems.coName != 'all' && searchItems.coBranch == 'all') {
			alert("사업장을 선택해주세요.");
			return false;
		}

		instance.post('M006002_REQ_RES', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}

			console.log(searchItems);
			setPackageData(res.data.packageDTOList, pageNum);
		});
	}

	//패키지 테이블
	function setPackageData(data, index) {
		setPaging(index);

		$('#packageInfos > tbody').empty();

		if(data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="20">해당하는 결과가 없습니다.</td>';
			html += '</tr>';
			$("#packageInfos").append(html);
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
				no = index * 10 + (i+1);
			}
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].coName + '</td>';
			html += '<td style="font-weight: bold; color: #3529b1;cursor: pointer"' +
					'data-toggle="modal" data-target="#companyDetailModal" ' +
					'onClick="clickCompanyDetail(\'' + data[i].coId + '\')">' + data[i].coBranch + '</td>';
			html += '<td>' + data[i].service + '</td>';
			html += '<td>' + data[i].place + '</td>';
			html += '<td style="font-weight: bold; color: #3529b1;cursor: pointer"' +
					'data-toggle="modal" data-target="#hospitalDetailModal" ' +
					'onClick="clickHospitalDetail(\'' + data[i].hoId + '\')">' + data[i].hoName + '</td>';
			html += '<td>' + (data[i].coContract ? 'Y' : 'N') + '</td>';
			html += '<td>' + data[i].price.toLocaleString() + '</td>';
			html += '<td>' + data[i].customers.toLocaleString() + '</td>';
			html += '<td>' + data[i].reStartDate + " ~ " + data[i].reEndDate + '</td>';
			html += '<td>' + data[i].ipStartDate + " ~ " + data[i].ipEndDate + '</td>';
			html += '<td>' + (data[i].status ? 'Y' : 'N') + '</td>';
			html += '<td>' + (data[i].hoContract ? 'Y' : 'N') + '</td>';

			html += '</tr>';

			$("#packageInfos").append(html);
		}
	}

	function tableExcelDownload() {
		var searchItems = new Object();

		searchItems.year = $("#year option:selected").val();
		searchItems.price = $("#price option:selected").val();
		searchItems.coName = $("#coName option:selected").val();
		searchItems.coBranch = $("#coBranch option:selected").val();
		searchItems.service = $("#service option:selected").val();
		searchItems.hoName = $("#hoName option:selected").val();
		searchItems.status = $("#status option:selected").val();

		searchItems.searchWord =  $("#searchWord").val();
		searchItems.pageNum = pageNum;

		if (searchItems.coName != 'all' && searchItems.coBranch == 'all') {
			alert("사업장을 선택해주세요.");
			return false;
		}

		fileURL.post('downloadExcel/M0602', searchItems).then(res => {
			console.log(res.data);
			exportExcel(res.data);
		});
	}

	function exportExcel(data) {
		var excelHandler = {
			getExcelFileName: function () {
				return '[' + todayString() + ']' + ' 패키지목록.xlsx';
			},
			getSheetName: function () {
				return 'sheet 1';
			},
			getExcelData: function () {
				const table = [];
				const tt = [];
				tt.push("사업연도");
				tt.push("고객사");
				tt.push("사업장");
				tt.push("서비스");
				tt.push("지역");
				tt.push("병원");
				tt.push("고객사계약");
				tt.push("단가");
				tt.push("직원수");
				tt.push("예약기간");
				tt.push("검진기간");
				tt.push("사업현황");
				tt.push("병원계약");

				table.push(tt);

				for (var i = 0; i < data.length; i++) {
					const td = [];
					td.push(data[i].serviceYear);
					td.push(data[i].coName);
					td.push(data[i].coBranch);
					td.push(data[i].service);
					td.push(data[i].place);
					td.push(data[i].hoName);
					td.push(data[i].coContract ? 'Y' : 'N');
					td.push(data[i].price.toLocaleString());
					td.push(data[i].customers.toLocaleString());
					td.push(data[i].reStartDate + " ~ " + data[i].reEndDate);
					td.push(data[i].ipStartDate + " ~ " + data[i].ipStartDate);
					td.push(data[i].status ? 'Y' : 'N');
					td.push(data[i].hoContract ? 'Y' : 'N');

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
