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
            /* Set the properties of the header which contains the logo and sign out buttons
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
                font-size: 12px;
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
            /* Set the form container properties which consists of the upload form */
            .form-container {
                width: 500px;
                display: grid;
                clear: both;
            }
            /* Set the form container input properties */
            .form-container input {
                width: 100%;
                clear: both;
            }
            /* Set the image-preview box container properties */
            .image-preview{
                width: 300px;
                min-height: 100px;
                border: 2px solid grey;
                margin-top: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                color: grey;
            }
            /* Set the preview__image within the preview box */
            .image-preview__image{
                display: none;
                width: 100%;
            }
            /* Set the button properties */
            .button {
                background-color: white; /* Green */
                border: none;
                color: green;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 12px;
            }
            /* Set the form-buttons properties used for buttons on lower right of the form */
            .form-buttons {
                float: right;
            }
            /* Set the AddForm properties */
            .AddForm{
                font-size: 12px;
            }
        
        </style>
        <!-- Set the Title of the page to PicSnapShare -->
        <title>PicSnapShare</title>
    </head>
    <body>
        <!-- Set the header and header-container classes -->
        <div id="header">
            <div class="header-container">
                <!-- Place the header logo in a div -->
                <div>
                    <a href="page2.php"><img src="logo_final2.png" width="200" height="36" class="center"/></a>
                </div>
                <!-- TEST CASE 17 - Test the sign out button on page4.php -->
                <!-- Place the sign out link in the header links container -->
                <div id="header-links">
                    <a href="page1.php">SIGN OUT</a>
                </div>
            </div>
        </div>
        <!-- Open the container and the content wrappers -->
        <div id="container">
            <div class="content">
                <!-- Open up a new instance of the postleft class -->
                <div id="postleft">
                    <!-- Open the topline-container which will contain the title Add New image text and cancel button
                    to go back to page2 -->
                    <div class="topline-container">
                        <div>
                            <h2>Add a new photo</h2>
                        </div>
                        <div id="topline-links">
                            <!-- TEST CASE 18 - Test the cancel button on page4.php to ensure it takes user back to page2.php -->
                            <a href="page2.php">CANCEL</a>
                        </div>
                    </div>
                    <!-- Open the input form for photo upload have the form method as post and action as upload.php.
                    This will call the upload.php file to upload the photo and write contents of form to xml -->
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <!-- Wrap the form within a table of class AddForm to format nicely -->
                        <table class="AddForm">
                            <!-- Add a new table row for the Title-->
                            <tr>
                                <!-- Align title text label right -->
                                <td align="right">
                                    Title:&nbsp;&nbsp;
                                    <br><br>
                                </td>
                                <!-- Align title input box left -->
                                <td align="left">
                                    <!-- TEST CASE 19 - Test that this field is required -->
                                    <input type="text" id="title" name="title" required="required"/>
                                    <br><br>
                                </td>
                            </tr>
                            <!-- Add a new table row for the Image choose file -->
                            <tr>
                                <!-- Align Image text label right -->
                                <td align="right">
                                    Image:&nbsp;&nbsp;
                                    <br><br>
                                </td>
                                <!-- Align the Image input button left -->
                                <td align="left"><br>
                                    <!-- TEST CASE 20 - Test that an image is really required -->
                                    <input type="file" required="required" name="inpFile" id="inpFile" accept="image/x-png,image/gif,image/jpeg">
                                    <br>
                                    <br>
                                    <!-- Set the class for the image-preview to allow the user to see a preview of the image they're about to upload -->
                                    <div class="image-preview" id="imagePreview">
                                        <img src="" alt="Image Preview" class="image-preview__image">
                                        <span class="image-preview__default-text">Image Preview</span>
                                    </div>
                                </td>
                            </tr>
                            <!-- Define the script for the Image preview box -->
                            <script>

                                /* Define the variables needed by getting the inpFile and ImagePreview elements */
                                const inpFile = document.getElementById("inpFile");
                                const previewContainer = document.getElementById("imagePreview");
                                const previewImage = previewContainer.querySelector(".image-preview__image");
                                const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

                                /* function to clear the image if called */
                                function clearImage() {
                                    /* Set the previewDefault text style to null since no image is being displayed */
                                    previewDefaultText.style.display = null;
                                    previewImage.style.display = null;
                                    /* Set the previewImage to be blank */
                                    previewImage.setAttribute("src","")
                                }

                                /* Add an event listener to the inpFile input box, this will trigger this portion of the code ant time
                                a file is selected */
                                inpFile.addEventListener("change", function() {
                                        /* set the file as inpFile user picked */
                                        const file = this.files[0];

                                        /* TEST CASE 21 - Test to see that a file picked is displayed properly */
                                        /* If file exists then proceed to display image */
                                        if (file){
                                            /* create new file reader */
                                            const reader = new FileReader();

                                            /* Set the previewDefaultText display to be none and display style as block*/
                                            previewDefaultText.style.display = "none";
                                            previewImage.style.display = "block";

                                            /* add an event listener to this new reader to have it passed to previewImage after 
                                            the file is read */
                                            reader.addEventListener("load", function() {
                                                /* set the previewImage file source to be the one just read */
                                                previewImage.setAttribute("src", this.result);
                                            });
                                            /* have the reader read the file */
                                            reader.readAsDataURL(file);

                                        }
                                        /* If no file was picked in inpFile proceed to display default box and undisplay
                                        any image that was there previously as the user deselected it*/
                                        /* TEST CASE 22 - If user selects image and then proceeds to deselect it, verify that the 
                                        image disappears from the preview window */
                                        else{
                                            
                                            previewDefaultText.style.display = null;
                                            previewImage.style.display = null;
                                            previewImage.setAttribute("src","")
                                        }
                                });
                            </script>
                            <!-- Add a new table row for the description label and input -->
                            <tr>
                                <!-- Align the description label right -->
                                <td align="right"><br>
                                    <br>
                                    <br>Description:&nbsp;&nbsp;<br><br>
                                </td>
                                <!-- Align the description text box left -->
                                <td align="left"><br>
                                <!-- TEST CASE 23 - Test to verify that the description is really required -->
                                    <br><textarea id="description" required="required" name="description" rows="3" cols="45"></textarea><br><br>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <!-- Add the form-buttons to the bottom of the table -->
                        <div class="form-buttons">
                            <!-- TEST CASE 24 - verify that the CLEAR FORM button indeed clears the form -->
                            <button class="button" type="reset" value="Clear">CLEAR FORM</button>
                            &nbsp;&nbsp;&nbsp;
                            <!-- Upload photo button will submit the photo to upload.php to valdidate and upload -->
                            <button class="button" type="submit" name="submit">UPLOAD PHOTO</button>
                            &nbsp;&nbsp;&nbsp;
                            <!-- TEST CASE 25 - verify that the CLEAR IMAGE button deselects any selected image -->
                            <button class="button" type="button" onclick="clearImage()">CLEAR SELECTED IMAGE</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
