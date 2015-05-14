<?php get_header() ?>
<div class="outer-wrapper" ng-app="batakApp" ng-controller="appCtrl">

    <?php  get_template_part( 'partials/nav' ); ?>

    <div id="menuOverlay" class="inner-wrapper loading-mode" ng-class="{'loading-mode': toSplash}">

        <div preloader></div>

        <!-- Main Content -->
        <div class="container-fluid" ng-class="{'b-container-big-padding': !toSplash, }">
            <div class="b-main-content" ui-view>

            </div>
        </div>

    </div>
</div>
<?php get_footer() ?>