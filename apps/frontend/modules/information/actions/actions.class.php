<?php

/**
 * home actions.
 *
 * @package    sf_sandbox
 * @subpackage hotlist
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class informationActions extends sfActions
{   
    
    public function preExecute()
    {     

//        if(!isset($_SESSION['username'])){
//             $this->redirect("http://novarsoft.comuf.com/");
//         }
    } 
  
    public function executeIndex(sfWebRequest $request){}
     
    public function executeLearnMore(sfWebRequest $request){}
}