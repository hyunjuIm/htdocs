<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:공지사항</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<style>
		.notice-table {
			width: 100%;
			border-top: 2px black solid;
		}

		.notice-table th {
			padding: 1.3rem;
			font-weight: 500;
		}

		.notice-table tbody {
			border-top: 1px black solid;
		}

		.notice-table tbody tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.notice-table tbody tr:hover {
			background: #f1f1f1;
		}

		.notice-table td {
			padding: 1.3rem;
			vertical-align: middle;
		}

		.notice-table .title {
			display: block;
			width: 170px;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			text-align: left;
		}

		.btn {
			font-size: 1.1rem;
			padding: 0.1rem 0.5rem;
			cursor: default !important;
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
		 style="background-image: url(../../../../asset/images/mobile/bg_sub4.jpg);
		 background-size: 100%;background-position: center">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">이용안내</span><br>
					편리한 이용을 위해<br>
					듀얼헬스케어의 정보를 확인해주세요.
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
				<h1>공지사항</h1>
			</div>

			<div class="row" style="display: block;margin-top: 5rem">
				<table class="notice-table" id="noticeTable">
					<thead>
					<tr>
						<th width="5px">NO</th>
						<th>제목</th>
						<th>작성일</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>

			<div class="row" style="margin: 3rem 0">
				<form style="margin: 0 auto; padding: 1rem 0">
				<div class="page_wrap">
						<div class="page_nation" id="paging">
						</div>
					</div>
				</form>
			</div>

			<hr>

			<div class="row" style="margin-top: 3rem">
				<div style="display: flex; margin: 0 auto;width: 80%">
					<input type="text" id="searchWord" class="search-input" placeholder="검색어를 입력하세요"
						   onkeyup="enterKey()">
					<div class="search-btn" onclick="searchInformation(0)">
						<img src="/asset/images/icon_search.png" width="50%">
					</div>
				</div>
			</div>
		</div>

		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/common/footer.php');
		?>
	</div>

</div>

</body>

<script>
	$('#menu1 .nav-button').text('이용안내');
	var menu2 = '공지사항';

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

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
	userData.pageNum = pageNum;

	searchInformation(0);

	//페이징-숫자클릭
	function searchInformation(index) {
		if ($("#searchWord").val().length == 1) {
			alert('두 글자 이상 검색어로 입력주세요.');
			return false;
		}

		pageNum = index;
		drawTable();
	}

	//공지 검색
	function drawTable() {
		pageNum = parseInt(pageNum);

		userData.pageNum = pageNum;
		userData.searchWord = $("#searchWord").val();

		instance.post('CU_007_001', userData).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setNoticeList(res.data.noticeList, pageNum);

		}).catch(function (error) {
			alert("잘못된 접근입니다.")

		});
	}

	//공지 테이블 셋팅
	function setNoticeList(data, index) {
		setPaging(index);

		$("#noticeTable > tbody").empty();

		if (data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="20">해당하는 결과가 없습니다.</td>';
			html += '</tr>';
			$("#noticeTable > tbody").append(html);
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var no = 0;
			if (index == 0) {
				no = index + i;
			} else {
				no = index * 10 + (i + 1);
			}

			var tbody = "";
			if (i == 0 && pageNum == 0) {
				tbody += '<tr style="background: #fdf7f7">' +
						'<td><div class="btn btn-danger">공지</div></td>' +
						'<td class="title" style="color: #ff4e59;font-weight: 400;"' +
						'onclick="detailNoticePage(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			} else {
				tbody += '<tr>' +
						'<td>' + no + '</td>' +
						'<td class="title" onclick="detailNoticePage(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			}
			if (data[i].createDate.indexOf('9999') != -1) {
				tbody += '<td class="date">2020.12.22</td>';
			} else {
				tbody += '<td class="date">' + data[i].createDate.replaceAll('-', '.') + '</td>';
			}
			tbody += '<tr>';

			$("#noticeTable").append(tbody);
		}

		//테이블 제목 가로 사이즈 계산
		$('.notice-table .title').css('width', $('.notice-table').width() - $('.notice-table .title').width() - 10);
	}

	//다음 페이지에 공지 id 값 넘기기
	function detailNoticePage(noticeId) {
		location.href = "notice_detail?noticeId=" + noticeId;
	}

</script>

</html>
