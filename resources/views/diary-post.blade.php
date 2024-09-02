@extends('layouts.app')

@section('content')
	<!-- 記録を登録するフォーム -->
	<form action="{{ route('diary-post.index') }}" method="post" enctype="multipart/form-data">
		@csrf
		<!-- Flexboxコンテナ -->
		<div class="d-flex justify-content-center align-items-start">

			<!-- 画像アップロード部分 -->
			<div class="centered-container d-flex flex-column align-items-center">
				<div class="drop-zone-wrapper">
					<div id="drop-zone" class="drop-zone text-center">
						<p>画像をここにドラッグ＆ドロップ</p>
						<p>または</p>
					</div>
				</div>

				<!-- ファイル選択ラベル -->
				<label for="file-upload" class="btn btn-warning mt-3">ファイルを選択</label>
				<input type="file" id="file-upload" name="image" class="d-none" accept="image/*">
			</div>

			<!-- タイトルと説明文部分 -->
			<div class="ml-5 d-flex flex-column">
				<!-- タイトル -->
				<div>
					<label for="title">タイトル</label>
					<input type="text" id="title" name="title" required>
				</div>

				<!-- 説明文 -->
				<div class="mt-3">
					<label for="description">説明文</label>
					<textarea id="description" name="description" required></textarea>
				</div>

				<!-- 星レーティング  -->
				<div class="mt-3">
					<label for="rating">評価</label>
					<select id="rating" name="rating" required>
						<option value="1">★☆☆☆☆</option>
						<option value="2">★★☆☆☆</option>
						<option value="3" selected>★★★☆☆</option>
						<option value="4">★★★★☆</option>
						<option value="5">★★★★★</option>
					</select>

					<!-- 登録ボタン -->
					<div class="text-center mt-4">
						<label for="upload" class="btn btn-warning mt-3">登録</label>
						<input type="submit" id="upload" class="d-none">
					</div>

				</div>
			</div>
			<!-- 画像データを保存する隠しフィールド -->
			<input type="hidden" id="image-data" name="image_data">
	</form>

	<!-- JavaScript CDN -->
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const dropZone = document.getElementById('drop-zone');
			const fileUpload = document.getElementById('file-upload');
			const imageDataInput = document.getElementById('image-data');

			// ドラッグオーバー時の処理
			dropZone.addEventListener('dragover', (event) => {
				event.preventDefault();
				dropZone.classList.add('hover');
			});

			// ドラッグアウト時の処理
			dropZone.addEventListener('dragleave', () => {
				dropZone.classList.remove('hover');
			});

			// ドロップ時の処理
			dropZone.addEventListener('drop', (event) => {
				event.preventDefault();
				dropZone.classList.remove('hover');

				const files = event.dataTransfer.files;
				if (files.length > 0) {
					handleFile(files[0]);
				}
			});

			// ファイル選択時の処理
			fileUpload.addEventListener('change', () => {
				const files = fileUpload.files;
				if (files.length > 0) {
					handleFile(files[0]);
				}
			});

			// ファイル処理共通関数
			function handleFile(file) {
				const reader = new FileReader();

				reader.onloadend = () => {
					const base64Image = reader.result;
					imageDataInput.value = base64Image;

					// 画像をドロップエリアに表示
					dropZone.innerHTML =
						`<img src="${base64Image}" alt="選択した画像" style="max-width: 100%; max-height: 100%; border-radius: 8px;">`;
				};

				reader.readAsDataURL(file);

				// ファイル選択後に再選択できるようにinputの値をリセット
				fileUpload.value = "";
			}
		});
	</script>
@endsection

@section('styles')
	@vite('resources/css/diary-post.css')
@endsection
