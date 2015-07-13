<?php

/**
 * home actions.
 *
 * @package    sf_sandbox
 * @subpackage hotlist
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class hotlistActions extends sfActions
{   
    public function preExecute() {
        $this->conn = Doctrine_Manager::getInstance()->connection();		  
    }
    
    public function executeIndex(sfWebRequest $request)
    {

    }
     
    public function executeLoadHotList(sfWebRequest $request)
    {
        $result = HotList::loadHotList($_SESSION['userId']);
    
        $q  = 'SELECT * FROM fips_regions WHERE code IN (17,21,18,39,47);';
        $rs = $this->conn->fetchAll($q);
        
        $state_names = array();
        foreach ($rs as $v) { $state_names[$v['code']] = $v['name']; }
      
        foreach($result as $v)
        {
            $html .= '<div id="review-subcontainer" style="width:100%;float:left;">';
            
            $photo = $v->getPostings()->getMember()->getPhoto();
            $path  = '';
            foreach($photo as $p)
            {
                if($v->getPostings()->getMember()->getProfilePictureId() == $p->getId()){
                    $path = $p->getPath();
                }
            }
            
            $default_path = ($v->getPostings()->getMember()->getGender() == 'f')? '/images/female.png':'/images/male.png';
            $path = (!empty($path))? '/'.$path:$default_path;
            
            $html .= '<div style="padding:5px;font-family:tahoma;height:92px;width:100%;">';
            
            $html .= '  <div style="float:left;padding-left:5px;font-weight:bold;width: 98%;">
                            <img src="'.$path.'" style="width:80px;height:80px;float:left;padding-right:5px;"/>
                                
                            <a href="/index.php/home/profile?id='.$v->getPostings()->getMember()->getProfileId().'">'.
                                $v->getPostings()->getMember()->getUsername().', '.$v->getPostings()->getMember()->getAge().' y/o'.
                            '</a>
                            <span style="font-size:12px;text-align: center;float:right;font-weight:bold;background-color:red;">
                                <a href="#" style="color:#FFFFFF!important;" id="deleteHotList" name="hotlist_'.$v->getId().'">
                                   <div id="div_'.$v->getId().'" style="width:60px;"> DELETE </div>
                                </a>
                            </span>';
            
            $html .= '  <div style="font-size:12px;font-weight:normal;">'.
                            $v->getPostings()->getMember()->getCity().', '. $state_names[$v->getPostings()->getMember()->getState()].', USA'.
                            '<span style="font-size:12px;font-weight:normal;float:right;">
                               
                            </span>
                        </div>';
                        
            $dateToHangout = date('l, F d, Y', strtotime($v->getPostings()->getDateToHangout()));
            $html .= '  <div style="font-size:12px;font-weight:normal;">
                            <span> 
                                <a href="/index.php/postings/post?id='.$v->getPostings()->getId().'" style="font-weight:bold;" title="Go to Post Preview" > 
                                   "'.$v->getPostings()->getPostingTitle().'"
                                </a> 
                            </span>                           
                        </div>';
            $html .= '  <br/>';     
                        $html .= '  <div style="font-size:12px;font-weight:normal;">
                           <p> '.$v->getPostings()->getPostingDesc().' </p>
                        </div>';
            $html .= '<span style="font-size:12px;font-weight:normal;float:left;"> 
                        <b> Date to Hangout : </b>'.$dateToHangout.'
                      </span>';
            $html .= '  <hr/>';
            $html .= '  </div> <br/>';
            
            $html .= '<div class="clear"></div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        $html .= '</div>'; 
//        $html .= '<div style="width:100%;float:left;"> [ <a href="#" id="myHotList" > Refresh </a> ] ';
//        $html .= '<div class="hr-pattern"></div></div>';
//        
        die($html);
        
    }
    
    public function executeDeleteHotList(sfWebRequest $request)
    {
        $hotlist_id = $request->getParameter('id');
        die(HotList::deleteHotList($hotlist_id));
    }
}