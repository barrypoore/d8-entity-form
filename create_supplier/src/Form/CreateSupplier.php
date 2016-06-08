<?php
/**
 * Created by PhpStorm.
 * User: barrypoore
 * Date: 16/05/16
 * Time: 11:32
 */

namespace Drupal\create_supplier\Form;


use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\marquee_supplier\Entity\supplier;
use Drupal\node\Entity\Node;


class CreateSupplier extends ContentEntityForm {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'create_supplier_form';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    //$entity_types = \Drupal::entityTypeManager()->getDefinitions();
    //$my_entity_type = \Drupal::entityManager()->getDefinition('eck_marquee');


    $form['marquees_offered'] = array(
      '#type' => 'checkboxes',
      '#title' => $this->t('Marquees offered'),
      '#attributes' => array('class' => ['marquees_offered']),
      '#options' => array('Frame Marquee' => $this->t('Frame Marquee'),
        'Traditional Marquee' => $this->t('Traditional Marquee'),
        'Chinese Hat Marquee' => $this->t('Chinese Hat Marquee'),
        'Large Trapeze Marquee' => $this->t('Large Trapeze Marquee'),
        'Small Trapeze Marquee' => $this->t('Small Trapeze Marquee'),
        'Tables and chairs' => $this->t('Tables and chairs'),),
      );

    /* Frame Marquee */
    $form['framed_marquees'] = array(
      '#type' => 'fieldset',
      '#title' => '20ft Framed Marquee',
      '#states' => array(
        'visible' => array(
          ':input[name="marquees_offered[Frame Marquee]"]' => array('checked' => TRUE),
        ),
      ),
    );

    /* 20ft Framed Marquee */

    $form['framed_marquees']['20ft_framed_marquee'] = array(
      '#type' => 'textfield',
      '#title' => '20ft width - base price',
    );

    $form['framed_marquees']['20ft_framed_marquee_additional_10ft_bay'] = array(
      '#type' => 'textfield',
      '#title' => '20ft width - additional 10ft bay',
    );

    $form['framed_marquees']['20ft_framed_marquee_lining_base'] = array(
      '#type' => 'textfield',
      '#title' => '20ft width - lining base',
    );

    $form['framed_marquees']['20ft_framed_marquee_lining_base_additional_10ft'] = array(
      '#type' => 'textfield',
      '#title' => '20ft width - additional 10ft lining base',
    );

    $form['framed_marquees']['20ft_framed_marquee_carpet_base'] = array(
      '#type' => 'textfield',
      '#title' => '20ft width - carpet base',
    );


    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit!'),
    );

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
//    if (!filter_var($form_state->getValue('email_address'), FILTER_VALIDATE_EMAIL)) {
//      $form_state->setError($form['email_address'], 'Email address is invalid.');
//    }
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $supplier = supplier::create([

    ]);
    $supplier->save();



  }

  /**
   * Check the supplied email address that it matches what we will accept.
   * @param $email_address
   * @return bool
   */
  protected function validEmailAddress($email_address) {
    $domain = explode('@', $email_address)[1];
    return in_array($domain, $this->accepted_domains);
  }

}