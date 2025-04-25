import 'bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap; 
import setupWilayahDropdown from '../components/region-dropdown';

document.addEventListener('DOMContentLoaded', () => {
    setupWilayahDropdown();
}); 




(function ($) {
    "use strict";
    // Spinner
    function spinner() {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    }
    spinner();
    
    

    // Sticky Navbar
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 45) {
            $('.nav-bar').addClass('sticky-top');
        } else {
            $('.nav-bar').removeClass('sticky-top');
        }
    });
    
    
    // Back to top button
    $(window).on('scroll',function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').on('click',function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1500, 'easeInOutExpo');
        return false;
    });


    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        nav : true,
        navText : [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ]
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 24,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            992:{
                items:2
            }
        }
    });

    // Property carousel
    $(".property-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 24,
        dots: false,
        loop: true,
        nav : true,
        navText : [
             '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768: {
                items :2  
            },
            992:{
                items:3
            }
        }
    });


     // Region filter carousel
     $(".region-filter-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 24,
        dots: false,
        loop: true,
        nav : true,
        navText : [
             '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        responsive: {
            0:{
                items:2
            },
            768: {
                items :3  
            },
            992:{
                items:5
            }
        }
     });
    
    //  responsive-tab-carousel
    $(".responsive-tab-carousel").owlCarousel({
        autoplay: false,
        margin: 24,
        dots: false,
        loop: false,
        nav : true,
        navText : [
             '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        items: 1

    });
    
    
    $('.award-carousel').owlCarousel({
        margin: 10,
        nav: true,
        navText : [
        '<i class="fas fa-chevron-left"></i>',
        '<i class="fas fa-chevron-right"></i>'
        ],
        dots: false,
        responsive: {
            0:{
                items:1
            },
            768: {
                items :2  
            },
            992:{
                items:4
            }
        },
        loop: false
    });

    // load more property
    //  Before modification (for only 1 style)
    
    // $(".property-card").slice(0, 6).show();  
    // $("#loadMore").on("click", function(e){  
    //   e.preventDefault();  
    //   $(".property-card:hidden").slice(0, 6).slideDown();  
    //   if ($(".property-card:hidden").length == 0) {  
    //       $("#loadMore").text("Memuat Lebih Banyak"); 
    //   }  
    // });  
    
    // load more property (dont forget to hid all col first :D)
    // loadmore([the element] , [the size of viewed and loaded elements])
    function loadMore(element, size) {
        element.slice(0, size).show();
        $("#loadMore").on("click", function (e) {
            let finalElm = 0;
            let filteredElm = element.filter(":hidden"); 
            e.preventDefault();  
            filteredElm.slice(0, size).slideDown();  
            if (filteredElm.length == 0) {
                $("#loadMore").text("Memuat Lebih Banyak"); 
            }
        }); 
    }
    // calling loadmore function
    loadMore($(".property-card"), 6);
    loadMore($(".user-pool"), 4);
    loadMore($(".cari-agen-card"), 3);
    loadMore($(".property-by-agent"), 3);

    //PRICE COMMAS SEPARATOR
    $('.price-control').keyup(function(e) {
        let parts = $(this).val().split(".");
        let v = parts[0].replace(/\D/g, ""),
        dec = parts[1]
        let calc_num = Number((dec !== undefined ? v + "." + dec : v));
        // use this for numeric calculations
        // console.log('number for calculations: ', calc_num);
        let n = new Intl.NumberFormat('en-EN').format(v);
        n = dec !== undefined ? n + "." + dec : n;
        $(this).val(n);
     
    })
  
   
})(jQuery);


