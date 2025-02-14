document.addEventListener("DOMContentLoaded", function () {
    // Pastikan Swiper sudah dimuat
    if (typeof Swiper !== "undefined") {
        console.log("Swiper.js ditemukan, menginisialisasi...");

        // Inisialisasi Swiper untuk Gallery
        const swiperGallery = new Swiper('.swiper-gallery', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        // Inisialisasi Swiper untuk Tabs
        const swiperTabs = new Swiper('.swiper-tab', {
            slidesPerView: "auto",
            spaceBetween: 10,
            slidesOffsetAfter: 20,
            slidesOffsetBefore: 20,
        });

    } else {
        console.error("Swiper.js tidak ditemukan! Pastikan sudah dimuat.");
    }

    // Tab Navigation
    const tabLinks = document.querySelectorAll('.tab-link');

    tabLinks.forEach(button => {
        button.addEventListener('click', () => {
            const targetTab = button.getAttribute('data-target-tab');

            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });

            tabLinks.forEach(btn => {
                btn.classList.remove('!bg-ngekos-black', '!text-white');
            });

            document.querySelector(targetTab).classList.remove('hidden');
            button.classList.add('!bg-ngekos-black', '!text-white');
        });
    });
});
