<style>
	.top-bar {
		padding: 0.5rem 1rem;
		border-bottom: 1px solid;
		border-color: #eeeeee;
		background: white;
		color: black;
		z-index: 9999;
		position: fixed;
	}

	.top-bar .left {
		float: left;
		font-size: 3rem;
	}

	.top-bar .center {
		margin: 0 auto;
		line-height: 4.7rem;
		font-weight: 400;
	}

	.top-bar .right {
		float: right;
		font-size: 3rem;
	}
</style>

<!--모바일 헤더-->
<div class="row top-bar">
	<div class="left">
		<i class="ri-arrow-left-line" onclick="history.back();"></i>
	</div>
	<div class="center" id="topTitle">
		알아두면 쓸모있는 건강정보
	</div>
	<div class="right">
		<i class="ri-arrow-left-line" style="visibility: hidden"></i>
	</div>
</div>

<script>

	if (!(Object.keys(sessionStorage).includes('cardIndex'))) {
		sessionStorage.setItem('cardIndex', 0);
	}
	if (!(Object.keys(sessionStorage).includes('videoIndex'))) {
		sessionStorage.setItem('videoIndex', 0);
	}
	if (!(Object.keys(sessionStorage).includes('encyclopediaIndex'))) {
		sessionStorage.setItem('encyclopediaIndex', 0);
	}
	if (!(Object.keys(sessionStorage).includes('category'))) {
		sessionStorage.setItem('category', 0);
	}

	var cardIndex = parseInt(sessionStorage.getItem('cardIndex'));
	var videoIndex = parseInt(sessionStorage.getItem('videoIndex'));
	var encyclopediaIndex = parseInt(sessionStorage.getItem('encyclopediaIndex'));
	var categoryNum = parseInt(sessionStorage.getItem('category'));

</script>
