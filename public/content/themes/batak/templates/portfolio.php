<?php
/*
* Template Name: Portfolio
*/

//get_header();
?>
<div id="page-content">
    <?php

    //get_template_part('loop', 'page');
    $args = array(
        "post_type" => "batak_portfolio"
    );
    $query = new WP_Query($args);

    while($query -> have_posts()) : $query -> the_post();

    ?>

    <div class="article">
        <h2><?php the_title(); ?></h2>
    </div>

    <?php

    endwhile;
    wp_reset_postdata();

    ?>
</div>
<?php
//get_sidebar();
//get_footer();
?>
