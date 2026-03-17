class HeroSlider {
    constructor(selector = '.hero-slider') {
        this.root = document.querySelector(selector);
        if (!this.root) return;

        this.slidesWrapper = this.root.querySelector('.glide__slides');
        this.slides = Array.from(this.slidesWrapper.querySelectorAll('.hero-slider__slide'));
        this.bulletsContainer = this.root.querySelector('.slider__bullets');

        if (!this.slides.length || !this.bulletsContainer) return;

        this.currentIndex = 0;
        this.slideCount = this.slides.length;
        this.autoPlayDelay = 5000; // 5 seconden
        this.intervalId = null;

        this.setupSlides();
        this.createBullets();
        this.startAutoplay();
    }

    setupSlides() {
        this.slides.forEach((slide, index) => {
            slide.classList.add('hero-slider__slide--hidden');
            if (index === 0) {
                slide.classList.remove('hero-slider__slide--hidden');
                slide.classList.add('hero-slider__slide--active');
            }
        });
    }

    createBullets() {
        this.bulletsContainer.innerHTML = '';

        this.slides.forEach((_, index) => {
            const bullet = document.createElement('button');
            bullet.type = 'button';
            bullet.className = 'slider__bullet';
            bullet.setAttribute('data-slide-index', index);

            if (index === 0) {
                bullet.classList.add('slider__bullet--active');
            }

            bullet.addEventListener('click', () => {
                this.goTo(index);
                this.restartAutoplay();
            });

            this.bulletsContainer.appendChild(bullet);
        });

        this.bullets = Array.from(
            this.bulletsContainer.querySelectorAll('.slider__bullet')
        );
    }

    goTo(index) {
        if (index === this.currentIndex) return;
        if (index < 0 || index >= this.slideCount) return;

        // huidige slide uit
        this.slides[this.currentIndex].classList.remove('hero-slider__slide--active');
        this.slides[this.currentIndex].classList.add('hero-slider__slide--hidden');
        if (this.bullets) {
            this.bullets[this.currentIndex].classList.remove('slider__bullet--active');
        }

        this.currentIndex = index;

        // nieuwe slide aan
        this.slides[this.currentIndex].classList.remove('hero-slider__slide--hidden');
        this.slides[this.currentIndex].classList.add('hero-slider__slide--active');
        if (this.bullets) {
            this.bullets[this.currentIndex].classList.add('slider__bullet--active');
        }
    }

    next() {
        const nextIndex = (this.currentIndex + 1) % this.slideCount;
        this.goTo(nextIndex);
    }

    startAutoplay() {
        this.intervalId = setInterval(() => this.next(), this.autoPlayDelay);
    }

    restartAutoplay() {
        clearInterval(this.intervalId);
        this.startAutoplay();
    }
}

document.addEventListener('DOMContentLoaded', function () {
    new HeroSlider();
});