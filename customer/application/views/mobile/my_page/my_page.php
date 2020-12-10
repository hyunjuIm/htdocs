<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:내정보관리</title>

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

		.personal-info-table {
			margin-top: 50px;
			text-align: left;
			font-size: 1.4rem;
		}

		.personal-info-table tr {
			border-bottom: 1px solid #e5e5e5;
		}

		.personal-info-table td:not(.name) {
			padding: 8px 15px;
			vertical-align: middle;
		}

		.personal-info-table .name {
			font-size: 2.8rem;
			font-weight: 500;
			padding: 5px 3px;
		}

		.personal-info-table .name span {
			font-size: 1.4rem;
			font-weight: 300;
		}

		.personal-info-table .title {
			width: 22%;
			background: #f6f6f6;
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
	<div class="sub-title-height"
		 style="background-image: url(../../../../asset/images/mobile/bg_sub1.jpg);
		 background-size: 100%;background-position: center">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">내정보</span><br>
					주소 및 연락처는 예약확인 / 준비물 배송 등의<br>
					서비스에 이용되므로 정확한 정보를 입력하시길 바랍니다.
				</div>
			</div>

			<div class="row">
				<table class="sub-top-item">
					<tr>
						<td style="background: #5645ED" onclick="location.href='/m/my_page'">
							내정보관리
						</td>
						<td onclick="location.href='/m/my_password'">
							비밀번호 변경
						</td>
					</tr>
				</table>
			</div>

			<div class="row" id="personalInfos" style="display: block">

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
	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	// 내정보
	instance.post('CU_002_001', userData).then(res => {
		setPersonalInfo(res.data)
	});

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	// 내정보 테이블 셋팅
	function setPersonalInfo(data) {
		console.log(data);

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<table class="personal-info-table">' +
					'<tr>' +
					'<td colspan="2" class="name">' + data[i].famName + '<span> (' + data[i].grade + ')</span></td>' +
					'</tr>' +
					'<tr>' +
					'<td class="title">생년월일</td>' +
					'<td>' + data[i].birthDate + '</td>' +
					'</tr>' +
					'<tr>' +
					'<td class="title">성별</td>';
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
					'<td class="title">주소</td>' +
					'<td>' +
					'<div style="display: flex">' +
					'<input type="text" id=\'' + zonecode + '\' value=\'' + data[i].zipcode + '\' placeholder="우편번호" readonly>' +
					'<button type="button" class="btn btn-dark" style="width: 30%;margin-left: 3px;" ' +
					'onclick="openAddressSearch(\'' + zonecode + '\', \'' + address + '\', \'' + buildingName + '\')">주소검색' +
					'</button>' +
					'</div>' +
					'<input type="text" style="margin-top: 5px" id=\'' + address + '\' value=\'' + data[i].address + '\' readonly/>' +
					'<input type="text" style="margin-top: 5px" id=\'' + buildingName + '\' value=\'' + data[i].buildingNum + '\' placeholder="상세주소"/>' +
					'</td>' +
					'</tr>' +
					'<tr>' +
					'<td class="title">연락처</td>' +
					'<td><input type="text" id=\'' + phone + '\' value="' + data[i].phone + '"></td>' +
					'</tr>' +
					'<tr>' +
					'<td class="title">이메일</td>' +
					'<td><input type="email" id=\'' + email + '\' value="' + data[i].email + '"></td>' +
					'</tr>' +
					'</table>'+
					'<div class="btn-light-purple-square" style="margin: 10px 0 30px 0;float: right"' +
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
		} else if ($("#" + email + "").val() == "") {
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
					location.reload();
				}
			});
		} else {
			return false;
		}
	}
</script>

</html>
