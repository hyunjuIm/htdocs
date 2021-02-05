<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:질병백과</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>
		.row {
			width: 100%;
			padding: 0;
			margin: 0;
		}

		.health-content {
			width: 1200px;
			margin: 0 auto;
			background: white;
		}

		.health-content .row {
			display: block;
		}

		.health-content .border-line {
			border-bottom: 1px solid #DCDCDC;
			padding: 15px 0;
		}

		.health-content img {
			width: 100%;
			height: auto;
		}

		.health-content .title {
			font-weight: 400;
			font-size: 20px;
			padding: 10px 0;
		}

		.health-content .title span {
			color: #5645ED;
		}

		.health-content .content {
			font-size: 15px;
			text-align: justify;
		}

		h4 {
			font-weight: 400;
		}

		table {
			line-height: normal;
		}

		th {
			width: 10%;
		}

		td {
			text-align: left;
			width: 40%;
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
<div class="container" style="padding: 50px 0; max-width: none;width: 70%">
	<div class="row">
		<div class="menu-title" style="font-size: 22px">
			<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px">
			질병백과
		</div>
	</div>

	<div class="row" style="padding: 30px;background: white;margin-top: 30px">
		<div class="health-content">
			<div class="row" style="margin: 0 auto">
				<img id="mainImg">
			</div>
			<div class="row" style="border-bottom: 1px solid grey;">
				<h4 id="title" style="padding: 40px 0 10px 0">식도암</h4>
			</div>
			<div class="row border-line">
				<div class="title"><span>01</span> 정의</div>
				<div class="content" id="content1">
					식도암이란
				</div>
			</div>
			<div class="row border-line">
				<div class="title"><span>02</span> 진단방법</div>
				<div class="content" id="content2">
					식도암이란
				</div>
			</div>
			<div class="row border-line">
				<div class="title"><span>03</span> 원인</div>
				<div class="content" id="content3">
					식도암이란
				</div>
			</div>
			<div class="row border-line">
				<div class="title"><span>04</span> 증상</div>
				<div class="content" id="content4">
					식도암이란
				</div>
			</div>
			<div class="row border-line">
				<div class="title"><span>05</span> 치료법</div>
				<div class="content" id="content5">
					식도암이란
				</div>
			</div>
			<div class="row border-line">
				<div class="title"><span>06</span> 식이방법</div>
				<table class="table table-bordered" style="font-size: 15px !important;">
					<tr>
						<th>권장</th>
						<td id="content61"></td>
						<th>주의</th>
						<td id="content62"></td>
					</tr>
				</table>
			</div>
			<div class="row border-line">
				<div class="title"><span>07</span> 운동방법</div>
				<div class="content" id="content7">
					식도암이란
				</div>
			</div>
		</div>
	</div>

	<div class="row" style="display: block;padding: 30px 0">
		<div style="float:right">
			<div class="btn-cancel-square" onclick="location.href='/master/health_encyclopedia_list'">목록</div>
			<div class="btn-purple-square" onclick="sendEncyclopediaID()"> 수정</div>
			<div class="btn-light-purple-square" onclick="deleteEncyclopedia()"> 삭제</div>
		</div>
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

	//ID 값 받기
	var BoardId = new Object();
	$(document).ready(function () {
		var val = location.href.substr(
				location.href.lastIndexOf('=') + 1
		);
		BoardId.id = val;

		instance.post('M1702', BoardId).then(res => {
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

	//수정에 값 던지기
	function sendEncyclopediaID() {
		location.href = "health_encyclopedia_update?id=" + BoardId.id;
	}

	//삭제
	function deleteEncyclopedia() {
		if (confirm("삭제하시겠습니까?") == true) {
			instance.post('M1705', BoardId).then(res => {

				if (res.data.message == "success") {
					alert("삭제되었습니다.");
					history.back();
				}
			});
		} else {
			return false;
		}
	}
</script>
