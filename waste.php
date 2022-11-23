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
            fwrite($fp, json_encode($filenames, JSON_PRETTY_PRINT));
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













    /*
    if (is_file($path . "/currentfilelist.txt")) {
        $currentfilelist = file_get_contents("currentfilelist.txt");
        $filenames = json_decode($currentfilelist);
        echo json_encode($filenames);


        //select file for deletion        
        $filetodelete = "chat_sound.mp3";

        if (is_file($backupfolderpath . "/" . $filetodelete)) {
            //delete the file if it exists
            unlink($backupfolderpath . "/" . $filetodelete);

            //rename next file if it exists
            if (is_file($path . "/" . $filenames[1])) {
                rename($path . "/" . $filenames[1], $backupfolderpath . "/" . "chat_sound.mp3");
            }
            //update current file list variable
            $filenames[1] = "audio/chat_sound.mp3";
            $filelistnew = array_shift($filenames);

            //write the new file list to the currentfilelist file 
            $fp = fopen('currentfilelist.txt', 'w');
            fwrite($fp, json_encode($filenames, JSON_PRETTY_PRINT));
            fclose($fp);
        }
    } else {
        echo "Missing currentfilelist.txt . Please add some Files.";
    }
$filetodelete = "chat_sound.mp3";
    // $filetodelete = "chat_sound.jpg";

    if (is_file($audiopath . "/" . $filetodelete)) {
        //delete the file if it exists
        unlink($audiopath . "/" . $filetodelete);
    }



    */
