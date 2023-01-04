const mix = require('laravel-mix');
const WebpackRTLPlugin = require('webpack-rtl-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/frontend/app.scss', 'public/css/frontend.css')
    .sass('resources/assets/sass/backend/app.scss', 'public/css/backend.css')
    .styles([
        'public/css/plugin/datatables/jquery.dataTables.min.css',
        'public/css/backend/plugin/datatables/dataTables.bootstrap.min.css',
        'public/css/plugin/datatables/buttons.dataTables.min.css',
        'public/js/select2/select2.css',
        'public/css/bootstrap.min.css',
        'public/css/custom-style.css',
        'public/css/loader.css',
        'public/css/bootstrap-datetimepicker.min.css',
        'client/build/client-modules.min.css',
    ], 'public/css/backend-custom.css')
    
    .js([
        'resources/assets/js/vue-app.js'
    ], 'public/js/vueApp.js')
    .js([
        'resources/assets/js/frontend/app.js',
        'resources/assets/js/plugin/sweetalert/sweetalert.min.js',
        'resources/assets/js/plugins.js',
        'client/build/client-modules.min.js',
    ], 'public/js/frontend.js')
    .js([
        'resources/assets/js/backend/app.js',
        'resources/assets/js/plugin/sweetalert/sweetalert.min.js',
        'resources/assets/js/plugins.js'
    ], 'public/js/backend.js')

    // .extract(['vue'])
    //Copying all directories of tinymce to public folder
    .copyDirectory('node_modules/tinymce/plugins', 'public/js/plugins')
    .copyDirectory('node_modules/tinymce/icons', 'public/js/icons')
    .copyDirectory('node_modules/tinymce/skins', 'public/js/skins')
    .copyDirectory('node_modules/tinymce/themes', 'public/js/themes')
    .scripts([
        "node_modules/moment/moment.js",
        "node_modules/select2/dist/js/select2.full.js",
        "public/js/bootstrap-datetimepicker.min.js",
        "public/js/backend/custom-file-input.js",
        "public/js/backend/notification.js",
        "public/js/backend/admin.js"

    ], 'public/js/backend-custom.js')
    //Datatable js
    .scripts([
        'node_modules/datatables.net/js/jquery.dataTables.js',
        'public/js/plugin/datatables/dataTables.bootstrap.min.js',
        'node_modules/datatables.net-buttons/js/dataTables.buttons.js',
        'node_modules/datatables.net-buttons/js/buttons.flash.js',
        'public/js/plugin/datatables/jszip.min.js',
        'public/js/plugin/datatables/pdfmake.min.js',
        'public/js/plugin/datatables/vfs_fonts.js',
        'node_modules/datatables.net-buttons/js/buttons.html5.js',
        'node_modules/datatables.net-buttons/js/buttons.print.js',
    ], 'public/js/dataTable.js')
    .webpackConfig({
        plugins: [
            new WebpackRTLPlugin('/css/[name].rtl.css')
        ]
    })
    .copy('resources/sass/theme/css/style.min.css','public/css/theme')
    .copy('resources/sass/theme/css/common.css','public/css/theme')
    .sass('resources/sass/theme/scss/chat.scss', 'public/css/theme')
    //Theme JS
    .copy('resources/js/theme/library/jquery.js','public/js/theme/library')
    .copy('resources/js/theme/library/jquery-ui.js','public/js/theme/library')
    .copy('resources/js/theme/library/bootstrap.js','public/js/theme/library')
    .copy('resources/js/theme/library/jquery.sticky.js','public/js/theme/library')
    .copy('resources/js/theme/library/jquery.jcarousel.js','public/js/theme/library')
    .copy('resources/js/theme/library/jcarousel.connected-carousels.js','public/js/theme/library')
    .copy('resources/js/theme/library/owl.carousel.js','public/js/theme/library')
    .copy('resources/js/theme/library/progressbar.js','public/js/theme/library')
    .copy('resources/js/theme/library/jquery.bracket.min.js','public/js/theme/library')
    .copy('resources/js/theme/library/chartist.js','public/js/theme/library')
    .copy('resources/js/theme/library/Chart.js','public/js/theme/library')
    .copy('resources/js/theme/library/fancySelect.js','public/js/theme/library')
    .copy('resources/js/theme/library/isotope.pkgd.js','public/js/theme/library')
    .copy('resources/js/theme/library/imagesloaded.pkgd.js','public/js/theme/library')

    .copy('resources/js/theme/jquery.team-coundown.js','public/js/theme')
    .copy('resources/js/theme/matches-slider.js','public/js/theme')
    .copy('resources/js/theme/header.js','public/js/theme')
    .copy('resources/js/theme/matches_broadcast_listing.js','public/js/theme')
    .copy('resources/js/theme/news-line.js','public/js/theme')
    .copy('resources/js/theme/match_galery.js','public/js/theme')
    .copy('resources/js/theme/main-club-gallery.js','public/js/theme')
    .copy('resources/js/theme/product-slider.js','public/js/theme')
    .copy('resources/js/theme/circle-bar.js','public/js/theme')
    .copy('resources/js/theme/standings.js','public/js/theme')
    .copy('resources/js/theme/shop-price-filter.js','public/js/theme')
    .copy('resources/js/theme/timeseries.js','public/js/theme')
    .copy('resources/js/theme/radar.js','public/js/theme')
    .copy('resources/js/theme/slider.js','public/js/theme')
    .copy('resources/js/theme/preloader.js','public/js/theme')
    .copy('resources/js/theme/diagram.js','public/js/theme')
    .copy('resources/js/theme/bi-polar-diagram.js','public/js/theme')
    .copy('resources/js/theme/label-placement-diagram.js','public/js/theme')
    .copy('resources/js/theme/donut-chart.js','public/js/theme')
    .copy('resources/js/theme/animate-donut.js','public/js/theme')
    .copy('resources/js/theme/advanced-smil.js','public/js/theme')
    .copy('resources/js/theme/svg-path.js','public/js/theme')
    .copy('resources/js/theme/pick-circle.js','public/js/theme')
    .copy('resources/js/theme/horizontal-bar.js','public/js/theme')
    .copy('resources/js/theme/gauge-chart.js','public/js/theme')
    .copy('resources/js/theme/stacked-bar.js','public/js/theme')

    .copy('resources/js/theme/library/chartist-plugin-legend.js','public/js/theme/library')
    .copy('resources/js/theme/library/chartist-plugin-threshold.js','public/js/theme/library')
    .copy('resources/js/theme/library/chartist-plugin-pointlabels.js','public/js/theme/library')

    .copy('resources/js/theme/treshold.js','public/js/theme')
    .copy('resources/js/theme/visible.js','public/js/theme')
    .copy('resources/js/theme/anchor.js','public/js/theme')
    .copy('resources/js/theme/landing_carousel.js','public/js/theme')
    .copy('resources/js/theme/landing_sport_standings.js','public/js/theme')
    .copy('resources/js/theme/twitterslider.js','public/js/theme')
    .copy('resources/js/theme/champions.js','public/js/theme')
    .copy('resources/js/theme/landing_mainnews_slider.js','public/js/theme')
    .copy('resources/js/theme/carousel.js','public/js/theme')
    .copy('resources/js/theme/video_slider.js','public/js/theme')
    .copy('resources/js/theme/footer_slides.js','public/js/theme')
    .copy('resources/js/theme/player_test.js','public/js/theme')

    .copy('resources/js/theme/main.js','public/js/theme')
    .version();