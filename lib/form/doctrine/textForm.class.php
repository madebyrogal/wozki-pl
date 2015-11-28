<?php

/**
 * text form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI tomasz.rogalski@huevo.pl
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class textForm extends BasetextForm
{
  public function configure()
  {
    $this->embedI18n(sfConfig::get('app_langs'));
    $this->widgetSchema->setLabel('pl', 'Polski');
    $this->widgetSchema->setLabel('de', 'Niemiecki');
    
    $this->widgetSchema['module'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['parent_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['pl']['context'] = new sfWidgetFormTextareaTinyMCE( array( 'width' => 700, 'height' => 400 ) );
    $this->widgetSchema['de']['context'] = new sfWidgetFormTextareaTinyMCE( array( 'width' => 700, 'height' => 400 ) );
    $this->widgetSchema['en']['context'] = new sfWidgetFormTextareaTinyMCE( array( 'width' => 700, 'height' => 400 ) );
    $this->widgetSchema['ru']['context'] = new sfWidgetFormTextareaTinyMCE( array( 'width' => 700, 'height' => 400 ) );
    if($this->isNew()){
      $this->setDefault('module', sfContext::getInstance()->getUser()->getAttribute('textModule'));
      $this->setDefault('parent_id', sfContext::getInstance()->getUser()->getAttribute('textParent'));
      $this->setDefault('hidden', false);
    }
  }
}
