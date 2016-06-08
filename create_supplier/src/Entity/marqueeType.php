<?php

namespace Drupal\create_supplier\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\create_supplier\marqueeTypeInterface;

/**
 * Defines the Marquee type entity.
 *
 * @ConfigEntityType(
 *   id = "marquee_type",
 *   label = @Translation("Marquee type"),
 *   handlers = {
 *     "list_builder" = "Drupal\create_supplier\marqueeTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\create_supplier\Form\marqueeTypeForm",
 *       "edit" = "Drupal\create_supplier\Form\marqueeTypeForm",
 *       "delete" = "Drupal\create_supplier\Form\marqueeTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\create_supplier\marqueeTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "marquee_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "marquee",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/create-supplier/marquee_type/{marquee_type}",
 *     "add-form" = "/admin/structure/create-supplier/marquee_type/add",
 *     "edit-form" = "/admin/structure/create-supplier/marquee_type/{marquee_type}/edit",
 *     "delete-form" = "/admin/structure/create-supplier/marquee_type/{marquee_type}/delete",
 *     "collection" = "/admin/structure/create-supplier/marquee_type"
 *   }
 * )
 */
class marqueeType extends ConfigEntityBundleBase implements marqueeTypeInterface {

  /**
   * The Marquee type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Marquee type label.
   *
   * @var string
   */
  protected $label;

}
