<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:법적자료</title>

	<?php
	require('head.php');
	?>

	<style>
		table input[type=text] {
			width: 100%;
			padding: 0 10px;
			outline: none;
			border: 1px solid #DCDCDC;
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
		<form style="margin: 0 auto; width: 85%">
			<div class="menu-title" style="font-size: 22px">
				<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
				법적자료
			</div>

			<div class="menu-title" style="float:right">
				<ul class="img-circle">
					<div style="display: flex">
						<label class="col-form-label" style="padding-left: 60px; width: 5px !important;">
							<li style="font-size: 17px">기업</li>
						</label>
						<select id="companyName" class="form-control" style="width: 170px;margin-right: 3px"
								onchange="setCompanySelectOption(this, 'companyBranch')">
							<option value="all" selected>-전체-</option>
						</select>
						<select id="companyBranch" class="form-control" style="width: 170px;margin-right: 3px">
							<option value="all" selected>-전체-</option>
						</select>
						<div>
							<div class="search">
								<input type="text" id="searchWord" class="search-input" placeholder="자료구분으로 검색하세요" onkeyup="enterKey();">
								<div class="search-icon" onclick="searchInformation(0)"></div>
							</div>
						</div>
					</div>
				</ul>
			</div>

			<table id="legalInfos" class="table table-hover" style="margin-top: 10px">
				<thead>
				<tr>
<!--					<th style="width: 5%"><input type="checkbox" id="legalCheck" name="legalCheck"-->
<!--												 onclick="clickAll(id, name)"></th>-->
					<th style="width: 5%">NO</th>
					<th style="">병원명</th>
					<th style="">고객사명</th>
					<th style="">사업장명</th>
					<th style="">서비스</th>
					<th style="width: 30%">자료구분<span style="font-size: 13px">(구분값은 ','표시)</span></th>
					<th style="width: 8%">상태</th>
				</tr>
				</thead>
				<tbody align="center">
				</tbody>
			</table>

			<div class="btn-default-small excel" style="float: left" onclick="tableExcelDownload()"></div>

			<div style="float:right">
				<div class="btn-save-square" onclick="saveLegalData()">저장</div>
			</div>
		</form>
	</div>

	<!--페이징-->
	<div class="row" style="display: block; padding: 20px">
		<form style="margin: 0 auto; width: 85%;">
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

<!--체크박스 검사-->
<?php
require('check_data.php');
?>

<script>
	var pageCount = 0;
	var pageNum = 0;

	//검색항목리스트
	instance.post('M001001_RES').then(res => {
		setOptionSelectData(res.data);
	});

	var companySelect;

	//검색 selector
	function setOptionSelectData(data) {
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
			$("#companyName").append(html);
		}
		companySelect = data.coNameBranch;

		//로딩 되자마자 초기 셋팅
		searchInformation(0);
	}

	//페이징-숫자클릭
	function searchInformation(index) {
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

		searchItems.pageNum = pageNum;
		searchItems.coName = $("#companyName option:selected").val();
		searchItems.coBranch = $("#companyBranch option:selected").val();

		searchItems.searchWord = $("#searchWord").val();

		//법적자료 리스트 불러오기
		instance.post('M010001_RES', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}

			setLegalData(res.data.legalDataDTOList, pageNum);
			console.log(res.data);
		});
	}

	<?php
	require('paging.js');
	?>

	var legalData = new Array();
	var stateItems = ["등록", "미등록"];

	//법적자료 테이블
	function setLegalData(data, index) {
		setPaging(index);

		$('#legalInfos > tbody').empty();

		if (data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="8">해당하는 검색 결과가 없습니다.</td>';
			html += '</tr>';
			$("#legalInfos").append(html);
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			// html += '<td><input type="checkbox" name="legalCheck" onclick="clickOne(name)"></td>';

			var no = 0;
			if (index == 0) {
				no = (index + 1) + i;
			} else {
				no = index * 10 + (i + 1);
			}
			html += '<td id= "\'' + data[i].pkgId + '\'">' + no + '</td>';

			html += '<td>' + data[i].hosName + '</td>';
			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';
			html += '<td>' + data[i].serviceName + '</td>';
			
			html += '<td><input type="text" id= "\'' + data[i].pkgId + "Comment" + '\'"' +
					'onkeyup="changeComment(\'' + data[i].pkgId + '\', value)" ' +
					'value=\'' + data[i].resultComment + '\'></td>';

			//상태
			var state = '<td><select class="form-control" id= "\'' + data[i].pkgId + "State" + '\'"' +
					'onchange="changeState(\'' + data[i].pkgId + '\', value)\">';
			for (j = 0; j < stateItems.length; j++) {
				var tmpState;
				if (stateItems[j] == "미등록") {
					tmpState = false;
				} else if (stateItems[j] == "등록") {
					tmpState = true;
				}

				if (tmpState == data[i].status) {
					state += '<option selected>' + stateItems[j] + '</option>';
				} else {
					state += '<option>' + stateItems[j] + '</option>';
				}
			}
			state += '</select></td>';
			html += state;
			html += '</tr>';

			$("#legalInfos").append(html);

			var legal = new Object();
			legal.pkgId = data[i].pkgId;
			legal.resultComment = data[i].resultComment;
			legal.status = data[i].status;
			legalData.push(legal);
		}
	}

	//자료구분 변경
	function changeComment(pkgId, value) {
		var comment = value.split(",");

		for (i = 0; i < legalData.length; i++) {
			if (legalData[i].pkgId == pkgId) {
				legalData[i].resultComment = comment;
			}
		}
	}

	//상태 변경
	function changeState(pkgId, value) {
		var state = true;

		if (value == "등록") {
			state = true;
		} else if (value == "미등록") {
			state = false;
		}

		for (i = 0; i < legalData.length; i++) {
			if (legalData[i].pkgId == pkgId) {
				legalData[i].status = state;
			}
		}
	}

	//법적자료 저장
	function saveLegalData() {
		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M010002_REQ', legalData).then(res => {
				console.log(res.data.message);
				if (res.data.message == "success") {
					alert("저장되었습니다.");
					location.reload();
				}
			});
		} else {
			return false;
		}
	}

	function tableExcelDownload() {
		var searchItems = new Object();

		searchItems.pageNum = pageNum;
		searchItems.coName = $("#companyName option:selected").val();
		searchItems.coBranch = $("#companyBranch option:selected").val();

		searchItems.searchWord = $("#searchWord").val();

		fileURL.post('downloadExcel/M1001', searchItems).then(res => {
			console.log(res.data);
			exportExcel(res.data);
		});
	}

	function exportExcel(data) {
		var excelHandler = {
			getExcelFileName: function () {
				return '[' + todayString() + ']' + ' 법적자료.xlsx';
			},
			getSheetName: function () {
				return 'sheet 1';
			},
			getExcelData: function () {
				const table = [];
				const tt = [];
				tt.push("사업연도");
				tt.push("병원명");
				tt.push("고객사명");
				tt.push("사업장명");
				tt.push("서비스");
				tt.push("자료구분");
				tt.push("상태");

				table.push(tt);

				for (var i = 0; i < data.length; i++) {
					const td = [];
					td.push(data[i].serviceYear);
					td.push(data[i].hosName);
					td.push(data[i].coName);
					td.push(data[i].coBranch);
					td.push(data[i].serviceName);
					td.push(data[i].resultComment);
					td.push(data[i].status ? '등록' : '미등록');

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
