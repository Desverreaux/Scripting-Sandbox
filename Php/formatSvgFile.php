<?php

if($argc <= 1) {
    echo "The directory to be parsed must be supplied as an argument!";
    return NULL;
}

$targetDir = $argv[1];


$dir = new DirectoryIterator(dirname($targetDir));
if(!$dir->valid()) {
    echo "The directory supplied is empty.... aborting...";
    return NULL;
}
foreach( $dir as $fileinfo) {
    if(!$fileinfo->isDot()) {
        if($fileinfo->getExtension() == 'svg'){
            correctFile($fileinfo->getRealPath(), $fileinfo->getBasename(".svg"));
        }
        else {
            //raise error
            echo "The following file was not parsed as it is not a svg file: " . $fileinfo->getBasename() . "\n";
        }

    }
}

function correctFile($pathname, $filename) {
    $fileContents = "";
    $parsedContent = "";
    $contentToAdd = array(
        'fill="white"'
    );

    $INPUT_FILE = $pathname;
    $OUTPUT_FILE = $pathname;

    $pattern_id = '/(id=")[^"]*"/';
    $pattern_excessiveTags = '/(<g>)(\R|\r|\n)(<\/g>)(\R|\r|\n)/m';
    $pattern_comments = '/(<!--).+(-->)(\R|\r|\n)/m';

    if(!file_exists($INPUT_FILE)) {
        //raise error
    }

    $replacement_id = 'id="' . $filename . '"'; //add error checking
    $replacement_excessiveTags = '';
    $replacement_comments = '';

    $fileContents = file_get_contents($INPUT_FILE); //add error checking

    if(empty($fileContents)) {
        //raise error 
    }
   
    //adds additional attributes as a default to the parsed files, attributes added are defined in the array
    //defined above as $contentToAdd.
    foreach($contentToAdd as $attribute) {
        $attributePattern = '/(' . $attribute . ' )\s+/';
        $fileContents = preg_replace($attributePattern,NULL, $fileContents);
        $replacement_id .= " " . $attribute;
    }
    $replacement_id .= " "; // to make sure the last attribute added has a space between it and the next attribute definition



    $fileContents = preg_replace($pattern_id, $replacement_id, $fileContents);
    $fileContents = preg_replace($pattern_excessiveTags, $replacement_excessiveTags, $fileContents);
    $fileContents = preg_replace($pattern_comments, $replacement_comments, $fileContents);


    $parsedContent = $fileContents;

    file_put_contents($OUTPUT_FILE, $parsedContent);
    echo "file: " . $filename . " has been successfully reformatted\n";
}

?>