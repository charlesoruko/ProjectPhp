<?php
/*
$filenames = array_values(array_filter(scandir($filesfolderpath), function ($file) use ($filesfolderpath) {
        return !is_dir($filesfolderpath . '/' . $file);
    }));
    *


     //var_dump($filenames);
    /*
    $filenames = array(
        "audio/chat_sound.mp3",
        "audio/1.mp3",
        "audio/2.mp3",
        "audio/3.mp3",
        "audio/4.mp3"
    );
    //Save the current list to file
    $fp = fopen('currentfilelist.txt', 'w');
    fwrite($fp, json_encode($filenames));
    fclose($fp);


    $lastfile = file_get_contents("currentfilelist.txt");


*
  
//Get current folder path
$path = dirname(__FILE__);
//Store files in a subdirectory called files
$filesfolderpath =  $path . "/audio";

//get list of files in subfolder called audio
if (is_dir($filesfolderpath)) {

    $filenames = array("audio/chat_sound.mp3", 
                       "audio/1.mp3", 
                       "audio/2.mp3", 
                       "audio/3.mp3", 
                       "audio/4.mp3");

   
    //check if the subfolder is empty
    if (count($filesinfolder) > 0) {
        //select first file for deletion        
        $filetodelete = "chat_sound.mp3"; //$filenames[0];
        if (is_file($filesfolderpath . "/" . $filetodelete)) {
            //delete the file
            unlink($filesfolderpath . "/" . $filetodelete);
        }
    }
        //check is there is another file in the folder
        if (is_file($filesfolderpath . "/" . $filenames[1])) {
            // rename current file to deleted file name
            rename($filesfolderpath . "/" . $filenames[1], $filesfolderpath . "/" . $filenames[0]);
        }
        // Output number of remaining files
        echo $filetodelete . " File Deleted! - " . (count($filenames) - 1) . " Files Remaining";
    }
}

// run cron job every day :
// 0 0 * * * /path/cron.php
// run on command prompt in the php server


*/
