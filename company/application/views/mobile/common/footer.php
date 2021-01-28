<style>
	/*푸터 : 회사정보*/
	.footer {
		width: 100%;
		font-size: 1.3rem;
		text-align: left;
		color: #adadad;
		margin-top: 70px;
		background: #22212f;
		padding: 30px;
		display: inline-block;
	}

	.footer-middle {
		font-size: 1.2rem;
	}

	.pc-btn {
		padding: 1px 4px;
		margin-left: 5px;
		font-size: 1.1rem;
	}
</style>

<div class="footer">
	<div class="footer-middle">
		<div style="font-size: 1.5rem; color: white;margin-bottom: 0.3rem;font-weight: 400">
			(주) 듀얼헬스케어
			<div class="btn btn-secondary pc-btn" onclick="movePage()">PC버전</div>
		</div>
		<div>
			대표자 : 김영이 <br>
			사업자등록번호 : 111-86-01943 <br>
			대전광역시 유성구 대덕대로 512번길 20 (도룡동, 2층) <br>
			copyrightⓒdualhealthcare
		</div>
	</div>
</div>

<script>

	function movePage() {
		var url = window.location.href.replace('/m/', '/company/');
		location.href = url;
	}

</script>
