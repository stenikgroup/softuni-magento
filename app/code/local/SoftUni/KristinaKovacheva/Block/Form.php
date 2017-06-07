<?php

class SoftUni_KristinaKovacheva_Block_Form extends Mage_Core_Block_Template
{
    public function getActionUrl()
    {
        return $this->getUrl('softuni_kristinakovacheva/form/post');
    }
}