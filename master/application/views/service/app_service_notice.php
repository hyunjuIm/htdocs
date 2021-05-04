<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:공지사항 (듀얼케어 앱)</title>

	<?php
	$parentDir = dirname(__DIR__ . 'views');
	require($parentDir . '/common/head.php');
	?>

	<style>
		.title {
			text-align: left;
			cursor: pointer;
		}
	</style>

</head>

<body>

<!--상단 네비바-->
<header>
	<?php
	$parentDir = dirname(__DIR__ . 'views');
	require($parentDir . '/common/header.php');
	?>
</header>
<!--상단 네비바-->

<!--콘텐츠 내용-->
<div class="container" style="padding-top: 50px; max-width: none">
	<div class="row">
		<form style="margin: 0 auto; width: 85%">
			<div class="menu-title" style="font-size: 22px">
				<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
				공지사항 (듀얼케어 앱)
			</div>

			<div style="float:right; display: flex; flex-direction: row; align-items: center;margin-bottom: 10px">
				<select id="ntYear" class="form-control" style="width: 120px; margin-right: 3px">
					<option value="all" selected>전체 연도</option>
				</select>
				<div class="search">
					<input type="text" id="searchWord" class="search-input" placeholder="제목으로 검색하세요" onkeyup="enterKey();">
					<div class="search-icon" onclick="searchInformation(0)"></div>
				</div>
			</div>

			<table id="noticeInfos" class="table table-hover" style="margin-top: 10px">
				<thead>
				<tr>
					<th style="width: 8%">NO</th>
					<th style="">대상</th>
					<th style="width: 50%">제목</th>
					<th style="width: 10%">작성자</th>
					<th style="width: 10%">등록일</th>
				</tr>
				</thead>
				<tbody align="center">
				</tbody>
			</table>
		</form>
	</div>

	<div class="row">
		<form style="margin: 0 auto; width: 85%">
			<a style="color: white" href="/master/app_service_notice_write">
				<div class="btn-purple-square" style="float:right">
					글쓰기
				</div>
			</a>
		</form>
	</div>

	<!--페이징-->
	<div class="row">
		<form style="margin: 0 auto; width: 85%; padding: 10px">
			<div class="page_wrap">
				<div class="page_nation" id="paging">
				</div>
			</div>
		</form>
	</div>
</div>
<!--콘텐츠 내용-->
</body>
</html>

<script>
	<?php
	$parentDir = dirname(__DIR__ . 'views');
	require($parentDir . '/common/check_data.js');
	?>
	<?php
	$parentDir = dirname(__DIR__ . 'views');
	require($parentDir . '/common/paging.js');
	?>

	var pageCount = 0;

	if (sessionStorage.getItem("pageNum") == null) {
		sessionStorage.setItem("pageNum", 0);
	}
	var pageNum = sessionStorage.getItem("pageNum");

	if (sessionStorage.getItem("searchWord") == null) {
		sessionStorage.setItem("searchWord", '');
	}
	var searchWord = sessionStorage.getItem("searchWord");
	$("#searchWord").val(searchWord);
	
	//검색항목리스트
	instance.post('M019001_RES').then(res => {
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

		searchItems.pageNum = pageNum;
		searchItems.title = $("#searchWord").val();
		sessionStorage.setItem("searchWord", searchItems.title);
		searchItems.year = $("#ntYear option:selected").val();

		instance.post('M019002_REQ_RES', searchItems).then(res => {
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

		$("#noticeInfos > tbody").empty();

		if(data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="20">해당하는 결과가 없습니다.</td>';
			html += '</tr>';
			$("#noticeInfos").append(html);
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

			html += '<td>' + data[i].target + '</td>';
			html += '<td class="title" onclick="sendNoticeID(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			html += '<td>' + data[i].author + '</td>';
			html += '<td>' + data[i].createDate + '</td>';

			html += '</tr>';

			$("#noticeInfos").append(html);
		}
	}

	//공지 게시글 디테일에 값 던지기
	function sendNoticeID(index) {
		location.href = "app_service_notice_detail?id=" + index;
	}

</script>
