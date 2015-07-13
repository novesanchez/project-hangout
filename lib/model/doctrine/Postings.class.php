<?php

/**
 * Postings
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Postings extends BasePostings
{
    public function getPostings($userId = null, $start = 0)
    {
        $q = PostingsTable::getPostings();
        $q->leftJoin('p.Requester r');
        $q->where('p.date_to_hangout >= CURRENT_DATE');
        
        if(!is_null($userId)){
            $q->andWhere('p.member_id = ?', $userId);
        } 

        $q->orderBy('CAST(p.starttime AS datetime)');
        $q->orderBy('p.date_to_hangout asc');
        
        $total = 0;
        $qtemp = $q;
        $total = $qtemp->execute()->count();
        unset($qtemp);
        
        $q->limit(5);
        $q->offset($start);
        return array($q->execute(), $total);
    }
    
    public function getAllPostings($userId = null, $start = 0)
    {
        $q = PostingsTable::getPostings();
        $q->leftJoin('p.Requester r');
        $q->where('p.member_id = ?', $userId);
        $q->orderBy('CAST(p.starttime AS datetime)');
        $q->orderBy('p.date_to_hangout asc');
        
//        $total = 0;
//        $qtemp = $q;
//        $total = $qtemp->execute()->count();
//        unset($qtemp);
        
        $q->offset($start);
        $q->limit(6);        
        return array($q->execute(), $q->execute()->count());
    }
    
    public function getPostingDetails($postingId = null)
    {
        $q = PostingsTable::getPostings();
        if(!is_null($postingId)){
            $q->where('p.id = ?', $postingId);
        }
        $result = $q->execute();
        return $result[0]->getNumPpl();
    }
    
    public function setPostingToComplete($postingId = null,$status = 4)
    {
        $q = Doctrine::getTable('Postings')->findOneBy("id", $postingId);
        $q->status = $status;
        $q->save();
    }
    
    public static function getPostingInfo($postingId)
    {
        return Doctrine::getTable('Postings')->findOneBy("id", $postingId);
    }
    
    public function getTodaysPostings($userId = null, $start = 0)
    {
        $q = PostingsTable::getPostings();
        $q->innerJoin('p.Requester r');
        $q->innerJoin('r.Member m1');
        $q->innerJoin('p.Member m2');
        $q->innerJoin('m2.Photo ph');
        $q->where('p.status = ?',1);
        $q->andWhere('r.request_status_id = ?',4);
        $q->andWhere('ph.id = m2.profile_picture_id');
        $q->andWhere("p.member_id = $userId OR r.member_id = $userId");
        $q->andWhere('p.date_to_hangout = ?',date("Y-m-d")); //get the todays date
        $q->orderBy('p.date_to_hangout');
        
        $total = 0;
        $qtemp = $q;
        $total = $qtemp->execute()->count();
        unset($qtemp);

        $q->limit(5);
        $q->offset($start);
        return array($q->execute(), $total);        
    }
    
    public function getUpcomingPostings($userId = null, $start = 0)
    {
        $q = PostingsTable::getPostings();
        $q->innerJoin('p.Requester r');
        $q->innerJoin('r.Member m');
        $q->innerJoin('p.Member m2');
        $q->innerJoin('m2.Photo ph');
        $q->where('p.status = ?',1);
        $q->andWhere('r.request_status_id = ?',4);
        $q->andWhere('ph.id = m2.profile_picture_id');
        $q->andWhere("p.member_id = $userId OR r.member_id = $userId");
        $q->andWhere('p.date_to_hangout > ?',date("Y-m-d")); //get the todays date
        $q->orderBy('p.date_to_hangout');
        
        $total = 0;
        //if($start == 0){
            $qtemp = $q;
            $total = $qtemp->execute()->count();
            unset($qtemp);
        //}
        
        $q->limit(5);
        $q->offset($start);
        return array($q->execute(), $total);
//        return $q->fetchArray();
    }    
    
    public static function getHangoutToRate($rater_id)
    {
        $q = "SELECT 
                p.posting_title, p.date_to_hangout, p.posting_enddt, p.date_to_hangout, m.nick_name,
                ph.path, m.profile_id, m.state, m.city, m.username, m.id, p.id as posting_id, m.gender
              FROM postings p
              INNER JOIN raters_group rg on rg.posting_id = p.id
              INNER JOIN member m on rg.ratee = m.id
              LEFT JOIN photo ph on m.profile_picture_id = ph.id
              WHERE rg.rater = $rater_id and p.posting_enddt < now() and counter_done = 0;";
        
        $result = Doctrine_Manager::getInstance()->connection()->execute($q)->fetchAll();		  
        return $result;
    }

    public static function getHangoutByReview($member_id, $isPublic = false)
    {
        $subQ = ($isPublic)? "rg.ratee = $member_id":"( rg.rater = $member_id OR rg.ratee = $member_id )";
        $q = "SELECT distinct
                rg.rater, rg.ratee,rg.id as rg_id,
                rg.counter_done,
                p.id as posting_id,
                p.posting_title,
                p.member_id as p_member_id,
                sc.id as comment_id,
                sc.comments,
                sc.rater_group_id,
                sc.member_id as sc_member_id,
                m3.nick_name as sc_nick_name,
                m1.nick_name as rater_nick_name,
                m1.username as rater_username,
                m1.gender as rater_gender,
                m1.city as rater_city,
                m1.state as rater_state,
                m1.profile_id as rater_profile_id,
                m2.nick_name as ratee_nick_name,
                m2.username as ratee_username,
                m2.gender as ratee_gender,
                m2.city as ratee_city,
                m2.state as ratee_state,
                m2.profile_id as ratee_profile_id,
                ph1.path as rater_path,
                ph2.path as ratee_path,
                f.status,
                f.friend_id,
                f.member_id
              FROM
                raters_group rg
              JOIN survey_comments sc ON rg.id = sc.rater_group_id
              JOIN postings p ON rg.posting_id = p.id
              JOIN member m1 ON rg.rater = m1.id
              JOIN member m2 ON rg.ratee = m2.id
              LEFT JOIN member m3 ON sc.member_id = m3.id
              LEFT JOIN photo ph1 ON  m1.profile_picture_id = ph1.id
              LEFT JOIN photo ph2 ON  m2.profile_picture_id = ph2.id
              LEFT JOIN friendship f ON m1.id = f.member_id
              WHERE $subQ AND counter_done > 0;";

        try{
            $result = Doctrine_Manager::getInstance()->connection()->execute($q)->fetchAll();		  
        }catch(Exception $e){
            die($e->getMessage());
        }
        return $result;
    }
        
    public static function getHangoutToRateByOwnPosting($userId = null)
    {
        $q = PostingsTable::getPostings();
        $q->innerJoin('p.Requester r');
        $q->innerJoin('p.Member m');
        $q->leftJoin('m.Photo ph');
        $q->where("p.member_id = ?",$userId);
        $q->andWhere('r.is_survey_done_by_owner = ?',false);
        $q->orderBy('p.date_to_hangout desc');
        return $q->execute();
    }
    
    public static function getHangoutToRateByRespond($userId = null)
    {
        $q = PostingsTable::getPostings();
        $q->innerJoin('p.Requester r');
        $q->innerJoin('r.Member m1');
        $q->leftJoin('m1.Photo ph');
        $q->where("r.member_id = ?",$userId);
        $q->andWhere('r.is_survey_done = ?',false);
        $q->orderBy('p.date_to_hangout desc');
        return $q->execute();
    }


    public static function getHangoutReviewsByOwner($userId = null)
    {
        $q = PostingsTable::getPostings();
        $q->innerJoin('p.Requester r');
        $q->innerJoin('r.Member m');
        $q->leftJoin('m.Photo ph');
        $q->where("p.member_id = ?",$userId);
        $q->andWhere('r.is_survey_done = ?',true);
        $q->orderBy('p.date_to_hangout desc');
        return $q->execute();
    }    
    
    public static function getHangoutReviewsByRespond($userId = null)
    {
        $q = PostingsTable::getPostings();
        $q->innerJoin('p.Requester r');
        $q->innerJoin('r.Member m1');
        $q->innerJoin('p.Member m2');
        $q->leftJoin('m2.Photo ph');
        $q->where("r.member_id = ?",$userId);
        $q->andWhere('r.is_survey_done = ?',true);
        $q->orderBy('p.date_to_hangout desc');
        return $q->execute();
    }  
    
    public static function deletePosting($posting_id)
    {
        try{
            $q = Doctrine::getTable('Postings')->findOneBy("id", $posting_id);
            $q->delete();
            return 'Post has been deleted successfully!';
        }catch(Exception $e){
            die($e->getMessage());
            return 'Problem encountered while deleting post.';
        }
    }
}