<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진예약</title>

	<?php
	require('head.php');
	?>

	<style>
		html {
			font-size: 10px;
		}

		body {
			font-size: 1.6rem;
		}

		.container {
			width: 100%;
			max-width: none;
		}

		.wrap {
			display: flex;
			justify-content: center;
		}

		.inner {
			align-self: center;
			padding: 2rem;
		}

		.title-menu, .title-menu-select {
			width: 30rem;
			height: 4.5rem;
			background-color: rgba(0, 0, 0, 0.5);
			color: white;
			line-height: 4.5rem;
			cursor: pointer;
			align-self: flex-end;
		}

		.title-menu:hover, .title-menu-select {
			background: #5645ED;
		}

		.personal-info-agree {
			font-size: 1.4rem;
			text-align: left;
			padding: 2rem;
			background: #f6f6f6;
			border: 1px solid #d5d5d5;
			width: 100%;
			height: 25rem;
			overflow-y: scroll;
		}

		.form-check {
			text-align: left;
		}

		.form-check-label, .form-check-input {
			width: fit-content;
		}

		.personal-info-table {
			width: 100%;
			border-top: black 2px solid;
			margin: 0 auto;
		}

		.personal-info-table tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.personal-info-table th {
			background: #f6f6f6;
			font-weight: normal !important;
			width: 16rem;
			text-align: right;
			padding: 1.3rem 3rem;
			vertical-align: middle;
		}

		.personal-info-table td {
			padding: 1rem 2rem;
			text-align: left;
		}

		.personal-info-table .name {
			width: 25rem;
			text-align: center;
			background: #fbfbfb;
			border-right: 1px solid #a7a7a7;
		}

		.name {
			font-size: 3rem;
			line-height: 2.7rem;
		}

		.name span {
			font-size: 1.6rem;
		}

		.personal-info-table .btn-ok {
			text-align: center;
			border-left: 1px solid #a7a7a7;
			width: 25rem;
		}

		input {
			width: 100%;
			border: 1px solid #d5d5d5;
		}

		@media only screen and (max-width: 1700px) {
			html {
				font-size: 8px;
			}

			.reservation-order {
				width: 80%;
			}
		}

		@media only screen and (max-device-width: 480px) {
			html {
				font-size: 7px;
			}
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
				<div class="container"
					 style="background-image: url(../../asset/images/title1.jpg); height: 30rem;text-align: center;">
					<div class="row" style="min-width:inherit; height: 3.5rem;border-bottom:1px solid #9a9a9a">
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner" style="margin: 0 auto; ">
							<span style="font-size: 3.2rem">예약서비스<br></span>
							Reservation service
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<div class="title-menu-select" style="border-right: #828282 1px solid">
								검진예약
							</div>
							<a href="/customer/">
								<div class="title-menu">
									예약현황
								</div>
							</a>
						</div>
					</div>
				</div>

				<!-- 컨텐츠내용 -->
				<div class="container" style="text-align: center;color: black;width: 130rem;padding: 6rem;">
					<div class="row" style="margin-top: 3rem">
						<div style="margin: 0 auto; font-weight: 500">
							<p style="font-size: 2.3rem;margin-bottom: 4rem">검진예약절차</p>
							<img class="reservation-order" src="/asset/images/img_reservation_order.png">
						</div>
					</div>
					<div class="row" style="display:block;text-align: left;margin-top: 5rem">
						<div style="font-size: 2.9rem;font-weight: 500;margin-bottom: 3rem">
							병원검색
						</div>
						<br>
						<div style="margin-bottom: 1.5rem">
							<div style="float:left">
								총 <span id="hosCount"></span>개 병원
							</div>
							<div style="display: flex; float:right">
								<input type="text" id="" class="search-input" placeholder="검색어를 입력하세요">
								<div class="search-btn">
									<img src="/asset/images/icon_search.png">
								</div>
							</div>
						</div>
						<br>
						<div>
							<hr style="height: 0;border: 0; border-top: 2px solid black">
							<table>

							</table>
							<hr style="height: 0;border: 0; border-top: 1px solid black">
						</div>
					</div>
					<div class="row" style="margin-top: 8rem">

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
	userData.famId = location.href.substr(
			location.href.lastIndexOf('=') + 1
	);

	// 병원리스트 받기
	instance.post('CU_003_002', userData).then(res => {
		console.log(res.data);
	});


</script>

</html>
