<?php

/**
 * newsletter_address form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchForm extends sfForm {

  public function configure() {
    $this->disableCSRFProtection();
    $this->widgetSchema->setNameFormat('search[%s]');
    $this->widgetSchema['search'] = new sfWidgetFormInput( array(), array( 'placeholder' => sfContext::getInstance()->getI18N()->__('Szukaj') ));

    $this->validatorSchema['search'] = new sfValidatorString( array( 'required' => true ) );
  }
}