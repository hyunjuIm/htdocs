<style>
	/*사이드바 전체*/
	.bd-sidebar {
		position: sticky;
		height: 100vh;
		min-width: 320px;
		max-width: 320px;
		color: black;
		text-align: center;
		font-weight: 400;
		background-color: white;
		box-shadow: 0px 0px 10px #c6c6c6;
	}

	/*예약현황*/
	.reservation-card-top {
		padding: 5px;
		background: #5849ea;
		color: white;
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;
	}

	.reservation-card-content {
		padding: 5px;
		background: white;
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
		height: 100px;
		color: black;
		font-size: 15px;
		display: table;
		width: inherit;
	}

	.slick-prev:before, .slick-next:before {
		font-size: 40px;
		line-height: 1;
		color: gray;
		opacity: 0.8;
	}

	.slick-prev:before {
		content: "‹";
	}

	.slick-next:before {
		content: "›";
	}

	/*내정보관리*/
	.my-info-box {
		padding: 5px 0;
		border: #cccccc solid 1px;
		font-size: 14px;
		display: flex;
	}

	.my-info-box a {
		color: black;
	}

	/*사이드 메뉴*/
	ul, li {
		list-style-type: none;
		padding-left: 0px;
	}

	#nav {
		border-top: 1px solid #cccccc;
	}

	#nav li a {
		display: block;
		padding: 11px 40px;
		text-decoration: none;
		color: black;
		text-align: left;
	}

	#nav li a:hover {
		color: #5645ED;
	}

	#nav li ul {
		display: none;
	}

	.main-menu {
		border-bottom: 1px solid #cccccc;
	}

	.sub-menu {
		padding-left: 30px;
		border-bottom: none;
		color: #5645ED;
	}

	.main-menu a:hover, .sub-menu:hover {
		background: #f2f2f2;
	}

	/*푸터 : 회사정보*/
	.footer {
		width: 100%;
		font-size: 13px;
		text-align: left;
		color: #828282;
		position: absolute;
		bottom: 0px;
		background: white;
	}

	.footer-top {
		display: flex;
		border-top: 1px solid #cccccc;
		padding: 8px 27px;
	}

	.footer-middle {
		border-top: 1px solid #cccccc;
		padding: 15px 27px 20px;
		font-size: 12px;
	}

</style>

<div class="col bd-sidebar side" style="padding: 0;" >
	<form style="padding: 35px 25px">
		<div style="margin-bottom: 40px">
			<a href="/"> <img src="/asset/images/logo_light.png"> </a>
		</div>
		<div style="margin-bottom: 20px">
			<span id="nameView" style="font-weight: bolder"></span>
			님 환영합니다.
		</div>

		<div style="width: 100%;margin-bottom: 20px;border-radius: 10px;box-shadow: 0px 0px 10px #c6c6c6;">
			<div class="reservation-card-top">
				예약현황
			</div>
			<div class="reservation-card-content">
				<div id="carouselReservationControls" class="carousel slide" data-ride="carousel"
					 style="height: inherit; display: table-cell; vertical-align: middle;
					 color: black; font-size: 16px;">
					<div id="userScheduleInfos" class="carousel-inner">

					</div>
					<a class="carousel-control-prev" href="#carouselReservationControls" role="button"
					   data-slide="prev">
						<span class="slick-prev" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselReservationControls" role="button"
					   data-slide="next">
						<span class="slick-next" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>

		<div class="my-info-box">
			<a href="/customer/my_page" style="width: 50%;cursor: pointer">
				<div>
					내정보관리
				</div>
			</a>
			<div style="color: #cccccc">
				|
			</div>
			<a style="width: 50%;cursor: pointer">
				<div onclick="customerLogout()">
					로그아웃
				</div>
			</a>
		</div>
	</form>

	<form>
		<ul id="nav">
			<li class="main-menu"><a class="main-menu-item" href="#">예약서비스</a>
				<ul>
					<li class="sub-menu"><a href="#">검진예약</a></li>
					<li class="sub-menu"><a href="#">예약현황</a></li>
				</ul>
			</li>
			<li class="main-menu"><a class="main-menu-item" href="#">검진결과</a>
			</li>
			<li class="main-menu"><a class="main-menu-item" href="#">건강정보</a>
				<ul>
					<li class="sub-menu"><a href="#">질병백과</a></li>
				</ul>
			</li>
			<li class="main-menu"><a class="main-menu-item" href="#">이용안내</a>
				<ul>
					<li class="sub-menu"><a href="#">병원별 검진 비교</a></li>
					<li class="sub-menu"><a href="#">공지사항</a></li>
					<li class="sub-menu"><a href="#">검강검진안내</a></li>
				</ul>
			</li>
			<li class="main-menu"><a class="main-menu-item" href="#">고객센터</a>
				<ul>
					<li class="sub-menu"><a href="#">자주 묻는 질문</a></li>
					<li class="sub-menu"><a href="#">1:1 문의</a></li>
				</ul>
			</li>
		</ul>
	</form>

	<form class="footer">
		<div class="footer-top">
			<div>
				서비스이용약관
			</div>
			<div style="padding: 0 10px; color: #cccccc">
				|
			</div>
			<div>
				개인정보처리방침
			</div>
		</div>
		<div class="footer-middle">
			<div style="font-size: 14px; color: black;margin-bottom: 3px;font-weight: 400">
				(주) 듀얼헬스케어
			</div>
			<div>
				대표자 : 김영이 <br>
				사업자등록번호 : 111-86-01943 <br>
				주소 : 대전광역시 유성구 대덕대로 512번길 20 <br>
				(도룡동, 2층) <br>
				copyrightⓒdualhealthcare
			</div>
		</div>
	</form>
</div>

<script>
	$(document).ready(function () {
		//사이드바 메뉴
		$('#nav > li > a').hover(function () {
			$(this).next().slideDown(300);
			$(this).css("background", "#f2f2f2");
			$(this).css("border-left", "7px solid #5849ea");

			$('#nav li a').not(this).next().slideUp(300);
			$('#nav li a').not(this).css("background", "none");
			$('#nav li a').not(this).css("border-left", "none");
		}, function () {
			$('.main-menu').css("color", "white");
			$('.main-menu').hover(function () {
			}, function () {
				$('#nav li a').next().slideUp(300);
				$('#nav li a').not(this).css("background", "none");
				$('#nav li a').not(this).css("border-left", "none");
			});
		});
	});
</script>
