<?php get_header(); ?>
<div class="row greenbg">
	<div class="col-md-9 col-sm-12" id="leftside">
		<div id="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php bloginfo('template_directory'); ?>/img/logo.png" width="292" alt="<?php bloginfo( 'name' ); ?>">
				</a>
		</div>
		<nav class="navbar navbar-default" role="navigation">

	 			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="navbar-collapse">
			 <ul class="nav navbar-nav">
				 <?php wp_list_pages(array('title_li' => 0, 'depth' => '1' )); ?>
			 </ul>
			</div><!-- /.navbar-collapse -->
		</nav>
		<div id="content">
			<nav id="subnavcontent" class="visible-xs visible-sm">
			
				<ul>
					<?php 
						if ($post->post_parent > 0) {
							$id = $post->post_parent;
						} else {
							$id = $post->ID;
						}
						wp_list_pages(array('child_of' => $id ,'title_li' => 0, 'depth' => '1')); 
					?>
				</ul>
			</nav>
			<h1 class="sr-only"><?php bloginfo( 'name' ); ?></h1>
			<?php if(have_posts()) : ?>
			   <?php while(have_posts()) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			 		<?php the_content(); ?>
				</div>
				<?php
				if (is_singular()) {
					// support for pages split by nextpage quicktag
					wp_link_pages();

					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					// tags anyone?
					the_tags();
				}
				?>
			   <?php endwhile; ?>
			
			<?php if (!is_singular()) : ?>
				<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
				<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
			<?php endif; ?>

			<?php else : ?>
			
			<div class="alert alert-info">
			  <strong>No content in this loop</strong>
			</div>
			
			<?php endif; ?>
		</div>
	</div>
	<div class="col-md-3 col-sm-12" id="rightside">
		<div id="brand" class="hidden-xs hidden-sm">
			<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
		</div>
		<div id="contactlink">
			<a href="mailto: medcan@gmx.ch">Kontakt</a>
		</div>
		<nav id="subnav" class="hidden-xs hidden-sm">
		
			<ul>
				<?php 
					if ($post->post_parent > 0) {
						$id = $post->post_parent;
					} else {
						$id = $post->ID;
					}
					wp_list_pages(array('child_of' => $id ,'title_li' => 0, 'depth' => '1')); 
				?>
			</ul>
		</nav>
	</div>
</div>
<?php get_footer(); ?>
