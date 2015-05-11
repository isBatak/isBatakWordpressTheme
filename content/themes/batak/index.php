<?php get_header() ?>
<div class="outer-wrapper">

    <?php  get_template_part( 'partials/nav' ); ?>

    <div id="menuOverlay" class="inner-wrapper">
        <div ui-view></div>
    </div>

</div>
<?php get_footer() ?>