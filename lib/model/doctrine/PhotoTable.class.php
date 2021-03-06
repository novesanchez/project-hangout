<?php

/**
 * PhotoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PhotoTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object PhotoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Photo');
    }
    
    public function getPicturePath($profilePictureId = null)
    {        
        $result = $this->createQuery('p')->where('p.id = ?',$profilePictureId)->limit(1)->fetchArray();
        return $result;     
    }
    
    public function getPhotos($memberId = null, $orderBy = 'order')
    {
        $result = $this->createQuery('p')->where('p.member_id = ?',$memberId)->orderBy($orderBy)->fetchArray();
        return $result;
    }
}