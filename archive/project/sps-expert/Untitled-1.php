<div class="container">

    <div class="jobs_btn">

        <div class="jbtn_wrapper">

            <button class="next">Далее</button>
            <button class="next">Назад</button>

            <div class="arrow_body">

                <div class="arrow"><ion-icon name="chevron-back-outline"></ion-icon></div>
                <input type="number" min="1" value="1" class="num_page">
                <div class="arrow"><ion-icon name="chevron-forward-outline"></ion-icon></div>

            </div>

        </div>

    </div>

</div>

<?php 

if(have_posts()){
    while(have_posts()){
        the_post();
    }
}

?>

<?php
    $args = array( 'post_type' => 'job', 'posts_per_page' => 10 );
    $the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) : ?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<div class="job_item">

    <p class="jobs_title"><?php the_field('jobs__title') ?></p>
    <p class="jobs_descript"><?php the_field('jobs__description') ?></p>
    <p class="jobs_descript_full"><?php the_field('jobs__more__description') ?></p>
    <a class="jobs_more">Подробнее <span><ion-icon name="chevron-down-outline"></ion-icon></span></a>

</div>

<?php wp_reset_postdata(); ?>
<?php else: ?>
<?php endif; ?>


<?php

    $args = array('post_type' => 'job', 'posts_per_page' => 3,   );
    $myposts = get_posts( $args );
    foreach( $myposts as $post ){ setup_postdata($post);

    ?>

        <div class="job_item">

        <p class="jobs_title"><?php the_field('jobs__title') ?></p>
        <p class="jobs_descript"><?php the_field('jobs__description') ?></p>
        <p class="jobs_descript_full"><?php the_field('jobs__more__description') ?></p>
        <a class="jobs_more">Подробнее <span><ion-icon name="chevron-down-outline"></ion-icon></span></a>

        </div>

    <?php

    }
    wp_reset_postdata();
    next_posts_link();
?>

<?php
global $wp_query;

$save_wpq = $wp_query;

// ваш запрос и код вывода с пагинацией
$wp_query = new WP_Query( [
	'post_type'      => 'job',
	'posts_per_page' => 3,
	'orderby'  => [ 'meta_value_num'=>'ASC' ],
] );


while ( $wp_query->have_posts() ) {
	$wp_query->the_post();
    ?>

        <div class="job_item">

            <p class="jobs_title"><?php the_field('jobs__title') ?></p>
            <p class="jobs_descript"><?php the_field('jobs__description') ?></p>
            <p class="jobs_descript_full"><?php the_field('jobs__more__description') ?></p>
            <a class="jobs_more">Подробнее <span><ion-icon name="chevron-down-outline"></ion-icon></span></a>

        </div>

	<?php
}
?>


<?php 
    $current = absint(
        max(
          1,
          get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' )
        )
      );
      $posts_per_page = 3;
      $query          = new WP_Query(
        [
          'post_type'      => 'job',
          'posts_per_page' => $posts_per_page,
          'paged'          => $current,
        ]
      );
      if ( $query->have_posts() ) {
        ?>

            <div class="job_item">

                <p class="jobs_title"><?php the_field('jobs__title') ?></p>
                <p class="jobs_descript"><?php the_field('jobs__description') ?></p>
                <p class="jobs_descript_full"><?php the_field('jobs__more__description') ?></p>
                <a class="jobs_more">Подробнее <span><ion-icon name="chevron-down-outline"></ion-icon></span></a>

            </div>
       
        <?php
        while ( $query->have_posts() ) {
          $query->the_post();
          the_title();
          echo '<br>';
        }
        wp_reset_postdata();
       
        echo wp_kses_post(
          paginate_links(
            [
              'total'   => $query->max_num_pages,
              'current' => $current,
            ]
          )
        );
      } else {
        global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        nocache_headers();
        require get_404_template();
      }
?>


<?php 
    $current = absint(
        max(
            1,
            get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' )
        )
        );
        $posts_per_page = 3;
        $query          = new WP_Query(
        [
            'post_type'      => 'job',
            'posts_per_page' => $posts_per_page,
            'paged'          => $current,
        'orderby'  => [ 'meta_value_num'=>'ASC' ]
        ]
        );
        if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            ?>
            <div class="job_item">

                <p class="jobs_title"><?php the_field('jobs__title') ?></p>
                <p class="jobs_descript"><?php the_field('jobs__description') ?></p>
                <p class="jobs_descript_full"><?php the_field('jobs__more__description') ?></p>
                <a class="jobs_more">Подробнее <span><ion-icon name="chevron-down-outline"></ion-icon></span></a>

            </div>
        <?php
        }
        wp_reset_postdata();

        echo wp_kses_post(
            paginate_links(
            [
                'total'   => $query->max_num_pages,
                'current' => $current,
            ]
            )
        );
        } else {
        global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        nocache_headers();
        require get_404_template();
        }

?>


<?php 
if ( get_field("doc_pdf") ){
    ?>

        <a class="doc_title" target="_blank" href="<?php the_field('doc_pdf') ?>"><?php the_field('documents__header') ?></a>

    <?php 
} else {
    ?>

        <a class="doc_title" href="#"><?php the_field('documents__header') ?></a>

    <?php 
}
?>