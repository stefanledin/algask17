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
        
        <header class="site-header">
            <div class="site-width">
                <div class="site-header__logo-wrapper">
                    <div class="site-header__logo-symbol">
                        <picture>
                            <source type="image/svg+xml" srcset="<?php echo asset('img/algask-klubbmarke.svg');?>">
                            <img src="<?php echo asset('img/algask-klubbmarke.png');?>" alt="Älgå Sportklubb">
                        </picture>
                    </div>
                    <div class="site-header__logo-text">
                        <picture>
                            <source type="image/svg+xml" srcset="<?php echo asset('img/algask-klubbmarke-text.svg');?>">
                            <img src="<?php echo asset('img/algask-klubbmarke-text.png');?>" alt="Älgå Sportklubb">
                        </picture>
                    </div>
                </div>
                <div class="site-header__mobile-menu-button-wrapper">
                    <button class="site-header__mobile-menu-button">Meny</button>
                </div>
            </div>
        </header>
		
        <?php wp_footer(); ?>
	</body>
</html>