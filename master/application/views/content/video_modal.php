<style>
	.form-group img {
		width: 100%;
		height: auto;
	}
</style>

<!-- Modal -->
<div class="modal fade" id="createVideoModal" tabindex="-1" aria-labelledby="createVideoModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="min-width: 600px">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="createVideoModalLabel">글쓰기</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="createTitle">제목</label>
						<input type="text" class="form-control" id="createTitle">
					</div>
					<div class="form-group">
						<label for="createLink">
							동영상 링크
							<div style="font-size: 13px">
								링크 예시 : https://www.youtube.com/watch?v=4U2ql3YLX_w<br>
								잘못된 예시 : https://youtu.be/4U2ql3YLX_w (잘못 입력시 썸네일이 뜨지 않습니다.)
							</div>
						</label>
						<input type="text" class="form-control" id="createLink" onkeyup="LoadThumbNail(value)">
					</div>
					<div class="form-group">
						<label for="createThumbNail">
							썸네일 미리보기<br>
						</label>
						<div>
							<img src="" id="createThumbNail">
						</div>
					</div>
					<div class="form-group">
						<label for="createTag">태그</label>
						<input type="text" class="form-control" id="createTag" placeholder="ex) 태그1, 태그2">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="saveVideo()">저장</button>
			</div>
		</div>
	</div>
</div>

<script>

	function saveVideo() {
		var saveItems = new Object();
		saveItems.title = $('#createTitle').val();
		saveItems.url = $('#createLink').val();
		var hashTags = ($('#createTag').val()).split(',');
		saveItems.hashTags = hashTags;

		if ($('#createTitle').val() == "") {
			alert("제목을 입력해주세요.");
			return false;
		} else if ($('#createLink').val() == '') {
			alert('링크를 입력해주세요.');
			return false;
		} else if (hashTags.length < 1) {
			alert('해시태그를 1개 이상 입력해주세요.');
			return false;
		}

		if (confirm("한번 업로드 된 게시글은 수정할 수 없습니다. 저장하시겠습니까?") == true) {
			fileURL.post('content/createYouTube', saveItems).then(res => {
				if (res.data.message == 'Success') {
					alert('저장되었습니다.');
					location.reload();
				} else {
					alert('저장에 실패하였습니다.');
				}
			});
		} else {
			return false;
		}
	}

	function LoadThumbNail(url) {
		var src = 'https://img.youtube.com/vi/' + getParameterByName(url, 'v') + '/original.jpg'
		$('#createThumbNail').attr('src', src);
	}

	function getParameterByName(url, name) {
		name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
				results = regex.exec(url);
		return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}

</script>
