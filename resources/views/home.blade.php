@extends('layouts.app')

<!-- page contents -->
@section('content')
	<img src="{{ asset('images/home_image.jpg') }}" alt="Aplication image">

	<div class="px-40 py-24">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white-subtle overflow-hidden shadow sm:rounded-lg rounded-3">
				<a href="{{ route('photo-reader.index') }}"
					class="bg-warning bg-opacity-75 fs-2 border-b border-gray-200 p-6 block w-full text-center
                        　 font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
					自炊をはじめる
				</a>
			</div>
		</div>
	</div>

	@auth
		<section id="service" class="container my-5">
			<h2 class="text-center mb-4 fs-1"
				style="font-family: 'Dancing Script', cursive; color:rgb(203, 38, 20); font-weight: bold">~ Your Diary ~
			</h2>

			<div class="container mt-5">
				<div class="d-flex justify-content-center">
					<figure class="card w-50">
						<figcaption class="card-header text-center">
							<h3 style="font-size: 14px; text-align: center; margin:0">最新の日記</h3>
						</figcaption>
						<img src="{{ asset('images/home_image.jpg') }}" alt="Latest your diary" width="auto" height="auto"
							class="d-flex justify-content-center" style="padding-top: 5%">
						<div class="card-body">
							<p class="about-description" style="text-decoration: underline;"> タイトル </p>
							<p class="about-description" style="text-decoration: underline;"> ひとこと </p>
						</div>
					</figure>
				</div>
			</div>
		</section>
	@endauth

	<section id="service" class="container my-5">
		<h2 class="text-center mb-4 fs-1"
			style="font-family: 'Dancing Script', cursive; color:rgb(203, 38, 20); font-weight: bold">~ Service ~</h2>

		<!-- First Service Block -->
		<div class="container">
			<div class="row align-items-center mb-4 d-sm-flex">
				<div class="col-md-6">
					<img src="https://thumb.photo-ac.com/31/31a366ce529d50321fb63f86e752338e_w.jpeg"
						class="img-fluid align-items-center" alt="Service 1 Image"
						style="border-radius:10%; width: 100%; height:auto; padding:auto 10%;">
				</div>
				<div class="col-md-6" style="margin-top: 30px">
					<h3 class="mb-3">1. 手持ちの食材からササっと献立を提案</h3>
					<p>
						Cook Shot は健康的な食生活を送りたいあなたの素晴らしいパートナーです。自炊をするのにハードルとなる面倒なレシピ決めを写真1枚で解決します。<br><br>
						冷蔵庫内の手持ちの食材を撮影するだけで、栄養バランスのとれた魅力的な献立を提案します。Cook Shotと一緒にサクッと献立を決めて美味しい料理を楽しみましょう。
					</p>
				</div>
			</div>
		</div>
		<!-- Second Service Block -->
		<div class="row align-items-center mb-4" style="margin-top: 50px">
			<div class="col-md-6">
				<img src="./img/service1.jpg" class="img-fluid" alt="Service 1 Image">
			</div>
			<div class="col-md-6">
				<h3 class="mb-3">2. あなたの自炊を応援するレシピの提供</h3>
				<p>
					献立を決めたあとは、早速自炊を始めましょう。Cook Shotはあなたが準備している間に、ササっと最適なレシピを提供します。これで作り方もばっちりです。<br>
				</p>
			</div>
		</div>

		<!-- Third Service Block -->
		<div class="row align-items-center mb-4" style="margin-top: 50px">
			<div class="col-md-6">
				<img src="./img/service1.jpg" class="img-fluid" alt="Service 1 Image">
			</div>
			<div class="col-md-6">
				<h3 class="mb-3">3. 素敵な自炊日記の作成</h3>
				<p>
					今日の自炊を達成したら自炊の記録を日記につけましょう。毎日の頑張りを日記として残し、あなただけの素敵な自炊記録をつくりましょう。<br>
				</p>
			</div>
		</div>

	</section>
@endsection

{{-- Footer --}}
