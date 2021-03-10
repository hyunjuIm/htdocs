<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:건강콘텐츠</title>

	<?php
	require('head.php');
	?>

	<style>
		a {
			color: white;
		}

		.area {
			background: #4e54c8;
			background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
			width: 100%;
			height: 100%;
			/*height: 100vh;*/
			margin: 0 auto;
		}

		.circles {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			min-height: 100%;
			overflow: hidden;
		}

		.circles li {
			position: absolute;
			display: block;
			list-style: none;
			width: 20px;
			height: 20px;
			background: rgba(255, 255, 255, 0.2);
			animation: animate 25s linear infinite;
			bottom: -150px;
		}

		.circles li:nth-child(1) {
			left: 25%;
			width: 30px;
			height: 30px;
			animation-delay: 0s;
		}


		.circles li:nth-child(2) {
			left: 10%;
			width: 20px;
			height: 20px;
			animation-delay: 2s;
			animation-duration: 12s;
		}

		.circles li:nth-child(3) {
			left: 70%;
			width: 20px;
			height: 20px;
			animation-delay: 4s;
		}

		.circles li:nth-child(4) {
			left: 40%;
			width: 20px;
			height: 20px;
			animation-delay: 0s;
			animation-duration: 18s;
		}

		.circles li:nth-child(5) {
			left: 65%;
			width: 20px;
			height: 20px;
			animation-delay: 0s;
		}

		.circles li:nth-child(6) {
			left: 75%;
			width: 50px;
			height: 50px;
			animation-delay: 3s;
		}

		.circles li:nth-child(7) {
			left: 35%;
			width: 80px;
			width: 80px;
			height: 80px;
			animation-delay: 7s;
		}

		.circles li:nth-child(8) {
			left: 50%;
			width: 25px;
			height: 25px;
			animation-delay: 15s;
			animation-duration: 45s;
		}

		.circles li:nth-child(9) {
			left: 20%;
			width: 15px;
			height: 15px;
			animation-delay: 2s;
			animation-duration: 35s;
		}

		.circles li:nth-child(10) {
			left: 85%;
			width: 80px;
			height: 80px;
			animation-delay: 0s;
			animation-duration: 11s;
		}

		@keyframes animate {
			0% {
				transform: translateY(0) rotate(0deg);
				opacity: 1;
				border-radius: 0;
			}
			100% {
				transform: translateY(-1000px) rotate(720deg);
				opacity: 0;
				border-radius: 50%;
			}
		}

		.card-row {
			background: #654ea3; /* fallback for old browsers */
			background: -webkit-linear-gradient(to top, #eaafc8, #654ea3); /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to top, #eaafc8, #654ea3); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		}

		.card-row .row {
			background: none;
		}

		.card img {
			height: 18.5rem;
			min-height: 18.5rem;
			max-height: 18.5rem;
		}

		.card {
			width: 22rem;
			min-width: 22rem;
			max-width: 22rem;
			box-shadow: 0px 0px 10px #aaaaaa;
		}

		.card:hover {
			box-shadow: 0px 0px 10px white;
		}

		.item {
			padding: 1rem;
		}

		.video {
			width: 31rem;
			height: 17.4rem;
		}

		.top-bar {
			padding: 0.5rem 1rem;
			border-bottom: 1px solid;
			border-color: rgba(255, 255, 255, 0.2);
			background: none;
			color: white;
			z-index: 9999;
			position: fixed;
		}
	</style>

</head>
<body>

<div class="row card-row area">
	<div class="row">
		<ul class="circles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>


	<!--모바일 헤더-->
	<div class="row top-bar">
		<div style="float: left;font-size: 3rem">
			<i class="ri-arrow-left-line" onclick="location.href='/app/'"></i>
		</div>
		<div style="margin: 0 auto;line-height: 4.7rem;font-weight: 400">
			맞춤형 건강정보
		</div>
		<div style="float: right;font-size: 3rem">
			<i class="ri-arrow-left-line" style="visibility: hidden"></i>
		</div>
	</div>


	<div class="row row-padding" style="padding-top: 8rem;padding-bottom: 5.5rem">
		<div class="title1" style="color: white">
			카드뉴스
		</div>
		<!-- Swiper -->
		<div class="row" style="margin-top: 0.5rem">
			<div class="swiper-container">
				<div class="swiper-wrapper" id="cardView">
					<div class="swiper-slide">
						<div class="item">
							<div class="card">
								<img src="http://placeimg.com/640/480/any" class="card-img-top">
								<div class="card-body">
									카드뉴스 제목
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- Add Pagination -->
			<div class="swiper-pagination"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="row row-padding" style="padding-bottom: 5.5rem">
		<div class="title1">
			동영상
		</div>

		<div class="row">
			<div class="contents" id="videoView">
				<div class="item">
					<div class="video"
						 onclick="location.href='https://www.youtube.com/watch?v=CPJXRRr4Q5c&feature=share'">
						<img src="https://www.mangoboard.net/bbs/attachments/5625">
						<div class="black-layer">
							<img class="ico-play" src="../../asset/images/ico_play.png">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

	$(window).scroll(function () {
		if ($(this).scrollTop() > 0) {
			$('.top-bar').css("background", "rgba(255, 255, 255, 0.5)");
			$('.top-bar').css("color", "black");
		} else {
			$('.top-bar').css("background", "none");
			$('.top-bar').css("color", "white");
		}
	});

	$(document).ready(function () {
		var swiper = new Swiper('.swiper-container', {
			slidesPerView: 2,
			spaceBetween: 170,
			centeredSlides: true,
			breakpointsInverse: true,
			breakpoints: {
				280: {
					slidesPerView: 1,
				},
				320: {
					slidesPerView: 2,
					spaceBetween: 170,
				},
				370: {
					slidesPerView: 2,
					spaceBetween: 120,
				},
				390: {
					slidesPerView: 2,
					spaceBetween: 80,
				}
			},
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
		});

		setCustomContentView();
	});

	function setCustomContentView() {
		$('#cardView').empty();
		$('#videoView').empty();

		for (i = 0; i < 6; i++) {
			var html = '';
			html += '<div class="swiper-slide">' +
					'<div class="item">' +
					'<div class="card"' +
					'onclick="location.href=\'/app/card\'">' +
					'<img src="http://placeimg.com/640/480/any" class="card-img-top">' +
					'<div class="card-body">' +
					'카드뉴스 제목' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>';
			$('#cardView').append(html);
		}

		for (i = 0; i < 3; i++) {
			var html = '';
			html += '<div class="item">' +
					'<div class="video"' +
					'onclick="location.href=\'https://www.youtube.com/watch?v=CPJXRRr4Q5c&feature=share\'">' +
					'<img src="https://i.ytimg.com/vi/2fpHY0ACkaE/maxresdefault.jpg">' +
					'<div class="black-layer">' +
					'<img class="ico-play" src="../../asset/images/ico_play.png">' +
					'</div>' +
					'</div>' +
					'</div>'
			$('#videoView').append(html);
		}
	}

</script>

</body>
</html>
