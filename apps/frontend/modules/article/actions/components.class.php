<?php

class articleComponents extends sfComponents {

  public function executeGenerateNaviPage() {
    $this->objectPrev = articleTable::prevArticle($this->object);
    $this->objectNext = articleTable::nextArticle($this->object);
  }

}

?>
