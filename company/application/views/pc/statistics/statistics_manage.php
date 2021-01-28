<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>
		.nav-tabs {
			border-bottom: none;
		}

		.nav-tabs .nav-link {
			border: none;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}

		.nav-item {
			width: 10rem;
			text-align: center;
			font-size: 1.8rem;
			border-bottom: 2px solid #3529b1;
		}

		.nav-tabs .nav-link {
			border: none;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}

		.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
			color: #ffffff;
			background-color: #3529b1;
			border: none;
		}

		input[type=date] {
			outline: none;
			font-size: 1.4rem;
			border: 1px solid #DCDCDC;
			padding: 0.5rem 1rem;
		}

		.btn {
			font-size: 1.5rem;
			margin-right: 1rem;
		}

		.basic-table th, .basic-table td {
			border: 1px solid #dcdcdc;
			color: black;
		}

		.basic-table .title {
			background: #e2e2e2;
		}

		.basic-table .division-line {
			border-right: 1px solid #CCCCCC;
		}

		.basic-table .order {
			background: #dedede;
			font-weight: 500;
			cursor: pointer;
			color: #3529b1;
		}

		.basic-table .order:hover {
			background: #CCCCCC;
		}

		.basic-table .choice {
			font-weight: 500;
			cursor: pointer;
			color: #3529b1;
			background: whitesmoke;
		}

		.basic-table .choice:hover {
			background: #f1f1f1;
		}

		.statistics-table {
			width: 80%;
			margin: 0 auto;
			font-size: 1.3rem;
			text-align: center;
		}

		.statistics-table td {
			width: 25%;
		}

		.statistics-table .state-text {
			text-align: left;
			width: fit-content;
			margin: 0 auto;
			padding: 1rem;
		}

		.area-title {
			font-size: 2.2rem;
			text-align: left;
			font-weight: 400;
			padding: 3rem 0 1rem 0;
		}

		.empty-data {
			display: none;
			line-height: 10rem;
			background: rgba(0, 0, 0, 0.2);
			width: 100%;
			height: 10rem;
			text-align: center;
			font-size: 1.8rem;
			font-weight: 400;
			margin-top: 3rem;
		}

		canvas {
			width: 15rem;
			height: 15rem;
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
	<div class="container" style="width:80%;margin: 0 auto">
		<div class="row">
			<div class="box-title">
				<img src="/asset/images/icon_title.png">
				<h2 style="font-weight: 300;font-size: 2.3rem">통계관리</h2>
			</div>
		</div>

		<div class="row" style="display: block">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#year">연도별</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#hospital">병원별</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#area">지역별</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade show active" id="year">
					<?php
					require('statistics_year.php');
					?>
				</div>
				<div class="tab-pane fade" id="hospital">
					<?php
					require('statistics_hospital.php');
					?>
				</div>
				<div class="tab-pane fade" id="area">
					<?php
					require('statistics_area.php');
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script>
	//상단바 선택된 메뉴
	$('#topMenu3').addClass('active');
	$('#topMenu3').before('<div class="menu-select-line"></div>');

	$('#loading').hide();
</script>

