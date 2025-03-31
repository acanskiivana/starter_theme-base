<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter_theme
 */

?>


</div><!-- #page -->

<footer class="accent-background section-text-light padding-top-L">
    <div class="footer container grid-container">
        <div class="col-12 col-sm-6 col-lg-7">
            newsletter

            <div class="social-icons d-flex flex-row">
                <a href="" target="_blank" class="social-icon"><img src="<?php echo get_template_directory_uri() . '/images/facebook.svg'; ?>" alt=""></a>
                <a href="" target="_blank" class="social-icon"><img src="<?php echo get_template_directory_uri() . '/images/instagram.svg'; ?>" alt=""></a>
                <a href="" target="_blank" class="social-icon"><img src="<?php echo get_template_directory_uri() . '/images/linedin.svg'; ?>" alt=""></a>
            </div>
            <span class="footer__copyright">© 2025 aspect. All rights reserved.</span>
        </div>

        <div class="col-12 col-sm-6 col-lg-5 d-flex flex-row">
             <ul class="footer__contact list-style-none">
                <li>Contact</li>
                <li>123 Digital Street, Suite 4B, Novi Grad, 11000</li>
                <li>+381 63 123 4567</li>
                <li>hi@goodfolks.com</li>
            </ul>
            <ul class="footer__menulist list-style-none">
                <li>Quick links</li>
                <li><a href="">About us</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Prices</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="">Shop</a></li>
            </ul>

        </div>
        <div class="footer__large-text col-12">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/footer-large-title.png'); ?>" alt="">
        </div>
    </div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
