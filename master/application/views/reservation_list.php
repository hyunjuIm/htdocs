<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:예약관리</title>

	<?php
	require('head.php');
	?>

	<style>
		#reservationInfos tbody tr {
			cursor: pointer;
		}

		table input[type=text] {
			width: 100%;
			background: none;
			outline: none;
			border: none;
			text-align: center;
		}

		table input[type=date] {
			width: 110px;
		}

		table textarea {
			width: 100%;
			height: 150px;
			background: none;
			outline: none;
			border: none;
			font-weight: 300;
		}

		#info6 th {
			vertical-align: top !important;
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
						예약관리
					</div>
					<hr>
					<div class="form-row row">
						<label class="col-form-label">
							<li>수검연도</li>
						</label>
						<div class="form-group col">
							<select id="servedYear" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>서비스</li>
						</label>
						<div class="form-group col">
							<select id="reservationServiceName" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>고객사</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="companyName" class="form-control" style="margin-right: 10px"
									onchange="setCompanySelectOption(this, 'companyBranch')">
								<option value="all" selected>-전체-</option>
							</select>
							<select id="companyBranch" class="form-control">
								<option value="all" selected>-선택-</option>
							</select>
						</div>

						<label class="col-form-label" style="margin-left: 20px">
							<li>병원</li>
						</label>
						<div class="form-group col">
							<select id="hospitalName" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>진행상태</li>
						</label>
						<div class="form-group col">
							<select id="reservationStatus" class="form-control">
								<option value="all" selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
						</label>
						<div class="form-group col">
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
						<input type="text" class="search-input" id="searchWord" placeholder="사원번호, 이름으로 검색하세요"
							   onkeyup="enterKey()">
						<div class="search-icon" onclick="searchInformation(0)"></div>
					</div>
				</h6>
			</div>
		</div>
	</div>

	<div class="row " style="margin-left: 30px; margin-right: 30px; margin-top: 20px">
		<form class="table-responsive" style="margin: 0 auto">
			<div class="btn-default-small excel" style="float: right" onclick="tableExcelDownload()"></div>
			<table id="reservationInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 3%"><input type="checkbox" id="reservationCheck" name="reservationCheck"
												 onclick="clickAll(id, name)"></th>
					<th style="width: 3%">NO</th>
					<th>서비스</th>
					<th>고객사</th>
					<th>사업장</th>
					<th>아이디<br>(사번)</th>
					<th>성명</th>
					<th>등급</th>
					<th style="width: 7%">생년월일</th>
					<th style="width: 7%">검진병원</th>
					<th style="width: 7%">연락처</th>
					<th style="width: 7%">예약일</th>
					<th>수검<br>상태</th>
					<th>패키지</th>
					<th>패키지<br>금액</th>
					<th>지원금</th>
					<th style="width: 5%">개인정보동의<br>(듀얼)</th>
					<th style="width: 5%">개인정보동의<br>(병원)</th>
					<th style="width: 5%">공단<br>대상</th>
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
require('reservation_modal.php');
?>

</body>

<!--체크박스 검사-->
<?php
require('check_data.php');
?>

</html>


<script type="text/javascript">
	var pageCount = 0;
	var pageNum = 0;

	//검색항목리스트
	instance.post('M003001_RES').then(res => {
		setReservationSelectData(res.data);
	});

	var companySelect;

	//검색 selector
	function setReservationSelectData(data) {
		//수검연도
		for (i = 0; i < data.servedYear.length; i++) {
			var html = '';
			html += '<option>' + data.servedYear[i] + '</option>'
			$("#servedYear").append(html);
		}
		//병원별
		for (i = 0; i < data.reservationServiceName.length; i++) {
			var html = '';
			html += '<option>' + data.reservationServiceName[i] + '</option>'
			$("#reservationServiceName").append(html);
		}

		//회사
		var name = [];
		var nameSize = 0;
		for (i = 0; i < data.companyName.length; i++) {
			var check = 0;

			//회사명 - 지점있을때
			var jbSplit = data.companyName[i].split('-');
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
		companySelect = data.companyName;

		//진행상태
		for (i = 0; i < data.reservationStatus.length; i++) {
			var html = '';
			if (data.reservationStatus[i] == "true") {
				html += '<option value="true">수검완료</option>'
			} else {
				html += '<option value="false">예약신청</option>'
			}
			$("#reservationStatus").append(html);
		}
		//병원명
		for (i = 0; i < data.hospitalName.length; i++) {
			var html = '';
			html += '<option>' + data.hospitalName[i] + '</option>'
			$("#hospitalName").append(html);
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

		searchItems.servedYear = $("#servedYear option:selected").val();
		searchItems.reservationServiceName = $("#reservationServiceName option:selected").val();
		searchItems.companyName = $("#companyName option:selected").val();
		searchItems.companyBranch = $("#companyBranch option:selected").val();
		searchItems.reservationStatus = $("#reservationStatus option:selected").val();
		searchItems.hospitalName = $("#hospitalName option:selected").val();

		searchItems.pageNum = pageNum;
		searchItems.searchWord = $("#searchWord").val();

		if (searchItems.companyName != 'all' && searchItems.companyBranch == 'all') {
			alert("사업장을 선택해주세요.");
			return false;
		}

		instance.post('M003002_REQ_RES', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}

			console.log(res.data);
			setReservationData(res.data.reservationDTOList, pageNum);
		});
	}

	<?php
	require('paging.js');
	?>

	//예약관리 테이블
	function setReservationData(data, index) {
		setPaging(index);

		$("#reservationInfos > tbody").empty();

		if (data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="19">해당하는 검색 결과가 없습니다.</td>';
			html += '</tr>';
			$("#reservationInfos").append(html);
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr data-toggle="modal" data-target="#customerModal" onClick="clickDetail(\'' + data[i].id + '\')">';
			html += '<td><input type="checkbox" name="reservationCheck" value=\'' + data[i].id + '\' onclick="clickOne(name)"></td>';

			var no = 0;
			if (index == 0) {
				no = (index + 1) + i;
			} else {
				no = index * 10 + (i + 1);
			}
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].serviceName + '</td>';
			html += '<td>' + data[i].companyName + '</td>';
			html += '<td>' + data[i].companyBranch + '</td>';
			html += '<td>' + data[i].familyId + '</td>';
			html += '<td>' + data[i].familyName + '</td>';
			html += '<td>' + data[i].familyGrade + '</td>';
			html += '<td>' + data[i].familyBirthDate + '</td>';
			html += '<td>' + data[i].hospitalName + '</td>';
			html += '<td style="font-size: 14px">' + data[i].familyPhone + '</td>';

			if(data[i].ipDate == '' || data[i].ipDate == null) {
				html += '<td style="font-size: 14px;line-height: 20px">1차: ' + data[i].firstWishDate;
				html += '<br>2차: ' + data[i].secondWishDate + '</td>';
			} else {
				html += '<td>' + data[i].ipDate + '</td>';
			}

			html += '<td>' + (data[i].ipCheck ? 'Y' : 'N') + '</td>';
			html += '<td>' + data[i].packageName + '</td>';
			html += '<td>' + data[i].packagePrice.toLocaleString() + '</td>';
			html += '<td>' + data[i].companySupportPrice.toLocaleString() + '</td>';
			html += '<td>' + (data[i].familyPsInfoCheckDual ? 'Y' : 'N') + '</td>';
			html += '<td>' + (data[i].familyPsInfoCheckHos ? 'Y' : 'N') + '</td>';
			html += '<td>' + (data[i].familyPcDiscount ? 'Y' : 'N') + '</td>';
			html += '</tr>';

			$("#reservationInfos").append(html);
		}
	}

	function tableExcelDownload() {
		var searchItems = new Object();

		searchItems.servedYear = $("#servedYear option:selected").val();
		searchItems.reservationServiceName = $("#reservationServiceName option:selected").val();
		searchItems.companyName = $("#companyName option:selected").val();
		searchItems.companyBranch = $("#companyBranch option:selected").val();
		searchItems.reservationStatus = $("#reservationStatus option:selected").val();
		searchItems.hospitalName = $("#hospitalName option:selected").val();

		searchItems.pageNum = pageNum;
		searchItems.searchWord = $("#searchWord").val();

		if (searchItems.companyName != 'all' && searchItems.companyBranch == 'all') {
			alert("사업장을 선택해주세요.");
			return false;
		}

		fileURL.post('downloadExcel/M0302', searchItems).then(res => {
			console.log(res.data);
			exportExcel(res.data);
		});
	}

	function exportExcel(data) {
		var excelHandler = {
			getExcelFileName: function () {
				return '[' + todayString() + ']' + ' 예약목록.xlsx';
			},
			getSheetName: function () {
				return 'sheet 1';
			},
			getExcelData: function () {
				const table = [];
				const tt = [];
				tt.push("사업연도");
				tt.push("서비스");
				tt.push("고객사");
				tt.push("사업장");
				tt.push("아이디");
				tt.push("성명");
				tt.push("관계");
				tt.push("생년월일");
				tt.push("검진병원");
				tt.push("연락처");
				tt.push("예약일");
				tt.push("수검상태");
				tt.push("패키지");
				tt.push("패키지금액");
				tt.push("지원금");
				tt.push("개인정보동의(듀얼)");
				tt.push("개인정보동의(병원)");
				tt.push("공단대상");
				table.push(tt);
				for (var i = 0; i < data.length; i++) {
					const td = [];
					td.push(data[i].serviceYear);
					td.push(data[i].serviceName);
					td.push(data[i].companyName);
					td.push(data[i].companyBranch);
					td.push(data[i].familyId);
					td.push(data[i].familyName);
					td.push(data[i].familyGrade);
					td.push(data[i].familyBirthDate);
					td.push(data[i].hospitalName);
					td.push(data[i].familyPhone);
					if(data[i].ipDate == '' || data[i].ipDate == null) {
						td.push("1차 예약일: " + data[i].firstWishDate + " | 2차 예약일: " + data[i].secondWishDate);
					} else {
						td.push(data[i].ipDate);
					}
					td.push(data[i].ipCheck ? 'Y' : 'N');
					td.push(data[i].packageName);
					td.push(data[i].packagePrice.toLocaleString());
					td.push(data[i].companySupportPrice.toLocaleString());
					td.push(data[i].familyPsInfoCheckDual ? 'Y' : 'N');
					td.push(data[i].familyPsInfoCheckHos ? 'Y' : 'N');
					td.push(data[i].familyPcDiscount ? 'Y' : 'N');
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
