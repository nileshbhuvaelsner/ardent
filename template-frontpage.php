<?php
/**
 *Template Name: Frontpage
 *
 * @package ARDENT
 */

get_header(); ?>

	<div id="content" class="site-content">
		<main id="main" class="site-main" role="main">
            <?php

            do_action( 'ardent_frontpage_before_section_parts' );

			if ( ! has_action( 'ardent_frontpage_section_parts' ) ) {

				$sections = apply_filters( 'ardent_frontpage_sections_order', array(
                    'features', 'about', 'services', 'videolightbox', 'gallery', 'counter', 'team',  'news', 'contact'
                ) );

				foreach ( $sections as $section ){
					/**
                     * Load section if active
                     *
					 * @since 2.1.1
					 */
				    if ( Ardent_Config::is_section_active( $section ) ) {
					    ardent_load_section( $section );
                    }

				}

			} else {
				do_action( 'ardent_frontpage_section_parts' );
			}

            do_action( 'ardent_frontpage_after_section_parts' );

			?>
		</main>
	</div>

<?php get_footer(); ?>
