<?php

$term = get_queried_object();

$name = get_field('full__name', $term);
$degree = get_field('academic__degree', $term);

$qualification = get_field('qualification', $term);
$activities = get_field('activities', $term);
$certificate__num = get_field('certificate__num', $term);
$issue__date = get_field('issue__date', $term);
$expiration__date = get_field('expiration__date', $term);

?>

<?php
            

    $my_posts  = get_posts( array(
        'post_type'      => 'post',
        'tax_query' => array(                                  // элемент (термин) таксономии 
            array(
                'taxonomy' => 'experts',         // таксономия 
                'field'    => 'experts',
                'terms'    => 'experts' // термин 
            )
        ),
        'posts_per_page' => -1         // кол-во записей (-1 все) 
    ) );

    foreach( $my_posts as $post ){
        setup_postdata( $post );
        
        ?>

        <div class="experts_item">

            <div class="experts_name">

                <p class="name"><?php echo $name; ?></p>
                <p class="description_data"><?php echo $degree; ?></p>

            </div>

            <div class="experts_data">
                
                <?php 
                    if ( get_field("qualification") ){
                        ?>
                    
                            <div class="data_items">

                                <p class="title_data">Квалификация:</p>
                                <p class="description_data"><?php the_field("qualification"); ?></p>

                            </div>
                
                        <?php

                    }
                
                ?>
                
                <?php 
                    if ( get_field("activities") ){
                        ?>
                    
                            <div class="data_items">

                                <p class="title_data">Направление деятельности:</p>
                                <p class="description_data"><?php the_field("activities"); ?></p>

                            </div>
                
                        <?php

                    }
                
                ?>
                
                <?php 
                    if ( get_field("certificate__num") ){
                        ?>
                    
                            <div class="data_items">

                                <p class="title_data">Номер аттестата:</p>
                                <p class="description_data"><?php the_field("certificate__num"); ?></p>

                            </div>
                
                        <?php

                    }
                
                ?>
                
                <?php 
                    if ( get_field("issue__date") ){
                        ?>
                    
                            <div class="data_items">

                                <p class="title_data">Период действия:</p>
                                <p class="description_data"><?php the_field("issue__date"); ?> - <?php the_field("expiration__date"); ?></p>

                            </div>
                
                        <?php

                    }
                
                ?>

            </div>

        </div>
            

        <?php
        
    }

    wp_reset_postdata(); // сброс
        
?>
