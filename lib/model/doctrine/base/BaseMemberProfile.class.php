<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('MemberProfile', 'doctrine');

/**
 * BaseMemberProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $member_id
 * @property integer $profile_id
 * @property string $value
 * @property integer $profile_choice_id
 * @property Member $Member
 * @property Profile $Profile
 * @property ProfileChoice $ProfileChoice
 * 
 * @method integer       getId()                Returns the current record's "id" value
 * @method integer       getMemberId()          Returns the current record's "member_id" value
 * @method integer       getProfileId()         Returns the current record's "profile_id" value
 * @method string        getValue()             Returns the current record's "value" value
 * @method integer       getProfileChoiceId()   Returns the current record's "profile_choice_id" value
 * @method Member        getMember()            Returns the current record's "Member" value
 * @method Profile       getProfile()           Returns the current record's "Profile" value
 * @method ProfileChoice getProfileChoice()     Returns the current record's "ProfileChoice" value
 * @method MemberProfile setId()                Sets the current record's "id" value
 * @method MemberProfile setMemberId()          Sets the current record's "member_id" value
 * @method MemberProfile setProfileId()         Sets the current record's "profile_id" value
 * @method MemberProfile setValue()             Sets the current record's "value" value
 * @method MemberProfile setProfileChoiceId()   Sets the current record's "profile_choice_id" value
 * @method MemberProfile setMember()            Sets the current record's "Member" value
 * @method MemberProfile setProfile()           Sets the current record's "Profile" value
 * @method MemberProfile setProfileChoice()     Sets the current record's "ProfileChoice" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMemberProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('member_profile');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('member_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('profile_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('value', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('profile_choice_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Member', array(
             'local' => 'member_id',
             'foreign' => 'id'));

        $this->hasOne('Profile', array(
             'local' => 'profile_id',
             'foreign' => 'id'));

        $this->hasOne('ProfileChoice', array(
             'local' => 'profile_choice_id',
             'foreign' => 'id'));
    }
}