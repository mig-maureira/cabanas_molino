<?php
// Valores ACF (fallback al HTML estático si no hay ACF)
$bg = get_field('hero_background') ?: get_template_directory_uri() . '/assets/img/hero_llanquihue.jpeg';
$title = get_field('hero_title') ?: 'Cabañas El Molino';
$subtitle = get_field('hero_subtitle') ?: 'Tu refugio en el Lago Llanquihue';
$text = get_field('hero_text') ?: 'Descubre la magia de la Región de Los Lagos. Cabañas de lujo rodeadas de naturaleza...';
$cta1 = get_field('hero_cta_primary') ?: 'Reservar Ahora';
$cta1_url = get_field('hero_cta_primary_url') ?: '#contacto';
$cta2 = get_field('hero_cta_secondary') ?: 'Conocer Más';
$cta2_url = get_field('hero_cta_secondary_url') ?: '#amenidades';
?>
<section class="hero-section" id="inicio" style="background-image: url('<?php echo esc_url($bg); ?>');">
  <div class="hero-overlay"></div>
  <div class="container hero-content text-center">
      <h1 class="display-1 fw-bold mb-4 animate-fade-in"><?php echo esc_html($title); ?></h1>
      <p class="fs-3 mb-4 animate-fade-in"><?php echo esc_html($subtitle); ?></p>
      <p class="fs-5 mb-5 mx-auto animate-fade-in" style="max-width:800px;"><?php echo wp_kses_post( $text ); ?></p>
      <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
          <a href="<?php echo esc_url($cta1_url); ?>" class="btn btn-primary btn-lg px-5 py-3 fs-5"><?php echo esc_html($cta1); ?></a>
          <a href="<?php echo esc_url($cta2_url); ?>" class="btn btn-outline-light btn-lg px-5 py-3 fs-5 border-2"><?php echo esc_html($cta2); ?></a>
      </div>
  </div>
</section>
