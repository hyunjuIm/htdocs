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
var choiceAllList = new Array();

//선택검사 테이블 출력
function setChoiceInjectionList(data) {
	$("#accordionExample").empty();
	choiceList = [];
	choiceAllList = data;

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

	// 선택검사 알파벳순 정렬
	choiceList.sort(function (a, b) {
		const titleA = a.title.toUpperCase(); // ignore upper and lowercase
		const titleB = b.title.toUpperCase(); // ignore upper and lowercase
		if (titleA < titleB) {
			return -1;
		}
		if (titleA > titleB) {
			return 1;
		}

		return 0;
	});

	//선택검사 항목 출력
	for (i = 0; i < choiceList.length; i++) {
		var html = '';
		html += '<div class="card-set">' +
			'<div class="card-header" id=\'' + choiceList[i].title[2] + '\'>' +
			'<div class="text-left"' +
			' data-toggle="collapse" data-target=\'' + '#' + choiceList[i].title[2] + 'col' + '\'' +
			' aria-expanded="false"' +
			' aria-controls=\'' + choiceList[i].title[2] + 'col' + '\'>' +
			choiceList[i].title + '<span class="injection-count"> (택' + choiceList[i].count + ')</span>' +
			'<div style="float:right">' +
			'<img src="/asset/images/icon_drop_down.png">' +
			'</div>' +
			'</div>' +
			'</div>' +
			'<div id=\'' + choiceList[i].title[2] + 'List' + '\'>' +
			'</div>' +
			'<div id=\'' + choiceList[i].title[2] + 'col' + '\' class="collapse" aria-labelledby=\'' + choiceList[i].title[2] + '\'' +
			' data-parent="#accordionExample">' +
			'<div class="card-body">';

		var chId = choiceList[i].title[2] + 'Ch';

		for (j = 0; j < data.length; j++) {
			if (choiceList[i].title == data[j].ipClass) {
				html += '<div class="injection-content">' +
					'<div class="form-check form-check-inline">' +
					'<input class="form-check-input" type="checkbox" id=\'' + data[j].ipCode + '\'' +
					'name=\'' + choiceList[i].title + '\' value=\'' + data[j].id + '\' ' +
					'onclick="choiceInjectionCount(this, name, \'' + choiceList[i].count + '\');' +
					'choiceInjection(name, choiceAllList, \'' + chId + '\')">' +
					'<label class="form-check-label" for=\'' + data[j].ipCode + '\'>&nbsp&nbsp' + data[j].inspection +
					'<span class="injection-memo">&nbsp&nbsp' + data[j].memo + '</span></label></div></div>';
			}
		}

		html += '</div>' +
			'</div>' +
			'<div id=\'' + chId + '\'></div>' +
			'</div>';

		$("#accordionExample").append(html);
	}
}

//체크박스 선택검사 항목 체크 개수 제한
function choiceInjectionCount(chk, name, max) {
	if ($('input:checkbox[name=' + name + ']:checked').length > max) {
		alert("최대 선택 개수를 초과하였습니다.");
		chk.checked = false;
	}
}

var addIjList = new Array();

//추가검사 테이블 셋팅
function setAddInjectionList(data) {
	$("#addInjection").empty();
	addIjList = data;
	for (i = 0; i < data.length; i++) {
		if (data[i].ipClass == '추가') {
			var html = "";

			html += '<div class="injection-content">' +
				'<div class="form-check form-check-inline">' +
				'<input class="form-check-input" type="checkbox" name="addInjectionCheck" ' +
				'value=\'' + data[i].id + '\' id=\'' + data[i].ipCode + '\'' +
				'onclick="clickOne(name);addInjectionPrice(this, \'' + data[i].price + '\');' +
				'choiceInjection(name, addIjList, ' + "'choiceAddView'" + ')">' +
				'<label class="form-check-label" for=\'' + data[i].ipCode + '\'>&nbsp&nbsp' + data[i].inspection +
				'<span class="injection-price">&nbsp&nbsp' + data[i].price.toLocaleString() +
				'원 </span> <span class="injection-memo">&nbsp' + data[i].memo + '</span></label></div></div>';

			$("#addInjection").append(html);
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

//선택한 항목 보이기
function choiceInjection(name, list, chList) {
	$("#" + chList + "").empty();

	var html = '';
	var count = 1;

	$('input:checkbox[name=' + name + ']').each(function () {
		if (this.checked) {
			var item = this.value;

			for (i = 0; i < list.length; i++) {
				if (item == list[i].id) {
					html += '<div class="injection-choice">' +
						count + '. ' + list[i].inspection;
					if (list[i].ipClass == '추가') {
						html += '&nbsp<span class="injection-price">' +
							list[i].price.toLocaleString() + '원</span>';
					}
					html += '</div>';

					count += 1;
				}
			}
		}
	});

	$("#" + chList + "").append(html);
}

