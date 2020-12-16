<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.row {
			width: 100%;
			display: block;
		}
	</style>
</head>
<body>

<!--상단 메뉴-->
<header>
	<?php
	require('common/header.php');
	?>
</header>

<!--콘텐츠 내용-->

<div class="main">
	<div class="container" style="width: 110rem;margin: 0 auto">
		<div class="row">
			<div class="box-title">
				<img src="/asset/images/icon_title.png">
				<h2 style="font-weight: 300;font-size: 2.3rem">예약관리</h2>
			</div>
		</div>
		<div class="row" style="border-top: 1px solid #DCDCDC;border-bottom: 1px solid #DCDCDC;padding: 1rem">
			<table class="select-form">
				<tr>
					<td>
						<div class="select-list" style="float:left;">
							<div class="select-label">
								<img src="/asset/images/icon_dot_menu.png">
								사업년도
							</div>
							<div class="select-content">
								<select id="servedYear">
									<option selected>- 전체 -</option>
								</select>
							</div>
						</div>
					</td>
					<td>
						<div class="select-list" style="float:right;">
							<div class="select-label">
								<img src="/asset/images/icon_dot_menu.png">
								검진병원
							</div>
							<div class="select-content">
								<select id="hospitalName">
									<option selected>- 전체 -</option>
								</select>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="select-list" style="float:left;">
							<div class="select-label">
								<img src="/asset/images/icon_dot_menu.png">
								예약기간
							</div>
							<div class="select-content">
								<input type="date" id="reservationStartDate" placeholder="날짜선택"
									   style="width: 45%;line-height: 3rem;">
								<span style="width: 10%;text-align: center">~</span>
								<input type="date" id="reservationEndDate" placeholder="날짜선택"
									   style="width: 45%;line-height: 3rem;">
							</div>
						</div>
					</td>
					<td>
						<div class="select-list" style="float:right;">
							<div class="select-label">
								<img src="/asset/images/icon_dot_menu.png">
								서비스
							</div>
							<div class="select-content">
								<select id="serviceName">
									<option selected>- 전체 -</option>
								</select>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="select-list" style="float:left;">
							<div class="select-label">
								<img src="/asset/images/icon_dot_menu.png">
								지원율
							</div>
							<div class="select-content">
								<select id="supportPercent">
									<option selected>- 전체 -</option>
								</select>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div class="row" style="margin-top: 1rem">
			<div class="btn-light-grey-square" style="float: right" onclick="searchInformation()">검색</div>
		</div>
	</div>

	<div class="row" style="margin-top: 10rem;padding: 4rem">
		<div class="search-form">
			<span>통합검색</span>
			<div class="input-text">
				<input type="text" placeholder="사원번호, 이름으로 검색하세요." id="searchWord" onkeyup="enterKey()">
				<img src="/asset/images/icon_search.png" onclick="searchInformation(0)">
			</div>
		</div>

		<table class="basic-table" id="reservationTable" style="margin-top: 5rem">
			<thead>
			<th width="4%"><input type="checkbox" id="reservationCheck" name="reservationCheck"
								  onclick="clickAll(id, name)"></th>
			<th width="4%">NO</th>
			<th>아이디</th>
			<th>이름</th>
			<th>주민번호</th>
			<th>가족관계</th>
			<th>지원율</th>
			<th>예약일</th>
			<th>예약병원</th>
			<th>예약상태</th>
			</thead>
		</table>
	</div>

	<div class="row" style="margin-top: 5rem">
		<form style="margin: 0 auto; width: 85%; padding: 1rem">
			<div class="page_wrap">
				<div class="page_nation" id="paging">
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>

<script>
	//상단바 선택된 메뉴
	$('#topMenu1').addClass('active');
	$('#topMenu1').before('<div class="menu-select-line"></div>');

	<?php
	require('common/check_data.js');
	?>
	<?php
	require('common/paging.js');
	?>

	var pagingNum = 0;
	var pageCount = 0;
	var searchWord = "";

	var coIdObj = new Object();
	coIdObj.coId = sessionStorage.getItem("userCoID");

	instance.post('C0201', coIdObj).then(res => {
		setReservationSelectData(res.data);
	});

	//검색 selector
	function setReservationSelectData(data) {
		//수검연도
		for (i = 0; i < data.servedYear.length; i++) {
			var html = '';
			html += '<option value=\'' + data.servedYear[i] + '\'>' + data.servedYear[i] + '년</option>'
			$("#servedYear").append(html);
		}
		//병원별
		for (i = 0; i < data.hospitalName.length; i++) {
			var html = '';
			html += '<option>' + data.hospitalName[i] + '</option>'
			$("#hospitalName").append(html);
		}
		//서비스
		for (i = 0; i < data.serviceName.length; i++) {
			var html = '';
			html += '<option>' + data.serviceName[i] + '</option>'
			$("#serviceName").append(html);
		}
		//서비스
		for (i = 0; i < data.supportPercent.length; i++) {
			var html = '';
			html += '<option value=\'' + data.supportPercent[i] + '\'>' + data.supportPercent[i] + '%</option>'
			$("#supportPercent").append(html);
		}
	}

	searchInformation(0);

	//검색
	function searchInformation(index) {
		var searchItems = new Object();

		$('#reservationInfos > tbody').empty();

		searchItems.coId = coIdObj.coId;
		searchItems.servedYear = $("#servedYear option:selected").val();
		searchItems.hospitalName = $("#hospitalName option:selected").val();
		searchItems.reservationStartDate = $("#reservationStartDate").val();
		searchItems.reservationEndDate = $("#reservationEndDate").val();
		searchItems.serviceName = $("#serviceName option:selected").val();
		searchItems.supportPercent = $("#supportPercent option:selected").val();

		searchItems.searchWord = $("#searchWord").val();
		searchItems.pagingNum = 0;

		if (searchItems.servedYear == "- 전체 -") {
			searchItems.servedYear = "all";
		} if (searchItems.hospitalName == "- 전체 -") {
			searchItems.hospitalName = "all";
		} if (searchItems.reservationStartDate == "") {
			searchItems.reservationStartDate = "2012-01-01";
		} if (searchItems.reservationEndDate == "") {
			searchItems.reservationEndDate = "2030-01-01";
		} if (searchItems.serviceName == "- 전체 -") {
			searchItems.serviceName = "all";
		} if (searchItems.supportPercent == "- 전체 -") {
			searchItems.supportPercent = "all";
		}

		console.log(searchItems);

		instance.post('C0202', searchItems).then(res => {
			console.log(res.data);
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setReservationTable(res.data.reservationDTOList);
		});
	}

	//예약관리 테이블 셋팅
	function setReservationTable(data) {
		//페이징
		setPaging();
		
		//테이블 셋팅
		$("#reservationTable tbody").empty();

		var html = '<tbody>';

		for (i = 0; i < data.length; i++) {
			html += '<tr>';
			html += '<td><input type="checkbox" name="reservationCheck" value=\'' + data[i].rsvId + '\' onclick="clickOne(name)"></td>';

			var no = i + 1;
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].email + '</td>';
			html += '<td>' + data[i].name + '</td>';
			html += '<td>' + data[i].birthDate + '</td>';
			html += '<td>' + data[i].grade + '</td>';
			html += '<td>' + data[i].supportPercent + ' %</td>';
			html += '<td>' + data[i].reservedDate + '</td>';
			html += '<td>' + data[i].hospitalName + '</td>';
			html += '<td>' + data[i].status + '</td>';

			html += '</tr>';
		}

		html += '</tbody>';
		$("#reservationTable").append(html);
	}
</script>

