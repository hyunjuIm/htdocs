var injectionData = new Array();

//기본검사 항목 테이블
function setBaseInjectionList(data) {
	$("#injectionBaseList").empty();

	injectionData = data;
	var injectionList = new Array(0, 0, 0, 0);

	//각 카테고리별 개수
	for (i = 0; i < data.length; i++) {
		if (data[i].ipClass == '기본') {
			if (data[i].category == "기본검사") {
				injectionList[0] += 1;
			} else if (data[i].category == "혈액검사") {
				injectionList[1] += 1;
			} else if (data[i].category == "장비검사") {
				injectionList[2] += 1;
			} else if (data[i].category == "기타검사") {
				injectionList[3] += 1;
			}
		}
	}

	//검사 목록 셋팅
	for (i = 0; i < 4; i++) {
		var injectionText;
		if (injectionList[i] > 0) {
			var html = "";
			html += '<li class="nav-item">' +
				'<a class="nav-link" data-toggle="tab" href="#" id=injection' + i + ' onclick="setInjectionData(id, value)">';
			if (i == 0) {
				injectionText = '기본검사';
			} else if (i == 1) {
				injectionText = '혈액검사';
			} else if (i == 2) {
				injectionText = '장비검사';
			} else if (i == 3) {
				injectionText = '기타검사';
			}
			html += injectionText + '(' + injectionList[i] + ')' +
				'</a>' +
				'</li>';

			$("#injectionBaseList").append(html);
			$("#injection" + i).val(injectionText);
		}
	}

	//처음에는 무조건 기본검사 펼치기
	$("#injection0").addClass('active');
	setInjectionData('injection0', '기본검사');
}

//기본검사 테이블 출력
function setInjectionData(id, value) {
	$("#baseInjectionTable").empty();

	$('.nav-item a id').toggleClass('active');

	var count = 0;
	for (i = 0; i < injectionData.length; i++) {
		if (injectionData[i].ipClass == '기본' && value == injectionData[i].category) {
			var html = "";
			count += 1;
			html += '<td>' + injectionData[i].inspection + '</td>';

			$("#baseInjectionTable").append(html);

			if (count == 6) {
				count = 0;
				$("#baseInjectionTable").append('<tr></tr>');
			}
		}
	}

	if (count != 0 && count < 6) {
		var index = 6 - count;
		for (i = 0; i < index; i++) {
			$("#baseInjectionTable").append('<td>&nbsp</td>');
		}
	}
}

//선택검사 항목 리스트
var choiceList = new Array();

//선택검사 테이블 출력
function setChoiceInjectionList(data) {
	$("#choiceInjectionTable").empty();
	choiceList = [];

	//선택검사 항목 어떤게 있고 몇 개인지
	for (i = 0; i < data.length; i++) {
		if ((data[i].ipClass).indexOf("선택") != -1) {
			var count = 0;
			for (j = 0; j < choiceList.length; j++) {
				if (choiceList[j].title == data[i].ipClass) {
					count += 1;
				}
			}
			if (count == 0) {
				var ijObject = new Object();
				ijObject.title = data[i].ipClass;
				ijObject.count = data[i].choiceLimit;
				choiceList.push(ijObject);
				count = 0;
			}
		}
	}

	//선택검사 항목 출력
	for (i = 0; i < choiceList.length; i++) {
		var rowSpan = 0;
		var td1 = "";
		var td2 = "";
		for (j = 0; j < data.length; j++) {
			if (choiceList[i].title == data[j].ipClass) {
				rowSpan += 1;
				if (rowSpan == 1) {
					td1 += '<td>';
					td1 += '<div class="form-check form-check-inline">' +
						'<input class="form-check-input" type="checkbox" id=\'' + data[j].ipCode + '\'' +
						'name=\'' + choiceList[i].title + '\' value=\'' + data[j].id + '\' ' +
						'onclick="choiceInjectionCount(this, name, \'' + choiceList[i].count + '\')">' +
						'<label class="form-check-label" for=\'' + data[j].ipCode + '\'>&nbsp' + data[j].inspection + '</label>' +
						'</div>';
					td1 += '</td>';
					td1 += '<td class="memo">' + data[j].memo + '</td>'
				} else {
					td2 += '<tr><td>' +
						'<div class="form-check form-check-inline">' +
						'<input class="form-check-input" type="checkbox" id=\'' + data[j].ipCode + '\'' +
						'name=\'' + choiceList[i].title + '\' value=\'' + data[j].id + '\' ' +
						'onclick="choiceInjectionCount(this, name, \'' + choiceList[i].count + '\')">' +
						'<label class="form-check-label" for=\'' + data[j].ipCode + '\'>&nbsp' + data[j].inspection + '</label>' +
						'</div></td>';
					td2 += '<td class="memo">' + data[j].memo + '</td></tr>';
				}
			}
		}
		var html = "";
		html += '<tbody><tr><td class="name" rowspan=\'' + rowSpan + '\'>' +
			choiceList[i].title + ' (' + choiceList[i].count + ')' +
			td1 + '</tr>' + td2 + '</tbody>';
		$("#choiceInjectionTable").append(html);
	}
}

//체크박스 선택검사 항목 체크 개수 제한
function choiceInjectionCount(chk, name, max) {
	if ($('input:checkbox[name=' + name + ']:checked').length > max) {
		alert("최대 선택 개수를 초과하였습니다.");
		chk.checked = false;
	}
}

//추가검사 테이블 셋팅
function setAddInjectionList(data) {
	$("#addInjectionTable > tbody").empty();
	addIjList = data;

	for (i = 0; i < data.length; i++) {
		if (data[i].ipClass == '추가') {
			var html = "";
			html += '<tr>' +
				'<td><input type="checkbox" name="addInjectionCheck" value=\'' + data[i].id + '\' ' +
				'onclick="clickOne(name);addInjectionPrice(this, \'' + data[i].price + '\')"></td>' +
				'<td style="text-align: left">' + data[i].inspection + '</td>' +
				'<td>' + data[i].price.toLocaleString() + '</td>' +
				'<td>' + data[i].memo + '</td>' +
				'</tr>';
			$("#addInjectionTable").append(html);
		}
	}
}

var sum = 0;

//추가금액 개별 계산
function addInjectionPrice(add, price) {
	$("#addInjectionPrice").empty();

	price = parseInt(price);

	if ($(add).is(":checked")) {
		sum = sum + price;
	} else {
		sum = sum - price;
	}

	$("#addInjectionPrice").text(sum.toLocaleString());
}

//추가금액 전체 계산
function addInjectionAllPrice() {
	sum = 0;

	if ($("input:checkbox[name=addInjectionCheck]").is(":checked")) {
		for (i = 0; i < injectionData.length; i++) {
			if (injectionData[i].ipClass == '추가') {
				sum += injectionData[i].price;
			}
		}
	} else {
		sum = 0;
	}

	$("#addInjectionPrice").text(sum.toLocaleString());
}
