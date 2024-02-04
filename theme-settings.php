<?php
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Theme\ThemeSettings;
use Drupal\system\Form\ThemeSettingsForm;
use Drupal\Core\Form;

function handy_form_system_theme_settings_alter(&$form, Drupal\Core\Form\FormStateInterface $form_state){
  $form['st_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Handy Theme Settings'),
    '#collapsible' => true,
    '#collapsed' => true,
  );

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

  // Color options
  $form['st_settings']['tabs']['theme_color_config'] = array(
    '#type' => 'fieldset',
    '#title' => t('Color setting'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['st_settings']['tabs']['theme_color_config']['theme_color'] = array(
    '#type' => 'select',
    '#title' => t('Color'),
    '#default_value' => theme_get_setting('theme_color'),
    '#options'  => array(
      'default'           => t('Default'),
      'aqua'              => t('Aqua'),
      'fuchsia'             => t('Fuchsia'),
      'grape'           => t('Grape'),
      'green'       => t('Green'),
      'leaf'            => t('Leaf'),
      'navy'            => t('Navy'),
      'orange'             => t('Orange'),
      'pink'           => t('Pink'),
      'purple'           => t('Purple'),
      'red'           => t('Red'),
      'sky'           => t('Sky'),
      'violet'           => t('Violet'),
      'yellow'           => t('Yellow')
    ),
  );
}



