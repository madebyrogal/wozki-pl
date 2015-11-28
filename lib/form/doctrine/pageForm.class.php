<?php

/**
 * page form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI tomasz.rogalski@huevo.pl
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageForm extends BasepageForm
{
  public function configure()
  {
    $this->embedI18n(sfConfig::get('app_langs'));
    $this->widgetSchema->setLabel('pl', 'Polski');
    $this->widgetSchema->setLabel('de', 'Niemiecki');
    $this->widgetSchema->setLabel('en', 'Angielski');
    $this->widgetSchema->setLabel('ru', 'Rosyjski');

    $this->widgetSchema['position'] = new sfWidgetFormInputHidden();
    
    if( $this->isNew() ){
      $this->setDefault('hidden', false);
      $this->setDefault('not_in_menu', false);
    }
    else{
      if( !sfContext::getInstance()->getUser()->hasCredential('admin') ){
        //$this->widgetSchema['pl']['template'] = new sfWidgetFormInputHidden();
        //$this->widgetSchema['de']['template'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['layout'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['route_name'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['parent_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['hidden'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['not_in_menu'] = new sfWidgetFormInputHidden();
      }
    }
  }
}
