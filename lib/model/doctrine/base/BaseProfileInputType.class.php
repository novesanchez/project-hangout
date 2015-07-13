<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ProfileInputType', 'doctrine');

/**
 * BaseProfileInputType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $object_name
 * @property integer $order_number
 * @property Doctrine_Collection $Profile
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method string              getObjectName()   Returns the current record's "object_name" value
 * @method integer             getOrderNumber()  Returns the current record's "order_number" value
 * @method Doctrine_Collection getProfile()      Returns the current record's "Profile" collection
 * @method ProfileInputType    setId()           Sets the current record's "id" value
 * @method ProfileInputType    setObjectName()   Sets the current record's "object_name" value
 * @method ProfileInputType    setOrderNumber()  Sets the current record's "order_number" value
 * @method ProfileInputType    setProfile()      Sets the current record's "Profile" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProfileInputType extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profile_input_type');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('object_name', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('order_number', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Profile', array(
             'local' => 'id',
             'foreign' => 'profile_input_type_id'));
    }
}