<?php

function incluirClasses($nomeClasse){
  $filename = $nomeClasse . ".php";
  require_once($filename);
}
spl_autoload_register("incluirClasses");



?>