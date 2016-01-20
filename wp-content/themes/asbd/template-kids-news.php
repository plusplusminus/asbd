<?php 

/* Template Name: Kids News */

get_header();


?>
<main class="page-main">

<?php get_template_part('templates/module/page/section','pagenav-sticky'); ?>

<?php get_template_part('templates/module/section','pagehead'); ?>

<?php get_template_part('templates/module/page/header'); ?>

<?php $pagination = $jlfoundation_theme->child_nav_pagination(); ?>

<div id="submenu"></div>

<?php get_template_part('templates/module/kids-news/content'); ?>

<?php get_template_part('templates/module/page/footer'); ?>

</main>

<?php

get_footer();

?>