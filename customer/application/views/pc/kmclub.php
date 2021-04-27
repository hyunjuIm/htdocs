<?php

function goto_url($url)
{
	$url = str_replace("&amp;", "&", $url);
	//echo "<script> location.replace('$url'); </script>";

	if (!headers_sent())
		header('Location: '.$url);
	else {
		echo '<script>';
		echo 'location.replace("'.$url.'");';
		echo '</script>';
		echo '<noscript>';
		echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
		echo '</noscript>';
	}
	exit;
}

$key = "dualhealth_kmclub_forever";
$enc_key = hash("sha256", $key);//1d9712a38b1ebdb4ad03b3c709ac648ebc8f8786fac52c0282578c4b4c91bf92

$id = $_GET['id'];
$t = $_GET['t'];

echo 'id: '.$id.'<br>t: '.$t;
echo '<br>';
if($t == $enc_key){//토큰 인증 성공
	echo '인증 성공';
	//국민클럽 api 호출
	//id -> 이름, 생년월일, 성별, 휴대폰번호, 주소, 이메일
	if(true){//국민클럽 api 호출 성공 시

		//듀얼 api 호출
		if(true){//듀얼 api 호출 성공 시

			//세션에 정보 등록(로그인과 같이)
			//goto_url("index");
		}
		else{
			//goto_url("뒤로가기");
		}
	}
	else{//국민클럽 api 호출 실패 시
		//goto_url("뒤로가기");
	}
	//goto_url("뒤로가기");

}
else{//토큰 인증 실패
	echo '인증 실패';
	//goto_url("뒤로가기");
}


