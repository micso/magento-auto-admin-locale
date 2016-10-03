<?php

/**
 * @category   Magentex
 * @package    Magentex_AdminLocale
 * @author     Magentex Team <contact@magentex.net>
 */
class Magentex_AdminLocale_Block_Adminhtml_Permissions_User_Edit_Tab_Locale extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    /**
     * @return string
     */
    public function getTabLabel()
    {
        return $this->__('User Locale');
    }

    /**
     * @return string
     */
    public function getTabTitle()
    {
        return $this->__('User Locale');
    }

    /**
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $model = Mage::registry('permissions_user');

        $form = new Varien_Data_Form();

        $form->setHtmlIdPrefix('user_');

        $fieldset = $form->addFieldset(
            'interface_fieldset', array('legend' => Mage::helper('adminhtml')->__('Admin Panel'))
        );

        $translatedOptionLocales = Mage::app()->getLocale()->getTranslatedOptionLocales();
        array_unshift($translatedOptionLocales, array('value' => null, 'label' => ''));

        $fieldset->addField(
            'locale', 'select', array(
                'name'     => 'locale',
                'label'    => Mage::helper('adminhtml')->__('Interface Locale'),
                'id'       => 'locale',
                'title'    => Mage::helper('adminhtml')->__('Interface Locale'),
                'required' => false,
                'values'   => $translatedOptionLocales
            )
        );

        $data = $model->getData();

        /* @var $userLocale Magentex_AdminLocale_Model_User_Locale */
        $userLocale = Mage::getModel('magentex_adminlocale/user_locale')->getByUserId((int)$data['user_id']);
        if ($userLocale->getId()) {
            $data['locale'] = $userLocale->getLocale();
        }

        $form->setValues($data);

        $this->setForm($form);

        return parent::_prepareForm();
    }
}
