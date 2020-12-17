<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.basic-table .title {
			text-align: left;
			cursor: pointer;
		}

		.basic-table .title:hover {
			color: grey;
		}

	</style>
</head>
<body>

<!--상단 메뉴-->
<header>
	<?php
	require('common/header.php');
	?>
</header>

<!--콘텐츠 내용-->

<div class="main">
	<div class="container" style="width:80%;margin: 0 auto">
		<div class="row">
			<div class="box-title">
				<img src="/asset/images/icon_title.png">
				<h2 style="font-weight: 300;font-size: 2.3rem">통계관리</h2>
			</div>
		</div>

		<div class="row" style="display: block">

		</div>
	</div>
</body>
</html>

<script>
	//상단바 선택된 메뉴
	$('#topMenu3').addClass('active');
	$('#topMenu3').before('<div class="menu-select-line"></div>');
</script>

