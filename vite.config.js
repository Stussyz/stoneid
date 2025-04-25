import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                /*------------- Library --------------*/
                // 'resources/libs/wow/wow.min.js',
                'resources/libs/owlcarousel/assets/owl.carousel.min.css',
                'resources/libs/animate/animate.min.css',
                'resources/libs/easing/easing.min.js',
                'resources/libs/waypoints/waypoints.min.js',
                'resources/libs/owlcarousel/owl.carousel.min.js',
                'resources/css/bootstrap.min.css',
                'resources/libs/chartJS/chartjs.min.js',


                /*------------- stone assets --------------*/

                // css
                'resources/css/stone/style.css',
                'resources/css/app.css',
                'resources/sass/app.scss',
                'resources/css/stone/property-enhancer',
                'resources/cs/stone/user-profile-enhancer.css',

                //js
                'resources/js/stone/image-carousel-gallery.js',
                'resources/js/stone/main.js',
                'resources/js/stone/navTabSlide.js',
                
                // 'resources/js/app.js'
            
                /*------------- dashboard assets --------------*/
                'resources/css/dashboard/dashboard.css',
                'resources/js/dashboard/dashboard.js',
                'resources/js/dashboard/chart_config.js',
            
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
