<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Metro Tech</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Montserrat%7COpen+Sans:700,400%7CRaleway:400,800,900" rel="stylesheet"/>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="{{asset('css/theme/style.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/theme/common.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/theme/chat.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/classes.css')}}" rel="stylesheet" type="text/css"/>
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src= "https://player.twitch.tv/js/embed/v1.js"></script>
</head>

<body>

<div class="preloader-wrapper" id="preloader">
    <div class="motion-line dark-big"></div>
    <div class="motion-line yellow-big"></div>
    <div class="motion-line dark-small"></div>
    <div class="motion-line yellow-normal"></div>
    <div class="motion-line yellow-small1"></div>
    <div class="motion-line yellow-small2"></div>
</div>


<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-7 hidden-sm hidden-xs">
                <div class="top-contacts">
                    <ul class="socials">
                        <li><a href="https://www.instagram.com/metroesportsus"><i class="fa fa-instagram"
                                                                                  aria-hidden="true"></i></a></li>
                        <li><a href="https://twitter.com/MetroEsportsUS"><i class="fa fa-twitter"
                                                                            aria-hidden="true"></i></a></li>
                        <li><a href="https://www.facebook.com/MetroEsportsUS"><i class="fa fa-facebook"
                                                                                 aria-hidden="true"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/metroesportsus"><i class="fa fa-linkedin"
                                                                                         aria-hidden="true"></i></a>
                        </li>
                        <li><a href="https://www.youtube.com/channel/UCgsH6QhUGLFmhX_EBjwY5CQ"><i
                                    class="fa fa-youtube"></i></a></li>
                        <li><a href="https://www.twitch.tv/metroesportslive"><i class="fa fa-twitch"
                                                                                aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="contacts">
                        <li class="phone"><i class="fa fa-phone-square" aria-hidden="true"></i>215 690 5370</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <div class="top-language">
                    <ul class="list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                                    src="{{asset('assets/images/common/en-flag.png')}}" alt="selected language">EN</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#"><img src="{{asset('assets/images/common/fr-flag.png')}}" alt="language">FR</a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{asset('assets/images/common/en-flag.png')}}" alt="language">EN</a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{asset('assets/images/common/ru-flag.png')}}" alt="language">RU</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="top-search">
                    <form>
                        <input type="text" name="text">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

@yield('content')

<div class="chat-icon" onclick="window.location.href = './chat'">
    <i class="fa fa-comment"></i>
</div>

<script type="text/javascript" src="{{asset('js/theme/library/jquery.js')}}"></script>
<script>
    window.$ = window.jQuery = jQuery;
    jQuery = window.$;
    var assetUrl = '{{asset('assets')}}';
</script>
<script type="text/javascript" src="{{asset('js/theme/library/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/jquery.sticky.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/jquery.jcarousel.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/jcarousel.connected-carousels.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/progressbar.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/jquery.bracket.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/chartist.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/Chart.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/fancySelect.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/isotope.pkgd.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/imagesloaded.pkgd.js')}}"></script>

<script type="text/javascript" src="{{asset('js/theme/jquery.team-coundown.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/matches-slider.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/header.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/matches_broadcast_listing.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/news-line.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/match_galery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/main-club-gallery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/product-slider.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/circle-bar.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/standings.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/shop-price-filter.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/timeseries.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/radar.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/slider.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/preloader.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/diagram.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/bi-polar-diagram.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/label-placement-diagram.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/donut-chart.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/animate-donut.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/advanced-smil.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/svg-path.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/pick-circle.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/horizontal-bar.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/gauge-chart.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/stacked-bar.js')}}"></script>

<script type="text/javascript" src="{{asset('js/theme/library/chartist-plugin-legend.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/chartist-plugin-threshold.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/library/chartist-plugin-pointlabels.js')}}"></script>

<script type="text/javascript" src="{{asset('js/theme/treshold.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/visible.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/anchor.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/landing_carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/landing_sport_standings.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/twitterslider.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/champions.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/landing_mainnews_slider.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/video_slider.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/footer_slides.js')}}"></script>
<script type="text/javascript" src="{{asset('js/theme/player_test.js')}}"></script>

<script type="text/javascript" src="{{asset('js/theme/main.js')}}"></script>

</body>

</html>
