<?php 

/* Template Name: Parent */

get_header();

?>
<?php get_template_part('templates/module/page/section','pagenav-sticky'); ?>

<?php get_template_part('templates/module/page/section','hero'); ?>

<?php get_template_part('templates/module/section','pagehead'); ?>

<?php get_template_part('templates/module/page/section','pagenav-sub'); ?>

<?php get_template_part('templates/module/page/content'); ?>

<?php get_template_part('templates/module/section','pagenav-inline'); ?>

<?php get_template_part('templates/module/section','footercta'); ?>

<?php 

get_footer();

?>