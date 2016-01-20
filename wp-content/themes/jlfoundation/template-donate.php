<?php 

/* Template Name: Donate */

get_header();

?>

<?php get_template_part('templates/module/section','pagehead'); ?>

<?php get_template_part('templates/module/page/section','hero_donate'); ?>

<?php get_template_part('templates/module/page/content','donate'); ?>

<?php get_template_part('templates/module/page/section','donate_tax'); ?>

<?php get_template_part('templates/module/page/section','donate_form'); ?>

<?php get_template_part('templates/module/section','footercta'); ?>


<?php 

get_footer();

?>