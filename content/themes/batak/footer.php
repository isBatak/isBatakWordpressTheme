

		<?php wp_footer() ?>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/app.module.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/app.states.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/app.controller.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/shared/preloader/preloaderDirective.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/components/home/homeController.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/components/home/homeService.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/components/blog/blogController.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/components/blog/blogService.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/components/single/singleController.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/components/single/singleService.js"></script>

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-63105401-1', 'auto');
            ga('send', 'pageview');

        </script>

	</body>
</html>
