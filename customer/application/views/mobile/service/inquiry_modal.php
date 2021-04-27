<!-- Modal -->
<div class="modal fade" id="inquiryDetailModal" tabindex="-1" aria-labelledby="inquiryDetailModalLabel"
	 aria-hidden="true" style="width: 100%">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table id="question" class="qna-table">
					<tr>
						<td rowspan="3" class="title">Q</td>
						<td style="font-size: 2rem" id="question-title"></td>
					</tr>
					<tr>
						<td>
							<div style="font-size: 1.4rem">
								<span style="font-weight: bold">작성일 </span>
								<span id="question-createDate"></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div id="question-content" style="padding-top: 2rem;min-height: 20rem">
						</td>
					</tr>
				</table>

				<hr>

				<div id="ready">
					답변이 아직 등록되지 않았습니다.<br>
					신속한 답변을 위해 항상 노력하겠습니다.
				</div>

				<table id="answer" class="qna-table" style="margin-top: 3rem">
					<tr>
						<td rowspan="3" class="title">A</td>
						<td style="font-size: 2rem" id="answer-helper"></td>
					</tr>
					<tr>
						<td>
							<div style="font-size: 1.4rem">
								<span style="font-weight: bold">답변일 </span>
								<span id="answer-createDate"></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div id="answer-content" style="padding-top: 2rem;min-height: 20rem">
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

<script>

	function detailInquiryPage(id, status) {
		var sendItems = new Object();
		sendItems.qnaId = id;

		instance.post('CU_008_003', sendItems).then(res => {
			setInquiryDetail(res.data, status);
		}).catch(function (error) {


		});
	}

	//일대일 문의 view
	function setInquiryDetail(data, status) {
		if (status == 'true') {
			$("#answer").show();
			$("#ready").hide();
		} else {
			$("#answer").hide();
			$("#ready").show();
		}

		$("#question-title").text(data.title);
		$("#question-createDate").text(data.createDate);
		$("#question-content").html(data.question);

		$("#answer-helper").text(data.helper + '님의 답변입니다.');
		$("#answer-createDate").text(data.answeredDate);
		$("#answer-content").html(data.answer);
	}

</script>
