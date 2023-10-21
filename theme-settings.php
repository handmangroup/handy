<?php
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Theme\ThemeSettings;
use Drupal\system\Form\ThemeSettingsForm;
use Drupal\Core\Form;

function handy_form_system_theme_settings_alter(&$form, Drupal\Core\Form\FormStateInterface $form_state){

  // Menu style options
  $form['st_settings']['tabs']['theme_menu_config'] = array(
    '#type' => 'fieldset',
    '#title' => t('Menu setting'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['st_settings']['tabs']['theme_menu_config']['theme_menu'] = array(
    '#type' => 'select',
    '#title' => t('Menu Type'),
    '#default_value' => theme_get_setting('theme_menu', 'handy'),
    '#options' => array(
      'menudefault' => t('White - Default'),
      'menu_light' => t('Light'),
      'menu_dark' => t('Dark')
    ),
  );
}



