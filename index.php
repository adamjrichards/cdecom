<?php

namespace allcom;

set_include_path( "." );
include "all_containers/all_head_tag.php";
include "all_containers/all_body_tag.php";
include "all_containers/all_header_tag.php";
include "all_containers/all_sidebar_left.php";
include "all_containers/all_main_tag.php";
include "all_containers/all_footer_tag.php";

$the_html_code = $the_head_opener;
$the_html_code .= $the_head_content;
$the_html_code .= $the_head_closer;
$the_html_code .= $the_body_opener;
$the_html_code .= $the_header_opener;
$the_html_code .= $the_header_content;
$the_html_code .= $the_header_closer;
$the_html_code .= $the_left_sidebar_opener;
$the_html_code .= $the_left_sidebar_content;
$the_html_code .= $the_left_sidebar_closer;
$the_html_code .= $the_main_opener;
$the_html_code .= $the_main_content;
$the_html_code .= $the_main_closer;
//$the_html_code .= $the_footer_opener;
//$the_html_code .= $the_footer_closer;
$the_html_code .= $the_body_closer;

echo $the_html_code;