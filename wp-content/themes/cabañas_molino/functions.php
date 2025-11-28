<?php
// Evitar acceso directo
if ( ! defined( 'ABSPATH' ) ) exit;

/* -------------------------
   Soporte y Menús
   ------------------------- */
function cem_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array('search-form','comment-form','gallery','caption') );
    register_nav_menus( array(
        'primary' => __('Menú Principal', 'cabanas-el-molino'),
    ) );
}
add_action( 'after_setup_theme', 'cem_setup' );

/* -------------------------
   Enqueue estilos y scripts
   ------------------------- */
function cem_assets() {
    wp_enqueue_style( 'bootstrap-cdn', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), null );
    wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css', array(), null );
    wp_enqueue_style( 'cem-main', get_template_directory_uri() . '/assets/css/main.css', array(), filemtime( get_template_directory() . '/assets/css/main.css' ) );
    wp_enqueue_script( 'bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), null, true );
    wp_enqueue_script( 'cem-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), filemtime( get_template_directory() . '/assets/js/main.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'cem_assets' );

/* -------------------------
   ACF: registrar campos localmente si ACF está activo
   (Esto crea los grupos de campos automáticamente)
   ------------------------- */
add_action('acf/init', 'cem_acf_local_field_groups');
function cem_acf_local_field_groups() {
    if( ! function_exists('acf_add_local_field_group') ) return;

    // Front Page — Hero
    acf_add_local_field_group(array(
        'key' => 'group_cem_hero',
        'title' => 'Hero - Página de Inicio',
        'fields' => array(
            array(
                'key' => 'field_cem_hero_background',
                'label' => 'Imagen Hero (background)',
                'name' => 'hero_background',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_cem_hero_title',
                'label' => 'Título Hero',
                'name' => 'hero_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_cem_hero_subtitle',
                'label' => 'Subtítulo Hero',
                'name' => 'hero_subtitle',
                'type' => 'text',
            ),
            array(
                'key' => 'field_cem_hero_text',
                'label' => 'Texto hero (parrafo)',
                'name' => 'hero_text',
                'type' => 'wysiwyg',
                'toolbar' => 'basic',
            ),
            array(
                'key' => 'field_cem_hero_cta_primary',
                'label' => 'CTA principal (texto)',
                'name' => 'hero_cta_primary',
                'type' => 'text',
                'default_value' => 'Reservar Ahora'
            ),
            array(
                'key' => 'field_cem_hero_cta_primary_url',
                'label' => 'CTA principal (url)',
                'name' => 'hero_cta_primary_url',
                'type' => 'url',
            ),
            array(
                'key' => 'field_cem_hero_cta_secondary',
                'label' => 'CTA secundario (texto)',
                'name' => 'hero_cta_secondary',
                'type' => 'text',
                'default_value' => 'Conocer Más'
            ),
            array(
                'key' => 'field_cem_hero_cta_secondary_url',
                'label' => 'CTA secundario (url)',
                'name' => 'hero_cta_secondary_url',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-frontpage.php'
                ),
            ),
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => 'front_page'
                )
            )
        ),
    ));

    // Amenidades - Repeater
    acf_add_local_field_group(array(
        'key' => 'group_cem_features',
        'title' => 'Amenidades / Features',
        'fields' => array(
            array(
                'key' => 'field_cem_features_repeater',
                'label' => 'Items de Amenidades',
                'name' => 'features_items',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_cem_feature_icon',
                        'label' => 'Clase icono (p. ej. bi bi-tree)',
                        'name' => 'feature_icon_class',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_cem_feature_title',
                        'label' => 'Título',
                        'name' => 'feature_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_cem_feature_text',
                        'label' => 'Texto',
                        'name' => 'feature_text',
                        'type' => 'text',
                    ),
                ),
                'min' => 0,
                'layout' => 'row',
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-frontpage.php'
                ),
            )
        ),
    ));

    // Galería - Repeater (imagenes + título)
    acf_add_local_field_group(array(
        'key' => 'group_cem_gallery',
        'title' => 'Galería - Página de Inicio',
        'fields' => array(
            array(
                'key' => 'field_cem_gallery_repeater',
                'label' => 'Galería items',
                'name' => 'gallery_items',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_cem_gallery_image',
                        'label' => 'Imagen',
                        'name' => 'gallery_image',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                    ),
                    array(
                        'key' => 'field_cem_gallery_title',
                        'label' => 'Título overlay',
                        'name' => 'gallery_title',
                        'type' => 'text',
                    )
                ),
                'min' => 0,
                'layout' => 'row',
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-frontpage.php'
                ),
            )
        ),
    ));

    // Contacto / Ubicación (texto)
    acf_add_local_field_group(array(
        'key' => 'group_cem_contact',
        'title' => 'Contacto / Ubicación',
        'fields' => array(
            array(
                'key' => 'field_cem_contact_title',
                'label' => 'Título sección ubicación',
                'name' => 'contact_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_cem_contact_text',
                'label' => 'Texto ubicación (WYSIWYG)',
                'name' => 'contact_text',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'field_cem_maps_iframe',
                'label' => 'Iframe Google Maps (url)',
                'name' => 'maps_iframe',
                'type' => 'textarea',
                'instructions' => 'Pega el src del iframe o todo el iframe si quieres',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-frontpage.php'
                ),
            )
        ),
    ));

    // Footer - textos
    acf_add_local_field_group(array(
        'key' => 'group_cem_footer',
        'title' => 'Footer',
        'fields' => array(
            array(
                'key' => 'field_cem_footer_brand',
                'label' => 'Nombre/Marca footer',
                'name' => 'footer_brand',
                'type' => 'text',
            ),
            array(
                'key' => 'field_cem_footer_text',
                'label' => 'Texto footer (pequeño)',
                'name' => 'footer_text',
                'type' => 'wysiwyg',
                'toolbar' => 'basic'
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page', // también puedes elegir options_page si lo prefieres
                    'operator' => '==',
                    'value' => 'acf-options'
                ),
            )
        ),
    ));
}
