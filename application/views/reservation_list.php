<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:예약관리</title>

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
						예약관리
					</div>
					<hr>
					<div class="form-row row">
						<label class="col-form-label">
							<li>수검연도</li>
						</label>
						<div class="form-group col">
							<select id="servedYear" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>서비스</li>
						</label>
						<div class="form-group col">
							<select id="reservationServiceName" class="form-control">
								<option selected>-전체-</option>
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
								<option selected>-전체-</option>
							</select>
							<select id="companyBranch" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>

						<label class="col-form-label" style="margin-left: 20px">
							<li>병원</li>
						</label>
						<div class="form-group col">
							<select id="hospitalName" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>진행상태</li>
						</label>
						<div class="form-group col">
							<select id="reservationStatus" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
						</label>
						<div class="form-group col">
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
						<input type="text" class="search-input" id="searchWord" placeholder="사원번호, 이름으로 검색하세요" onkeyup="enterKey()">
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
			<table id="reservationInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 3%"><input type="checkbox" id="reservationCheck" name="reservationCheck" onclick="clickAll(id, name)"></th>
					<th>NO</th>
					<th>서비스</th>
					<th>고객사</th>
					<th>사업장</th>
					<th style="color: #3529b1">아이디<br>(사번)</th>
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
					<th style="width: 5%">공단<br>차감</th>
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
require('reservation_modal.php');
?>

</body>
</html>

<!--체크박스 검사-->
<?php
require('check_data.php');
?>

<script type="text/javascript">

	//검색항목리스트
	instance.post('M003001_RES').then(res => {
		setReservationSelectData(res.data);
	});

	//검색
	function searchInformation() {
		var searchItems = new Object();

		$('#reservationInfos > tbody').empty();

		searchItems.servedYear = $("#servedYear option:selected").val();
		searchItems.reservationServiceName = $("#reservationServiceName option:selected").val();
		searchItems.companyName = $("#companyName option:selected").val();
		searchItems.companyBranch = $("#companyBranch option:selected").val();
		searchItems.reservationStatus = $("#reservationStatus option:selected").val();
		searchItems.hospitalName = $("#hospitalName option:selected").val();

		searchItems.searchWord =  $("#searchWord").val();

		if (searchItems.servedYear == "-전체-") {
			searchItems.servedYear = "all";
		}
		if (searchItems.reservationServiceName == "-전체-") {
			searchItems.reservationServiceName = "all";
		}
		if (searchItems.companyName == "-전체-") {
			searchItems.companyName = "all";
		}
		if (searchItems.companyBranch == "-전체-") {
			searchItems.companyBranch = "all";
		}
		if (searchItems.reservationStatus == "-전체-") {
			searchItems.reservationStatus = "all";
		}
		if (searchItems.hospitalName == "-전체-") {
			searchItems.hospitalName = "all";
		}

		instance.post('M003002_REQ_RES', searchItems).then(res => {
			console.log(searchItems);
			setReservationData(res.data);
		});
	}

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
			$("#companyName").append(html);
		}
		companySelect = data.companyName;

		//진행상태
		for (i = 0; i < data.reservationStatus.length; i++) {
			var html = '';
			if(data.reservationStatus[i] == "true") {
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
	}

	//예약관리 테이블
	function setReservationData(data) {
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td><input type="checkbox" name="reservationCheck" onclick="clickOne(name)"></td>';

			var no = i+1;
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].serviceName + '</td>';
			html += '<td>' + data[i].companyName + '</td>';
			html += '<td>' + data[i].companyBranch + '</td>';
			html += '<td style="font-weight: bold; color: #3529b1;cursor: pointer" ' +
					'data-toggle="modal" data-target="#customerModal" onClick="clickDetail(\'' + data[i].id + '\')">' + data[i].familyId + '</td>';
			html += '<td>' + data[i].familyName + '</td>';
			html += '<td>' + data[i].familyGrade + '</td>';
			html += '<td>' + data[i].familyBirthDate + '</td>';
			html += '<td>' + data[i].hospitalName + '</td>';
			html += '<td>' + data[i].familyPhone;
			html += '<td>1차 ' + data[i].firstWishDate;
			html += '<p>2차 ' + data[i].secondWishDate + '</td>';

			if (data[i].ipCheck) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			html += '<td>' + data[i].packageName + '</td>';
			html += '<td>' + data[i].packagePrice.toLocaleString() + '</td>';
			html += '<td>' + data[i].companySupportPrice.toLocaleString() + '</td>';

			if (data[i].familyPsInfoCheckDual) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			if (data[i].familyPsInfoCheckHos) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			if (data[i].familyPcDiscount) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			html += '</tr>';

			$("#reservationInfos").append(html);
		}
	}
</script>
