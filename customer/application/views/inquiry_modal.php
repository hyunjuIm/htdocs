<!-- Modal -->
<div class="modal fade" id="inquiryDetailModal" tabindex="-1" aria-labelledby="inquiryDetailModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" style="max-width: fit-content; min-width: 90rem; display: table;">
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
						<td style="font-size: 2.2rem" id="question-title"></td>
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

				<table id="answer" class="qna-table" style="margin-top: 3rem">
					<tr>
						<td rowspan="3" class="title">A</td>
						<td style="font-size: 2.2rem" id="answer-helper"></td>
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
			alert("잘못된 접근입니다.")
			console.log(error);
		});
	}

	//일대일 문의 view
	function setInquiryDetail(data, status) {
		if (status == 'true') {
			$("#answer").show();
		} else {
			$("#answer").hide();
		}

		$("#question-title").text(data.title);
		$("#question-createDate").text(data.createDate);
		$("#question-content").html(data.question);

		$("#answer-helper").text(data.helper + '님의 답변입니다.');
		$("#answer-createDate").text(data.answeredDate);
		$("#answer-content").html(data.answer);
	}

</script>
