<!DOCTYPE html>
<html lang="en">
   <head>
      <title>EventApp</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('Frontend/css/fontawesome.css') }}">
      <link rel="stylesheet" href="{{ asset('Frontend/css/fontawesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('Frontend/css/all.css') }}">
      <link rel="stylesheet" href="{{ asset('Frontend/css/slick.css') }}">
      <link rel="stylesheet" href="{{ asset('Frontend/css/slick-theme.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('Frontend/css/style.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('Frontend/css/animate.css') }}">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
         <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
        

      </head>
   <body>
        @include('layouts.frontendLayout.header')

        @yield('content')

        @include('layouts.frontendLayout.footer')

      <script src="{{ asset('Frontend/js/jquery.min.js') }}"></script>
      <script src="{{ asset('Frontend/js/popper.min.js') }}"></script>
      <script src="{{ asset('Frontend/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('Frontend/js/fontawsome.js') }}"></script>
      <script src="{{ asset('Frontend/js/script.js') }}"></script>
      <script src="{{ asset('Frontend/js/wow.js') }}"></script>
      <script src="{{ asset('Frontend/js/slick.js') }}"></script>

      <script>
            $(window).scroll(function() {    
            var scroll = $(window).scrollTop();
            //>=, not <=
            if (scroll >= 30) {
                $("div#main-navigation").addClass("sticky-header");
            }else{
            $("div#main-navigation").removeClass("sticky-header");
            }
        });
      </script>

      <script>
        $(".gallery-tab-design .center").slick({
            dots: true,
            infinite: true,
            centerMode: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                                {
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                                },
                                {
                                breakpoint: 767,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                                }
                            ]
        });
      </script>
      
      <script>
         $(".feedback-section-slider .center").slick({
           dots: true,
           infinite: true,
           centerMode: true,
           slidesToShow: 2,
           slidesToScroll: 1,
           responsive: [
                            {
                              breakpoint: 1200,
                              settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                              }
                            },
                            {
                              breakpoint: 991,
                              settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                              }
                            }
                          ]
         });
      </script>


    </body>
</html>