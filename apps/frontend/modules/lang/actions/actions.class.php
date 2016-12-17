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

    public function executeChangeLang(sfWebRequest $request)
    {
        $this->deleteDir(sfConfig::get('sf_cache_dir') . '/frontend/prod/');
        $lang = $this->getRoute()->getObject();
        $this->getUser()->setCulture($lang->getSlug());
        $this->getUser()->setAttribute('langId', $lang->getId());
        $urlWithNewCulture = $this->changeLangInReferer($request->getReferer(), $lang->getSlug());
        $this->redirect($urlWithNewCulture);
    }

    public static function deleteDir($dirPath)
    {
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
        if (is_dir($dirPath)) {
            rmdir($dirPath);
        }
    }
    
    private function changeLangInReferer($refererURL, $newLangSlug)
    {
        $envPrefix = sfConfig::get('sf_environment') === 'dev' ? 'frontend_dev.php' : '';
        $pareseReferer = parse_url($refererURL);
        $path = explode('/', substr($pareseReferer['path'], 1));
        if ($path[0] === $envPrefix) {
            array_shift($path);
        }
        $path[0] = $newLangSlug;
        $pareseReferer['path'] = "$envPrefix/" . join('/', $path);
        $newURLReferer = $pareseReferer['scheme'] . '://' . $pareseReferer['host'] . $pareseReferer['path'];
        $newURLReferer .= $pareseReferer['query'] ? '?' . $pareseReferer['query'] : '';

        return $newURLReferer;
    }

}
