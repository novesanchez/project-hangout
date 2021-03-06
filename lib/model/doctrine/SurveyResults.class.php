<?php

/**
 * SurveyResults
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class SurveyResults extends BaseSurveyResults
{
    public static function saveResults($Data = array())
    {
        $q = RatersGroupTable::getInstance()->createQuery('rg');
        $q->where('rg.ratee = ?', $Data['ratee']);
        $q->andWhere('rg.posting_id = ?', $Data['posting_id']);
        $rec = $q->execute();        
        
        $survey = new SurveyResults();
        $survey->setResult($Data['result']);
        $survey->setQuestionId($Data['question_id']);
        $survey->setRatersGroupId($rec[0]->getId());
        $survey->setActionTimestamp(date('Y-m-d H:i:s'));
        $survey->save();
        return $survey->getRatersGroupId();
    }
    
    public static function getRating($ratee)
    {
       $conn = Doctrine_Manager::getInstance()->connection();	
       $q = "SELECT q.id, q.questions, SUM(sr.result)/COUNT(sr.question_id) as average FROM survey_results sr
             JOIN questions q ON sr.question_id = q.id
             JOIN raters_group rg ON sr.raters_group_id = rg.id
             WHERE q.is_average = true AND rg.ratee = $ratee GROUP BY sr.question_id;";
       
       $st = $conn->execute($q);
       return $st->fetchAll(); 
    }
    
    public static function getQuestionAverage()
    {
        $conn = Doctrine_Manager::getInstance()->connection();	
        $q = "SELECT * FROM questions WHERE is_average = true;";
        $st = $conn->execute($q);
        return $st->fetchAll(); 
    }
    
    public static function getOverallAverageRaterGoup($rater_group_id)
    {
        $conn = Doctrine_Manager::getInstance()->connection();	
        $q = "SELECT SUM(result)/count(*) as ave FROM survey_results sr
              JOIN questions q ON sr.question_id = q.id
              WHERE sr.raters_group_id = $rater_group_id AND q.is_average = true;";
        $st = $conn->execute($q);
        $r  = $st->fetchAll(); 
        return round($r[0]['ave'],2); 
    }
    
    public static function getRatingsPerRaterGroup($rater_group_id)
    {
        $conn = Doctrine_Manager::getInstance()->connection();	
        $q = "SELECT q.questions, sr.result FROM survey_results sr
                JOIN questions q ON sr.question_id = q.id
                where sr.raters_group_id = $rater_group_id and q.is_average = true;";
        $st = $conn->execute($q);
        return $st->fetchAll(); 
    }
    
    public static function getMembersLeavingFeedback($ratee)
    {
//        $q = SurveyResultsTable::getInstance()->createQuery('sr');
//        $q->select('q.id, q.questions, count(*) as total_raters');
//        $q->from('SurveyResults sr');
//        $q->innerJoin('sr.RatersGroup rg');
//        $q->innerJoin('sr.Questions q');
//        $q->where('rg.ratee = ?', $ratee);
//        $q->andWhere('q.is_average = ?', true);
//        $q->groupBy('sr.question_id');
        
        $conn = Doctrine_Manager::getInstance()->connection();	
        $q = "SELECT
                q.id, q.questions, count(*) as total_raters FROM survey_results sr
              LEFT JOIN raters_group rg ON sr.raters_group_id = rg.id
              LEFT JOIN questions q ON sr.question_id = q.id
              WHERE rg.ratee = $ratee and q.is_average = true
              group by sr.question_id";
        $st = $conn->execute($q);
        $result = $st->fetchAll(); 
        
        $data = array();
        foreach($result as $v)
        {
            $data[$v['id']] = $v['total_raters'];
        }
        
        return $data;
    }
}