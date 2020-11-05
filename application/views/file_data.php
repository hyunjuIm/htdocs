<script>
	$("#FILE_TAG").on('change',function(){
		var fileName = $("#FILE_TAG").val();
		$(".upload-name").val(fileName);
	});

	//파일 업로드
	function uploadFile() {
		var photoFile = document.getElementById("FILE_TAG");
		var params = new FormData();
		params.append("file", photoFile.files[0]);
		params.append('fileTarget', "hospital");
		params.append('fileClass', "image");
		params.append('id', hosId.hospitalId);

		fileURL.post('uploadFile',params,{
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		}).then(res => {
			console.log(res.data);
		});
	}

	//파일 다운로드
	function downloadFile(){
		var params = new URLSearchParams();
		params.append("fileName","main_dashboard_btn02.png");

		fileURL.get("downloadFile/main_dashboard_btn02.png", {
			responseType: 'arraybuffer',
			headers: {
				'Content-Type': 'application/json'
			}
		}).then(response => {
			const type = response.headers['content-type'];
			const blob = new Blob([response.data], { type: type, encoding: 'UTF-8' });
			const link = document.createElement('a');
			link.href = window.URL.createObjectURL(blob);
			link.download = 'main_dashboard_btn02.png';
			link.click();

			console.log(response);
		})

	}
</script>
