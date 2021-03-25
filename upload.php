<!-- This script uploads the image from page4.php and amends the test.xml file with the data from the form -->
<?php
    /* if the posted with the submit go ahead and run the following */
    if(isset($_POST['submit'])){
        /* get all the variables from the POST request including all file attributes, name, size, tmp_name and type and if there was an error */
        $file = $_FILES['inpFile'];

        $fileName = $_FILES['inpFile']['name'];
        $fileTmpName = $_FILES['inpFile']['tmp_name'];
        $fileSize = $_FILES['inpFile']['size'];
        $fileError = $_FILES['inpFile']['error'];
        $fileType = $_FILES['inpFile']['type'];

        /* Get the title and description in preparation to append to xml */
        $title = $_POST['title'];
        $description = $_POST['description'];

        /* get the extension of the fileName and force it to all lower-case */
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        
        /* keep only jpg, jpeg, png and gif as the allowed file types */
        $allowed = array('jpg','jpeg','png','gif');
        

        /* if the actual extension of the file is within the array of allowed file types proceed, else throw an error message */
        if(in_array($fileActualExt, $allowed)){
            /* If there was no file error, proceed */
            if($fileError===0){
                /* If the file size is less than 10MB, then proceed */
                if($fileSize<10000000){
                    /* load the test.xml file and get the attribute with the max id */
                    $xml = simplexml_load_file('test.xml'); 
                    $elements = $xml->xpath("//photo[not(@id < ../photo/@id)][1]");

                    /* Get the id attribute of the element with max id, this will tell which id to assign to new image that's being added */
                    $max=$elements[0]->attributes()->id;

                    /* Add a new photo child to the xml document */
                    $photo=$xml->addChild('photo','');
                    /* Assign the id of the new photo element to be the max current id plus 1 */
                    $photo->addAttribute(id, ($max+1));

                    /* Assign the title, filename and description from the POST request */
                    $photo->addChild("title", $title);
                    $photo->addChild("filename", "images/".($max+1).".".$fileActualExt);
                    $photo->addChild("description", $description);
                    
                    /* Format as XML document and resave test.xml */
                    /* TEST CASE 26 - verify that new file is written to test.xml after the upload is done */
                    $dom = new DOMDocument("1.0");
                    $dom->preserveWhiteSpace = false;
                    $dom->formatOutput = true;
                    $dom->loadXML($xml->asXML('test.xml'));

                    /* calculate the file path to images folder and assign to fileDesination in preparation to move file */
                    $fileDestination = "images/".($max+1).".".$fileActualExt;

                    /* Move the uploaded file to the fileDesination */
                    /* TEST CASE 27 - verify that the file has been moved to the images folder */
                    move_uploaded_file($fileTmpName, $fileDestination);
                    /* Redirect user to page2.php */
                    /* TEST CASE 28 - Verify that the user is redirected to page2 after upload is complete */
                    header("Location: page2.php");


                }else{
                    /* TEST CASE 29-test by uploading a file larger than 10 MB to see if error is thrown */
                    echo "File size exceeds 10MB. Please reupload a file that's 10MB or less";
                    exit();
                }
                                
            }
            else{
                echo "There was an error uploading the file!";
                exit();
            }


        }else{
            /* TEST CASE 30 - test by uploading a non-image file to see if error is thrown */
            echo "You did not select an image file. Please only upload PNG/JPG/GIF image files.";
            exit();

        };
        

    };

?>