<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Profile of Luthfi" />
    <meta name="author" content="Muhammad Luthfi Hamid" />
    <title>Profile - Luthfi</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/front-end.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    @include('front-end.navbar')

    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center" id="home">
        <div class="container d-flex align-items-center flex-column">
            @foreach ($homes as $home)
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" style="border-radius: 20px"
                    src="{{ asset('storage/' . $home->image) }}" alt="{{ $home->title }} Image" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">{{ $home->title }}</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <i class="fa-solid fa-star-of-life"></i>
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fa-solid fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                    <i class="fa-solid fa-star-of-life"></i>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">{{ $home->description }}</p>
            @endforeach
        </div>
    </header>

    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        @include('front-end.portofolio')
    </section>

    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
        @include('front-end.about')
    </section>

    <!-- Contact Section-->
    <section class="page-section" id="contact">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Contact Section Form-->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." required />
                            <label for="name">Full Name</label>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required />
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="(123) 456-7890" required />
                            <label for="phone">Phone Number</label>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                            <label for="message">Message</label>
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Send Message</button>
                    </form>
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </section>

    <!-- Footer-->
    <footer class="footer text-center">
        @include('front-end.footer')
    </footer>

    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Muhammad Luthfi Hamid 2023</small></div>
    </div>

    <!-- Portfolio Modals-->
    @foreach ($portofolios as $key => $portofolio)
        @if ($key < 6)
            <div class="portfolio-modal modal fade" id="portfolioModal{{ $key + 1 }}" tabindex="-1"
                aria-labelledby="portfolioModalLabel{{ $key + 1 }}" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center pb-5">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <!-- Portfolio Modal - Title-->
                                        <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">
                                            {{ $portofolio->title }}</h2>
                                        <!-- Icon Divider-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                            <div class="divider-custom-line"></div>
                                        </div>
                                        <!-- Portfolio Modal - Image-->
                                        <img class="img-fluid rounded mb-5"
                                            src="{{ asset('storage/' . $portofolio->gambar) }}" alt="Portfolio Image" />
                                        <!-- Portfolio Modal - Text-->
                                        <p class="mb-4">{{ $portofolio->deskripsi }}</p>
                                        <button class="btn btn-primary" data-bs-dismiss="modal">
                                            <i class="fas fa-xmark fa-fw"></i>
                                            Close Window
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- SB Forms JS -->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
