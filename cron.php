<?php
//Get current folder path
$path = dirname(__FILE__);
//Store files in a subdirectory called audio
$filesfolderpath =  $path . "/audio";

// check if audio subfolder exists before continuing
if (is_dir($filesfolderpath)) {

    //file list stored in the file called currentfilelist

    // read and display current file list
    if (is_file($path . "/currentfilelist.txt")) {
        $currentfilelist = file_get_contents("currentfilelist.txt");
        $filenames = json_decode($currentfilelist);
        echo json_encode($filenames);


        //select file for deletion        
        $filetodelete = "chat_sound.mp3";
        if (is_file($filesfolderpath . "/" . $filetodelete)) {
            //delete the file if it exists
            unlink($filesfolderpath . "/" . $filetodelete);

            //rename next file if it exists
            if (is_file($path . "/" . $filenames[1])) {
                rename($path . "/" . $filenames[1], $filesfolderpath . "/" . "chat_sound.mp3");
            }
            //update current file list variable
            $filenames[1] = "audio/chat_sound.mp3";
            $filelistnew = array_shift($filenames);

            //write the new file list to the currentfilelist file
            $fp = fopen('currentfilelist.txt', 'w');
            fwrite($fp, json_encode($filenames));
            fclose($fp);
        }
    } else {
        echo "Missing currentfilelist.txt . Please Create this File.";
    }
} else {
    echo "Audio Subfolder missing. Please Create this folder";
}

// run cron job every day :
// 0 0 * * * /path/cron.php
// run on command prompt in the php server
