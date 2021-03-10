<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:건강콘텐츠</title>

	<?php
	require('head.php');
	?>

	<style>
		.swiper-container {
			width: 100%;
			background: grey;
			vertical-align: middle;
		}

		.swiper-slide {
			text-align: center;
			font-size: 18px;
			/* Center slide text vertically */
			display: -webkit-box;
			display: -ms-flexbox;
			display: -webkit-flex;
			display: flex;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			-webkit-justify-content: center;
			justify-content: center;
			-webkit-box-align: center;
			-ms-flex-align: center;
			-webkit-align-items: center;
			align-items: center;
		}

		.swiper-button-next, .swiper-button-prev {
			color: white;
		}

		.swiper-pagination-bullet {
			background: white !important;
		}

		img {
			width: 100%;
			height: auto;
		}
	</style>

</head>
<body>

<header>
	<?php
	require('header.php');
	?>
</header>

<div class="row" style="padding-top: 5.8rem">
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<img src="https://www.mois.go.kr/cmm/fms/getImage.do?atchFileId=FILE_00099413yb3jelE&fileSn=0&preView=ok">
			</div>
			<div class="swiper-slide">
				<img src="https://www.mois.go.kr/cmm/fms/getImage.do?atchFileId=FILE_00099413yb3jelE&fileSn=1&preView=ok">
			</div>
			<div class="swiper-slide">
				<img src="https://www.mois.go.kr/cmm/fms/getImage.do?atchFileId=FILE_00099413yb3jelE&fileSn=2&preView=ok">
			</div>
			<div class="swiper-slide">
				<img src="https://www.mois.go.kr/cmm/fms/getImage.do?atchFileId=FILE_00099413yb3jelE&fileSn=3&preView=ok">
			</div>
			<div class="swiper-slide">
				<img src="https://www.mois.go.kr/cmm/fms/getImage.do?atchFileId=FILE_00099413yb3jelE&fileSn=4&preView=ok">
			</div>
		</div>
		<!-- Add Arrows -->
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		<!-- Add Pagination -->
		<div class="swiper-pagination"></div>
	</div>
</div>

<script>
	$('#topTitle').text('카드뉴스');

	var mySwiper = new Swiper('.swiper-container', {
		slidesPerView: 1, //슬라이드를 한번에 3개를 보여준다
		loop: false, //loop 를 true 로 할경우 무한반복 슬라이드 false 로 할경우 슬라이드의 끝에서 더보여지지 않음
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
		},
	});
</script>

</body>
</html>
