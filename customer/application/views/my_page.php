<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('head.php');
	?>

	<style>
		.title-menu, .title-menu-select {
			width: 300px;
			height: 45px;
			background-color: rgba(0, 0, 0, 0.5);
			color: white;
			line-height: 45px;
			cursor: pointer;
			align-self: flex-end;
		}

		.title-menu:hover, .title-menu-select {
			background: #5645ED;
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
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;position: relative;">
			<!-- 상단 메뉴 -->
			<div class="container" style="background: #808080; width: 100%; max-width:none; height: 300px;text-align: center;">
				<div class="row" style="min-width:inherit; height: 35px;border-bottom:1px solid #9a9a9a">
				</div>
				<div class="row" style="width: inherit;display: table">
					<div style="margin: 0 auto; display:table-cell; font-size: 16px;height: 220px; vertical-align: middle">
						<span style="font-size: 32px">내정보관리<br></span>
						Internal information management
					</div>
				</div>
				<div class="row" style="height: 45px">
					<div style="margin: 0 auto; display: flex; padding:0 50px">
						<div class="title-menu-select" style="border-right: #828282 1px solid">
							내정보관리
						</div>
						<div class="title-menu">
							비밀번호변경
						</div>
					</div>
				</div>
			</div>

			<!-- 컨텐츠내용 -->
			<div class="container">
				<div class="row">

				</div>
			</div>
		</div>
	</div>
</div>

</body>

<script>
</script>

</html>
