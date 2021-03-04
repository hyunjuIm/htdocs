<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>
		.basic-table .title {
			text-align: left;
			cursor: pointer;
		}

		.basic-table .title:hover {
			color: grey;
		}

		select {
			font-size: 1.4rem !important;
			margin-right: 0.3rem;
		}

		.search-form {
			float: right;
		}
	</style>
</head>
<body>

<!--상단 메뉴-->
<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>

<!--콘텐츠 내용-->

<div class="main">
	<div class="container" style="width:75%;margin: 0 auto">
		<div class="row">
			<div class="box-title">
				<img src="/asset/images/icon_title.png">
				<h2 style="font-weight: 300;font-size: 2.3rem">공지사항</h2>
			</div>
		</div>

		<div class="row" style="display: block">
			<div class="search-form" style="padding-bottom: 0.7rem">
				<div class="select-list">
					<select id="ntYear">
						<option value="all" selected>전체 연도</option>
					</select>
				</div>
				<div class="input-text">
					<input type="text" placeholder="제목으로 검색하세요." id="searchWord" onkeyup="enterKey()">
					<img src="/asset/images/icon_search.png" onclick="searchInformation(0)">
				</div>
			</div>
		</div>

		<div class="row" style="display: block;">
			<table class="basic-table">
				<thead>
				<tr>
					<th width="8%">NO</th>
					<th width="60%">제목</th>
					<th>작성자</th>
					<th width="12%">작성일</th>
				</tr>
				</thead>
				<tbody id="noticeTable">

				</tbody>
			</table>
		</div>

		<div class="row" style="margin-top: 5rem">
			<form style="margin: 0 auto; padding: 1rem 0">
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
	$('#noticeMenu').addClass('active');
	$('#noticeMenu').before('<div class="menu-select-line"></div>');

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
		if($("#searchWord").val().length == 1) {
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

		searchItems.coId = sessionStorage.getItem("userCoID");;
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

		if(data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="20">해당하는 결과가 없습니다.</td>';
			html += '</tr>';
			$("#noticeTable").append(html);
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';

			var no = 0;
			if (index == 0) {
				no = (index + 1) + i;
			} else {
				no = index * 10 + (i+1);
			}
			html += '<td>' + no + '</td>';

			html += '<td class="title" onclick="sendNoticeID(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			html += '<td>' + data[i].author + '</td>';
			html += '<td>' + data[i].createDate + '</td>';

			html += '</tr>';

			$("#noticeTable").append(html);
		}
	}

	//공지 게시글 디테일에 값 던지기
	function sendNoticeID(index) {
		location.href = "notice_detail?id=" + index;
	}

</script>

