<?php
class sfWidgetFormPopUpImageBrowser extends sfWidgetFormInputText
{
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('folder', '');
    $this->addRequiredOption('id');
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $input = parent::render($name, $value, $attributes, $errors);
    $button = '<a id="'.$this->getOption('id').'_tinybrowser" href="" title="Przeglądaj" class="fileBrowser">Przeglądaj</a>';
    $js = '
    <script type="text/javascript">
    $(document).ready(function(){
      //Uruchomienie tinyBrowser z zaznaczeniem folderu w ktorym jest media
      $("#'.$this->getOption('id').'_tinybrowser").click(function(event){
        event.preventDefault();
        var folder = $(this).parent().find("input").val();
        if(folder == ""){
          folder = "'.$this->getOption('folder').'"
        }
        var id = $(this).parent().find("input").attr("id");
        var path = folder.split("/");
        folder = "";
        var i = 0;
        var lenght = path.length;
        var flag = false;
        for(i=0; i<lenght; i++){
            //Te sciezki moga sie roznic w roznych projektach, mozna to traktowac jako konfig
            if(path[i] == "useruploads" && (path[parseInt(i)+1] == "images" || path[parseInt(i)+1] == "media")){
                flag = true;
                i = i+2;
            }
            if(flag && i<lenght-1){
                folder += path[i] + "/";
            }
        }
        folder = folder.substr(0, folder.length-1);
        if( $(this).is(".fileBrowser") ){
            tinyBrowserPopUp("image",id, folder);
        }
        else if( $(this).is(".movieBrowser") ){
            tinyBrowserPopUp("media",id, folder);
        }
        
      });
    });
    </script>';

    return $input . $button . $js;
  }
  
  public function getJavascripts()
  {
    $js = array();
    $js[] = '/js/jquery';
    $js[] = '/js/tiny_mce/plugins/tinybrowser/tb_standalone.js.php';
    return $js;
  }
}
