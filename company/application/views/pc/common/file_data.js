//양식 다운로드
function downloadBasicSheet(tag, title){
	var params = new FormData();
	params.append('tag', tag);

	fileURL.post('downloadBaseSheetExcel', params,{
		responseType: 'arraybuffer',
		headers: {
			'Content-Type': 'application/json'
		}
	}).then(response => {
		const type = response.headers['content-type'];
		const blob = new Blob([response.data], {type: type, encoding: 'UTF-8'});
		const link = document.createElement('a');
		link.href = window.URL.createObjectURL(blob);
		link.download = title;
		link.click();
	})
}


//엑셀 저장에 필요한 함수
function s2ab(s) {
	var buf = new ArrayBuffer(s.length); //convert s to arrayBuffer
	var view = new Uint8Array(buf);  //create uint8array as viewer
	for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF; //convert to octet
	return buf;
}

//오늘날짜 YYYYMMDD
function todayString() {
	var date = new Date();
	var year = date.getFullYear();
	var month = new String(date.getMonth() + 1);
	var day = new String(date.getDate());

	if (month.length == 1) {
		month = "0" + month;
	}
	if (day.length == 1) {
		day = "0" + day;
	}

	return year + month + day;
}
