<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:병원관리</title>

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
						병원관리
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
							<li>지역</li>
						</label>
						<div class="form-group col">
							<select id="place" class="form-control">
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
						<div class="btn-purple-square" data-toggle="modal" data-target="#hospitalCreateModal">
							병원신규등록
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
						<input type="text" id="searchWord" class="search-input" placeholder="병원명으로 검색하세요">
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
			<table id="hospitalInfo" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th>NO</th>
					<th style="color: #3529b1">병원명</th>
					<th>지역</th>
					<th>서비스</th>
					<th>계약유무</th>
					<th>사업자등록</th>
					<th>통장사본</th>
					<th>장비현황</th>
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
require('hospital_modal.php');
?>

</body>
</html>

<script type="text/javascript">

	//검색항목리스트
	instance.post('M005001_RES').then(res => {
		setHospitalSelectData(res.data);
	});

	//검색
	function searchInformation() {
		var searchItems = new Object();

		$('#hospitalInfo > tbody').empty();

		searchItems.year = $("#year option:selected").val();
		searchItems.service = $("#service option:selected").val();
		searchItems.place = $("#place option:selected").val();
		searchItems.contract = $("#contract option:selected").val();

		searchItems.searchWord =  $("#searchWord").val();

		if (searchItems.year == "-전체-") {
			searchItems.year = "all";
		}
		if (searchItems.service == "-전체-") {
			searchItems.service = "all";
		}
		if (searchItems.place == "-전체-") {
			searchItems.place = "all";
		}
		if (searchItems.contract == "-전체-") {
			searchItems.contract = "all";
		}

		console.log(searchItems);

		instance.post('M005002_REQ_RES', searchItems).then(res => {
			setHospitalData(res.data);
		});
	}

	//검색 selector
	function setHospitalSelectData(data) {
		console.log(data);
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
			html += '<option>' + data.contract[i] + '</option>'
			$("#contract").append(html);
		}
	}

	//병원관리 테이블
	function setHospitalData(data) {
		console.log(data);
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>"';
			html += '<td>' + data[i].id + '</td>';
			html += '<td style="font-weight: bold; color: #3529b1;cursor: pointer"' +
					'data-toggle="modal" data-target="#hospitalDetailModal" ' +
					'onClick="clickHospitalDetail(\'' + data[i].id + '\')">' + data[i].name + '</td>';
			html += '<td>' + data[i].place + '</td>';
			html += '<td>' + data[i].services + '</td>';
			if (data[i].contract) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}
			if (data[i].license) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}
			if (data[i].bankbook) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}
			html += '<td><div class="btn-purple-square" style="padding: 2px 8px; font-size: 13px" ' +
					'data-toggle="modal" data-target="#hospitalEquipmentModal" onClick="setEquipmentData(\'' + data[i].id + '\')">장비현황</div></td>';
			html += '</tr>';

			$("#hospitalInfo").append(html);
		}
	}

</script>
