<style>
	.swiper-container {
		width: 100%;
		background: white;
		vertical-align: middle;
	}

	.swiper-slide {
		text-align: center;
		font-size: 18px;
		/* Center slide text vertically */
		display: -webkit-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		-webkit-justify-content: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		-webkit-align-items: center;
		align-items: center;
	}

	.swiper-button-next, .swiper-button-prev {
		color: white;
	}

	.swiper-pagination-bullet {
		background: white !important;
	}

	.swiper-slide img {
		width: 100%;
		height: auto;
	}

	.modal.fade {
		display: block !important;
		opacity: 0;
		visibility: hidden;
		transition: all 0.3s ease 0s;
	}

	.modal.fade.show {
		display: block !important;
		opacity: 1;
		visibility: visible;
		transition: all 0.3s ease 0s;
	}
</style>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
	 aria-labelledby="cardNewsTitle" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="cardNewsTitle">카드뉴스 제목</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="swiper-container">
					<div class="swiper-wrapper" id="cardNewsImg">

					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
					<!-- Add Pagination -->
<!--					<div class="swiper-pagination"></div>-->
				</div>
				<div style="padding: 20px;background: whitesmoke">
					해시태그 : <span id="cardNewsHashTags"></span>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" onclick="deleteCardNews(id)">삭제</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>


<script>

	//카드뉴스 자세히 보기
	function detailCardNews(id) {
		var searchItems = new Object();
		searchItems.id = id;

		fileURL.post('content/readCardNewsDetail', searchItems).then(res => {
			setCardNewsData(res.data);
			var swiper = new Swiper('.swiper-container', {
				slidesPerView: 1, //슬라이드를 한번에 3개를 보여준다
				loop: false, //loop 를 true 로 할경우 무한반복 슬라이드 false 로 할경우 슬라이드의 끝에서 더보여지지 않음
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
					observer: true,
					observeParents: true,
				},
				pagination: {
					el: '.swiper-pagination',
				},
			});
			swiper.update();
		});
	}

	//카드뉴스 자세히 보기
	function setCardNewsData(data) {
		$('#cardNewsTitle').text(data.title);

		$('#cardNewsImg').empty();
		var img = data.images;
		for (i = 0; i < img.length; i++) {
			var html = '';
			// img[i] = img[i].replaceAll(' ', '%')
			html += '<div class="swiper-slide">' +
					'<img src="https://file.dualhealth.kr/healthContent/cardNews/' + img[i] + '">' +
					'</div>'
			$('#cardNewsImg').append(html);
		}

		var tag = data.hashTags.join(", ");
		$('#cardNewsHashTags').text(tag);

		$('.btn-danger').attr('id', data.id);
	}

	function deleteCardNews(id) {
		var searchItems = new Object();
		searchItems.id = id;

		if (confirm("삭제하시겠습니까?") == true) {
			fileURL.post('content/deleteCardNews', searchItems).then(res => {

				if (res.data.message == "Success") {
					alert("삭제되었습니다.");
					location.reload();
				}
			});
		} else {
			return false;
		}
	}
</script>
