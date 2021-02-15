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
		<i class="ri-arrow-left-line" onclick="location.href='/content/'"></i>
	</div>
	<div class="center" id="topTitle">
		알아두면 쓸모있는 건강정보
	</div>
	<div class="right">
		<i class="ri-arrow-left-line" style="visibility: hidden"></i>
	</div>
</div>

<script>
	document.documentElement.addEventListener('touchstart', function (event) {
		if (event.touches.length > 1) {
			event.preventDefault();
		}
	}, false);

	var lastTouchEnd = 0;

	document.documentElement.addEventListener('touchend', function (event) {
		var now = (new Date()).getTime();
		if (now - lastTouchEnd <= 300) {
			event.preventDefault();
		} lastTouchEnd = now;
	}, false);
</script>
