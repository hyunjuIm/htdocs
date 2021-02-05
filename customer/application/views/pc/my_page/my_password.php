<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:비밀번호변경</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		.password-table {
			width: 100%;
			border-top: black 2px solid;
			margin: 0 auto;
		}

		.password-table tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.password-table th {
			background: #f6f6f6;
			font-weight: normal !important;
			width: 17rem;
			text-align: right;
			padding: 1.3rem 3rem;
			vertical-align: middle;
		}

		.password-table td {
			width: 30rem;
			padding: 1rem 2rem;
			text-align: left;
		}
	</style>

</head>
<body>

<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/menu/side_bar_light.php');
		?>
		<!-- 우측 컨텐츠 -->
		<div class="col"
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
			<div style="height:100vh; overflow-y: auto;min-height: 90rem;">
				<!-- 상단 메뉴 -->
				<div class="container top-menu"
					 style="background-image: url(../../../../asset/images/title1.jpg)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>내정보관리</span>
							<span>｜</span>
							<span>비밀번호변경</span>
						</div>
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner " style="margin: 0 auto; ">
							<span class="title">내정보관리<br></span>
							Internal information management
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="/customer/my_page">
								<div class="title-menu" style="border-right: #828282 1px solid">
									내정보관리
								</div>
							</a>
							<div class="title-menu-select">
								비밀번호변경
							</div>
						</div>
					</div>
				</div>

				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="display: block;padding-top: 3rem">
							<div class="sub-title">비밀번호 변경</div>
							<div style="line-height: 3.5rem">다른 사람이 쉽게 알아낼 수 있는 생일/아이디/전화번호 등 개인정보는 사용하지 않는 것이 좋습니다.
							</div>
						</div>
						<div class="row" style="display: block;padding: 6rem 0">
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
							<div class="btn-light-purple-square" style="margin: 3rem 0 6rem 0;float: right"
								 onclick="changePassword()">
								변경
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<script>

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
