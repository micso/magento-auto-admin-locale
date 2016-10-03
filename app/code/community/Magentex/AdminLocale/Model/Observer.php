<?php

/**
 * @category   Magentex
 * @package    Magentex_AdminLocale
 * @author     Magentex Team <contact@magentex.net>
 */
class Magentex_AdminLocale_Model_Observer
{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function saveAdminUserLocale(Varien_Event_Observer $observer)
    {
        $post = Mage::app()->getRequest()->getPost();
        if (isset($post['locale']) && isset($post['user_id'])) {
            /* @var $userLocale Magentex_AdminLocale_Model_User_Locale */
            $userLocale = Mage::getModel('magentex_adminlocale/user_locale')->getByUserId((int)$post['user_id']);
            if (!$userLocale->getId()) {
                $userLocale->setUserId($post['user_id']);
            }
            $userLocale->setLocale($post['locale']);
            $userLocale->save();
        }
    }

    /**
     * @param Varien_Event_Observer $observer
     */
    public function setAdminUserLocale(Varien_Event_Observer $observer)
    {
        /* @var $user Mage_Admin_Model_User */
        $user = $observer->getUser();

        /* @var $userLocale Magentex_AdminLocale_Model_User_Locale */
        $userLocale = Mage::getModel('magentex_adminlocale/user_locale')->getByUserId((int)$user->getId());
        if ($userLocale->getId()) {
            Mage::getSingleton('adminhtml/session')->setLocale($userLocale->getLocale());
        }
    }
}
