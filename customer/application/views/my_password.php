<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:비밀번호변경</title>

	<?php
	require('head.php');
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
				<div class="container top-menu"
					 style="background-image: url(../../asset/images/title1.jpg)">
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
				<div class="container" style="text-align: center;color: black;width: 130rem;padding: 6rem;">
					<div class="row" style="display: block;padding-top: 3rem">
						<div class="sub-title">비밀번호 변경</div>
						<div style="line-height: 3.5rem">다른 사람이 쉽게 알아낼 수 있는 생일/아이디/전화번호 등 개인정보는 사용하지 않는 것이 좋습니다.</div>
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

</body>

<script>
	function changePassword() {
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
		}

		var saveItems = new Object();

		saveItems.cusId = sessionStorage.getItem("userCusID");
		saveItems.beforePassword = $("#beforePassword").val();
		saveItems.afterPassword = $("#afterPassword").val();
		saveItems.afterPasswordCheck = $("#afterPasswordCheck").val();

		console.log(saveItems);

		// 내정보
		instance.post('CU_002_003', saveItems).then(res => {
			console.log(res.data);
			if (res.data.message == "success") {
				sessionStorage.clear();
				alert("비밀번호가 변경되었습니다. 다시 로그인해주세요.");
				location.href = "/customer/customer_login";
			} else {
				alert("비밀번호를 다시 확인해주세요.");
			}
		});
	}

</script>

</html>
