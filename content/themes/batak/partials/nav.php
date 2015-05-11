<!-- Side Menu -->
<div class="side-menu">
    <div class="logo-side-menu hidden-xs">
        <a class="b-brand" href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg"/>
        </a>
    </div>

    <!-- Profile picture -->
    <div class="profile-picture-container">
        <img src="<?php echo get_template_directory_uri(); ?>/images/profile_picture.jpg"/>
    </div>

    <!-- Main Menu -->
    <nav>
        <ul class="nav">

            <li ui-sref-active="active"><a ui-sref="home">Home</a></li>
            <li ui-sref-active="active"><a ui-sref="blog">Blog</a></li>

        </ul>
    </nav>
</div>