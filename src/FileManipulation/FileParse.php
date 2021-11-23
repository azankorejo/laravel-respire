<?php

namespace azankorejo\Respire\FileManipulation;

use azankorejo\Respire\FilePublish;

class FileParse
{

    public function parse(string $model)
    {
        $getFile = file_get_contents('\Observer.stub');
        $fileResult = FilePublish::alter($getFile,$model);
        $saveFile = $this->save();
    }

    public function save()
    {
        // save file
    }

}