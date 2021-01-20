//선택한 파일 이름
function viewFile(fis, view) {
	var str = fis.value;
	$("#" + view + "").val(fis.value.substring(str.lastIndexOf("\\") + 1));
}

//파일 업로드
function uploadFile(id, fileTarget, fileClass, sendId) {
	var photoFile = document.getElementById(id);

	if(photoFile.files[0] == null) {
		alert("업로드할 파일이 없습니다.");
		return false;
	}

	var params = new FormData();
	params.append("file", photoFile.files[0]);
	params.append('fileTarget', fileTarget);
	params.append('fileClass', fileClass);
	params.append('id', sendId);

	fileURL.post('uploadFile', params, {
		headers: {
			'Content-Type': 'multipart/form-data'
		}
	}).then(res => {
		if(res.data != '') {
			alert('업로드 되었습니다.');
		}
		console.log(res.data.fileName);
	}).catch(function (error) {
		alert('파일 크기가 10MB를 넘길 수 없습니다. 다시 확인해주세요.');
	});
	return true;
}

//파일 다운로드
function downloadFile(id, fileTarget, fileClass, sendId) {
	var params = new FormData();
	params.append('fileTarget', fileTarget);
	params.append('fileClass', fileClass);
	params.append('id', sendId);


	fileURL.post('downloadFile', params,{
		responseType: 'arraybuffer',
		headers: {
			'Content-Type': 'application/json'
		}
	}).then(response => {
		const type = response.headers['content-type'];
		const blob = new Blob([response.data], {type: type, encoding: 'UTF-8'});
		const link = document.createElement('a');
		link.href = window.URL.createObjectURL(blob);
		link.download = $("#" + id + "").val();
		link.click();

		console.log(response);
	})
}
