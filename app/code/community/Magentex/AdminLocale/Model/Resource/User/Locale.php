<?php

/**
 * @category   Magentex
 * @package    Magentex_AdminLocale
 * @author     Magentex Team <contact@magentex.net>
 */
class Magentex_AdminLocale_Model_Resource_User_Locale extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('magentex_adminlocale/user_locale', 'entity_id');
    }
}
