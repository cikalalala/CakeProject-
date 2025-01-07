@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="gradient-bg">
    <!-- Header Section -->
    <header class="text-center py-5">
        <div class="container">
            <h1>About Mel's Cake</h1>
            <p>Discover our passion for baking and creating delightful cakes for every occasion.</p>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="about-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Our Story</h2>
                    <p>Mel's Cake started as a small home bakery in Siak, Riau, with a vision to bring joy through delicious, homemade cakes. Today, we’ve grown into a trusted bakery, known for our quality ingredients, artistic designs, and dedication to customer satisfaction.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/mels-cake.jpg') }}" alt="Mel's Cake" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section id="values" class="values-section bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <i class="fa fa-heart fa-3x mb-3"></i>
                    <h3>Quality</h3>
                    <p>We use only the finest ingredients to ensure every bite is perfect.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fa fa-birthday-cake fa-3x mb-3"></i>
                    <h3>Creativity</h3>
                    <p>Every cake is a unique masterpiece tailored to your special occasion.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fa fa-smile-o fa-3x mb-3"></i>
                    <h3>Customer Happiness</h3>
                    <p>Your satisfaction is our greatest reward.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="team-section py-5">
        <div class="container">
            <h2 class="text-center mb-5">Meet the Baker</h2>
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <div class="team-member">
                        <img src="{{ asset('assets/images/baker.jpg') }}" alt="Mel's Cake Baker" class="img-fluid rounded-circle mb-3">
                        <h3>Melly Putriyani</h3>
                        <p>Founder & Head Baker</p>
                        <p>With years of experience in baking and a passion for art, Melinda creates cakes that are both visually stunning and delicious.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/plugins/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
@endpush
