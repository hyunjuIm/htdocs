<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진결과</title>

	<?php
	require('head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		.result-table {
			width: 100%;
			border-top: black 2px solid;
			text-align: left;
		}

		.result-table tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.result-table th {
			background: #f6f6f6;
			text-align: left;
			padding: 1.3rem 3rem;
			vertical-align: middle;
			font-weight: 400;
		}

		.result-table td {
			vertical-align: middle;
			padding: 1.3rem 3rem;
			max-width: 30%;
		}

		.result-table td div {
			padding: 0.5rem;
		}

		.item-table {
			width: 100%;
			margin-top: 1rem;
		}

		.item-table img {
			width: 88px;
			height: 88px;
		}

		.item-table td {
			text-align: center;
			width: calc(120rem / 6);
			height: calc(120rem / 6);
			font-weight: bolder;
			font-size: 1.7rem;
		}

		.item {
			align-items: center;
			cursor: default;
			font-size: 1.6rem;
		}

		.item-hover {
			display: none;
			background: white;
			cursor: pointer;
			padding: 2rem;
			font-size: 1.5rem;
			font-weight: 300;
		}

		.item-hover span {
			font-size: 1.6rem;
			font-weight: 500;
			vertical-align: middle;
			color: #5645ed;
		}

		.item-content {
			margin-top: 2rem;
		}

		#resultCarousel .carousel-control-prev,
		#resultCarousel .carousel-control-next {
			position: relative;
			width: fit-content;
			height: fit-content;
			padding-left: 1rem;
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
		<?php
		require('side_bar_light.php');
		?>
		<!-- 우측 컨텐츠 -->
		<div class="col"
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
			<div style="height:100vh; overflow-y: scroll;min-height: 90rem;">
				<!-- 상단 메뉴 -->
				<div class="container top-menu"
					 style="background-image: url(../../asset/images/title2.jpg)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>검진결과</span>
							<span>｜</span>
							<span>주요결과</span>
						</div>
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner" style="margin: 0 auto; ">
							<span class="title">검진결과<br></span>
							Examination Results
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="/customer/result_final">
								<div class="title-menu" style="border-right: #828282 1px solid">
									종합결과
								</div>
							</a>
							<a href="/customer/result_main">
								<div class="title-menu-select">
									주요결과
								</div>
							</a>
						</div>
					</div>
				</div>

				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="padding-top: 3rem">
							<div class="sub-title">주요결과</div>
						</div>

						<div class="row" style="margin-top: 2.5rem;">

						</div>

						<div class="row" style="display:block; margin-top: 5rem">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<?php
require('check_data.php');
?>

<script>

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");

</script>

</html>
