<style>
	#excelUploadFile {
		position: absolute;
		display: none;
	}

	label[for="excelUploadFile"] {
		padding: 0.5em;
		display: inline-block;
		background: #5645ED;
		color: white;
		cursor: pointer;
	}

	label[for="excelUploadFile"]:hover {
		opacity: 0.9;
	}

	#filename {
		padding: 0.5em;
		float: left;
		width: 300px;
		white-space: nowrap;
		overflow: hidden;
		background: whitesmoke;
	}
</style>

<!-- 챗봇 엑셀 업로드 Modal -->
<div class="modal fade" id="chatBotUploadModal" tabindex="-1" aria-labelledby="chatBotUploadModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; min-width: 600px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="font-size: 22px; display: grid; text-align: center; margin-top: 30px">
					<img src="/asset/images/bg_h2_tit_top.png" style="margin: auto">
					<p style="margin: 10px">챗봇 시트 업로드</p>
				</div>
				<div class="container" style="margin: 40px 0 30px 0">
					<form method="post" enctype="multipart/form-data" action=""
						  style="margin: 0 auto; width: fit-content">
						<span id="filename">엑셀 파일을 선택해주세요.</span>
						<label for="excelUploadFile">파일선택<input type="file" id="excelUploadFile"></label>
					</form>
					<div style="color: #5645ED;text-align: center;font-weight: 400;font-size: 14px">
						※ 업로드 시간은 최대 5분 정도 소요될 수 있습니다.
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<div class="btn-save-square" style="margin: auto" onclick="uploadPackageFile()">업로드</div>
			</div>
		</div>
	</div>
</div>



<script>
	//패키지 엑셀 업로드
	function uploadPackageFile() {
		var file = document.getElementById('excelUploadFile');

		if (file.files[0] == null) {
			alert("업로드할 파일이 없습니다.");
			return false;
		}

		var params = new FormData();
		params.append("file", file.files[0]);

		fileURL.post('uploadExcel/chatBotSheet', params, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		}).then(res => {
			alert(res.data);
			location.reload();
		});
	}
</script>
