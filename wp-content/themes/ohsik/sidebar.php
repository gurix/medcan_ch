<?php
/**
 * The Main Sidebar
 */ 
if ( has_nav_menu( 'secondary' ) ) : 
?>
	<nav class="side-nav">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
	</nav>
<?php 
endif; 
if ( is_active_sidebar( 'sidebar-1' ) ) :
?>
    <div class="sidebar">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- #primary-sidebar -->
<?php endif; ?>



