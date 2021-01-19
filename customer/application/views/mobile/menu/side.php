<nav class="navbar">

	<img src="/asset/images/mobile/m_logo.png" class="logo" onclick="location.href='/m/'">

	<span class="open-slide">
	  <a href="#" onclick="openSlideMenu()">
	    <svg width="20" height="25">
		  <path d="M0,5 30,5" stroke="white" stroke-width="2"/>
		  <path d="M0,12 30,12" stroke="white" stroke-width="2"/>
		  <path d="M0,19 30,19" stroke="white" stroke-width="2"/>
	    </svg>
	  </a>
    </span>
</nav>

<div id="side-menu" class="side-nav">

	<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>

	<form class="my-info">
		<div class="title-text">
			DUAL HEALTHCARE
		</div>

		<div style="margin-bottom: 3rem; letter-spacing: -0.5px;font-weight: bolder;text-align: left;">
			<span id="nameView"></span> 님 환영합니다.
		</div>

		<div class="reservation">
			<div class="reservation-card-top">
				예약현황
			</div>
			<div class="reservation-card-content">
				<div id="carouselReservationControls" class="carousel slide" data-ride="carousel">
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
			<a href="/m/my_page" style="width: 50%;cursor: pointer">
				<div>
					내정보관리
				</div>
			</a>
			<div style="color: #e5e5e5">
				｜
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
			<li class="main-menu">
				<a class="main-menu-item" href="#">
					예약서비스
					<div class="dropdown-img">
						<img src="/asset/images/icon_drop_down.png">
					</div>
				</a>
				<ul>
					<li class="sub-menu"><a href="/m/reservation_step1">검진예약</a></li>
					<li class="sub-menu"><a href="/m/reservation_list">예약현황</a></li>
				</ul>
			</li>
			<li class="main-menu">
				<a class="main-menu-item" href="#">
					검진결과
					<div class="dropdown-img">
						<img src="/asset/images/icon_drop_down.png">
					</div>
				</a>
				<ul>
					<li class="sub-menu"><a href="/m/result_final">종합결과</a></li>
					<li class="sub-menu"><a href="/m/result_main">주요결과</a></li>
				</ul>
			</li>
			<li class="main-menu">
				<a class="main-menu-item" href="#">
					건강정보
					<div class="dropdown-img">
						<img src="/asset/images/icon_drop_down.png">
					</div>
				</a>
				<ul>
					<li class="sub-menu"><a href="/m/health_encyclopedia_list">질병백과</a></li>
				</ul>
			</li>
			<li class="main-menu">
				<a class="main-menu-item" href="#">
					이용안내
					<div class="dropdown-img">
						<img src="/asset/images/icon_drop_down.png">
					</div>
				</a>
				<ul>
					<li class="sub-menu"><a href="/m/notice_list">공지사항</a></li>
					<li class="sub-menu"><a href="/m/comparison_hospital")>병원별 검진 항목 비교</a></li>
					<li class="sub-menu"><a href="/m/health_checkup_guide">건강검진 안내</a></li>
				</ul>
			</li>
			<li class="main-menu">
				<a class="main-menu-item" href="#">
					고객센터
					<div class="dropdown-img">
						<img src="/asset/images/icon_drop_down.png">
					</div>
				</a>
				<ul>
					<li class="sub-menu"><a href="/m/customer_service_faq">자주 묻는 질문</a></li>
					<li class="sub-menu"><a href="/m/customer_service_one_inquiry">1:1 문의</a></li>
					<li class="sub-menu"><a href="/m/customer_service_inquiry_list">내 문의 내역</a></li>
				</ul>
			</li>
		</ul>
	</form>
</div>

<script>

	$('body').scroll(function () {
		if ($(this).scrollTop() > 0) {
			$('.navbar').css("background-color", "white");
			$('path').css("stroke", "black");
		} else {
			$('.navbar').css("background-color", "rgba(255, 255, 255, 0.5)");
			$('path').css("stroke", "white");
		}
	});


	function openSlideMenu() {
		document.getElementById('side-menu').style.width = '100%';
		document.getElementById('main').style.marginRight = '100%';
	}

	function closeSlideMenu() {
		document.getElementById('side-menu').style.width = '0';
		document.getElementById('main').style.marginRight = '0';
	}

	$(document).ready(function () {
		$('#nav > li > a').click(function () {
			$(this).next().slideToggle(300);
			$(this).addClass('active');

			$('#nav > li > a').not(this).next().slideUp(300);
		});
	});

	$('.dropdown-img').click(function () {
		$(this).find('img').toggleClass('rotate');
	});
</script>
