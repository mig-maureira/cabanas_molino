<section id="contacto" class="py-5 bg-white">
  <div class="container py-5">
    <div class="row g-5 align-items-center">
      <div class="col-12 col-lg-6">
        <h2 class="display-4 fw-bold mb-4"><?php echo esc_html( get_field('contact_title') ?: 'Ubicación Privilegiada' ); ?></h2>

        <div class="d-flex gap-3 mb-4">
          <div class="location-icon-wrapper bg-primary bg-opacity-10">
            <i class="bi bi-geo-alt-fill text-primary fs-4"></i>
          </div>
          <div>
            <?php echo wp_kses_post( get_field('contact_text') ?: '<h3 class="h5 fw-semibold mb-2">Región de Los Lagos</h3><p class="text-muted mb-0">Ubicadas en las orillas...</p>' ); ?>
          </div>
        </div>

        <a href="<?php echo esc_url( get_field('maps_link') ?: 'https://maps.google.com' ); ?>" target="_blank" class="btn btn-primary btn-lg px-5 py-3 mt-3">Ver en Google Maps</a>
      </div>

      <div class="col-12 col-lg-6">
        <div class="map-container" style="aspect-ratio: 1;">
          <?php
            $iframe = get_field('maps_iframe');
            if( $iframe ){
              echo wp_kses_post( $iframe );
            } else {
              // fallback -- embed simple iframe src
          ?>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d194470.39475582832!2d-72.98668!3d-41.31!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9616335d5c7bb611%3A0x3da7235e52d9e673!2sLago%20Llanquihue!5e0!3m2!1sen!2scl!4v1234567890" width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Ubicación Lago Llanquihue"></iframe>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
