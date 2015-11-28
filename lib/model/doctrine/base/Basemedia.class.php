<?php

/**
 * Basemedia
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $module
 * @property integer $parent_id
 * @property boolean $main
 * @property string $title
 * @property string $alternative
 * @property string $file
 * @property string $file_min1
 * @property string $file_min2
 * @property string $file_min3
 * @property string $link
 * 
 * @method string  getModule()      Returns the current record's "module" value
 * @method integer getParentId()    Returns the current record's "parent_id" value
 * @method boolean getMain()        Returns the current record's "main" value
 * @method string  getTitle()       Returns the current record's "title" value
 * @method string  getAlternative() Returns the current record's "alternative" value
 * @method string  getFile()        Returns the current record's "file" value
 * @method string  getFileMin1()    Returns the current record's "file_min1" value
 * @method string  getFileMin2()    Returns the current record's "file_min2" value
 * @method string  getFileMin3()    Returns the current record's "file_min3" value
 * @method string  getLink()        Returns the current record's "link" value
 * @method media   setModule()      Sets the current record's "module" value
 * @method media   setParentId()    Sets the current record's "parent_id" value
 * @method media   setMain()        Sets the current record's "main" value
 * @method media   setTitle()       Sets the current record's "title" value
 * @method media   setAlternative() Sets the current record's "alternative" value
 * @method media   setFile()        Sets the current record's "file" value
 * @method media   setFileMin1()    Sets the current record's "file_min1" value
 * @method media   setFileMin2()    Sets the current record's "file_min2" value
 * @method media   setFileMin3()    Sets the current record's "file_min3" value
 * @method media   setLink()        Sets the current record's "link" value
 * 
 * @package    tnt
 * @subpackage model
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basemedia extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('media');
        $this->hasColumn('module', 'string', 64, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 64,
             ));
        $this->hasColumn('parent_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('main', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('title', 'string', 128, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 128,
             ));
        $this->hasColumn('alternative', 'string', 128, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 128,
             ));
        $this->hasColumn('file', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('file_min1', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             ));
        $this->hasColumn('file_min2', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             ));
        $this->hasColumn('file_min3', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             ));
        $this->hasColumn('link', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $sortable0 = new Doctrine_Template_Sortable(array(
             'uniqueBy' => 
             array(
              0 => 'parent_id',
             ),
             ));
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'title',
              1 => 'alternative',
              2 => 'link',
             ),
             ));
        $this->actAs($sortable0);
        $this->actAs($i18n0);
    }
}