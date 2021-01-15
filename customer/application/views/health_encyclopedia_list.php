<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:공지사항</title>

	<?php
	require('head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		.cards {
			display: -webkit-flex;
			display: flex;
			-webkit-justify-content: center;
			justify-content: center;
			-webkit-flex-wrap: wrap;
			flex-wrap: wrap;
		}

		.card {
			width: 30%;
			margin: 2rem;
			position: relative;
			color: #363636;
			text-decoration: none;
			-moz-box-shadow: rgba(0, 0, 0, 0.19) 0 0 8px 0;
			-webkit-box-shadow: rgba(0, 0, 0, 0.19) 0 0 8px 0;
			box-shadow: rgba(0, 0, 0, 0.19) 0 0 8px 0;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			border-radius: 4px;
		}

		.card span {
			display: block;
		}

		.card .card-header {
			position: relative;
			height: 175px;
			overflow: hidden;
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			background-color: rgba(255, 255, 255, 0.15);
			background-blend-mode: overlay;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			border-radius: 4px;
		}

		.card .card-title {
			position: absolute;
			bottom: 0;
			width: 100%;
		}

		.card .card-title h1 {
			width: 100%;
			color: white;
			padding: 0.3rem 1.3rem 0.3rem 1rem;
			font-size: 3rem;
			background: rgba(0, 0, 0, 0.5);
			letter-spacing: -3px;
		}

		.card:hover, .card:focus {
			background: white;
			-moz-box-shadow: rgba(0, 0, 0, 0.3) 0px 0px 20px 0px;
			-webkit-box-shadow: rgba(0, 0, 0, 0.3) 0px 0px 20px 0px;
			box-shadow: rgba(0, 0, 0, 0.3) 0px 0px 20px 0px;
		}

		img {
			max-width: 100%;
		}

		* {
			-moz-transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, -moz-transform;
			-o-transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, -o-transform;
			-webkit-transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, -webkit-transform;
			transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, transform;
			-moz-transition-duration: 0.2s;
			-o-transition-duration: 0.2s;
			-webkit-transition-duration: 0.2s;
			transition-duration: 0.2s;
			-moz-transition-timing-function: linear;
			-o-transition-timing-function: linear;
			-webkit-transition-timing-function: linear;
			transition-timing-function: linear;
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
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
			<div style="height:100vh; overflow-y: scroll;min-height: 90rem;">
				<!-- 상단 메뉴 -->
				<div class="container top-menu"
					 style="background-image: url(../../asset/images/title4.jpg)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>건강정보</span>
							<span>｜</span>
							<span>질병백과</span>
						</div>
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner " style="margin: 0 auto; ">
							<span class="title">건강정보<br></span>
							Health Contents
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="/customer/health_encyclopedia_list">
								<div class="title-menu-select">
									질병백과
								</div>
							</a>

						</div>
					</div>
				</div>


				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="padding-top: 3rem">
							<div class="sub-title">질병백과</div>
						</div>
						<div class="row" style="display: block;margin-top: 5rem">
							<div class="cards" id="encyclopediaCards">
							</div>
						</div>
						<div class="row" style="margin-top: 3rem">
							<form style="margin: 0 auto; width: 85%; padding: 1rem">
								<div class="page_wrap">
									<div class="page_nation" id="paging">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<script>
	var pageNum = 0;
	var pageCount = 0;

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	userData.pageNum = pageNum;

	searchInformation(0);

	//페이징-숫자클릭
	function searchInformation(index) {
		pageNum = index;
		drawTable();
	}

	//공지 검색
	function drawTable() {
		pageNum = parseInt(pageNum);
		userData.pageNum = pageNum;

		instance.post('CU0901', userData).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 12) {
				pageCount++;
			}
			setEncyclopediaList(res.data.healthContentDTOList, pageNum);
		}).catch(function (error) {
			alert("잘못된 접근입니다.")
		});
	}

	<?php
	require('paging.js');
	?>

	//공지 테이블 셋팅
	function setEncyclopediaList(data, index) {
		setPaging(index);

		$("#encyclopediaCards").empty();

		if (data.length == 0) {
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<a class="card" href="#" onclick="detailPage(' + data[i].id + ')">' +
					'<span class="card-header"' +
					'style="background-image: url(https://file.dualhealth.kr/healthContent/images/' + data[i].fileName + ');">' +
					'<span class="card-title">' +
					'<h1>' + data[i].title + '</h1>' +
					'</span>' +
					'</span>' +
					'</a>';
			$("#encyclopediaCards").append(html);
		}

		if (data.length % 3 != 0) {
			for (i = 0; i < (data.length % 3) + 1; i++) {
				var html = '';
				html += '<a class="card" style="visibility: hidden"></a>';
				$("#encyclopediaCards").append(html);
			}
		}
	}

	//다음 페이지에 id 값 넘기기
	function detailPage(id) {
		location.href = "health_encyclopedia_detail?id=" + id;
	}

</script>

</html>
