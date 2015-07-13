<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Friendship', 'doctrine');

/**
 * BaseFriendship
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $member_id
 * @property integer $friend_id
 * @property integer $status
 * @property Member $Member
 * 
 * @method integer    getId()        Returns the current record's "id" value
 * @method integer    getMemberId()  Returns the current record's "member_id" value
 * @method integer    getFriendId()  Returns the current record's "friend_id" value
 * @method integer    getStatus()    Returns the current record's "status" value
 * @method Member     getMember()    Returns the current record's "Member" value
 * @method Friendship setId()        Sets the current record's "id" value
 * @method Friendship setMemberId()  Sets the current record's "member_id" value
 * @method Friendship setFriendId()  Sets the current record's "friend_id" value
 * @method Friendship setStatus()    Sets the current record's "status" value
 * @method Friendship setMember()    Sets the current record's "Member" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFriendship extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('friendship');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
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
        $this->hasColumn('friend_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('status', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Member', array(
             'local' => 'friend_id',
             'foreign' => 'id'));
    }
}