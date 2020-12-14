<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:내 문의 내역</title>

	<?php
	require('head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		.inquiry-table {
			width: 100%;
			font-size: 1.7rem;
			border-top: 2px black solid;
		}

		.inquiry-table th {
			padding: 1.6rem;
			font-weight: bolder;
		}

		.inquiry-table tbody {
			border-top: 1px black solid;
		}

		.inquiry-table tbody tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.inquiry-table tbody tr:hover {
			background: #f1f1f1;
		}

		.inquiry-table td {
			padding: 1.3rem;
		}

		.inquiry-table .title {
			cursor: pointer;
			text-align: left;
			padding: 0 4rem;
		}

		.modal-body {
			font-size: 1.5rem !important;
			padding: 3rem;
		}

		.qna-table {
			text-align: left;
			font-size: 1.6rem;
		}

		.qna-table td {
			height: fit-content;
			padding: 0.1rem;
		}

		.qna-table .title {
			width: 7%;
			text-align: center;
			vertical-align: top;
			font-weight: bold;
			line-height: 4rem;
			padding: 0 2rem;
			color: #3529b1;
			font-size: 5.5rem;
		}

		#question-content, #answer-content {
			white-space: pre-wrap;
		}
	</style>

</head>
<body>

<header>
	<?php
	require('header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		require('side_bar_light.php');
		?>

		<!-- 우측 컨텐츠 -->
		<div class="col"
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
			<div style="height:100vh; overflow-y: scroll;min-height: 90rem;">
				<!-- 상단 메뉴 -->
				<div class="container top-menu"
					 style="background-image: url(../../asset/images/title5.jpg)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>고객센터</span>
							<span>｜</span>
							<span>내 문의 내역</span>
						</div>
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner " style="margin: 0 auto; ">
							<span class="title">고객센터<br></span>
							Customer Center
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="/customer/customer_service_faq">
								<div class="title-menu" style="border-right: #828282 1px solid">
									자주 묻는 질문
								</div>
							</a>
							<a href="/customer/customer_service_one_inquiry">
								<div class="title-menu" style="border-right: #828282 1px solid">
									1:1 문의
								</div>
							</a>
							<a href="#">
								<div class="title-menu-select">
									내 문의 내역
								</div>
							</a>
						</div>
					</div>
				</div>


				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="padding-top: 3rem">
							<div class="sub-title">내 문의 내역</div>
						</div>
						<div class="row" style="display: block;margin-top: 6rem">
							<table class="inquiry-table" id="inquiryTable">
								<thead>
								<tr>
									<th>NO</th>
									<th width="53%">제목</th width="50%">
									<th>작성일</th>
									<th>답변일</th>
									<th>상태</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
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
				</div>
			</div>
		</div>
	</div>
</div>

<?php
require('inquiry_modal.php');
?>

</body>

<script>
	var pagingNum = 0;
	var pageCount = 0;

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	userData.pagingNum = pagingNum;

	getInquiryList(0);

	//문의 내역 가져오기
	function getInquiryList(index) {
		pagingNum = index;
		userData.pagingNum = pagingNum;

		instance.post('CU_008_001', userData).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setInquiryList(res.data.qnADTOList);
		}).catch(function (error) {
			alert("잘못된 접근입니다.")
		});
	}

	function setInquiryList(data) {
		$("#paging").empty();
		$("#inquiryTable > tbody").empty();

		var html = "";
		var pre = pagingNum - 1;
		if (pre < 0) {
			pre = 0;
		}
		html += '<a class="arrow pprev" onclick= "getInquiryList(\'' + 0 + '\')" href="#"></a>'
		html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -1 + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < pageCount; i++) {
			var html = '';

			var num = i + 1;

			if (i == pagingNum) {
				html += '<a onclick= "getInquiryList(\'' + i + '\')" class="active">' + num + '</a>';
			} else {
				html += '<a onclick= "getInquiryList(\'' + i + '\')" href="#">' + num + '</a>';
			}

			$("#paging").append(html);
		}

		var html = "";
		html += '<a class="arrow next" onclick= "pmPageNum(\'' + 1 + '\')" href="#"></a>'
		html += '<a class="arrow nnext" onclick= "getInquiryList(\'' + (pageCount - 1) + '\')" href="#"></a>'
		$("#paging").append(html);

		if (data.length == 0) {
			var tbody = "";
			tbody += '<tr><td colspan="5">문의 내역이 없습니다.</td></tr>';
			$("#inquiryTable").append(tbody);
		}

		for (i = 0; i < data.length; i++) {
			var tbody = "";
			tbody += '<tr>' +
					'<td>' + data[i].qnaId + '</td>' +
					'<td class="title" data-toggle="modal" data-target="#inquiryDetailModal" onclick="detailInquiryPage(\'' + data[i].qnaId + '\', \'' + data[i].status + '\')">' + data[i].title + '</td>' +
					'<td>' + data[i].createDate + '</td>' +
					'<td>' + data[i].answeredDate + '</td>';
			if (data[i].status) {
				tbody += '<td style="color: #5849ea">답변완료</td>';
			} else {
				tbody += '<td style="color: grey">답변대기</td>';
			}
			tbody += '<tr>';

			$("#inquiryTable").append(tbody);
		}
	}

	<?php
	require('paging.js');
	?>

</script>

</html>
