<?php

/**
 * Basetext
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $module
 * @property integer $parent_id
 * @property string $title
 * @property string $context
 * @property boolean $hidden
 * 
 * @method string  getModule()    Returns the current record's "module" value
 * @method integer getParentId()  Returns the current record's "parent_id" value
 * @method string  getTitle()     Returns the current record's "title" value
 * @method string  getContext()   Returns the current record's "context" value
 * @method boolean getHidden()    Returns the current record's "hidden" value
 * @method text    setModule()    Sets the current record's "module" value
 * @method text    setParentId()  Sets the current record's "parent_id" value
 * @method text    setTitle()     Sets the current record's "title" value
 * @method text    setContext()   Sets the current record's "context" value
 * @method text    setHidden()    Sets the current record's "hidden" value
 * 
 * @package    tnt
 * @subpackage model
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basetext extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('text');
        $this->hasColumn('module', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('parent_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('context', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('hidden', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'title',
              1 => 'context',
             ),
             ));
        $this->actAs($i18n0);
    }
}