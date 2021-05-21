<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:건강컨텐츠</title>

	<?php
	require('head.php');
	?>

	<style>
		.swiper-container {
			width: 100%;
			background: white;
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

<div class="row">
	<div class="swiper-container">
		<div class="swiper-wrapper"  id="cardNewsImg">

		</div>
		<!-- Add Arrows -->
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		<!-- Add Pagination -->
	</div>
</div>

<script>

	var searchItems = new Object();
	searchItems.id = getParameterByName(location.search, 'id');

	fileURL.post('content/readCardNewsDetail', searchItems).then(res => {
		setCardNewsData(res.data);
		var swiper = new Swiper('.swiper-container', {
			slidesPerView: 1, //슬라이드를 한번에 3개를 보여준다
			loop: false, //loop 를 true 로 할경우 무한반복 슬라이드 false 로 할경우 슬라이드의 끝에서 더보여지지 않음
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
				observer: true,
				observeParents: true,
			},
			pagination: {
				el: '.swiper-pagination',
			},
		});
		swiper.update();
	});

	//카드뉴스 자세히 보기
	function setCardNewsData(data) {
		var bar = getParameterByName(location.search, 'm');
		if (bar == '1') {
			$('.top-bar').hide();
		} else {
			$('.top-bar').show();
			$('#cardNewsImg').css('padding-top', '5.8rem');
			$('#topTitle').text('카드뉴스');
		}

		$('#cardNewsImg').empty();
		var img = data.images;
		for (i = 0; i < img.length; i++) {
			var html = '';
			html += '<div class="swiper-slide">' +
					'<img src="https://file.dualhealth.kr/healthContent/cardNews/' + img[i] + '">' +
					'</div>'
			$('#cardNewsImg').append(html);
		}

		var tag = data.hashTags.join(", ");
		// $('#cardNewsHashTags').text(tag);
	}

</script>

</body>
</html>
