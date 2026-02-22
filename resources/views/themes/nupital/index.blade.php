<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $wedding->bride_name }} & {{ $wedding->groom_name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="/images/favicon1.png">

    <link href="https://fonts.googleapis.com/css?family=Montez" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('nupital/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('nupital/css/icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('nupital/css/bootstrap.css') }}">
    <!-- Superfish -->
    <link rel="stylesheet" href="{{ asset('nupital/css/superfish.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('nupital/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('nupital/css/style.css') }}">

    <script src="{{ asset('nupital/js/modernizr-2.6.2.min.js') }}"></script>

</head>

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
    background: #ff4d6d;
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

    @php
        $gallery = json_decode(optional($wedding)->kolom2 ?? '[]');
        $cover = $gallery[0] ?? null;
    @endphp
    <div id="fh5co-wrapper">
        <div id="fh5co-page">
            <div class="fh5co-hero" data-section="home">
                <div class="fh5co-cover text-center" data-stellar-background-ratio="0.5"
                    style="background-image: url('{{ asset('images/' . $cover) }}');">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="container">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="animate-box">
                                        <h1>The Wedding</h1>

                                        <h2>
                                            {{ optional($wedding)->bride_name }}
                                            &
                                            {{ optional($wedding)->groom_name }}
                                        </h2>

                                        <p>
                                            <span>
                                                {{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}
                                            </span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <header id="fh5co-header-section" class="sticky-banner">
                <div class="container">
                    <div class="nav-header">
                        <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
                        <h1 id="fh5co-logo"><a href="#">{{ $wedding->bride_name }} &
                                {{ $wedding->groom_name }}</a>
                        </h1>
                        <!-- START #fh5co-menu-wrap -->
                        <nav id="fh5co-menu-wrap" role="navigation">
                            <ul class="sf-menu" id="fh5co-primary-menu">
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#fh5co-gallery">Gallery</a></li>
                                <li><a href="#fh5co-countdown">Gift</a></li>
                                <li><a href="#fh5co-maps">Location</a></li>
                                <li><a href="#fh5co-started">Guest</a></li>
                                <li><a href="#footer">Story</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- end:header-top -->

            <div id="fh5co-couple" class="fh5co-section-gray">
                <div class="container">

                    <div class="row row-bottom-padded-md animate-box">
                        <div class="col-md-6 col-md-offset-3 text-center">

                            <div class="col-md-5 col-sm-5 col-xs-5 nopadding">
                                <h3>{{ optional($wedding)->bride_name }}</h3>
                                <p>Putri dari {{ optional($wedding)->bride_parent }}</p>
                            </div>

                            <div class="col-md-2 col-sm-2 col-xs-2 nopadding">
                                <h2 class="amp-center"><i class="icon-heart"></i></h2>
                            </div>

                            <div class="col-md-5 col-sm-5 col-xs-5 nopadding">
                                <h3>Putri dari{{ optional($wedding)->groom_name }}</h3>
                                <p>Putra dari {{ optional($wedding)->groom_parent }}</p>
                            </div>

                        </div>
                    </div>

                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="col-md-12 text-center heading-section">

                                <h2>Are Getting Married</h2>

                                <p>
                                    <strong>
                                        {{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}
                                        —
                                        {{ optional($wedding)->location }}
                                    </strong>
                                </p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            @php
                $gallery = json_decode(optional($wedding)->kolom2 ?? '[]');
            @endphp

            <div id="fh5co-gallery" style="background-image:url(images/cover_bg_2.jpg);"
                data-stellar-background-ratio="0.5">
                <div class="container">

                    <div class="row text-center animate-box">
                        <div class="col-md-12 heading-section">
                            <h2>Gallery</h2>
                        </div>
                    </div>

                    <div class="row">

                        @foreach ($gallery as $img)
                            <div class="col-md-4 col-sm-6 animate-box" style="margin-bottom:25px;">
                                <a href="{{ asset('images/' . $img) }}" class="image-popup">
                                    <img src="{{ asset('images/' . $img) }}" class="img-responsive"
                                        style="border-radius:15px; box-shadow:0 10px 20px rgba(0,0,0,0.15);">
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>



            <div id="fh5co-countdown" class="fh5co-section-gray">
                <div class="container">

                    <div class="row text-center animate-box">
                        <div class="col-md-12 heading-section">
                            <h1>
                                Gift Wedding
                            </h1>
                        </div>
                    </div>

                    <div class="row animate-box">

                        {{-- QRIS kiri --}}
                        @if (optional($wedding)->kolom1)
                            <div class="col-md-4 text-center">
                                <h4>Scan QRIS</h4>

                                <img src="{{ asset('images/' . $wedding->kolom1) }}"
                                    class="img-responsive center-block" style="max-width:220px;">
                                <h4>Scan QRIS To Give Gifts</h4>
                            </div>
                        @endif


                        {{-- BANK kanan --}}
                        <div class="col-md-8">

                            @if ($wedding->banks->count())
                                @foreach ($wedding->banks as $bank)
                                    @php
                                        $master = \App\Models\MasterBank::where('name', $bank->bank_name)->first();
                                        $logo = optional($master)->logo;
                                    @endphp

                                    <div
                                        style="
background:white;
border:1px solid #374151;
border-radius:16px;
padding:20px;
margin-bottom:20px;
display:flex;
align-items:center;
gap:16px;
box-shadow:0 10px 20px rgba(0,0,0,0.2);
color:white;
">

                                        {{-- Logo kiri --}}
                                        @if ($logo)
                                            <img src="{{ asset('images/' . $logo) }}"
                                                style="width:50px;height:50px;object-fit:contain;background:white;padding:5px;border-radius:8px;">
                                        @endif

                                        {{-- Info kanan --}}
                                        <div style="flex:1;text-align:left;">

                                            <p style="font-weight:600;color:gray;margin:0;">
                                                {{ $bank->bank_name }}
                                            </p>

                                            <p
                                                style="font-size:20px;letter-spacing:2px;font-family:monospace;margin:5px 0;">
                                                {{ $bank->account_number }}
                                            </p>

                                            <p style="font-size:13px;color:#9ca3af;margin:0;">
                                                a.n {{ $bank->account_holder }}
                                            </p>

                                        </div>

                                        <button onclick="copyText('{{ $bank->account_number }}')"
                                            class="btn btn-primary btn-sm">
                                            Copy
                                        </button>

                                    </div>
                                @endforeach
                            @endif

                        </div>

                    </div>
                </div>
            </div>

            <div id="fh5co-maps">
                <div class="container">

                    <div class="row text-center animate-box">
                        <div class="col-md-12 heading-section">
                        </div>
                    </div>

                    <div class="row animate-box">
                        <div class="col-md-12">

                            <div
                                style="
border-radius:20px;
overflow:hidden;
box-shadow:0 10px 25px rgba(0,0,0,0.15);
">

                                <iframe src="{{ $wedding->maps_link }}" width="100%" height="350"
                                    style="border:0;" allowfullscreen loading="lazy">
                                </iframe>

                            </div>

                        </div>
                    </div>

                </div>
            </div>


            <div id="fh5co-started" style="background-image:url(images/cover_bg_2.jpg);"
                data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center heading-section">
                            <h2>Are You Attending?</h2>
                            <p>Please Fill-up the form to notify you that you're attending. Thanks.
                        </div>
                    </div>
                    <div class="row animate-box">
                        <div class="col-md-10 col-md-offset-1">
                            <form class="form-inline" action="{{ route('rsvp.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="wedding_slug"
                                    value="{{ optional($wedding)->slug ?? '' }}">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="name" class="sr-only">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="email" class="sr-only">Number Of Guest</label>
                                        <input type="number" class="form-control" name="total_guest"
                                            placeholder="Number Of Guest">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">

                                        <div style="margin-top:8px; color:#333;">
                                            <label style="margin-right:15px; cursor:pointer;">
                                                <input type="radio" name="attendance" value="hadir">
                                                Present
                                            </label>

                                            <label style="cursor:pointer;">
                                                <input type="radio" name="attendance" value="tidak_hadir">
                                                Not Present
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="email" class="sr-only">Message</label>
                                        <textarea name="message" class="form-control" id="" cols="10" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <button type="submit" class="btn btn-primary btn-block">I am Attending</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row animate-box" style="margin-top:40px;">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row text-center animate-box">
                        <div class="col-md-12 heading-section">
                            <h1>
                                Guest Message
                            </h1>
                        </div>
                    </div>

                    {{-- Scroll container --}}
                    <div
                        style="
            max-height: 350px;
            overflow-y: auto;
            padding-right: 5px;
        ">

                        @foreach ($messages as $msg)
                            <div
                                style="
                    background:white;
                    padding:15px;
                    border-radius:10px;
                    margin-bottom:15px;
                    box-shadow:0 5px 15px rgba(0,0,0,0.08);
                ">
                                <strong>{{ $msg->kolom1 }}</strong>
                                <p style="margin:5px 0 0;">{{ $msg->message }}</p>
                            </div>
                        @endforeach

                    </div>
                    <div class="row text-center animate-box">
                        <div class="col-md-12 heading-section">
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <div id="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>
                                    Our Story
                                </h2>
                                <p>
                                    @if (optional($wedding)->story)
                                        {{ $wedding->story }}
                                    @else
                                        Our love story begins…
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>



        </div>
        <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
    <!-- jQuery -->
    <script src="{{ asset('nupital/dist/scripts.min.js') }}"></script>
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
