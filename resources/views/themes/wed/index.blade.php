<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $wedding->bride_name }} & {{ $wedding->groom_name }} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon1.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('wed/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wed/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wed/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('wed/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('wed/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wed/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('wed/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wed/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('wed/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('wed/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('wed/assets/css/style.css') }}">
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

    .message-box {
        max-height: 300px;
        overflow-y: auto;
    }

    .message-box::-webkit-scrollbar {
        width: 6px;
    }

    .message-box::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }
</style>

<body>
    <button onclick="toggleMusic()" id="musicBtn"
        style="
    position: fixed;
    left: 15px;
    bottom: 25px;
    z-index: 9999;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: none;
    background: red;
    color: white;
    font-size: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
">
        🎵
    </button>

    <audio id="bgmusic" loop>
        @if (optional($wedding)->music_url)
            <source src="{{ asset('images/' . $wedding->music_url) }}">
        @endif
    </audio>
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
    <header>
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo1">
                                <a href=""><img src="/images/favicon1.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="#"> Home</a></li>
                                        <li><a href="#story">Story</a></li>
                                        <li><a href="#gallery">Gallery</a></li>
                                        <li><a href="#gift">Gift Wedding</a></li>
                                        <li><a href="#book">Guestbook</a></li>
                                        <li><a href="#location">Location</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        @php
            $sliderImages = json_decode(optional($wedding)->kolom2 ?? '[]', true);
        @endphp

        <div class="slider-area">
            <div class="slider-active">

                @forelse ($sliderImages as $img)
                    <div class="single-slider slider-height hero-overly d-flex align-items-center"
                        style="background-image: url('{{ asset('images/' . $img) }}');
                        background-size: cover;
                        background-position: center;">

                        <div class="container">
                            <div class="row d-flex align-items-center">
                                <div class="col-xl-8 col-lg-6 col-md-8">
                                    <div class="hero__caption">

                                        <span data-animation="fadeInLeft" data-delay=".3s">
                                            {{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}
                                        </span>

                                        <h1 data-animation="fadeInLeft" data-delay=".5s" data-duration="2000ms">
                                            {{ $wedding->bride_name }}
                                            <strong> & </strong>
                                            {{ $wedding->groom_name }}
                                        </h1>

                                        <p data-animation="fadeInLeft" data-delay=".9s">
                                            will get married
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="single-slider slider-height hero-overly d-flex align-items-center"
                        style="background-image: url('{{ asset('wed/assets/img/hero/default.jpg') }}');
                        background-size: cover;
                        background-position: center;">
                        <div class="container text-center text-white">
                            <h2>No Image Available</h2>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="Our-story-area story-padding d-flex align-items-center" id="story">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 text-center">
                        <div class="section-tittle mb-70">
                            <h2>Our Love Story​</h2>
                            <img src="{{ asset('wed/assets/img/gallery/tittle_img.png') }}" alt="">
                            @if (optional($wedding)->story)
                                <p class="story1 m-0">{{ $wedding->story }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="pricing-card-area section-padding30 section-bg text-center"
            data-background="{{ asset('wed/assets/img/gallery/section_bg1.png') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-tittle mb-70">
                            <h2>Wedding Info</h2>
                            <img src="{{ asset('wed/assets/img/gallery/tittle_img.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-50">
                    <div class="col-lg-8">
                        <h3>
                            {{ optional($wedding)->bride_name }} &
                            {{ optional($wedding)->groom_name }}
                        </h3>

                        <p class="mb-1">
                            Putri dari {{ optional($wedding)->bride_parent }}
                        </p>

                        <p>
                            Putra dari {{ optional($wedding)->groom_parent }}
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="single-card active text-center mb-30 mx-auto">
                            <div class="card-bottom">
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}
                                    </li>

                                    <li>
                                        <i class="far fa-clock"></i>
                                        {{ optional($wedding)->time }}
                                    </li>

                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ optional($wedding)->location }}
                                    </li>
                                </ul>
                            </div>

                            <div class="card-buttons mt-30">
                                <a href="#location" class="btn card-btn1">
                                    view location
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        @php
            $gallery = json_decode(optional($wedding)->kolom2 ?? '[]', true);
        @endphp

        <div class="gallery-area section-padding4" id="gallery">
            <div class="container">
                <div class="row">

                    @forelse ($gallery as $index => $img)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img"
                                    style="background-image: url('{{ asset('images/' . $img) }}');">
                                </div>

                                <div class="thumb-content-box">
                                    <div class="thumb-content">
                                        <h3>Image {{ $index + 1 }}</h3>
                                        <a href="{{ asset('images/' . $img) }}" class="menorie-icon">
                                            <i class="ti-plus"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>Tidak ada foto tersedia</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
        <!--? Gift Start -->
        <section class="gift-area gift-padding fix" id="gift"
            data-background="{{ asset('wed/assets/img/gallery/section_bg3.png') }}">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="section-tittle mb-70">
                        <h2>The Best Gift From You</h2>
                    </div>
                </div>

                <div class="row align-items-center">

                    <!-- LEFT : BANK -->
                    <div class="col-lg-6 col-md-12 mb-40">
                        <div class="gift-caption">

                            <h4 class="mb-30">Transfer Bank</h4>

                            @if ($wedding->banks->count())
                                @foreach ($wedding->banks as $bank)
                                    @php
                                        $master = \App\Models\MasterBank::where('name', $bank->bank_name)->first();
                                        $logo = optional($master)->logo;
                                    @endphp

                                    <div class="d-flex align-items-center mb-3 p-3 bg-white rounded shadow-sm">

                                        {{-- Logo Bank --}}
                                        @if ($logo)
                                            <img src="{{ asset('images/' . $logo) }}"
                                                style="width:60px; margin-right:15px;">
                                        @endif

                                        {{-- Info Rekening --}}
                                        <div class="flex-grow-1">
                                            <strong>{{ $bank->bank_name }}</strong><br>
                                            {{ $bank->account_number }}<br>
                                            a.n {{ $bank->account_holder }}
                                        </div>

                                        {{-- Copy Button --}}
                                        <button class="btn btn-sm btn-dark"
                                            onclick="copyText('{{ $bank->account_number }}')">
                                            Copy
                                        </button>

                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada rekening tersedia</p>
                            @endif

                        </div>
                    </div>


                    <!-- RIGHT : QRIS -->
                    <div class="col-lg-6 col-md-12 text-center">

                        <h4 class="mb-30">Scan QRIS To Give Gifts</h4>

                        @if (!empty($wedding->kolom1))
                            <img src="{{ cloudinary()->getUrl($wedding->kolom1) }}" class="img-fluid rounded shadow"
                                style="max-width:300px;">
                        @endif

                    </div>

                </div>
            </div>
        </section>
        <!-- Gift End -->
        <!--? Contact form Start -->
        <div class="contact-form section-padding30 fix" id="book">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="form-wrapper">
                            <form id="contact-form" action="{{ route('rsvp.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="wedding_slug"
                                    value="{{ optional($wedding)->slug ?? '' }}">
                                <div class="row ">
                                    <div class="col-lg-12">
                                        <div class="section-tittle tittle-form text-center mb-30">
                                            <h2>Are you attending?</h2>
                                            <img src="{{ asset('wed/assets/img/gallery/tittle_img2.png') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
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
                                            <button class="btn" type="submit">Confirm now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact form End -->
        <section class="brand-area section-padding-b">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-tittle text-center mb-50">
                            <h2>Guest Message</h2>
                            <img src="{{ asset('wed/assets/img/gallery/tittle_img.png') }}" alt="">
                        </div>

                        <!-- Scrollable Message Box -->
                        <div class="message-box p-4 bg-white rounded shadow-sm">

                            @forelse ($messages as $msg)
                                <div class="single-message mb-3 pb-3 border-bottom">
                                    <strong>{{ $msg->kolom1 }}</strong>
                                    <p class="mb-0">{{ $msg->message }}</p>
                                </div>
                            @empty
                                <p class="text-center">Belum ada pesan</p>
                            @endforelse

                        </div>

                    </div>
                </div>

            </div>
        </section>
        <section class="contact-sections" id="location">
            <div class="d-area">
                <iframe src="{{ $wedding->maps_link }}" width="100%" height="350" style="border:0;"
                    allowfullscreen loading="lazy">
                </iframe>
            </div>
        </section>
        <!--? End map Area -->
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-main" data-background="{{ asset('wed/assets/img/gallery/section_bg4.png') }}">
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p>
                                        Copyright &copy;
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved<i class="fa fa-heart"
                                            aria-hidden="true"></i> by <a href="www.weddingapp.my.id"
                                            target="_blank">Wedding Digital</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <script src="{{ asset('wed/./assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('wed/./assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('wed/./assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('wed/./assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('wed/./assets/js/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('wed/./assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('wed/./assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/jquery.sticky.js') }}"></script>

    <!-- counter , waypoint -->
    <script src="{{ asset('wed/./assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/waypoints.min.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('wed/./assets/js/contact.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('wed/./assets/js/plugins.js') }}"></script>
    <script src="{{ asset('wed/./assets/js/main.js') }}"></script>

    <script>
        function toggleMusic() {
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
    </script>

</body>

</html>
