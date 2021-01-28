<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:내 문의 내역</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<style>
		.inquiry-table {
			width: 100%;
			border-top: 2px black solid;
		}

		.inquiry-table th {
			padding: 1.3rem;
			font-weight: 500;
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
			vertical-align: middle;
		}

		.inquiry-table td:last-child {
			font-weight: bold;
		}

		.inquiry-table .title {
			display: block;
			width: 170px;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			text-align: left;
		}

		.modal-body {
			font-size: 1.5rem !important;
			padding: 2rem;
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
			padding: 0 1rem;
			color: #3529b1;
			font-size: 5.5rem;
		}

		#question-content, #answer-content {
			white-space: pre-wrap;
		}

		#ready {
			display: none;
			width: 100%;
			padding: 3rem 0;
			background: whitesmoke;
			text-align: center;
			font-size: 1.4rem;
		}
	</style>

</head>
<body>

<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/menu/side.php');
	?>
</header>

<div id="main">
	<div class="sub-title-height"
		 style="background-image: url(../../../../asset/images/mobile/bg_sub5.jpg);
		 background-size: 100%;">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">고객센터</span><br>
					듀얼헬스케어는 항상<br>
					고객의 소리에 귀 기울이겠습니다.
				</div>
			</div>

			<div class="row" style="position: relative">
				<?php
				$parentDir = dirname(__DIR__ . '..');
				require($parentDir . '/common/sub_drop_down.php');
				?>
			</div>

			<!--본문-->
			<div class="row" style="display: block;margin-top: 9rem">
				<img src="/asset/images/mobile/icon_sub_title_bar.png">
				<h1>내 문의 내역</h1>
			</div>

			<div class="row" style="display: block;margin-top: 5rem">
				<table class="inquiry-table" id="inquiryTable">
					<thead>
					<tr>
						<th>제목</th>
						<th>작성일</th>
						<th>상태</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>

			<?php
			require('inquiry_modal.php');
			?>

			<div class="row" style="margin: 3rem 0">
				<form style="margin: 0 auto; padding: 1rem 0">
				<div class="page_wrap">
						<div class="page_nation" id="paging">
						</div>
					</div>
				</form>
			</div>
		</div>

		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/common/footer.php');
		?>

	</div>

</body>

<script>
	$('#menu1 .nav-button').text('고객센터');
	var menu2 = '내 문의 내역';

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/sub_drop_down.js');
	?>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/paging.js');
	?>

	var pageNum = 0;
	var pageCount = 0;

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	userData.pagingNum = pageNum;

	searchInformation(0);

	//페이징-숫자클릭
	function searchInformation(index) {
		pageNum = index;
		drawTable();
	}

	//문의 내역 가져오기
	function drawTable() {
		pageNum = parseInt(pageNum);
		userData.pagingNum = pageNum;

		instance.post('CU_008_001', userData).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setInquiryList(res.data.qnADTOList, pageNum);
		}).catch(function (error) {
			alert("잘못된 접근입니다.")
		});
	}

	function setInquiryList(data, index) {
		setPaging(index);

		$("#inquiryTable > tbody").empty();

		if (data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="3">문의 내역이 없습니다.</td>';
			html += '</tr>';
			$("#inquiryTable > tbody").append(html);
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var tbody = "";
			tbody += '<tr>' +
					'<td class="title" data-toggle="modal" data-target="#inquiryDetailModal"' +
					' onclick="detailInquiryPage(\'' + data[i].qnaId + '\', \'' + data[i].status + '\')">' + data[i].title + '</td>' +
					'<td>' + data[i].createDate.replaceAll('-','.') + '</td>';
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
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/paging.js');
	?>

</script>

</html>
