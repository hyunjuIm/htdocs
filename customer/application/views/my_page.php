<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:내정보관리</title>

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

		.personal-info-table {
			width: 100%;
			border-top: black 2px solid;
			margin: 0 auto;
		}

		.personal-info-table tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.personal-info-table th {
			background: #f6f6f6;
			font-weight: normal !important;
			width: 17rem;
			text-align: right;
			padding: 1.3rem 3rem;
			vertical-align: middle;
		}

		.personal-info-table td {
			width: 30rem;
			padding: 1rem 2rem;
			text-align: left;
		}

		.personal-info-table .name {
			width: 25rem;
			text-align: center;
			background: #fbfbfb;
			border-right: 1px solid #a7a7a7;
		}

		.name {
			font-size: 3rem;
			line-height: 2.7rem;
		}

		.name span {
			font-size: 1.6rem;
		}

		input {
			width: 100%;
			border: 1px solid #d5d5d5;
		}

		@media only screen and (max-width: 1700px) {
			html {
				font-size: 8px;
			}
		}

		@media only screen and (max-device-width: 480px) {
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
					 style="background-image: url(../../asset/images/title1.jpg); height: 30rem;text-align: center;">
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
							<div class="title-menu-select" style="border-right: #828282 1px solid">
								내정보관리
							</div>
							<a href="/customer/my_password">
								<div class="title-menu">
									비밀번호변경
								</div>
							</a>
						</div>
					</div>
				</div>

				<!-- 컨텐츠내용 -->
				<div class="container" style="text-align: center;color: black;width: 130rem;padding: 6rem;">
					<div class="row" style="padding-top: 3rem">
						<div style="margin: 0 auto; font-weight: bolder">
							<img src="/asset/images/title_bar.png">
							<p style="font-size: 3.2rem">내정보</p>
							주소 및 연락처는 예약확인/준비물 배송 등의 서비스에 이용되므로 정확한 정보를 입력하시길 바랍니다.
						</div>
					</div>
					<div class="row" id="personalInfos" style="display: block;padding: 6rem 0">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>

<?php
require('check_data.php');
?>

<script>
	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	// 내정보
	instance.post('CU_002_001', userData).then(res => {
		setPersonalInfo(res.data)
	});

	// 내정보 테이블 셋팅
	function setPersonalInfo(data) {
		console.log(data);

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<table class="personal-info-table">' +
					'<tr>' +
					'<th class="name" rowspan="4">' + data[i].famName + '<br><span>(' + data[i].grade + ')</span></th>' +
					'<th>생년월일</th>' +
					'<td>' + data[i].birthDate + '</td>' +
					'<th>성별</th>';
			if (data[i].sex) {
				html += '<td>남성</td>';
			} else {
				html += '<td>여성</td>';
			}

			//주소
			var zonecode = i + 'zonecode';
			var address = i + 'address';
			var buildingName = i + 'buildingName';
			//연락처
			var phone = i + 'phone';
			//이메일
			var email = i + 'email';

			html += '</tr>' +
					'<tr>' +
					'<th>주소</th>' +
					'<td colspan="3">' +
					'<div style="display: flex">' +
					'<input type="text" id=\'' + zonecode + '\' value=\'' + data[i].zipcode + '\' readonly/>' +
					'<div class="btn-save-square" style="width: 15%;margin-left: 1rem;line-height: 1.5rem"' +
					'onclick="openAddressSearch(\'' + zonecode + '\', \'' + address + '\', \'' + buildingName + '\')">' +
					'주소검색' +
					'</div>' +
					'</div>' +
					'<input type="text" id=\'' + address + '\' value=\'' + data[i].address + '\' style="margin-top: 0.5rem" readonly/>' +
					'<input type="text" id=\'' + buildingName + '\' value=\'' + data[i].buildingNum + '\' style="margin-top: 0.5rem" placeholder="상세주소"/>' +
					'</td>' +
					'</tr>' +
					'<tr>' +
					'<th>연락처</th>' +
					'<td colspan="3">' +
					'<input type="text" id=\'' + phone + '\' value="' + data[i].phone + '">' +
					'</td>' +
					'</tr>' +
					'<tr>' +
					'<th>이메일</th>' +
					'<td colspan="3">' +
					'<input type="email" id=\'' + email + '\' value="' + data[i].email + '">' +
					'</td>' +
					'</tr>' +
					'</table>' +
					'<div class="btn-light-purple-square" style="margin: 3rem 0 6rem 0;float: right"' +
					'onclick="savePersonalInfo(\'' + data[i].famId + '\', \'' + zonecode + '\', \'' + address + '\', \'' + buildingName + '\', \'' + phone + '\', \'' + email + '\')">' +
					'저장' +
					'</div>';
			$("#personalInfos").append(html);
		}
	}

	//주소검색
	function openAddressSearch(zonecode, address, buildingName) {
		new daum.Postcode({
			oncomplete: function (data) {
				$("#" + zonecode + "").val(data.zonecode); // 우편번호 (5자리)
				$("#" + address + "").val(data.address);
				$("#" + buildingName + "").val(data.buildingName);
				$("#" + buildingName + "").focus();
			}
		}).open();
	}

	//고객 정보 수정 저장
	function savePersonalInfo(famId, zonecode, address, buildingName, phone, email) {
		if ($("#" + buildingName + "").val() == "") {
			alert("상세주소를 입력해주세요.");
			$("#" + buildingName + "").focus();
			return;
		} else if ($("#" + phone + "").val() == "") {
			alert("연락처를 입력해주세요.");
			$("#" + phone + "").focus();
			return;
		} else if (!isPhoneNum($("#" + phone + "").val())) {
			alert("올바른 연락처를 입력해주세요.");
			$("#" + phone + "").focus();
			return;
		}  else if ($("#" + email + "").val() == "") {
			alert("이메일을 입력해주세요.");
			$("#" + email + "").focus();
			return;
		} else if (!isEmail($("#" + email + "").val())) {
			alert("올바른 이메일를 입력해주세요.");
			$("#" + email + "").focus();
			return;
		}

		var saveItems = new Object();

		saveItems.famId = famId;
		saveItems.zipcode = $("#" + zonecode + "").val();
		saveItems.address = $("#" + address + "").val();
		saveItems.buildingNum = $("#" + buildingName + "").val();
		saveItems.phone = $("#" + phone + "").val();
		saveItems.email = $("#" + email + "").val();
		console.log(saveItems);

		if (confirm("수정하시겠습니까?") == true) {
			instance.post('CU_002_002', saveItems).then(res => {
				console.log(res.data);
				if (res.data.message == "success") {
					alert("저장되었습니다.");
				}
			});
		} else {
			return false;
		}
	}
</script>

</html>