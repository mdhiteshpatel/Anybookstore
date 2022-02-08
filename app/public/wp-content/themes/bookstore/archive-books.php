<?php get_header(); ?>
<main id="primary" class="main-section">
    <?php
        $meta_queries = array();
    if (isset($_POST['rating']) && !empty($_POST['rating'])) {
        $rating = sanitize_text_field($_POST['rating']);
    }
    if (isset($_POST['book-publisher']) && !empty($_POST['book-publisher'])) {
        $book_publisher = sanitize_text_field($_POST['book-publisher']);
    }
    if (isset($_POST['categories-all']) && !empty($_POST['categories-all'])) {
        $categories_all = sanitize_text_field($_POST['categories-all']);
    }
    if (isset($_POST['categories-all']) && is_array($_POST['categories-all'])) {
        $categories_all = $_POST['categories-all'];
    }
    if (isset($_POST['publisher-all']) && is_array($_POST['publisher-all'])) {
        $publisher_all = $_POST['publisher-all'];
    }
    if (isset($_POST['author-all']) && is_array($_POST['author-all'])) {
        $author_all = $_POST['author-all'];
    }
    if (isset($_POST['price']) && !empty($_POST['price'])) {
        $price = sanitize_text_field($_POST['price']);
    }
    $s_args = [
        'post_type' => 'books',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ];

    // Search by star rating
    if (!empty($rating)) {
        $meta_queries[] = array(
                'key' => 'star_rating',
                'value' => $rating,
            );
    }

    // Search by price range
    if (!empty($price)) {
        $meta_queries[] = array('relation' => 'OR');
        $meta_queries[] = array(
                    'key' => 'price',
                    'value'    => array(0, $price),
                    'type'     => 'numeric',
                    'compare'  => 'BETWEEN',
                );
    }
    
    // Search by book publisher
    if (!empty($book_publisher)) {
        $meta_queries['tax_query'] = array(
            array(
                'taxonomy' => 'book_publisher',
                'field' => 'slug',
                'terms' => $book_publisher
            ),
        );
    }

    // Search by category
    if (!empty($categories_all)) {
        $meta_queries['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'category' => 'Business'
            ),
        );
    }
    
    // Search by publisher
    if (!empty($publisher_all)) {
        $meta_queries['tax_query'] = array(
            array(
                'taxonomy' => 'book_publisher',
                'field' => 'slug',
                'terms' => $publisher_all,
            ),
        );
    }

    // Search by author
    if (!empty($author_all)) {
        $meta_queries['tax_query'] = array(
            array(
                'taxonomy' => 'book_author',
                'field' => 'slug',
                'terms' => $author_all
            ),
        );
    }

    $s_args = $meta_queries;
       
    $grid = new WP_Query($s_args);
        ?>
        <div class="grid-main">
            <div class="container">
                <div class="grid-left">
                    <form method="POST" id="book-filter-form" name="book-filter-form">
                        <h2>Filters</h2>
                        <div class="filter-list">
                            <label class="title-label">Categories
                                <span class="filter-down-arrow"></span>
                            </label>
                            <div class="filter-list-item">
                                <div class="checkbox">
                                    <input type="checkbox" name="category" class="check-categories" id="categories-all">
                                    <label for="categories-all" class="checkbox-custom-label">All Categories</label>
                                </div>
                                <?php
                                    $categories = get_terms('category', array('hide_empty' => 1));
                                ?>
                                <?php
                                    $catno = 0;
                                    foreach($categories as $category) {
                                    $catno+=1;
                                ?>
                                <div class="checkbox">
                                    <input type="checkbox" value="<?php echo $category->slug; ?>" name="categories-all[]" class="check-categories" id="<?php echo 'cat_'.$catno; ?>">
                                    <label for="<?php echo 'cat_'.$catno; ?>" class="checkbox-custom-label"><?php echo ($category->name); ?></label>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="filter-list">
                            <label class="title-label">Publisher
                                <span class="filter-down-arrow"></span>
                            </label>
                            <div class="filter-list-item">
                                <div class="checkbox">
                                    <input type="checkbox" name="publisher" class="check-publisher" id="publisher-all">
                                    <label for="publisher-all" class="checkbox-custom-label">All Publisher</label>
                                </div>
                                <?php
                                    $publishers = get_terms('book_publisher', array('hide_empty' => 1));
                                ?>
                                <?php
                                    $publisher_id=0;
                                    foreach($publishers as $publisher) { 
                                    $publisher_id += 1;
                                ?>
                                <div class="checkbox">
                                    <input type="checkbox" value="<?php echo $publisher->slug; ?>" name="publisher-all[]" class="check-publisher" id="<?php echo 'publisher_id_'.$publisher_id; ?>">
                                    <label for="<?php echo 'publisher_id_'.$publisher_id; ?>" class="checkbox-custom-label"><?php echo($publisher->name); ?></label>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="filter-list">
                            <label class="title-label">Author
                                <span class="filter-down-arrow"></span>
                            </label>
                            <div class="filter-list-item">
                                <div class="checkbox">
                                    <input type="checkbox" name="author" class="check-author" id="author-all">
                                    <label for="author-all" class="checkbox-custom-label">All Author</label>
                                </div>
                                <?php
                                    $terms = get_terms('book_author', array('hide_empty' => 1));
                                ?>
                                <?php
                                    $author_id=0;
                                    foreach($terms as $term) {
                                    $author_id += 1;
                                ?>
                                <div class="checkbox">
                                    <input type="checkbox" value="<?php echo $term->slug; ?>" name="author-all[]" class="check-author" id="<?php echo 'Author_id_'.$author_id; ?>">
                                    <label for="<?php echo 'Author_id_'.$author_id; ?>" class="checkbox-custom-label"><?php echo($term->name); ?></label>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="filter-btn-wrap">
                            <div class="filter-btn">
                                <input type="submit" value="Refine Search" name="Refine-Search" class="filter-search-btn">
                            </div>
                            <div class="filter-btn reload-btn">
                                <button onclick="window.location.reload();">Reset Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="grid-right">
                    <h2>Books</h2>
                    <div class="grid-right-wrap">
                        <div class="view-wrap">
                            <span>Over 475+ books available here, find it now!</span>
                            <div class="book-view">
                                <a class="same-view grid-btn active">
                                    <i class="fa fa-th-large"></i>
                                </a>
                                <a class="same-view list-btn">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="switch-view grid-view">
                            <?php
                                if($grid->have_posts()) {
                                while($grid->have_posts()) {
                                    $grid->the_post();
                            ?>
                            <div class="grid-list-item">
                                <div class="book-img">
                                    <a href="#">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="placeholder1">
                                    </a>
                                </div>
                                <div class="book-info">
                                    <div class="book-rating-wrap">
                                        <div class="book-rating">
                                            <?php
                                                for($i=0; $i < 1; $i++) {
                                                if ($i < intval (get_field('star_rating'))) {
                                                    echo '<i class="fas fa-star"></i>';
                                                } else {
                                                    echo '<i class="fas fa-star"></i>';
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <p>
                                            <?php echo esc_html(get_field('star_rating')); ?>
                                        </p>
                                    </div>
                                    <div class="category-publisher-wrap">
                                        <span class="book-category">
                                            <?php 
                                                $terms = get_the_term_list(get_the_ID(),'category');
                                                echo(strip_tags($terms));
                                            ?>
                                        </span>
                                        <span class="book-publisher">
                                            <?php 
                                                $publisher = get_the_term_list(get_the_ID(),'book_publisher');
                                                echo(strip_tags($publisher));
                                            ?>
                                        </span>
                                    </div>
                                    <strong class="book-name">
                                        <p><?php echo get_the_title(); ?></p>
                                    </strong>
                                    <p class="book-author">
                                        <?php 
                                            $author = get_the_term_list(get_the_ID(),'book_author');
                                            echo(strip_tags($author));
                                        ?>
                                    </p>
                                    <p class="book-price">
                                        <span>
                                            <?php 
                                                if (!empty(get_field('price'))){echo "$";}
                                            ?>
									        <?php 
                                                echo esc_html( get_field('price') ); 
                                            ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <?php
                                }
                                    } 
                                    else {
                            ?>
                            <div class="book_grid_not_match">
                                Data Was Not Match With Your Search
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
    <?php echo do_shortcode("[anybook_liked]"); ?>
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
        <section class="subscribe">
            <div class="subscribe-box">
                <img src="<?php echo get_theme_file_uri('images/circleElement.png'); ?>" alt="circle">
                <h2>Subscribe our newsletter for newest books updates</h2>
                <div>
                    <form>
                        <input type="text" name="email" placeholder="Type your email here">
                        <input type="submit" value="SUBSCRIBE">
                    </form>
                    <img src="<?php echo get_theme_file_uri('images/circleElement1.png'); ?>" alt="circle1" class="circle1">
                </div>
            </div>
        </section>
<?php get_footer(); ?>