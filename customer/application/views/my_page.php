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

		input {
			width: 100%;
			border:1px solid #d5d5d5;
		}

		@media only screen and (max-width: 1024px) {
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
					'<th class="name" rowspan="4">'+ data[i].grade +'</th>' +
					'<th>생년월일</th>' +
					'<td>' + data[i].birthDate + '</td>' +
					'<th>성별</th>';
			if(data[i].sex) {
				html += '<td>남성</td>';
			} else {
				html += '<td>여성</td>';
			}

			//주소
			var zonecode = i + 'zonecode';
			var address = i + 'address';
			var buildingName = i + 'buildingName';

			html += '</tr>'+
					'<tr>' +
					'<th>주소</th>' +
					'<td colspan="3">' +
					'<div style="display: flex">' +
					'<input type="text" id=\'' + zonecode + '\' readonly/>' +
					'<div class="btn-save-square" style="width: 15%;margin-left: 1rem;line-height: 1.5rem"' +
					'onclick="openAddressSearch(\'' + zonecode + '\', \'' + address + '\', \'' + buildingName + '\')">' +
					'주소검색' +
					'</div>' +
					'</div>' +
					'<input type="text" id=\'' + address + '\' style="margin-top: 0.5rem" readonly/>' +
					'<input type="text" id=\'' + buildingName + '\' style="margin-top: 0.5rem" placeholder="상세주소"/>' +
					'</td>' +
					'</tr>' +
					'<tr>' +
					'<th>연락처</th>' +
					'<td colspan="3">' +
					'<input type="text" value="'+ data[i].phone +'">' +
					'</td>' +
					'</tr>' +
					'<tr>' +
					'<th>이메일</th>' +
					'<td colspan="3">' +
					'<input type="email" value="' + data[i].email +'">' +
					'</td>' +
					'</tr>' +
					'</table>' +
					'<div class="btn-light-purple-square" style="margin: 3rem 0 6rem 0;float: right">' +
					'저장' +
					'</div>';
			$("#personalInfos").append(html);
		}
	}

	//주소검색
	function openAddressSearch(zonecode, address, buildingName) {
		new daum.Postcode({
			oncomplete: function(data) {
				$("#"+zonecode+"").val(data.zonecode); // 우편번호 (5자리)
				$("#"+address+"").val(data.address);
				$("#"+buildingName+"").val(data.buildingName);
				$("#"+buildingName+"").focus();
			}
		}).open();
	}
</script>

</html>
