<?php

/**
 * MemberProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class MemberProfile extends BaseMemberProfile
{
    public function savePersonalInformation($member_id, $profile_choice_id, $profile_id, $value)
    {
        try
        {                 
            $q = Doctrine_Query::create()
                    ->update('MemberProfile mp')
                    ->set('mp.profile_choice_id', $profile_choice_id)
                    ->set('mp.value', "'$value'")
                    ->where('mp.member_id=?', $member_id)
                    ->andWhere('mp.profile_id=?', $profile_id)
                    ->execute();  
            
            return true;
        }
        catch(Exception $e)
        {
            throw new Exception ('Error: '.$e->getMessage().". parameters: member_id: $member_id, profile_choice_id: $profile_choice_id, profile_id: $profile_id, value: $value");
        }
    }
}