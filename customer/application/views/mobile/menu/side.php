<div class="navbar">
	<div id="nav-toggle" ng-click="toggleNav = !toggleNav; animate = !animate" ng-class="{'active': animate}">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div>
</div>
<div id="mobile-nav-menu" ng-show="toggleNav">

	<form style="padding: 3rem 2.5rem">
		<div style="margin-bottom: 2rem;text-align: left">
			<span id="nameView"></span>
			님 환영합니다.
		</div>

		<div style="width: 100%;margin-bottom: 2rem">
			<div class="reservation-card-content">
				<div id="carouselReservationControls" class="carousel slide" data-ride="carousel"
					 style="height: inherit; display: table-cell; vertical-align: middle;
					 color: black;">
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
			<div style="color: #c4c4c4">
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
		<ul id="nav" ng-click="close()">
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
					<li class="sub-menu"><a href="#">공지사항</a></li>
					<li class="sub-menu"><a href="#">병원별 검진 항목 비교</a></li>
					<li class="sub-menu"><a href="#">건강검진 안내</a></li>
				</ul>
			</li>
			<li class="main-menu"><a class="main-menu-item" href="#">고객센터</a>
				<ul>
					<li class="sub-menu"><a href="#">자주 묻는 질문</a></li>
					<li class="sub-menu"><a href="#">1:1 문의</a></li>
					<li class="sub-menu"><a href="#">내 문의 내역</a></li>
				</ul>
			</li>
		</ul>
	</form>

	<form class="footer">
		<div class="footer-top">
			<div>
				서비스이용약관
			</div>
			<div style="padding: 0 1rem; color: #c4c4c4">
				|
			</div>
			<div>
				개인정보처리방침
			</div>
		</div>
		<div class="footer-middle">
			<div style="font-size: 1.4rem; color: black;margin-bottom: 0.3rem;font-weight: 400">
				(주) 듀얼헬스케어
			</div>
			<div>
				대표자 : 김영이 <br>
				사업자등록번호 : 111-86-01943 <br>
				대전광역시 유성구 대덕대로 512번길 20 <br>
				(도룡동, 2층) <br>
				copyrightⓒdualhealthcare
			</div>
		</div>
	</form>
</div>

<script>
	var menu = angular.module("menu", ["ngAnimate"]);

	menu.controller("mainCtrl", function ($scope) {

		//Mobile menu default = hidden
		$scope.toggleNav = false;

		//Hamburger icon default
		$scope.animate = false;

	});

	$(document).ready(function () {
		$('#nav > li > a').click(function () {
			$(this).next().slideToggle(300);
			$(this).addClass('active');
			// $(this).css("background", "#f2f2f2");
			// $(this).css("border-left", "7px solid #5849ea");

			$('#nav > li > a').not(this).next().slideUp(300);
		});
	});
</script>
