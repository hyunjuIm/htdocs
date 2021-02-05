<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>
		.line {
			border-top: 1px solid #DCDCDC;
			border-bottom: 1px solid #DCDCDC;
			padding: 1rem;
		}

		/*셀렉트 테이블*/
		.select-table {
			width: 100%;
		}

		.select-table th, .select-table td {
			padding: 5px 0;
			font-weight: 300;
		}

		.select-table th {
			width: 20%;
		}

		select, input[type="date"] {
			border: 1px solid #cccccc;
			outline: none;
			padding: 2px 10px;
			font-weight: 300;
			width: 100%;
		}

		option {
			font-weight: 300;
		}

		input[type="date"] {
			font-size: 1.3rem;
			padding: 5px 10px;
		}

	</style>
</head>
<body>

<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>

<div id="main">
	<div class="row">
		<div class="box-title">
			<img src="/asset/images/icon_title.png">
			<h2>예약관리</h2>
		</div>
	</div>

	<div class="row line">
		<table class="select-table">
			<tr>
				<th>사업년도</th>
				<td>
					<select id="servedYear">
						<option value="all" selected>-전체-</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>검진병원</th>
				<td>
					<select id="hospitalName">
						<option value="all" selected>-전체-</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>예약기간</th>
				<td>
					<div style="display: block;width: 100%">
						<input type="date" id="reservationStartDate" placeholder="날짜선택"
							   style="width: 45%;display:inline-block;float: left">
						<span style="width: 10%;display:inline-block;text-align: center">~</span>
						<input type="date" id="reservationEndDate" placeholder="날짜선택"
							   style="width: 45%;display:inline-block;float: right">
					</div>
				</td>
			</tr>
			<tr>
				<th>서비스</th>
				<td>
					<select id="serviceName">
						<option value="all" selected>-전체-</option>
					</select>
				</td>
			</tr>
			<!--			<tr>-->
			<!--				<th>지원율</th>-->
			<!--				<td>-->
			<!--					<select id="supportPercent">-->
			<!--						<option selected>- 전체 -</option>-->
			<!--					</select>-->
			<!--				</td>-->
			<!--			</tr>-->
		</table>
	</div>

	<div class="row" style="margin-top: 20px">
		<div class="search-form">
			<span>통합검색</span>
			<div class="input-text">
				<input type="text" placeholder="사원번호, 이름으로 검색하세요." id="searchWord" onkeyup="enterKey()">
				<img src="/asset/images/icon_search.png" onclick="searchInformation(0)">
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 50px">
		<table class="basic-table">
			<thead>
			<tr>
				<th>아이디</th>
				<th>이름</th>
				<th>예약일</th>
				<th>예약병원</th>
				<th>예약상태</th>
			</tr>
			</thead>
			<tbody id="reservationTable">
			</tbody>
		</table>
	</div>

	<div class="row" style="margin-top: 20px">
		<form style="margin: 0 auto; padding: 1rem 0">
			<div class="page_wrap">
				<div class="page_nation" id="paging">
				</div>
			</div>
		</form>
	</div>
</div>

</body>

<footer>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/footer.php');
	?>
</footer>

</html>

<script>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/paging.js');
	?>

	var pageCount = 0;
	var pageNum = 0;

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
		// //서비스
		// for (i = 0; i < data.supportPercent.length; i++) {
		// 	var html = '';
		// 	html += '<option value=\'' + data.supportPercent[i] + '\'>' + data.supportPercent[i] + '%</option>'
		// 	$("#supportPercent").append(html);
		// }

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

	//검색
	function drawTable() {
		pageNum = parseInt(pageNum);
		var searchItems = new Object();

		searchItems.coId = coIdObj.coId;
		searchItems.searchWord = $("#searchWord").val();
		searchItems.pagingNum = pageNum;

		searchItems.servedYear = $("#servedYear option:selected").val();
		searchItems.hospitalName = $("#hospitalName option:selected").val();
		searchItems.reservationStartDate = $("#reservationStartDate").val();
		searchItems.reservationEndDate = $("#reservationEndDate").val();
		searchItems.serviceName = $("#serviceName option:selected").val();
		searchItems.supportPercent = "all";

		if (searchItems.reservationStartDate == "") {
			searchItems.reservationStartDate = "2012-01-01";
		}
		if (searchItems.reservationEndDate == "") {
			searchItems.reservationEndDate = "2030-01-01";
		}

		instance.post('C0202', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setReservationTable(res.data.reservationDTOList, pageNum);

		});
	}

	//예약관리 테이블 셋팅
	function setReservationTable(data, index) {
		setPaging(index);

		$("#reservationTable").empty();

		if (data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="20">해당하는 결과가 없습니다.</td>';
			html += '</tr>';
			$("#reservationTable").append(html);
			$("#paging").empty();
			return false;
		}

		var html = '';

		for (i = 0; i < data.length; i++) {
			html += '<tr>';
			html += '<td>' + data[i].rsvId + '</td>';
			html += '<td>' + data[i].name + '</td>';
			var reservedDate = data[i].reservedDate.replace(/-/gi, '.');
			html += '<td>' + reservedDate + '</td>';
			html += '<td>' + data[i].hospitalName + '</td>';
			html += '<td>' + data[i].status + '</td>';
			html += '</tr>';
		}

		$("#reservationTable").append(html);
	}
</script>
