<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.basic-table {
			font-size: 1.4rem !important;
		}

		select {
			width: 9rem !important;
			font-size: 1.3rem !important;
			margin-right: 0.2rem;
			padding: 0.2rem !important;
		}

		.basic-table .title {
			width: 60%;
			text-align: left;
			cursor: pointer;
		}

		.basic-table .title div {
			display: inline-block;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			vertical-align: middle !important;
		}

	</style>
</head>
<body>

<header>
	<?php
	require('common/header.php');
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
				<th>No</th>
				<th>제목</th>
				<th>작성일</th>
			</tr>
			</thead>
			<tbody id="noticeTable">
			</tbody>
		</table>
	</div>

	<div class="row" style="margin-top: 20px">
		<form style="margin: 0 auto; width: 85%; padding: 1rem">
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
	require('common/footer.php');
	?>
</footer>

</html>

<script>
	var pageCount = 0;
	var pageNum = 0;

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

		searchItems.coId = sessionStorage.getItem("userCoID");;
		searchItems.pageNum = pageNum;
		searchItems.title = $("#searchWord").val();
		searchItems.year = $("#ntYear option:selected").val();

		console.log(searchItems);

		instance.post('C0702', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}

			setNoticeListData(res.data.noticeDTOList, pageNum);
			console.log(res.data);
		});
	}

	<?php
	require('common/paging.js');
	?>

	//공지사항 테이블
	function setNoticeListData(data, index) {
		setPaging(index);

		$("#noticeTable").empty();

		if(data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="5">해당하는 검색 결과가 없습니다.</td>';
			html += '</tr>';
			$("#noticeTable").append(html);
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

			html += '<td class="title" ' +
				'onclick="sendNoticeID(\'' + data[i].id + '\')">' +
				'<div>' + data[i].title + '</div></td>';
			html += '<td>' + data[i].createDate + '</td>';

			html += '</tr>';

			$("#noticeTable").append(html);
		}

		var width = $('.basic-table').width() * 0.6;
		$('.basic-table .title div').width(width);
	}

	//공지 게시글 디테일에 값 던지기
	function sendNoticeID(index) {
		location.href = "notice_detail?id=" + index;
	}
</script>
