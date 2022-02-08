<?php
/*
    Plugin Name: Any Book Store
    Version: 1.0
    Description: Online book search plugin
    Author: Hitesh
    Text Domain: anybookstore
*/

/* Register custom post type Book and taxonomy for Publisher and Author*/

function book_post_type() {
    $labels = array (
        'name' => esc_html__('Books', 'anybook'),
        'singular_name' => esc_html__('Book', 'anybook'),
        'menu_name' => esc_html__('Books', 'anybook'),
        'all_items' => esc_html__('All Books', 'anybook'),
        'view_item' => esc_html__('View Book', 'anybook'),
        'add_new_item' => esc_html__('Add New Book', 'anybook'),
        'add_new' => esc_html__('Add New', 'anybook'),
        'edit_item' => esc_html__('Edit Book', 'anybook'),
        'update_item' => esc_html__('Update Book', 'anybook'),
        'search_items' => esc_html__('Search Book', 'anybook'),
        'not_found' => esc_html__('Book Not Found', 'anybook'),
        'not_found_in_trash' => esc_html__('Not Found in Trash', 'anybook')
    );
    $arguments = array(
        'label' => esc_html__('books', 'anybook'),
        'description' => esc_html__('Book Selection', 'anybook'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-book-alt',
        'show_ui' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
    );
    register_post_type('books', $arguments);

    register_taxonomy('book_author', 'books',
        array(
            'labels' => array(
                'name' => esc_html__( 'Book Author', 'anybook' ),
                'add_new_item' => esc_html__( 'Add New Author', 'anybook' ),
                'new_item_name' => esc_html__( 'New Author Type', 'anybook' ),
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => false,
            'show_in_rest' => true,
            'public' => true
        )
    );

    register_taxonomy('book_publisher', 'books',
        array(
            'labels' => array(
                'name' => esc_html__( 'Book Publisher', 'anybook' ),
                'add_new_item'  => esc_html__( 'Add New Publisher', 'anybook' ),
                'new_item_name' => esc_html__( 'New Publisher Type', 'anybook' ),
            ),
            'show_ui'       => true,
            'show_tagcloud' => false,
            'hierarchical'  => false,
            'show_in_rest' => true,
            'public' => true,
            'rewrite' => array('slug' => 'book_publisher'),
        )
    );
}
add_action('init', 'book_post_type');

// Shortcode for Category section
add_shortcode( 'anybook_category', 'anybook_category_shortcode' );
function anybook_category_shortcode($attr) {
    $attr = shortcode_atts( array(
        'title' => 'Categories',
    ), $attr, 'anybook_category' );

    $categories = get_terms( 'category', array(
        'order' => 'DESC',
        'orderby' => 'count',
        'hide_empty' => '0',
        'exclude' => 1,
    ));
    ob_start();
    if ( !empty($categories) ) {
        ?>
        <section class="categories">
            <div class="container">
                <div class="title-box">
                    <h2><?php echo $attr['title']; ?></h2>
                    <div class="controls">
                        <span class="btn active"></span>
                        <span class="btn"></span>
                    </div>
                </div>
                <div class="category-wrap" id="category-slide">
                    <?php
                        foreach( $categories as $category ) {
                    ?>
                        <div class="category-details">
                            <div class="category-box">
                                <h3><?php echo($category->name); ?></h3>
                                <p><?php echo($category->count); ?></p>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>
    <?php
    }
    $obj_clean_category = ob_get_clean();
    return $obj_clean_category;     
}

// Shortcode for trending book section
add_shortcode( 'anybook_trending', 'anybook_trending_shortcode' );
function anybook_trending_shortcode() {
    $trendingpost  = new WP_Query(array(
		'posts_per_page' => 5,
        'post_type'    => 'books',
		'post_status'  => 'publish',
        'meta_key' => 'visits',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
	));
	ob_start();
	if ( $trendingpost->have_posts() ) {
		?>
        <div class="container">
			<div class="trending-list">
			    <?php
					while ( $trendingpost->have_posts() ) {
					$trendingpost->the_post();
						?>
						    <div class="trending-book">
						    	<div class="trending-book-wrap">
							        <a href="<?php echo get_the_permalink(); ?>">
							            <img class="image" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
							        </a>
							        <div class="trending-book-details">
							        	<div class="trending-book-rating-wrap">
								        	<div class="trending-book-rating">
							        			<?php
								        			for ($i = 0; $i < 1; $i++) {
													    if ($i < intval (get_field('rating'))) {
													        echo '<i class="fas fa-star"></i>';
													    }else{
													    	echo '<i class="fas fa-star"></i>';
													    }
													}
												?>
							        		</div>
							        		<p><?php echo esc_html( get_field('rating') ); ?></p>
							        	</div>
							            <span class="trending-book-category">
							                <?php $terms = get_the_term_list( get_the_ID(),'category' ); echo $terms; ?>
							            </span>
							            <strong class="trending-book-name">
							            	<a href="<?php echo get_the_permalink(); ?>">
                                                <?php echo get_the_title(); ?>
                                            </a>
							            </strong>
							            <p class="trending-book-author">
                                            <?php $author = get_the_term_list( get_the_ID(), 'book_author' ); echo(strip_tags( $author )); ?>
							            </p>
							            <p class="trending-book-price">
							                <span>
							                	<?php if (!empty(get_field('pricing'))){echo "$";} ?>
							                	<?php echo esc_html( get_field('pricing') ); ?>
							                </span>
                                        </p>
							        </div>
							    </div>
						    </div>
				    	<?php
					        }
			            ?>
			</div>
        </div>
	<?php
	}
	$obj_clean_trending = ob_get_clean();
	return $obj_clean_trending;
}

// Shortcode for top rated book section
add_shortcode( 'anybook_toprated', 'anybook_toprated_shortcode' );
function anybook_toprated_shortcode() {
    $toprated  = new WP_Query(array(
        'posts_per_page' => 10,
        'post_type'    => 'books',
        'post_status'  => 'publish',
        'meta_key'     => 'rating',
        'orderby'      => 'meta_value',
        //'order'        => 'DESC'
    ));	
    ob_start();
    if ( $toprated->have_posts() ) {
        ?>
    <div class="top-rated-book">
        <div class="container">
            <div class="book-title-box">
                <div class="book-title-box-wrap">
                    <h2>Top 10 Rated Books</h2>
                    <p>View More</p>
                </div>
            </div>
            <div class="top-book-list">
                <?php
                    while($toprated->have_posts()) {
                        $toprated->the_post();
                ?>
                <div class="top-book">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="placeholder" class="placeholder-img">
                    <div class="top-book-details">
                        <div class="top-book-rating">
                            <?php
								for ($i = 0; $i < 5; $i++) {
									if ($i < intval (get_field('rating'))) {
										echo '<i class="fas fa-star"></i>';
									}else{
										//echo '<i class="fas fa-star"></i>';
									}
								}
							?>
                        </div>
                        <p class="top-book-category">
                            <?php $terms = get_the_term_list( get_the_ID(),'category' ); echo $terms; ?>
                        </p>
                        <strong class="top-book-name">
                            <?php the_title(); ?>
                        </strong>
                        <p class="top-book-author">
                            <?php $author = get_the_term_list( get_the_ID(), 'book_author' ); echo(strip_tags( $author )); ?>
                        </p>
                        <div class="top-book-price">
                            <p>
                                <?php if (!empty(get_field('price'))){echo "$";} ?>
							    <?php echo esc_html( get_field('price') ); ?>
                            </p>
                            <img src="<?php echo get_theme_file_uri('images/btnAddtoCart.png'); ?>" alt="icon-cart">
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php }
    $obj_clean_featured = ob_get_clean();
	return $obj_clean_featured;
}

// Shortcode for featured book section
add_shortcode( 'anybook_featured', 'anybook_featured_shortcode' );
function anybook_featured_shortcode() {
    $topfeatured  = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type'    => 'books',
        'post_status'  => 'publish',
        'tag'     => 'featured'
    ));	
    ob_start();
    if ( $topfeatured->have_posts() ) {
    ?>
    <div class="top-featured-book">
        <div class="container">
            <div class="featured-title-box">
                <div class="featured-title-box-wrap">
                    <h2>Featured Books</h2>
                    <p>View More</p>
                </div>
            </div>
            <div class="featured-book-list">
                <?php
                    while ($topfeatured->have_posts()) {
                        $topfeatured->the_post(); 
                ?>
                <div class="featured-book">
                    <div class="featured-img">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="placeholder" class="placeholder-img">
                    </div>
                    <div class="featured-book-details">
                        <div class="category-wrap">
                            <p class="featured-book-category">
                                <?php $terms = get_the_term_list( get_the_ID(),'category' ); echo $terms; ?>
                            </p>
                            <?php
								for ($i = 0; $i < 5; $i++) {
									if ($i < intval (get_field('rating'))) {
										echo '<i class="fas fa-star .star-color"></i>';
									}else{
											echo '<i class="fas fa-star"></i>';
									}
								}
							?>
                            <p><?php echo get_field('visits');?> Visits</p>
                        </div>
                        <div class="featured-book-description">
                            <strong class="featured-book-name">
                                <?php the_title(); ?>
                            </strong>
                            <p><?php the_content(); ?></p>
                            <p class="featured-book-price">
                                <?php if (!empty(get_field('price'))){echo "$";} ?>
							    <?php echo esc_html( get_field('price') ); ?>
                            </p>
                        </div>
                        <div class="featured-book-cart">
                            <button>Add to cart</button>
                            <img src="<?php echo get_theme_file_uri('images/btnFavorite.png'); ?>" alt="btnfavorite" class="favorite-img">
                            <a href="#view">View Details</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php }
    $obj_clean_featured = ob_get_clean();
	return $obj_clean_featured;
}
    
// Shortcode for like section
add_shortcode( 'anybook_liked', 'anybook_liked_shortcode' );
function anybook_liked_shortcode() {
    $topliked  = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type'    => 'books',
        'post_status'  => 'publish',
        'taxonomy'     => 'book_publisher',
        'orderby' => 'star_rating',
        'order' => 'DESC'
    ));	
    ob_start();
    if ( $topliked->have_posts() ) {
    ?>
    <div class="top-featured-book">
        <div class="container">
            <div class="featured-title-box">
                <div class="featured-title-box-wrap">
                    <h2>You may be liked it</h2>
                    <p>View More</p>
                </div>
            </div>
            <div class="featured-book-list">
                <?php
                    while ($topliked->have_posts()) {
                        $topliked->the_post(); 
                ?>
                <div class="featured-book">
                    <div class="featured-img">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="placeholder" class="placeholder-img">
                    </div>
                    <div class="featured-book-details">
                        <div class="category-wrap">
                            <p class="featured-book-category">
                                <?php $terms = get_the_term_list( get_the_ID(),'category' ); echo $terms; ?>
                            </p>
                            <?php
								for ($i = 0; $i < 5; $i++) {
									if ($i < intval (get_field('star_rating'))) {
										echo '<i class="fas fa-star .star-color"></i>';
									}else{
										echo '<i class="fas fa-star"></i>';
									}
								}
							?>
                            <p><?php echo get_field('visits');?> Visits</p>
                        </div>
                        <div class="featured-book-description">
                            <strong class="featured-book-name">
                                <?php the_title(); ?>
                            </strong>
                            <p><?php the_content(); ?></p>
                            <p class="featured-book-price">
                                <?php if (!empty(get_field('price'))){echo "$";} ?>
							    <?php echo esc_html( get_field('price') ); ?>
                            </p>
                        </div>
                        <div class="featured-book-cart">
                            <button>Add to cart</button>
                            <img src="<?php echo get_theme_file_uri('images/btnFavorite.png'); ?>" alt="btnfavorite" class="favorite-img">
                            <a href="#view">View Details</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php }
    $obj_clean_featured = ob_get_clean();
	return $obj_clean_featured;
}

// Shortcode for search form  section
add_shortcode( 'anybook_searchform', 'anybook_searchform_shortcode' );
function anybook_searchform_shortcode() {
    ob_start();
    $publishers = get_terms('book_publisher', array(
        'order' => 'ASC'
    ));
    ?>
    <div class="floatingCard">
        <form action="<?php echo get_post_type_archive_link('books'); ?>" method="POST" id="searchform" name="searchform">
            <div class="form-wrap">
                <div>
                    <select name="year" id="book-year" class="book-year">
                        <option value="" selected>Year</option>
                        <option value="2005" <?php echo get_field('year') == 2005 ? 'selected' : null; ?>>2005</option>
                        <option value="2010" <?php echo get_field('year') == 2010 ? 'selected' : null; ?>>2010</option>
                        <option value="2015" <?php echo get_field('year') == 2015 ? 'selected' : null; ?>>2015</option>
                    </select>
                </div>
                <div>
                    <select name="book-publisher" class="publisher" id="book-publisher">
                        <option value="" selected>Publisher</option>
                            <?php
                                foreach($publishers as $publisher) {
                            ?>
                        <option value=<?php echo $publisher->slug; ?>>
                            <?php echo($publisher->name); ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                
                
                <div class="search-b">
                <label for="input-box" class="input-box">
                    <input type="text" alt="search" id="search" name="search" class="search" placeholder="Enter book name here">
                                </label>
                </div>
                <div class="btnsave">
                    <input type="submit" value="Search" class="btnsubmit">
                </div>
            </div>
        </form>
    </div>
    <?php 
    $obj_clean_form = ob_get_clean();
	return $obj_clean_form;
}