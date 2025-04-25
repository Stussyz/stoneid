$(document).ready(function() {
    let currentIndex = 0;
    let initialIndex = 0;
    let owlGallery = $(".gallery-thumbnails");

    if (initialIndex < 1) {
        let initSrc = $(".init").attr("data-src");
        $("#current-image").attr("src", initSrc);
        initialIndex++;
    }

    // Initialize Owl Carousel
    owlGallery.owlCarousel({
        items: 5, /* Adjust number of thumbnails shown */
        margin: 10,
        nav: false,
        dots: false,
        loop: false
    });


    let images = $(".thumb-item").map(function() {
        return $(this).attr("data-src");
    }).get();

    // Thumbnail Click - Change Main Image
    $(".thumb-item").on('click',function() {
        let newSrc = $(this).attr("data-src");
        $("#current-image").attr("src", newSrc);
        currentIndex = images.indexOf(newSrc);
        owlGallery.trigger("to.owl.carousel", [currentIndex, 300]);
    });


    // Next & Prev Buttons linked to Owl Carousel
    $(".prev-gallery-btn").on('click',function() {
        if (currentIndex > 0) {
            currentIndex--;
            let newSrc = images[currentIndex];
            $("#current-image").attr("src", newSrc);
            owlGallery.trigger("prev.owl.carousel");
        }
    });

    $(".next-gallery-btn").on('click',function () {
        
        if (currentIndex < images.length - 1) {
            currentIndex++;
            let newSrc = images[currentIndex];
            $("#current-image").attr("src", newSrc);
            owlGallery.trigger("next.owl.carousel");
        }
    });

    

    // Fullscreen Mode in Gallery
    $("#current-image").on('click',function() {
        let imgSrc = $(this).attr("src");
        $(".fullscreen-image").attr("src", imgSrc);
        $(".fullscreen-overlay").removeClass("d-none");
        $("body").addClass("overflow-hidden");
    });


    // Close Fullscreen
    $(".close-fullscreen-btn, .fullscreen-overlay").on('click',function() {
        $(".fullscreen-overlay").addClass("d-none");
        $("body").removeClass("overflow-hidden");
    });

    // Prevent closing fullscreen when clicking the image
    $(".fullscreen-image").on('click',function(event) {
        event.stopPropagation();
    });

    // Zooming in Fullscreen Mode
    const container = document.querySelector('.fullscreen-overlay')
    const img = document.querySelector('.fullscreen-image')

    let zoom = 1
    container.addEventListener('wheel', e => {
        img.style.transformOrigin = `${e.offsetX}px ${e.offsetY}px`

        zoom += e.deltaY * -0.01
        zoom = Math.min(Math.max(1, zoom), 5)

        if (zoom == 1) {
            img.style.left = '0px'
            img.style.top = '0px'
        }

        img.style.transform = `scale(${zoom})`
    })




    // VIRTUAL TOUR FULLSCREEN
       //fullscreen when clicked
       $(".virtual-image").click(function() {
        $(".fullscreen-virtual-overlay").removeClass("d-none");
        $("body").addClass("overflow-hidden");
    });

    //prevent default close on fullscreen
     $(".fullscreen-virtual-image").click(function(event) {
        event.stopPropagation();
    });

        // Close Fullscreen virtual
    $(".close-fullscreen-virtual-btn, .fullscreen-virtual-overlay").click(function() {
        $(".fullscreen-virtual-overlay").addClass("d-none");
        $("body").removeClass("overflow-hidden");
    });
    
});