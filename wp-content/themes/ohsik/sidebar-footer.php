<?php
/**
 * The Footer Sidebar
 */

if ( is_active_sidebar( 'sidebar-2' ) ) : 
?>
<div class="sidebar-footer">
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
</div><!-- #primary-sidebar -->
<?php endif; ?>
