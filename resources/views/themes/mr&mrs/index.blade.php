<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>{{ $wedding->bride_name }} & {{ $wedding->groom_name }}</title>
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
                        <a href="#" class="navbar-brand">
                            <h4 class="text-primary display-6 fw-bold mb-0">{{ $wedding->bride_name }}<strong class="text-secondary">&</strong>{{ $wedding->groom_name }}</h4>
                        </a>
                        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="fa fa-bars text-primary"></span>
                        </button>
                        <div class="collapse navbar-collapse py-3" id="navbarCollapse">
                            <div class="navbar-nav mx-auto border-top">
                                <a href="#" class="nav-item nav-link active">Home</a>
                                <a href="#weddingStory" class="nav-item nav-link">Story</a>
                                <a href="#weddingGift" class="nav-item nav-link">W Gift</a>
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
      @php
    $gallery = json_decode(optional($wedding)->kolom2 ?? '[]');
    @endphp

    <div class="container-fluid carousel-header px-0">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">

    {{-- Indicators --}}
    <ol class="carousel-indicators">
    @foreach($gallery as $i => $img)
    <li data-bs-target="#carouselId"
        data-bs-slide-to="{{ $i }}"
        class="{{ $i == 0 ? 'active' : '' }}">
    </li>
    @endforeach
    </ol>

    {{-- Slides --}}
    <div class="carousel-inner">

    @foreach($gallery as $i => $img)
    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">

    <img src="{{ asset('storage/'.$img) }}"
         class="d-block w-100"
         style="height: 100vh; object-fit: cover;"
         alt="Wedding Image">

    {{-- Caption tampil di semua slide --}}
    <div class="carousel-caption">
        <div class="p-3 mx-auto animated zoomIn" style="max-width: 900px;">

            <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-4"
                 style="border-style: double;">
                <h4 class="text-white text-uppercase fw-bold mb-0"
                    style="letter-spacing: 3px;">
                    WE ARE GETTING MARRIED
                </h4>
            </div>

            <h1 class="display-1 text-capitalize text-white mb-3">
                {{ $wedding->bride_name }}
                <i class="fa fa-heart text-primary"></i>
                {{ $wedding->groom_name }}
            </h1>

            <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-5"
                 style="border-style: double;">
                <h4 class="text-white text-uppercase fw-bold mb-0"
                    style="letter-spacing: 3px;">
                    {{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}
                </h4>
            </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <a class="btn btn-primary py-3 px-5" href="#weddingRsvp">
                            RSVP Now
                        </a>
                    </div>

                </div>
            </div>

        </div>
        @endforeach

        </div>

        {{-- Controls --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        </button>

        </div>
        </div>

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
                      @if(optional($wedding)->story)
                    <div class="row wow fadeInUp" data-wow-delay="0.2s">
                        <div class="col-md-12 border-start border-top border-secondary p-6 pe-2">
                            <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-6">
                                <p class="m-0 fs-5">{{ $wedding->story }}</p>
                            </div>
                        </div>
                        @endif
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
                        <h5 class="text-uppercase text-dark fw-bold mb-4">{{ optional($wedding)->bride_name ?? '' }} <i class="fa fa-heart text-primary"></i> {{ optional($wedding)->groom_name ?? '' }}  </h5>
                        <p class="text-dark fs-5">Putri Dari {{ optional($wedding)->bride_parent ?? '' }} & Putra Dari {{ optional($wedding)->groom_parent ?? '' }}  </p>
                        <p class="text-dark fs-5">{{ optional($wedding)->location ?? '' }}</p>
                        <div class="d-flex align-items-center justify-content-center mb-5">
                            <div class="text-dark fs-2 me-4">
                                <span>Pukul {{ optional($wedding)->time ? \Carbon\Carbon::parse($wedding->time)->format('H:i') : '' }} WIB</span>
                            </div>
                        </div>
                        <a class="btn btn-primary btn-primary-outline-0 py-3 px-5" href="#weddingRsvp">Book Your Attendance</a>
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
     <div class="container-fluid wedding-timeline bg-secondary position-relative overflow-hidden py-5" id="weddingGift">

    <div class="position-absolute" style="top: 50%; left: -100px; transform: translateY(-50%); opacity: 0.5;">
        <img src="{{ asset('mr&mrs/img/wedding-bg.png') }}" class="img-fluid" alt="">
    </div>

    <div class="position-absolute" style="top: 50%; right: -160px; transform: translateY(-50%) rotate(335deg); opacity: 0.5;">
        <img src="{{ asset('mr&mrs/img/wedding-bg.png') }}" class="img-fluid" alt="">
    </div>

    <div class="container py-5">

        <div class="text-center mb-5">
            <h1 class="display-4 text-white">Wedding Gift</h1>
        </div>

        <div class="row g-5 align-items-start">

        {{-- ================= QRIS ================= --}}
        @if(optional($wedding)->kolom1)
        <div class="col-lg-5 text-center wow fadeInUp" data-wow-delay="0.3s">

            <div class="bg-white p-4 rounded shadow">

                <img src="{{ asset('storage/'.$wedding->kolom1) }}"
                    class="img-fluid mb-3"
                    style="max-width: 260px;">

                <p class="text-dark mb-0">
                    Scan QRIS To Give Gifts
                </p>

            </div>

        </div>
        @endif


        {{-- ================= BANK ================= --}}
        @if($wedding->banks->count())
        <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">

            <div class="space-y-4">

            @foreach($wedding->banks as $bank)

            @php
                $master = \App\Models\MasterBank::where('name', $bank->bank_name)->first();
                $logo = optional($master)->logo;
            @endphp

            <div class="bg-white rounded shadow p-4 mb-4 d-flex align-items-center gap-3">

                {{-- Logo --}}
                @if($logo)
                <img src="{{ asset('storage/'.$logo) }}"
                    style="width: 55px; height: 55px; object-fit: contain;"
                    class="bg-light rounded p-1">
                @endif

                {{-- Info --}}
                <div class="flex-grow-1">

                    <h5 class="mb-1 text-dark">
                        {{ $bank->bank_name }}
                    </h5>

                    <div class="fw-bold fs-5 text-dark">
                        {{ $bank->account_number }}
                    </div>

                    <small class="text-muted">
                        a.n {{ $bank->account_holder }}
                    </small>

                </div>

                {{-- Copy --}}
                <button onclick="copyText('{{ $bank->account_number }}')"
                    class="btn btn-primary px-3">
                    Copy
                </button>

            </div>

            @endforeach

            </div>

        </div>
        @endif

        </div>

    </div>
    </div>

        <!-- Wedding Timeline End -->


        <!-- Gallery Start -->
       <div class="container-fluid gallery position-relative py-5" id="weddingGallery">

        <div class="position-absolute" style="top: -95px; right: 0;">
            <img src="{{ asset('mr&mrs/img/tamp-bg-1.png') }}" class="img-fluid" alt="">
        </div>

        <div class="position-absolute" style="top: -80px; left: 0; transform: rotate(150deg);">
            <img src="{{ asset('mr&mrs/img/tamp-bg-1.png') }}" class="img-fluid" alt="">
        </div>

        @php
        $gallery = json_decode(optional($wedding)->kolom2 ?? '[]');
        @endphp

        @if(!empty($gallery))

        <div class="container position-relative py-5">

            {{-- Title --}}
            <div class="text-center mx-auto pb-5 wow fadeInUp"
                data-wow-delay="0.1s"
                style="max-width: 800px;">
                <h1 class="display-2 text-dark">Wedding Gallery</h1>
            </div>

            {{-- Grid --}}
            <div class="row g-4">

            @foreach($gallery as $i => $img)

            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp"
                data-wow-delay="0.{{ $i + 2 }}s">

                <div class="gallery-item">

                    <div class="gallery-img">
                        <img class="img-fluid w-100"
                            src="{{ asset('storage/'.$img) }}"
                            alt="Wedding Photo">

                        <div class="hover-style"></div>

                        <div class="search-icon">
                            <a href="{{ asset('storage/'.$img) }}"
                            data-lightbox="wedding-gallery"
                            class="my-auto">
                            <i class="fas fa-plus btn-primary p-3"></i>
                            </a>
                        </div>
                    </div>

                    <div class="gallery-overlay bg-light border-secondary border-top-0 p-4"
                        style="border-style: double;">
                        <h5>Wedding Moment</h5>
                        <p class="text-dark mb-0">
                            {{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}
                        </p>
                    </div>

                </div>

            </div>

            @endforeach

            </div>
        </div>

        @endif

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
                                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                        <div class="form-group">
                                            <label for="Examplename" class="form-label text-dark">Number Of Guests</label>
                                            <input type="number" class="form-control py-3 border-0 bg-white text-dark" id="Examplename" placeholder="Number Of Guests" name="total_guest" required>
                                          </div>
                                    </div>
                                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                        <div class="form-group">
                                            <label for="exampleselect" class="form-label text-dark">Confirmation of Attendance</label>
                                            <select class="form-control bg-white text-dark py-3 border-0" name="attendance" id="exampleselect">
                                            <option value="hadir">Present</option>
                                            <option value="tidak_hadir">Not Present</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                        <div class="form-group">
                                            <label for="exampletextarea" class="form-label text-dark">Message</label>
                                            <textarea name="message" class="form-control border-0 bg-white text-dark py-3 border-0" id="exampletextarea" cols="30" rows="5" placeholder="Input Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center wow fadeIn" data-wow-delay="0.1s">
                                        <button class="btn btn-primary btn-primary-outline-0 py-3 px-5">Send RSVP</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                         <div class="p-5 border-secondary position-relative mt-2" style="border-style: double;">

                            <h2 class="text-3xl text-yellow-400 text-center mb-6">
                                Guest Messages
                            </h2>

                            <div class="space-y-4" style="max-height: 260px; overflow-y: auto;">

                                @forelse($messages as $msg)
                                <div class="glass rounded p-3">
                                    <p class="font-bold text-dark">{{ $msg->kolom1 }} | {{ $msg->message }}</p>
                                </div>
                                @empty
                                <p class="text-center opacity-60 text-dark">
                                    No Words Yet
                                </p>
                                @endforelse

                            </div>

                        </div>
                    </div>
                    <div class="mt-5">
                    <div class="row g-5 justify-content-center text-center">
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
            

       <!-- Back to top -->
<a href="#"
   class="btn btn-primary btn-md-square back-to-top"
   style="right: 20px; bottom: 20px; position: fixed; z-index: 999;">
   <i class="fa fa-arrow-up"></i>
</a>

<!-- Music button -->
<button onclick="playMusic()"
    class="btn btn-primary btn-md-square"
    style="right: 80px; bottom: 20px; position: fixed; z-index: 999;">
    🎵
</button>

<audio id="bgmusic" loop>
@if(optional($wedding)->music_url)
<source src="{{ asset('storage/'.$wedding->music_url) }}">
@endif
</audio>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('mr&mrs/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('mr&mrs/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('mr&mrs/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('mr&mrs/lib/lightbox/js/lightbox.min.js')}}"></script>
    

    <!-- Template Javascript -->
    <scri src="{{asset('mr&mrs/js/main.js')}}"></scri'pt>
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
    var music = document.getElementById('bgmusic');
    if(music.paused) music.play();
    else music.pause();
}
    </script>
    </body>

</html>