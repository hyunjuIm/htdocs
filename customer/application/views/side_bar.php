<style>
	/*사이드바 전체*/
	.bd-sidebar {
		position: sticky;
		height: 100vh;
		min-width: 320px;
		max-width: 320px;
		color: white;
		text-align: center;
		background-color: rgba(27, 26, 37, 0.95);
	}

	/*예약현황*/
	.reservation-card {
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

	/*사이드 메뉴*/
	ul, li {
		list-style-type: none;
		padding-left: 0px;
	}

	#nav li a {
		display: block;
		padding: 13px 40px;
		text-decoration: none;
		color: white;
		text-align: left;
	}

	#nav li a:hover {
		font-weight: bolder;
		color: #5645ED;
	}

	#nav li ul {
		display: none;
	}

	.main-menu {
		border-bottom: 1px solid #666666;
	}

	.sub-menu {
		padding-left: 30px;
		border-bottom: none;
		color: #5645ED;
	}

	.main-menu a:hover, .sub-menu:hover {
		background: #1b1a25;
	}

	/*푸터 : 회사정보*/
	.footer {
		width: 100%;
		font-size: 13px;
		text-align: left;
		color: #aaaaaa;
		position: absolute;
		bottom: 0px;
		background: #1b1a25;
	}

</style>

<div class="col bd-sidebar" style="padding: 0">
	<form style="padding: 35px 25px">
		<div style="margin-bottom: 20px">
			로고
		</div>
		<div style="margin-bottom: 30px">
			<span id="nameView" style="font-weight: bolder"></span>
			님 환영합니다.
		</div>

		<div style="width: 100%;margin-bottom: 30px">
			<div style="padding: 5px;background: #5849ea; border-top-left-radius: 10px; border-top-right-radius: 10px">
				예약현황
			</div>
			<div class="reservation-card">
				<div id="carouselReservationControls" class="carousel slide" data-ride="carousel"
					 data-interval="false" style="height: inherit; display: table-cell; vertical-align: middle">
					<div class="carousel-inner">
						<div class="carousel-item active">
							본인예약1
						</div>
						<div class="carousel-item">
							가족예약2
						</div>
						<div class="carousel-item">
							가족예약3
						</div>
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

		<div style="padding: 5px 0; border: #666666 solid 1px; font-size: 14px; display: flex">
			<div style="width: 50%">
				내정보관리
			</div>
			<div style="color: #666666">
				|
			</div>
			<div style="width: 50%">
				로그아웃
			</div>
		</div>
	</form>

	<form>
		<ul id="nav" style="border-top: 1px solid #666666">
			<li class="main-menu"><a class="main-menu-item" href="#">검진예약</a>
				<ul>
					<li class="sub-menu"><a href="#">예약하기</a></li>
					<li class="sub-menu"><a href="#">예약현황</a></li>
				</ul>
			</li>
			<li class="main-menu"><a class="main-menu-item" href="#">검진결과</a>
				<ul>
					<li class="sub-menu"><a href="#">자세히보기</a></li>
				</ul>
			</li>
			<li class="main-menu"><a class="main-menu-item" href="#">이용안내</a>
				<ul>
					<li class="sub-menu"><a href="#">공지사항</a></li>
					<li class="sub-menu"><a href="#">병원별 검진 비교</a></li>
					<li class="sub-menu"><a href="#">검강검진안내</a></li>
					<li class="sub-menu"><a href="#">고객센터</a></li>
				</ul>
			</li>
		</ul>

	</form>

	<form class="footer">
		<div style="display: flex; border-top: 1px solid #666666;padding: 10px 27px">
			<div>
				서비스이용약관
			</div>
			<div style="padding: 0 10px">
				|
			</div>
			<div>
				개인정보처리방침
			</div>
		</div>
		<div style="border-top: 1px solid #666666; padding: 15px 27px 40px; font-size: 12px">
			<div style="font-size: 15px; color: white;margin-bottom: 3px">
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
		var bind = true;
		$('#nav > li > a').hover(function () {
			$(this).next().slideDown(300);
			$(this).css("background", "#1b1a25");
			$(this).css("border-left", "7px solid #5849ea");

			$('#nav li a').not(this).next().slideUp(300);
			$('#nav li a').not(this).css("background", "none");
			$('#nav li a').not(this).css("border-left", "none");
		}, function () {
			$('.main-menu').css("color", "white");
			console.log("완전히 벗어남");
			$('.main-menu').hover(function () {

			}, function () {
				$('#nav li a').next().slideUp(300);
				$('#nav li a').not(this).css("border-left", "none");
			});
		});


		//사이드바 사용자 정보
		var userName = sessionStorage.getItem("userName");
		console.log(sessionStorage);
		$('#nameView').text(userName);
	});
</script>
