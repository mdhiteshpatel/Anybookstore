<footer class="footer-main">
    <div class="container">
        <div class="footer-wrap">
            <div class="footer-logo">
                <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                ?>
                <p class="clevr-desc">
                    Clevr is an online bookstore website who sells all genres of books from around the world. Find your book here now
                </p>
                <div class="social">
                    <h4>Follow Us</h4>
                    <a href="#facebook">
                        <img src="<?php echo get_theme_file_uri('images/icon-facebook.png'); ?>" alt="facebook">
                    </a>
                    <a href="#youtube">
                        <img src="<?php echo get_theme_file_uri('images/icon-youtube.png'); ?>" alt="youtube" class="icon-youtube">
                    </a>
                    <a href="#twitter">
                        <img src="<?php echo get_theme_file_uri('images/icon-twitter.png'); ?>" alt="twitter">
                    </a>
                    <a href="#linkedin">
                        <img src="<?php echo get_theme_file_uri('images/icon-linkedin.png'); ?>" alt="linkedin">
                    </a>
                    <a href="#insta">
                        <img src="<?php echo get_theme_file_uri('images/icon-insta.png'); ?>" alt="instagram">
                    </a>
                </div>
            </div>
            <div class="links-wrap">
                <div class="link1">
                    <ul>
                        <li><h4>Quick Links</h4></li>
                        <li><a href="#about">About us</a></li>
                        <li><a href="#contact">Contact us</a></li>
                        <li><a href="#products">Products</a></li>
                        <li><a href="#login">Login</a></li>
                        <li><a href="#signup">Sign Up</a></li>
                    </ul>
                </div>
                <div class="link2">
                    <ul>
                        <li><h4>Customer Area</h4></li>
                        <li><a href="#myaccount">My Account</a></li>
                        <li><a href="#orders">Orders</a></li>
                        <li><a href="#tracking">Tracking List</a></li>
                        <li><a href="#terms">Terms</a></li>
                        <li><a href="#privacy">Privacy Policy</a></li>
                        <li><a href="#faq">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="update">
                <h4>Don't miss the newest books</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                </p>
                <form>
                    <input type="text" name="email" placeholder="Type your email here">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
        </div>
        <div class="footer__copyright">
                <!-- &copy; EasyBank. All Rights Reserved. -->
                <?php echo get_theme_mod('footer_text'); ?>
            </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>