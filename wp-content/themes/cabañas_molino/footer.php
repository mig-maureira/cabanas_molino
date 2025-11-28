</main>
<footer class="bg-dark text-white py-5">
  <div class="container">
    <div class="row g-4 mb-4">
      <div class="col-12 col-md-4">
        <h3 class="h3 fw-bold mb-3"><?php echo esc_html( get_field('footer_brand', 'option') ?: 'Cabañas El Molino' ); ?></h3>
        <p class="text-white-50"><?php echo wp_kses_post( get_field('footer_text', 'option') ?: 'Tu refugio perfecto en el Lago Llanquihue.' ); ?></p>
      </div>
      <div class="col-12 col-md-4">
        <h4 class="h5 fw-semibold mb-3">Enlaces</h4>
        <ul class="list-unstyled">
          <li><a href="#amenidades" class="text-white-50 text-decoration-none">Amenidades</a></li>
          <li><a href="#contacto" class="text-white-50 text-decoration-none">Contacto</a></li>
        </ul>
      </div>
      <div class="col-12 col-md-4">
        <h4 class="h5 fw-semibold mb-3">Horario de Atención</h4>
        <p class="text-white-50 mb-0">Lunes - Domingo<br>9:00 AM - 8:00 PM</p>
      </div>
    </div>

    <div class="border-top border-secondary pt-4 text-center">
      <p class="text-white-50 mb-0">&copy; <span id="year"><?php echo date('Y'); ?></span> <?php echo esc_html( get_bloginfo('name') ); ?>. Todos los derechos reservados.</p>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
