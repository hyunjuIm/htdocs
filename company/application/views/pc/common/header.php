<style>
	nav {
		width: 100%;
		min-width: 150rem;
		height: 7rem;
		padding: 0 4rem;
		display: flex;
		position: relative;
		background: white;
		box-shadow: 0 0 10px #d7d7d7;
	}

	ul, li {
		margin: 0;
		padding: 0;
		list-style: none;
	}

	a {
		text-decoration: none !important;
		color: black;
	}

	a:hover {
		color: #5645ED;
		font-weight: bolder !important;
	}

	#main-menu {
		margin: 0 auto;
	}

	#main-menu > li {
		float: left;
		position: relative;
	}

	#main-menu > li > a {
		color: black;
		text-align: center;
		text-decoration: none;
		display: block;
		font-size: 1.7rem;
		line-height: 7rem;
		width: 13rem;
	}

	#main-menu > li > a:hover,
	#main-menu .active {
		font-weight: bolder;
		color: #5645ED;
	}

	.menu-hover-line {
		position: absolute;
		width: 100%;
		height: 100%;
	}

	.menu-select-line {
		position: absolute;
		width: 100%;
		height: 100%;
		border-bottom: 5px solid #5645ED;
	}

	.sub-menu {
		position: absolute;
		background: white;
		opacity: 0;
		visibility: hidden;
		transition: all 0.15s ease-in;
	}

	.sub-menu > li {
		width: 13rem;
		line-height: 4.5rem;
		text-align: center;
		border-top: 1px solid rgba(0, 0, 0, 0.1);
	}

	#main-menu > li:hover .sub-menu {
		opacity: 1;
		visibility: visible;
		color: #5645ED;
	}

	.sub-menu > li:hover {
		background: #f0edf6;
	}

	.sub-menu > li > a:hover {
		text-decoration: none;
		color: #5645ED;
		font-weight: bolder;
	}

</style>

<!--타이틀 메뉴-->
<nav role="navigation">
	<div style="float:left; width: 22rem;line-height: 7rem">
		<a href="/"><img src="/asset/images/dual_logo_b_s.png"></a>
	</div>
	<ul id="main-menu">
		<li><a id="topMenu1" href="/company/reservation_list">
				<div class="menu-hover-line"></div>
				예약관리</a></li>
		<li><a id="topMenu2" href="#">
				<div class="menu-hover-line"></div>
				직원등록관리</a></li>
		<li><a id="topMenu3" href="#">
				<div class="menu-hover-line"></div>
				통계관리</a></li>
		<li><a id="topMenu4" href="#">
				<div class="menu-hover-line"></div>
				청구관리</a></li>
		<!--		<li><a href="#"><div class="menu-hover-line"></div>통계관리</a>-->
		<!--			<ul class="sub-menu">-->
		<!--				<li><a href="#" aria-label="subemnu">연도별</a></li>-->
		<!--				<li><a href="#" aria-label="subemnu">병원별</a></li>-->
		<!--				<li><a href="#" aria-label="subemnu">지역별</a></li>-->
		<!--			</ul>-->
		<!--		</li>-->
	</ul>
	<div style="float:right;width: 22rem;line-height: 7rem;font-size: 1.4rem">
		<div style="float:right">
			<a href="#">관리자정보</a>
			<span>｜</span>
			<a href="#" onclick="companyLogout()">로그아웃</a>
		</div>
	</div>
</nav>

<!--로그인 세션 관리-->
<script>
	console.log(sessionStorage);

	var initMinute;  // 최초 설정할 시간(min)
	var remainSecond;  // 남은시간(sec)

	$(document).ready(function () {
		clearTime(30); // 세션 만료 적용 시간
		setTimer();    // 문서 로드시 타이머 시작
	});

	// 타이머 초기화 함수
	function clearTime(min) {
		initMinute = min;
		remainSecond = min * 60;
	}

	// 1초 간격으로 호출할 타이머 함수
	function setTimer() {
		if (remainSecond > 0) {
			remainSecond--;
			setTimeout("setTimer()", 1000); //1초간격으로 재귀호출!
		} else { //세션만료 로그아웃
			sessionStorage.clear();
			alert("세션이 만료되었습니다. 로그인 후 이용해주세요.");
			location.href = "/company/login";
		}
	}

	//로그아웃
	function companyLogout() {
		sessionStorage.clear();
		alert("로그아웃 되었습니다.");
		location.href = "/company/login";
	}

	//로그인 안되어있으면 로그인 화면으로
	var token = sessionStorage.getItem("token");
	if (token == null) {
		location.href = "/company/login";
	}

	//중복로그인 로그아웃
	const permissionCheck = axios.create({
		baseURL: "http://192.168.219.108:8080/permission/",
		timeout: 5000,
		headers: {
			'token': token
		}
	});
	permissionCheck.post('isOk').then(res => {
		if (res.data != "SUCCESS") {
			sessionStorage.clear();
			alert("중복로그인이 감지되어 로그아웃 되었습니다.");
			location.href = "/company/login";
		}
	}).catch(function (error) {

	});

	const instance = axios.create({
		baseURL: "http://192.168.219.108:8080/company/api/v1/",
		timeout: 5000,
		headers: {
			'token': token,
			'userID': sessionStorage.getItem("userID")
		}
	});

	//파일 업로드 다운로드
	const fileURL = axios.create({
		//baseURL: "http://192.168.219.108:8080/",
		baseURL: "http://192.168.219.108:8080/",
		timeout: 20000,
		headers: {'token': token}
	});
</script>

<script>
	(function ($) {
		$(function () {
			var line;
			$('.menu-hover-line').hover(
					function () {
						line = this;
						$(this).css('border-bottom', '5px solid #5645ED');
						$('.menu-hover-line').not(this).css('border-bottom', 'none');
					}, function () {
						$('.sub-menu').hover(function () {
							$(line).css('border-bottom', '5px solid #5645ED');
						}, function () {
							$('.menu-hover-line').css('border-bottom', 'none');
						});
						$('.menu-hover-line').css('border-bottom', 'none');
					}
			);
			// If a link has a dropdown, add sub menu toggle.
			// $('nav ul li a:not(:only-child)').click(function (e) {
			// 	$(this).siblings('.navbar-dropdown').slideToggle("slow");
			//
			// 	// Close dropdown when select another dropdown
			// 	$('.navbar-dropdown').not($(this).siblings()).hide("slow");
			// 	e.stopPropagation();
			// });
			//
			// // Click outside the dropdown will remove the dropdown class
			// $('html').click(function () {
			// 	$('.navbar-dropdown').hide();
			// });
		});
	})(jQuery);
</script>

