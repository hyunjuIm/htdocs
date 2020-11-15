<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:비밀번호변경</title>

	<?php
	require('head.php');
	?>

	<style>
		html {
			font-size: 10px;
		}

		body {
			font-size: 1.6rem;
		}

		.container {
			width: 100%;
			max-width: none;
		}

		.wrap {
			display: flex;
			justify-content: center;
		}

		.inner {
			align-self: center;
			padding: 2rem;
		}

		.title-menu, .title-menu-select {
			width: 30rem;
			height: 4.5rem;
			background-color: rgba(0, 0, 0, 0.5);
			color: white;
			line-height: 4.5rem;
			cursor: pointer;
			align-self: flex-end;
		}

		.title-menu:hover, .title-menu-select {
			background: #5645ED;
		}

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

		input {
			width: 40%;
			border: 1px solid #d5d5d5;
			background: #f6f6f6;
		}

		@media only screen and (max-width: 1700px) {
			html {
				font-size: 8px;
			}
		}

		@media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
			html {
				font-size: 7px;
			}
		}
	</style>

</head>
<body>

<header>
	<?php
	require('header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		require('side_bar_light.php');
		?>
		<!-- 우측 컨텐츠 -->
		<div class="col"
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
			<div style="height:100vh; overflow-y: scroll;min-height: 90rem;">
				<!-- 상단 메뉴 -->
				<div class="container"
					 style="background: #808080; height: 30rem;text-align: center;">
					<div class="row" style="min-width:inherit; height: 3.5rem;border-bottom:1px solid #9a9a9a">
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner" style="margin: 0 auto; ">
							<span style="font-size: 3.2rem">내정보관리<br></span>
							Internal information management
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="/customer/my_page">
								<div class="title-menu">
									내정보관리
								</div>
							</a>
							<div class="title-menu-select" style="border-right: #828282 1px solid">
								비밀번호변경
							</div>
						</div>
					</div>
				</div>

				<!-- 컨텐츠내용 -->
				<div class="container" style="text-align: center;color: black;width: 130rem;padding: 6rem;">
					<div class="row" style="padding-top: 3rem">
						<div style="margin: 0 auto; font-weight: bolder">
							<p style="font-size: 3.2rem">비밀번호변경</p>
							다른 사람이 쉽게 알아낼 수 있는 생일/아이디/전화번호 등 개인정보는 사용하지 않는 것이 좋습니다.
						</div>
					</div>
					<div class="row" style="display: block;padding: 6rem 0">
						<table class="password-table">
							<tr>
								<th>현재 비밀번호</th>
								<td>
									<input type="password" id="nowPassword">
								</td>
							</tr>
							<tr>
								<th>새로운 비밀번호</th>
								<td>
									<input type="password" id="changePassword1">
								</td>
							</tr>
							<tr>
								<th>새로운 비밀번호 확인</th>
								<td>
									<input type="password" id="changePassword2">
								</td>
							</tr>
						</table>
						<div class="btn-light-purple-square" style="margin: 3rem 0 6rem 0;float: right"
						onclick="changePassword(nowPassword.value, changePassword1.value, changePassword2.value)">
							변경
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>

<script>
	function changePassword(nowPassword, changePassword1, changePassword2) {
		console.log(changePassword1, changePassword2);
		if(changePassword1 != changePassword2) {
			alert("새 비밀번호와 비밀번호 확인이 일치하지 않습니다.");
		}
	}

</script>

</html>
