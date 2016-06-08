<?php

/**
 * @file
 * Contains marquee.page.inc.
 *
 * Page callback for Marquee entities.
 */

use Drupal\Core\Render\Element;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Prepares variables for Marquee templates.
 *
 * Default template: marquee.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_marquee(array &$variables) {
  // Fetch marquee Entity Object.
  $marquee = $variables['elements']['#marquee'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}

/**
* Prepares variables for a custom entity type creation list templates.
*
* Default template: marquee-content-add-list.html.twig.
*
* @param array $variables
*   An associative array containing:
*   - content: An array of marquee-types.
*
* @see block_content_add_page()
*/
function template_preprocess_marquee_content_add_list(&$variables) {
  $variables['types'] = array();
  $query = \Drupal::request()->query->all();
  foreach ($variables['content'] as $type) {
    $variables['types'][$type->id()] = array(
      'link' => Link::fromTextAndUrl($type->label(), new Url('entity.marquee.add_form', array(
        'marquee_type' => $type->id()
      ), array('query' => $query))),
      'description' => array(
      '#markup' => $type->label(),
      ),
      'title' => $type->label(),
      'localized_options' => array(
      'query' => $query,
      ),
    );
  }
}
