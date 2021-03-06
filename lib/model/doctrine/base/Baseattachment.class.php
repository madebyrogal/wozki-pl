<?php

/**
 * Baseattachment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $module
 * @property integer $parent_id
 * @property string $title
 * @property string $file
 * @property string $extenstion
 * 
 * @method string     getModule()     Returns the current record's "module" value
 * @method integer    getParentId()   Returns the current record's "parent_id" value
 * @method string     getTitle()      Returns the current record's "title" value
 * @method string     getFile()       Returns the current record's "file" value
 * @method string     getExtenstion() Returns the current record's "extenstion" value
 * @method attachment setModule()     Sets the current record's "module" value
 * @method attachment setParentId()   Sets the current record's "parent_id" value
 * @method attachment setTitle()      Sets the current record's "title" value
 * @method attachment setFile()       Sets the current record's "file" value
 * @method attachment setExtenstion() Sets the current record's "extenstion" value
 * 
 * @package    tnt
 * @subpackage model
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Baseattachment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('attachment');
        $this->hasColumn('module', 'string', 64, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 64,
             ));
        $this->hasColumn('parent_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('title', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('file', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('extenstion', 'string', 8, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'title',
             ),
             ));
        $this->actAs($i18n0);
    }
}