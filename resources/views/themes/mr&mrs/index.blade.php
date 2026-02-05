<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>{{ $wedding->groom_name }} & {{ $wedding->bride_name }}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Open+Sans:wght@400;500;600&family=Petit+Formal+Script&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('mr&mrs/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{ asset('mr&mrs/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('mr&mrs/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('mr&mrs/css/style.css')}}" rel="stylesheet">
    </head>

    <body>

        <!-- Navbar start -->
        <div class="container-fluid sticky-top px-0">
            <div class="container-fluid">
                <div class="container px-0">
                    <nav class="navbar navbar-light navbar-expand-xl" id="navBar">
                        <a href="{{ asset('mr&mrs/index.html')}}" class="navbar-brand">
                            <h4 class="text-primary display-6 fw-bold mb-0">{{ $wedding->groom_name }}<strong class="text-secondary">&</strong>{{ $wedding->bride_name }}</h4>
                        </a>
                        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="fa fa-bars text-primary"></span>
                        </button>
                        <div class="collapse navbar-collapse py-3" id="navbarCollapse">
                            <div class="navbar-nav mx-auto border-top">
                                <a href="#" class="nav-item nav-link active">Home</a>
                                <a href="#weddingAbout" class="nav-item nav-link">About</a>
                                <a href="#weddingStory" class="nav-item nav-link">Story</a>
                                <a href="#weddingTimeline" class="nav-item nav-link">Timeline</a>
                                <a href="#weddingGallery" class="nav-item nav-link">Gallery</a>
                                <a href="#weddingRsvp" class="nav-item nav-link">RSVP</a>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap pt-xl-0">
                                <a href="#weddingRsvp" class="btn btn-primary btn-primary-outline-0 py-2 px-4 ms-4">Book Attendance</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->

        <!-- Carousel Start -->
        <div class="container-fluid carousel-header px-0">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="{{asset('mr&mrs/img/carousel-1.jpg')}}" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3 mx-auto animated zoomIn" style="max-width: 900px;">
                                <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-4" style="border-style: double;">
                                    <h4 class="text-white text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">WE ARE GETTING MARRIED</h4>
                                </div>
                                <h1 class="display-1 text-capitalize text-white mb-3">{{ $wedding->groom_name }} <i class="fa fa-heart text-primary"></i> {{ $wedding->bride_name }}</h1>
                                <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-5" style="border-style: double;">
                                    <h4 class="text-white text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</h4>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn btn-primary btn-primary-outline-0 py-3 px-5" href="#weddingRsvp">RSVP Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('mr&mrs/img/carousel-2.jpg')}}" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3 mx-auto animated zoomIn" style="max-width: 900px;">
                                <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-5" style="border-style: double;">
                                    <h4 class="text-white text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">WE ARE GETTING MARRIED</h4>
                                </div>
                                <h1 class="display-1 text-capitalize text-white mb-3">{{ $wedding->groom_name }} <i class="fa fa-heart text-primary"></i> {{ $wedding->bride_name }}</h1>
                                <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-4" style="border-style: double;">
                                    <h4 class="text-white text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</h4>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn btn-primary btn-primary-outline-0 py-3 px-5" href="#weddingRsvp">RSVP Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('mr&mrs/img/carousel-3.png')}}" class="img-fluid bg-secondary" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3 mx-auto animated zoomIn" style="max-width: 900px;">
                                <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-4" style="border-style: double;">
                                    <h4 class="text-white text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">WE ARE GETTING MARRIED</h4>
                                </div>
                                <h1 class="display-1 text-capitalize text-white mb-3">{{ $wedding->groom_name }} <i class="fa fa-heart text-primary"></i> {{ $wedding->bride_name }}</h1>
                                <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-4" style="border-style: double;">
                                    <h4 class="text-white text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</h4>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn btn-primary btn-primary-outline-0 py-3 px-5" href="#">RSVP Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Hello! Start -->
        <div class="container-fluid position-relative py-5" id="weddingAbout">
            <div class="position-absolute" style="top: -35px; right: 0;">
                <img src="{{asset('mr&mrs/img/tamp-bg-1.png')}}" class="img-fluid" alt="">
            </div>
            <div class="position-absolute" style="top: -10px; left: 0; transform: rotate(150deg);">
                <img src="{{asset('mr&mrs/img/tamp-bg-1.png')}}" class="img-fluid" alt="">
            </div>
            <div class="container position-relative py-5">
                <div class="mx-auto text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800;">
                    <h1 class="text-primary display-1">Hello!</h1>
                    <h4 class="text-dark mb-0">We invite you to celebrate our wedding</h4>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="d-flex">
                                    <div class="text-end my-auto pe-4">
                                        <h3 class="text-primary mb-3">{{ $wedding->bride_name }}</h3>
                                        <p class="text-dark mb-0" style="line-height: 30px;"> Putri Dari Ayah {{ $wedding->bride_parent }}
                                    </div>
                                    <img src="{{asset('mr&mrs/img/bride.jpg')}}" class="img-fluid img-border" alt="">
                                </div>
                            </div>
                            <div class="col-lg-2 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex align-items-center justify-content-center">
                                    <i class="fa fa-heart fa-5x text-primary"></i>
                               </div>
                            </div>
                            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="d-flex">
                                    <img src="{{asset('mr&mrs/img/Groom.jpg')}}" class="img-fluid img-border" alt="">
                                    <div class="my-auto ps-4">
                                        <h3 class="text-primary mb-3">{{ $wedding->groom_name }}</h3>
                                        <p class="text-dark mb-0" style="line-height: 30px;"> Putra Dari Ibu {{ $wedding->groom_parent }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hello! End -->

        <!-- Story Start -->
        <div class="container-fluid story position-relative py-5" id="weddingStory">
            <div class="position-absolute" style="top: -35px; right: 0;">
                <img src="{{asset('mr&mrs/img/tamp-bg-1.png')}}" class="img-fluid" alt="">
            </div>
            <div class="position-absolute" style="top: -15px; left: 0; transform: rotate(150deg);">
                <img src="{{asset('mr&mrs/img/tamp-bg-1.png')}}" class="img-fluid" alt="">
            </div>
            <div class="container position-relative py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-uppercase text-primary fw-bold mb-4">Story</h5>
                    <h1 class="display-4">Our Love Story</h1>
                </div>
                <div class="story-timeline">
                    <div class="row wow fadeInUp" data-wow-delay="0.2s">
                        <div class="col-md-6 text-end border-0 border-top border-end border-secondary p-4">
                            <div class="d-inline-flex align-items-center h-100">
                                <img src="{{asset('mr&mrs/img/story-1.jpg')}}" class="img-fluid w-100 img-border" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 border-start border-top border-secondary p-4 pe-0">
                            <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                                <h4 class="mb-2 text-dark">First Meet</h4>
                                <p class="text-uppercase text-primary mb-2" style="letter-spacing: 3px;">01 Jan 2050</p>
                                <p class="m-0 fs-5">Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row flex-column-reverse flex-md-row wow fadeInUp" data-wow-delay="0.3s">
                        <div class="col-md-6 text-end border-end border-top border-secondary p-4 ps-0">
                            <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                                <h4 class="text-dark mb-2">First Date</h4>
                                <p class="text-uppercase text-primary mb-2" style="letter-spacing: 3px;">01 Jan 2050</p>
                                <p class="m-0 fs-5">Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.</p>
                            </div>
                        </div>
                        <div class="col-md-6 border-start border-top border-secondary p-4">
                            <div class="d-inline-flex align-items-center h-100">
                                <img src="{{asset('mr&mrs/img/story-2.jpg')}}" class="img-fluid w-100 img-border" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row wow fadeInUp" data-wow-delay="0.4s">
                        <div class="col-md-6 text-end border-end border-top border-secondary p-4 ps-0">
                            <div class="d-inline-flex align-items-center h-100">
                                <img src="{{asset('mr&mrs/img/story-3.jpg')}}" class="img-fluid w-100 img-border" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 border-start border-top border-secondary p-4 pe-0">
                            <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                                <h4 class="text-dark mb-2">Proposal</h4>
                                <p class="text-uppercase text-primary mb-2" style="letter-spacing: 3px;">01 Jan 2050</p>
                                <p class="m-0 fs-5">Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row flex-column-reverse flex-md-row wow fadeInUp" data-wow-delay="0.5s">
                        <div class="col-md-6 text-end border border-start-0 border-secondary p-4 ps-0">
                            <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                                <h4 class="text-dark mb-2">Enagagement</h4>
                                <p class="text-uppercase text-primary mb-2" style="letter-spacing: 3px;">01 Jan 2050</p>
                                <p class="m-0 fs-5">Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.</p>
                            </div>
                        </div>
                        <div class="col-md-6 border border-end-0 border-secondary p-4">
                            <div class="d-inline-flex align-items-center h-100">
                                <img src="{{asset('mr&mrs/img/story-4.jpg')}}" class="img-fluid w-100 img-border" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Story End -->


        <!--- Wedding Date -->
        <div class="container-fluid wedding-date-bg position-relative py-5">
            <div class="position-absolute" style="top: -100px; right: 0;">
                <img src="{{asset('mr&mrs/img/tamp-bg-1.png')}}" class="img-fluid" alt="">
            </div>
            <div class="position-absolute" style="top: -80px; left: 0; transform: rotate(150deg);">
                <img src="{{asset('mr&mrs/img/tamp-bg-1.png')}}" class="img-fluid" alt="">
            </div>
            <div class="container py-5 wow zoomIn" data-wow-delay="0.1s">
                <div class="wedding-date text-center bg-light p-5" style="border-style: double !important; border: 15px solid rgba(253, 93, 93, 0.5);">
                    <div class="wedding-date-content">
                        <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-4" style="border-style: double;">
                            <h4 class="text-dark text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</h4>
                        </div>
                        <h1 class="display-4">We Are Getting Married</h1>
                        <p class="text-dark fs-5">Niloy Hotel New York , 123 West 23th Street, NY</p>
                        <div class="d-flex align-items-center justify-content-center mb-5">
                            <div class="text-dark fs-2 me-4">
                                <div>00</div>
                                <span>Days</span>
                            </div>
                            <div class="text-dark fs-2 me-4">
                                <div>00</div>
                                <span>Hours</span>
                            </div>
                            <div class="text-dark fs-2 me-4">
                                <div>00</div>
                                <span>Mins</span>
                            </div>
                            <div class="text-dark fs-2 me-0">
                                <div>00</div>
                                <span>Secs</span>
                            </div>
                        </div>
                        <a class="btn btn-primary btn-primary-outline-0 py-3 px-5" href="#">Book Your Attendance</a>
                    </div>
                    <div class="position-absolute" style="top: 15%; right: -30px; transform: rotate(320deg); opacity: 0.5; z-index: 1;">
                        <img src="{{asset('mr&mrs/img/attendance-bg.')}}png" class="img-fluid" alt="">
                    </div>
                    <div class="position-absolute" style="top: 15%; left: -10px; transform: rotate(-320deg); opacity: 0.5; z-index: 1;">
                        <img src="{{asset('mr&mrs/img/attendance-bg.')}}png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Wedding Date -->


        <!-- Wedding Timeline start -->
        <div class="container-fluid wedding-timeline bg-secondary position-relative overflow-hidden py-5" id="weddingTimeline">
            <div class="position-absolute" style="top: 50%; left: -100px; transform: translateY(-50%); opacity: 0.5;">
                <img src="{{asset('mr&mrs/img/wedding-bg.png')}}" class="img-fluid" alt="">
            </div>
            <div class="position-absolute" style="top: 50%; right: -160px; transform: translateY(-50%); opacity: 0.5; rotate: 335deg;">
                <img src="{{asset('mr&mrs/img/wedding-bg.png')}}" class="img-fluid" alt="">
            </div>
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h1 class="display-4 text-white">Wedding Planing Timeline</h1>
                </div>
                <div class="position-relative wedding-content">
                    <div class="row g-4">
                        <div class="col-6 col-md-6 col-xl-3 border border-bottom-0">
                            <div class="text-center p-3 wow fadeIn" data-wow-delay="0.1s">
                                <div class="mb-4 p-3 d-inline-flex">
                                    <i class="fas fa-menorah text-primary fa-3x"></i>
                                </div>
                                <p class="text-primary">10:00AM - 11:00AM</p>
                                <h3 class="text-dark">Dinner</h3>
                                <p class="text-dark">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-xl-3 border border-top-0 border-start-0">
                            <div class="text-center p-3 wow fadeIn" data-wow-delay="0.3s">
                                <div class="mb-4 p-3 d-inline-flex">
                                    <i class="fas fa-photo-video text-primary fa-3x"></i>
                                </div>
                                <p class="text-primary">10:00AM - 11:00AM</p>
                                <h3 class="text-dark">Photoshoot</h3>
                                <p class="text-dark">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-xl-3 border border-bottom-0 border-end-0">
                            <div class="text-center p-3 wow fadeIn" data-wow-delay="0.5s">
                                <div class="mb-4 p-3 d-inline-flex">
                                    <i class="fas fa-dungeon text-primary fa-3x"></i>
                                </div>
                                <p class="text-primary">10:00AM - 11:00AM</p>
                                <h3 class="text-dark">Reception</h3>
                                <p class="text-dark">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-xl-3 border border-top-0">
                            <div class="text-center p-3 wow fadeIn" data-wow-delay="0.7s">
                                <div class="mb-4 p-3 d-inline-flex">
                                    <i class="fas fa-ring text-primary fa-3x"></i>
                                </div>
                                <p class="text-primary">10:00AM - 11:00AM</p>
                                <h3 class="text-dark">Ceremony</h3>
                                <p class="text-dark">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute heart-circle " style="bottom: 0; left: -18px;">
                        <div class="border border-2 border-primary rounded-circle p-1 bg-secondary"></div>
                    </div>
                    <div class="position-absolute heart-circle" style="top: 18px; right: -17px;">
                        <div class="border border-2 border-primary rounded-circle p-1 bg-secondary"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wedding Timeline End -->


        <!-- Gallery Start -->
        <div class="container-fluid gallery position-relative py-5" id="weddingGallery">
            <div class="position-absolute" style="top: -95px; right: 0;">
                <img src="{{asset('mr&mrs/img/tamp-bg-1.png')}}" class="img-fluid" alt="">
            </div>
            <div class="position-absolute" style="top: -80px; left: 0; transform: rotate(150deg);">
                <img src="{{asset('mr&mrs/img/tamp-bg-1.png')}}" class="img-fluid" alt="">
            </div>
            <div class="container position-relative py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-2 text-dark">Wedding Gallery</h1>
                    <p class="fs-5 text-dark">Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="gallery-item">
                            <div class="gallery-img">
                                <img class="img-fluid w-100" src="{{asset('mr&mrs/img/gallery-1.jpg')}}" alt="">
                                <div class="hover-style"></div>
                                <div class="search-icon">
                                    <a href="{{ asset('mr&mrs/img/gallery-1.jpg')}}" data-lightbox="Gallery-1" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                                </div>
                            </div>
                            <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                                <h5>Wedding on the beach</h5>
                                <p class="text-dark mb-0">{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="gallery-item">
                            <div class="gallery-img">
                                <img class="img-fluid w-100" src="{{asset('mr&mrs/img/gallery-2.jpg')}}" alt="">
                                <div class="hover-style"></div>
                                <div class="search-icon">
                                    <a href="{{ asset('mr&mrs/img/gallery-2.jpg')}}" data-lightbox="Gallery-2" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                                </div>
                            </div>
                            <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                                <h5>Wedding on the beach</h5>
                                <p class="text-dark mb-0">{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="gallery-item">
                            <div class="gallery-img">
                                <img class="img-fluid w-100" src="{{asset('mr&mrs/img/gallery-3.jpg')}}" alt="">
                                <div class="hover-style"></div>
                                <div class="search-icon">
                                    <a href="{{ asset('mr&mrs/img/gallery-3.jpg')}}" data-lightbox="Gallery-3" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                                </div>
                            </div>
                            <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                                <h5>Wedding on the beach</h5>
                                <p class="text-dark mb-0">{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="gallery-item">
                            <div class="gallery-img">
                                <img class="img-fluid w-100" src="{{asset('mr&mrs/img/gallery-4.jpg')}}" alt="">
                                <div class="hover-style"></div>
                                <div class="search-icon">
                                    <a href="{{ asset('mr&mrs/img/gallery-4.jpg')}}" data-lightbox="Gallery-4" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                                </div>
                            </div>
                            <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                                <h5>Wedding on the beach</h5>
                                <p class="text-dark mb-0">{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="gallery-item">
                            <div class="gallery-img">
                                <img class="img-fluid w-100" src="{{asset('mr&mrs/img/gallery-5.jpg')}}" alt="">
                                <div class="hover-style"></div>
                                <div class="search-icon">
                                    <a href="{{ asset('mr&mrs/img/gallery-5.jpg')}}" data-lightbox="Gallery-5" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                                </div>
                            </div>
                            <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                                <h5>Wedding on the beach</h5>
                                <p class="text-dark mb-0">{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="gallery-item">
                            <div class="gallery-img">
                                <img class="img-fluid w-100" src="{{asset('mr&mrs/img/gallery-6.jpg')}}" alt="">
                                <div class="hover-style"></div>
                                <div class="search-icon">
                                    <a href="{{ asset('mr&mrs/img/gallery-6.jpg')}}" data-lightbox="Gallery-6" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                                </div>
                            </div>
                            <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                                <h5>Wedding on the beach</h5>
                                <p class="text-dark mb-0">{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="gallery-item">
                            <div class="gallery-img">
                                <img class="img-fluid w-100" src="{{asset('mr&mrs/img/gallery-7.jpg')}}" alt="">
                                <div class="hover-style"></div>
                                <div class="search-icon">
                                    <a href="{{ asset('mr&mrs/img/gallery-7.jpg')}}" data-lightbox="Gallery-7" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                                </div>
                            </div>
                            <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                                <h5>Wedding on the beach</h5>
                                <p class="text-dark mb-0">{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="gallery-item">
                            <div class="gallery-img">
                                <img class="img-fluid w-100" src="{{asset('mr&mrs/img/gallery-8.jpg')}}" alt="">
                                <div class="hover-style"></div>
                                <div class="search-icon">
                                    <a href="{{ asset('mr&mrs/img/gallery-8.jpg')}}" data-lightbox="Gallery-8" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                                </div>
                            </div>
                            <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                                <h5>Wedding on the beach</h5>
                                <p class="text-dark mb-0">{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center wow fadeIn" data-wow-delay="0.2s">
                        <a class="btn btn-primary btn-primary-outline-0 py-3 px-5 me-2" href="#">View All <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery end -->


        <!-- RSVP Form Start -->
        <div class="container-fluid RSVP-form py-5" id="weddingRsvp">
            <div class="container py-5">
                <div class="mb-5 text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-2 text-primary">RSVP Form</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="p-5 border-secondary position-relative" style="border-style: double;">
                            <div class="fw-bold text-primary bg-white d-flex align-items-center justify-content-center position-absolute border-secondary p-2 wow fadeIn" data-wow-delay="0.1s" style="width: 75%; border-style: double; top: 0; left: 50%; transform: translate(-50%, -50%);">
                                Kindly respond by {{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }} we look forward to celebrating with you!
                            </div>
                            <form method="POST" action="{{ route('rsvp.store') }}">
                                @csrf
                                <input type="hidden" name="wedding_slug" value="{{ $wedding->slug }}">
                                <div class="row gx-4 gy-3">
                                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                        <div class="form-group">
                                            <label for="Examplename" class="form-label text-dark">Name</label>
                                            <input type="text" class="form-control py-3 border-0 bg-white text-dark" id="Examplename" placeholder="Input Name" name="name" required>
                                          </div>
                                    </div>
                                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                        <div class="form-group">
                                            <label for="exampleselect" class="form-label text-dark">Konfirmasi Kehadiran</label>
                                            <select class="form-control bg-white text-dark py-3 border-0" name="attendance" id="exampleselect" placeholder="Number Of Guests">
                                            <option value="hadir">Hadir</option>
                                            <option value="tidak_hadir">Tidak Hadir</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                        <div class="form-group">
                                            <label for="exampletextarea" class="form-label text-dark">Message</label>
                                            <textarea name="message" class="form-control border-0 bg-white text-dark py-3 border-0" id="exampletextarea" cols="30" rows="5" placeholder="Sampaikan"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center wow fadeIn" data-wow-delay="0.1s">
                                        <button class="btn btn-primary btn-primary-outline-0 py-3 px-5">Kirim RSVP</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                         <div class="p-5 border-secondary position-relative mt-2" style="border-style: double;">
                            <h2 class="text-3xl text-yellow-400 text-center mb-8">Guest Messages</h2>
                                @forelse($messages as $msg)
                                    <div class="glass rounded">
                                    <p class="font-bold text-dark">{{ $msg->kolom1 }} - {{ $msg->message }}</p>
                                    </div>
                                    @empty
                                    <p class="text-center opacity-60 text-dark">Belum ada ucapan</p>
                                @endforelse
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                <div class="row g-5 justify-content-center text-center">
                    <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="p-4 border-secondary" style="border-style: double;">
                            <h4>Call Us Now</h4>
                            <a href="#" class="text-dark">+123 456 7890</a>
                        </div>
                    </div>
                    <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                        <div class="p-4 border-secondary" style="border-style: double;">
                            <h4>When</h4>
                            <p class="mb-0 text-dark">
                                {{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}. at {{$wedding->time}} in the evening
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="p-4 border-secondary" style="border-style: double;">
                            <h4>Where</h4>
                            <p class="mb-0 text-dark">
                                {{$wedding->location}}. 
                            </p>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.2s">
                        <div class="border-secondary" style="border-style: double;">
                            <iframe
                                src="{{ $wedding->maps_link }}"
                                width="100%"
                                height="350"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- RSVP Form End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-light"><a href="https://wedding-app-production-5f44.up.railway.app/"><i class="fas fa-copyright text-light me-2"></i>Wedding</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-white">
                        Distributed By <a href="#">Annchyer</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('mr&mrs/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('mr&mrs/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('mr&mrs/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('mr&mrs/lib/lightbox/js/lightbox.min.js')}}"></script>
    

    <!-- Template Javascript -->
    <scri src="{{asset('mr&mrs/js/main.js')}}"></scri'pt>
    </body>

</html>