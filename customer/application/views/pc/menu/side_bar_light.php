<style>
	/*사이드바 전체*/
	.bd-sidebar {
		position: sticky;
		height: 100vh;
		min-height: 90rem;
		min-width: 30rem;
		max-width: 30rem;
		color: black;
		text-align: center;
		font-weight: 400;
		font-size: 1.5rem;
		background-color: white;
		/*background-image: linear-gradient(to bottom, #dfe2ef 0%, #e0e2ef 1%, #f6ecfa 80%);*/
		box-shadow: 0px 0px 10px #c1c1c1;
	}

	/*로고*/
	.logo {
		width: fit-content;
		cursor: pointer;
	}

	/*이름*/
	#nameView {
		font-size: 1.6rem;
	}

	/*예약현황*/
	.reservation-card-top {
		padding: 0.5rem;
		background: #5849ea;
		color: #f7f7f7;
		font-size: 1.5rem;
		border-top-left-radius: 1rem;
		border-top-right-radius: 1rem;
	}

	.reservation-card-content {
		padding: 0.3rem;
		background: white;
		font-size: 1.5rem;
		border-bottom-left-radius: 1rem;
		border-bottom-right-radius: 1rem;
		height: 10rem;
		color: black;
		display: table;
		width: inherit;
	}

	.slick-prev:before, .slick-next:before {
		font-size: 4rem;
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
		padding: 0.5rem 0;
		border: #c4c4c4 solid 1px;
		font-size: 1.3rem;
		display: flex;
	}

	.my-info-box a {
		color: black;
	}

	/*사이드 메뉴*/
	ul, li {
		/*list-style-type: none;*/
		padding-left: 0px;
	}

	#nav {
		border-top: 1px solid #c4c4c4;
	}

	#nav li a {
		display: block;
		padding: 1.1rem 4rem;
		text-decoration: none;
		color: black;
		text-align: left;
	}

	#nav li a:hover, #nav li a:active {
		color: #5645ED;
	}

	#nav li ul {
		display: none;
	}

	#nav .main-menu {
		border-bottom: 1px solid #c4c4c4;
	}

	#nav .sub-menu {
		padding-left: 3rem;
		border-bottom: none;
		color: #5645ED;
	}

	#nav .main-menu a:hover, .sub-menu:hover {
		/*background-color: rgba(255, 255, 255, 0.2);*/
		background-color: whitesmoke;
	}

	/*푸터 : 회사정보*/
	.footer {
		width: 100%;
		font-size: 1.3rem;
		text-align: left;
		color: #808080;
		position: absolute;
		bottom: 0px;
	}

	.footer-top {
		display: flex;
		border-top: 1px solid #c4c4c4;
		padding: 0.8rem 2.7rem;
	}

	.footer-middle {
		border-top: 1px solid #c4c4c4;
		padding: 1.5rem 2.7rem 2rem;
		font-size: 1.2rem;
	}

</style>

<div class="col bd-sidebar side" style="padding: 0;">
	<form style="padding: 3rem 2.5rem">
		<div style="margin-bottom: 3rem">
			<img class="logo" src="/asset/images/dual_logo_b.png" onclick="location.href='/'">
		</div>
		<div style="margin-bottom: 2rem">
			<span id="nameView" style="font-weight: bolder"></span>
			님 환영합니다.
		</div>

		<div style="width: 100%;margin-bottom: 2rem;border-radius: 1rem;box-shadow: 0px 0px 1rem #c6c6c6;">
			<div class="reservation-card-top">
				예약현황
			</div>
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
		<ul id="nav">
			<li class="main-menu"><a class="main-menu-item" href="#">예약서비스</a>
				<ul>
					<li class="sub-menu"><a href="/customer/reservation_step1">검진예약</a></li>
					<li class="sub-menu"><a href="/customer/reservation_list">예약현황</a></li>
				</ul>
			</li>
			<li class="main-menu"><a class="main-menu-item" href="#">검진결과</a>
				<ul>
					<li class="sub-menu"><a href="/customer/result_final">종합결과</a></li>
					<li class="sub-menu"><a href="/customer/result_main">주요결과</a></li>
				</ul>
			</li>
			<li class="main-menu"><a class="main-menu-item" href="#">건강정보</a>
				<ul>
					<li class="sub-menu"><a href="/customer/health_encyclopedia_list" onclick="resetPaging()">질병백과</a></li>
				</ul>
			</li>
			<li class="main-menu"><a class="main-menu-item" href="#">이용안내</a>
				<ul>
					<li class="sub-menu"><a href="/customer/notice_list" onclick="resetPaging()">공지사항</a></li>
					<li class="sub-menu"><a href="/customer/comparison_hospital">병원별 검진 항목 비교</a></li>
					<li class="sub-menu"><a href="/customer/health_checkup_guide">건강검진 안내</a></li>
				</ul>
			</li>
			<li class="main-menu"><a class="main-menu-item" href="#">고객센터</a>
				<ul>
					<li class="sub-menu"><a href="/customer/customer_service_faq">자주 묻는 질문</a></li>
					<li class="sub-menu"><a href="/customer/customer_service_one_inquiry">1:1 문의</a></li>
					<li class="sub-menu"><a href="/customer/customer_service_inquiry_list" onclick="resetPaging()">내 문의 내역</a></li>
				</ul>
			</li>
		</ul>
	</form>

	<form class="footer">
		<div class="footer-top">
			<div style="cursor: pointer" onclick="location.href='/customer/policy1'">
				서비스이용약관
			</div>
			<div style="padding: 0 1rem; color: #c4c4c4">
				|
			</div>
			<div style="cursor: pointer" onclick="location.href='/customer/policy2'">
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
				주소 : 대전광역시 유성구 대덕대로 512번길 20 <br>
				(도룡동, 2층) <br>
				copyrightⓒdualhealthcare
			</div>
		</div>
	</form>
</div>

<script>
	$(document).ready(function () {
		$('#nav > li > a').click(function () {
			$(this).next().slideToggle(300);
			$(this).addClass('active');
			// $(this).css("background", "#f2f2f2");
			// $(this).css("border-left", "7px solid #5849ea");

			$('#nav > li > a').not(this).next().slideUp(300);
		});
	});

	//페이징 번호 0으로
	function resetPaging() {
		sessionStorage.setItem("pageNum", 0);
	}

	// $(document).ready(function () {
	// 	//사이드바 메뉴
	// 	$('#nav > li > a').hover(function () {
	// 		$(this).next().slideDown(300);
	// 		$(this).css("background", "#f2f2f2");
	// 		$(this).css("border-left", "7px solid #5849ea");
	//
	// 		$('#nav li a').not(this).next().slideUp(300);
	// 		$('#nav li a').not(this).css("background", "none");
	// 		$('#nav li a').not(this).css("border-left", "none");
	// 	}, function () {
	// 		$('.main-menu').css("color", "white");
	// 	});
	// });
</script>
