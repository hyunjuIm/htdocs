<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('head.php');
	?>

	<style>
		table {
			text-align: center;
		}

		.main-content {
			width: 500px;
			height: 250px;
			min-width: 500px;
			min-height: 250px;
			background: rosybrown;
			border: white 1px solid;
		}

		.sub-content {
			width: 250px;
			height: 250px;
			min-width: 250px;
			min-height: 250px;
			border: white 1px solid;
		}

		.bd-sidebar {
			position: sticky;
			height: 100vh;
			background: #1b1a25;
			opacity: 0.95;
			min-width: 320px;
			max-width: 320px;
			color: white;
			text-align: center;
		}

		#nav li a {
			display: block;
			padding: 13px 40px;
			text-decoration: none;
			color: white;
			text-align: left;
		}

		#nav li a:hover, #nav li a.active {
			color: #5645ED;
		}

		#nav li ul {
			display: none;
		}

		ul, li {
			list-style-type: none;
			padding-left: 0px;
		}

		.main-menu {
			border-bottom: 1px solid #aaaaaa;
		}

		.sub-menu {
			padding-left: 30px;
			border-bottom: none;
		}

	</style>

</head>
<body>

<header>
	<?php
	require('header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<div class="col bd-sidebar" style="padding: 0">
			<form style="padding: 50px 20px;background: #5a0099">
				<div>
					로고
				</div>
				<div id="nameView" style="padding: 40px 0">
					테스트님 환영합니다.
				</div>
				<div style="padding: 5px 0; border: white solid 1px; font-size: 15px; display: flex">
					<div style="width: 50%">
						내정보관리
					</div>
					<div>
						|
					</div>
					<div style="width: 50%">
						로그아웃
					</div>
				</div>
			</form>
			<!-- Example single danger button -->
			<form>
				<ul id="nav">
					<li class="main-menu"><a href="#">검진예약</a>
						<ul>
							<li class="sub-menu"><a href="#">예약하기</a></li>
							<li class="sub-menu"><a href="#">예약현황</a></li>
						</ul>
					</li>
					<li class="main-menu"><a href="#">검진결과</a>
						<ul>
							<li class="sub-menu"><a href="#">자세히보기</a></li>
						</ul>
					</li>
					<li class="main-menu"><a href="#">이용안내</a>
						<ul>
							<li class="sub-menu"><a href="#">공지사항</a></li>
							<li class="sub-menu"><a href="#">병원별 검진 비교</a></li>
							<li class="sub-menu"><a href="#">검강검진안내</a></li>
							<li class="sub-menu"><a href="#">고객센터</a></li>
						</ul>
					</li>
				</ul>
			</form>

			<form style="width: 100%; font-size: 13px; text-align: left;color: #aaaaaa;position:absolute; bottom:0px">
				<div style="display: flex; border-top: 1px solid #aaaaaa;padding: 10px 27px">
					<div>
						서비스이용약관
					</div>
					<div style="padding: 0 10px">
						|
					</div>
					<div>
						개인정보처리방침
					</div>
				</div>
				<div style="border-top: 1px solid #aaaaaa; padding: 15px 27px 50px; font-size: 12px">
					<div style="font-size: 15px; color: white;margin-bottom: 3px">
						(주) 듀얼헬스케어
					</div>
					<div>
						대표자 : 김영이
						<br>
						사업자등록번호 : 111-86-01943
						<br>
						주소 : 대전광역시 유성구 대덕대로 512번길 20
						<br>
						(도룡동, 2층)
						<br>
						copyrightⓒdualhealthcare
					</div>
				</div>
			</form>
		</div>

		<!-- 우측 컨텐츠 -->
		<div class="col" style="display: table-cell;vertical-align: middle">
			<table style="margin: 0 auto">
				<tr>
					<td class="main-content" rowspan="2" colspan="2">건강관리서비스</td>
					<td class="sub-content" style="background: #6c0403; opacity: 0.8">내예약</td>
					<td class="sub-content" style="background: #585345; opacity: 0.7">검진예약</td>
					<td class="sub-content" style="background: #000000; opacity: 0.75">검진결과</td>
				</tr>
				<tr>
					<td class="sub-content" style="background: #020a2b; opacity: 0.85">병원별 비교</td>
					<td class="sub-content" style="background: #daa300; opacity: 0.7">건강 컨텐츠</td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td class="sub-content" colspan="2" style="background: white">공지사항</td>
					<td class="sub-content" style="background: #074b37; opacity: 0.55">고객센터</td>
				</tr>
			</table>
		</div>
	</div>
</div>

</body>

<script>
	$(document).ready(function () {
		$('#nav > li > a').hover(function () {
			$(this).next().slideToggle();
			$(this).addClass('active');
		}, function () {
			$('#nav li ul').slideUp();
			$('#nav li a').removeClass('active');
		});
	});
</script>

</html>



