<?php

namespace App\Config;

class Cache {

  public $dirname;
  public $duration; // Minutes

  public function __construct($dirname, $duration) {
    $this->dirname = $dirname;
    $this->duration = $duration;
  }

  public function write($filename, $content) {
    return file_put_contents($this->dirname.'/'.$filename, $content);
  }

  public function read($filename) {
    $file = $this->dirname.'/'.$filename;
    if (!file_exists($file)) {
      return false;
    }
    $lifetime = (time() - filemtime($file)) / 60;
    if ($lifetime > $this->duration) {
      return false;
    }
    return file_get_contents($this->dirname.'/'.$filename);
  }

  public function detele($filename) {
    $file = $this->dirname.'/'.$filename;
    if (file_exists($file)) {
      unlink($file);
    }
  }

  public function clear() {
    $files = glob($this->dirname.'/*');
    foreach ($files as $file) {
      unlink($file);
    }
  }

  public function inc($file, $cachename = null) {
    if (! $cachename) {
      $cachename = basename($file);
    }
    if ($content = $this->read($filename)) {
      echo $content;
      return true;
    }
    ob_start();
    require $file;
    $content = ob_get_clean();
    $this->write($filename, $content);
    echo $content;
    return true;
  }

}
