<?php
/**
* Page Template
*/
    get_header(); 
?>
    <!-- Content
    -------------------------------------------------------->
    <div class="bodywrap">

         <div class="row group"> 
            <div class="grid9">
               <?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
                    
				endwhile;
				?>
            </div>
            <div class="grid3">
                <?php get_sidebar('sidebar'); ?>
            </div>
        </div> <!--row group-->

    </div> <!-- END bodywrap -->

<?php
    get_footer(); 
?>