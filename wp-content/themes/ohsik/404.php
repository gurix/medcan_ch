<?php
/**
* 404 Template
*/
    get_header(); 
?>
    <!-- Content
    -------------------------------------------------------->
    <div class="bodywrap">

         <div class="row group"> 
            <div class="grid9">
                <h1 class="page-title"><?php _e( 'Page Not Found', 'ohsik' ); ?></h1>
                <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'ohsik' ); ?></p>
                <p><?php get_search_form(); ?></p>
            </div>
            <div class="grid3">
                <?php get_sidebar('sidebar'); ?>
            </div>
        </div> <!--row group-->

    </div> <!-- END bodywrap -->

<?php
    get_footer(); 
?>