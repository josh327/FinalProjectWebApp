<html>
    <head>
    <style>
        /*remove the default margin and padding*/
        *{
            margin: 0px;
            padding: 0px;
        }
        /*set the background of the page to green, set default font and color as well as bottom padding*/
        body{
            background-color: green;
            font-family: Arial, Helvetica, Verdana, sans-serif;
            font-size: 12px;
            margin-bottom: 2%;

        }
        /* Set the img class to format the thumbnail images */
        img {
            max-width: 100%;
            max-height: 100%;
        }
        /* Set the styling for h1 and h2 headings */
        h1 {
            size: 2em;
            color: blue;
        }

        h2 {
            font-size: 2em;
            text-decoration: none;
            color: black;
            color:green;
            padding-bottom: 20px;
        }
         /* Set the properties of the header which contains the logo and the add photo and sign out buttons
            make the background color of the header as white to contrast with the body and apply a shadow */
        #header {
            text-align: left;
            background-color: white;
            position: relative;
            vertical-align: center;
            width: auto;
            padding: 15px;
            display: block;
            height: auto;
            box-shadow: 5px 5px 5px rgb(48,48,48);
        }
        /* Set the link styling */
        a {
            color: green;
            text-decoration: none;
            vertical-align: middle;
        }
        /* Set the properties for the postleft class*/
        #postleft{
            height: auto;
            margin: 1%;
            padding: 20px;
            background-color: white;
            box-shadow: 10px 10px 5px rgb(48,48,48);
        }
        /*set the content margins to have content centered within container*/
        .content {
            margin-top: 5%;
            display: grid;
            position: relative;
            margin-bottom: 1%;
            gap: 1%;
            height: auto;
            margin: auto;
        }
        /*set the margins of the container, width as 80% and margin as auto in order to center the page*/
        #container {
            margin: auto;
            margin-top: 1%;
            margin-bottom: 1%;
            width: 80%;
            height: auto;
        }
        /* Set the header container as a 2 column grid which will house the header logo and header links */
        .header-container{
            margin: auto;
            display: grid;
            width: 80%;
            height: auto;
            grid-template-columns: repeat(2, 2fr);
        }
        /* Set the header links class which will align the links in the right side of the header */
        #header-links{
            color: black;
            text-align: right;
            vertical-align: middle;
            padding-top: 10px;
        }
        /* Set the topline container as a 2 column grid which will house the title of the photo and the
        delete photo and go back links*/
        .topline-container{
            margin: auto;
            display: grid;
            height: auto;
            grid-template-columns: repeat(2, 2fr);
        }
        /* Set the topline links class which will contain the delete photo and go back links */
        #topline-links{
            color: black;
            text-align: right;
            vertical-align: middle;
        }
    </style>   
    <!-- Define the PHP script responsible for deleting a photo -->
    <?php
        /* Define the deletePhotoPHP function which will be called once the deleteid variable is set */
        function deletePhotoPHP(){

            /* Load the test xml file in order to delete the contents */

            $xml = simplexml_load_file('test.xml');
            /* Retrieve the id of the photo to be deleted using GET and set it as $id*/
            $id=htmlspecialchars($_GET["deleteid"]);

            /* Retrieve the element by photo id using an xpath expression to query for the photo by $id
            this will return all the elements of the photo in an object array*/
            list($element) = $xml->xpath("//photo[@id='{$id}']");

            /* Get the filename of the element to delete */
            $filetodelete = $element[0]->filename;

            /* TEST CASE 9 - Test to ensure that an image is deleted from the images folder after deleting */
            /* Delete the file from the images folder using unlink */
            unlink($filetodelete);

            /* TEST CASE 10 - Test to ensure that the photo element that was deleted is removed from the xml file */
            /* Delete the xml element using unset */
            unset($element[0]);
            
            /* create a new DOMDocument to format xml */
            $dom = new DOMDocument("1.0");
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            /* Save the xml file after deleting the item */
            $dom->loadXML($xml->asXML('test.xml'));

            /* TEST CASE 11 - Ensure that the page redirects to page2 after deleting photo */
                /* After deleting the file from xml and directory, redirect user to page2 */
            header("Location: page2.php"); 
        }
        /* if statement that calls the deletePhotoPHP function, the function is only called if deleteid is set */
        if (isset($_GET['deleteid'])) {
            deletePhotoPHP();
        }
    ?>
    <!-- Set the title of the page to PicSnapShare -->
    <title>PicSnapShare</title>
    </head>
    <body>
        <!-- Open the header and header container -->
        <div id="header">
            <div class="header-container">
                <!-- Place the header logo in a div -->
                <div>
                    <a href="page2.php"><img src="logo_final2.png" width="200" height="36" class="center"/></a>
                </div>
                <!-- Place both the add photo and sign out links in the header links container -->
                <div id="header-links">
                    <!-- TEST CASE 12 - Test the ADD PHOTO and sign out button on page3.php -->
                    <!-- Link the add photo button to page4.php -->
                    <a href="page4.php">ADD PHOTO</a>
                    &nbsp;
                    <a href="page1.php">SIGN OUT</a>
                </div>
            </div>
        </div>
         <!-- Open the container and the content wrappers -->
        <div id="container">
            <div class="content">
                <!-- TEST CASE 13 - Test to see that the correct image opens up once a thumbnail is clicked -->
                <!-- PHP script to get the appropriate image id from the URL, which was passed on by page 2
                This ensures that the appropriate image that the user clicked on is the one that opens up on this page -->
                <?php
                /* Get the id that was passed in page2 from the URL */                    
                $id=htmlspecialchars($_GET["id"]);
                
                /* Load the xml file 'test.xml' using the simplexml function */
                $xml = simplexml_load_file('test.xml'); // assume XML in $x
                /* Retrieve the element by photo id using an xpath expression to query for the photo by $id
                this will return all the elements of the photo in an object array*/
                $elements = $xml->xpath("//photo[@id='{$id}']");

                /*Retrieve the title, filename and description attributes from the XML object and assign them to variables */
                $title = $elements[0]->title;
                $path = $elements[0]->filename;
                $desc = $elements[0]->description;
                ?>
                <!-- Open up a new instance of the postleft class -->
                <div id="postleft">
                    <!-- Open the topline-container which will contain the title of the image as well as the links
                to delete the image and go back to page2 -->
                    <div class="topline-container">
                        <div>
                            <!-- Display the title element of the image that was opened in an h2 heading -->
                            <h2><?= $title; ?></h2>
                        </div>
                        <!-- Open the topline-links wrapper which will contain the delete photo and go back links -->
                        <div id="topline-links">
                            <!-- Set the link to delete the photo back to page3 itself with a deleteid variable set to the
                            id of the current image that the user requested to be deleted. This will trigger the GET method
                            on this page and call the deletePhotoPHP function, which will delete the photo-->

                            <!-- TEST CASE 14 - Ensure that the delete photo button works and that the photo is deleted from 
                            page2 after clicking this button -->
                            <a href='page3.php?deleteid=<?= $id; ?>'>DELETE PHOTO</a>
                            &nbsp;&nbsp;&nbsp;
                            <!-- TEST CASE 15 - Test to see that this button takes you back to page2 -->
                            <a href="page2.php">GO BACK</a>
                        </div>
                    </div>
                    <!-- TEST CASE 16 - Test to see that the correct image, description and title are displayed -->
                    <!-- Display the image found at the $path variable -->
                    <img src="<?= $path; ?>"/>
                    <br><br>
                    <!-- Display the Description heading in the h2 tags -->
                    <h2>Description</h2>
                    <!-- Display the description from the description variable -->
                    <p><?= $desc; ?></p>
                </div>
            </div>
        </div> 
    </body>
</html>
