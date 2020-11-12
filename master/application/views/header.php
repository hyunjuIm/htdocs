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

	const instance = axios.create({
		//baseURL: "https://api.dualhealth.kr/master/api/v1/",
		baseURL: "http://192.168.219.109:8080/master/api/v1/",
		timeout: 5000,
		headers: {'token': token}
	});

	//파일 업로드 다운로드
	const fileURL = axios.create({
		//baseURL: "https://api.dualhealth.kr/",
		baseURL: "http://192.168.219.109:8080/",
		timeout: 5000,
		headers: {'token': token}
	});
</script>

