<style>
	.modal-body {
		font-size: 15px !important;
		padding: 30px;
	}

	#title {
		font-size: 20px;
		color: #3529b1;
		font-weight: 500;
		line-height: 35px;
	}

	#createDate {
		color: grey;
	}

	.state {
		display: block;
		font-size: 15px;
		padding: 0 10px 10px 10px;
	}

	#status {
		font-weight: 400;
		font-size: 19px;
	}

	#content, #answer {
		white-space: pre-wrap;
		text-align: left;
	}

	#content {
		margin-top: 20px;
		padding: 30px;
		border-top: 2px solid black;
	}

	textarea {
		padding: 30px;
		width: 100%;
		height: 100%;
		background: none;
		outline: none;
		border: none;
		background: whitesmoke;
	}

	select {
		border: 1px solid #DCDCDC;
		width: 80px;
		padding: 4px;
	}

	#btnFile {
		display: none;
		margin-left: 5px;
		font-size: 12px;
		padding: 2px 5px;
	}

	.answer {
		padding-top: 40px;
	}
</style>

<!-- Modal -->
<div class="modal fade" id="employeeManageDetailModal" tabindex="-1" aria-labelledby="employeeManageDetailModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" style="max-width: fit-content; min-width: 1000px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form style="text-align: center">
					<div style="display: block;border: 2px solid #cccccc;padding: 20px;margin-bottom: 20px">
						<div id="title"></div>
						<div id="createDate" style="color:grey;"></div>
						<div class="state">
							<div style="float:left">처리상태: <span id="status"></span></div>
							<div style="float:right">작성자: <span id="author"></span></div>
						</div>
						<div id="content"></div>
						<hr>
						<div style="width: 100%;height: fit-content;text-align: left;padding: 0 20px;display: flex">
							첨부파일 :&nbsp;<span id="fileName"></span>
							<div class="btn btn-secondary" id="btnFile" onclick="downloadFile()">다운로드</div>
						</div>
					</div>
					<div style="border: 2px solid #CCCCCC;padding: 20px 20px 50px 20px">
						<div style="display: block">
							<h3 style="font-size: 20px;">처리결과</h3>
							<div style="float:right">
								<select id="resultStatus">
									<option value="true">승인</option>
									<option value="false">거절</option>
								</select>
							</div>
						</div>

						<div class="answer">
							<textarea id="answer" placeholder="처리결과를 입력해주세요."></textarea>
						</div>

						<div style="display: block;margin-top: 5px">
							<div class="btn btn-dark" style="float:right;" onclick="confirmEmployeeManage()">저장</div>
						</div>

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

		instance.post('M015003', sendItems).then(res => {
			setEmployeeManageView(res.data);
		}).catch(function (error) {
			alert("잘못된 접근입니다.")
		});
	}

	var fileName;

	//게시물 view
	function setEmployeeManageView(data) {
		console.log(data);

		$("#title").text(data.title);
		$("#createDate").text(data.createDate);
		$("#status").text(data.status);
		if (data.status == '처리이전') {
			$("#status").css('color', 'grey');
			$('#resultStatus').val('true').prop("selected",true);
		} else if (data.status == '처리완료') {
			$("#status").css('color', '#0A5FAF');
			$("#status").css('font-weight', '500');
			$('#resultStatus').val('true').prop("selected",true);
		} else if (data.status == '거절') {
			$("#status").css('color', '#D70E24');
			$("#status").css('font-weight', '500');
			$('#resultStatus').val('false').prop("selected",false);
		}
		$("#author").text(data.author);
		$("#content").html(data.content);

		if (data.fileName != null) {
			$("#fileName").text(data.fileName);
			fileName = data.fileName;
			$('#btnFile').show();
		} else {
			$("#fileName").html('&nbsp;');
			$('#btnFile').hide();
		}

		if(data.answer == null) {
			$("#answer").html('');
		} else {
			$("#answer").html(data.answer);
		}
	}

	//파일 다운로드
	function downloadFile() {
		var sendItems = new Object();
		sendItems.hlpId = hlpId;

		instance.post('M015004', sendItems, {
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

	//처리결과 저장
	function confirmEmployeeManage() {
		var saveItems = new Object();
		saveItems.hlpId = hlpId;
		saveItems.answer = $('#answer').val();
		saveItems.status = $("#resultStatus option:selected").val();

		if(saveItems.answer == '' || saveItems.answer == null) {
			alert('처리결과를 입력해주세요.');
			return false;
		}

		console.log(saveItems);

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M015005', saveItems).then(res => {
				if (res.data.message == "success") {
					alert("저장되었습니다.");
					location.reload();
				}
			}).catch(function (error) {
				alert("잘못된 접근입니다.")
			});
		} else {
			return false;
		}
	}
</script>
