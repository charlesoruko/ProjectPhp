<?php
//Get current folder path
$path = dirname(__FILE__);
//Store files in a subdirectory called files
$filesfolderpath =  $path . "/files";

//get list of files in subfolder called files
if (is_dir($filesfolderpath)) {
    $filenames = array_values(array_filter(scandir($filesfolderpath), function ($file) use ($filesfolderpath) {
        return !is_dir($filesfolderpath . '/' . $file);
    }));

    //check if the subfolder is empty
    if (count($filenames) > 0) {
        //select first file for deletion        
        $filetodelete = $filenames[0];
        if (is_file($filesfolderpath . "/" . $filetodelete)) {
            //delete the file
            unlink($filesfolderpath . "/" . $filetodelete);
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