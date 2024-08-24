<div class="container">
    <!-- About Section Heading-->
    <h2 class="page-section-heading text-center text-uppercase text-white">Abouts</h2>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light"><i class="fa-solid fa-star-of-life"></i>
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fa-solid fa-star"></i></div>
        <div class="divider-custom-line"></div><i class="fa-solid fa-star-of-life"></i>
    </div>
    <!-- About Section Content-->
    <div class="row">
        @foreach ($abouts as $about)
            <div class="col-lg-12 ms-auto text-center">
                <p class="lead">{{$about->tentang1}}</p>
                <p class="lead">{{$about->tentang2}}</p>
            </div>

        @endforeach
    </div>
    <!-- About Section Button-->

</div>
