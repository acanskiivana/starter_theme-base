<?php
// Ensure ACF is installed.
if( !function_exists('get_field') ) {
    return;
}

?>


<?php
// Get ACF fields

$padding_top = get_field_object( 'section_top_padding' );
$padding_top_value = $padding_top['value'];

$padding_bottom = get_field_object( 'section_bottom_padding' );
$padding_bottom_value = $padding_bottom['value'];

$section_title = get_field('section_title');
$section_content = get_field('section_content');
$slider_images = get_field('hero_slider');
?>

<!-- Hero header  -->
<section class="container grid-container hero-slider <?php  echo ($padding_top_value) ? $padding_top_value : 'padding-top-L'; ?> <?php  echo ($padding_bottom_value) ? $padding_bottom_value : 'padding-bottom-L'; ?>">
    <div class="section-header col-12 col-sm-9 col-md-7">

        <?php if ( $section_title ) : ?>
        <h1 class="section-title"><?php echo esc_html($section_title); ?> </h1>
        <?php endif; ?>

        <?php if ( $section_content ) : ?>
        <p class="section-title"><?php echo esc_html($section_content); ?> </p>
        <?php endif; ?>
    </div>
    <div class="col-12 col-lg-5 hero-slider__arrows">
        <div class="slick-arrows">
            <button class="slick-arrow slick-arrow__prev"><img
                    src="<?php echo esc_url(get_template_directory_uri() . '/images/arrow-icon.png'); ?>"
                    alt=""></button>
            <button class="slick-arrow slick-arrow__next"><img
                    src="<?php echo esc_url(get_template_directory_uri() . '/images/arrow-icon.png'); ?>"
                    alt=""></button>
        </div>
    </div>
</section>

<!-- Hero slider  -->
<?php 
if( $slider_images ): ?>

    <section class="hero-slider-slick hero-slider__container">
        <?php foreach( $slider_images as $image ): ?>
        <div>
            <div class="hero-slider__img">

                <picture class="background-image">
                    <!-- Mobile Image -->
                    <source media="(max-width: 600px)" srcset="<?php echo esc_url($image['sizes']['medium']); ?>">
                    <!-- Desktop Image -->
                    <source media="(max-width: 1024px)" srcset="<?php echo esc_url($image['sizes']['large']); ?>">
                    <!-- Fallback Image -->
                    <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url($image['sizes']['extra-large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </picture>
            </div>
        </div>
        <?php endforeach; ?>
    </section>

<?php endif; ?>