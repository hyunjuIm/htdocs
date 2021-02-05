<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:비밀번호변경</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<style>
		.sub-top-item {
			background: #2e2392;
			font-size: 1.4rem;
			color: white;
		}

		.sub-top-item td {
			width: 50%;
			padding: 10px 20px;
		}

		.sub-top-item td:hover {
			background: #5645ED;
		}

		.password-table {
			border-top: black 2px solid;
			margin: 50px 0 30px 0;
			text-align: left;
		}

		.password-table tr {
			border-bottom: 1px solid #e5e5e5;
		}

		.password-table th, .password-table td {
			padding: 8px 15px;
			vertical-align: middle;
		}

		.password-table th {
			background: #f6f6f6;
			font-weight: normal !important;
			width: 45%;
			vertical-align: middle;
		}

		.password-table td {
			width: 30rem;
		}
	</style>

</head>
<body>

<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/menu/side.php');
	?>
</header>

<div id="main">
	<div class="sub-title-height" style="background: url(../../../../asset/images/mobile/bg_sub1.jpg);background-size: 100%;background-position: center">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">비밀번호 변경</span><br>
					다른 사람이 쉽게 알아낼 수 있는 <br>
					생일 / 아이디 / 전화번호 등 <br>
					개인정보는 사용하지 않는 것이 좋습니다.
				</div>
			</div>

			<div class="row">
				<table class="sub-top-item">
					<tr>
						<td onclick="location.href='/m/my_page'">
							내정보관리
						</td>
						<td style="background: #5645ED" onclick="location.href='/m/my_password'">
							비밀번호 변경
						</td>
					</tr>
				</table>
			</div>

			<div class="row" style="display: block">
				<table class="password-table">
					<tr>
						<th>현재 비밀번호</th>
						<td>
							<input type="password" id="beforePassword">
						</td>
					</tr>
					<tr>
						<th>새로운 비밀번호</th>
						<td>
							<input type="password" id="afterPassword">
						</td>
					</tr>
					<tr>
						<th>새로운 비밀번호 확인</th>
						<td>
							<input type="password" id="afterPasswordCheck">
						</td>
					</tr>
				</table>
				<div class="btn-light-purple-square" style="margin: 0 auto"
					 onclick="changePassword()">
					변경
				</div>
			</div>

		</div>

		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/common/footer.php');
		?>
	</div>


</div>

</body>

<script>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	//비밀번호 정규식
	function chkPW(pw) {
		var id = sessionStorage.getItem("userCusID");
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
		} else if (pw.search(id) > -1) {
			alert("비밀번호에 아이디가 포함되었습니다.");
			return false;
		} else {
			return true;
		}
	}

	//비밀번호 변경
	function changePassword() {
		var chk = false;

		if ($("#beforePassword").val() == "") {
			alert("현재 비밀번호를 입력해주세요.");
			$("#beforePassword").focus();
			return;
		} else if ($("#afterPassword").val() == "") {
			alert("새로운 비밀번호를 입력해주세요.");
			$("#afterPassword").focus();
			return;
		} else if ($("#afterPasswordCheck").val() == "") {
			alert("새로운 비밀번호 확인을 입력해주세요.");
			$("#afterPasswordCheck").focus();
			return;
		} else if ($("#afterPassword").val() != $("#afterPasswordCheck").val()) {
			alert("새 비밀번호와 비밀번호 확인이 일치하지 않습니다.");
		} else {
			if(chkPW($("#afterPassword").val())) {
				chk = chkPW($("#afterPasswordCheck").val());
			}
		}

		if(chk) {
			var saveItems = new Object();

			saveItems.cusId = sessionStorage.getItem("userCusID");
			saveItems.beforePassword = $("#beforePassword").val();
			saveItems.afterPassword = $("#afterPassword").val();
			saveItems.afterPasswordCheck = $("#afterPasswordCheck").val();



			// 내정보
			instance.post('CU_002_003', saveItems).then(res => {

				if (res.data.message == "success") {
					sessionStorage.clear();
					alert("비밀번호가 변경되었습니다. 다시 로그인해주세요.");
					location.href = "/customer/customer_login";
				} else {
					alert("비밀번호를 다시 확인해주세요.");
				}
			});
		}
	}

</script>

</html>
