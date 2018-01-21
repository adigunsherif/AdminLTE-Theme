<?php
/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */
function adminlte_theme_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

/**
 * Insert themed breadcrumb page navigation at top of the node content.
 */
function adminlte_theme_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Use CSS to hide titile .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    // comment below line to hide current page to breadcrumb
	$breadcrumb[] = drupal_get_title();
    $output .= '<nav class="breadcrumb">' . implode(' � ', $breadcrumb) . '</nav>';
    return $output;
  }
}


/**
 * Override or insert variables into the page template.
 */
function adminlte_theme_preprocess_page(&$variables) {
  if (isset($variables['main_menu'])) {
    $variables['main_menu'] = theme('links__system_main_menu', array(
      'links' => $variables['main_menu'],
      'attributes' => array(
        'class' => array('links', 'main-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $variables['main_menu'] = FALSE;
  }
  if (isset($variables['secondary_menu'])) {
    $variables['secondary_menu'] = theme('links__system_secondary_menu', array(
      'links' => $variables['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'secondary-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $variables['secondary_menu'] = FALSE;
  }
}


/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function adminlte_theme_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

/**
 * Override or insert variables into the node template.
 */
function adminlte_theme_preprocess_node(&$variables) {
  $node = $variables['node'];
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}


function adminlte_theme_page_alter($page) {
  // <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
    'name' =>  'viewport',
    'content' =>  'width=device-width',
	'initial-scale' => 1,
    )
  );
  drupal_add_html_head($viewport, 'viewport');
}


/**
 * Overrides theme_menu_tree().
 * Add bootstrap 'sidebar-menu' class to the first ul in sidebar menu
 */

function adminlte_theme_menu_tree($variables) {
  return '<ul class="menu sidebar-menu">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_menu_link().
 */
function adminlte_theme_menu_link(array $variables) {

  switch($variables['theme_hook_original']){

	case 'menu_link__main_menu':

		$element = $variables['element'];
		$sub_menu = '';

		if ($element['#below']) {
		  // Wrap in dropdown-menu.
		  unset($element['#below']['#theme_wrappers']);
		  $sub_menu = '<ul class="menu treeview-menu menu-open">' . drupal_render($element['#below']) . '</ul>';
		}
		$output = l($element['#title'], $element['#href'], $element['#localized_options']);

		// if link class is active, make li class as active too
		if(strpos($output,"active")>0){
		  $element['#attributes']['class'][] = "active";
		}
		return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
	break;

  }

}
