<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>
		.basic-table {
			max-width: 100%;
			font-size: 1.4rem !important;
		}

		select {
			width: 9rem !important;
			font-size: 1.3rem !important;
			margin-right: 0.2rem;
			padding: 0.2rem !important;
		}

		.basic-table td {
			padding: ;
		}

		.basic-table .title {
			display: block;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			text-align: left;
			padding-left: 1.5rem;
		}

		.basic-table .date {
			font-size: 1.2rem;
			color: #adadad;
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
			<h2>공지사항</h2>
		</div>
	</div>

	<div class="row" style="margin-top: 20px">
		<div class="search-form">
			<div class="select-list">
				<select id="ntYear">
					<option value="all" selected>전체 연도</option>
				</select>
			</div>
			<div class="input-text">
				<input type="text" placeholder="사원번호, 이름으로 검색하세요." id="searchWord" onkeyup="enterKey()">
				<img src="/asset/images/icon_search.png" onclick="searchInformation(0)">
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 10px">
		<table class="basic-table">
			<thead>
			<tr>
				<th>제목</th>
				<th>작성일</th>
			</tr>
			</thead>
			<tbody id="noticeTable">
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

	if (sessionStorage.getItem("pageNum") == null) {
		sessionStorage.setItem("pageNum", 0);
	}
	var pageNum = sessionStorage.getItem("pageNum");

	//검색항목리스트
	instance.post('C0701').then(res => {
		setNoticeOption(res.data);
	});

	//검색 selector
	function setNoticeOption(data) {
		//연도
		for (i = 0; i < data.year.length; i++) {
			var html = '';
			html += '<option>' + data.year[i] + '</option>'
			$("#ntYear").append(html);
		}

		//로딩 되자마자 초기 셋팅
		searchInformation(pageNum);
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

	function drawTable() {
		pageNum = parseInt(pageNum);
		sessionStorage.setItem("pageNum", pageNum);

		var searchItems = new Object();

		searchItems.coId = sessionStorage.getItem("userCoID");
		;
		searchItems.pageNum = pageNum;
		searchItems.title = $("#searchWord").val();
		searchItems.year = $("#ntYear option:selected").val();



		instance.post('C0702', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}

			setNoticeListData(res.data.noticeDTOList, pageNum);

		});
	}

	//공지사항 테이블
	function setNoticeListData(data, index) {
		setPaging(index);

		$("#noticeTable").empty();

		if (data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="20">해당하는 결과가 없습니다.</td>';
			html += '</tr>';
			$("#noticeTable").append(html);
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td class="title" onclick="sendNoticeID(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			html += '<td class="date">' + data[i].createDate.replaceAll('-', '.') + '</td>';
			html += '</tr>';

			$("#noticeTable").append(html);
		}

		$('.title').width($('#noticeTable').width() * 0.6);
	}

	//공지 게시글 디테일에 값 던지기
	function sendNoticeID(index) {
		location.href = "notice_detail?id=" + index;
	}
</script>
