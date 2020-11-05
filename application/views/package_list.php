<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:패키지관리</title>

	<?php
	require('head.php');
	?>

	<style>
		th, td {
			vertical-align: middle !important;
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
						패키지관리
					</div>
					<hr>
					<div class="form-row row">
						<label class="col-form-label">
							<li>수검연도</li>
						</label>
						<div class="form-group col">
							<select id="year" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>단가</li>
						</label>
						<div class="form-group col">
							<select id="price" class="form-control">
								<option selected>-전체-</option>
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
								<option selected>-전체-</option>
							</select>
							<select id="coBranch" class="form-control">
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
							<li>병원</li>
						</label>
						<div class="form-group col">
							<select id="hoName" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>진행상태</li>
						</label>
						<div class="form-group col">
							<select id="status" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
					</div>
					<hr>
					<div class="btn-save-square" style="float: right;" onclick="searchInformation()">
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
						<input type="text" class="search-input" id="searchWord" placeholder="패키지명으로 검색하세요" onkeyup="enterKey();">
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
			<table id="packageInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 3%"><input type="checkbox" id="packageCheck" name="packageCheck" onclick="clickAll(id, name)"></th>
					<th style="width: 3%">NO</th>
					<th style="width: 10%">고객사명</th>
					<th style="width: 5%; color: #3529b1;">사업장명</th>
					<th>서비스</th>
					<th style="width: 4%">지역</th>
					<th style="width: 10%; color: #3529b1;">병원명</th>
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

</div>
<!--콘텐츠 내용-->

<!--Modal-->
<?php
require('company_modal.php');
require('hospital_modal.php');
?>

</body>

<!--체크박스 검사-->
<?php
require('check_data.php');
?>

</html>

<script type="text/javascript">
	//검색항목리스트
	instance.post('M006001_RES').then(res => {
		setPackageSelectData(res.data);
	});

	//검색
	function searchInformation() {
		var searchItems = new Object();

		$('#packageInfos > tbody').empty();

		searchItems.year = $("#year option:selected").val();
		searchItems.price = $("#price option:selected").val();
		searchItems.coName = $("#coName option:selected").val();
		searchItems.coBranch = $("#coBranch option:selected").val();
		searchItems.service = $("#service option:selected").val();
		searchItems.hoName = $("#hoName option:selected").val();
		searchItems.status = $("#status option:selected").val();

		searchItems.searchWord =  $("#searchWord").val();
		console.log(searchItems);

		if (searchItems.year == "-전체-") {
			searchItems.year = "all";
		}
		if (searchItems.price == "-전체-") {
			searchItems.price = "all";
		}
		if (searchItems.coName == "-전체-") {
			searchItems.coName = "all";
		}
		if (searchItems.coBranch == "-전체-") {
			searchItems.coBranch = "all";
		}
		if (searchItems.service == "-전체-") {
			searchItems.service = "all";
		}
		if (searchItems.hoName == "-전체-") {
			searchItems.hoName = "all";
		}
		if (searchItems.status == "-전체-") {
			searchItems.status = "all";
		}

		instance.post('M006002_REQ_RES', searchItems).then(res => {
			console.log(searchItems);
			setPackageData(res.data);
		});
	}

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
		//병원명
		for (i = 0; i < data.hoName.length; i++) {
			var html = '';
			html += '<option>' + data.hoName[i] + '</option>'
			$("#hoName").append(html);
		}
		//진행상태
		//TODO: 진행상태 값 뭐라고 넣을지
		for (i = 0; i < data.status.length; i++) {
			var html = '';
			if(data.status[i] == "true") {
				html += '<option value="true">Y</option>'
			} else {
				html += '<option value="false">N</option>'
			}
			$("#status").append(html);
		}
	}

	//패키지 테이블
	function setPackageData(data) {
		console.log(data);
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td><input type="checkbox" name="packageCheck" onclick="clickOne(name)"></td>';

			var no = i+1;
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

			if (data[i].coContract) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			html += '<td>' + data[i].price.toLocaleString() + '</td>';
			html += '<td>' + data[i].customers + '</td>';
			html += '<td>' + data[i].reStartDate + " ~ " + data[i].reEndDate + '</td>';
			html += '<td>' + data[i].ipStartDate + " ~ " + data[i].ipEndDate + '</td>';
			if (data[i].status) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}
			if (data[i].hoContract) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			html += '</tr>';

			$("#packageInfos").append(html);
		}
	}

</script>
