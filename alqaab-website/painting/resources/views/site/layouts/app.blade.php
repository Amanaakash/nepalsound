<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @if (isset($all_view['setting']->site_name))
            {{ $all_view['setting']->site_name }}
        @endif
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/site/css/custom.css') }}" />
    @yield('css')
</head>

<body>
    @include('site.includes.header')
    <!--<div class="fab-container">-->
    <!--    <div id="fab" class="fab icon-shown">+</div>-->
    <!--    <ul class="fab-options">-->
    <!--        <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>-->
    <!--        <li><a href="#"><i class="fab fa-facebook-messenger"></i></a></li>-->
    <!--        <li><a href="mailto:someone@example.com"><i class="fas fa-envelope"></i></a></li>-->
    <!--        <li><a href="tel:+1234567890"><i class="fas fa-phone"></i></a></li>-->
    <!--    </ul>-->
    <!--</div>-->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-chevron-up"></i></button>
    @yield('content')
    <!-- footer wp-page start -->
    @include('site.includes.footer')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script src="{{ asset('assets/site/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        
            document.addEventListener("DOMContentLoaded", function() {
                const searchToggleButtons = document.querySelectorAll('.search-toggle');
                const searchOverlay = document.getElementById('fullSearchBar');
                const closeSearch = document.querySelector('.close-search');

                searchToggleButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        searchOverlay.classList.remove('d-none');
                    });
                });

                closeSearch.addEventListener('click', () => {
                    searchOverlay.classList.add('d-none');
                });
            });
    </script>

    </script>
    @yield('js')
</body>

</html>
