<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		html {
			font-size: 10px;
		}

		body {
			font-size: 1.6rem;
		}

	</style>

</head>
<body>

<header>
	<?php
	require('common/header.php');
	?>

	<?php
	require('menu/side.php');
	?>
</header>

<div id="main">

</div>

</body>

<script>
	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	//공지사항
	instance.post('CU_001_001', userData).then(res => {
		setMainNotice(res.data);
	});

	function setMainNotice(data) {
		console.log(data);
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td class="title" style="width: 80%" onclick="moveNoticeDetail(\'' + data[i].id + '\')">' + "· " + data[i].title + '</td>';
			html += '<td class="date">' + data[i].createDate + '</td>';
			html += '</tr>';

			$("#mainNoticeInfos").append(html);
		}
	}

	function moveNoticeDetail(id) {
		location.href = "/customer/notice_detail?noticeId=" + id;
	}

</script>

<!--챗봇-->
<script
		botId="B1j0vo"
		data-name="test_user_NAME"
		data-user-id="test_user_ID"
		data-email="test_user_email@TESTADDRESS.GG"
		src="https://www.closer.ai/js/webchat.min.js">
</script>

</html>
