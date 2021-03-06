<style>
	.loader-container {
		height: 100%;
		width: 100%;
		position: fixed;
		background: rgba(255, 255, 255, 0.5);
		z-index: 999999;
	}

	.loader {
		height: 20px;
		width: 250px;
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		margin: auto;
	}

	.loader--dot {
		animation-name: loader;
		animation-timing-function: ease-in-out;
		animation-duration: 3s;
		animation-iteration-count: infinite;
		height: 20px;
		width: 20px;
		border-radius: 100%;
		background-color: black;
		position: absolute;
		border: 2px solid white;
	}

	.loader--dot:first-child {
		background-color: #8cc759;
		animation-delay: 0.5s;
	}

	.loader--dot:nth-child(2) {
		background-color: #8c6daf;
		animation-delay: 0.4s;
	}

	.loader--dot:nth-child(3) {
		background-color: #ef5d74;
		animation-delay: 0.3s;
	}

	.loader--dot:nth-child(4) {
		background-color: #f9a74b;
		animation-delay: 0.2s;
	}

	.loader--dot:nth-child(5) {
		background-color: #60beeb;
		animation-delay: 0.1s;
	}

	.loader--dot:nth-child(6) {
		background-color: #fbef5a;
		animation-delay: 0s;
	}

	.loader--text {
		position: absolute;
		z-index: 999999;
		top: 200%;
		left: 0;
		right: 0;
		width: 4rem;
		margin: auto;
	}

	.loader--text:after {
		content: "Loading";
		font-weight: bold;
		animation-name: loading-text;
		animation-duration: 3s;
		animation-iteration-count: infinite;
	}

	@keyframes loader {
		15% {
			transform: translateX(0);
		}
		45% {
			transform: translateX(230px);
		}
		65% {
			transform: translateX(230px);
		}
		95% {
			transform: translateX(0);
		}
	}

	@keyframes loading-text {
		0% {
			content: "Loading";
		}
		25% {
			content: "Loading.";
		}
		50% {
			content: "Loading..";
		}
		75% {
			content: "Loading...";
		}
	}
</style>

<div id="loading" class='loader-container'>
	<div class='loader'>
		<div class='loader--dot'></div>
		<div class='loader--dot'></div>
		<div class='loader--dot'></div>
		<div class='loader--dot'></div>
		<div class='loader--dot'></div>
		<div class='loader--dot'></div>
		<div class='loader--text'></div>
	</div>
</div>

<style>
	/* top navigation */

	.navbar {
		z-index: 888;
		height: 60px;
		background-color: white;
		overflow: hidden;
		padding: 0 10px;
		width: 100%;
		box-shadow: 0 0 10px #d7d7d7;
		position: fixed;
	}

	.navbar a {
		float: left;
		display: block;
		color: #404040;
		text-align: center;
		text-decoration: none;
		transition: .5s;
	}

	.navbar ul {
		list-style: none;
	}

	.navbar a:hover {
		background-color: #ccc;
		border-radius: 100%;
		color: #404040;
	}

	.navbar-nav {
		display: none;
	}

	path {
		stroke: black;
	}

	.open-slide {
		padding-right: 10px;
	}

	/* side navigation */

	.side-nav {
		height: 100%;
		width: 0;
		position: fixed;
		top: 0;
		right: 0;
		background-color: white;
		padding-top: 30px;
		overflow-x: hidden;
		z-index: 999;
		transition: .5s;
		font-size: 19px;
	}

	.side-nav a {
		text-decoration: none;
		color: #404040;
		display: block;
		transition: .3s;
	}

	.side-nav a:hover {
		color: #5645ED;
	}

	.side-nav .btn-close {
		position: absolute;
		top: 0;
		right: 10px;
		padding: 10px;
		font-size: 20px;
	}

	/*사이드 메뉴*/
	ul, li {
		list-style-type: none;
		padding-left: 0;
	}

	#nav {
		margin: 40px 0;
		border-top: 1px solid #eaeaea;
	}

	#nav li a {
		display: block;
		padding: 1.1rem 4rem;
		text-decoration: none;
		color: #404040;
		text-align: left;
	}

	#nav li a:hover, #nav li a:active {
		color: #5645ED;
	}

	#nav li ul {
		display: none;
	}

	.main-menu {
		border-bottom: 1px solid #eaeaea;
	}

	.sub-menu {
		padding-left: 3rem;
		border-bottom: none;
		color: #5645ED;
	}

	.main-menu a:hover, .sub-menu:hover {
		background: #ececec;
	}

	.side-nav .dropdown-img {
		float: right;
		width: fit-content;
	}

	.dropdown-img img {
		width: 13px;
		transition: transform 0.3s;
	}

	.rotate {
		-webkit-transform: rotate(180deg);
		-moz-transform: rotate(180deg);
		-o-transform: rotate(180deg);
		-ms-transform: rotate(180deg);
		transform: rotate(180deg);
	}

	@keyframes rotate_image {
		100% {
			transform: rotate(360deg);
		}
	}

	.my-info {
		font-size: 17px;
		text-align: center;
		margin: 0 2rem;
		padding: 0 2rem;
		color: #404040;
	}

	.title-text {
		margin-bottom: 0.5rem;
		font-size: 2rem;
		font-weight: bolder;
		letter-spacing: 0.15rem;
		text-align: left
	}

	/*로고*/
	.logo {
		cursor: pointer;
		height: 45%;
		float: left;
		padding-left: 10px;
	}

	/*이름*/
	#nameView {
		font-size: 2rem;
		font-weight: 500;
	}

	/*내정보관리*/
	.my-info-box {
		margin-top: 2rem;
		padding: 0.5rem 0;
		border: #e5e5e5 solid 1px;
		font-size: 1.3rem;
		display: flex;
	}

	#main {
		padding: 110px 12px 30px 12px;
		transition: margin-right .5s;
		width: 100%;
		min-height: 90vh;
	}

</style>

<nav class="navbar">
	<img src="/asset/images/dual_logo_b.png" class="logo" onclick="location.href='/m/'">

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

		<div class="my-info-box">
			<a href="" style="width: 50%;cursor: pointer">
				<div>
					내정보관리
				</div>
			</a>
			<div style="color: #e5e5e5">
				｜
			</div>
			<a style="width: 50%;cursor: pointer">
				<div onclick="companyLogout()">
					로그아웃
				</div>
			</a>
		</div>
	</form>

	<form>
		<ul id="nav">
			<li class="main-menu">
				<a class="main-menu-item" href="/m/reservation_list">
					예약관리
				</a>
			</li>
			<li class="main-menu">
				<a class="main-menu-item" href="/m/statistics_manage">
					통계관리
				</a>
			</li>
			<li class="main-menu">
				<a class="main-menu-item" href="/m/bill_manage">
					청구관리
				</a>
			</li>
			<li class="main-menu">
				<a class="main-menu-item" href="/m/notice_list" onclick="resetPaging()">
					공지사항
				</a>
			</li>
		</ul>
	</form>
</div>

<script>
	//사이드바 사용자 정보
	var userName = sessionStorage.getItem("userName");

	$('#nameView').text(userName);

	$(document).ready(function () {
		$('#nav > li > a').click(function () {
			$(this).next().slideToggle(300);
			$(this).addClass('active');

			$('#nav > li > a').not(this).next().slideUp(300);
		});
	});

	function openSlideMenu() {
		document.getElementById('side-menu').style.width = '100%';
		document.getElementById('main').style.marginRight = '100%';
	}

	function closeSlideMenu() {
		document.getElementById('side-menu').style.width = '0';
		document.getElementById('main').style.marginRight = '0';
	}

	$('.dropdown-img').click(function () {
		$(this).find('img').toggleClass('rotate');
	});
</script>

<!--로그인 세션 관리-->
<script>
	//로그인 안되어있으면 로그인 화면으로
	let token = sessionStorage.getItem("token");

	//중복로그인 로그아웃
	const permissionCheck = axios.create({
		baseURL: "http://192.168.219.113:8080/permission/",
		timeout: 5000,
		headers: {
			'token': token
		}
	});

	if (token == null) {
		location.href = "/company/login";
	}
	else {
		var sendItems = new Object();
		sendItems.token = token;
		permissionCheck.post('isOk', sendItems).then(res => {
			if (res.data != "Success") {
				sessionStorage.clear();
				alert("로그인 정보가 변경되어 로그아웃 되었습니다.");
				location.href = "/company/login";
			}
		}).catch(function (error) {

		});
	}

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

	const instance = axios.create({
		baseURL: "http://192.168.219.113:8080/company/api/v1/",
		timeout: 5000,
		headers: {
			'token': token,
			'userID': sessionStorage.getItem("userID")
		}
	});
	//로딩중
	instance.interceptors.request.use(
			(config) => {
				$('#loading').show();
				return config;
			},
			(e) => {
				$('#loading').hide();
			}
	);
	//로딩끝
	instance.interceptors.response.use(
			(response) => {
				$('#loading').hide();
				return response;
			},
			(e) => {
				$('#loading').hide();
			}
	);

	//파일 업로드 다운로드
	const fileURL = axios.create({
		baseURL: "http://192.168.219.113:8080/",
		timeout: 20000,
		headers: {'token': token}
	});
	//로딩중
	fileURL.interceptors.request.use(
			(res) => {
				$('#loading').show();
				return res;
			},
			(e) => {
				$('#loading').hide();
			}
	);
	//로딩끝
	fileURL.interceptors.response.use(
			(res) => {
				$('#loading').hide();
				return res;
			},
			(e) => {
				$('#loading').hide();
			}
	);

	$('#loading').hide();

	//페이징 번호 0으로
	function resetPaging() {
		sessionStorage.setItem("pageNum", 0);
		sessionStorage.setItem("searchWord", '');
	}
</script>
