<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport"
	  content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
	  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
		crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
		integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
		crossorigin="anonymous"></script>
<script src="https://cdn.polyfill.io/v3/polyfill.min.js?features=default,Array.prototype.includes,Array.prototype.find"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!--css-->
<link rel="stylesheet" type="text/css" href="../../../asset/css/app/style.css?ver=1.1"/>

<!--axios-->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=1, user-scalable=yes">

<!--스와이프-->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css"/>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!--다음 주소-->
<script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>

<!--아이콘-->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">


<!--<div class='loader--dot'></div>-->
<!--<div class='loader--dot'></div>-->
<!--<div class='loader--dot'></div>-->
<!--<div class='loader--dot'></div>-->
<!--<div class='loader--text'></div>-->
<!--</div>-->
<!--</div>-->

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

	if (sessionStorage.getItem('token') == null) {
		let s_token = getParameterByName(location.search, 't');
		let s_id = getParameterByName(location.search, 'i');

		let s_tag = getParameterByName(location.search, 'hashTags');
		sessionStorage.setItem("hashTags", s_tag.replaceAll('"', ''));

		//인증정보가 없으면 로그인 화면으로
		if (s_token == null || s_id == null || s_token === '' || s_id === '') {
			location.href = "/customer/login";
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
					location.href = "/customer/login";
				}
			}).catch(function (error) {
			});
		}
	} else {
		permissionCheck.post('isAuth').then(res => {
			if (res.data.message !== "Success") {
				sessionStorage.clear();
				alert("로그인 정보가 변경되어 로그아웃 되었습니다.");
				location.href = "/customer/login";
			}
		}).catch(function (error) {
		});
	}

	// var initMinute;  // 최초 설정할 시간(min)
	// var remainSecond;  // 남은시간(sec)
	//
	// $(document).ready(function () {
	// 	clearTime(30); // 세션 만료 적용 시간
	// 	setTimer();    // 문서 로드시 타이머 시작
	// });
	//
	// // 타이머 초기화 함수
	// function clearTime(min) {
	// 	initMinute = min;
	// 	remainSecond = min * 60;
	// }
	//
	// // 1초 간격으로 호출할 타이머 함수
	// function setTimer() {
	// 	if (remainSecond > 0) {
	// 		remainSecond--;
	// 		setTimeout("setTimer()", 1000); //1초간격으로 재귀호출!
	// 	} else { //세션만료 로그아웃
	// 		sessionStorage.clear();
	// 		alert("세션이 만료되었습니다. 로그인 후 이용해주세요.");
	// 		location.href = "/customer/login";
	// 	}
	// }
	//
	// //로그아웃
	// function customerLogout() {
	// 	sessionStorage.clear();
	// 	alert("로그아웃 되었습니다.");
	// 	location.href = "/customer/login";
	// }

	const instance = axios.create({
		baseURL: "http://192.168.219.108:8080/customer/api/v1/",
		timeout: 5000,
		headers: {
			'token': token,
			'userId': sessionStorage.getItem("userID")
		}
	});
	// //로딩중
	// instance.interceptors.request.use(
	// 		(config) => {
	// 			$('#loading').show();
	// 			return config;
	// 		},
	// 		(e) => {
	// 			$('#loading').hide();
	// 		}
	// );
	// //로딩끝
	// instance.interceptors.response.use(
	// 		(response) => {
	// 			$('#loading').hide();
	// 			return response;
	// 		},
	// 		(e) => {
	// 			$('#loading').hide();
	// 		}
	// );

	//파일 업로드 다운로드
	const fileURL = axios.create({
		baseURL: "http://192.168.219.108:8080/",
		timeout: 5000,
		headers: {'token': token}
	});
	// //로딩중
	// fileURL.interceptors.request.use(
	// 		(res) => {
	// 			$('#loading').show();
	// 			return res;
	// 		},
	// 		(e) => {
	// 			$('#loading').hide();
	// 		}
	// );
	// //로딩끝
	// fileURL.interceptors.response.use(
	// 		(res) => {
	// 			$('#loading').hide();
	// 			return res;
	// 		},
	// 		(e) => {
	// 			$('#loading').hide();
	// 		}
	// );

	//파라미터
	function getParameterByName(url, name) {
		name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
				results = regex.exec(url);
		return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}

	//다음 페이지에 id 값 넘기기 - 카드뉴스
	function detailCardNews(id) {
		location.href = "/app/card?id=" + id;
	}

	//다음 페이지에 id 값 넘기기 - 질병백과
	function detailEncyclopediaPage(id) {
		location.href = "/app/encyclopedia?id=" + id;
	}

</script>
