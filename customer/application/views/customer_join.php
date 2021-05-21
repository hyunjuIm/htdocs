<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:회원가입</title>

	<?php
	require('pc/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/login.css"/>

	<style>
		.user-table {
			width: 100%;
			text-align: left;
			margin-top: 3rem;
		}

		.user-table tr {
			margin-top: 0.5rem;
		}

		.user-table td {
			width: 50%;
		}
	</style>
</head>

<body id="body" background="../../asset/images/bg_login.jpg" style="background-attachment: fixed;">
<div class="container" style="padding: 3rem 1rem">
	<div class="col-sm wrapper fadeInDown">
		<form id="formContent">
			<h1>회원가입</h1>
			<div style="font-size: 1.6rem;margin-bottom: 2rem">
				듀얼 계정이 이미 있으십니까? <a href="/customer/login" class="join">로그인</a>
			</div>

			<div class="fadeIn second" style="margin: 3rem 0 4rem 0;padding: 0 2rem">
				<div class="text-left">이메일</div>
				<input type="text" onkeydown="onlyAlphabet(this)" id="email">
				<div class="text-left">비밀번호</div>
				<input type="password" id="password1">
				<div class="text-left">비밀번호 재입력</div>
				<input type="password" id="password2">

				<table class="user-table">
					<tr>
						<td colspan="2">
							<div>이름</div>
							<input type="text" id="name">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<div>생년월일</div>
							<div style="display: flex;align-items: center">
								<input type="date" id="birthDate"/>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div>연락처</div>
							<input type="text" maxlength="13" onkeyup="setPhoneHyphen(this)" id="phone">
						</td>
						<td>
							<div>성별</div>
							<div style="width: fit-content;margin: 0 auto;padding: 0.5rem;">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="sex"
										   id="man"
										   value="0">
									<label class="form-check-label" for="inlineRadio1">남</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="sex"
										   id="woman"
										   value="1">
									<label class="form-check-label" for="inlineRadio2">여</label>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<div>주소</div>
							<div style="display: flex;width: 100%;margin-top: 0.3rem">
								<input type="text" placeholder="우편번호검색" id="zipCode"
									   style="cursor: default;width: 30%;margin-right: 0.2rem"
									   onclick="openAddressSearch('zipCode','address','buildingNum')" readonly>
								<input type="text" id="address" style="width: 70%" readonly>
							</div>
							<input type="text" id="buildingNum" placeholder="상세주소 입력" style="margin-top: 0.3rem">
						</td>
					</tr>
				</table>
			</div>

			<div class="btn-light-purple-square login-btn" onclick="joinCustomer()">
				가입하기
			</div>
			<div style="margin-top: 1rem;padding: 0 2.5rem;font-size: 1.4rem">
				<a href="#">이용약관 및 개인정보 보호정책</a>
			</div>
		</form>
	</div>
</div>

</body>

<script>
	<?php
	require('pc/common/check_data.js');
	?>

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

	function onlyAlphabet(ele) {
		ele.value = ele.value.replace(/[^\\!-z]/gi, "");
	}

	$('#date').val(new Date().toISOString().substring(0, 10));

	//주소검색
	function openAddressSearch(zipCode, address, buildingName) {
		new daum.Postcode({
			oncomplete: function (data) {
				$("#" + zipCode + "").val(data.zonecode); // 우편번호 (5자리)
				$("#" + address + "").val(data.address);
				$("#" + buildingName + "").val(data.buildingName);
				$("#" + buildingName + "").focus();
			}
		}).open();
	}

	//비밀번호 정규식
	function chkPW(pw) {
		var checkNumber = pw.search(/[0-9]/g);
		var checkEnglish = pw.search(/[a-z]/ig);

		if (!/^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,25}$/.test(pw)) {
			alert('숫자+영문자+특수문자 조합으로 8자리 이상 사용해야 합니다.');
			return false;
		} else if (checkNumber < 0 || checkEnglish < 0) {
			alert("숫자와 영문자를 혼용하여야 합니다.");
			return false;
		} else if (/(\w)\1\1\1/.test(pw)) {
			alert('같은 문자를 4번 이상 사용하실 수 없습니다.');
			return false;
		} else {
			return true;
		}
	}

	function joinCustomer() {
		var requestMember = new Object();
		var chk = false;

		if ($("#email").val() == "") {
			alert("이메일을 입력해주세요.");
			return false;
		} else if (!isEmail($("#email").val() == "")) {
			alert("올바른 이메일을 입력해주세요.");
			return false;
		} else if ($("#password1").val() == "" || $("#password2").val() == "") {
			alert("비밀번호를 입력해주세요.");
			return false;
		} else if ($("#password1").val() != $("#password2").val()) {
			alert("비밀번호 확인이 일치하지 않습니다.");
		} else if ($("#password1").val() == $("#password2").val()) {
			if (chkPW($("#password1").val())) {
				chk = chkPW($("#password1").val());
			}
		} else if ($("#name").val() == "") {
			alert("이름을 입력해주세요.");
			return false;
		} else if ($("#birthDate").val() == "") {
			alert("생년월일을 입력해주세요.");
			return false;
		} else if ($("#phone").val() == "") {
			alert("연락처를 입력해주세요.");
			return false;
		} else if (!isPhoneNum($("#phone").val() == "")) {
			alert("올바른 연락처를 입력해주세요.");
			return false;
		} else if ($('input[name=sex]').is(':checked') != 0 && $('input[name=sex]').is(':checked') != 1) {
			alert("성별을 선택해주세요.");
			return false;
		} else if ($("#zipCode").val() == "" || $("#address").val() == "" || $("#buildingNum").val() == "") {
			alert("주소를 입력해주세요.");
			return false;
		}

		if (chk) {
			requestMember.email = $("#email").val();
			requestMember.password = $("#password1").val();
			requestMember.name = $("#name").val();
			requestMember.phone = $("#phone").val();
			requestMember.zipCode = $("#zipCode").val();
			requestMember.address = $("#address").val();
			requestMember.buildingNum = $("#buildingNum").val();
			requestMember.birthDate = $("#birthDate1").val() + '-' + $("#birthDate2").val() + '-' + $("#birthDate3").val();
			requestMember.sex = $('input[name=sex]').is(':checked');

			const instance = axios.create({
				baseURL: "http://192.168.219.113:8080/permission/",
				timeout: 5000
			});

			instance.post('signUp', requestMember).then(res => {
				if (res.data.message != '회원가입에 실패했습니다.') {
					history.back();
				}
			});
		}
	}
</script>

</html>
