<section id="amenidades" class="py-5 bg-light">
  <div class="container py-5">
    <div class="text-center mb-5">
      <h2 class="display-4 fw-bold mb-3">Amenidades</h2>
      <p class="fs-5 text-muted mx-auto" style="max-width: 800px;">Todo lo que necesitas para una estadía perfecta en la Patagonia chilena</p>
    </div>

    <div class="row g-4">
      <?php
      if( have_rows('features_items') ):
        while( have_rows('features_items') ): the_row();
          $icon = get_sub_field('feature_icon_class');
          $f_title = get_sub_field('feature_title');
          $f_text = get_sub_field('feature_text');
      ?>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card feature-card h-100 border-0 shadow-sm p-4">
            <div class="card-body">
              <div class="feature-icon mb-4"><i class="<?php echo esc_attr($icon); ?>"></i></div>
              <h3 class="h4 fw-semibold mb-3"><?php echo esc_html($f_title); ?></h3>
              <p class="text-muted"><?php echo esc_html($f_text); ?></p>
            </div>
          </div>
        </div>
      <?php
        endwhile;
      else:
        // Fallback estático si no hay items definidos en ACF
      ?>
        <div class="col-12"><p class="text-muted">Agrega amenidades desde el editor (ACF - Features).</p></div>
      <?php endif; ?>
    </div>
  </div>
</section>
