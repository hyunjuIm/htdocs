<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:건강컨텐츠</title>

	<?php
	require('head.php');
	?>

	<style>
		.health-content {
			width: 100%;
			margin: 0 auto;
			background: white;
			word-break: normal;
			padding: 2rem;
		}

		#title {
			text-align: left;
			padding: 40px 0 10px 0;
		}

		.health-content img {
			width: 100%;
			height: auto;
		}

		.health-content .row {
			width: 100%;
			margin: 0 auto;
			display: block;
		}

		.health-content .border-line {
			border-bottom: 1px solid #DCDCDC;
			padding: 1.5rem 0;
		}

		.health-content .title {
			font-weight: 400;
			font-size: 2rem;
			padding: 1rem 0;
			text-align: left;
		}

		.health-content .title span {
			color: #5645ED;
		}

		.health-content .content {
			font-size: 1.5rem;
			text-align: left;
		}

		table {
			line-height: normal;
			font-size: 1.5rem;
		}

		th {
			background: whitesmoke;
			width: 10%;
			vertical-align: middle !important;
			font-weight: 400;
			text-align: center;
		}

		td {
			text-align: left;
			width: 40%;
			padding: 1.5rem !important;
		}
	</style>

</head>
<body>

<header>
	<?php
	require('header.php');
	?>
</header>

<div class="row" style="padding: 5.8rem 0">
	<div class="health-content">
		<div class="row">
			<img id="mainImg" src="https://file.dualhealth.kr/healthContent/images/59_image.jpg">
		</div>
		<div class="row" style="border-bottom: 1px solid grey;">
			<h1 id="title"></h1>
		</div>
		<div class="row border-line">
			<div class="title"><span>01</span> 정의</div>
			<div class="content" id="content1">

			</div>
		</div>
		<div class="row border-line">
			<div class="title"><span>02</span> 진단방법</div>
			<div class="content" id="content2">

			</div>
		</div>
		<div class="row border-line">
			<div class="title"><span>03</span> 원인</div>
			<div class="content" id="content3">

			</div>
		</div>
		<div class="row border-line">
			<div class="title"><span>04</span> 증상</div>
			<div class="content" id="content4">

			</div>
		</div>
		<div class="row border-line">
			<div class="title"><span>05</span> 치료법</div>
			<div class="content" id="content5">

			</div>
		</div>
		<div class="row border-line">
			<div class="title"><span>06</span> 식이방법</div>
			<table class="table table-bordered" style="font-size: 15px !important;">
				<tr>
					<th>권장</th>
				</tr>
				<tr>
					<td id="content61"></td>
				</tr>
				<tr>
					<th>주의</th>
				</tr>
				<tr>
					<td id="content62"></td>
				</tr>
			</table>
		</div>
		<div class="row border-line">
			<div class="title"><span>07</span> 운동방법</div>
			<div class="content" id="content7">

			</div>
		</div>
	</div>
</div>

<script>
	
	$('#topTitle').text('질병백과');
	
	//ID 값 받기
	var BoardId = new Object();
	$(document).ready(function () {
		var val = location.href.substr(
				location.href.lastIndexOf('=') + 1
		);
		BoardId.id = val;

		instance.post('CU0902', BoardId).then(res => {
			setEncyclopediaDetailData(res.data);
		});
	})

	function setEncyclopediaDetailData(data) {
		$('#mainImg').attr('src', 'https://file.dualhealth.kr/healthContent/images/' + data.fileName);
		$('#title').text(data.title);
		$('#content1').html(textareaLine(data.content1));
		$('#content2').html(textareaLine(data.content2));
		$('#content3').html(textareaLine(data.content3));
		$('#content4').html(textareaLine(data.content4));
		$('#content5').html(textareaLine(data.content5));
		$('#content61').html(textareaLine(data.content61));
		$('#content62').html(textareaLine(data.content62));
		$('#content7').html(textareaLine(data.content7));
	}

	//textarea 줄바꿈 처리
	function textareaLine(text) {
		text = text.replace(/(?:\r\n|\r|\n)/g, '<br />');
		return text;
	}
</script>

</body>
</html>
