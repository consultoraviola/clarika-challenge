document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.home-slider__wrapper');
    const slides = document.querySelectorAll('.home-slider__slide');
    const prevButton = document.querySelector('.home-slider__nav--prev');
    const nextButton = document.querySelector('.home-slider__nav--next');
    let currentIndex = 0;
    const totalSlides = slides.length;

    function updateSliderPosition() {
        const translateX = -currentIndex * 100;
        slider.style.transform = `translateX(${translateX}%)`;
    }

    prevButton.addEventListener('click', function() {        
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = totalSlides - 1;
        }
        updateSliderPosition();
    });

    nextButton.addEventListener('click', function() {
        if (currentIndex < totalSlides - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateSliderPosition();
    });

    setInterval(function() {
        nextButton.click();
    }, 5000);

    const links = document.querySelectorAll('a[href^="#"]');

    for (const link of links) {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    }


    const headerHeight = document.querySelector('.header').offsetHeight;

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(event) {
            event.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - headerHeight,
                    behavior: 'smooth'
                });
            }
        });
    });

    const menuButton = document.getElementById('menu-mobile');
    const menu = document.getElementById('main-menu');
    const menuItems = menu.querySelectorAll('a'); // Selecciona todos los enlaces dentro del menú

    // Mostrar/ocultar menú al hacer clic en el botón de hamburguesa
    menuButton.addEventListener('click', function() {
        menu.classList.toggle('nav-bar__menu--active');
    });

    // Cerrar el menú al hacer clic en un enlace
    menuItems.forEach(function(item) {
        item.addEventListener('click', function() {
            menu.classList.remove('nav-bar__menu--active');
        });
    });
});
