<?php

add_shortcode( 'portfolio__shortcode', 'portfolio__shortcode' );

function portfolio__shortcode() {

	ob_start();
	?>

    <!--            BEGIN            -->

    <section class="portfolio">

        <div class="portfolio__container">

            <div class="services__content">

                <div class="portfolio__headers">

                    <div class="portfolio__images">
                        <picture>
                            <source
                                data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/portfolio__decor.webp"
                                type="image/webp">
                            <source
                                data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/portfolio__decor.avif"
                                type="image/avif">
                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/portfolio__decor.png"
                                alt="">
                        </picture>
                    </div>

                    <ul class="tabs" id="portfolio">
                        <li class="active"><a>Сайты</a></li>
                        <li><a>SMM</a></li>
                        <li><a>Контекст</a></li>
                        <li><a>Брендинг</a></li>
                        <li><a>Презентация</a></li>
                        <li><a>Полиграфия</a></li>
                    </ul>

                    <div class="portfolio__title">
                        <p class="portfolio__header">Портфолио</p>
                        <p class="portfolio__text">Лучшее доказательство<br><span>-</span> это результаты наших клиентов</p>
                    </div>

                </div>

                <div class="tab_container">

                    <div class="tab_content active">

                        <div class="slider__wrapper">

                            <div class="swiper slider">

                                <div class="swiper-wrapper">

                                    <?php
                                        $args = array( 'post_type' => 'portfolio__site', 'posts_per_page' => -1, 'orderby'  => 'meta_key_num', 'order'    => 'ASC' );
                                        $the_query = new WP_Query( $args );
                                        $post_id = 0;
                                    ?>

                                    <?php if ( $the_query->have_posts() ) : ?>
                                        
                                        <?php  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                        

                                        <div class="swiper-slide">

                                            <div class="swiper-slide-image">
                                                <picture>
                                                    <source
                                                        data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/site/item1.webp"
                                                        type="image/webp">
                                                    <source
                                                        data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/site/item1.avif"
                                                        type="image/avif">
                                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/site/item1.png"
                                                        alt="">
                                                </picture>
                                            </div>

                                            <div class="work__header">
                                                <p class="work__title"><?php  the_field('case__title') ?></p>
                                                <p class="work__text"><?php the_field('case__description') ?></p>
                                            </div>

                                            <div class="portfoliobtn">
                                                <button class="btn-more" data-site="<?=$post_id++?>">подробнее</button>
                                            </div>

                                        </div>

                                        <?php endwhile; wp_reset_postdata(); ?>

                                    <?php endif; ?>

                                </div>

                            </div>

                            <div class="swiper-button-prev">

                                <div class="btn__arrow__stroke">

                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                        alt="">

                                    <div class="btn__arrow">
                                        <div class="btn__img">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/left.svg"
                                                alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="swiper-button-next">

                                <div class="btn__arrow__stroke">

                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                        alt="">

                                    <div class="btn__arrow">
                                        <div class="btn__img">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/right.svg"
                                                alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="swiper__mobile">
                                <div class="counter"></div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>

                        <div class="portfolio__content__slider">

                            <div class="portfolio__content__arrows">

                                <div class="swiper-button-content-prev swiper-button-content-prev-site">

                                    <div class="btn__arrow__stroke">

                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                            alt="">

                                        <div class="btn__arrow">
                                            <div class="btn__img">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/left.svg"
                                                    alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="swiper-button-content-next swiper-button-content-next-site">

                                    <div class="btn__arrow__stroke">

                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                            alt="">

                                        <div class="btn__arrow">
                                            <div class="btn__img">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/right.svg"
                                                    alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="pagination__wrapper">
                                <div class="counter-content counter-site"></div>
                                <div class="swiper-pagination-content swiper-pagination-site"></div>
                            </div>

                            <div class="swiper site">

                                <div class="swiper-wrapper">

                                    <?php
                                        $args = array( 'post_type' => 'portfolio__site', 'posts_per_page' => -1, 'orderby'  => 'meta_key_num', 'order'    => 'ASC' );
                                        $the_query = new WP_Query( $args );
                                        $post_id = 0;
                                    ?>

                                    <?php if ( $the_query->have_posts() ) : ?>
                                        
                                        <?php  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                                        <div class="swiper-slide" data-site="<?=$post_id++?>">

                                            <div class="content__work__header">
                                                <p class="title"><?php  the_field('case__title') ?> <span>pro</span></p>
                                                <p class="text"><?php  the_field('case__content__description') ?></p>
                                            </div>

                                            <div class="content__site__images">
                                                <picture>
                                                    <source class="lazy" data-srcset="<?php the_field('site__content__image') ?><?php echo $format = ".webp"; ?>" type="image/webp">
                                                    <img data-lazy-src="<?php  the_field('site__content__image') ?>" alt="">
                                                </picture>
                                            </div>

                                        </div>

                                        <?php endwhile; wp_reset_postdata(); ?>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tab_content">

                        <div class="slider__wrapper">

                            <div class="swiper slider">

                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">

                                        <div class="swiper-slide-image">
                                            <picture>
                                                <source
                                                    data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/smm/item1.webp"
                                                    type="image/webp">
                                                <source
                                                    data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/smm/item1.avif"
                                                    type="image/avif">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/smm/item1.png"
                                                    alt="">
                                            </picture>
                                        </div>

                                        <div class="work__header">
                                            <p class="work__title">Крути Бигуди</p>
                                            <p class="work__text">Кейс упаковки аккаунта салона красоты</p>
                                        </div>

                                        <button class="btn-more" data-smm="0">подробнее</button>

                                    </div>

                                </div>

                            </div>

                            <div class="swiper-button-prev">

                                <div class="btn__arrow__stroke">

                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                        alt="">

                                    <div class="btn__arrow">
                                        <div class="btn__img">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/left.svg"
                                                alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="swiper-button-next">

                                <div class="btn__arrow__stroke">

                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                        alt="">

                                    <div class="btn__arrow">
                                        <div class="btn__img">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/right.svg"
                                                alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="swiper__mobile">
                                <div class="counter"></div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>

                        <div class="portfolio__content__slider">

                            <div class="portfolio__content__arrows">

                                <div class="swiper-button-content-prev swiper-button-content-prev-smm">

                                    <div class="btn__arrow__stroke">

                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                            alt="">

                                        <div class="btn__arrow">
                                            <div class="btn__img">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/left.svg"
                                                    alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="swiper-button-content-next swiper-button-content-next-smm">

                                    <div class="btn__arrow__stroke">

                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                            alt="">

                                        <div class="btn__arrow">
                                            <div class="btn__img">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/right.svg"
                                                    alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="pagination__wrapper">
                                <div class="counter-content counter-smm"></div>
                                <div class="swiper-pagination-content swiper-pagination-smm"></div>
                            </div>

                            <div class="swiper smms">

                                <div class="swiper-wrapper">

                                    <div class="swiper-slide" data-smm="0">

                                        <div class="content__work__header">
                                            <p class="title">Крути Бигуди</p>
                                            <p class="text">Кейс упаковки аккаунта <br>и настройки таргетированной рекламы для салона
                                                красоты.</p>
                                        </div>

                                        <div class="smm__wrapper">

                                            <div class="smm__info">

                                                <div class="smm__info__item">

                                                    <p class="title">Точка А:</p>
                                                    <p class="text">Аккаунт к рекламе не готов, нет единой упаковки аккаунта, хайлайтс
                                                        оформлены в устаревшем стиле. Рекламу раньше настраивали самостоятельно, но не
                                                        эффективно, результатов в виде увеличения клиентов и продаж не было.</p>

                                                </div>

                                                <div class="smm__info__item">

                                                    <p class="title">Задача:</p>
                                                    <p class="text">Подготовить аккаунт к рекламе, сделать свежее, современное оформление,
                                                        разработать новые обложки для хайлайтс. После упаковки аккаунта была задача
                                                        запустить таргетированную рекламу, чтобы набрать моделей на окрашивание.</p>

                                                </div>

                                                <div class="smm__info__item">

                                                    <p class="title">Что было сделано:</p>

                                                    <div class="smm__info__list">
                                                        <li>провели аудит аккаунта;провели анализ по конкурентам, определили целевую
                                                            аудиторию;</li>
                                                        <li>разработали единый стиль аккаунта, а также обложки для актуальных сторис;</li>
                                                        <li>дали рекомендации по дальнейшему ведению аккаунта;</li>
                                                        <li>разработали рекламные креативы и рекламный текст (было разработано 19 креативов
                                                            для ленты и сторис);</li>
                                                        <li>настроили и протестировали рекламные кампании;провели оптимизацию рекламных
                                                            кампаний для повышения результата.</li>
                                                    </div>

                                                </div>

                                                <div class="smm__info__item">

                                                    <p class="title">Точка Б:</p>

                                                    <div class="smm__info__list">
                                                        <li>аккаунт стал стильным и продающим;</li>
                                                        <li>увеличился поток клиентов в салон красоты;</li>
                                                        <li>также были найдены модели на окрашивание для учеников;</li>
                                                        <li>стоимость клика составила в среднем 11 рублей.</li>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="before__after__wrapp">

                                                <div class="smm__item">

                                                    <p class="smm__title before">Аккаунт до</p>

                                                    <div class="smm__images phone">
                                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/smm/item1/img1.png"
                                                            alt="">
                                                    </div>

                                                </div>

                                                <div class="before__after__line"></div>

                                                <div class="smm__item">

                                                    <p class="smm__title">Аккаунт после</p>

                                                    <div class="smm__images phone">
                                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/smm/item1/img2.png"
                                                            alt="">
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="before__after__wrapp">

                                                <div class="smm__item">

                                                    <p class="smm__title before">Оформление до</p>

                                                    <div class="smm__images phone">
                                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/smm/item1/img3.png"
                                                            alt="">
                                                    </div>

                                                </div>

                                                <div class="before__after__line"></div>

                                                <div class="smm__item">

                                                    <p class="smm__title">Оформление после</p>

                                                    <div class="smm__images phone">
                                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/smm/item1/img4.png"
                                                            alt="">
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="smm__item">

                                                <p class="smm__title">Отзывы</p>

                                                <div class="smm__item__row">

                                                    <div class="smm__images">
                                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/smm/item1/img5.png"
                                                            alt="">
                                                    </div>

                                                    <div class="smm__images">
                                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/smm/item1/img6.png"
                                                            alt="">
                                                    </div>

                                                    <div class="smm__images">
                                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/smm/item1/img7.png"
                                                            alt="">
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="smm__item">

                                                <p class="smm__title">Результаты таргетированной рекламы</p>

                                                <div class="smm__item__column">

                                                    <div class="smm__images">
                                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/smm/item1/img8.png"
                                                            alt="">
                                                    </div>

                                                    <div class="smm__images">
                                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/smm/item1/img9.png"
                                                            alt="">

                                                        <div class="smm__images__stats__wrapp">

                                                            <div class="smm__images__stats --bottom__center__stats">

                                                                <div class="stats__list__wrapp">

                                                                    <li><span>Охват: </span>96 047</li>
                                                                    <li><span>Показы: </span>227 158</li>
                                                                    <li><span>Клики: </span>1559</li>
                                                                    <li><span>Плата за клик: </span>11,85₽</li>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tab_content">

                        <div class="slider__wrapper">

                            <div class="swiper slider">

                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">

                                        <div class="swiper-slide-image">
                                            <picture>
                                                <source
                                                    data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/context/item1.webp"
                                                    type="image/webp">
                                                <source
                                                    data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/context/item1.avif"
                                                    type="image/avif">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/context/item1.png"
                                                    alt="">
                                            </picture>
                                        </div>

                                        <div class="work__header">
                                            <p class="work__title">Кроватки</p>
                                        </div>

                                        <div class="work__info__wrapp">

                                            <div class="work__info">
                                                <p class="title">лиды за 10 дней</p>
                                                <p class="text">28</p>
                                            </div>

                                            <div class="work__info">
                                                <p class="title">конверсия сайта</p>
                                                <p class="text">6%</p>
                                            </div>

                                        </div>

                                        <button class="btn-more" data-context="0">подробнее</button>

                                    </div>

                                </div>

                            </div>

                            <div class="swiper-button-prev">

                                <div class="btn__arrow__stroke">

                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                        alt="">

                                    <div class="btn__arrow">
                                        <div class="btn__img">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/left.svg"
                                                alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="swiper-button-next">

                                <div class="btn__arrow__stroke">

                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                        alt="">

                                    <div class="btn__arrow">
                                        <div class="btn__img">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/right.svg"
                                                alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="swiper__mobile">
                                <div class="counter"></div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>

                        <div class="portfolio__content__slider">

                            <div class="portfolio__content__arrows">

                                <div class="swiper-button-content-prev swiper-button-content-prev-context">

                                    <div class="btn__arrow__stroke">

                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                            alt="">

                                        <div class="btn__arrow">
                                            <div class="btn__img">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/left.svg"
                                                    alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="swiper-button-content-next swiper-button-content-next-context">

                                    <div class="btn__arrow__stroke">

                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                            alt="">

                                        <div class="btn__arrow">
                                            <div class="btn__img">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/right.svg"
                                                    alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="pagination__wrapper">
                                <div class="counter-content counter-context"></div>
                                <div class="swiper-pagination-content swiper-pagination-context"></div>
                            </div>

                            <div class="swiper context__content">

                                <div class="swiper-wrapper">

                                    <div class="swiper-slide" data-context="0">

                                        <div class="content__work__header">
                                            <p class="title">Кроватки</p>
                                            <p class="text">Кейс настройка контекстной рекламы <br>
                                                для детских кроваток</p>
                                        </div>

                                        <div class="context__wrapper">

                                            <div class="context__table__image">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/context/item1.png"
                                                    alt="">
                                            </div>

                                            <div class="context__stats__wrapp">

                                                <div class="context__stats">
                                                    <p class="title">Количество лидов за 10 дней:</p>
                                                    <p class="text">28</p>
                                                </div>

                                                <div class="context__stats">
                                                    <p class="title">Цена лида:</p>
                                                    <p class="text">835₽</p>
                                                </div>

                                                <div class="context__stats">
                                                    <p class="title">Конверсия сайта:</p>
                                                    <p class="text">6%</p>
                                                </div>

                                                <div class="context__stats">
                                                    <p class="title">CTR:</p>
                                                    <p class="text">27%</p>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tab_content">

                        <div class="slider__wrapper">

                            <div class="swiper slider">

                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">

                                        <div class="swiper-slide-image">
                                            <picture>
                                                <source
                                                    data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/branding/item1.webp"
                                                    type="image/webp">
                                                <source
                                                    data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/branding/item1.avif"
                                                    type="image/avif">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/branding/item1.png"
                                                    alt="">
                                            </picture>
                                        </div>

                                        <div class="work__header">
                                            <p class="work__title">SMMище</p>
                                            <p class="work__text">логотип</p>
                                        </div>

                                        <button class="btn-more" data-branding="0">подробнее</button>

                                    </div>

                                </div>

                            </div>

                            <div class="swiper-button-prev">

                                <div class="btn__arrow__stroke">

                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                        alt="">

                                    <div class="btn__arrow">
                                        <div class="btn__img">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/left.svg"
                                                alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="swiper-button-next">

                                <div class="btn__arrow__stroke">

                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                        alt="">

                                    <div class="btn__arrow">
                                        <div class="btn__img">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/right.svg"
                                                alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="swiper__mobile">
                                <div class="counter"></div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>

                        <div class="portfolio__content__slider">

                            <div class="portfolio__content__arrows">

                                <div class="swiper-button-content-prev swiper-button-content-prev-branding">

                                    <div class="btn__arrow__stroke">

                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                            alt="">

                                        <div class="btn__arrow">
                                            <div class="btn__img">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/left.svg"
                                                    alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="swiper-button-content-next swiper-button-content-next-branding">

                                    <div class="btn__arrow__stroke">

                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                            alt="">

                                        <div class="btn__arrow">
                                            <div class="btn__img">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/right.svg"
                                                    alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="pagination__wrapper">
                                <div class="counter-content counter-branding"></div>
                                <div class="swiper-pagination-content swiper-pagination-branding"></div>
                            </div>

                            <div class="swiper branding">

                                <div class="swiper-wrapper">

                                    <div class="swiper-slide" data-branding="0">

                                        <div class="content__work__header">
                                            <p class="title">SMMище</p>
                                            <p class="text">Кейс разработка логотипа <br>
                                                для smm агенства</p>
                                        </div>

                                        <div class="branding__content__wrapper">

                                            <div class="branding__images">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/branding/work20/img2.png"
                                                    alt="">
                                            </div>

                                            <div class="branding__images">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/branding/work20/img1.png"
                                                    alt="">
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tab_content">

                        <div class="slider__wrapper">

                            <div class="swiper slider">

                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">

                                        <div class="swiper-slide-image">
                                            <picture>
                                                <source
                                                    data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/presentation/item1.webp"
                                                    type="image/webp">
                                                <source
                                                    data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/presentation/item1.avif"
                                                    type="image/avif">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/presentation/item1.png"
                                                    alt="">
                                            </picture>
                                        </div>

                                        <div class="work__header">
                                            <p class="work__title">Почему это важно?</p>
                                            <p class="work__text">презентация</p>
                                        </div>

                                        <button class="btn-more" data-presentation="0">подробнее</button>

                                    </div>

                                </div>

                            </div>

                            <div class="swiper-button-prev">

                                <div class="btn__arrow__stroke">

                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                        alt="">

                                    <div class="btn__arrow">
                                        <div class="btn__img">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/left.svg"
                                                alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="swiper-button-next">

                                <div class="btn__arrow__stroke">

                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                        alt="">

                                    <div class="btn__arrow">
                                        <div class="btn__img">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/right.svg"
                                                alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="swiper__mobile">
                                <div class="counter"></div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>

                        <div class="portfolio__content__slider">

                            <div class="portfolio__content__arrows">

                                <div class="swiper-button-content-prev swiper-button-content-prev-presentation">

                                    <div class="btn__arrow__stroke">

                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                            alt="">

                                        <div class="btn__arrow">
                                            <div class="btn__img">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/left.svg"
                                                    alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="swiper-button-content-next swiper-button-content-next-presentation">

                                    <div class="btn__arrow__stroke">

                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                            alt="">

                                        <div class="btn__arrow">
                                            <div class="btn__img">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/right.svg"
                                                    alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="pagination__wrapper">
                                <div class="counter-content counter-presentation"></div>
                                <div class="swiper-pagination-content swiper-pagination-presentation"></div>
                            </div>

                            <div class="swiper presentation">

                                <div class="swiper-wrapper">

                                    <div class="swiper-slide" data-presentation="0">

                                        <div class="content__work__header">
                                            <p class="title">Умение слушать и слышать</p>
                                            <p class="text">Кейс разработка презентации <br>
                                                для бизнес школы</p>
                                        </div>

                                        <div class="presentation__work">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/presentation/item1.png"
                                                alt="">
                                        </div>

                                        <div class="presentation__work__mobile">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/presentation/item1-2.png"
                                                alt="">
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tab_content">

                        <div class="slider__wrapper">

                            <div class="swiper slider">

                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">

                                        <div class="swiper-slide-image">
                                            <picture>
                                                <source
                                                    data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/polygraphy/item1.webp"
                                                    type="image/webp">
                                                <source
                                                    data-lazy-srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/polygraphy/item1.avif"
                                                    type="image/avif">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slider/polygraphy/item1.png"
                                                    alt="">
                                            </picture>
                                        </div>

                                        <div class="work__header">
                                            <p class="work__title">Ездун</p>
                                            <p class="work__text">буклет</p>
                                        </div>

                                        <button class="btn-more" data-polygraphy="0">подробнее</button>

                                    </div>

                                </div>

                            </div>

                            <div class="swiper-button-prev">

                                <div class="btn__arrow__stroke">

                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                        alt="">

                                    <div class="btn__arrow">
                                        <div class="btn__img">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/left.svg"
                                                alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="swiper-button-next">

                                <div class="btn__arrow__stroke">

                                    <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                        alt="">

                                    <div class="btn__arrow">
                                        <div class="btn__img">
                                            <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/right.svg"
                                                alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="swiper__mobile">
                                <div class="counter"></div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>

                        <div class="portfolio__content__slider">

                            <div class="portfolio__content__arrows">

                                <div class="swiper-button-content-prev swiper-button-content-prev-polygraphy">

                                    <div class="btn__arrow__stroke">

                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                            alt="">

                                        <div class="btn__arrow">
                                            <div class="btn__img">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/left.svg"
                                                    alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="swiper-button-content-next swiper-button-content-next-polygraphy">

                                    <div class="btn__arrow__stroke">

                                        <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/stroke.svg"
                                            alt="">

                                        <div class="btn__arrow">
                                            <div class="btn__img">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svg/services__arrow/right.svg"
                                                    alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="pagination__wrapper">
                                <div class="counter-content counter-polygraphy"></div>
                                <div class="swiper-pagination-content swiper-pagination-polygraphy"></div>
                            </div>

                            <div class="swiper polygraphy">

                                <div class="swiper-wrapper">

                                    <div class="swiper-slide" data-polygraphy="0">

                                        <div class="content__work__header">
                                            <p class="title">Буклет “Ездун”</p>
                                            <p class="text">Кейс разработка буклетов <br> для портала грузоперевозок</p>
                                        </div>

                                        <div class="polygraphy__work__wrapp">

                                            <div class="polygraphy__work">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/polygraphy/work1/img1.png"
                                                    alt="">
                                            </div>

                                            <div class="polygraphy__work">
                                                <img data-lazy-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pc/polygraphy/work1/img2.png"
                                                    alt="">
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            
            </div>

        </div>

    </section>

    <div class="section__line"></div>

    <!--            CLOSE            -->

<?php

return ob_get_clean();
}