<?php

namespace Drupal\create_supplier\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class marqueeTypeForm.
 *
 * @package Drupal\create_supplier\Form
 */
class marqueeTypeForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $marquee_type = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $marquee_type->label(),
      '#description' => $this->t("Label for the Marquee type."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $marquee_type->id(),
      '#machine_name' => array(
        'exists' => '\Drupal\create_supplier\Entity\marqueeType::load',
      ),
      '#disabled' => !$marquee_type->isNew(),
    );

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $marquee_type = $this->entity;
    $status = $marquee_type->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Marquee type.', [
          '%label' => $marquee_type->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Marquee type.', [
          '%label' => $marquee_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($marquee_type->urlInfo('collection'));
  }

}
