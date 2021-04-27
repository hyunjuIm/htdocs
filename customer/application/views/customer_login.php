<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:로그인</title>

	<?php
	require('pc/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/login.css"/>

	<style>
		p {
			text-align: center;
			color: #3529b1;
			font-size: 6rem;
			/*font-weight: bold;*/
		}

		input[type=text], input[type=password] {
			padding: 1.2rem 2rem;
			font-size: 1.6rem;
			width: 85%;
			/*border: 2px solid #f6f6f6;*/
		}

	</style>
</head>

<body id="body" background="../../asset/images/bg_login.jpg" style="background-attachment: fixed;background-position: center">
<div class="container" style="height: inherit">
	<div class="col-sm wrapper fadeInDown">
		<form id="formContent">
			<p>
				<img src="/asset/images/logo_dual.png" style="width: 30%;margin: 3rem 0 5rem 0">
			</p>

			<input type="text" id="login" class="fadeIn second" name="login" placeholder="ID"
				   style="margin-bottom: 10px; text-align: left" onkeyup="enterKey();"
				   onkeydown="onlyAlphabet(this)">
			<input type="password" id="password" class="fadeIn third" name="login" placeholder="PASSWORD"
				   style="margin-bottom: 30px; text-align: left" onkeyup="enterKey();">
			<div style="margin-top: 1.5rem">
				<div class="fadeIn fourth btn-light-purple-square login-btn" onclick="customerLogin()">
					로그인
				</div>
				<p>
				<div class="fadeIn fourth" style="margin-top: 0.5rem;padding: 0 2.5rem">
					아직 듀얼헬스케어 회원이 아니신가요? <a class="join" href="/customer/join">회원가입하기</a>
				</div>
				</p>

			</div>

		</form>
	</div>
</div>

</body>

<script>
	// 모바일 여부
	var isMobile = false;
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
			customerLogin();
		}
	}

	function onlyAlphabet(ele) {
		ele.value = ele.value.replace(/[^\\!-z]/gi, "");
	}

	function customerLogin() {
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
		requestMember.level = "CUSTOMER";

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
				sessionStorage.setItem("userID", requestMember.id);
				sessionStorage.setItem("userName", split[0]);
				sessionStorage.setItem("userCusID", split[1]);

				if ($('#body').width() < 550) {
					isMobile = true;
				} else {
					isMobile = false;
				}

				//모바일인지 pc인지
				if (isMobile) {
					location.href = "/m/";
				} else {
					location.href = "/customer/";
				}
			}
		}).catch(function (error) {

		});
	}

</script>

</html>
