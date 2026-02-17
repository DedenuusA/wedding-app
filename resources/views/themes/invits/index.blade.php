<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $wedding->bride_name }} & {{ $wedding->groom_name }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon1.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('invits/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('invits/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('invits/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('invits/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('invits/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('invits/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('invits/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('invits/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('invits/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('invits/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('invits/assets/css/style.css') }}">
</head>

<style>
    .logo1 img {
        max-height: 60px;
        width: auto;
    }

    @media (max-width: 768px) {
        .logo1 img {
            max-height: 45px;
        }
    }

    .music-btn {
        position: fixed;
        right: 95px;
        bottom: 15px;
        /* turun sedikit */
        width: 55px;
        height: 55px;
        border-radius: 50%;
        border: none;
        background: #d4a373;
        color: white;
        font-size: 20px;
        cursor: pointer;
        z-index: 999;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    /* khusus Android / layar kecil */
    @media (max-width: 768px) {
        .music-btn {
            right: 80px;
            bottom: 16px;
            /* naik sedikit dari gesture bar */
            width: 50px;
            height: 50px;
            font-size: 18px;
        }
    }



    .music-btn:hover {
        transform: scale(1.1);
        background: #c08a5b;
    }
</style>

<body>

    <button onclick="playMusic()" class="music-btn" id="musicBtn">
        🎵
    </button>

    <audio id="bgmusic" loop>
        @if (optional($wedding)->music_url)
            <source src="{{ asset('images/' . $wedding->music_url) }}">
        @endif
    </audio>


    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="/images/favicon1.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <div class="logo1">
                                <a href="#"><img src="/images/favicon1.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="#story"> Our Story</a></li>
                                        <li><a href="#location">Location</a></li>
                                        <li><a href="#gallery">Gallery</a></li>
                                        <li><a href="#gift">Gift Wedding</a></li>
                                        <li><a href="#book">Guest Book</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>
        <!-- Slider Area Start-->
        <div class="slider-area">
            @php
                $gallery = json_decode(optional($wedding)->kolom2 ?? '[]');
            @endphp

            <div class="slider-active">
                @forelse($gallery as $img)
                    <div class="single-slider slider-height hero-overly d-flex align-items-center"
                        data-background="{{ asset('images/' . $img) }}">
                        <div class="container">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-7 col-md-9">
                                    <div class="hero__caption text-center d-flex align-items-center caption-bg">
                                        <div class="circle-caption">
                                            <span data-animation="fadeInUp" data-delay=".3s">
                                                {{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}
                                            </span>
                                            <h1 data-animation="fadeInUp" data-delay=".5s">
                                                {{ $wedding->bride_name }} & {{ $wedding->groom_name }}
                                            </h1>
                                            <p data-animation="fadeInUp" data-delay=".9s">
                                                We are getting married
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- fallback jika gallery kosong --}}
                    <div class="single-slider slider-height hero-overly d-flex align-items-center"
                        data-background="{{ asset('invits/assets/img/hero/homeHero_2.jpg') }}">
                        <div class="container">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-7 col-md-9">
                                    <div class="hero__caption text-center d-flex align-items-center caption-bg">
                                        <div class="circle-caption">
                                            <span>{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}</span>
                                            <h1>{{ $wedding->bride_name }} & {{ $wedding->groom_name }}</h1>
                                            <p>We are getting married</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <!-- Slider Area End-->

        <!-- Our Story Start -->
        <div class="Our-story-area story-padding" id="story">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="story-caption text-center">
                            <h3>Our Story</h3>

                            @if (optional($wedding)->story)
                                <p class="story1">{{ $wedding->story }}</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <!-- shape -->
            <div class="shape-flower d-none d-xl-block">
                <img src="{{ asset('invits/assets/img/our_story/shape_left.png') }}" class="flower1" alt="">
                <img src="{{ asset('invits/assets/img/our_story/shape_right.png') }}" class="flower2 "
                    alt="">
            </div>
        </div>
        <!-- Our Story Ende -->
        <!-- Services Area Start-->
        <div class="service-area">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-8">
                        <div class="singl-services text-center mb-60">

                            <div class="top-caption">
                                <h4>
                                    {{ optional($wedding)->bride_name ?? '' }}
                                    &
                                    {{ optional($wedding)->groom_name ?? '' }}
                                </h4>

                                <p>
                                    {{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}
                                </p>
                            </div>

                            <div class="bottom-caption">
                                <p>
                                    Putri Dari {{ optional($wedding)->bride_parent ?? '' }} <br>
                                    & <br>
                                    Putra Dari {{ optional($wedding)->groom_parent ?? '' }}
                                </p>

                                <span>
                                    Pukul
                                    {{ optional($wedding)->time ? \Carbon\Carbon::parse($wedding->time)->format('H:i') : '' }}
                                    WIB
                                </span>

                                <p>
                                    {{ optional($wedding)->location ?? '' }}
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Services Area End-->
        <!-- our Memories start -->
        <div class="our-memories-area section-padding2" id="gallery">
            <div class="container">
                <!-- section tittle -->
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <img src="{{ asset('invits/assets/img/memories/section_tittle_flowre.png') }}"
                                alt="">
                            <h2>OUR MEMORIES</h2>
                        </div>
                    </div>
                </div>
                @php
                    $gallery = json_decode(optional($wedding)->kolom2 ?? '[]');
                @endphp

                @if (!empty($gallery))
                    <div class="row no-gutters">

                        @foreach ($gallery as $img)
                            <div class="col-lg-4 col-md-4">
                                <div class="memory">
                                    <div class="memories-img">
                                        <img src="{{ asset('images/' . $img) }}" alt="">

                                        <a class="menorie-icon" href="{{ asset('images/' . $img) }}">
                                            <i class="ti-plus"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endif

            </div>
            <!-- Shape Img -->
            <div class="memories-shape d-none d-xl-block">
                <img src="{{ asset('invits/assets/img/memories/left-img.png') }}" class="memories-shape1"
                    alt="">
                <img src="{{ asset('invits/assets/img/memories/right-img.png') }}" class="memories-shape2"
                    alt="">
            </div>
        </div>
        <!-- our Memories End-->
        <!-- Gift Start -->
        <!-- Gift Start -->
        <!-- Gift Start -->
        <div class="gift-area gift-padding gift-overly"
            data-background="{{ asset('invits/assets/img/memories/gft.jpg') }}" id="gift">
            <div class="container">
                <div class="gift-caption text-center">
                    <h2>The Best Gift</h2>
                </div>
                <div class="row justify-content-center">

                    {{-- QRIS --}}
                    @if (optional($wedding)->kolom1)
                        <div class="col-lg-4 mb-4 text-center">
                            <p><strong>Scan QRIS</strong></p>

                            <img src="{{ asset('images/' . $wedding->kolom1) }}" style="max-width:220px"
                                class="img-fluid rounded shadow">
                            <p class="text-dark mb-0">
                                Scan QRIS To Give Gifts
                            </p>

                        </div>
                    @endif


                    {{-- BANK --}}
                    <div class="col-lg-6">

                        @if ($wedding->banks->count())

                            @foreach ($wedding->banks as $bank)
                                @php
                                    $master = \App\Models\MasterBank::where('name', $bank->bank_name)->first();
                                    $logo = optional($master)->logo;
                                @endphp

                                <div class="mb-4 p-3 bg-white rounded shadow-sm text-center">

                                    @if ($logo)
                                        <img src="{{ asset('images/' . $logo) }}"
                                            style="width:55px;height:55px;object-fit:contain"
                                            class="bg-light rounded p-1 mb-2">
                                    @endif

                                    <p class="mb-1"><strong>{{ $bank->bank_name }}</strong></p>
                                    <p class="mb-1">{{ $bank->account_number }}</p>
                                    <p class="mb-2">a.n {{ $bank->account_holder }}</p>

                                    <button onclick="copyText('{{ $bank->account_number }}')"
                                        class="btn btn-primary px-3">
                                        Copy
                                    </button>

                                </div>
                            @endforeach

                        @endif

                    </div>

                </div>
            </div>
        </div>

        <!-- Contact form Start -->
        <div class="contact-form section-padding2 fix" id="book">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                        <div class="form-wrapper">
                            <!-- section tittle -->
                            <div class="row ">
                                <div class="col-lg-12">
                                    <div class="section-tittle tittle-form text-center">
                                        <img src="{{ asset('invits/assets/img/memories/section_tittle_flowre.png') }}"
                                            alt="">
                                        <h2>Are you attending?</h2>
                                    </div>
                                </div>
                            </div>
                            <form id="contact-form" action="{{ route('rsvp.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="wedding_slug" value="{{ $wedding->slug }}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-box mb-30">
                                            <input type="text" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-box subject-icon mb-30">
                                            <input type="number" name="total_guest" placeholder="Number Of Guest">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-30">
                                        <div class="select-itms">
                                            <select name="attendance" id="select2">
                                                <option value="hadir">Present</option>
                                                <option value="tidak_hadir">Not Present</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-box message-icon mb-30">
                                            <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                        </div>
                                        <div class="submit-info">
                                            <button class="btn2" type="submit">R.S.V.P</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="guest-messages mt-5">
                                <h4 class="text-center mb-4">Guest Messages</h4>
                                <div class="space-y-4" style="max-height: 260px; overflow-y: auto;">
                                    @forelse($messages as $msg)
                                        <div class="p-3 mb-3 bg-light rounded">
                                            <strong>{{ $msg->kolom1 }}</strong>
                                            <p class="mb-0">{{ $msg->message }}</p>
                                        </div>
                                    @empty
                                        <p class="text-center">No messages yet.</p>
                                    @endforelse
                                </div>
                            </div>
                            <!-- Shape inner Flower -->
                            <div class="shape-inner-flower">
                                <img src="{{ asset('invits/assets/img/flower/form-smoll-left.png') }}" class="top1"
                                    alt="">
                                <img src="{{ asset('invits/assets/img/flower/form-smoll-right.png') }}"
                                    class="top2" alt="">
                                <img src="{{ asset('invits/assets/img/flower/form-smoll-b-left.png') }}"class="top3"
                                    alt="">
                                <img src="{{ asset('invits/assets/img/flower/form-smoll-b-right.png') }}"class="top4"
                                    alt="">
                            </div>
                            <!-- Shape outer Flower -->
                            <div class="shape-outer-flower">
                                <img src="'{{ asset('invits/assets/img/flower/from-top.png') }}" class="outer-top"
                                    alt="">
                                <img src="{{ asset('invits/assets/img/flower/from-bottom.png') }}"
                                    class="outer-bottom" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact form End -->

        <!-- ================ Map ================= -->
        <section class="contact-sections')}}" id="location">
            <div class="d-area">
                <iframe src="{{ $wedding->maps_link }}" width="100%" height="350" style="border:0;"
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </section>

    </main>
    <footer>
        <!-- Footer Start-->
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>Wedding Digitals<i class="ti-heart"
                                        aria-hidden="true"></i>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('invits/./assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('invits/./assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('invits/./assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('invits/./assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('invits/./assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('invits/./assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('invits/./assets/js/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('invits/./assets/js/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('invits/./assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('invits/./assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('invits/./assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('invits/./assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('invits/./assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('invits/./assets/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('invits/./assets/js/contact.js') }}"></script>
    <script src="{{ asset('invits/./assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('invits/./assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('invits/./assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('invits/./assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('invits/./assets/js/plugins.js') }}"></script>
    <script src="{{ asset('invits./assets/js/main.js') }}"></script>

    <script>
        function copyText(text) {

            if (navigator.clipboard && window.isSecureContext) {
                // modern way
                navigator.clipboard.writeText(text)
                    .then(() => alert("Nomor rekening disalin!"))
                    .catch(() => fallbackCopy(text));

            } else {
                // fallback
                fallbackCopy(text);
            }
        }

        function fallbackCopy(text) {
            let textarea = document.createElement("textarea");
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);
            alert("Nomor rekening disalin!");
        }

        function playMusic() {
            const music = document.getElementById('bgmusic');
            const btn = document.getElementById('musicBtn');

            if (music.paused) {
                music.play();
                btn.innerHTML = "🔊";
            } else {
                music.pause();
                btn.innerHTML = "🎵";
            }
        }
    </script>

</body>

</html>
