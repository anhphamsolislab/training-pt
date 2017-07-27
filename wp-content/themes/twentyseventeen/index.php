<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h2 class="page-title"><?php _e( 'Event', 'twentyseventeen' ); ?></h2>
	</header>
	<?php endif; ?>



	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">


            <?php
//                add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
//
//                function add_my_post_types_to_query( $query ) {
//                    if ( is_home() && $query->is_main_query())
//                        $query->set( 'post_type', 'tst_events') );
//                    return $query;
//                }

            $args = array(
                    'post_type' => 'tst_events',
                    'post_per_page' => 5
            );

            $list = new WP_Query( $args );
            if ($list->have_posts()):
            while ($list->have_posts() ) : $list->the_post();

            ?>
                <h2 id="events-<?php the_ID(); ?>"
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                       <?php the_title(); ?>
                    </a>
                </h2>

                <?php the_content(ReadMore, FALSE); ?>
                <?php the_excerpt(); ?>

                <?php endwhile;
                endif;
            ?>

                <?php
//            if( $list ) {
//                echo '<ul>';
//                foreach( $list as $post ) : setup_postdata($post);
//                echo '<li>',
//                        '<h2>'. get_the_title() .'</h2>',
//                            get_the_content() .
//                            get_the_excerpt () .
//                      '</li>';
//                endforeach;
//                echo '<ul>';
//                wp_reset_postdata();
//            }

//            if ( have_posts() ) :
//
//                /* Start the Loop */
//                while ( have_posts() ) : the_post();
//
//                    /*
//                     * Include the Post-Format-specific template for the content.
//                     * If you want to override this in a child theme, then include a file
//                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
//                     */
//                    get_template_part( 'template-parts/post/content', get_post_format() );
//
//                endwhile;
//
//                the_posts_pagination( array(
//                    'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
//                    'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
//                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
//                ) );
//
//            else :
//
//                get_template_part( 'template-parts/post/content', 'none' );
//
//            endif;


            ?>




        </main><!-- #main -->

</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
