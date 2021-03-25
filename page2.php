
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
                margin-bottom: 5%;

            }
            /* Set the img class to format the thumbnail images */
            img {
                max-width: 100%;
                max-height: 100%;

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
            /* Set the properties for the postleft class, which is the class that contains the image thumbnails.
            Set the color as white and apply a shadow */
            #postleft{
                height: auto;
                margin: 1%;
                padding: 20px;
                background-color: white;
                box-shadow: 10px 10px 5px rgb(48,48,48);
            }
            /*set the content margins, set the display as a 2 column grid which will display the thumbnails*/
            .content {
                margin-top: 5%;
                display: grid;
                position: relative;
                margin-bottom: 1%;
                grid-template-columns: repeat(2, 2fr);
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

        </style>
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
                    <!-- TEST CASE 7 - Test the ADD PHOTO and sign out button on page2.php -->
                    <!-- Link the add photo button to page4.php -->
                    <a href="page4.php">ADD PHOTO</a>
                    &nbsp;
                    <!-- Link the sign out button to page1.php -->
                    <a href="page1.php">SIGN OUT</a>
                </div>
            </div>
        </div>
        <!-- Open the container and the content wrappers -->
        <div id="container">
            <div class="content">
                <!-- PHP script to read the xml file document -->
                <!-- TEST CASE 8 - Test the php script to ensure that all the contents from test.xml are read and displayed
                on page2.php and that each thumbnail appropriately links to page3-->
                <?php
                
                /* Load the xml file 'test.xml' using the simplexml function */
                $xml = simplexml_load_file('test.xml');

                /* Set the data variable to point to the photo elements array */
                $data=$xml->photo;

                /* Loop through all of the xml elements and display them */
                foreach($data as $x){
                    /* Set id2 variable to the individual photo id attribute */
                    $id2 = $x->attributes()->id;
                    /* Set the path variable to the elements' filename attribute */
                    $path = $x->filename;
                    ?>
                    <!-- For each element in the xml file, generate a new post class 
                    containing the image at $path and have it link to
                    page3 and pass the id variable to page3 -->
                    <div id="postleft">
                        <a href="page3.php?id=<?php echo $id2 ?>"><img src="<?= $path; ?>" width="500" height="300"/></a>
                    </div>
                <?php }?>
            </div>
        </div>
    </body>
</html>