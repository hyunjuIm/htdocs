<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진결과</title>

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
	<div class="row">
		<div class="col">
			<form style="margin: 0 auto; width: 95%; max-width: 1150px; padding: 20px">
				<ul class="img-circle">
					<div class="menu-title" style="font-size: 22px">
						<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
						검진결과
					</div>
					<hr>
					<div class="form-row row">
						<label class="col-form-label">
							<li>고객사</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="resComName" class="form-control" style="margin-right: 10px"
									onchange="setCompanySelectOption(this, 'resComBranch')">
								<option value="all" selected>-전체-</option>
							</select>
							<select id="resComBranch" class="form-control">
								<option value="all" selected>-선택-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>병원명</li>
						</label>
						<div class="form-group col">
							<select id="hosName" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>결과등록</li>
						</label>
						<div class="form-group col">
							<select id="resultUpload" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>수검일</li>
						</label>
						<div class="form-group col" style="display: flex">
							<input class="form-control" type="date" id="ipStartDate" data-placement="시작일" style="width: 50%; border: 1px solid #DCDCDC">
							<div style="padding: 5px 10px">~</div>
							<input class="form-control" type="date" id="ipEndDate" data-placement="종료일" style="width: 50%; border: 1px solid #DCDCDC">
						</div>
					</div>
					<hr>
					<div style="float: right">
						<div class="btn-save-square"  onclick="searchInformation(0)">
							검색
						</div>
					</div>
				</ul>
			</form>
		</div>
	</div>

	<div class="row " style="margin-left: 30px; margin-right: 30px; margin-top: 120px">
		<form class="table-responsive" style="margin: 0 auto">
			<div
				class="btn-default-small excel" style="float: right" onclick="tableExcelDownload()"></div>
			<table id="resultInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 5%"><input type="checkbox" id="resultCheck" name="resultCheck" onclick="clickAll(id, name)"></th>
					<th style="width: 5%">NO</th>
					<th>병원명</th>
					<th>서비스</th>
					<th>고객사</th>
					<th>사업장</th>
					<th>아이디</th>
					<th>성명</th>
					<th>관계</th>
					<th>검진완료일</th>
					<th>결과등록</th>
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
	instance.post('M010003_RES').then(res => {
		setResultOptionData(res.data);
	});

	function enterKey() {
		if (window.event.keyCode == 13) {
			// 엔터키가 눌렸을 때 실행할 내용
			searchInformation(0);
		}
	}

	//검색 selector
	function setResultOptionData(data) {
		//회사
		var name = [];
		var nameSize = 0;

		for (i = 0; i < data.coNameBranch.length; i++) {
			var check = 0;

			//회사명 - 지점있을때
			var jbSplit = data.coNameBranch[i].split('-');
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
			$("#resComName").append(html);
		}

		companySelect = data.coNameBranch;

		//병원명
		for (i = 0; i < data.hoName.length; i++) {
			var html = '';
			html += '<option>' + data.hoName[i] + '</option>'
			$("#hosName").append(html);
		}
		//사용
		for (i = 0; i < data.resultUpload.length; i++) {
			var html = '';
			if(data.resultUpload[i] == "true") {
				html += '<option value="true">Y</option>'
			} else {
				html += '<option value="false">N</option>'
			}
			$("#resultUpload").append(html);
		}

		//로딩 되자마자 초기 셋팅
		searchInformation(0);
	}

	//페이징-숫자클릭
	function searchInformation(index) {
		pageNum = index;
		drawTable();
	}

	//검색
	function drawTable() {
		pageNum = parseInt(pageNum);
		var searchItems = new Object();

		searchItems.coName = $("#resComName option:selected").val();
		searchItems.coBranch = $("#resComBranch option:selected").val();
		searchItems.hoName = $("#hosName option:selected").val();
		searchItems.resultUpload = $("#resultUpload option:selected").val();
		searchItems.ipStartDate = $("#ipStartDate").val();
		searchItems.ipEndDate = $("#ipEndDate").val();

		searchItems.pageNum = pageNum;

		if (searchItems.coName != 'all' && searchItems.coBranch == 'all') {
			alert("사업장을 선택해주세요.");
			return false;
		} if (searchItems.ipStartDate == '' || searchItems.ipStartDate == null) {
			searchItems.ipStartDate = '2018-01-01';
		} if (searchItems.ipEndDate == '' || searchItems.ipEndDate == null) {
			searchItems.ipEndDate = '2022-01-01';
		}

		console.log(searchItems);

		instance.post('M010004_REQ_RES', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setResultData(res.data.reservationDTOList, pageNum);
			console.log(res.data);
		});
	}

	//패키지 생성 테이블
	function setResultData(data, index) {
		setPaging(index);

		$('#resultInfos > tbody').empty();

		if(data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="20">해당하는 결과가 없습니다.</td>';
			html += '</tr>';
			$("#resultInfos").append(html);
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td><input type="checkbox" name="resultCheck" onclick="clickOne(name)"></td>';

			var no = 0;
			if (index == 0) {
				no = (index + 1) + i;
			} else {
				no = index * 10 + (i+1);
			}
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].hoName + '</td>';
			html += '<td>' + data[i].serviceName + '</td>';
			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';
			html += '<td>' + data[i].cusId + '</td>';
			html += '<td>' + data[i].famName + '</td>';
			html += '<td>' + data[i].famGrade + '</td>';
			html += '<td>' + data[i].ipDate + '</td>';
			html += '<td>' + (data[i].resultUpload ? 'Y' : 'N') + '</td>';

			html += '</tr>';

			$("#resultInfos").append(html);
		}
	}

	function tableExcelDownload() {
		var searchItems = new Object();

		searchItems.coName = $("#resComName option:selected").val();
		searchItems.coBranch = $("#resComBranch option:selected").val();
		searchItems.hoName = $("#hosName option:selected").val();
		searchItems.resultUpload = $("#resultUpload option:selected").val();
		searchItems.ipStartDate = $("#ipStartDate").val();
		searchItems.ipEndDate = $("#ipEndDate").val();

		searchItems.pageNum = pageNum;

		if (searchItems.coName != 'all' && searchItems.coBranch == 'all') {
			alert("사업장을 선택해주세요.");
			return false;
		} if (searchItems.ipStartDate == '' || searchItems.ipStartDate == null) {
			searchItems.ipStartDate = '2018-01-01';
		} if (searchItems.ipEndDate == '' || searchItems.ipEndDate == null) {
			searchItems.ipEndDate = '2022-01-01';
		}

		fileURL.post('downloadExcel/M1004', searchItems).then(res => {
			console.log(res.data);
			exportExcel(res.data);
		});
	}

	function exportExcel(data) {
		var excelHandler = {
			getExcelFileName: function () {
				return '[' + todayString() + ']' + ' 검진결과.xlsx';
			},
			getSheetName: function () {
				return 'sheet 1';
			},
			getExcelData: function () {
				const table = [];
				const tt = [];
				tt.push("사업연도");
				tt.push("병원명");
				tt.push("서비스");
				tt.push("고객사");
				tt.push("사업장");
				tt.push("아이디");
				tt.push("성명");
				tt.push("관계");
				tt.push("검진완료일");
				tt.push("결과등록");

				table.push(tt);

				for (var i = 0; i < data.length; i++) {
					const td = [];
					td.push(data[i].serviceYear);
					td.push(data[i].hoName);
					td.push(data[i].serviceName);
					td.push(data[i].coName);
					td.push(data[i].coBranch);
					td.push(data[i].cusId);
					td.push(data[i].famName);
					td.push(data[i].famGrade);
					td.push(data[i].ipDate);
					td.push(data[i].resultUpload ? 'Y' : 'N');

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
