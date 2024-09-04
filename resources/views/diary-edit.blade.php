@extends('layouts.app')

@section('content')
	<!-- 記録を登録するフォーム -->
	<form action="{{ route('diary.update', $diary->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		<!-- 更新処理にPUTメソッドを指定 -->
		@method('PUT')

		<!-- Flexboxコンテナ -->
		<div class="d-flex justify-content-center align-items-start">
			<!-- 画像アップロード部分 -->
			<div class="centered-container d-flex flex-column align-items-center">
				<div class="drop-zone-wrapper">
					<div id="drop-zone" class="drop-zone text-center">
						@if ($diary->image_path)
							<img src="{{ asset('storage/' . $diary->image_path) }}" alt="{{ $diary->title }}"
								style="max-width: 100%; max-height: 100%; border-radius: 8px;">
						@else
							<p>画像をここにドラッグ＆ドロップ</p>
							<p>または</p>
						@endif
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
					<input type="text" id="title" name="title" value="{{ old('title', $diary->title) }}" required>
				</div>

				<!-- 説明文 -->
				<div class="mt-3">
					<label for="description">説明文</label>
					<textarea id="description" name="description" required>{{ old('description', $diary->comment) }}</textarea>
				</div>

				<!-- 星レーティング  -->
				<div class="mt-3">
					<label for="rating">評価</label>
					<select id="rating" name="rating" required>
						<option value="1" {{ $diary->rating == 1 ? 'selected' : '' }}>★☆☆☆☆</option>
						<option value="2" {{ $diary->rating == 2 ? 'selected' : '' }}>★★☆☆☆</option>
						<option value="3" {{ $diary->rating == 3 ? 'selected' : '' }}>★★★☆☆</option>
						<option value="4" {{ $diary->rating == 4 ? 'selected' : '' }}>★★★★☆</option>
						<option value="5" {{ $diary->rating == 5 ? 'selected' : '' }}>★★★★★</option>
					</select>
				</div>

				<!-- 更新ボタン -->
				<div class="text-center mt-4">
					<button type="submit" class="btn btn-warning mt-3">更新</button>
				</div>
			</div>
		</div>
	</form>

	<!-- 選択された画像を表示するスクリプト -->
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const dropZone = document.getElementById('drop-zone');
			const fileUpload = document.getElementById('file-upload');

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
					displayImage(files[0]);
				}
			});

			// ファイル選択時の処理
			fileUpload.addEventListener('change', () => {
				const files = fileUpload.files;
				if (files.length > 0) {
					displayImage(files[0]);
				}
			});

			// 画像を表示する関数
			function displayImage(file) {
				const reader = new FileReader();

				reader.onload = (event) => {
					dropZone.innerHTML =
						`<img src="${event.target.result}" alt="選択した画像" style="max-width: 100%; max-height: 100%; border-radius: 8px;">`;
				};
				reader.readAsDataURL(file);
			}
		});
	</script>
@endsection

@section('styles')
	@vite('resources/css/diary-post.css')
@endsection
