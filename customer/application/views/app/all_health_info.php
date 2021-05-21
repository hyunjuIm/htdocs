<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:건강컨텐츠</title>

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
			margin: 1rem 0;
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
			min-height: 6rem;
			text-align: center;
		}

		.card img {
			width: 100%;
			object-fit: cover;
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

		#cardView td {
			width: 50%;
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
		/*.show {*/
		/*	left: 0%;*/
		/*	opacity: 1;*/
		/*	overflow: hidden;*/
		/*}*/

		/*.hide {*/
		/*	opacity: 0;*/
		/*	left: 100%;*/
		/*}*/

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

		.top-btn {
			display: inline-block;
			position: fixed;
			bottom: 10px;
			right: 10px;
			z-index: 999999;
			font-size: 3rem;
			color: #FFFFF2;
			background: #FFBC42;
			width: 5rem;
			height: 5rem;
			line-height: 5rem;
			text-align: center;
			border-radius: 50%;
			box-shadow: 0px 0px 5px #a3a1a1;
		}

		.top-btn i:hover {
			color: white;
		}

		#searchForm {
			animation: slide-in-right .5s cubic-bezier(.25, .46, .45, .94) both;
		}

		@keyframes slide-in-right {
			0% {
				transform: translateX(1000px);
				opacity: 0
			}
			100% {
				transform: translateX(0);
				opacity: 1
			}
		}
	</style>

</head>
<body>

<div class="wrapper">
	<div class="main" id="contentView">
		<header>
			<?php
			require('header.php');
			?>
		</header>

		<a class="top-btn" href="#">
			<i class="ri-arrow-up-line"></i>
		</a>

		<div class="row" style="padding-top: 5.8rem;">
			<div class="tab">
				<ul class="tabs">
					<li><a href="#" id="cardTab">카드뉴스</a></li>
					<li><a href="#" id="videoTab">동영상</a></li>
					<li><a href="#" id="encyclopediaTab">질병백과</a></li>
				</ul> <!-- / tabs -->

				<div class="row" style="margin-top:7rem;overflow-y: auto; -webkit-overflow-scrolling:touch;">
					<div class="search-box" id="searchBox">
						<input type="text" id="keyword" placeholder="키워드를 검색해보세요." readonly>
						<i class="ri-search-line"></i>
					</div>
				</div>

				<div class="tab_content" style="margin-bottom: 5rem">
					<div class="tabs_item">
						<table id="cardView">
						</table>
					</div>

					<div class="tabs_item">
						<table id="videoView">
						</table>
					</div>

					<div class="tabs_item">
						<table id="encyclopediaView">
						</table>
					</div>

					<div class="row" id="btnLoad" style="margin-bottom:2rem;padding: 0 0.5rem">
						<div class="more-load-btn" onclick="loadIndex()">
							더 보기
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--검색-->
	<div class="mobile-nav" id="searchForm" style="display: none">
		<div class="row top-bar" style="border: none;position: relative">
			<div class="left" id="back">
				<i class="ri-arrow-left-line"></i>
			</div>
		</div>

		<div class="row row-padding" style="border-bottom: 0.7rem solid whitesmoke">
			<h2>키워드를 검색해보세요.</h2>
			<div class="keyword-search">
				<div class="search-box"
					 style="width: 100%;padding: 0;display: inline-block;vertical-align: middle!important;">
					<input type="text" id="searchKeyword" onkeyup="enterKey()" style="font-size: 1.6rem">
					<a onclick="searchKeywordData($('#searchKeyword').val())"
					   style="width: fit-content;height:fit-content;font-size: 2rem">
						<i class="ri-search-line"></i>
					</a>
				</div>
			</div>

			<!--			<div class="row row-padding">-->
			<!--				<h3>추천검색어</h3>-->
			<!---->
			<!--				<div style="padding-top: 1rem">-->
			<!--					<div style="width: 100%;padding: 1rem 0">-->
			<!--						<div class="encyclopedia-btn">식도암</div>-->
			<!--						<div class="encyclopedia-btn">심근경색</div>-->
			<!--						<div class="encyclopedia-btn">골다공증</div>-->
			<!--						<div class="encyclopedia-btn">알츠하이머</div>-->
			<!--						<div class="encyclopedia-btn">위염</div>-->
			<!--					</div>-->
			<!--				</div>-->
			<!--			</div>-->
		</div>

	</div><!-- wrapper -->
</div>

<script>

	var search = false;

	//카테고리 클릭
	(function ($) {

		$('.tab ul.tabs').addClass('active').find('> li:eq(\'' + categoryNum + '\')').addClass('current');

		$('.tab ul.tabs li a').click(function (g) {
			var tab = $(this).closest('.tab'),
					index = $(this).closest('li').index();

			categoryNum = index;
			setLoadBtn(1);

			tab.find('ul.tabs > li').removeClass('current');
			$(this).closest('li').addClass('current');

			tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').hide();
			tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').show();

			g.preventDefault();
		});

		$('#searchBox').on('click', function () {
			$('#searchForm').show();
			$('#contentView').hide();
		})

		$('#back').on('click', function () {
			$('#searchForm').hide();
			$('#contentView').show();
		})

		if (Object.keys(sessionStorage).includes('searchKeyword') || sessionStorage.getItem('searchKeyword') !== null) {
			searchKeywordData(sessionStorage.getItem('searchKeyword'));
		} else {
			const timer = ms => new Promise(res => setTimeout(res, ms))

			async function load(category, index) {
				for (var k = 0; k < (index + 1); k++) {
					startIndex(k, category);
					await timer(100);
				}
			}

			load(0, cardIndex++);
			load(1, videoIndex++);
			load(2, encyclopediaIndex++);
		}

		if (categoryNum == 0) {
			$('#cardTab').trigger("click");
		} else if (categoryNum == 1) {
			$('#videoTab').trigger("click");
		} else if (categoryNum == 2) {
			$('#encyclopediaTab').trigger("click");
		}

		// $(window).scroll(function () {
		// 	var me = ($(window).scrollTop());
		// 	var bottom = ($(document).height() - $(window).height());
		// 	if (me === bottom) {
		// 		viewScroll = true;
		// 		if (categoryNum == 0) {
		// 			startIndex(cardIndex, 0);
		// 			cardIndex++;
		// 		} else if (categoryNum == 1) {
		// 			startIndex(videoIndex, 1);
		// 			videoIndex++;
		// 		} else if (categoryNum == 2) {
		// 			startIndex(encyclopediaIndex, 2);
		// 			encyclopediaIndex++;
		// 		}
		// 	}
		// 	console.log(me);
		// 	console.log(bottom);
		// });

	})(jQuery);

	function loadIndex() {
		if (categoryNum == 0) {
			startIndex(cardIndex, 0);
			cardIndex++;
		} else if (categoryNum == 1) {
			startIndex(videoIndex, 1);
			videoIndex++;
		} else if (categoryNum == 2) {
			startIndex(encyclopediaIndex, 2);
			encyclopediaIndex++;
		}
	}

	function startIndex(index, category) {
		if (category == 0) {
			var searchItems = new Object();
			searchItems.page = index;
			fileURL.post('content/readAllCardNews', searchItems).then(res => {
				setCardNewsListData(res.data.cardNewsList);
			});
		} else if (category == 1) {
			var searchItems = new Object();
			searchItems.page = index;
			fileURL.post('content/readAllYouTube', searchItems).then(res => {
				setVideoListData(res.data.youTubeList);
			});
		} else if (category == 2) {
			var searchItems = new Object();
			searchItems.pageNum = index;
			instance.post('CU0901', searchItems).then(res => {
				setEncyclopediaView(res.data.healthContentDTOList);
			});
		}
	}

	//검색 - 엔터키
	function enterKey() {
		var value = $('#searchKeyword').val();
		if (window.event.keyCode == 13) {
			// 엔터키가 눌렸을 때 실행할 내용
			searchKeywordData(value);
		}
	}

	function searchKeywordData(value) {
		sessionStorage.setItem('searchKeyword', value);
		sessionStorage.setItem('cardIndex', 0);
		sessionStorage.setItem('videoIndex', 0);
		sessionStorage.setItem('encyclopediaIndex', 0);
		sessionStorage.setItem('category', 0);

		search = true;
		$('#keyword').val(value);

		$('#searchForm').hide();
		$('#btnLoad').hide();
		$('#contentView').show();

		$('#cardView').empty();
		$('#videoView').empty();

		fileURL.get('content/readCardNewsByTitle', {
			params: {
				id: sessionStorage.getItem('userID'),
				title: value
			}
		}).then(res => {
			var data = res.data.cardNewsList;
			if (data.length < 1) {
				var html = '<tr><td>검색 결과가 없습니다.</td></tr>';
				$('#cardView').html(html);
				return false;
			} else {
				setCardNewsListData(data);
			}
		});

		fileURL.get('content/readYouTubeByHashTag', {
			params: {
				id: sessionStorage.getItem('userID'),
				hashTags: value
			}
		}).then(res => {
			var data = res.data.youTubeList;
			if (data.length < 1) {
				var html = '<tr><td>검색 결과가 없습니다.</td></tr>';
				$('#videoView').html(html);
				return false;
			} else {
				setVideoListData(data);
			}
		});
	}

	function setCardNewsListData(data) {
		setLoadBtn(data.length);

		var html = '';
		for (i = 0; i < data.length; i++) {
			if (i % 2 == 0) {
				html += '<tr>';
			}
			var img = 'https://file.dualhealth.kr/healthContent/cardNews/' + data[i].thumbNail;

			html += '<td>' +
					'<div class="card"' +
					'onclick="detailCardNews(\'' + data[i].id + '\');saveSessionState(0, cardIndex);">' +
					'<img src="' + img + '" class="card-img-top">' +
					'<div class="card-body">' + data[i].title + '</div>' +
					'</div>' +
					'</td>';

			if (i % 2 != 0) {
				html += '</tr>';
			} else if (i == (data.length - 1)) {
				html += '<td></td>';
			}
		}
		$('#cardView').append(html);
	}

	function setVideoListData(data) {
		setLoadBtn(data.length);

		var html = '';
		for (i = 0; i < data.length; i++) {
			var src = 'https://img.youtube.com/vi/' + getParameterByName(data[i].url, 'v') + '/original.jpg'

			html += '<tr>' +
					'<td>' +
					'<div class="video"' +
					'onclick="saveSessionState(1, videoIndex);detailVideoPage(\'' + data[i].url + '\')">' +
					'<img src=' + src + '>' +
					'<div class="black-layer">' +
					'<img class="ico-play" src="../../asset/images/ico_play.png">' +
					'</div>' +
					'</div>' +
					'<div style="margin-top: 1rem">' +
					'<h3>' + data[i].title + '</h3>' +
					'</div>' +
					'</td>' +
					'</tr>'
		}
		$('#videoView').append(html);
	}

	//다음 페이지에 id 값 넘기기
	function detailVideoPage(url) {
		location.href = "video?v=" + getParameterByName(url, 'v');
	}

	function setEncyclopediaView(data) {
		setLoadBtn(data.length);

		var html = '';
		for (i = 0; i < data.length; i++) {
			var src = 'https://file.dualhealth.kr/healthContent/images/' + data[i].fileName;

			html += '<tr>' +
					'<td>' +
					'<div class="encyclopedia"' +
					'onclick="saveSessionState(2, encyclopediaIndex);detailEncyclopediaPage(\'' + data[i].id + '\')"' +
					' style="background-image: url(' + src + ');' +
					'background-size: auto 100%;background-position: center">' +
					'<div class="black-layer">' + data[i].title + '</div>' +
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

	function setLoadBtn(size) {
		if (size < 1 || search) {
			$('#btnLoad').hide();
		} else {
			$('#btnLoad').show();
		}
	}

</script>

</div>
</body>
</html>
