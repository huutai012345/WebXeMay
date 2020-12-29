<?php

class UploadFile
{
  private $target_dir = "../resource/img/";
  private $file;
  private $target_file;
  private $imageFileType;

  public function __construct($file)
  {
    $this->file = $file;
    $this->imageFileType = strtolower(pathinfo($this->target_dir . basename($this->file["img"]["name"]), PATHINFO_EXTENSION));
    $this->target_file =  "1";
  }

  public function check()
  {
    if (
      $this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg"
      && $this->imageFileType != "gif"
    ) {
      return false;
    }

    return true;
  }

  public function upload()
  {
    if ($this->check()) {
      while (file_exists($this->target_file . '.' . $this->imageFileType)) {
        $this->target_file = $this->target_file . '1';
      }

      $this->target_file = $this->target_file . '.';
      if (move_uploaded_file($this->file["img"]["tmp_name"], $this->target_dir . $this->target_file . $this->imageFileType)) {
        return $this->target_file . $this->imageFileType;
      } else {
        return "";
      }
    }
  }
}
