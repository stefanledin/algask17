<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class();?>>

        <div class="page-wrapper">
            <div class="mobile-menu">
                <div class="inner">
                    <button class="mobile-menu__close-button">Stäng</button>
                    <ul>
                        <li><a href="#">Plask</a></li>
                        <li><a href="#">Plask</a></li>
                        <li><a href="#">Plask</a></li>
                        <li><a href="#">Plask</a></li>
                        <li><a href="#">Plask</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="page-content">
                <div id="canvas-content-overlay"></div>
                
                <header class="site-header">
                    <div class="site-width flex vertical-center">
                        <div class="site-header__logo-wrapper vertical-center">
                            <div class="site-header__logo-symbol">
                                <a href="<?php echo home_url();?>">
                                    <picture>
                                        <source type="image/svg+xml" srcset="<?php echo asset('img/algask-klubbmarke.svg');?>">
                                        <img src="<?php echo asset('img/algask-klubbmarke.png');?>" alt="Älgå Sportklubb">
                                    </picture>
                                </a>
                            </div>
                            <div class="site-header__logo-text">
                                <a href="<?php echo home_url();?>">
                                    <picture>
                                        <source type="image/svg+xml" srcset="<?php echo asset('img/algask-klubbmarke-text.svg');?>">
                                        <img src="<?php echo asset('img/algask-klubbmarke-text.png');?>" alt="Älgå Sportklubb">
                                    </picture>
                                </a>
                            </div>
                        </div>
                        <div class="site-header__mobile-menu-button-wrapper">
                            <button class="site-header__mobile-menu-button">Meny</button>
                        </div>
                    </div>
                </header>

                <section class="section-wrapper">
                    <div class="site-width">
                        <div class="article-list">
                            <?php if ( have_posts() ) : $i = 0; while ( have_posts() ) : the_post(); ?>
                            <article class="article-list__article">
                                <header class="article-list__article__header">
                                    <time><?php the_time( 'Y-m-d H:i' ); ?></time>
                                    <h2 class="article-list__article__title">
                                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                    </h2>
                                </header>
                                <?php if ( $i == 0 ) : ?>
                                    <?php the_post_thumbnail( ); ?>
                                    <?php the_content(); ?>
                                <?php endif; ?>
                            </article>
                            <hr class="article-list__separator">
                            <?php $i++; endwhile; endif; ?>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        
		
        <?php wp_footer(); ?>
	</body>
</html>