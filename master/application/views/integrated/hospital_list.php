<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:병원관리</title>

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
						병원관리
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
							<li>지역</li>
						</label>
						<div class="form-group col">
							<select id="place" class="form-control">
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
						<div class="btn-purple-square" data-toggle="modal" data-target="#hospitalCreateModal">
							병원신규등록
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
						<input type="text" id="searchWord" class="search-input" placeholder="병원명으로 검색하세요" onkeyup="enterKey()">
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
			<table id="hospitalInfo" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 5%"><input type="checkbox" id="hospitalCheck" name="hospitalCheck" onclick="clickAll(id, name)"></th>
					<th style="width: 5%">NO</th>
					<th style="color: #3529b1">병원</th>
					<th>지역</th>
					<th>서비스</th>
					<th>계약유무</th>
					<th>사업자등록</th>
					<th>통장사본</th>
					<th>담당자</th>
					<th>장비현황</th>
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
require('hospital_modal.php');
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
	instance.post('M005001_RES').then(res => {
		setHospitalSelectData(res.data);
	});

	//검색 selector
	function setHospitalSelectData(data) {
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
		//지역
		for (i = 0; i < data.place.length; i++) {
			var html = '';
			html += '<option>' + data.place[i] + '</option>'
			$("#place").append(html);
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
		searchItems.service = $("#service option:selected").val();
		searchItems.place = $("#place option:selected").val();
		searchItems.contract = $("#contract option:selected").val();

		searchItems.pageNum = pageNum;
		searchItems.searchWord = $("#searchWord").val();

		console.log(searchItems);

		instance.post('M005002_REQ_RES', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}

			console.log(res.data);
			setHospitalData(res.data.hospitalDTOList, pageNum);
		});
	}

	//병원관리 테이블
	function setHospitalData(data, index) {
		setPaging(index);

		$('#hospitalInfo > tbody').empty();

		if(data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="20">해당하는 결과가 없습니다.</td>';
			html += '</tr>';
			$("#hospitalInfo").append(html);
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td><input type="checkbox" name="hospitalCheck" onclick="clickOne(name)"></td>';

			var no = 0;
			if (index == 0) {
				no = (index + 1) + i;
			} else {
				no = index * 10 + (i+1);
			}
			html += '<td>' + no + '</td>';

			html += '<td style="font-weight: bold; color: #3529b1;cursor: pointer"' +
					'data-toggle="modal" data-target="#hospitalDetailModal" ' +
					'onClick="clickHospitalDetail(\'' + data[i].id + '\')">' + data[i].name + '</td>';
			html += '<td>' + data[i].place + '</td>';
			html += '<td>' + regExp(data[i].services) + '</td>';
			html += '<td>' + (data[i].contract ? 'Y' : 'N') + '</td>';
			html += '<td>' + (data[i].license ? 'Y' : 'N') + '</td>';
			html += '<td>' + (data[i].bankbook ? 'Y' : 'N') + '</td>';

			//담당자
			html += '<td><div class="btn btn-info" style="font-size: 13px" ' +
					'data-toggle="modal" data-target="#hospitalManagerModal" onClick="clickHospitalManagerDetail(\'' + data[i].id + '\')">설정</div></td>';
			//장비
			html += '<td><div class="btn btn-dark" style="font-size: 13px" ' +
					'data-toggle="modal" data-target="#hospitalEquipmentModal" onClick="setEquipmentData(\'' + data[i].id + '\')">설정</div></td>';
			html += '</tr>';

			$("#hospitalInfo").append(html);
		}
	}

	function tableExcelDownload() {
		var searchItems = new Object();

		searchItems.year = $("#year option:selected").val();
		searchItems.service = $("#service option:selected").val();
		searchItems.place = $("#place option:selected").val();
		searchItems.contract = $("#contract option:selected").val();

		searchItems.pageNum = pageNum;
		searchItems.searchWord = $("#searchWord").val();

		fileURL.post('downloadExcel/M0502', searchItems).then(res => {
			console.log(res.data);
			exportExcel(res.data);
		});
	}

	function exportExcel(data) {
		var excelHandler = {
			getExcelFileName: function () {
				return '[' + todayString() + ']' + ' 병원목록.xlsx';
			},
			getSheetName: function () {
				return 'sheet 1';
			},
			getExcelData: function () {
				const table = [];
				const tt = [];
				tt.push("사업연도");
				tt.push("병원");
				tt.push("지역");
				tt.push("주소");
				tt.push("등급");
				tt.push("대표번호");
				tt.push("사업자번호");
				tt.push("URL");
				tt.push("공단대상");
				tt.push("공단금액");
				tt.push("시스템오픈");
				tt.push("가능서비스");
				tt.push("계약유무");

				tt.push("검사항목");
				tt.push("접근성");
				tt.push("전문성");
				tt.push("시설");

				tt.push("안내사항");
				tt.push("운영시간");
				tt.push("기관정보");

				var max = 0;
				for (var i = 0; i < data.length; i++) {
					max = (data[i].hospitalManagerDTOList.length > max) ? data[i].hospitalManagerDTOList.length : max;
				}
				for (var i = 0; i < max; i++) {
					tt.push("담당자" + (i + 1) + " 이름");
					tt.push("담당자" + (i + 1) + " 직통번호");
					tt.push("담당자" + (i + 1) + " 연락처");
					tt.push("담당자" + (i + 1) + " 이메일");
					tt.push("담당자" + (i + 1) + " 담당업무");
				}

				table.push(tt);
				for (var i = 0; i < data.length; i++) {
					const td = [];
					td.push(data[i].hospitalDetailDTO.serviceYear);
					td.push(data[i].hospitalDetailDTO.name);
					td.push(data[i].hospitalDetailDTO.region);
					td.push('[' + data[i].hospitalDetailDTO.zipCode + '] ' + data[i].hospitalDetailDTO.address + ' ' + data[i].hospitalDetailDTO.buildingNum);
					td.push(data[i].hospitalDetailDTO.grade);
					td.push(data[i].hospitalDetailDTO.phone);
					td.push(data[i].hospitalDetailDTO.licenseNum);
					td.push(data[i].hospitalDetailDTO.url);
					td.push(data[i].hospitalDetailDTO.pcDiscount ? 'Y' : 'N');
					td.push(data[i].hospitalDetailDTO.pcPrice.toLocaleString());
					td.push(data[i].hospitalDetailDTO.systemOpen ? 'Y' : 'N');
					td.push(regExp(data[i].hospitalDetailDTO.services));
					td.push(data[i].hospitalDetailDTO.contract ? 'Y' : 'N');

					td.push(data[i].hospitalDetailDTO.onePoint);
					td.push(data[i].hospitalDetailDTO.twoPoint);
					td.push(data[i].hospitalDetailDTO.threePoint);
					td.push(data[i].hospitalDetailDTO.fourPoint);

					td.push(data[i].hospitalDetailDTO.notice);
					td.push(data[i].hospitalDetailDTO.operatingHours);
					td.push(data[i].hospitalDetailDTO.plusInfo.toString());
					

					for (var j = 0; j < data[i].hospitalManagerDTOList.length; j++) {
						td.push(data[i].hospitalManagerDTOList[j].name);
						td.push(data[i].hospitalManagerDTOList[j].directPhone);
						td.push(data[i].hospitalManagerDTOList[j].phone);
						td.push(data[i].hospitalManagerDTOList[j].email);
						td.push(data[i].hospitalManagerDTOList[j].department);
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
