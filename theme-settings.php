<?php
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Theme\ThemeSettings;
use Drupal\system\Form\ThemeSettingsForm;
use Drupal\Core\Form;

function handy_form_system_theme_settings_alter(&$form, Drupal\Core\Form\FormStateInterface $form_state) {
  $form['#attached']['library'][] = 'bootstrap_barrio/color-picker';

  $color_config = [
    'colors' => [
      'bootstrap_barrio_base_primary_color' => 'Primary base color',
      'bootstrap_barrio_base_secondary_color' => 'Secondary base color',
      'bootstrap_barrio_base_tertiary_color' => 'Tertiary base color',
    ],
  ];

  $form['handy_settings'] = array(
    '#type' => 'details',
    '#title' => t('Menu and Footer Settings'),
    '#group' => 'bootstrap',
  );

  // Menu style options
  $form['handy_settings']['tabs']['theme_menu_config'] = array(
    '#type' => 'fieldset',
    '#title' => t('Menu Styles'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['handy_settings']['tabs']['theme_menu_config']['theme_menu'] = array(
    '#type' => 'select',
    '#title' => t('Menu Background Color'),
    '#default_value' => theme_get_setting('theme_menu','handy'),
    '#options'  => array(
      'menu_light'	=> t('White - Default'),
      'menu_dark' 	=> t('Black'),
      'bg-primary'	=> t('Primary color'),
      'bg-secondary'	=> t('Secondary color'),
      'bg-gray' => t('Gray')
    ),
  );

  $form['handy_settings']['tabs']['theme_menu_config']['link_color'] = array(
    '#type' => 'select',
    '#title' => t('Menu Text Color'),
    '#default_value' => theme_get_setting('link_color','handy'),
    '#options'  => array(
      'link-dark' 	=> t('Black - Default'),
      'link-light'	=> t('White'),
      'link-primary'	=> t('Primary color'),
      'link-secondary'	=> t('Secondary color'),
      'link-gray' => t('Gray')
    ),
  );

  $form['handy_settings']['tabs']['theme_menu_config']['dropdown_link_color'] = array(
    '#type' => 'select',
    '#title' => t('Menu Dropdown Text Color'),
    '#default_value' => theme_get_setting('dropdown_link_color','handy'),
    '#options'  => array(
      'link-dark' 	=> t('Black - Default'),
      'link-light'	=> t('White'),
      'link-primary'	=> t('Primary color'),
      'link-secondary'	=> t('Secondary color'),
      'link-gray' => t('Gray')
    ),
  );

  $form['handy_settings']['tabs']['theme_menu_config']['dropdown_color'] = array(
    '#type' => 'select',
    '#title' => t('Menu Dropdown Background Color'),
    '#default_value' => theme_get_setting('dropdown_color','handy'),
    '#options'  => array(
      'bg_light'	=> t('White - Default'),
      'bg_dark' 	=> t('Black'),
      'bg-primary'	=> t('Primary color'),
      'bg-secondary'	=> t('Secondary color'),
      'bg-gray' => t('Gray')
    ),
  );

  $form['handy_settings']['tabs']['theme_menu_config']['theme_menu_alignment'] = array(
    '#type' => 'select',
    '#title' => t('Menu Alignment'),
    '#default_value' => theme_get_setting('theme_menu_alignment','handy'),
    '#options'  => array(
      'justify-content-start'	=> t('Left'),
      'justify-content-center' 	=> t('Center'),
      'justify-content-end'	=> t('Right')
    ),
  );

  $form['handy_settings']['tabs']['theme_menu_config']['link_size'] = array(
    '#type' => 'select',
    '#title' => t('Menu Font Size'),
    '#default_value' => theme_get_setting('link_size','handy'),
    '#options'  => array(
      'fs-sm'	=> t('Small'),
      'fs-base' 	=> t('Base'),
      'fs-lg'	=> t('Large')
    ),
  );

  // Footer options
  $form['handy_settings']['tabs']['theme_footer_config'] = array(
    '#type' => 'fieldset',
    '#title' => t('Footer Styles'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['handy_settings']['tabs']['theme_footer_config']['footer_classes'] = array(
    '#type' => 'select',
    '#title' => t('Footer Background Color'),
    '#default_value' => theme_get_setting('footer_classes','handy'),
    '#options'  => array(
      '' => t('None'),
      'bg-light'	=> t('White - Default'),
      'bg-primary'	=> t('Primary color'),
      'bg-secondary'	=> t('Secondary color'),
      'bg-dark' 	=> t('Black'),
      'bg-gray' => t('Gray')
    ),
  );

  $form['components']['navbar'] = [
    '#type' => 'hidden',
    '#title' => t('Navbar structure'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#disabled' => TRUE,
  ];

  $form['page_title'] = array(
    '#type' => 'details',
    '#title' => t('Page Title Options'),
    '#group' => 'bootstrap',
  );

  $form['page_title']['tabs']['title_config'] = array(
    '#type' => 'fieldset',
    '#title' => t('Page Title Style'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['page_title']['tabs']['title_config']['title_size'] = [
    '#type' => 'select',
    '#title' => t('Title Font Size'),
    '#default_value' => theme_get_setting('title_size'),
    '#options'  => array(
      'fs-45'	=> t('Smaller'),
      'title'	=> t('Default'),
      'fs-75'	=> t('Larger'),
      'fs-100'	=> t('Extra Large'),
    ),
  ];

  $form['page_title']['tabs']['title_config']['title_weight'] = [
    '#type' => 'select',
    '#title' => t('Title Font Weight'),
    '#default_value' => theme_get_setting('title_weight'),
    '#options'  => array(
      'fw-lighter'	=> t('Lighter'),
      'fw-light'	=> t('Light'),
      'fw-normal'	=> t('Normal'),
      'fw-bold'	=> t('Bold'),
      'fw-bolder'	=> t('Bolder'),
    ),
  ];

  $form['page_title']['tabs']['title_config']['title_alignment'] = [
    '#type' => 'select',
    '#title' => t('Title Alignment'),
    '#default_value' => theme_get_setting('title_alignment'),
    '#options'  => array(
      'text-start'	=> t('Left'),
      'text-center'	=> t('Center'),
      'text-end'	=> t('Right'),
    ),
  ];

  $form['fonts']['fonts']['bootstrap_barrio_google_fonts'] = [
    '#type' => 'select',
    '#title' => t('Google Fonts combination'),
    '#default_value' => theme_get_setting('bootstrap_barrio_google_fonts'),
    '#empty_option' => t('None'),
    '#options' => [
      'space' => t('Space'),
      'roboto' => t('Roboto Condensed, Roboto'),
      'monserrat_lato' => t('Monserrat, Lato'),
      'alegreya_roboto' => t('Alegreya, Roboto Condensed, Roboto'),
      'dancing_garamond' => t('Dancing Script, EB Garamond'),
      'amatic_josefin' => t('Amatic SC, Josefin Sans'),
      'oswald_droid' => t('Oswald, Droid Serif'),
      'playfair_alice' => t('Playfair Display, Alice'),
      'dosis_opensans' => t('Dosis, Open Sans'),
      'lato_hotel' => t('Lato, Grand Hotel'),
      'medula_abel' => t('Medula One, Abel'),
      'fjalla_cantarell' => t('Fjalla One, Cantarell'),
      'coustard_leckerli' => t('Coustard Ultra, Leckerli One'),
      'philosopher_muli' => t('Philosopher, Muli'),
      'vollkorn_exo' => t('Vollkorn, Exo'),
    ],
  ];

  // Colors.
  $form['colors'] = [
    '#type' => 'details',
    '#title' => t('Colors'),
    '#group' => 'bootstrap',
  ];

  $form['colors']['scheme'] = [
    '#type' => 'details',
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#title' => t('Barrio Color Scheme Settings'),
  ];
  $form['colors']['scheme']['bootstrap_barrio_enable_color'] = [
    '#type' => 'checkbox',
    '#title' => t('Enable color Scheme'),
    '#default_value' => theme_get_setting('bootstrap_barrio_enable_color'),
    '#ajax' => [
      'callback' => 'colorCallback',
      'wrapper' => 'color_container',
    ],
  ];
  $form['colors']['scheme']['bootstrap_barrio_scheme_description'] = [
    '#type' => 'html_tag',
    '#tag' => 'p',
    '#value' => t('These settings adjust the look and feel of the barrio based themes. Changing the colors below will change the basic color values the barrio based theme uses.'),
  ];
  $form['colors']['scheme']['color_container'] = [
    '#type' => 'container',
    '#attributes' => [
      'id' => 'color_container'
    ],
  ];

  if ($form_state->getValue('bootstrap_barrio_enable_color', theme_get_setting('bootstrap_barrio_enable_color'))) {
    foreach ($color_config['colors'] as $key => $title) {
      $form['colors']['scheme']['color_container'][$key] = [
        '#type' => 'textfield',
        '#maxlength' => 7,
        '#size' => 10,
        '#title' => t($title),
        '#description' => t('Enter color in full hexadecimal format (#abc123).') . '<br/>' . t('Derivatives will be formed from this color.'),
        '#default_value' => theme_get_setting($key),
        '#attributes' => [
          'pattern' => '^#[a-fA-F0-9]{6}',
        ],
        '#wrapper_attributes' => [
          'data-drupal-selector' => 'barrio-color-picker',
        ],
      ];
    }
    $form['colors']['scheme']['color_container']['bootstrap_barrio_body_color'] = [
      '#type' => 'select',
      '#title' => t('Body color'),
      '#default_value' => theme_get_setting('bootstrap_barrio_body_color') ?? 'gray-800',
      '#options' => [
        'gray-800' => t('Dark gray'),
        'black' => t('Black'),
      ],
    ];
    $form['colors']['scheme']['color_container']['bootstrap_barrio_body_bg_color'] = [
      '#type' => 'select',
      '#title' => t('Body Background Color'),
      '#default_value' => theme_get_setting('bootstrap_barrio_body_bg_color') ?? 'white',
      '#options' => [
        'white' => t('White'),
        'gray-200' => t('Light gray'),
      ],
    ];
    $form['colors']['scheme']['color_container']['bootstrap_barrio_h1_color'] = [
      '#type' => 'select',
      '#title' => t('H1 color'),
      '#default_value' => theme_get_setting('bootstrap_barrio_h1_color') ?? 'base',
      '#options' => [
        'base' => t('Base color'),
        'primary' => t('Primary color'),
        'secondary' => t('Secondary color'),
        'tertiary' => t('Tertiary color'),
      ],
    ];
    $form['colors']['scheme']['color_container']['bootstrap_barrio_h2_color'] = [
      '#type' => 'select',
      '#title' => t('H2 color'),
      '#default_value' => theme_get_setting('bootstrap_barrio_h2_color') ?? 'base',
      '#options' => [
        'base' => t('Base color'),
        'primary' => t('Primary color'),
        'secondary' => t('Secondary color'),
        'tertiary' => t('Tertiary color'),
      ],
    ];
    $form['colors']['scheme']['color_container']['bootstrap_barrio_h3_color'] = [
      '#type' => 'select',
      '#title' => t('H3 color'),
      '#default_value' => theme_get_setting('bootstrap_barrio_h3_color') ?? 'base',
      '#options' => [
        'base' => t('Base color'),
        'primary' => t('Primary color'),
        'secondary' => t('Secondary color'),
        'tertiary' => t('Tertiary color'),
      ],
    ];
  }
}


