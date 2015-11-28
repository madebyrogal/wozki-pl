<?php

/**
 * lang actions.
 *
 * @package    tnt
 * @subpackage lang
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class langActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  
  public function executeChangeLang(sfWebRequest $request){
    $this->deleteDir( sfConfig::get('sf_cache_dir') . '/frontend/prod/' );
    $lang = $this->getRoute()->getObject();
    $this->getUser()->setCulture( $lang->getSlug() );
    $this->getUser()->setAttribute( 'langId', $lang->getId() );
    $this->redirect($request->getReferer());
  }
  
  public static function deleteDir($dirPath) {
//        if (!is_dir($dirPath)) {
//            throw new InvalidArgumentException("$dirPath must be a directory");
//        }
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
        if(is_dir($dirPath)) rmdir($dirPath);
    }
}
