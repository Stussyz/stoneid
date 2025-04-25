import 'bootstrap';
import * as bootstrap from 'bootstrap';
import * as Popper from '@popperjs/core';
window.Popper = Popper;

(function ($) {
    let options = {
        html: true,
        title: "",
        content: $('[data-name="popover-content"]')

    }
    const popoverList = document.getElementById('popoverList');
    const execPopover = new bootstrap.Popover(popoverList, options);

    //hide modal for open popover
    $('body').on('shown.bs.modal', function () {
        execPopover.hide();
    });

})(jQuery);

    document.addEventListener("DOMContentLoaded", function () {
        let tabs = document.querySelectorAll("#tab-nav-responsive .nav-link");
        let activeTabIndex = 0;
        let activeTabBox = document.getElementById("active-tab");

        function updateTab(newIndex) {
            tabs[activeTabIndex].classList.remove("active");
            document.querySelector(tabs[activeTabIndex].getAttribute("href")).classList.remove("show", "active");

            activeTabIndex = newIndex;

            tabs[activeTabIndex].classList.add("active");
            document.querySelector(tabs[activeTabIndex].getAttribute("href")).classList.add("show", "active");

            // Update the tab pane display
            activeTabBox.innerText = tabs[activeTabIndex].innerText;
        }

        document.querySelector(".next-tab").addEventListener("click", function () {
            let newIndex = (activeTabIndex + 1) % tabs.length;
            updateTab(newIndex);
        });

        document.querySelector(".prev-tab").addEventListener("click", function () {
            let newIndex = (activeTabIndex - 1 + tabs.length) % tabs.length;
            updateTab(newIndex);
        });
    });
    
