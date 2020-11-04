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
			<li class="nav-item">
				<a class="nav-link" href="#">환경설정</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="#" onclick="clearToken()">로그아웃</a>
			</li>
		</ul>
	</div>
</nav>

<!--axios-->
<script>
	function clearToken(){
		sessionStorage.clear();
		alert("로그아웃 되었습니다.");
		location.href = "/master/master_login";
	}

	var token = sessionStorage.getItem("token");
	if(token == null){
		alert("세션이 만료되었습니다. 로그인 후 이용해주세요.");
		location.href = "/master/master_login";
	}

	const instance = axios.create({
		baseURL: "https://api.dualhealth.kr/master/api/v1/",
		//baseURL: "http://192.168.219.101:8080/master/api/v1/",
		timeout: 5000,
		headers: {'token': token}
	});
</script>

