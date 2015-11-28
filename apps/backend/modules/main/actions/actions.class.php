<?php

/**
 * main actions.
 *
 * @package    tnt
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeChangeLang() {
        $lang = $this->getRoute()->getObject();
        $this->getUser()->setCulture($lang->getSlug());
        $this->redirect('@homepage');
    }

    public function executePublicChange() {
        $this->deleteDir( sfConfig::get('sf_cache_dir') . '/frontend/prod/' );
        $this->getUser()->setAttribute('publicationFlag', false);
        $this->redirect('@homepage');
    }

    public static function deleteDir($dirPath) {
        if (!is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

}
