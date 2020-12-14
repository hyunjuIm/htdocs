<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:기업관리</title>

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
								<option selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>서비스</li>
						</label>
						<div class="form-group col">
							<select id="service" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>진행상태</li>
						</label>
						<div class="form-group col">
							<select id="status" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>계약유무</li>
						</label>
						<div class="form-group col">
							<select id="contract" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
					</div>
					<hr>
					<div style="float: right">
						<div class="btn-purple-square" data-toggle="modal" data-target="#companyCreateModal">
							기업신규등록
						</div>
						<div class="btn-save-square"  onclick="searchInformation()">
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
						<input type="text" id="searchWord" class="search-input" placeholder="회사명으로 검색하세요" onkeyup="enterKey()">
						<div class="search-icon" onclick="searchInformation()"></div>
					</div>
				</h6>
			</div>
		</div>
	</div>

	<div class="row " style="margin-left: 30px; margin-right: 30px; margin-top: 20px">
		<form class="table-responsive" style="margin: 0 auto">
			<div
					class="btn-default-small excel" style="float: right"></div>
			<table id="companyInfo" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 4%"><input type="checkbox" id="companyCheck" name="companyCheck" onclick="clickAll(id, name)"></th>
					<th style="width: 4%">NO</th>
					<th style="width: 12%; color: #3529b1">고객사</th>
					<th>사업장</th>
					<th style="width: 12%">서비스</th>
					<th>계약유무</th>
					<th>직원 수</th>
					<th>진행현황</th>
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

	//검색항목리스트
	instance.post('M004001_RES').then(res => {
		setCompanySelectData(res.data);
	});

	searchInformation();

	//검색
	function searchInformation() {
		var searchItems = new Object();

		$('#companyInfo > tbody').empty();

		searchItems.year = $("#year option:selected").val();
		searchItems.service = $("#service option:selected").val();
		searchItems.status = $("#status option:selected").val();
		searchItems.contract = $("#contract option:selected").val();

		searchItems.searchWord =  $("#searchWord").val();

		if (searchItems.year == "-전체-") {
			searchItems.year = "all";
		}
		if (searchItems.service == "-전체-") {
			searchItems.service = "all";
		}
		if (searchItems.status == "-전체-") {
			searchItems.status = "all";
		}
		if (searchItems.contract == "-전체-") {
			searchItems.contract = "all";
		}

		console.log(searchItems);

		instance.post('M004002_REQ_RES', searchItems).then(res => {
			setCompanyData(res.data);
		});
	}

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
			if(data.status[i] == "true") {
				html += '<option value="true">진행중</option>'
			} else {
				html += '<option value="false">종료</option>'
			}
			$("#status").append(html);
		}
		//계약유무
		for (i = 0; i < data.contract.length; i++) {
			var html = '';
			if(data.contract[i] == "true") {
				html += '<option value="true">Y</option>'
			} else {
				html += '<option value="false">N</option>'
			}
			$("#contract").append(html);
		}
	}

	//기업관리 테이블
	function setCompanyData(data) {

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>"';
			html += '<td><input type="checkbox" name="companyCheck" onclick="clickOne(name)"></td>';

			var no = i+1;
			html += '<td>' + no + '</td>';

			html += '<td style="font-weight: bold; color: #3529b1;cursor: pointer" ' +
					'data-toggle="modal" data-target="#companyDetailModal" ' +
					'onClick="clickCompanyDetail(\'' + data[i].id + '\')">' + data[i].name + '</td>';
			html += '<td>' + data[i].branch + '</td>';
			html += '<td>' + regExp(data[i].services) + '</td>';

			if (data[i].contract) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			html += '<td>' + data[i].customers + '</td>';

			if (data[i].status) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			html += '<td>' + data[i].reservationStartDate + " ~ " + data[i].reservationEndDate + '</td>';
			html += '<td>' + data[i].inspectionStartDate + " ~ " + data[i].inspectionEndDate + '</td>';

			if (data[i].license) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			html += '</tr>';

			$("#companyInfo").append(html);
		}
	}
</script>
