<footer class="site-footer">
    <div class="site-footer__inner container container--narrow">
        <div class="group">
            <div class="site-footer__col-one">
                <h1 class="school-logo-text school-logo-text--alt-color">
                    <a href="<?php echo site_url() ?>"><strong>Narre</strong> Knollen</a>
                </h1>
            </div>

            <div class="site-footer__col-two-three-group">
                <div class="site-footer__col-two">

                    <nav class="nav-list">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footerLocationOne'
                        ]);
                        ?>
                    </nav>
                </div>

                <div class="site-footer__col-three">
                    <nav class="nav-list">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footerLocationTwo'
                        ]);
                        ?>
                    </nav>
                </div>
            </div>

            <div class="site-footer__col-four">
                <h3 class="headline headline--small">Social Media</h3>
                <nav>
                    <ul class="min-list social-icons-list group">
                        <li>
                            <a href="https://www.facebook.com/SKVDeNarreKnollenSoest/" target="_blank"
                               class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <!--                <li>-->
                        <!--                  <a href="#" target="_blank" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                  <a href="#" target="_blank" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>-->
                        <!--                </li>-->
                        <li>
                            <a href="https://www.linkedin.com/in/skv-de-narre-knollen-22551513a" target="_blank"
                               class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/narreknollen/" target="_blank"
                               class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
</body>
</html>