import 'bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap; 
// import * as Popper from '@popperjs/core';
// window.Popper = Popper;
import setupWilayahDropdown from '../components/region-dropdown';

document.addEventListener('DOMContentLoaded', () => {
    setupWilayahDropdown();
}); 


(function ($) {
    "use strict";

    // let options = {
    //     html: true,
    //     title: "",
    //     content: $('[data-name="popover-content"]')

    // }
    // const popoverList = document.getElementById('popoverList');
    // const execPopover = new bootstrap.Popover(popoverList, options);

    // //hide modal for open popover
    // $('body').on('shown.bs.modal', function () {
    //     execPopover.hide();
    // });


    $("#sidebar li").click(function () {
        console.log("clicked");
        $(this).addClass('active').siblings().removeClass('active');
    })

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
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.nav-bar').addClass('sticky-top');
        } else {
            $('.nav-bar').removeClass('sticky-top');
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
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

    $('.sidebar-toggle').on('click', function () {
        $('.sidebar').toggleClass('active');
        $('.main-content').toggleClass('full');
    })
  


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
 
    loadMore($(".user-pool"), 3);
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
    

    //  CHART CONTROL                                                         
    const ctx = document.getElementById('myChart');
        new Chart(ctx, {
        type: 'line',
        data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 3,
            backgroundColor: '#9BD0F5',
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
        });
    
    
})(jQuery);


