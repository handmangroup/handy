<?php
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Theme\ThemeSettings;
use Drupal\system\Form\ThemeSettingsForm;
use Drupal\Core\Form;

function handy_form_system_theme_settings_alter(&$form, Drupal\Core\Form\FormStateInterface $form_state) {
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
}


