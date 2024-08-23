@extends('layouts.app')

<!-- page contents -->
@section('content')
	<img src="{{ asset('images/home_concept.png') }}" alt="Aplication image" width="100%" id="concept-img">

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
						<img src="{{ asset('images/diary_sample.jpg') }}" alt="Latest your diary" class="d-flex justify-content-center"
							style="margin: 4%; border-radius:5%">
						<div class="card-body">
							<p class="about-description" style="text-decoration: underline;"> タイトル </p>
							<h6 class="about-description" style="margin-bottom:20px;">豆腐ハンバーグと特製リンゴサラダ </h6>
							<p class="about-description" style="text-decoration: underline;"> ひとこと </p>
							<h6 class="about-description" style="margin-bottom:30px;">ヘルシーかつ美味しくできて満足！！ </h6>
							<p class="about-description" style="font-size: 13px"> ＜満足度＞ </p>
							<div style="display: flex;">
								<p class="about-description">★★★★☆ :</p>
								<p class="about-description" style="margin-left:10px; color:rgb(224, 143, 14)"> お気に入り </p>
							</div>
						</div>
					</figure>
				</div>
			</div>
		</section>
	@endauth

	<section id="service" class="container my-5">
		<h2 class="text-center mb-4 fs-1"
			style="font-family: 'Dancing Script', cursive; color:rgb(203, 38, 20); font-weight: bold; margin-top:70px;">~
			Service ~</h2>

		<!-- First Service Block -->
		<div class="container" id="service-1">
			<div class="row align-items-center mb-4 d-sm-flex">
				<div class="col-md-6">
					<img src="{{ asset('images/service_photo_1.jpg') }}" class="img-fluid align-items-center" alt="Service 1 Image"
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
		<div class="row align-items-center mb-4" id="service-2" style="margin-top: 50px">
			<div class="col-md-6 order-md-2">
				<img src="{{ asset('images/service_photo_2.jpg') }}" class="img-fluid align-items-center" alt="Service 2 Image"
					style="border-radius:10%; width: 100%; height:auto; padding:auto 10%;">
			</div>
			<div class="col-md-6 order-md-1" style="margin-top: 30px">
				<h3 class="mb-3">2. あなたの自炊を応援するレシピの提供</h3>
				<p>
					献立を決めたあとは、早速自炊を始めましょう。Cook
					Shotはあなたが準備している間に、ササっと最適なレシピを提供します。この素晴らしいパートナーのおかげで、億劫なレシピ検索の時間も素敵な料理体験の時間へと姿を変えます。これで作り方もばっちりです。<br><br>
					さあ、今すぐ最高のレシピで素敵な料理を体験しましょう。
				</p>
			</div>
		</div>

		<!-- Third Service Block -->
		<div class="row align-items-center mb-4" id="service-3" style="margin-top: 50px">
			<div class="col-md-6">
				<img src="{{ asset('images/service_photo_3.jpg') }}" class="img-fluid align-items-center" alt="Service 3 Image"
					style="border-radius:10%; width: 100%; height:auto; padding:auto 10%;">
			</div>
			<div class="col-md-6" style="margin-top: 30px">
				<h3 class="mb-3">3. 素敵な自炊日記の作成</h3>
				<p>
					今日の自炊を達成したら自炊の記録を日記につけましょう。毎日の頑張りを日記として残し、あなただけの素敵な自炊記録をつくることができます。<br><br>
					あなたの成長を可視化するCook Shotのおかげで、生活の満足度も倍増します。日記を振り返り、未来の自炊ライフをもっと楽しみましょう。
				</p>
			</div>
		</div>

	</section>
@endsection

{{-- Footer --}}
@section('footer')
	@include('parts.footer')
@endsection
