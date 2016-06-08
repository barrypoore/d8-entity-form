<?php

namespace Drupal\create_supplier;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Marquee entities.
 *
 * @ingroup create_supplier
 */
interface marqueeInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Marquee type.
   *
   * @return string
   *   The Marquee type.
   */
  public function getType();

  /**
   * Gets the Marquee name.
   *
   * @return string
   *   Name of the Marquee.
   */
  public function getName();

  /**
   * Sets the Marquee name.
   *
   * @param string $name
   *   The Marquee name.
   *
   * @return \Drupal\create_supplier\marqueeInterface
   *   The called Marquee entity.
   */
  public function setName($name);

  /**
   * Gets the Marquee creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Marquee.
   */
  public function getCreatedTime();

  /**
   * Sets the Marquee creation timestamp.
   *
   * @param int $timestamp
   *   The Marquee creation timestamp.
   *
   * @return \Drupal\create_supplier\marqueeInterface
   *   The called Marquee entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Marquee published status indicator.
   *
   * Unpublished Marquee are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Marquee is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Marquee.
   *
   * @param bool $published
   *   TRUE to set this Marquee to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\create_supplier\marqueeInterface
   *   The called Marquee entity.
   */
  public function setPublished($published);

}
