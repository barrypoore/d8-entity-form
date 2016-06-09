<?php
/**
 * Created by PhpStorm.
 * User: barrypoore
 * Date: 16/05/16
 * Time: 11:32
 */

namespace Drupal\create_supplier\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\create_supplier\Entity\marquee;

class SupplierAddMarquees extends FormBase {


  //protected $accepted_domains = ['gmail.com', 'yahoo.com', 'flowmo.co'];

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'supplieraddmarquees';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    /* USERS DETAILS */

    $form['details'] = array(
      '#type' => 'fieldset',
      '#title' => 'Company Details',
      '#attributes' => array('class' => ['form__fieldset--container']),
    );

    $form['details']['block_left'] = array(
      '#type' => 'fieldset',
      '#title' => '',
      '#attributes' => array('class' => ['form__block--left', 'form__block--no-style']),
    );

    $form['details']['block_left']['your_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Your Name'),
      '#open' => TRUE,
    );

    $form['details']['block_left']['email'] = array(
      '#type' => 'email',
      '#title' => $this->t('Email'),
    );

    $form['details']['block_left']['mobile_number'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Mobile Number'),
    );

    $form['details']['block_right'] = array(
      '#type' => 'fieldset',
      '#attributes' => array('class' => ['form__block--right', 'form__block--no-style']),
    );

    $form['details']['block_right']['company_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Company Name'),
    );


    $form['details']['block_right']['county'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('County'),
    );


    $form['details']['block_right']['postcode'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Postcode'),
    );

    /* END OF USERS DETAILS */

    /* HIRE PERIOD */
    $form['hire_period_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Hire Period',
      '#open' => FALSE,
    );

    $form['hire_period_fieldset']['hire_period'] = array(
      '#type' => 'checkboxes',
      '#options' => array('All Year' => $this->t('All Year'), 'June, July, Spring' => $this->t('June, July, Spring'), 'Spring to Autumn' => $this->t('Spring to Autumn')),
      '#title' => '',
    );

    /* FURNITURE PRICING */
    $form['furniture_pricing_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Furniture Pricing',
    );

    $form['furniture_pricing_fieldset']['furniture_pricing'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Add furniture pricing'),
    );

    $form['furniture_pricing_fieldset']['furniture_pricing_fields'] = array(
      '#type' => 'fieldset',
      '#title' => '',
      '#states' => array(
        'visible' => array(
          ':input[name="furniture_pricing"]' => array('checked' => TRUE),
        ),
      ),
    );

    /* Furniture Pricing - Table Pricing */
    $form['furniture_pricing_fieldset']['furniture_pricing_fields']['furniture_pricing_tables'] = array(
      '#type' => 'fieldset',
      '#title' => $this->t('Table Pricing'),
    );

    $form['furniture_pricing_fieldset']['furniture_pricing_fields']['furniture_pricing_tables']['5-6foot_round_table_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('5-6ft Round Table Price'),
    );

    $form['furniture_pricing_fieldset']['furniture_pricing_fields']['furniture_pricing_tables']['6foot_trestle_table_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('6ft Trestle Table Price'),
    );

    /* Furniture Pricing - Chair Pricing */
    $form['furniture_pricing_fieldset']['furniture_pricing_fields']['furniture_pricing_chairs'] = array(
      '#type' => 'fieldset',
      '#title' => $this->t('Chair Pricing'),
    );

    $form['furniture_pricing_fieldset']['furniture_pricing_fields']['furniture_pricing_chairs']['limewash_chiavari_chair_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Limewash Chiavari Chair'),
    );

    $form['furniture_pricing_fieldset']['furniture_pricing_fields']['furniture_pricing_chairs']['wooden_folding_chair_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Wooden Folding Chair'),
    );

    /* Furniture Pricing - Lighting Pricing */
    $form['furniture_pricing_fieldset']['furniture_pricing_fields']['furniture_pricing_lighting'] = array(
      '#type' => 'fieldset',
      '#title' => $this->t('Lighting Pricing'),
    );


    $form['furniture_pricing_fieldset']['furniture_pricing_fields']['furniture_pricing_lighting']['one_chandelier_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Price for one Chandelier'),
    );

    $form['furniture_pricing_fieldset']['furniture_pricing_fields']['furniture_pricing_lighting']['one_uplighter_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Price for one Uplighter'),
    );

    /* Dancefloor Pricing */
    $form['dancefloor_pricing_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Dance Floor Pricing',
    );

    $form['dancefloor_pricing_fieldset']['dancefloor_pricing'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Dance Floor Pricing'),
    );

    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields'] = array(
      '#type' => 'fieldset',
      '#title' => 'please answer section A, B or C',
      '#states' => array(
        'visible' => array(
          ':input[name="dancefloor_pricing"]' => array('checked' => TRUE),
        ),
      ),
    );

    /* Dancefloor Pricing - Per Square Foot */
    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['dancefloor_pricing-per-sq-foot'] = array(
      '#type' => 'fieldset',
      '#title' => $this->t('( A ) Price Per Square ft'),
    );

    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['dancefloor_pricing-per-sq-foot']['dancefloor_per_square_foot_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('5-6ft Round Table Price'),
    );

    /* Dancefloor Pricing - Per Square Section */
    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['dancefloor_pricing-section'] = array(
      '#type' => 'fieldset',
      '#title' => $this->t('( B ) Price per section'),
    );

    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['dancefloor_pricing-section']['dancefloor_section_size'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Size of each Dance Floor Section'),
    );

    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['dancefloor_pricing-section']['dancefloor_section_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Price of each Dance Floor Section'),
    );

    /* Dancefloor Pricing - Individual Dance Floor Pricing */
    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['individual_dancefloor_pricing'] = array(
      '#type' => 'fieldset',
      '#title' => $this->t('( C ) Individual Dance Floor Pricing'),
    );

    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['individual_dancefloor_pricing']['9x9_dancefloor_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('9 ft x 9 ft Dance Floor'),
    );

    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['individual_dancefloor_pricing']['12x12_dancefloor_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('12 ft x 12 ft Dance Floor'),
    );

    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['individual_dancefloor_pricing']['12x16_dancefloor_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('12 ft x 16 ft Dance Floor'),
    );

    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['individual_dancefloor_pricing']['16x16_dancefloor_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('16 ft x 16 ft Dance Floor '),
    );

    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['individual_dancefloor_pricing']['20x20_dancefloor_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('20 ft x 20 ft Dance Floor'),
    );

    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['individual_dancefloor_pricing']['20x30_dancefloor_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('24 ft x 30 ft Dance Floor'),
    );

    $form['dancefloor_pricing_fieldset']['dancefloor_pricing_fields']['dancefloor_price_notes'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Notes'),
    );

    /* Fieldset Marquees */

    $form['marquees'] = array(
      '#type' => 'fieldset',
      '#title' => 'Marquee Types',
      '#open' => FALSE,
    );

    $form['marquees']['frame_clear_span_marquees'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Frame / Clear Span Marquee'),
    );

      $form['marquees']['framed_marquees'] = array(
        '#type' => 'fieldset',
        '#title' => '',
        '#states' => array(
          'visible' => array(
            ':input[name="frame_clear_span_marquees"]' => array('checked' => TRUE),
          ),
        ),
      );


      $form['marquees']['framed_marquees']['framed_marquee_size'] = array(
        '#type' => 'radios',
        '#title' => $this->t('Select size'),
        '#default_value' => '20ft',
        '#attributes' => array('class' => ['form__component-inline']),
        '#options' => array('20ft' => $this->t('20ft'), '30ft' => $this->t('30ft'), '40ft' => $this->t('40ft')),
      );

    /* Fieldset Framed 20ft Marquee */

      $form['marquees']['framed_marquees']['framed_marquee_20ft'] = array(
        '#type' => 'fieldset',
        '#title' => '20ft / 6m Wide Frame Marquee',
        '#states' => array(
          'visible' => array(
            ':input[name="framed_marquee_size"]' => array('value' => '20ft'),
          ),
        ),
      );

    /* ********** Fieldset - Marquee No Lining Price ********** */

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-no-lining_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Marquee No Lining Price',
    );

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-no-lining_price']['field_20ft_framed_base_price'] = array(
        '#type' => 'textfield',
        '#title' => $this->t('[Base Price] 20x20ft / 6x6m Marquee Price'),
      );

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-no-lining_price']['field_20ft_framed_additional_10f'] = array(
        '#type' => 'textfield',
        '#title' => $this->t('Additional 10ft Bay Marquee Price '),
      );


    /* ********** Fieldset - Lining Price ********** */

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee_lining_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Lining Price',
    );

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee_lining_price']['field_20ft_framed_lining_price'] = array(
        '#type' => 'textfield',
        '#title' => $this->t('[Base Price] 20x20ft / 6x6m Lining Price'),
      );

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee_lining_price']['field_20ft_framed_lining_additio'] = array(
        '#type' => 'textfield',
        '#title' => $this->t('Additional 10ft Bay Lining Price'),
      );


    /* ********** Fieldset - Matting Price ********** */

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-matting_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Matting Price',
    );

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-matting_price']['field_20ft_framed_matting_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('[Base Price] 20x20ft / 6x6m Matting Price'),
    );

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-matting_price']['field_20ft_framed_matting_additi'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Additional 10ft Bay Matting Price'),
    );


    /* ********** Fieldset - Carpet Price ********** */

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-carpet_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Carpet Price',
    );

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-carpet_price']['field_20ft_framed_carpet_price'] = array(
        '#type' => 'textfield',
        '#title' => $this->t('[Base Price] 20x20ft / 6x6m Carpet Price'),
      );

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-carpet_price']['field_20ft_framed_carpet_additio'] = array(
        '#type' => 'textfield',
        '#title' => $this->t('Additional 10ft Bay Carpet Price'),
      );

    /* ********** Fieldset - Uplighter Pricing - Answer the question ********** */

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-uplighter_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Uplighter Pricing - Answer the question',
    );

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-uplighter_price']['20x20_marquee_uplighter_total'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many uplighters would you put in a 20x60 / 6x18m Frame Marquee?'),
    );

    /* ********** Fieldset - Uplighter Pricing - Answer the question ********** */

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-uplighter_price_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Uplighter Pricing - Answer the question',
    );

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-uplighter_price_fieldset']['20x20_marquee_uplighter_total'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many uplighters would you put in a 20x60 / 6x18m Frame Marquee?'),
    );

    /* ********** Fieldset - Chandelier Pricing - Answer the question ********** */

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee_chandalier_price_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Chandelier Pricing - Answer the question',
    );

    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee_chandalier_price_fieldset']['20x20_marquee_chandalier_pricing'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many Chandeliers would you put in a 20x60 / 6x18m Frame Marquee?'),
    );

    /* ********** Fieldset - Notes ********** */


    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee_notes_fieldset']['20x20_marquee_notes'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Notes'),
    );




    /* Fieldset Framed 30ft Marquee */

    $form['marquees']['framed_marquees']['framed_marquee_30ft'] = array(
      '#type' => 'fieldset',
      '#title' => '30ft / 9m Wide Frame Marquee',
      '#states' => array(
        'visible' => array(
          ':input[name="framed_marquee_size"]' => array('value' => '30ft'),
        ),
      ),
    );

    /* ********** Fieldset - Marquee No Lining Price ********** */

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-no-lining_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Marquee No Lining Price',
    );

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-no-lining_price']['30x30_marquee_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('[Base Price] 30x30ft / 6x6m Marquee Price'),
    );

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-no-lining_price']['30x30_marquee_price_additional_10ft'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Additional 10ft Bay Marquee Price '),
    );


    /* ********** Fieldset - Lining Price ********** */

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee_lining_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Lining Price',
    );

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee_lining_price']['30x30_marquee_lining_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('[Base Price] 30x30ft / 6x6m Lining Price'),
    );

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee_lining_price']['30x30_marquee_lining_price_additional_10ft'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Additional 10ft Bay Lining Price'),
    );


    /* ********** Fieldset - Matting Price ********** */

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-matting_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Matting Price',
    );

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-matting_price']['30x30_marquee_matting_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('[Base Price] 30x30ft / 6x6m Matting Price'),
    );

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-matting_price']['30x30_marquee_matting_price_additional_10ft'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Additional 10ft Bay Matting Price'),
    );


    /* ********** Fieldset - Carpet Price ********** */

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-carpet_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Carpet Price',
    );

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-carpet_price']['30x30_marquee_carpet_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('[Base Price] 30x30ft / 6x6m Carpet Price'),
    );

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-carpet_price']['30x30_marquee_carpet_price_additional_10ft'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Additional 10ft Bay Carpet Price'),
    );

    /* ********** Fieldset - Uplighter Pricing - Answer the question ********** */

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-uplighter_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Uplighter Pricing - Answer the question',
    );

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-uplighter_price']['30x30_marquee_uplighter_total'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many uplighters would you put in a 20x60 / 6x18m Frame Marquee?'),
    );

    /* ********** Fieldset - Uplighter Pricing - Answer the question ********** */

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-uplighter_price_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Uplighter Pricing - Answer the question',
    );

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee-uplighter_price_fieldset']['30x30_marquee_uplighter_total'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many uplighters would you put in a 20x60 / 6x18m Frame Marquee?'),
    );

    /* ********** Fieldset - Chandelier Pricing - Answer the question ********** */

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee_chandalier_price_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Chandelier Pricing - Answer the question',
    );

    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee_chandalier_price_fieldset']['30x30_marquee_chandalier_pricing'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many Chandeliers would you put in a 20x60 / 6x18m Frame Marquee?'),
    );

    /* ********** Fieldset - Notes ********** */


    $form['marquees']['framed_marquees']['framed_marquee_30ft']['30x30_marquee_notes_fieldset']['30x30_marquee_notes'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Notes'),
    );


    /* Fieldset Framed 40ft Marquee */

    $form['marquees']['framed_marquees']['framed_marquee_40ft'] = array(
      '#type' => 'fieldset',
      '#title' => '40ft / 9m Wide Frame Marquee',
      '#states' => array(
        'visible' => array(
          ':input[name="framed_marquee_size"]' => array('value' => '40ft'),
        ),
      ),
    );

    /* ********** Fieldset - Marquee No Lining Price ********** */

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee-no-lining_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Marquee No Lining Price',
    );

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee-no-lining_price']['40x40_marquee_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('[Base Price] 40x40ft / 6x6m Marquee Price'),
    );

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee-no-lining_price']['40x40_marquee_price_additional_10ft'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Additional 10ft Bay Marquee Price '),
    );


    /* ********** Fieldset - Lining Price ********** */

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee_lining_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Lining Price',
    );

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee_lining_price']['40x40_marquee_lining_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('[Base Price] 40x40ft / 6x6m Lining Price'),
    );

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee_lining_price']['40x40_marquee_lining_price_additional_10ft'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Additional 10ft Bay Lining Price'),
    );


    /* ********** Fieldset - Matting Price ********** */

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee-matting_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Matting Price',
    );

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee-matting_price']['40x40_marquee_matting_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('[Base Price] 40x40ft / 6x6m Matting Price'),
    );

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee-matting_price']['40x40_marquee_matting_price_additional_10ft'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Additional 10ft Bay Matting Price'),
    );


    /* ********** Fieldset - Carpet Price ********** */

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee-carpet_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Carpet Price',
    );

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee-carpet_price']['40x40_marquee_carpet_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('[Base Price] 40x40ft / 6x6m Carpet Price'),
    );

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee-carpet_price']['40x40_marquee_carpet_price_additional_10ft'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Additional 10ft Bay Carpet Price'),
    );

    /* ********** Fieldset - Uplighter Pricing - Answer the question ********** */

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['30x30_marquee-uplighter_price'] = array(
      '#type' => 'fieldset',
      '#title' => 'Uplighter Pricing - Answer the question',
    );

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee-uplighter_price']['40x40_marquee_uplighter_total'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many uplighters would you put in a 20x60 / 6x18m Frame Marquee?'),
    );

    /* ********** Fieldset - Uplighter Pricing - Answer the question ********** */

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee-uplighter_price_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Uplighter Pricing - Answer the question',
    );

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee-uplighter_price_fieldset']['40x40_marquee_uplighter_total'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many uplighters would you put in a 20x60 / 6x18m Frame Marquee?'),
    );

    /* ********** Fieldset - Chandelier Pricing - Answer the question ********** */

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee_chandalier_price_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Chandelier Pricing - Answer the question',
    );

    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee_chandalier_price_fieldset']['40x40_marquee_chandalier_pricing'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many Chandeliers would you put in a 20x60 / 6x18m Frame Marquee?'),
    );

    /* ********** Fieldset - Notes ********** */


    $form['marquees']['framed_marquees']['framed_marquee_40ft']['40x40_marquee_notes_fieldset']['40x40_marquee_notes'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Notes'),
    );

    /* ********** End of Marquee Fieldset ********** */



    /* ********** Begin Trapeze / Capri Marquee ********** */

    $form['marquees']['trapeze_capri_marquees'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Trapeze / Capri Marquee'),
    );

    $form['marquees']['trapeze_capri_marquees_fieldset'] = array(
          '#type' => 'fieldset',
          '#title' => '',
          '#attributes' => array('class' => ['myclass']),
          '#states' => array(
            'visible' => array(
              ':input[name="trapeze_capri_marquees"]' => array('checked' => True),
            ),
          ),
        );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size'] = array(
      '#type' => 'radios',
      '#title' => $this->t('Trapeze / Capri Marquee Size'),
      '#default_value' => 'Small',
      '#options' => array('Small' => $this->t('Small Trapeze / Capri Marquee'), 'Large' => $this->t('Large Trapeze / Capri Marquee')),
    );

//    $form['marquees']['framed_marquees']['framed_marquee_20ft']['20x20_marquee-no-lining_price']['20x20_marquee_price'] = array(
//      '#type' => 'textfield',
//      '#title' => $this->t('[Base Price] 20x20ft / 6x6m Marquee Price'),
//    );

    /* ********** Begin Small Trapeze Capri Marquee ********** */

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset'] = array(
          '#type' => 'fieldset',
          '#title' => '',
          '#states' => array(
            'visible' => array(
              ':input[name="trapeze_capri_size"]' => array('value' => 'Small'),
            ),
          ),
        );

    /* Price for 1 Small Capri / Trapeze */

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_price_for_one_trapeze_capri_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Price for 1 Small Capri / Trapeze',
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_price_for_one_trapeze_capri_fieldset']['field_small_trapeze_base_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Base Price for 1 Small Capri / Trapeze '),
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_price_for_one_trapeze_capri_fieldset']['field_additional_small_trapeze_b'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Additional Small Capri / Trapeze Price'),
    );

    /* Matting Price */

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_matting_trapeze_capri_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Matting Price',
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_matting_trapeze_capri_fieldset']['field_small_trapeze_matting'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Base Matting Price for a Small Capri / Trapeze'),
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_matting_trapeze_capri_fieldset']['ield_small_trapeze_matting_addi'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Matting Price for Additional Small Capri / Trapeze'),
    );

    /* Carpet Price */

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_carpet_trapeze_capri_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Carpet Price',
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_carpet_trapeze_capri_fieldset']['field_small_trapeze_carpet_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Base Carpet Price for a Small Trapeze / Capri'),
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_carpet_trapeze_capri_fieldset']['field_small_trapeze_carpet_addit'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Carpet Price for Additional Small Capri / Trapeze'),
    );

    /* Uplighter Price */

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_uplighter_price_trapeze_capri_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Uplighter Pricing - Answer the question',
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_uplighter_price_trapeze_capri_fieldset']['field_small_trapeze_uplighter'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many uplighters would you put in a Small Trapeze / Capri?'),
    );

    /* Chandelier Price */

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_chandelier_price_trapeze_capri_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Uplighter Pricing - Answer the question',
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_small_fieldset']['small_chandelier_price_trapeze_capri_fieldset']['field_small_trapeze_chandeliers'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many Chandleiers would you put in a Small Trapeze / Capri?'),
    );

    /* ********** End of Small Trapeze Capri Marquee ********** */

    /* ********** Begin Large Trapeze Capri Marquee ********** */

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => '',
      '#states' => array(
        'visible' => array(
          ':input[name="trapeze_capri_size"]' => array('value' => 'Large'),
        ),
      ),
    );

    /* Price for 1 Large Capri / Trapeze */

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_price_for_one_trapeze_capri_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Price for 1 Large Capri / Trapeze',
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_price_for_one_trapeze_capri_fieldset']['large_capri_trapeze_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Base Price for 1 Large Capri / Trapeze'),
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_price_for_one_trapeze_capri_fieldset']['slarge_additional_small_capri_trapeze_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Additional Large Capri / Trapeze Price'),
    );

    /* Matting Price */

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_matting_trapeze_capri_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Matting Price',
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_matting_trapeze_capri_fieldset']['large_base_matting_capri_trapeze_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Base Matting Price for a large Capri / Trapeze'),
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_matting_trapeze_capri_fieldset']['large_additional_base_matting_capri_trapeze_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Matting Price for Additional large Capri / Trapeze'),
    );

    /* Carpet Price */

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_carpet_trapeze_capri_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Carpet Price',
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_carpet_trapeze_capri_fieldset']['large_base_carpet_capri_trapeze_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Base Carpet Price for a Large Trapeze / Capri'),
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_carpet_trapeze_capri_fieldset']['large_additional_carpet_capri_trapeze_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Carpet Price for Additional large Capri / Trapeze'),
    );

    /* Uplighter Price */

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_uplighter_price_trapeze_capri_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'How many uplighters would you put in a Large Trapeze / Capri?',
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_uplighter_price_trapeze_capri_fieldset']['large_how_many_uplighters_capri_trapeze_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many uplighters would you put in a Large Trapeze / Capri?'),
    );

    /* Chandelier Price */

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_chandelier_price_trapeze_capri_fieldset'] = array(
      '#type' => 'fieldset',
      '#title' => 'Uplighter Pricing - Answer the question',
    );

    $form['marquees']['trapeze_capri_marquees_fieldset']['trapeze_capri_size_large_fieldset']['large_chandelier_price_trapeze_capri_fieldset']['large_chandalier_capri_trapeze_price'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many Chandeliers would you put in a Large Trapeze / Capri?'),
    );

    /* ********** End of Trapeze / Capri Marquee ********** */


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
//    $node = Node::create([
//      'type' => 'marquee_supplier',
//      'title' => 'Supplier name',
//      'language' => 'en',
//       'field_carpet_base_price' => 12,
//      'field_round_table_price' => $form_state->getValue('5-6foot_round_table_price'),
//    'field_trestle_table_price' => $form_state->getValue('6foot_trestle_table_price'),
//    ]);

    $marquee_20ft_framed = marquee::create([
      'type' => 'framed',
      'name' => 'Framed Marquee',
      'field_20ft_framed_base_price' => $form_state->getValue('field_20ft_framed_base_price'),
      'field_20ft_framed_additional_10f' => $form_state->getValue('field_20ft_framed_additional_10f'),
      'field_20ft_framed_carpet_price' => $form_state->getValue('field_20ft_framed_carpet_price'),
      'field_20ft_framed_carpet_additio' => $form_state->getValue('field_20ft_framed_carpet_additio'),
      'field_20ft_framed_lining_price' => $form_state->getValue('field_20ft_framed_lining_price'),
      'field_20ft_framed_lining_additio' => $form_state->getValue('field_20ft_framed_lining_additio'),
      'field_20ft_framed_matting_additi' => $form_state->getValue('field_20ft_framed_matting_additi'),
      'field_20ft_framed_matting_price' => $form_state->getValue('field_20ft_framed_matting_price')
    ]);

    $marquee_20ft_framed->save();

    $small_trapeze = marquee::create([
      'type' => 'small_',
      'name' => 'Small Trapeze',
      'field_small_trapeze_base_price' => $form_state->getValue('field_small_trapeze_base_price'),
      'field_additional_small_trapeze_b' => $form_state->getValue('field_additional_small_trapeze_b'),
      'field_small_trapeze_matting' => $form_state->getValue('field_small_trapeze_matting'),
      'field_small_trapeze_matting_addi' => $form_state->getValue('field_small_trapeze_matting_addi'),
      'field_small_trapeze_carpet_price' => $form_state->getValue('field_small_trapeze_carpet_price'),
      'field_small_trapeze_carpet_addit' => $form_state->getValue('field_small_trapeze_carpet_addit'),
      'field_small_trapeze_uplighter' => $form_state->getValue('field_small_trapeze_uplighter'),
      'field_small_trapeze_chandeliers' => $form_state->getValue('field_small_trapeze_chandeliers')
    ]);

    $small_trapeze->save();

    Drupal_set_message($this->t('Framed Marquee values have been added.'));
  }

  /**
   * Check the supplied email address that it matches what we will accept.
   * @param $email_address
   * @return bool
   */
  protected function validEmailAddress($email_address) {
    $domain = explode('@', $email_address)[1];
    //return in_array($domain, $this->accepted_domains);
  }

}