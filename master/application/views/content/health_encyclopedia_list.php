<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:질병백과</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
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
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>
<!--상단 네비바-->

<!--콘텐츠 내용-->
<div class="container" style="padding-top: 50px; max-width: none;">
	<div class="row">
		<form style="margin: 0 auto; width: 70%">
			<div class="menu-title" style="font-size: 22px">
				<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
				질병백과
			</div>

			<table id="encyclopediaInfos" class="table table-hover" style="margin-top: 20px">
				<thead>
				<tr>
					<th style="width: 8%">NO</th>
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
		<form style="margin: 0 auto; width: 70%">
			<a style="color: white" href="/master/health_encyclopedia_write">
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
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/paging.js');
	?>

	var pageCount = 0;
	var pageNum = 0;

	//로딩 되자마자 초기 셋팅
	searchInformation(0);

	//페이징-숫자클릭
	function searchInformation(index) {
		pageNum = index;
		drawTable();
	}

	function drawTable() {
		pageNum = parseInt(pageNum);
		var searchItems = new Object();
		searchItems.pageNum = pageNum;

		instance.post('M1701', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}

			setEncyclopediaListData(res.data.healthContentDTOList, pageNum);

		});
	}

	//질병백과 테이블
	function setEncyclopediaListData(data, index) {
		setPaging(index);

		$("#encyclopediaInfos > tbody").empty();

		if (data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="4">게시글이 없습니다.</td>';
			html += '</tr>';
			$("#encyclopediaInfos").append(html);
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
				no = index * 10 + (i + 1);
			}
			html += '<td>' + no + '</td>';

			html += '<td class="title" onclick="sendNoticeID(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			html += '<td>' + data[i].author + '</td>';
			html += '<td>' + data[i].createDate + '</td>';

			html += '</tr>';

			$("#encyclopediaInfos").append(html);
		}
	}

	//질병백과 게시글 디테일에 값 던지기
	function sendNoticeID(index) {
		location.href = "health_encyclopedia_detail?id=" + index;
	}
</script>
