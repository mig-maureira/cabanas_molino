<section class="py-5" style="background-color: #f8f9fa;">
  <div class="container py-5">
    <div class="text-center mb-5">
      <h2 class="display-4 fw-bold mb-3">Nuestras Cabañas</h2>
      <p class="fs-5 text-muted mx-auto" style="max-width: 800px;">Espacios diseñados para tu confort y disfrute</p>
    </div>

    <div class="row g-4">
      <?php
      if( have_rows('gallery_items') ):
        while( have_rows('gallery_items') ): the_row();
          $img = get_sub_field('gallery_image');
          $gtitle = get_sub_field('gallery_title');
      ?>
        <div class="col-12 col-md-4">
          <div class="gallery-item shadow">
            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($gtitle); ?>">
            <div class="gallery-overlay">
              <h3 class="gallery-title"><?php echo esc_html($gtitle); ?></h3>
            </div>
          </div>
        </div>
      <?php
        endwhile;
      else:
      ?>
        <div class="col-12"><p class="text-muted">Agrega imágenes a la galería desde ACF.</p></div>
      <?php endif; ?>
    </div>
  </div>
</section>
