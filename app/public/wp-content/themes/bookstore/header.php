<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="header-main">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo">
                        <?php
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                        ?>
                    </div>
                    <div class="btn-search-wrap">
                        <div class="btnMenu">
                            <p class="menu">
                                Menu<span><i class="fas fa-sort-down"></i></span>
                            </p>
                        </div>
                        <div class="searchbox">
                            <form>
                                <label for="input-box" class="input-box">
                                    <input type="text" name="search" placeholder="Find books here...">
                                </label>
                            </form>
                        </div>
                    </div>
                    <div class="cart-btn-wrap">
                        <div class="cart-icon">
                            <img src="<?php echo get_theme_file_uri('images/cart.png'); ?>" alt="cart">
                        </div>
                        <div class="btnSignIn">
                            <button>Sign in</button>
                        </div>
                        <div class="btnCreateAccount">
                            <button>Create account</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>