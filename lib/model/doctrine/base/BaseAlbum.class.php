<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Album', 'doctrine');

/**
 * BaseAlbum
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property timestamp $created_at
 * @property integer $member_id
 * 
 * @method integer   getId()         Returns the current record's "id" value
 * @method string    getName()       Returns the current record's "name" value
 * @method timestamp getCreatedAt()  Returns the current record's "created_at" value
 * @method integer   getMemberId()   Returns the current record's "member_id" value
 * @method Album     setId()         Sets the current record's "id" value
 * @method Album     setName()       Sets the current record's "name" value
 * @method Album     setCreatedAt()  Sets the current record's "created_at" value
 * @method Album     setMemberId()   Sets the current record's "member_id" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAlbum extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('album');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('member_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}