<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:로그인</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

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

	<link rel="stylesheet" type="text/css" href="/asset/css/style.css"/>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="yes" name="apple-mobile-web-app-capable"/>
	<meta content="minimum-scale=1.0, width=device-width, maximum-scale=1, user-scalable=yes">

	<style>
		html {
			font-size: 10px;
			background: white;
		}

		p {
			text-align: center;
			color: #3529b1;
			font-size: 6rem;
			font-weight: bold;
		}

		/* STRUCTURE */
		.wrapper {
			display: flex;
			align-items: center;
			flex-direction: column;
			justify-content: center;
			width: 100%;
			min-height: 100%;
		}

		#formContent {
			-webkit-border-radius: 10px;
			border-radius: 10px;
			background: #fff;
			padding: 3rem;
			width: 100%;
			max-width: 45rem;
			position: relative;
			-webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
			box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
			text-align: center;
			vertical-align: middle;
		}

		/* FORM TYPOGRAPHY*/

		input[type=button], input[type=submit], input[type=reset] {
			background-color: #5645ED;
			border: none;
			color: white;
			padding: 15px 80px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			text-transform: uppercase;
			font-size: 1.3rem;
			-webkit-box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
			box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
			-webkit-border-radius: 5px 5px 5px 5px;
			border-radius: 5px 5px 5px 5px;
			margin: 5px 20px 40px 20px;
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-ms-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
		}

		input[type=text], input[type=password] {
			background-color: #f6f6f6;
			color: #0d0d0d;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 1.6rem;
			margin: 5px;
			width: 85%;
			border: 2px solid #f6f6f6;
			-webkit-transition: all 0.5s ease-in-out;
			-moz-transition: all 0.5s ease-in-out;
			-ms-transition: all 0.5s ease-in-out;
			-o-transition: all 0.5s ease-in-out;
			transition: all 0.5s ease-in-out;
			-webkit-border-radius: 5px 5px 5px 5px;
			border-radius: 5px 5px 5px 5px;
		}

		input[type=text]:focus, input[type=password]:focus {
			background-color: #fff;
			border-bottom: 2px solid #5645ED;
		}

		/* ANIMATIONS */
		/* Simple CSS3 Fade-in-down Animation */
		.fadeInDown {
			-webkit-animation-name: fadeInDown;
			animation-name: fadeInDown;
			-webkit-animation-duration: 1s;
			animation-duration: 1s;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
		}

		@-webkit-keyframes fadeInDown {
			0% {
				opacity: 0;
				-webkit-transform: translate3d(0, -100%, 0);
				transform: translate3d(0, -100%, 0);
			}
			100% {
				opacity: 1;
				-webkit-transform: none;
				transform: none;
			}
		}

		@keyframes fadeInDown {
			0% {
				opacity: 0;
				-webkit-transform: translate3d(0, -100%, 0);
				transform: translate3d(0, -100%, 0);
			}
			100% {
				opacity: 1;
				-webkit-transform: none;
				transform: none;
			}
		}

		/* Simple CSS3 Fade-in Animation */
		@-webkit-keyframes fadeIn {
			from {
				opacity: 0;
			}
			to {
				opacity: 1;
			}
		}

		@-moz-keyframes fadeIn {
			from {
				opacity: 0;
			}
			to {
				opacity: 1;
			}
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}
			to {
				opacity: 1;
			}
		}

		.fadeIn {
			opacity: 0;
			-webkit-animation: fadeIn ease-in 1;
			-moz-animation: fadeIn ease-in 1;
			animation: fadeIn ease-in 1;

			-webkit-animation-fill-mode: forwards;
			-moz-animation-fill-mode: forwards;
			animation-fill-mode: forwards;

			-webkit-animation-duration: 1s;
			-moz-animation-duration: 1s;
			animation-duration: 1s;
		}

		.fadeIn.second {
			-webkit-animation-delay: 0.6s;
			-moz-animation-delay: 0.6s;
			animation-delay: 0.6s;
		}

		.fadeIn.third {
			-webkit-animation-delay: 0.8s;
			-moz-animation-delay: 0.8s;
			animation-delay: 0.8s;
		}

		.fadeIn.fourth {
			-webkit-animation-delay: 1s;
			-moz-animation-delay: 1s;
			animation-delay: 1s;
		}

		/* OTHERS */
		*:focus {
			outline: none;
		}

		@media only screen and (max-width: 480px) {
			html {
				font-size: 9px;
				height: 60px;
			}

			body {
				background: white;
				height: fit-content;
			}

			.container {
				padding-top: 4rem;
			}

			#formContent {
				all: unset;

				-webkit-border-radius: 10px;
				border-radius: 10px;
				background: #fff;
				width: 100%;
				max-width: 45rem;
				min-width: 45rem;
				position: relative;
				text-align: center;
			}
		}

		@media only screen and (max-device-width: 480px) {
			html {
				font-size: 9px;
				height: 60px;
			}

			body {
				background: white;
				height: fit-content;
			}

			.container {
				padding-top: 4rem;
			}

			#formContent {
				all: unset;

				-webkit-border-radius: 10px;
				border-radius: 10px;
				background: #fff;
				width: 100%;
				max-width: 45rem;
				position: relative;
				text-align: center;
			}
		}
	</style>
</head>

<body id="body" background="../../asset/images/bg_login.jpg">
<div class="container" style="height: inherit">
	<div class="col-sm wrapper fadeInDown">
		<form id="formContent">
			<p>COMPANY</p>
			<input type="text" id="login" class="fadeIn second" name="login" placeholder="ID"
				   style="margin-bottom: 10px; text-align: left" onkeyup="enterKey();"
				   onkeydown="onlyAlphabet(this)">
			<input type="password" id="password" class="fadeIn third" name="login" placeholder="PASSWORD"
				   style="margin-bottom: 30px; text-align: left" onkeyup="enterKey();">
			<div class="fadeIn fourth btn-light-purple-square"
				 style="font-size: 2rem;font-weight: bold;width: 90%; border-radius: 3rem; padding: 1.2rem 2rem;"
				 value="Log In" onclick="companyLogin()">LOGIN
			</div>
		</form>
	</div>
</div>

</body>

<script>

	// 모바일 여부
	var isMobile = false;

	// PC 환경
	var filter = "win16|win32|win64|mac";

	if (navigator.platform) {
		isMobile = filter.indexOf(navigator.platform.toLowerCase()) < 0;
	}

	//이미 로그인 되어 있으면 홈으로
	var token = sessionStorage.getItem("token");
	if (token != null) {
		location.href = "/";
	}

	function enterKey() {
		if (window.event.keyCode == 13) {
			// 엔터키가 눌렸을 때 실행할 내용
			companyLogin();
		}
	}

	function onlyAlphabet(ele) {
		ele.value = ele.value.replace(/[^\\!-z]/gi, "");
	}

	var id;
	function companyLogin() {
		var requestMember = new Object();

		if ($("#login").val() == "") {
			alert("아이디를 입력해주세요.");
			$("#login").focus();//포커스를 id박스로 이동.
			return;
		} else if ($("#password").val() == "") {
			alert("비밀번호를 입력해주세요.");
			$("#password").focus();//포커스를 id박스로 이동.
			return;
		}

		requestMember.id = $("#login").val();
		requestMember.password = $("#password").val();
		requestMember.level = "COMPANY";

		id = requestMember.id;

		const instance = axios.create({
			baseURL: "http://192.168.219.108:8080/permission/",
			timeout: 5000
		});

		instance.post('login', requestMember).then(res => {
			if (res.data.message == "FAILED") {
				alert("가입하지 않은 아이디이거나, 잘못된 비밀번호입니다.");
			} else {

				var split = res.data.message.split('/');
				sessionStorage.setItem("token", res.data.data);
				sessionStorage.setItem("userID", id);
				sessionStorage.setItem("userCoID", split[0]);
				sessionStorage.setItem("userComID", split[1]);
				sessionStorage.setItem("userName", split[2]);

				if($('#body').width() < 550) {
					isMobile = true;
				} else {
					isMobile = false;
				}

				//모바일인지 pc인지
				if(isMobile) {
					location.href = "/m/";
				} else {
					location.href = "/company/";
				}
			}
		}).catch(function (error) {

		});
	}

</script>

</html>
