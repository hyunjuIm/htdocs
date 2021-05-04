<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.all-menu {
			float: right;
			margin-top: -15px;
			margin-bottom: 5px;
			font-weight: bolder;
			font-size: 15px;
			color: #555555;
		}

		.all-menu:hover {
			color: #5645ED;
		}

		.table-box {
			min-width: 600px;
			min-height: 340px;
		}

		#noticeTable .title {
			display: block;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			text-align: left;
			cursor: pointer;
		}

		#noticeTable .title:hover {
			color: #5645ED;
		}
	</style>
</head>
<body>

<!--상단 네비바-->
<header>
	<?php
	require('common/header.php');
	?>
</header>
<!--상단 네비바-->

<!--콘텐츠 내용-->
<div class="container" style="padding-top: 35px; max-width: none">
	<div class="row">
		<div class="col table-box">
			<h5><img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px"> 검진현황판</h5>
			<div class="container" style="padding: 30px">
				<table style="border: 0; width: 90%">
					<tr>
						<td>
							<div class="state-1">
								<img src="/asset/images/ico_health_list01.png" style="margin-right: 10px">
								<span style="margin-right: 5px">신규예약</span>
								<span id="newReservationNum"></span>
							</div>
						</td>
						<td>
							<div class="state-1">
								<img src="/asset/images/ico_health_list02.png" style="margin-right: 10px">
								<span style="margin-right: 5px">수진자</span>
								<span id="servedReservationNum"></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="state-1">
								<img src="/asset/images/ico_master_dash_list03.png" style="margin-right: 10px">
								<span style="margin-right: 5px">등록요청</span>
								<span id="requirePackageNum"></span>
							</div>
						</td>
						<td>
							<div class="state-1">
								<img src="/asset/images/ico_master_dash_list04.png" style="margin-right: 10px">
								<span style="margin-right: 5px">예약변경</span>
								<span id="changeReservationNum"></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="state-1">
								<img src="/asset/images/ico_master_dash_list06.png" style="margin-right: 10px">
								<span style="margin-right: 5px">문의사항</span>
								<span id="questionNum"></span>
							</div>
						</td>
						<td>
							<div class="state-1">
								<img src="/asset/images/ico_master_dash_list05.png" style="margin-right: 10px">
								<span style="margin-right: 5px">정산완료</span>
								<span id="completeNum"></span>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col table-box">
			<h5><img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px"> 공지사항 (예약 웹)</h5>
			<a href="/master/service_notice" class="all-menu" onclick="resetPaging()"> 전체보기 </a>
			<table id="noticeTable" class="table">
				<thead>
				<tr>
					<th style="width: 10%">NO</th>
					<th style="width: 60%">제목</th>
					<th>작성자</th>
					<th>등록일</th>
				</tr>
				</thead>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col table-box">
			<h5><img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px"> 담당자정보</h5>
			<a href="/master/company_list" class="all-menu"> 전체보기 </a>
			<table id="companyManagerTable" class="table">
				<thead>
				<tr>
					<th>고객사</th>
					<th>사업장</th>
					<th>이름</th>
					<th>연락처</th>
					<th>이메일</th>
				</tr>
				</thead>
			</table>
		</div>
		<div class="col table-box">
			<h5><img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px">운영일정</h5>
			<a href="/master/package_list" class="all-menu"> 전체보기 </a>
			<table id="manageScheduleTable" class="table">
				<thead>
				<tr>
					<th>병원</th>
					<th>고객사</th>
					<th>사업장</th>
					<th>오픈일</th>
					<th>마감일</th>
				</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
</body>
</html>


<script>

	//검진현황판
	instance.post('M002001_RES').then(res => {
		setStateData(res.data);
	});
	//공지사항
	instance.post('M002002_RES').then(res => {
		setNoticeData(res.data);
	});
	//담당자정보
	instance.post('M002003_RES').then(res => {
		setCompanyManagerData(res.data);
	});
	//운영일정
	instance.post('M002004_RES').then(res => {
		setManageScheduleData(res.data);
	});

	//검진현황판
	function setStateData(data) {
		 $("#newReservationNum").append(data.newReservationNum + "명");
		$("#servedReservationNum").append(data.servedReservationNum + "명");
		$("#completeNum").append(data.completeNum + "명");
		$("#requirePackageNum").append(data.requirePackageNum + "명");
		$("#changeReservationNum").append(data.changeReservationNum + "명");
		$("#issueNum").append(data.issueNum + "명");
		$("#questionNum").append(data.questionNum + "명");
	}

	//공지사항
	function setNoticeData(data) {
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td>' + (i+1) + '</td>';
			html += '<td class="title" onclick="sendNoticeID(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			html += '<td>' + data[i].author + '</td>';
			html += '<td>' + data[i].createDate.replace('9999', '2020') + '</td>';
			html += '</tr>';

			$("#noticeTable").append(html);
		}

		$('.title').width($('#noticeTable').width() * 0.6);
	}

	//공지 게시글 디테일에 값 던지기
	function sendNoticeID(index) {
		location.href = "/master/service_notice_detail?id=" + index;
	}

	//담당자정보
	function setCompanyManagerData(data) {
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td>' + data[i].companyName + '</td>';
			html += '<td>' + data[i].companyBranch + '</td>';
			html += '<td>' + data[i].name + '</td>';
			html += '<td>' + data[i].phone + '</td>';
			html += '<td>' + data[i].email + '</td>';
			html += '</tr>';

			$("#companyManagerTable").append(html);
		}
	}

	//운영일정
	function setManageScheduleData(data) {
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td>' + data[i].hospitalName + '</td>';
			html += '<td>' + data[i].companyName + '</td>';
			html += '<td>' + data[i].companyBranch + '</td>';
			html += '<td <td style="width: 15%">' + data[i].reservationStartDate + '</td>';
			html += '<td <td style="width: 15%">' + data[i].reservationEndDate + '</td>';
			html += '</tr>';

			$("#manageScheduleTable").append(html);
		}
	}

</script>
