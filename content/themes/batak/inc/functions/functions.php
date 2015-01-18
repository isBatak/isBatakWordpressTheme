<?php

/**
* This function defines the custom post type for Portfolio
*
* @since 1.0
*/
function create_post_type()
{
    register_post_type(
    batak_portfolio,
    array(
    "labels" => array(
    "name" => __("Portfolios", "batak"),
    "singular_name" => __("portfolio", "batak")
    ),
    "public" => true,
    "menu_positions" => 5,
    "rewrite" => array(
    "slug" => "portfolios"
    )
    )
    );
}

add_action("init", "create_post_type");
