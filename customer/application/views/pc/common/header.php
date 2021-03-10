<!--axios-->
<script>
	let token = sessionStorage.getItem('token');

	//중복로그인 로그아웃
	const permissionCheck = axios.create({
		baseURL: "http://192.168.219.108:8080/permission/",
		timeout: 5000,
		headers: {
			'token': token
		}
	});

	if (token == null) {
		let s_token = getParam('t');
		let s_id = getParam('i');

		//인증정보가 없으면 로그인 화면으로
		if (s_token == null || s_id == null || s_token === '' || s_id === '') {
			location.href = "/customer/customer_login";
		} else {
			var sendItems = new Object();
			sendItems.id = s_id;
			sendItems.token = s_token;
			permissionCheck.post('whoIs', sendItems).then(res => {
				if (res.data.message === "Success") {
					sessionStorage.setItem("token", s_token);
					sessionStorage.setItem("userID", s_id);
					sessionStorage.setItem("userName", res.data.name);
					sessionStorage.setItem("userCusID", res.data.userId);
					location.reload();
				} else {
					location.href = "/customer/customer_login";
				}
			}).catch(function (error) {
			});
		}
	} else {
		permissionCheck.post('isAuth').then(res => {
			if (res.data.message !== "Success") {
				sessionStorage.clear();
				alert("로그인 정보가 변경되어 로그아웃 되었습니다.");
				location.href = "/customer/customer_login";
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
			location.href = "/customer/customer_login";
		}
	}

	//로그아웃
	function customerLogout() {
		sessionStorage.clear();
		alert("로그아웃 되었습니다.");
		location.href = "/customer/customer_login";
	}

	const instance = axios.create({
		baseURL: "http://192.168.219.108:8080/customer/api/v1/",
		timeout: 5000,
		headers: {
			'token': token,
			'userId': sessionStorage.getItem("userID")
		}
	});

	//파일 업로드 다운로드
	const fileURL = axios.create({
		//baseURL: "http://192.168.219.108:8080/",
		baseURL: "http://192.168.219.108:8080/",
		timeout: 5000,
		headers: {'token': token}
	});

	//get 파라미터
	function getParam(sname) {
		var params = location.search.substr(location.search.indexOf("?") + 1);
		var sval = "";
		params = params.split("&");
		for (var i = 0; i < params.length; i++) {
			temp = params[i].split("=");
			if ([temp[0]] == sname) {
				sval = temp[1];
			}
		}
		return sval;
	}

	//사이드바 사용자 정보
	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	instance.post('CU_001_002', userData).then(res => {
		var userName = sessionStorage.getItem("userName");
		$('#nameView').text(userName);

		setMainUserInfo(res.data);
	});

	function setMainUserInfo(data) {
		if (data.length == 0) {
			var html = '';
			html += '<div class="carousel-item active">';
			html += '예약내역 없음';
			html += '</div>';
			$("#userScheduleInfos").append(html);
		}

		for (i = 0; i < data.length; i++) {
			var html = '';

			if (data[i].grade == '본인') {
				html += '<div class="carousel-item active">';
			} else {
				html += '<div class="carousel-item">';
			}
			html += data[i].name + '(' + data[i].grade + ')' + '\n';
			if (data[i].newBadge) {
				html += '<span class="badge bg-warning text-dark">New</span>';
			}
			html += '<br>';
			if (data[i].hospital != 'none') {
				html += '예약병원 : ' + data[i].hospital + '<br>';
			}
			html += data[i].schedule;
			if (data[i].hospital == 'none') {
				html += '<br> <br>';
			}
			html += '</div>';

			$("#userScheduleInfos").append(html);
		}
	}
</script>
