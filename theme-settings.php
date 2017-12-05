<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function admin_lte_theme_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['admin_lte_theme_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('admin_lte_theme Theme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );
  $form['admin_lte_theme_settings']['breadcrumbs'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show breadcrumbs in a page'),
    '#default_value' => theme_get_setting('breadcrumbs','admin_lte_theme'),
    '#description'   => t("Check this option to show breadcrumbs in page. Uncheck to hide."),
  );

}
