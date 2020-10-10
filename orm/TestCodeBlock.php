<?php 
    include_once 'DownloadLog.php';
    
    // provided code block
    $downloadLog = Orm\DownloadLog::create();
    echo ($downloadLog->isModified() ? 'DownloadLog is modified' : 'DownloadLog is not modified');
    $downloadLog->setFileId(1000)->setUserId(2000);
    echo ($downloadLog->isModified() ? 'DownloadLog is modified' : 'DownloadLog is not modified');
    echo ("UserId is: " . $downloadLog->getUserId());
    unset($downloadLog);
?>