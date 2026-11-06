<footer class="site-footer">
    <div class="container">
        <div class="site-footer__inner">
            <div class="site-footer__brand">
                <a href="<?php echo esc_url(site_url()) ?>" class="navbar__logo">Narre Knollen</a>
            </div>

            <div class="site-footer__nav">
                <?php wp_nav_menu([
                    'theme_location' => 'footerLocationOne',
                    'container'      => false,
                    'menu_class'     => 'footer-nav-links',
                ]); ?>
            </div>

            <div class="site-footer__nav">
                <?php wp_nav_menu([
                    'theme_location' => 'footerLocationTwo',
                    'container'      => false,
                    'menu_class'     => 'footer-nav-links',
                ]); ?>
            </div>

            <div class="site-footer__social">
                <ul class="min-list social-icons-list">
                    <li>
                        <a href="https://www.facebook.com/SKVDeNarreKnollenSoest/" target="_blank" class="social-color-facebook">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/skv-de-narre-knollen-22551513a" target="_blank" class="social-color-linkedin">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/narreknollen/" target="_blank" class="social-color-instagram">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <p class="site-footer__copy">&copy; <?php echo date('Y') ?> SKV De Narre Knollen</p>
    </div>
</footer>

<script>
(function () {
    var navbar = document.getElementById('site-navbar');
    var toggle = document.getElementById('menu-toggle');
    var mobileMenu = document.getElementById('mobile-menu');
    var overlay = document.getElementById('menu-overlay');

    window.addEventListener('scroll', function () {
        navbar.classList.toggle('navbar--scrolled', window.scrollY > 20);
    });

    toggle.addEventListener('click', function () {
        var open = mobileMenu.classList.toggle('open');
        document.body.style.overflow = open ? 'hidden' : '';
    });

    overlay.addEventListener('click', function () {
        mobileMenu.classList.remove('open');
        document.body.style.overflow = '';
    });

    mobileMenu.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            mobileMenu.classList.remove('open');
            document.body.style.overflow = '';
        });
    });
}());
</script>

<?php wp_footer(); ?>
</body>
</html>
