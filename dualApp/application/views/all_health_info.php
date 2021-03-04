<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:건강콘텐츠</title>

	<?php
	require('head.php');
	?>

	<style>

		.wrapper {
			width: 100%;
			max-width: 50rem;
			margin: 0 auto;
		}

		table {
			width: 100%;
		}

		ul {
			padding: 0;
		}

		.tab {
			width: 100%;
			position: relative;
			overflow: hidden;
			background: #fff;
		}

		.tabs {
			display: table;
			/*position: relative;*/
			overflow: hidden;
			margin: 0;
			width: 100%;
			max-width: 50rem;
			z-index: 9999;
			position: fixed;
			background: white;
		}

		.tabs li {
			width: calc(100% / 3);
			float: left;
			line-height: 38px;
			overflow: hidden;
			padding: 0;
			position: relative;
		}

		.tabs a {
			color: #888;
			display: block;
			letter-spacing: 0;
			outline: none;
			padding: 0.5rem 2rem;
			text-decoration: none;
			-webkit-transition: all 0.2s ease-in-out;
			-moz-transition: all 0.2s ease-in-out;
			transition: all 0.2s ease-in-out;
			border-bottom: 1px solid #EEEEEE;
			text-align: center;
			font-size: 1.5rem;
		}

		.tabs_item {
			padding: 1rem;
			display: none;
			margin: 1rem 0 5rem 0;
		}

		.tabs_item:first-child {
			display: block;
		}

		.current a {
			border-bottom: 1px solid #5849ea;
			font-weight: 600;
			color: #5849ea;
		}

		.search-box {
			padding: 1rem 2rem;
			background: whitesmoke;
			display: inline-block;
			border-radius: 7px;
			margin: 0 auto;
			width: 90%;
		}

		.search-box input {
			font-size: 1.4rem;
			border: none;
			outline: none;
			background: none;
			vertical-align: middle;
			width: 90%;
			float: left;
		}

		.search-box i {
			vertical-align: middle;
			float: right;
		}

		.card {
			width: 100%;
			min-width: 100%;
			max-width: 100%;
			box-shadow: 0px 0px 10px #c2c2c2;
		}

		.card .card-body {
			font-size: 1.5rem;
			min-height: 6rem;
			text-align: center;
		}

		.video {
			width: 100%;
			height: auto;
			box-shadow: none;
		}

		.video .black-layer {
			background: rgba(0, 0, 0, 0);
			box-shadow: none;
		}

		.more-load-btn {
			width: 95%;
			border: 1px solid #DCDCDC;
			color: grey;
			border-radius: 7px;
			display: inline-block;
			padding: 1rem 2rem;
			text-align: center;
			margin: 0 auto;
		}

		#cardView td, #encyclopediaView td {
			padding: 0.7rem;
		}

		#videoView td {
			padding: 1rem 0.7rem;
		}

		.wrapper {
			position: relative;
			overflow: hidden;
			color: black;
		}

		/*nav menu*/
		.show {
			left: 0%;
			opacity: 1;
			overflow: hidden;
		}

		.hide {
			opacity: 0;
			left: 100%;
		}

		.mobile-nav {
			background: white;
			/*position: absolute;*/
			top: 0;
			width: 100%;
			max-width: 50rem;
			height: 100%;
			text-align: center;
			transition: .5s ease;
			z-index: 999999;
			position: fixed;
			color: black;
		}

		.row-padding {
			padding: 2rem;
			color: black;
		}

		.keyword-search {
			padding: 1rem;
			width: 100%;
			background: #f7f6fb;
			outline: none;
			border: none;
			font-weight: 300;
			border-radius: 5px;
		}

	</style>

</head>
<body>

<div class="wrapper">
	<div class="main">
		<header>
			<?php
			require('header.php');
			?>
		</header>

		<div class="row" style="padding-top: 5.8rem;">
			<div class="tab">
				<ul class="tabs">
					<li><a href="#" id="cardTab">카드뉴스</a></li>
					<li><a href="#" id="videoTab">동영상</a></li>
					<li><a href="#" id="encyclopediaTab">질병백과</a></li>
				</ul> <!-- / tabs -->

				<div class="row" style="margin-top:7rem">
					<div class="search-box" id="searchBox">
						<input type="text" placeholder="키워드를 검색해보세요." readonly>
						<i class="ri-search-line"></i>
					</div>
				</div>

				<div class="tab_content">
					<div class="tabs_item">
						<table id="cardView">
						</table>

						<div class="row" style="margin-top:2rem">
							<div class="more-load-btn" onclick="setCardView()">
								더 보기
							</div>
						</div>
					</div>

					<div class="tabs_item">
						<table id="videoView">
						</table>

						<div class="row" style="margin-top:2rem">
							<div class="more-load-btn" onclick="setVideoView()">
								더 보기
							</div>
						</div>
					</div>

					<div class="tabs_item">
						<table id="encyclopediaView">
						</table>

						<div class="row" style="margin-top:2rem">
							<div class="more-load-btn" onclick="setEncyclopediaView()">
								더 보기
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!--검색-->
	<div class="mobile-nav hide" id="searchForm">
		<div class="row top-bar" style="border: none;position: relative">
			<div class="left" id="back">
				<i class="ri-arrow-left-line"></i>
			</div>
		</div>

		<div class="row row-padding" style="border-bottom: 0.7rem solid whitesmoke">
			<h2>키워드를 검색해보세요.</h2>
			<input type="text" class="keyword-search" style="margin-top: 1.5rem">
		</div>

		<div class="row row-padding">
			<h3>추천검색어</h3>

			<div style="padding-top: 1rem">
				<div style="width: 100%;padding: 1rem 0">
					<div class="encyclopedia-btn">식도암</div>
					<div class="encyclopedia-btn">심근경색</div>
					<div class="encyclopedia-btn">골다공증</div>
					<div class="encyclopedia-btn">알츠하이머</div>
					<div class="encyclopedia-btn">위염</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- wrapper -->

<script>

	(function () {
		$('#searchBox').on('click', function () {
			$('#searchForm').toggleClass('hide show');
		})
	})();

	(function () {
		$('#back').on('click', function () {
			$('#searchForm').toggleClass('hide show');
		})
	})();

	var cardIndex = parseInt(sessionStorage.getItem('cardIndex'));
	var videoIndex = parseInt(sessionStorage.getItem('videoIndex'));
	var encyclopediaIndex = parseInt(sessionStorage.getItem('encyclopediaIndex'));
	var categoryNum = parseInt(sessionStorage.getItem('category'));

	$(document).ready(function () {
		console.log(categoryNum);
		if (categoryNum == null) {
			categoryNum = 0;
		}
		console.log(categoryNum);

		(function ($) {
			$('.tab ul.tabs').addClass('active').find('> li:eq(\'' + categoryNum + '\')').addClass('current');

			$('.tab ul.tabs li a').click(function (g) {
				var tab = $(this).closest('.tab'),
						index = $(this).closest('li').index();

				tab.find('ul.tabs > li').removeClass('current');
				$(this).closest('li').addClass('current');

				tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').hide();
				tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').show();

				g.preventDefault();
			});
		})(jQuery);

		cardIndex = startIndex(cardIndex, 0);
		videoIndex = startIndex(videoIndex, 1);
		encyclopediaIndex = startIndex(encyclopediaIndex, 2);

		if(categoryNum == 0) {
			$('#cardTab').trigger("click");
		} else if(categoryNum == 1) {
			$('#videoTab').trigger("click");
		} else if(categoryNum == 2) {
			$('#encyclopediaTab').trigger("click");
		}
	});

	function startIndex(index, category) {
		var count = parseInt(index / 6);
		if (index % 6 > 0) {
			count += 1;
		} else if (count == 0) {
			count = 1;
		}

		for (k = 0; k < count; k++) {
			if (category == 0) {
				setCardView();
			} else if (category == 1) {
				setVideoView();
			} else if (category == 2) {
				setEncyclopediaView();
			}
		}

		console.log(index, category);

		return 0;
	}

	function setCardView() {
		var html = '';
		for (i = 0; i < 6; i++) {
			if (i % 2 == 0) {
				html += '<tr>';
			}
			cardIndex += 1;

			html += '<td>' +
					'<div class="card"' +
					'onclick="saveSessionState(0, \'' + cardIndex + '\', );' +
					'location.href=\'/content/card\'">' +
					'<img src="http://placeimg.com/640/480/any" class="card-img-top">' +
					'<div class="card-body">' +
					'카드뉴스 제목' +
					'</div>' +
					'</div>' +
					'</td>';

			if (i % 2 != 0 || i == 5) {
				html += '</tr>';
			}
		}

		$('#cardView').append(html);
	}

	function setVideoView() {
		var html = '';
		for (i = 0; i < 6; i++) {
			videoIndex += 1;
			html += '<tr>' +
					'<td>' +
					'<div class="video"' +
					'onclick="saveSessionState(1, \'' + videoIndex + '\');' +
					'location.href=\'https://www.youtube.com/watch?v=CPJXRRr4Q5c&feature=share\'">' +
					'<img src="https://i.ytimg.com/vi/CPJXRRr4Q5c/maxresdefault.jpg">' +
					'<div class="black-layer">' +
					'<img class="ico-play" src="../../asset/img/ico_play.png">' +
					'</div>' +
					'</div>' +
					'<div style="margin-top: 1rem">' +
					'<h3>직장인을 위한 사무실 스트레칭</h3>' +
					'</div>' +
					'</td>' +
					'</tr>'
		}

		$('#videoView').append(html);
	}

	function setEncyclopediaView() {
		var html = '';
		for (i = 0; i < 6; i++) {
			encyclopediaIndex += 1;
			html += '<tr>' +
					'<td>' +
					'<div class="encyclopedia"' +
					'onclick="saveSessionState(2, \'' + encyclopediaIndex + '\');' +
					'location.href=\'/content/encyclopedia\'"' +
					' style="background-image: url(https://file.dualhealth.kr/healthContent/images/39_image.jpg);' +
					'background-size: auto 100%;background-position: center">' +
					'<div class="black-layer">' +
					'식도암' +
					'</div>' +
					'</div>' +
					'</td>' +
					'</tr>'
		}
		$('#encyclopediaView').append(html);
	}

	function saveSessionState(category, num) {
		sessionStorage.setItem('category', category);

		if (category == 0) {
			sessionStorage.setItem('cardIndex', num);
		} else if (category == 1) {
			sessionStorage.setItem('videoIndex', num);
		} else if (category == 2) {
			sessionStorage.setItem('encyclopediaIndex', num);
		}
	}
</script>

</body>
</html>
