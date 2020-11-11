<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('head.php');
	?>

	<style>
		table {
			text-align: center;
		}

		.main-content {
			width: 500px;
			height: 250px;
			min-width: 500px;
			min-height: 250px;
			background: rosybrown;
			border: white 1px solid;
		}

		.sub-content {
			width: 250px;
			height: 250px;
			min-width: 250px;
			min-height: 250px;
			border: white 1px solid;
		}
	</style>

</head>
<body background="../../asset/images/bg_login.jpg">

<header>
	<?php
	require('header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		require('side_bar.php');
		?>
		<!-- 우측 컨텐츠 -->
		<div class="col" style="display: table-cell;vertical-align: middle">
			<table style="margin: 0 auto">
				<tr>
					<td class="main-content" rowspan="2" colspan="2">건강관리서비스</td>
					<td class="sub-content" style="background: #6c0403; opacity: 0.8">내예약</td>
					<td class="sub-content" style="background: #585345; opacity: 0.7">검진예약</td>
					<td class="sub-content" style="background: #000000; opacity: 0.75">검진결과</td>
				</tr>
				<tr>
					<td class="sub-content" style="background: #020a2b; opacity: 0.85">병원별 비교</td>
					<td class="sub-content" style="background: #daa300; opacity: 0.7">건강 컨텐츠</td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td class="sub-content" colspan="2" style="background: white">공지사항</td>
					<td class="sub-content" style="background: #074b37; opacity: 0.55">고객센터</td>
				</tr>
			</table>
		</div>
	</div>
</div>

</body>

<script>

</script>

</html>



