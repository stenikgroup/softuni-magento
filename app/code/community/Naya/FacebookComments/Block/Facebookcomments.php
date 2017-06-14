<?php
class Naya_FacebookComments_Block_Facebookcomments extends Mage_Core_Block_Template
{
    public function getLanguage(){
        return Mage::getStoreConfig('naya_facebookcomments/general/language');
    }
    
    public function getAppId(){
        $appID = Mage::getStoreConfig('naya_facebookcomments/general/site_id');
        if($appID != ''){
            return '&appId='.$appID;
        }
        return '';
    }
    
    public function getNumOfComments(){
        return Mage::getStoreConfig('naya_facebookcomments/general/num_post');
    }
    
    public function getProductUrl(){
        return Mage::registry('current_product')->getProductUrl();
    }
}