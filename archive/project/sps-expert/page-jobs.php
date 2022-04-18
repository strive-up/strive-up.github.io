<?php get_header(); ?>

<?php

/* Template Name: jobs */

?>

<main class="jobs_body">


<div class="container">

            <div class="job_list">
				
				<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			$args = array(
				'post_type'=>'jobs', // Your post type name
				'posts_per_page' => 3,
				'paged' => $paged,
			);

			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post();?>
			
					<div class="job_item">
						<p class="jobs_title"><?php the_field('jobs__title') ?></p>
						<p class="jobs_descript"><?php the_field('jobs__description') ?></p>
						<p class="jobs_descript_full"><?php the_field('jobs__more__description') ?></p>
						<a class="jobs_more">Подробнее <span><ion-icon name="chevron-down-outline"></ion-icon></span></a>
					</div>

				<?php endwhile;

				$total_pages = $loop->max_num_pages;
			}
			wp_reset_postdata();
			?>
				
				
            </div>
			
		<div class="jobs_btn">

			<div class="jbtn_wrapper">
				
				<?php 
					if ($total_pages > 1){

						$current_page = max(1, get_query_var('paged'));

						echo paginate_links(array(
							'base' => get_pagenum_link(1) . '%_%',
							'format' => '/page/%#%',
							'current' => $current_page,
							'total' => $total_pages,
							'prev_text'    => __('« prev'),
							'next_text'    => __('next »'),
						));
					}    
				?>
				
				<button class="next"><?php next_posts_link(__('Далее')); ?></button>

				<div class="arrow_body">

					<div class="arrow"><ion-icon name="chevron-back-outline"></ion-icon></div>
					<input type="number" min="1" value="<?=$current_page?>" class="num_page">
					<div class="arrow"><ion-icon name="chevron-forward-outline"></ion-icon></div>

				</div>

			</div>

		</div>

	</div>

</main>

<footer class="footer_body">

	<p>Общество с ограниченной ответственностью «СПС-Экспертиза»<span>© 2021</span></p>
	<p>ООО «СПС-Экспертиза»<br>   
		© 2021</p>
	
</footer>

<?php get_footer(); ?>