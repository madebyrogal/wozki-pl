<?php

/**
 * newsletter_address form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsletterAddressForm extends sfForm {

    public function configure() {
        $actionChoise = array('sign' => sfContext::getInstance()->getI18N()->__('zapisz'), 'unsign' => sfContext::getInstance()->getI18N()->__('wypisz'));
        $validActionChoise = array_keys($actionChoise);

        $this->widgetSchema->setNameFormat('newsletter_address[%s]');
        $this->widgetSchema['email'] = new sfWidgetFormInput(array(), array('placeholder' => sfContext::getInstance()->getI18N()->__('Twój e-mail')));
        $this->widgetSchema['action'] = new sfWidgetFormChoice(array('choices' => $actionChoise, 'multiple' => false, 'expanded' => true));

        if (!$this->isBound()) {
            $this->setDefault('action', 'sign');
        }
        $this->validatorSchema['email'] = new sfValidatorEmail(array(), array('required'=>'Musisz podać nam swój email', 'invalid'=>'Podałeś niepoprawny email'));
        $this->validatorSchema['action'] = new sfValidatorChoice(array('choices' => $validActionChoise));

        $this->validatorSchema->setPostValidator(
                new sfValidatorDoctrineUnique(array('model' => 'newsletter_address', 'column' => array('email')), array('invalid'=>'Podany email jest już w bazie') )
        );
    }

    public function save() {
        $values = $this->getValues();
        switch ($values['action']) {
            case 'sign':
                $model = new newsletter_address();
                unset($values['action']);
                foreach ($values as $key => $val) {
                    $model->set($key, $val);
                }
                $model->setConfirm(1);
                $model->setHash(md5($values['email'] . time()));
                $model->save();
                break;
            case 'unsign':
                $result = newsletter_addressTable::deleteAddress($values['email']);
                break;
        }
    }

}
