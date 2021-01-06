<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:공지사항</title>

	<?php
	require('head.php');
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
	require('header.php');
	?>
</header>
<!--상단 네비바-->

<!--콘텐츠 내용-->
<div class="container" style="padding-top: 50px; max-width: none">
	<div class="row">
		<form style="margin: 0 auto; width: 85%">
			<div class="menu-title" style="font-size: 22px">
				<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
				공지사항
			</div>

			<div style="float:right; display: flex; flex-direction: row; align-items: center;margin-bottom: 10px">
				<select id="ntYear" class="form-control" style="width: 100px; margin-right: 3px"></select>
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
			<a style="color: white" href="/master/service_notice_write">
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

<!--체크박스 검사-->
<?php
require('check_data.php');
?>

<script>
	var pageCount = 0;
	var pageNum = 0;
	
	//검색항목리스트
	instance.post('M013001_RES').then(res => {
		setNoticeOption(res.data);
	});

	function enterKey() {
		if (window.event.keyCode == 13) {
			// 엔터키가 눌렸을 때 실행할 내용
			searchInformation(0);
		}
	}

	//검색 selector
	function setNoticeOption(data) {
		//연도
		for (i = 0; i < data.year.length; i++) {
			var html = '';
			html += '<option>' + data.year[i] + '</option>'
			$("#ntYear").append(html);
		}

		//로딩 되자마자 초기 셋팅
		searchInformation(0);
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
		var searchItems = new Object();

		searchItems.pageNum = pageNum;
		searchItems.title = $("#searchWord").val();
		searchItems.year = $("#ntYear option:selected").val();

		console.log(searchItems);

		instance.post('M013002_REQ_RES', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}

			setNoticeListData(res.data.noticeDTOList, pageNum);
			console.log(res.data);
		});
	}

	//페이징-화살표클릭
	function pmPageNum(val) {//화살표클릭
		pageNum = Math.floor(parseInt(val) / 10) * 10;
		if (pageNum < 0) pageNum = 0;
		if (pageCount <= pageNum) pageNum = pageCount - 1;
		drawTable();
	}

	//페이징
	function setPaging(index) {
		$("#paging").empty();

		var html = "";
		var pre = parseInt(index) - 1;
		if (pre < 0) {
			pre = 0;
		}
		html += '<a class="arrow pprev" onclick= "searchInformation(\'' + 0 + '\')" href="#"></a>'
		html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -10 + '\')" href="#"></a>'
		$("#paging").append(html);

		var start = index - Math.floor((index % 10)) + 1;

		for (i = start; i < (start + 10); i++) {
			var html = '';

			if ((i - 1) < pageCount) {
				if (i == index + 1) {
					html += '<a onclick= "searchInformation(\'' + (i - 1) + '\')" class="active">' + i + '</a>';
				} else {
					html += '<a onclick= "searchInformation(\'' + (i - 1) + '\')" href="#">' + i + '</a>';
				}
			}

			$("#paging").append(html);
		}

		var html = "";
		html += '<a class="arrow next" onclick= "pmPageNum(\'' + 10 + '\')" href="#"></a>'
		html += '<a class="arrow nnext" onclick= "searchInformation(\'' + (pageCount - 1) + '\')" href="#"></a>'
		$("#paging").append(html);
	}


	//공지사항 테이블
	function setNoticeListData(data, index) {
		setPaging(index);

		$("#noticeInfos > tbody").empty();

		if(data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="10">해당하는 검색 결과가 없습니다.</td>';
			html += '</tr>';
			$("#noticeInfos").append(html);
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
		location.href = "service_notice_detail?id=" + index;
	}


</script>
