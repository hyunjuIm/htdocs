<script>
	//체크박스 전체 선택
	function clickAll(id, name) {
		if ($("#"+id+"").is(':checked')) {
			$("input[name="+name+"]").prop("checked", true);
		}
		else {
			$("input[name="+name+"]").prop("checked", false);
		}
	}

	//체크박스 하나라도 취소되면 전체 선택 해지
	function clickOne(name) {
		if($("#"+name+"").is(':checked').length == $("input[id="+ name +"]").length) {
			$("input[id="+ name +"]").prop("checked", true);
		}
		else {
			$("input[id="+ name +"]").prop("checked", false);
		}
	}

	//체크박스 하나만 체크 되게
	function onlyCheck(chk, name) {
		var obj = document.getElementsByName(name);
		for(var i=0; i<obj.length; i++){
			if(obj[i] != chk){
				obj[i].checked = false;
			}
		}
	}

	//체크값 result
	function booleanData(name) {
		var size = document.getElementsByName(name).length;
		var result;
		for(var i = 0; i < size; i++){
			if(document.getElementsByName(name)[i].checked == true){
				result = document.getElementsByName(name)[i].value
			}
		}
		return result;
	}

	// 이메일 체크 정규식
	function isEmail(asValue) {
		var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
		return regExp.test(asValue); // 형식에 맞는 경우 true 리턴
	}

	// 핸드폰 번호 체크 정규식
	function isPhoneNum(asValue) {
		var regExp = /^01(?:0|1|[6-9])-(?:\d{3}|\d{4})-\d{4}$/;
		return regExp.test(asValue); // 형식에 맞는 경우 true 리턴
	}

	//특수문자 제거 - (쉼표 제외)
	function regExp(str) {
		var reg = /[\{\}\[\]\/?.;:|\)*~`!^\-_+<>@\$%&\\\=\(\'\"]/gi
		//특수문자 검증
		if (reg.test(str)) {
			//특수문자 제거후 리턴
			return str.replace(reg, "");
		} else {
			//특수문자가 없으므로 본래 문자 리턴
			return str;
		}
	}

	//저장할 때 - 금액에서 천단위 , 쉼표 제거
	function savePrice(price) {
		var result = document.getElementById(price).innerText;
		var reg = /[,]/gi
		if (reg.test(result)) {
			return result.replace(reg, "");
		} else {
			return result;
		}
	}

	//사업장 리스트 셋팅
	function setCompanySelectOption(selectCompany, targetBranch) {
		var branch = document.getElementById(targetBranch);

		var opt = document.createElement("option");
		branch.appendChild(opt);

		removeAll(branch);

		for (i = 0; i < companySelect.length; i++) {
			var jbSplit = companySelect[i].split('-');
			var branchName = jbSplit[jbSplit.length - 1];

			if(selectCompany.value == jbSplit[0]) {
				var html = '';
				html += '<option>' + branchName + '</option>'
				$("#"+targetBranch+"").append(html);
			}
		}
	}

	//옵션 삭제
	function removeAll(e){
		for(var i = 0, limit = e.options.length; i < limit - 1; ++i){
			e.remove(1);
		}
	}
</script>
