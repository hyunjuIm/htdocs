
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
			location.href = "./customer_login";
		}
	}

	//로그아웃
	function masterLogout(){
		sessionStorage.clear();
		alert("로그아웃 되었습니다.");
		location.href = "customer/customer_login";
	}

	//로그인 안되어있으면 로그인 화면으로
	var token = sessionStorage.getItem("token");
	if(token == null){
		location.href = "customer/customer_login";
	}

	const instance = axios.create({
		//baseURL: "https://api.dualhealth.kr/customer/api/v1/",
		baseURL: "http://192.168.219.109:8080/customer/api/v1/",
		timeout: 5000,
		headers: {
			'token': token,
			'userId' : sessionStorage.getItem("userID")
		}
	});

	//파일 업로드 다운로드
	const fileURL = axios.create({
		//baseURL: "https://api.dualhealth.kr/",
		baseURL: "http://192.168.219.109:8080/",
		timeout: 5000,
		headers: {'token': token}
	});
</script>

