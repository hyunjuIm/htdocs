<?php

require('common/head.php');


$key = "kmclub_dualhealth_auth_token";
$enc_key = hash("sha256", $key);//52bfaf78065ff0929fba4a57548f2364f4a48057da94d948e9b0674f6852f910

$id = $_GET['id'];
$t = $_GET['token'];

$url = 'https://kmclub.co.kr/api/member/';
$post = array(
	'id' => $id,
	'token' => $t
);

$json_data = httpPost($url, $post);

if ($json_data["state"] == 'success') {
	echo '페이지 이동중입니다...<br>';

	$json_data = $json_data['data'];

	$name = $json_data['name'];
	$birthDate1 = $json_data['birth_year'];
	$birthDate2 = $json_data['birth_month'];
	$birthDate3 = $json_data['birth_day'];
	$phone1 = $json_data['hp_sub1'];
	$phone2 = $json_data['hp_sub2'];
	$phone3 = $json_data['hp_sub3'];
	$email = $json_data['email'];
	$gender = $json_data['gender'];
	$old_zip = $json_data['old_zip'];
	$new_zip = $json_data['new_zip'];
	$address = $json_data['address'];
} else {
	echo '<script>alert("잘못된 접근입니다.");location.href = "/customer/login";</script>';
}

function httpPost($url, $data)
{
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($curl);
	if (curl_error($curl)) {
		$curl_data = null;
		echo curl_error($curl);
		return false;
	} else {
		$curl_data = $response;
	}

	curl_close($curl); //받은 JSON데이터를 배열로 만듬
	return json_decode($curl_data, true);
}

?>

<script>
	var token = '<?= $t ?>';
	var enc_key = '<?= $enc_key ?>';

	if (token == enc_key) {//토큰 인증 성공
		//국민클럽 api 호출
		//id -> 이름, 생년월일, 성별, 휴대폰번호, 주소, 이메일
		if (true) {//국민클럽 api 호출 성공 시
			//듀얼 api 호출
			const permissionCheck = axios.create({
				baseURL: "https://api.dualhealth.kr/permission/",
				timeout: 5000
			});

			var userData = new Object();
			userData.id = '<?= $id ?>';
			userData.id = emptyCheck(userData.id);

			userData.name = '<?= $name ?>';
			userData.name = emptyCheck(userData.name);

			userData.phone = '<?= $phone1 ?>' + '-' + '<?= $phone2 ?>' + '-' + '<?= $phone3 ?>';
			userData.phone = '--' ? '010-0000-0000' : userData.phone;

			userData.zipCode = '<?= $new_zip ?>';
			userData.zipCode = emptyCheck(userData.zipCode);

			userData.address = '<?= $address ?>';
			userData.address = emptyCheck(userData.address);

			userData.buildingNum = '<?= $old_zip ?>';
			userData.buildingNum = emptyCheck(userData.buildingNum);

			userData.email = '<?= $email ?>';
			userData.email = emptyCheck(userData.email);

			userData.birthDate = '<?= $birthDate1 ?>' + '-' + '<?= $birthDate2 ?>' + '-' + '<?= $birthDate3 ?>';
			userData.birthDate = '--' ? getToday() : userData.birthDate;

			userData.sex = '<?= $gender ?>';
			userData.sex = '남성' ? true : false;

			// 내정보
			permissionCheck.post("kmclub", userData).then(res => {
				var data = res.data;
				sessionStorage.setItem("token", data.data);
				sessionStorage.setItem("userID", userData.email);
				sessionStorage.setItem("userName", userData.name);
				sessionStorage.setItem("userCusID", userData.id);
				location.href = '/';
			}).catch(function (error) {
				alert('잘못된 접근입니다.\n' + error);
				location.href = "/customer/login";
			});

		}
	} else {
		alert('잘못된 접근입니다.');
	}

	function emptyCheck(value) {
		if (value == '' || value == null) {
			return 'test';
		} else {
			return value;
		}
	}

	function getToday() {
		var date = new Date();
		var year = date.getFullYear();
		var month = ("0" + (1 + date.getMonth())).slice(-2);
		var day = ("0" + date.getDate()).slice(-2);

		return year + "-" + month + "-" + day;
	}
</script>
