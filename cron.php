<?php
//Get current folder path
$path = dirname(__FILE__);
//Store files in a subdirectory called backup and audio
$backupfolderpath =  $path . "/backup";
$audiopath =  $path . "/audio";

// check if backup subfolder exists before continuing
if (is_dir($backupfolderpath)) {



    // read and display current file list in backup folder
    $filenames = array_values(array_filter(scandir($backupfolderpath), function ($file) use ($backupfolderpath) {
        return !is_dir($backupfolderpath . '/' . $file);
    }));
    echo json_encode($filenames, JSON_PRETTY_PRINT);


    //selet random file from list and display
    $randomfile = array_rand($filenames, 1);
    $newfile = $filenames[$randomfile];
    echo "<br/> Current file : " . $newfile;

    //copy file to audio folder and overwrite chat_sound if required

    copy($backupfolderpath . "/" . $newfile, $audiopath . "/chat_sound.mp3");
} else {
    echo "backup folder missing. Please Create this folder";
}

// run cron job every day :
// 0 0 * * * /path/cron.php
// run on command prompt in the php server
