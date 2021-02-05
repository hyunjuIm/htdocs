<div class="row" style="padding: 0.5rem 1rem;border-bottom: 1px solid white">
	<div style="float: left;font-size: 3rem">
		<i class="ri-arrow-left-line"></i>
	</div>
	<div style="margin: 0 auto;line-height: 4.7rem;font-weight: 400">
		맞춤형 건강정보
	</div>
	<div style="float: right;font-size: 3rem">
		<i class="ri-arrow-left-line" style="visibility: hidden"></i>
	</div>
</div>

<script>
	$('body').scroll(function () {
		if ($(this).scrollTop() > 0) {
			$('.navbar').css("background-color", "white");
			$('path').css("stroke", "black");
		} else {
			$('.navbar').css("background-color", "rgba(255, 255, 255, 0.5)");
			$('path').css("stroke", "white");
		}
	});
</script>
