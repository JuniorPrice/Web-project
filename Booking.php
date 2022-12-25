<?php
include('connectdb.php');  //include connecting bage to database 
function test_input($data)                //test inputs
{
    $data = trim($data);         
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$name;
if(sizeof($_POST)>3){                                                    //check if this page were reached from sign up page or from login page( >2 means from sign up page)
    $name = mysqli_real_escape_string($conn,test_input($_POST['name'])) ;   //save inputs into vars with checking and escaping for special characters.
    $email = mysqli_real_escape_string($conn,test_input($_POST['email'])) ;
    $uname = mysqli_real_escape_string($conn,test_input($_POST['uname'])) ;
    $pwd = mysqli_real_escape_string($conn,test_input($_POST['password'])) ;
    if ($name=="" or $email=="" or $uname=="" or $pwd=="") {                    //check if the inputs are empty
    header("Location: Log_in.html?notSeccess");                                 //return to sign up page
    echo "you must fill all fields";
    }else{
    $sql = "INSERT INTO users(name, username, email, password) VALUES ('$name', '$uname', '$email', '$pwd');";   //if not empty then insetr the new user into the database
    mysqli_query($conn, $sql);
    }
}else{                                                                         //if the inputs were from login page
    $uname = mysqli_real_escape_string($conn,test_input($_POST['username']));  //saving the entered user name in a var
    $pass = mysqli_real_escape_string($conn, test_input($_POST['password']));
    if ($uname != "" && $pass != ""){
        $sql = "SELECT * FROM users WHERE username = '$uname' ;";            
        $result = mysqli_query($conn, $sql);                                    //searching in the databage by user name
        if(mysqli_num_rows($result) > 0){                                        //if found 
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'] ;                                               //take the name to display
        }else{
            header("Location: login.html?userNotFound");                          //if not found then return to login page
        }
    }else{
        header("Location: login.html?inputNotCompleat");
    }    
    
}



?>




<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Book in Sunset Hotel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        form table {
            font-size: 30px;
            text-align: center;
            background-color: darksalmon
        }

        th {
            padding: 5px;
            width: 1%
        }

        input.button {
            background-color: cadetblue;
            font-style: oblique;
            font-weight: bolder;
            font-family: 'Courier New', Courier, monospace;
            font-size: xx-large
        }

        p.tell {
            font: italic bolder 30px 'Courier New', 'Courier';
            text-decoration: underline
        }

        ol {
            font: normal bold 20px 'courier'
        }
    </style>
    <link rel="stylesheet" href="Style11.css"> <!--external css file-->
    <script type="text/javascript" src="calulate .js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <lin </head>

<body>
    <!--header-->
    <nav>
        <button type="button" class="header">
            <h2><label class="logo"> SunSetHotel </label></h2>
            <img src="Logopit123.png" alt="Imgae of hotel">
        </button>
        <ul><!--header pags links-->
            <li><a href="index.html"> Home </a></li>
            <li><a href="Log_in.html"> Sign Up </a></li>
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

    <br /></br></br>

    <!--name of client-->
    <div style="text-align:center; font:italic bolder 35px Bodoni,Berlin,Arial">
        <?php
        $name = test_input($name);          //display client name
        echo "Welcome $name";
        ?>
    </div>
    <br />
    <div style="text-align:center; font:italic bolder 35px Berlin,Bodoni,Arial"> Search and Choose your residence</div>
    <br />


    <!--avilable rooms from data base-->
    <form method="post" action="show.php" id="calulate">
        <center>
            <table border="border">
                <tr>
                    <td>number of beds: </td>
                    <td>1<input type="radio" name="beds" value="1"> |2<input type="radio" name="beds" value="2"> |3<input type="radio" name="beds" value="3"> |4<input type="radio" name="beds" value="4"></td>
                </tr>
                <tr>
                    <td>range of price: </td>
                    <td><input typy="text" name="from" placeholder="from "><input type="rext" name="to" placeholder="to "> </td>
                </tr>

            </table>
            <button style="font-size:30px;" type="submit" name="submit">Search</button> <input style="font-size:30px;" type="reset" name="reset" value="clear">
        </center>
    </form>


    

    <!--this script checking whatever the checkbox checked or not-->
    <script type="text/javascript">
        var checkboxes = document.querySelectorAll(".checkbox");

        for (var checkbox of checkboxes) {
            checkbox.addEventListener("click", function () {
                if (this.checked == true) {
                    console.log(this.value)

                } else {
                    console.log("you checked the checkbox")
                }
            })
        }



    </script>





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



    <script type="text/javascript" src="calulate .js"></script>
</body>

</html>