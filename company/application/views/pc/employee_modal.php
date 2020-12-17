<style>
	.modal-body {
		font-size: 1.5rem !important;
		padding: 3rem;
	}

	#title {
		font-size: 2rem;
		color: #3529b1;
		font-weight: 500;
		line-height: 3.5rem;
	}

	#createDate {
		color: grey;
	}

	.state {
		display: block;
		font-size: 1.5rem;
		padding: 0 1rem 1rem 1rem;
	}

	#status {
		font-weight: 400;
		font-size: 1.9rem;
	}

	#content, #answer {
		white-space: pre-wrap;
		text-align: left;
	}

	#content {
		margin-top: 2rem;
		padding: 3rem;
		border-top: 2px solid black;
	}

	#answer {
		padding: 3rem;
		background: whitesmoke;
	}

	.btn {
		display: none;
		margin-left: 0.5rem;
		font-size: 1.2rem;
		padding: 0.2rem 0.5rem;
	}
</style>

<!-- Modal -->
<div class="modal fade" id="employeeManageDetailModal" tabindex="-1" aria-labelledby="employeeManageDetailModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" style="max-width: fit-content; min-width: 90rem; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form style="text-align: center">
					<div id="title"></div>
					<div id="createDate" style="color:grey;"></div>
					<div class="state">
						<div style="float:left">처리상태: <span id="status"></span></div>
						<div style="float:right">작성자: <span id="author"></span></div>
					</div>
					<div id="content"></div>
					<hr>
					<div style="width: 100%;height: fit-content;text-align: left;padding: 0 2rem;display: flex">
						첨부파일 :&nbsp;<span id="fileName"></span>
						<div class="btn btn-secondary" onclick="downloadFile()">다운로드</div>
					</div>
					<hr>
					<div id="answerView">
						<div style="text-align: left;padding: 1rem;font-weight: 400">처리결과</div>
						<div id="answer"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	var hlpId;

	function clickEmployeeManageDetail(id) {
		var sendItems = new Object();
		sendItems.hlpId = id;
		hlpId = sendItems.hlpId;

		instance.post('C0304', sendItems).then(res => {
			setEmployeeManageView(res.data);
		}).catch(function (error) {
			alert("잘못된 접근입니다.")
		});
	}

	var fileName;

	//게시물 view
	function setEmployeeManageView(data) {
		console.log(data);
		if (data.answer == null || data.status == '처리이전') {
			$("#answerView").hide();
		} else {
			$("#answerView").show();
		}

		$("#title").text(data.title);
		$("#createDate").text(data.createDate);
		$("#status").text(data.status);
		if (data.status == '처리이전') {
			$("#status").css('color', 'grey');
		} else if (data.status == '처리완료') {
			$("#status").css('color', '#0A5FAF');
			$("#status").css('font-weight', '500');
		} else if (data.status == '거절') {
			$("#status").css('color', '#D70E24');
			$("#status").css('font-weight', '500');
		}
		$("#author").text(data.author);
		$("#content").html(data.content);

		if (data.fileName != null) {
			$("#fileName").text(data.fileName);
			fileName = data.fileName;
			$('.btn').show();
		} else {
			$("#fileName").html('&nbsp;');
			$('.btn').hide();
		}

		$("#answer").html(data.answer);
	}

	//파일 다운로드
	function downloadFile() {
		var sendItems = new Object();
		sendItems.hlpId = hlpId;

		instance.post('C0305', sendItems,{
			responseType: 'arraybuffer',
			headers: {
				'Content-Type': 'application/json'
			}
		}).then(response => {
			console.log(response);
			const type = response.headers['content-type'];
			const blob = new Blob([response.data], {type: type, encoding: 'UTF-8'});
			const link = document.createElement('a');
			link.href = window.URL.createObjectURL(blob);
			link.download = fileName;
			link.click();
		})
	}

</script>
