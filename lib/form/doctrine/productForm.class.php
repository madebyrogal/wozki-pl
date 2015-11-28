<?php

/**
 * product form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class productForm extends BaseproductForm
{
  public function configure()
  {
    $this->embedI18n(sfConfig::get('app_langs'));
    $this->widgetSchema->setLabel('pl', 'Polski');
    $this->widgetSchema->setLabel('de', 'Niemiecki');
    $this->widgetSchema->setLabel('en', 'Angielski');
    $this->widgetSchema->setLabel('ru', 'Rosyjski');
    
    $this->widgetSchema['position'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['pl']['info'] = new sfWidgetFormTextareaTinyMCE(array('width'=>700, 'height'=>400));
    $this->widgetSchema['de']['info'] = new sfWidgetFormTextareaTinyMCE(array('width'=>700, 'height'=>400));
    $this->widgetSchema['en']['info'] = new sfWidgetFormTextareaTinyMCE(array('width'=>700, 'height'=>400));
    $this->widgetSchema['ru']['info'] = new sfWidgetFormTextareaTinyMCE(array('width'=>700, 'height'=>400));
    
    if( $this->isNew() ){
      $this->setDefault('hidden', false );
      $this->setDefault('promotion', false );
    }
  }
}
