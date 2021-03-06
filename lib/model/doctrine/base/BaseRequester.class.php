<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Requester', 'doctrine');

/**
 * BaseRequester
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $request_status_id
 * @property integer $member_id
 * @property integer $posting_id
 * @property string $confirmation_key
 * @property RequestStatus $RequestStatus
 * @property Member $Member
 * @property Postings $Postings
 * 
 * @method integer       getId()                Returns the current record's "id" value
 * @method integer       getRequestStatusId()   Returns the current record's "request_status_id" value
 * @method integer       getMemberId()          Returns the current record's "member_id" value
 * @method integer       getPostingId()         Returns the current record's "posting_id" value
 * @method string        getConfirmationKey()   Returns the current record's "confirmation_key" value
 * @method RequestStatus getRequestStatus()     Returns the current record's "RequestStatus" value
 * @method Member        getMember()            Returns the current record's "Member" value
 * @method Postings      getPostings()          Returns the current record's "Postings" value
 * @method Requester     setId()                Sets the current record's "id" value
 * @method Requester     setRequestStatusId()   Sets the current record's "request_status_id" value
 * @method Requester     setMemberId()          Sets the current record's "member_id" value
 * @method Requester     setPostingId()         Sets the current record's "posting_id" value
 * @method Requester     setConfirmationKey()   Sets the current record's "confirmation_key" value
 * @method Requester     setRequestStatus()     Sets the current record's "RequestStatus" value
 * @method Requester     setMember()            Sets the current record's "Member" value
 * @method Requester     setPostings()          Sets the current record's "Postings" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRequester extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('requester');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('request_status_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'default' => '1',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('member_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('posting_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('confirmation_key', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('RequestStatus', array(
             'local' => 'request_status_id',
             'foreign' => 'id'));

        $this->hasOne('Member', array(
             'local' => 'member_id',
             'foreign' => 'id'));

        $this->hasOne('Postings', array(
             'local' => 'posting_id',
             'foreign' => 'id'));
    }
}