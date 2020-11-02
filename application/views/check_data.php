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
</script>
