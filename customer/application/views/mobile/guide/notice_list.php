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
	<div class="sub-title-height" style="background: url(../../../../asset/images/title4.jpg)">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">공지사항</span><br>
					편리한 이용을 위해<br>
					듀얼헬스케어의 정보를 확인해주세요.
				</div>
			</div>

			<div class="row">
				<?php
				$parentDir = dirname(__DIR__ . '..');
				require($parentDir . '/common/sub_drop_down.php');
				?>
			</div>

			<div class="row" style="display: block;margin-top: 5rem">
				<table class="notice-table" id="noticeTable">
					<thead>
					<tr>
						<th width="10px">NO</th>
						<th>제목</th>
						<th>작성일</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>

			<div class="row" style="margin: 3rem 0">
				<form style="margin: 0 auto; width: 85%; padding: 1rem">
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
					<div class="search-btn" onclick="searchNoticeData(0)">
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

	var pagingNum = 0;
	var pageCount = 0;
	var searchWord = "";

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	userData.pagingNum = pagingNum;
	userData.searchWord = searchWord;

	searchNoticeData(0);

	//검색 - 엔터키
	function enterKey() {
		if (window.event.keyCode == 13) {
			// 엔터키가 눌렸을 때 실행할 내용
			searchNoticeData(0);
		}
	}

	//공지 검색
	function searchNoticeData(index) {
		pagingNum = index;

		userData.pagingNum = pagingNum;
		userData.searchWord = $("#searchWord").val();

		console.log(userData);

		instance.post('CU_007_001', userData).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setNoticeList(res.data.noticeList);
		}).catch(function (error) {
			alert("잘못된 접근입니다.")
			console.log(error);
		});
	}

	//공지 테이블 셋팅
	function setNoticeList(data) {
		console.log(data);

		$("#paging").empty();
		$("#noticeTable > tbody").empty();

		var html = "";
		var pre = pagingNum - 1;
		if (pre < 0) {
			pre = 0;
		}
		html += '<a class="arrow pprev" onclick= "searchNoticeData(\'' + 0 + '\')" href="#"></a>'
		html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -1 + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < pageCount; i++) {
			var html = '';

			var num = i + 1;

			if (i == pagingNum) {
				html += '<a onclick= "searchNoticeData(\'' + i + '\')" class="active">' + num + '</a>';
			} else {
				html += '<a onclick= "searchNoticeData(\'' + i + '\')" href="#">' + num + '</a>';
			}

			$("#paging").append(html);
		}

		var html = "";
		html += '<a class="arrow next" onclick= "pmPageNum(\'' + 1 + '\')" href="#"></a>'
		html += '<a class="arrow nnext" onclick= "searchNoticeData(\'' + (pageCount - 1) + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < data.length; i++) {
			var tbody = "";
			tbody += '<tr>' +
					'<td>' + data[i].id + '</td>' +
					'<td class="title" onclick="detailNoticePage(\'' + data[i].id + '\')">' + data[i].title + '</td>' +
					'<td>' + data[i].createDate + '</td>' +
					'<tr>';

			$("#noticeTable").append(tbody);
		}

		//테이블 제목 가로 사이즈 계산
		$('.notice-table .title').css('width', $('.notice-table').width() - $('.notice-table .title').width() - 10);
	}

	//다음 페이지에 공지 id 값 넘기기
	function detailNoticePage(noticeId) {
		location.href = "notice_detail?noticeId=" + noticeId;
	}

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/paging.js');
	?>

</script>

</html>
