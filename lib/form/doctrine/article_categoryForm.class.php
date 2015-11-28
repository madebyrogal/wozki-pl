<?php

/**
 * article_category form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class article_categoryForm extends Basearticle_categoryForm
{
  public function configure()
  {
    $this->embedI18n(sfConfig::get('app_langs'));
    $this->widgetSchema->setLabel('pl', 'Polski');
    $this->widgetSchema->setLabel('de', 'Niemiecki');
    $this->widgetSchema->setLabel('en', 'Angielski');
    $this->widgetSchema->setLabel('ru', 'Rosyjski');
    
    $this->widgetSchema['pl']['name']->setLabel('Nazwa');
    $this->widgetSchema['de']['name']->setLabel('Nazwa');
    $this->widgetSchema['en']['name']->setLabel('Nazwa');
    $this->widgetSchema['ru']['name']->setLabel('Nazwa');
    if($this->isNew()){
      $this->setDefault('hidden', false);
    }
  }
}
