<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:공지사항</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		.health-content {
			width: 120rem;
			margin: 0 auto;
			background: white;
			text-align: left;
			word-break: normal;
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
		}

		.health-content .title span {
			color: #5645ED;
		}

		.health-content .content {
			font-size: 1.5rem;
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
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/menu/side_bar_light.php');
		?>
		<!-- 우측 컨텐츠 -->
		<div class="col"
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
			<div style="height:100vh; overflow-y: auto;min-height: 90rem;">
				<!-- 상단 메뉴 -->
				<div class="container top-menu"
					 style="background-image: url(../../../../asset/images/title4.jpg)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>건강정보</span>
							<span>｜</span>
							<span>질병백과</span>
						</div>
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner " style="margin: 0 auto; ">
							<span class="title">건강정보<br></span>
							Health Contents
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="/customer/health_encyclopedia_list">
								<div class="title-menu-select">
									질병백과
								</div>
							</a>
						</div>
					</div>
				</div>


				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="padding-top: 3rem">
							<div class="sub-title">질병백과</div>
						</div>
						<div class="row" style="display: block;margin-top: 5rem">
							<div class="health-content">
								<div class="row">
									<img id="mainImg">
								</div>
								<div class="row" style="border-bottom: 1px solid grey;">
									<h1 id="title" style="padding: 40px 0 10px 0"></h1>
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
											<td id="content61"></td>
											<th>주의</th>
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

						<div class="row" style="margin-top: 7rem">
							<div class="btn-cancel-square" onclick="location.href = '/customer/health_encyclopedia_list'"
								 style="margin: 0 auto;color: #2f2f2f;border-color: #2F2F2F;">목록으로
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<script>
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

</html>
