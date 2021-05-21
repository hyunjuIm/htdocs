<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:동영상</title>

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
			margin: 20px 0;
			border-top: 1px solid #DCDCDC;
		}

		.card-table tr {
			border-bottom: 1px solid #DCDCDC;
		}

		.card-table tr:hover {
			background: #efefef;
		}

		.card-table td {
			width: 100%;
			padding: 10px;
			vertical-align: center !important;
		}

		.video-card {
			display: flex;
		}

		.video-card .title {
			cursor: pointer;
		}

		.video-card .title:hover {
			color: #3529b1;
			text-decoration: underline;
		}

		.video-card img {
			width: 200px;
			height: auto;
			max-width: 200px;
			min-width: 200px;
			margin-right: 10px;
		}

		.badge {
			font-size: 13px;
			font-weight: 300;
			cursor: pointer;
		}

		.badge:hover {
			box-shadow: 0px 0px 3px #ff0000;
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
			동영상
		</div>

		<table id="videoInfos" class="card-table">
			<tbody>

			</tbody>
		</table>
	</div>

	<div class="row" style="display: block">
		<div class="btn-purple-square" data-toggle="modal" data-target="#createVideoModal"
			 style="color: white;float:right">
			글쓰기
		</div>
	</div>

	<!--페이징-->
	<div class="row" style="padding-top: 50px;display: block">
		<div class="page_wrap" style="margin: 0 auto;">
			<div class="page_nation" id="paging">
			</div>
		</div>
	</div>

</div>
<!--콘텐츠 내용-->

<?php
require('video_modal.php');
?>

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

		fileURL.post('content/readAllYouTube', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setVideoListData(res.data.youTubeList, pageNum);
		});
	}

	//동영상 테이블
	function setVideoListData(data, index) {
		setPaging(index);

		$("#videoInfos > tbody").empty();

		if (data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="4">게시글이 없습니다.</td>';
			html += '</tr>';
			$("#videoInfos").append(html);
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			var src = 'https://img.youtube.com/vi/' + getParameterByName(data[i].url, 'v') + '/original.jpg'

			html += '<tr>' +
					'<td>' +
					'<div class="video-card">' +
					'<img src=' + src + '>' +
					'<div style="text-align: left">' +
					'<div style="font-size: 25px">' +
					'<span class="title" onclick="location.href=\'' + data[i].url + '\'">' + data[i].title + '</span>&nbsp;' +
					'<span class="badge badge-danger" onclick="deleteVideo(\'' + data[i].id + '\')">삭제</span>' +
					'</div>' +
					'<div style="font-size: 15px">' +
					'태그 : ' + data[i].hashTags.join(", ") + '</span>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</td>' +
					'</tr>'

			$("#videoInfos").append(html);
		}
	}

	function deleteVideo(id) {
		var searchItems = new Object();
		searchItems.id = id;

		if (confirm("삭제하시겠습니까?") == true) {
			fileURL.post('content/deleteYouTube', searchItems).then(res => {
				if (res.data.message == "Success") {
					alert("삭제되었습니다.");
					location.reload();
				}
			});
		} else {
			return false;
		}
	}

</script>
