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
                color: green;
                margin-right: 0px;
                padding: 10px;
            }
            /*Set the username and password left margins*/
            #UserName{

                margin-left: 2em;
            }
            #Password{
                margin-left: 2.8em;
            }
            /*set the margins of the container, width as 36% and margin as auto in order to center the page*/
            #container {
                background-color: white;
                margin: auto;
                margin-top: 17%;
                margin-bottom: 1%;
                width: 36%;
                height: auto;
                
            }
            /*set the content margins, set the display as grid and add a shadow for styling*/

            #content {
                
                margin-top: 37%;
                display: grid;
                padding: 5%;
                padding-bottom: 1%;
                margin-bottom: 1%;
                height: auto;
                box-shadow: 10px 10px 5px rgb(48,48,48);
            }
            /*Set the login and clear form button properties*/ 
            .button {
                background-color: white;
                border: none;
                color: green;
                text-align: center;
                font-size: 12px;
                }
            /*have both the login and clear form buttons float right*/
            .form-buttons {
                float: right;
                height: auto;
                }
            /*set the div property for the logo on the login screen*/
            div{
                text-align: center;
                margin-bottom: 3%;
            }

        </style>
        <!-- Set the title of the page to PicSnapShare -->
        <title>PicSnapShare</title>

        <!-- This is a PHP script that validates the user login form -->
        <?php
            /* Only run the script if the login form has been posted which is when button with name submit is clicked*/
            if(isset($_POST['submit'])){
                
                /* Retrieve the username and password from the form input boxes */
                $username = $_POST['UserName'];
                $password = $_POST['password'];

                /* TEST CASE 1 - If the username and password is correct then move to page2 */
                if($username==="username" and $password==="password"){
                    header("Location: page2.php");

                }
                else{
                    /* TEST CASE 2 - If the username and password are incorrect, display JS alert */
                    if($username!=="username" and $password !=="password"){
                        echo '<script language="javascript">';
                        echo 'alert("Wrong username and password")';
                        echo '</script>';
                    }
                    /* TEST CASE 3 - If the username is incorrect, display JS alert */
                    else if ($username!=="username"){
                        echo '<script language="javascript">';
                        echo 'alert("You entered the wrong username!")';
                        echo '</script>';

                    }
                    /* TEST CASE 4 - If the password is incorrect, display JS alert */
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("You entered the wrong password!")';
                        echo '</script>';
                    }

                }
            }?>
    </head>
    <body>
        <!-- Open the container tag which is designed to center the login box itself -->
        <div id="container">
            <!-- Open the content box which is designed to center the form and logo within the container -->
            <div id="content">
                <div>
                    <!-- Insert the logo image at specified size -->
                    <img src="logo_final2.png" width="200" height="36" class="center"/>
                </div>
                <!-- Insert the input form with an action of the current page, it will trigger the php function
               above when the submit button is pressed -->
                <form action="page1.php" method="POST" enctype="multipart/form-data">
                        <!-- Set the label and input for username -->
                        <label for="UserName">User Name: Enter "Username"</label>
                        <!-- TEST CASE 31-verify that username is really required -->
                        <input type="text" name="UserName" id="UserName" required="required">
                    <br>
                    <br>
                        <!-- TEST CASE 32-verify that password is really required -->
                        <!-- Set the label and input for password -->
                        <label for="Password">Password: Enter "Password"</label>
                        <input type="password" name="password" id="Password" required="required">
                    <br>
                    <br>
                    <!-- Wrap the form buttons in the div class form-buttons, this is so they can be displayed
                aligned to the right and adjacent to one anothet -->
                    <div class="form-buttons">
                        <!-- TEST CASE 5 - Set the button to clear the form-->
                        <button class="button" type="reset" value="Clear">CLEAR FORM</button>
                        &nbsp;&nbsp;&nbsp;
                        <!-- TEST CASE 6 - Set the button to submit the form and run the php validation-->
                        <button class="button" type="submit" name="submit">LOGIN</button>                          
                </form>
            </div>
        </div>
    </body>
</html>