

<!DOCTYPE html>
<html>

<head>

    <title> Questionnaire </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style11.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style >
        td {
            padding:20px;
            text-align:left;
            text-decoration:underline;
        }
        th {
            padding:20px;
            text-align:left;
        }
    </style>

</head>


<body>
    <nav>
        <button type="button" class="header">
            <h2><label class="logo"> SunSetHotel
                </label></h2>
            <img src="Logopit123.png" alt="Imgae of hotel">
        </button>
        <ul>
            <li><a href="index.html"> Home </a></li>
            <li><a href="Log_in.html"> Sign In </a></li>
            <li><a href="AboutUs.html"> About Us </a></li>
            <li><a href="ContactUs.html"> Contact Us </a></li>
            <li><a href="Services.html"> Service </a></li>
            <li><a href="funpage.html"> Fun Time </a></li>
            <li><a href="Questionnaire.html"> Questions </a></li>
            <li><a href="Checking.html"> Checking table </a></li>
            <li><a href="HowBook.html"> Guide </a></li>
        </ul>
    </nav>
    <!--header end-->
    <br /></br>
    <br />
    <br />

    <center>


        <?php

        function test_input($data)                      //function that testing and fixing inputs
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }


        if (isset($_POST['question1']) and isset($_POST['question2']) and isset($_POST['question3']) and isset($_POST['question4'])) {  //if the user solve all questions
            $q1 = test_input($_POST['question1']);                             //saving answers
            $q2 = test_input($_POST['question2']);
            $q3 = test_input($_POST['question3']);
            $q4 = test_input($_POST['question4']);                        //displaying answers in table
            echo "<table style='font-size:30px;'>           
        <tr>
        <th>your experience</th><td>$q1</td>
        </tr>
        <tr>
        <th>your rate for the services</th><td>$q2</td>
        </tr>
        <tr>
        <th>best service</th><td>$q3</td>
        </tr>
        <tr>
        <th>your worst service</th><td>$q4</td>
        </tr>
        </table>";

            echo "Thank you for your opinion";
        } else {
            echo "<h1>You have to fill all fields</h1>";         //if not all fields are filled
        }


        ?>
        
        <!--footer-->
        <footer>
            <div class="footer-content">
                <ul class="socials"><!--social links-->
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="footer-bottom">
                <p>copyright &copy;2022 SunSetHotel</p>
            </div>
        </footer>
        <!--footer end-->

        <!--Script to know the pepole experience-->
        

    </center>

</html>

</body>