<?php

require_once dirname(__FILE__).'/../lib/module_groupGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/module_groupGeneratorHelper.class.php';

/**
 * module_group actions.
 *
 * @package    tnt
 * @subpackage module_group
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class module_groupActions extends autoModule_groupActions
{
  protected function buildQuery()
  {
    $tableMethod = $this->configuration->getTableMethod();
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $this->filters->setTableMethod($tableMethod);

    $query = $this->filters->buildQuery($this->getFilters());

    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();
    
    return $query;
  }
}
