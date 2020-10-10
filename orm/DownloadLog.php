<?php

namespace Orm;

include_once 'IsNumericChecker.php';
include_once 'ActiveRecordInterface.php';
include_once 'ActiveRecord.php';

final class DownloadLog extends ActiveRecord
{
    use IsNumericChecker;

    /* @var int */
    private $fileId;

    /* @var int */
    private $userId;

    public function create() {
        return new DownloadLog;
    }

    public function setFileId($newId) {
        if(IsNumericChecker::isNumeric($newId)) {
            $this->fileId = $newId;
            $this->isModified = true;
        }
        return $this;
    }

    public function setUserId($newId) {
        if(IsNumericChecker::isNumeric($newId)) {
            $this->userId = $newId;
            $this->isModified = true;
        }
        return $this;
    }
    
    public function getUserId() {
        return $this->userId;
    }

    function __destruct() {
        echo "Destroying" . __CLASS__ . "\n";
    }
}



?>