    <!-- Footer
    -------------------------------------------------------->
    <footer>
        <div class="bodywrap">

            <!--Footer Widget-->
            <div class="row group"> 
                <div class="grid12">
                    <!--If Footer widget area has widget show Footer Widget-->
                    <?php if ( is_active_sidebar('sidebar-2') ) : ?>
                    <?php get_sidebar('footer'); ?>
                    <?php endif; ?>
                    
                    <!--Footer Content Area-->
    	            <a href="http://www.ohsikpark.com">ohsikpark.com</a> 2014
                </div>
            </div>

        </div>
    </footer>


<?php wp_footer(); ?>
</body>
</html>