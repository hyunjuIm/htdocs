<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:건강콘텐츠</title>

	<?php
	require('head.php');
	?>

	<style>
		@font-face {
			font-family: 'S-CoreDream-3Light';
			src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_six@1.2/S-CoreDream-3Light.woff') format('woff');
			font-weight: normal;
			font-style: normal;
		}

		@font-face {
			font-family: 'S-CoreDream-5Medium';
			src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_six@1.2/S-CoreDream-5Medium.woff') format('woff');
			font-weight: normal;
			font-style: normal;
		}

		.image {
			width: 100%;
			max-width: 75rem;
			max-height: 60rem;
			position: relative;
		}

		.image img {
			width: 100%;
			height: auto;
		}

		.image span {
			color: #7b1fe2;
			font-family: 'S-CoreDream-5Medium';
		}

		.image .text {
			position: absolute;
			top: 50%;
			left: 10%;
			transform: translate(-10%, -50%);
			font-size: 3rem;
			line-height: 4rem;
			font-family: 'S-CoreDream-3Light';
		}

		.card-img-top {
			object-fit: cover;
		}

		#encyclopediaImg {
			width: 100%;
			height: 17rem;
			object-fit: cover;
		}

		#encyclopediaImg {
			position: relative;
			width: 100%;
			height: 17rem;
		}

		#encyclopediaImg img {
			width: 100%;
			height: 17rem;
			object-fit: cover;
		}

		#encyclopediaImg > div {
			position: absolute;
			top: 0;
			left: 0;
		}
	</style>

</head>
<body>

<div class="row">
	<div class="image">
		<img src="../../asset/images/main_content.jpg">
		<div class="text">
            <span>나를 위한<br>
                맞춤형<br></span>
			건강콘텐츠
		</div>
	</div>
</div>

<!--xx님을 위한 맞춤 건강정보-->
<div class="row" style="border-bottom: 1.5rem solid whitesmoke">
	<div class="row-padding">
		<div class="row" style="display: inline-block">
			<div class="title1" style="float: left">
				<span id="name"></span>님을 위한 맞춤 건강정보
			</div>
			<div style="float: right;margin-top: 0.8rem;padding-right: 2rem">
				<a class="more" href="/app/custom">
					more
					<span style="font-size: 1.1rem">
                        <i class="ri-arrow-right-s-line"></i>
                    </span>
				</a>
			</div>
		</div>

		<div class="row title2">
			카드뉴스
		</div>
		<div class="row">
			<div class="contents" id="customCardView">

			</div>
		</div>

		<div class="row title2">
			동영상
		</div>
		<div class="row">
			<div class="contents" id="customVideoView">

			</div>
		</div>
	</div>
</div>

<!-- 알아두면 쓸모있는 건강정보-->
<div class="row">
	<div class="row-padding" style="padding-bottom: 7rem">
		<div class="row" style="display: inline-block">
			<div class="title1" style="float: left">
				알아두면 쓸모있는 건강정보
			</div>
			<div style="float: right;margin-top: 0.8rem;padding-right: 2rem">
				<a class="more" href="/app/all">
					more
					<span style="font-size: 1.1rem">
                        <i class="ri-arrow-right-s-line"></i>
                    </span>
				</a>
			</div>
		</div>


		<div class="row title2" style="padding: 2rem 0 0.5rem 0;font-weight: 400">
			카드뉴스
		</div>
		<div class="row">
			<div class="contents" id="allCardView">

			</div>
		</div>

		<div class="row title2">
			동영상
		</div>
		<div class="row">
			<div class="contents" id="allVideoView">

			</div>
		</div>

		<div class="row title2">
			질병사전
		</div>

		<div style="padding-right: 2rem">
			<div id="allEncyclopediaView" style="width: 100%;padding: 1rem 0">

			</div>
			<div id="encyclopediaImg">

			</div>
		</div>
	</div>
</div>

<script>

	setCustomContentView();
	setAllContentView();

	sessionStorage.removeItem('searchKeyword');
	sessionStorage.removeItem('category');
	sessionStorage.setItem('cardIndex', 0);
	sessionStorage.setItem('videoIndex', 0);
	sessionStorage.setItem('encyclopediaIndex', 0);

	$('#name').text(sessionStorage.getItem('userName'));

	//맞춤 정보 호출
	function setCustomContentView() {
		$('#customCardView').empty();
		$('#customVideoView').empty();

		fileURL.get('content/readCardNewsByHashTag', {
			params: {
				id: sessionStorage.getItem('userID'),
				hashTags: sessionStorage.getItem('hashTags')
			}
		}).then(res => {
			var html = setCardNewsListData(res.data.cardNewsList);
			$('#customCardView').append(html);
		});

		fileURL.get('content/readYouTubeByHashTag', {
			params: {
				id: sessionStorage.getItem('userID'),
				hashTags: sessionStorage.getItem('hashTags')
			}
		}).then(res => {
			var html = setVideoListData(res.data.youTubeList);
			$('#customVideoView').append(html);
		});
	}

	//모든 정보 호출
	function setAllContentView() {
		$('#allCardView').empty();
		$('#allVideoView').empty();
		$('#allEncyclopediaView').empty();

		var searchItems = new Object();
		searchItems.page = 0;

		fileURL.post('content/readAllCardNews', searchItems).then(res => {
			var html = setCardNewsListData(res.data.cardNewsList);
			$('#allCardView').append(html);
		});

		fileURL.post('content/readAllYouTube', searchItems).then(res => {
			var html = setVideoListData(res.data.youTubeList);
			$('#allVideoView').append(html);
		});

		var userData = new Object();
		userData.pageNum = 0;

		instance.post('CU0901', userData).then(res => {
			setEncyclopediaListData(res.data.healthContentDTOList);
		});
	}

	function setCardNewsListData(data) {
		var html = '';
		for (i = 0; i < data.length; i++) {
			var img = 'https://file.dualhealth.kr/healthContent/cardNews/' + data[i].thumbNail;

			html += '<div class="item">' +
				'<div class="card" onclick="detailCardNews(\'' + data[i].id + '\')">' +
				'<img src="' + img + '" class="card-img-top">' +
				'<div class="card-body">' + data[i].title + '</div>' +
				'</div>' +
				'</div>';
		}
		return html;
	}

	function setVideoListData(data) {
		var html = '';
		for (i = 0; i < data.length; i++) {
			var src = 'https://img.youtube.com/vi/' + getParameterByName(data[i].url, 'v') + '/original.jpg'

			html += '<div class="item">' +
				'<div class="video"' +
				'onclick="location.href=\'' + data[i].url + '\'">' +
				'<img src=' + src + '>' +
				'<div class="black-layer">' +
				'<img class="ico-play" src="../../asset/images/ico_play.png">' +
				'</div>' +
				'</div>' +
				'<div class="video-title">' + data[i].title + '</div>' +
				'</div>'
		}
		return html;
	}

	function setEncyclopediaListData(data) {
		for (i = 0; i < 6; i++) {
			var html = '';

			html += '<div class="encyclopedia-btn" ' +
				'onclick="detailEncyclopediaPage(\'' + data[i].id + '\')">#' + data[i].title + '</div>';

			$('#allEncyclopediaView').append(html);

			var html = '';
			var src = 'https://file.dualhealth.kr/healthContent/images/' + data[i].fileName;

			html += '<div>' +
				'<img src=' + src + '>' +
				'</div>';

			$('#encyclopediaImg').append(html);
			$("#encyclopediaImg > div:gt(0)").hide();
		}
	}

	//이미지 슬라이드
	setInterval(function () {
		$('#encyclopediaImg > div:first')
			.fadeOut(1000)
			.next()
			.fadeIn(1000)
			.end()
			.appendTo('#encyclopediaImg');
	}, 3000);


</script>


</body>
</html>
