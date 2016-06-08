<?php

namespace Drupal\create_supplier\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Marquee entities.
 */
class marqueeViewsData extends EntityViewsData implements EntityViewsDataInterface {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['marquee']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Marquee'),
      'help' => $this->t('The Marquee ID.'),
    );

    return $data;
  }

}
