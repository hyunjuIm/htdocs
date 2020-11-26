<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:자주 묻는 질문</title>

	<?php
	require('head.php');
	?>

	<style>
		html {
			font-size: 10px;
		}

		body {
			font-size: 1.6rem;
			word-break: keep-all;
		}

		.container {
			width: 100%;
			max-width: none;
			text-align: center;
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

		input {
			width: 100%;
			border: 1px solid #d5d5d5;
		}

		.accordion {
			border-top: 2px solid black;
		}

		.card-header {
			background: white;
			padding: 1rem 3rem;
		}

		.card-header span {
			padding-right: 3rem;
			font-weight: bold;
			font-size: 2rem;
		}

		.card-header img {
			transition: transform 0.3s;
		}

		.card-body {
			background: #f6f6f6;
		}

		.text-left {
			cursor: pointer;
		}

		.rotate {
			-webkit-transform: rotate(180deg);
			-moz-transform: rotate(180deg);
			-o-transform: rotate(180deg);
			-ms-transform: rotate(180deg);
			transform: rotate(180deg);
		}

		@keyframes rotate_image{
			100% {
				transform: rotate(360deg);
			}
		}

		@media only screen and (max-width: 1700px) {
			html {
				font-size: 8px;
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
					 style="background-image: url(../../asset/images/title_customer_service.jpg); height: 30rem">
					<div class="row" style="min-width:inherit; height: 3.5rem;border-bottom:1px solid #9a9a9a">
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner" style="margin: 0 auto; ">
							<span style="font-size: 3.2rem">고객센터<br></span>
							Customer Center
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="#">
								<div class="title-menu-select" style="border-right: #828282 1px solid">
									자주 묻는 질문
								</div>
							</a>
							<a href="/customer/customer_service_one_inquiry">
								<div class="title-menu" style="border-right: #828282 1px solid">
									1:1 문의
								</div>
							</a>
							<a href="/customer/customer_service_inquiry_list">
								<div class="title-menu">
									내 문의 내역
								</div>
							</a>
						</div>
					</div>
				</div>


				<!-- 컨텐츠내용 -->
				<div class="container" style="text-align: center;color: black;width: 130rem;padding: 6rem;">
					<div class="row" style="padding-top: 3rem">
						<div style="margin: 0 auto; font-weight: bolder">
							<img src="/asset/images/title_bar.png">
							<p style="font-size: 3.2rem">자주 묻는 질문</p>
						</div>
					</div>
					<div class="row" style="display: block;margin-top: 6rem">
						<div class="accordion" id="accordionExample">
							<div>
								<div class="card-header" id="headingOne">
									<div class="text-left"
										 data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
										 aria-controls="collapseOne">
										<span>Q</span>
										이것은 자주 묻는 질문 입니다
										<div style="float:right">
											<img src="/asset/images/icon_drop_down.png">
										</div>
									</div>
								</div>

								<div id="collapseOne" class="collapse" aria-labelledby="headingOne"
									 data-parent="#accordionExample">
									<div class="card-body">
										그렇지요 (☞ﾟヮﾟ)☞☜(ﾟヮﾟ☜)
									</div>
								</div>
							</div>
							<div>
								<div class="card-header" id="headingTwo">
									<div class="text-left"
										 data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
										 aria-controls="collapseTwo">
										<span>Q</span>
										이것 또한 자주 묻는 질문이지요,,
										<div style="float:right;">
											<img src="/asset/images/icon_drop_down.png">
										</div>
									</div>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
									 data-parent="#accordionExample">
									<div class="card-body">
										╰(*°▽°*)╯╰(*°▽°*)╯
									</div>
								</div>
							</div>
							<div>
								<div class="card-header" id="headingThree">
									<div class="text-left"
										 data-toggle="collapse" data-target="#collapseThree"
										 aria-expanded="false" aria-controls="collapseThree">
										<span>Q</span>
										나랑 저스트 댄스 할 사람~?!
										<div style="float:right;">
											<img src="/asset/images/icon_drop_down.png">
										</div>
									</div>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
									 data-parent="#accordionExample">
									<div class="card-body">
										아무도 없나요...
									</div>
								</div>
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
	$('.card-header').click(function() {
		$(this).find('img').toggleClass('rotate');
	});
</script>

</html>
