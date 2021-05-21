<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:건강컨텐츠</title>

	<?php
	require('head.php');
	?>

	<style>
	</style>

</head>
<body>

<header>
	<?php
	require('header.php');
	?>
</header>

<div class="row">
	<iframe id="video" width="560" height="315"
			style="margin-top:5.8rem; width: 100%;" allowfullscreen
			src="https://www.youtube.com/embed/IAHLwlAn1gs?autoplay=1"
			frameborder="0"></iframe>
</div>

<script>
	$('#topTitle').text(' ');

	var v = getParameterByName(location.href, 'v');

	$('#video').attr('src', 'https://www.youtube.com/embed/' + v + '?autoplay=1');

</script>

</body>
</html>
