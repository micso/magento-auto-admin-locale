<?php

/**
 * @category   Magentex
 * @package    Magentex_AdminLocale
 * @author     Magentex Team <contact@magentex.net>
 */
class Magentex_AdminLocale_Model_User_Locale extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('magentex_adminlocale/user_locale');
    }

    /**
     * @param int $userId
     *
     * @return $this
     */
    public function getByUserId($userId)
    {
        $this->load($userId, 'user_id');

        return $this;
    }

}
