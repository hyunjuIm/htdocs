<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:카드뉴스</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>
		.title {
			text-align: left;
			cursor: pointer;
		}

		.card-table {
			width: 100%;
			border: none;
		}

		.card-table td {
			width: 20%;
			min-width: 20%;
			max-width: 20%;
			padding: 5px;
		}

		.card {
			cursor: pointer;
		}

		.card img {
			width: 100%;
			height: 200px;
			object-fit: cover;
		}

		.card:hover {
			box-shadow: 0px 0px 20px #d3d2d5;
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
<div class="container" style="width: 75%;padding: 50px; max-width: none;">
	<div class="row">
		<div class="menu-title" style="font-size: 22px">
			<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
			카드뉴스
		</div>
		<table id="cardNewsInfos" class="card-table" style="margin-top: 20px">
			<tbody>
			</tbody>
		</table>
	</div>

	<div class="row" style="display: block">
		<a style="color: white;float: right" href="/master/card_news_write">
			<div class="btn-purple-square" style="float:right">
				글쓰기
			</div>
		</a>
	</div>

	<!--페이징-->
	<div class="row" style="padding-top: 50px;display: block">
		<div class="page_wrap" style="margin: 0 auto;">
			<div class="page_nation" id="paging">
			</div>
		</div>
	</div>
</div>

<?php
require('card_news_modal.php');
?>


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

	if (sessionStorage.getItem("pageNum") == null) {
		sessionStorage.setItem("pageNum", 0);
	}
	var pageNum = sessionStorage.getItem("pageNum");

	//로딩 되자마자 초기 셋팅
	searchInformation(pageNum);

	//페이징-숫자클릭
	function searchInformation(index) {
		pageNum = index;
		drawTable();
	}

	function drawTable() {
		pageNum = parseInt(pageNum);
		sessionStorage.setItem("pageNum", pageNum);

		var searchItems = new Object();
		searchItems.page = pageNum;

		fileURL.post('content/readAllCardNews', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setCardNewsListData(res.data.cardNewsList, pageNum);
		});
	}

	//카드뉴스 테이블
	function setCardNewsListData(data, index) {
		setPaging(index);

		$("#cardNewsInfos > tbody").empty();

		if (data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="4">게시글이 없습니다.</td>';
			html += '</tr>';
			$("#cardNewsInfos").append(html);
			$("#paging").empty();
			return false;
		}

		var html = '';
		for (i = 0; i < data.length; i++) {
			var img = 'https://file.dualhealth.kr/healthContent/cardNews/' + data[i].thumbNail;

			if (i % 5 == 0) {
				html += '<tr>';
			}
			html += '<td>' +
					'<div class="card" data-toggle="modal" data-target="#staticBackdrop" onclick="detailCardNews(\'' + data[i].id + '\')">' +
					'<img src="' + img + '" class="card-img-top">' +
					'<div class="card-body">' +
					'<h5 class="card-title">' + data[i].title + '</h5>' +
					'</div>' +
					'</div>' +
					'</td>';

			if (i % 5 == 4) {
				html += '</tr>';
			} else if (i == (data.length - 1)) {
				for (j = 0; j < 5 - (data.length % 5); j++) {
					html += '<td></td>';
				}
				html += '</tr>';
			}
		}

		$("#cardNewsInfos tbody").append(html);
	}

	//카드뉴스 게시글 디테일에 값 던지기
	function sendCardNewsID(index) {
		location.href = "card_news_detail?id=" + index;
	}
</script>
