<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('head.php');
	?>

	<style>
		.menu-bar {
			max-width: 320px;
			min-width: 320px;
		}

		.wrapper {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		@media screen and (max-aspect-ratio: 320/568) {
			.menu-bar {
				max-width: none;
			}
		}
	</style>

</head>
<body>

<!--상단 네비바-->
<header>
	<?php
	require('header.php');
	?>
</header>
<!--상단 네비바-->
<div class="container" style="max-width: none; height: inherit">
	<div class="row" style="height: inherit">
		<div class="col menu-bar" style="background: #999900">
			네비바
		</div>
		<div class="col wrapper">
			<div class="container content">
				<div class="row">
					<div class="col-sm-1">
					</div>
					<div class="col-sm-4" style="background: red">
						광고~
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4" style="background: yellow">
								내예약
							</div>
							<div class="col-sm-4" style="background: green">
								검진예약
							</div>
							<div class="col-sm-4" style="background: orange">
								검진결과
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4" style="background: purple">
								병원별비교
							</div>
							<div class="col-sm-4" style="background: cadetblue">
								컨텐츠~
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-1">
					</div>
					<div class="col-sm-4">
					</div>
					<div class="col-sm-4" style="background: skyblue">
						공지사항
					</div>
					<div class="col-sm-2" style="background: fuchsia">
						고객센터
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>

<script>
</script>

</html>



