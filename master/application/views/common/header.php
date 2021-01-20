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

<!--타이틀 메뉴-->
<nav class="navbar navbar-expand-lg navbar-light">
	<a class="navbar-brand" href="/" style="color: white"><img src="/asset/images/logo.png" alt="logo"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mx-auto main-item">

			<li class="nav-item dropdown">
				<a id="combineManage" class="nav-link dropdown-toggle" href="#" id="navbarDropdown_menu_1" role="button"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					통합관리
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown_menu_1">
					<a class="dropdown-item" href="/master/customer_list">회원관리</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/master/reservation_list">예약관리</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/master/company_list">기업관리</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/master/hospital_list">병원관리</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_menu_1" role="button"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					패키지관리
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown_menu_1">
					<a class="dropdown-item" href="/master/package_list">패키지관리</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/master/package_create">패키지생성</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_menu_1" role="button"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					승인관리
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown_menu_1">
					<a class="dropdown-item" href="/master/confirm_employee">직원관리</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/master/confirm_package">패키지승인</a>
				</div>
			</li>

			<li class="nav-item ">
				<a class="nav-link" href="/master/billing_list">청구관리</a>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_menu_1" role="button"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					결과관리
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown_menu_1">
					<a class="dropdown-item" href="/master/result_list">검진결과</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/master/result_legal_data">법적자료</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_menu_1" role="button"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					통계관리
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown_menu_1">
					<a class="dropdown-item" href="/master/statistics_company">기업통계</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/master/statistics_hospital">병원통계</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_menu_1" role="button"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					컨텐츠관리
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown_menu_1">
					<a class="dropdown-item" href="/master/health_encyclopedia_list">질병백과</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_menu_1" role="button"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					서비스관리
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown_menu_1">
					<a class="dropdown-item" href="/master/service_notice">공지사항</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/master/service_qan_list">고객센터</a>
				</div>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="#" onclick="masterLogout()">로그아웃</a>
			</li>
		</ul>
	</div>
</nav>

<!--axios-->
<script>

	var initMinute;  // 최초 설정할 시간(min)
	var remainSecond;  // 남은시간(sec)

	$(document).ready(function(){
		clearTime(30); // 세션 만료 적용 시간
		setTimer();    // 문서 로드시 타이머 시작
	});

	// 타이머 초기화 함수
	function clearTime(min){
		initMinute = min;
		remainSecond = min*60;
	}

	// 1초 간격으로 호출할 타이머 함수
	function setTimer(){
		if(remainSecond > 0){
			remainSecond--;
			setTimeout("setTimer()",1000); //1초간격으로 재귀호출!
		}else{ //세션만료 로그아웃
			sessionStorage.clear();
			alert("세션이 만료되었습니다. 로그인 후 이용해주세요.");
			location.href = "/master/master_login";
		}
	}

	//로그아웃
	function masterLogout(){
		sessionStorage.clear();
		alert("로그아웃 되었습니다.");
		location.href = "/master/master_login";
	}

	//로그인 안되어있으면 로그인 화면으로
	var token = sessionStorage.getItem("token");
	if(token == null){
		location.href = "/master/master_login";
	}

	//중복로그인 로그아웃
	const permissionCheck = axios.create({
		baseURL: "http://192.168.219.107:8080/permission/",
		timeout: 5000,
		headers: {
			'token': token
		}
	});
	permissionCheck.post('isOk').then(res => {
		console.log(res.data);
		if (res.data != "SUCCESS") {
			sessionStorage.clear();
			alert("중복로그인이 감지되어 로그아웃 되었습니다.");
			location.href = "/master/master_login";
		}
	}).catch(function (error) {

	});

	$('#loading').hide();

	const instance = axios.create({
		baseURL: "http://192.168.219.107:8080/master/api/v1/",
		timeout: 5000,
		headers: {'token': token}
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
		baseURL: "http://192.168.219.107:8080/",
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
</script>

