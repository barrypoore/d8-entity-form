<?php

namespace Drupal\create_supplier;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Marquee entity.
 *
 * @see \Drupal\create_supplier\Entity\marquee.
 */
class marqueeAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\create_supplier\marqueeInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished marquee entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published marquee entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit marquee entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete marquee entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add marquee entities');
  }

}
