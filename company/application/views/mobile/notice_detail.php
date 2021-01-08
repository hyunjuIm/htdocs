<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
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
			font-size: 2.5rem;
			font-weight: 400;
			color: #3529b1;
		}

		.notice-box .date {
			color: grey;
			font-size: 1.4rem;
			font-weight: 400;
		}

		.notice-box .content {
			display: block;
			border-top: 2px solid black;
			border-bottom: 1px solid #DCDCDC;
			padding: 3rem 2rem;
			text-align: left;
			background: white;
			font-size: 1.5rem;
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

		.btn {
			font-size: 1.4rem;
			font-weight: 300;
			padding: 0.5rem 3rem ;
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

	<div class="row" style="margin: 5rem 0">
		<div style="margin: 0 auto;width: fit-content">
			<div class="btn btn-dark" onclick="location.href='/m/notice_list'">목록으로</div>
		</div>
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
