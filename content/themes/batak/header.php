<!DOCTYPE html >
    <html class="<?php language_attributes() ?>>
    <head>
        <?php  get_template_part( 'partials/signature' ); ?>

        <meta charset="<?php bloginfo( 'charset' ) ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title( '|', true, 'right' ) ?></title>
		<meta name="author" content="">
		<link rel="author" href="">

        <!-- For IE 9 and below. ICO should be 32x32 pixels in size -->
        <!--[if IE]><link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico"><![endif]-->

        <!-- Touch Icons - iOS and Android 2.1+ 180x180 pixels in size. -->
        <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-precomposed.png">

        <!-- Firefox, Chrome, Safari, IE 11+ and Opera. 196x196 pixels in size. -->
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">

		<?php wp_head() ?>

        <script>
            var wp_global = {
                template_directory_uri:   '<?php echo get_template_directory_uri(); ?>'
            };
        </script>

    </head>

    <body <?php body_class(); ?>>

        <!--[if lt IE 9]>
        <p class="browserupgrade">Koristite <strong>zastarjelu</strong> verziju internet preglednika. Molimo Vas <a href="http://browsehappy.com/">ažurirajte svoj preglednik</a> kako bi unaprijedili prikaz stranice.</p>
        <![endif]-->

