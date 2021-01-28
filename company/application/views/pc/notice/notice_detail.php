<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>
		.basic-table th {
			background: #f3f3f3;
		}

		.basic-table td {
			text-align: left;
		}

		.basic-table tbody tr:hover {
			background: white;
		}

		.notice-box {
			display: block;
			text-align: center;
		}

		.notice-box .title {
			font-size: 3.5rem;
			font-weight: 400;
			color: #3529b1;
		}

		.notice-box .date {
			color: grey;
			font-weight: 400;
		}

		.notice-box .content {
			display: block;
			border-top: 2px solid black;
			border-bottom: 1px solid #DCDCDC;
			padding: 5rem 2rem;
			text-align: left;
			background: white;
		}

		.notice-box .file {
			display: block;
			border-bottom: 1px solid grey;
			padding: 1rem 2rem;
			text-align: left;
			font-size: 1.5rem;
			background: white;
		}

		.notice-box #ntFile {
			font-size: 1.4rem;
			cursor: pointer;
			font-weight: 400;
		}

		.notice-box #ntFile:hover {
			color: #5645ed;
			text-decoration: underline;
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
	<div class="container" style="width:67%;margin: 0 auto">
		<div class="row notice-box">

			<div class="row" style="display: block;padding: 2rem 0 5rem 0">
				<div class="title" id="ntTitle"></div>
				<div class="date" id="ntDate"></div>
			</div>

			<div class="row content" id="ntContent"></div>

			<div class="row file">
				첨부파일 :
				<span id="ntFile" onclick="downloadFile()"></span>
			</div>
		</div>

		<div class="row" style="margin: 7rem 0">
			<div style="margin: 0 auto;width: fit-content">
				<div class="btn-white-square" onclick="location.href='/company/notice_list'">목록으로</div>
			</div>
		</div>
	</div>
</body>
</html>

<script>
	//상단바 선택된 메뉴
	$('#noticeMenu').addClass('active');
	$('#noticeMenu').before('<div class="menu-select-line"></div>');

	$('#loading').hide();

	var pageCount = 0;
	var pageNum = 0;

	//nID 값 받기
	var nId = new Object();
	$(document).ready(function () {
		var val = location.href.substr(
				location.href.lastIndexOf('=') + 1
		);
		nId.id = val;

		instance.post('C0703', nId).then(res => {
			setNoticeDetailData(res.data);
		});
	})

	var fileName;
	function setNoticeDetailData(data){
		console.log(data);
		$('#ntTitle').text(data.title);
		$('#ntDate').text(data.createDate);

		$('#ntFile').text(data.fileName);
		fileName = data.fileName;

		var str = data.content;
		str = str.replace(/(?:\r\n|\r|\n)/g, '<br />');
		$('#ntContent').html(str);

		console.log(data.content);
	}

	//파일 다운로드
	function downloadFile() {
		var sendItems = new Object();
		sendItems.id = nId.id;

		instance.post('C0704', sendItems,{
			responseType: 'arraybuffer',
			headers: {
				'Content-Type': 'application/json'
			}
		}).then(response => {
			console.log(response);
			const type = response.headers['content-type'];
			const blob = new Blob([response.data], {type: type, encoding: 'UTF-8'});
			const link = document.createElement('a');
			link.href = window.URL.createObjectURL(blob);
			link.download = fileName;
			link.click();
		})
	}
</script>

