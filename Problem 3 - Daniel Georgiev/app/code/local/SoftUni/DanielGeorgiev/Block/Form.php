<?php

class SoftUni_DanielGeorgiev_Block_Form extends Mage_Core_Block_Template
{

    public function getActionUrl()
    {
        return $this->getUrl('danielgeorgiev/form/post');
    }
}