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

		console.log(response);
	})
}
