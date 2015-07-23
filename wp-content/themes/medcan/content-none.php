<?php
/**
 * No Content Page
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="page-header">
        <h1 class="page-title"><?php _e( 'Nothing Found', 'ohsik' ); ?></h1>
    </header>
    
    <div class="page-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
    
        <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ohsik' ), admin_url( 'post-new.php' ) ); ?></p>
    
        <?php elseif ( is_search() ) : ?>
    
        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ohsik' ); ?></p>
        <p><?php get_search_form(); ?></p>
    
        <?php else : ?>
    
        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ohsik' ); ?></p>
        <p><?php get_search_form(); ?></p>
    
        <?php endif; ?>
    </div><!-- .page-content -->
    
</article><!-- #post-## -->
