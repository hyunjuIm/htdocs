<script>
	var get = location.href.substr(
		location.href.indexOf('=', 1) + 1
	);
	var famId = get.split("?");
	famId = famId[0];

	//예약을 위한 id 가져오기
	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	userData.famId = famId;
	userData.hosId = location.href.substr(
		location.href.lastIndexOf('=') + 1
	);

	console.log(userData);

</script>
