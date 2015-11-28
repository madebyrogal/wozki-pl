<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of components
 *
 * @author Rogal
 */
class mainComponents extends sfComponents {

  public function executeModules() {
    $groupModules = module_groupTable::getModuleGroups();
    foreach ($groupModules as $groupModule) {
      $moduleGroupPermission = module_group_permissionTable::getModuleGroupPermission($groupModule->getId());
      if ($moduleGroupPermission) {
        $authenticatedModuleGroup = false;
        foreach ($moduleGroupPermission as $item) {
          if ($this->getUser()->hasPermission($item->permission->getName())) {
            $authenticatedModuleGroup = true;
          }
        }
        if ($authenticatedModuleGroup) {
          $modulesCms[$groupModule->getName()][] = $this->getModuleWithPermission($groupModule->getId());
        }
      } else {
        $modulesCms[$groupModule->getName()][] = $this->getModuleWithPermission($groupModule->getId());
      }
    }
    if($modulesCms){
      $this->modules = $modulesCms;
    }
  }

  private function getModuleWithPermission($groupModuleId) {
    $modules = module_cmsTable::getModulesByModuleGroupId($groupModuleId);
    foreach ($modules as $key => $module) {
      $modulePermission = module_permissionTable::getInstance()->findBy( 'module_id', $module->getId() );
      if ( $modulePermission->count() ) {
        $authenticatedModule = false;
        foreach ($modulePermission as $item) {
          if ($this->getUser()->hasPermission($item->permission->getName())) {
            $authenticatedModule = true;
          }
        }
        if (! $authenticatedModule) {
          $modules->remove($key);
        }
      }
    }
    return $modules;
  }
  
  public function executeHeader(){
    $this->publicationFlag = $this->getUser()->getAttribute('publicationFlag');
  }
}

?>
