<?php

/**
 * main actions.
 *
 * @package    tnt
 * @subpackage main
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        if (!$request->getParameter('sf_culture')) {
            if ($this->getUser()->isFirstRequest()) {
                $culture = $request->getPreferredCulture(array('pl', 'en', 'de', 'ru'));
                $this->getUser()->setCulture($culture);
                $this->getUser()->isFirstRequest(false);
            } else {
                $culture = $this->getUser()->getCulture();
            }

            $this->redirect('homepage');
        }
        
        $this->forward('page', 'index');
    }

}
