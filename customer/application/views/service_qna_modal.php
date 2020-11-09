<!-- 답변 등록 및 수정 Modal -->
<div class="modal fade" id="qnaModal" tabindex="-1" aria-labelledby="qnaModalLabel" aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; min-width: 1100px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form style="margin: 0 auto; width: 90%">
					<div class="menu-title" style="margin-top: 30px">
						<span style="font-size: 53px; font-weight: bold; color: #5645ED; margin-right: 10px">Q</span>
						<div>
							<span id="qnaTitle" style="font-size: 23px">질문</span>
							<br>
							<span id="qnaAuthor"></span>
						</div>
					</div>
					<table id="questionInfos" class="table table-bordered">
						<tbody>
						<tr>
							<td class="qna-td" id="qnaQuestion" colspan="2" style="height: 200px; background: white; padding: 30px"></td>
						</tr>
						</tbody>
					</table>

					<div class="menu-title" style="margin-top: 10px">
						<span style="font-size: 53px; font-weight: bold; color: #5645ED; margin-right: 10px">A</span>
						<div style="padding-top: 18px">
							<span id="qnaHelper"></span>
						</div>
					</div>
					<table id="questionInfos" class="table table-bordered">
						<tbody>
						<tr>
							<td class="qna-td" id="qnaAnswer" colspan="2" contenteditable="true"
								style="height: 200px; background: white; padding: 30px"></td>
						</tr>
						</tbody>
					</table>
				</form>
			</div>
			<div class="modal-footer">
				<div style="margin: 0 auto">
					<div class="btn-save-square" onclick="saveQnAData()">답변등록</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	var status;
	function setQnADetailData(data){
		$("#qnaAnswer").empty();

		document.getElementById('qnaTitle').innerHTML = data.title;
		document.getElementById('qnaAuthor').innerHTML = data.authorName;
		document.getElementById('qnaQuestion').innerHTML = data.question;

		//답변 있을때
		if(data.status) {
			document.getElementById('qnaHelper').innerHTML = data.helper;
			document.getElementById('qnaAnswer').innerHTML = data.answer;
		} else { //답변 없을때 답변 등록 버튼
			$("#qnaHelper").empty();
			var html = '<div class="badge badge-info" style="font-size: 15px; ">답변대기중</div>';
			$("#qnaHelper").append(html);
		}

		status = data.status
	}

	function saveQnAData() {
		var saveItems = new Object();

		saveItems.id = qnaID;
		var answer = document.getElementById('qnaAnswer').innerText;
		if(answer == "" || answer == null) {
			saveItems.status = false;
		} else {
			saveItems.status = true;
		}
		saveItems.helper = "관리자";
		saveItems.answer = answer;

		console.log(saveItems);

		if(status) {
			if (confirm("답변을 등록하시겠습니까?") == true) {
				instance.post('M014004_REQ', saveItems).then(res => {
					if (res.data.message == "success") {
						alert("답변이 등록되었습니다.");
						location.reload();
					}
				});
			} else {
				return false;
			}
		} else {
			if (confirm("답변을 수정하시겠습니까?") == true) {
				instance.post('M014004_REQ', saveItems).then(res => {
					if (res.data.message == "success") {
						alert("답변이 수정되었습니다.");
						location.reload();
					}
				});
			} else {
				return false;
			}
		}

	}
</script>
