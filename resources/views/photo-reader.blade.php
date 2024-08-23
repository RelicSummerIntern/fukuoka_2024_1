@extends('layouts.app')

@section('content')
	<div class="full-screen-wrapper">
		<div class="centered-container d-flex flex-column align-items-center justify-content-center">
			<!-- ドラッグ＆ドロップエリア -->
			<div class="drop-zone-wrapper">
				<div id="drop-zone" class="drop-zone text-center">
					<p>画像をここにドラッグ＆ドロップ</p>
					<p>または</p>
				</div>
			</div>

			<!-- ファイル選択ラベル -->
			<label for="file-upload" class="btn btn-warning mt-3">ファイルを選択</label>
			<input type="file" id="file-upload" name="image" class="d-none" accept="image/*">

			<!-- フォーム -->
			<form id="upload-form" method="post" enctype="multipart/form-data" action="{{ route('food-configuration.index') }}"
				class="text-center mt-3">
				@csrf
				<input type="hidden" id="image-data" name="image_data">
				<!-- 料理開始！ボタン -->
				<button type="submit" class="btn btn-warning btn-lg">食材選択へ</button>
			</form>
		</div>
	</div>

	<!-- 戻るボタン -->
	<a href="{{ url('/') }}" class="btn btn-warning position-fixed bottom-0 start-0 m-3">戻る</a>

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

	<style>
		/* フルスクリーンのラッパー */
		.full-screen-wrapper {
			position: relative;
			width: 100vw;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 20px;
			/* 必要に応じて調整 */
			box-sizing: border-box;
		}

		/* 中央に配置するコンテナ */
		.centered-container {
			max-width: 500px;
			/* 必要に応じて調整 */
			width: 100%;
			text-align: center;
			margin-top: -50px;
			/* 中央から少し上に移動 */
		}

		/* ドラッグ＆ドロップエリアのスタイル */
		.drop-zone-wrapper {
			width: 300px;
			/* 幅調整 */
			height: 300px;
			/* 高さ調整 */
			margin-bottom: 20px;
			/* 上下のマージン調整 */
		}

		.drop-zone {
			border: 2px dashed #007bff;
			border-radius: 8px;
			padding: 20px;
			cursor: pointer;
			width: 100%;
			height: 100%;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			background-color: #fff;
			font-size: 14px;
			/* テキストサイズの調整 */
			text-align: center;
			transition: background-color 0.3s, border-color 0.3s;
		}

		.drop-zone.hover {
			background-color: #e9ecef;
			border-color: #0056b3;
		}

		.drop-zone img {
			max-width: 100%;
			max-height: 100%;
			border-radius: 8px;
			/* 画像の角を丸める */
		}

		.btn-warning {
			background-color: #f7c600;
			color: #fff;
			border: none;
			border-radius: 8px;
			font-weight: bold;
		}

		.btn-warning:hover {
			background-color: #e6b800;
		}

		/* ファイル選択ラベルの位置調整 */
		.file-upload-label {
			margin-top: 10px;
		}

		/* フォームのスタイル調整 */
		.upload-form {
			margin-top: 20px;
		}

		/* 戻るボタン位置調整 */
		.position-fixed.bottom-0.start-0.m-3 {
			bottom: 20px;
			left: 20px;
		}
	</style>
@endsection
