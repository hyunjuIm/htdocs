<!-- Modal -->
<div class="modal fade" id="billDetailModal" tabindex="-1" aria-labelledby="billDetailModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" style="max-width: fit-content; min-width: 100rem; display: table;">
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
	function clickBillDetail(id) {

	}
</script>
