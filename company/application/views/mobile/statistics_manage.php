<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		a {
			color: black;
		}

		.nav-tabs {
			width: 100%;
			border: 1px solid #DCDCDC;
		}

		.nav-tabs .nav-link {
			border: none;
			border-top-right-radius: 0;
			padding: 6px;
		}

		.nav-item {
			width: calc(100% / 3);
			text-align: center;
			font-size: 1.45rem;
		}

		.nav-item:not(:last-child) {
			border-right: 1px solid #DCDCDC;
		}

		.nav-tabs .nav-link {
			border: none;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}

		.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
			color: #ffffff;
			background-color: #5645ED;
			border: none;
		}

		input[type=date] {
			width: 130px;
			outline: none;
			font-size: 1.3rem;
			border: 1px solid #DCDCDC;
			padding: 4px 10px;
		}

		.btn {
			font-size: 1.3rem;
			margin-right: 1rem;
		}

		.basic-table th, .basic-table td {
			border: 1px solid #dcdcdc;
			color: black;
			padding: 10px;
		}

		.basic-table .title {
			background: #e2e2e2;
		}

		.basic-table .division-line {
			border-right: 1px solid #CCCCCC;
		}

		.basic-table .order {
			background: #e2dfea;
			font-weight: 500;
			cursor: pointer;
			color: #5645ED;
			text-decoration: underline;
		}

		.basic-table .order:hover {
			background: #CCCCCC;
		}

		.basic-table .choice {
			font-weight: 500;
			cursor: pointer;
			color: #5645ED;
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

		.canvas-box {
			text-align: center;
			border: 1px solid #DCDCDC;
			margin-top: 30px;
			padding: 20px;
		}

		.canvas-box canvas {
			min-width: 300px;
			min-height: 300px;
			max-width: 300px;
			max-height: 300px;
			width: 300px;
			height: 300px;
			margin: 0 auto;
		}

		.canvas-box .title {
			width: 100%;
			font-size: 2.2rem;
			font-weight: 400;
			margin-bottom: 20px;
		}

		.canvas-box table {
			width: 100%;
			margin-top: 20px;
		}

		select {
			width: 100px;
			border: 1px solid #cccccc;
			outline: none;
			padding: 2px 10px;
			font-weight: 300;
			font-size: 1.4rem;
		}

		option {
			font-weight: 300;
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
	<div class="row">
		<div class="box-title">
			<img src="/asset/images/icon_title.png">
			<h2>통계관리</h2>
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


<footer>
	<?php
	require('common/footer.php');
	?>
</footer>



</html>

<script>

</script>
