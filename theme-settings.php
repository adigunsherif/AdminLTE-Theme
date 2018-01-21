<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function adminlte_theme_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['adminlte_theme_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('adminlte_theme Theme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );
  $form['adminlte_theme_settings']['breadcrumbs'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show breadcrumbs in a page'),
    '#default_value' => theme_get_setting('breadcrumbs','adminlte_theme'),
    '#description'   => t("Check this option to show breadcrumbs in page. Uncheck to hide."),
  );

}
