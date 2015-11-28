<?php

/**
 * newsletter actions.
 *
 * @package    tnt
 * @subpackage newsletter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsletterActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        if ($request->isMethod(sfRequest::POST)) {
            $form = new newsletterAddressForm();
            $values = $request->getParameter($form->getName());
            if ($values['action'] === 'sign') {
                $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
                if ($form->isValid()) {
                    $form->save();
                }
                $this->form = $form;
            } else{
                $newsletter = newsletter_addressTable::getInstance()->findOneBy('email', $values['email']);
                if($newsletter){
                    $newsletter->delete();
                }
                else{
                    $this->errorSignOut = 'Podany email nie istnieje. Lub już został wypisany';
                }
            }

            $this->action = $values['action'];
            $this->page = pageTable::getPageByRouteHash('newsletter');
            $this->pageContext = textTable::getPageContext($this->page->getId());
        }
    }

}
