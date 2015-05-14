<?php get_header() ?>
<div class="outer-wrapper" ng-app="batakApp" ng-controller="appCtrl">

    <?php  get_template_part( 'partials/nav' ); ?>

    <div id="menuOverlay" class="inner-wrapper loading-mode" ng-class="{'loading-mode': toSplash}">

        <div preloader></div>

        <!-- Main Content -->
        <div ui-view class="container-fluid">

        </div>

    </div>
</div>
<?php get_footer() ?>