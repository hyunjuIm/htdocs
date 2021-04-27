<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:카드뉴스</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>


	<style>
		td {
			text-align: left;
		}

		th {
			text-align: center;
			width: 200px;
			background: #f1f1f1;
		}

		.textarea-form {
			height: 150px;
			min-height: 150px;
			max-height: 400px;
			background: white;
		}

		textarea {
			height: inherit;
			min-height: inherit;
			max-height: inherit;
			font-size: 15px !important;
		}

		#file-img {
			height: auto;
			width: auto;
			max-width: 100%;
			max-height: 350px;
			display: block;
			margin: 0 auto;
			padding: 20px;
		}

		#file-upload, #upload {
			position: absolute;
			left: -9999px;
		}

		#filename {
			display: none;
			white-space: nowrap;
			overflow: hidden;
			margin: 0 auto;
			text-align: center;
			width: 100%;
		}

		ul.cvf_uploaded_files {
			list-style-type: none;
			padding: 0;
		}

		ul.cvf_uploaded_files li {
			background-color: #fff;
			border: 1px solid #ccc;
			border-radius: 5px;
			float: left;
			margin: 10px;
			padding: 10px 5px;
			width: 120px;
			height: 120px;
			position: relative;
		}

		ul.cvf_uploaded_files li img.img-thumb {
			width: 100%;
			height: 100%;
		}

		ul.cvf_uploaded_files .ui-selected {
			background: red;
		}

		ul.cvf_uploaded_files .highlight {
			border: 1px dashed #000;
			width: 120px;
			background-color: #ccc;
			border-radius: 5px;
		}

		ul.cvf_uploaded_files .delete-btn {
			width: 24px;
			border: 0;
			position: absolute;
			background: white;
			border-radius: 50%;
			top: -10px;
			right: -10px;
		}

		.bg-success {
			padding: 7px;
		}
	</style>
</head>

<body>

<!--상단 네비바-->
<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>
<!--상단 네비바-->

<!--콘텐츠 내용-->
<div class="container" style="width: 75%;padding: 50px; max-width: none">
	<div class="row">
		<div class="menu-title" style="font-size: 22px">
			<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
			카드뉴스
		</div>

		<table class="table" style="margin-top: 30px">
			<tbody>
			<tr>
				<th>제목</th>
				<td>
					<input class="form-control" type="text" id="title" placeholder="">
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<img id="file-img">
					</div>
					<div id="filename"></div>
					<div style="width: fit-content;margin: 0 auto;">
						<label class="btn btn-success" for="file-upload" style="font-size: 13px">
							썸네일 선택
							<input type="file" id="file-upload">
						</label>
					</div>
				</td>
				<td style="vertical-align: top !important;">
					<div style="width: 100%;display: inline-block">
						<div style="float: right">
							<label class="btn btn-primary" for="upload" style="font-size: 13px">
								카드뉴스 본문 이미지 불러오기
								<input type="file" class="form-control user_picked_files" id="upload" name="upload"
									   multiple="multiple">
							</label>
							<!--							<input type="file" name="upload" multiple="multiple"-->
							<!--								   class="form-control user_picked_files"/>-->
						</div>
						<div style="font-size: 14px;color: red;font-weight: 400;text-decoration: underline">
							※ 한번 업로드 된 카드뉴스 게시물은 수정이 불가능합니다. 신중하게 작성해주세요.
						</div>
					</div>


					<div class="form-group cvf_order">
						<label>Order</label>
						<input type="text" class="form-control cvf_hidden_field" value="" disabled="disabled"/>
					</div>

					<!--							<input type="submit" class="cvf_upload_btn btn btn-primary" value="Upload"/>-->

					<ul class="cvf_uploaded_files"></ul>
				</td>
			</tr>
			<tr>
				<th>태그</th>
				<td>
					<input class="form-control" type="text" id="hashTags" placeholder="ex) 태그1, 태그2">
				</td>
			</tr>
			</tbody>
		</table>
	</div>

	<div class="row" style="padding: 50px">
		<div style="margin: 0 auto">
			<div class="btn-save-square cvf_upload_btn" style="font-size: 18px; padding: 7px 40px; margin-right: 20px"
				 value="Upload">
				저장
			</div>
			<div class="btn-cancel-square" style="font-size: 18px; padding: 7px 40px;" onclick="history.back();">
				취소
			</div>
		</div>
	</div>

</div>
<!--콘텐츠 내용-->
</body>
</html>

<script>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	jQuery(document).ready(function () {

		var storedFiles = [];
		$('.cvf_order').hide();

		// Apply sort function
		function cvf_reload_order() {
			var order = $('.cvf_uploaded_files').sortable('toArray', {attribute: 'item'});
			$('.cvf_hidden_field').val(order);
		}

		function cvf_add_order() {
			$('.cvf_uploaded_files li').each(function (n) {
				$(this).attr('item', n);
			});
		}

		$(function () {
			$('.cvf_uploaded_files').sortable({
				cursor: 'move',
				placeholder: 'highlight',
				start: function (event, ui) {
					ui.item.toggleClass('highlight');
				},
				stop: function (event, ui) {
					ui.item.toggleClass('highlight');
				},
				update: function () {
					// cvf_reload_order();
				},
				create: function () {
					var list = this;
					resize = function () {
						$(list).css('height', 'auto');
						$(list).height($(list).height());
					};
					$(list).height($(list).height());
					$(list).find('img').on('load', resize);
					$(list).find('img').on('error', resize);
					// $(list).find('img').load(resize).error(resize);
				}
			});
			$('.cvf_uploaded_files').disableSelection();
		});

		$('body').on('change', '.user_picked_files', function () {

			var fileInput = document.getElementById("upload");
			var files = fileInput.files;


			for (i = 0; i < files.length; i++) {
				var readImg = new FileReader();
				var file = files[i];

				if (file.type.match('image.*')) {
					readImg.onload = (function (file) {
						return function (e) {
							storedFiles.push(file);
							$('.cvf_uploaded_files').append(
									"<li file = '" + file.name + "'>" +
									"<img class = 'img-thumb' src = '" + e.target.result + "' />" +
									"<div style='overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 100%;font-size: 11px'><span>" + file.name + "</span></div>" +
									"<a href = '#' class = 'cvf_delete_image' title = 'Cancel'>" +
									"<img class = 'delete-btn' src = '../../../asset/images/btn_cancel.png' /></a>" +
									"</li>"
							);
						};
					})(file);
					readImg.readAsDataURL(file);

				} else {
					alert(file.name + ' : 이미지 파일이 아닙니다.');
				}

				if (files.length === (i + 1)) {
					setTimeout(function () {
						cvf_add_order();
					}, 1000);
				}
			}
		});

		// Delete Image from Queue
		$('body').on('click', 'a.cvf_delete_image', function (e) {
			e.preventDefault();
			$(this).parent().remove('');

			var file = $(this).parent().attr('file');
			for (var i = 0; i < storedFiles.length; i++) {
				if (storedFiles[i].name == file) {
					storedFiles.splice(i, 1);
					break;
				}
			}
			cvf_reload_order();
		});

		// AJAX Upload
		$('body').on('click', '.cvf_upload_btn', function (e) {

			e.preventDefault();
			cvf_reload_order();

			//$(".cvf_uploaded_files").html('<p><img src = "loading.gif" class = "loader" /></p>');
			var saveItems = new FormData();
			// var title = ($('#title').val()).replaceAll('')
			saveItems.append("title", $('#title').val());

			var thumbNail = document.getElementById('file-upload');
			saveItems.append("thumbNail", thumbNail.files[0]);

			var items_array = $('.cvf_hidden_field').val();
			var items = items_array.split(',');

			for (var i in items) {
				var item_number = items[i];
				saveItems.append('files', storedFiles[item_number]);
				console.log(item_number);
			}

			var hashTags = ($('#hashTags').val()).split(',');
			saveItems.append("hashTags", hashTags);

			if ($('#title').val() == "") {
				alert("제목을 입력해주세요.");
				return false;
			} else if ($('#filename').text() == '') {
				alert('썸네일을 첨부해주세요.');
				return false;
			} else if ($('#hashTags').val() == '') {
				alert('해시태그를 1개 이상 입력해주세요.');
				return false;
			}

			if (confirm("저장하시겠습니까?") == true) {
				fileURL.post('content/createCardNews', saveItems, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(res => {
					if (res.data.message == 'Success') {
						alert('저장되었습니다.');
						location.href = '/master/card_news_list';
					} else {
						alert('저장에 실패하였습니다.');
					}
				});
			} else {
				return false;
			}
		});

	});

	//파일 업로드명 셋팅
	$('#file-upload').change(function () {
		var filepath = this.value;
		var m = filepath.match(/([^\/\\]+)$/);
		var filename = m[1];
		$('#filename').text(filename);
		readURL(this);
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#file-img').attr('src', e.target.result);
				$('#file-img').hide();
				$('#file-img').fadeIn(500);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	function regExp(str) {
		var reg = /[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"]/gi
		//특수문자 검증
		if (reg.test(str)) {
			//특수문자 제거후 리턴
			return str.replace(reg, "");
		} else {
			//특수문자가 없으므로 본래 문자 리턴
			return str;
		}
	}

</script>
