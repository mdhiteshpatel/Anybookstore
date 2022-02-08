<?php get_header(); ?>
<section class="hero-banner">
    <div class="hero-text">
        <h1>Welcome to <span>Clevr.</span></h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
        </p>
    </div>
    <?php echo do_shortcode("[anybook_searchform]"); ?>
</section>
<div class="trending-main">
    <div class="container">
        <div class="block-heading">
            <h2>Trending this week</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
            </p>
        </div>
        <?php echo do_shortcode("[anybook_trending]"); ?>
               
    </div>
</div>
<section class="features">
    <div class="container">
        <div class="features-wrap">
            <div class="features-box">
                <img src="<?php echo get_theme_file_uri('images/icon-delivery.png'); ?>" alt="delivery">
                <h3>Quick Delivery</h3>
                <div class="features-content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </p>
                </div>
            </div>
            <div class="features-box">
                <img src="<?php echo get_theme_file_uri('images/icon-payment.png'); ?>" alt="payment">
                <h3>Secure Payment</h3>
                <div class="features-content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </p>
                </div>
            </div>
            <div class="features-box">
                <img src="<?php echo get_theme_file_uri('images/icon-quality.png'); ?>" alt="quality">
                <h3>Best Quality</h3>
                <div class="features-content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </p>
                </div>
            </div>
            <div class="features-box">
                <img src="<?php echo get_theme_file_uri('images/icon-guarantee.png'); ?>" alt="guarantee">
                <h3>Return Guarantee</h3>
                <div class="features-content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo do_shortcode("[anybook_category]"); ?>
<?php echo do_shortcode("[anybook_toprated]"); ?>
<?php echo do_shortcode("[anybook_featured]"); ?>
<section class="testimonials">
    <div class="container">
        <div class="testimonial-heading">
            <h2>Testimonials</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
            </p>
            <div class="testimonial-slider-controls">
                <span class="btnslide activebtn"></span>
                <span class="btnslide"></span>
            </div>
        </div>
        <div class="testimonial-wrap" id="testimonial-slide">
            <div class="testimonial-list">
                <div class="testimonial-star">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                </div>
                <div class="testimonial-description">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </p>
                </div>
                <div class="testimonial-person-wrap">
                    <div class="testimonial-person-details">
                        <strong>Steve Henry</strong>
                        <p>Head of Marketing</p>
                    </div>
                    <div class="testimonial-person-profile">
                        <img src="<?php echo get_theme_file_uri('images/profile-pic.png'); ?>" src="profile">
                    </div>
                </div>
            </div>
            <div class="testimonial-list">
                <div class="testimonial-star">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                </div>
                <div class="testimonial-description">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </p>
                </div>
                <div class="testimonial-person-wrap">
                    <div class="testimonial-person-details">
                        <strong>Steve Henry</strong>
                        <p>Head of Marketing</p>
                    </div>
                    <div class="testimonial-person-profile">
                        <img src="<?php echo get_theme_file_uri('images/profile-pic.png'); ?>" src="profile">
                    </div>
                </div>
            </div>
            <div class="testimonial-list">
                <div class="testimonial-star">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                </div>
                <div class="testimonial-description">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </p>
                </div>
                <div class="testimonial-person-wrap">
                    <div class="testimonial-person-details">
                        <strong>Steve Henry</strong>
                        <p>Head of Marketing</p>
                    </div>
                    <div class="testimonial-person-profile">
                        <img src="<?php echo get_theme_file_uri('images/profile-pic.png'); ?>" src="profile">
                    </div>
                </div>
            </div>
            <div class="testimonial-list">
                <div class="testimonial-star">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                    <img src="<?php echo get_theme_file_uri('images/star-small-icon.png'); ?>" alt="icon-yellow">
                </div>
                <div class="testimonial-description">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </p>
                </div>
                <div class="testimonial-person-wrap">
                    <div class="testimonial-person-details">
                        <strong>Steve Henry</strong>
                        <p>Head of Marketing</p>
                    </div>
                    <div class="testimonial-person-profile">
                        <img src="<?php echo get_theme_file_uri('images/profile-pic.png'); ?>" src="profile">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="stats">
    <div class="container">
        <div class="stats-wrap">
            <div class="stats-box">
                <div class="stats-img-wrap">
                    <img src="<?php echo get_theme_file_uri('images/shop-icon.png'); ?>">
                    <h3 class="stat-number">268</h3>
                </div>
                <div class="stats-content">
                    <p>Our stores around the world</p>
                </div>
            </div>
            <div class="stats-box">
                <div class="stats-img-wrap">
                    <img src="<?php echo get_theme_file_uri('images/group-icon.png'); ?>">
                    <h3 class="stat-number">25,634</h3>
                </div>
                <div class="stats-content">
                    <p>Our happy customers</p>
                </div>
            </div>
            <div class="stats-box">
                <div class="stats-img-wrap">
                    <img src="<?php echo get_theme_file_uri('images/book-icon.png'); ?>">
                    <h3 class="stat-number">68+K</h3>
                </div>
                <div class="stats-content">
                    <p>Book Collections</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="subscribe">
    <div class="subscribe-box">
        <img src="<?php echo get_theme_file_uri('images/circleElement.png'); ?>" alt="circle">
        <h2>Subscribe our newsletter for newest books updates</h2>
        <div>
            <form id="form">
                <input type="text" id="email" name="email" placeholder="Type your email here">
                <small>Error</small>
                <input type="submit" id="submit" value="SUBSCRIBE">
            </form>
        </div>
    </div>
</section>
<?php get_footer(); ?>