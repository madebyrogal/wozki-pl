<?php

/**
 * news form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsForm extends BasenewsForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    $this->embedI18n(sfConfig::get('app_langs'));
    $this->widgetSchema->setLabel('pl', 'Polski');
    $this->widgetSchema->setLabel('de', 'Niemiecki');
    $this->widgetSchema->setLabel('en', 'Angielski');
    $this->widgetSchema->setLabel('ru', 'Rosyjski');
    
    $this->widgetSchema['pl']['title']->setLabel('Tytuł');
    $this->widgetSchema['pl']['sneak_peak']->setLabel('Zajawka');
    $this->widgetSchema['pl']['body']->setLabel('Treść');
    
    $this->widgetSchema['de']['title']->setLabel('Tytuł');
    $this->widgetSchema['de']['sneak_peak']->setLabel('Zajawka');
    $this->widgetSchema['de']['body']->setLabel('Treść');
    
    $this->widgetSchema['en']['title']->setLabel('Tytuł');
    $this->widgetSchema['en']['sneak_peak']->setLabel('Zajawka');
    $this->widgetSchema['en']['body']->setLabel('Treść');
    
    $this->widgetSchema['ru']['title']->setLabel('Tytuł');
    $this->widgetSchema['ru']['sneak_peak']->setLabel('Zajawka');
    $this->widgetSchema['ru']['body']->setLabel('Treść');
    
    $this->widgetSchema['pl']['body'] = new sfWidgetFormTextareaTinyMCE(array('width'=>700, 'height'=>400));
    $this->widgetSchema['de']['body'] = new sfWidgetFormTextareaTinyMCE(array('width'=>700, 'height'=>400));
    $this->widgetSchema['en']['body'] = new sfWidgetFormTextareaTinyMCE(array('width'=>700, 'height'=>400));
    $this->widgetSchema['ru']['body'] = new sfWidgetFormTextareaTinyMCE(array('width'=>700, 'height'=>400));
    $this->widgetSchema['date_from'] = new sfWidgetFormDate(array('format'=>'%day%/%month%/%year%'));
    if($this->isNew()){
      $this->setDefault('hidden', false);
      $this->setDefault('date_from', date('d-m-Y', time()));
    }
  }
}
