//드롭다운 열고 닫기
$(document).on("click", ".nav-button", function () {
	$(this).parent().parent().toggleClass("closed");
});

//서브메뉴에 따른 소메뉴 셋팅
if ($('#menu1 .nav-button').text() == '예약서비스') {
	var option = '';
	option += '<li><a href="#" class="nav-button">검진예약</a></li>' +
		'<li><a href="#">검진예약</a></li>' +
		'<li><a href="#">검진현황</a></li>';
	$('#menu2 ul').append(option);
} else if ($('#menu1 .nav-button').text() == '검진결과') {
	var option = '';
	option += '<li><a href="#" class="nav-button">검진결과</a></li>' +
		'<li><a href="#">검진결과</a></li>';
	$('#menu2 ul').append(option);
} else if ($('#menu1 .nav-button').text() == '건강정보') {
	var option = '';
	option += '<li><a href="#" class="nav-button">질병백과</a></li>' +
		'<li><a href="#">질병백과</a></li>';
	$('#menu2 ul').append(option);
} else if ($('#menu1 .nav-button').text() == '이용안내') {
	var option = '';
	option += '<li><a href="#" class="nav-button">공지사항</a></li>' +
		'<li><a href="#">공지사항</a></li>' +
		'<li><a href="#">병원별검진항목비교</a></li>' +
		'<li><a href="#">건강검진 안내</a></li>';
	$('#menu2 ul').append(option);
} else if ($('#menu1 .nav-button').text() == '고객센터') {
	var option = '';
	option += '<li><a href="#" class="nav-button">자주 묻는 질문</a></li>' +
		'<li><a href="#">자주 묻는 질문</a></li>' +
		'<li><a href="#">1:1 문의</a></li>' +
		'<li><a href="#">내 문의 내역</a></li>';
	$('#menu2 ul').append(option);
}

$('#menu2 .nav-button').text(menu2);

//선택된 드롭다운 메뉴 배경색 변경
$('#menu1 .drop-down li a').not('.nav-button').each(function () {
	if ($('#menu1 .nav-button').text() == $(this).text()) {
		$(this).css("background-color", "#5645ED");
	}
});

$('#menu2 .drop-down li a').not('.nav-button').each(function () {
	if ($('#menu2 .nav-button').text() == $(this).text()) {
		$(this).css("background-color", "#5645ED");
	}
});
