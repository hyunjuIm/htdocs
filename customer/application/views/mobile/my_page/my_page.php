<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css"/>

	<style>
		/*select, option {*/
		/*	width: 100%;*/
		/*	border: none;*/
		/*	padding: 8px 20px !important;*/
		/*	border-radius: 0;*/
		/*	font-size: 1.4rem;*/
		/*	background: none;*/
		/*	color: white;*/
		/*	font-weight: 200;*/
		/*}*/

		/*option {*/
		/*	background: #3529b1;*/
		/*}*/

		/*option:active, option:hover {*/
		/*	background-color: #5849ea;*/
		/*}*/

	</style>

</head>
<body>

<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/menu/side.php');
	?>
</header>

<div id="main">
	<div style="background: url(../../../../asset/images/title1.jpg);height: 300px;">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">내정보</span><br>
					주소 및 연락처는 예약확인 / 준비물 배송 등의<br>
					서비스에 이용되므로 정확한 정보를<br>
					입력하시길 바랍니다.
				</div>
			</div>

			<div class="row">
				<nav id="menu1">
					<ul class="drop-down closed" style="border-right: 1px solid rgba(255, 255, 255, 0.1)">
						<li><a href="#" class="nav-button">/</a></li>
						<li><a href="#">예약서비스</a></li>
						<li><a href="#">검진결과</a></li>
						<li><a href="#">건강정보</a></li>
						<li><a href="#">이용안내</a></li>
						<li><a href="#">고객센터</a></li>
					</ul>
				</nav>
				<nav id="menu2">
					<ul class="drop-down closed">
						<li><a href="#" class="nav-button">/</a></li>
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Library</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</nav>

			</div>

		</div>

		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/common/footer.php');
		?>
	</div>


</div>


</body>

<script>
	//서브메뉴 셀렉터
	$(function () {
		$(".nav-button").click(function () {
			$(this).parent().parent().toggleClass("closed");
		});

		$("#menu1 .drop-down li a").not('.nav-button').click(function () {
			$('#menu1 .nav-button').text($(this).text());
			$(this).css("background-color", "#5645ED");

			$('#menu1 .drop-down li a').not(this).css("background-color", "#2e2392");

			$('#menu2 ul').empty();
			if($('.nav-button').text() == '예약서비스') {
				var option = '';
				option += '<li><a href="#" class="nav-button">검진예약</a></li>' +
						'<li><a href="#">검진예약</a></li>' +
						'<li><a href="#">검진현황</a></li>';
				$('#menu2 ul').append(option);
			}
		});

		$("#menu2 .drop-down li a").not('.nav-button').click(function () {
			$('#menu2 .nav-button').text($(this).text());
			$(this).css("background-color", "#5645ED");

			$('#menu2 .drop-down li a').not(this).css("background-color", "#2e2392");
		});
	});
</script>

</html>
