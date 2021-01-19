<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:자주 묻는 질문</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<style>
		.accordion {
			border-top: 2px solid black;
		}

		.card-header {
			background: white;
			padding: 1rem 3rem;
		}

		.card-header span {
			line-height: 2rem;
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

		@keyframes rotate_image {
			100% {
				transform: rotate(360deg);
			}
		}
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
	<div class="sub-title-height"
		 style="background-image: url(../../../../asset/images/mobile/bg_sub5.jpg);
		 background-size: 100%;">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">고객센터</span><br>
					듀얼헬스케어는 항상<br>
					고객의 소리에 귀 기울이겠습니다.
				</div>
			</div>

			<div class="row" style="position: relative">
				<?php
				$parentDir = dirname(__DIR__ . '..');
				require($parentDir . '/common/sub_drop_down.php');
				?>
			</div>

			<!--본문-->
			<div class="row" style="display: block;margin-top: 9rem">
				<img src="/asset/images/mobile/icon_sub_title_bar.png">
				<h1>자주 묻는 질문</h1>
			</div>

			<div class="row" style="display: block;margin-top: 5rem">
				<div class="accordion" id="accordionFAQ">
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
							 data-parent="#accordionFAQ">
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
							 data-parent="#accordionFAQ">
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
							 data-parent="#accordionFAQ">
							<div class="card-body">
								아무도 없나요...
							</div>
						</div>
					</div>
				</div>
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
	$('#menu1 .nav-button').text('고객센터');
	var menu2 = '자주 묻는 질문';

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/sub_drop_down.js');
	?>

	$('.card-header').click(function () {
		$(this).find('img').toggleClass('rotate');
	});

</script>

</html>
