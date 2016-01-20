<?php 

/* Template Name: Child */

get_header();


?>
<main class="page-main">

<?php get_template_part('templates/module/page/section','pagenav-sticky'); ?>

<?php get_template_part('templates/module/section','child_pagehead'); ?>

<?php get_template_part('templates/module/page/header'); ?>

<div id="submenu"></div>

<?php get_template_part('templates/module/page/content'); ?>

<?php get_template_part('templates/module/section','pagenav-inline'); ?>

<?php get_template_part('templates/module/section','footercta'); ?>

<?php get_template_part('templates/module/page/footer'); ?>

</main>

<?php
get_footer();

?>