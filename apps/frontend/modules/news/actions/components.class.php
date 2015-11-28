<?php

class newsComponents extends sfComponents {

  public function executeGenerateNaviPage() {
    $this->objectPrev = newsTable::prevNews($this->object);
    $this->objectNext = newsTable::nextNews($this->object);
  }

}

?>
