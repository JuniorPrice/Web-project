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



    <!--avilable rooms from data base-->
    <center>
        <?php
        function test_input($data)                                 //testing the inputs
        {

            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        include('connectdb.php');                                    //include database connection page

        if (isset($_POST['beds'])) {                                 //ckeck if the user use searching by number of beds
            $beds = $_POST['beds'];                                  //save number of besds
            display($conn, $beds);                                   //call the function that display the results
        } elseif ($_POST['from'] != "" && $_POST['to'] != "") {      //ckeck if the user use searching by praice
            $pricefrom = test_input($_POST['from']);                 //save bounds of price
            $priceto = test_input($_POST['to']);
            display($conn, $pricefrom, $priceto);                    //call the function that display the results
        } else {                                                     //display a message if the user did not choose
            echo "You have to sellect at least one method to search";
        }



        

        function display($conn, $data1, $data2 = null)               //function to display the results
        {
            if (!isset($data2)) {                                     //if the user choose search by beds numer 
                $sql = "SELECT * FROM room WHERE num_of_beds = $data1 ;";     //sql statment
                $result = mysqli_query($conn, $sql);                          //search from database
                if (mysqli_num_rows($result) > 0) {                           //if there is results then display in table
                    echo "<table border = '1' style='text-align:center;'><tr><td>room number</td><td>number of beds</td><td>price</td><td>description</td></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>" .
                            "<td>" . $row["room_number"] . "</td>" .
                            "<td>" . $row["num_of_beds"] . "</td>" .
                            "<td>" . $row["price"] . "</td>" .
                            "<td>" . $row["description"] . "</td>" .
                            "</tr>";
                    }
                    echo "</table>";

                } else {                                                    //if not funde
                    echo "No rooms were found";
                }
                mysqli_close($conn);                                         //close conection
            }else{                                                               
                $sql = "SELECT * FROM room WHERE price BETWEEN $data1 AND $data2 ;";    //sql stament if the user choose search by range of price      
                $result = mysqli_query($conn, $sql);                                    //search from database
                if (mysqli_num_rows($result) > 0) {                                     //if there are results then display in a table    
                    echo "<table border = '1' style='text-align:center;'><tr><td>room number</td><td>number of beds</td><td>price</td><td>description</td></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>" .
                            "<td>" . $row["room_number"] . "</td>" .
                            "<td>" . $row["num_of_beds"] . "</td>" .
                            "<td>" . $row["price"] . "</td>" .
                            "<td>" . $row["description"] . "</td>" .
                            "</tr>";
                    }
                    echo "</table>";

                } else {                                                  //if not found
                    echo "No rooms were found";
                }
                mysqli_close($conn);                                       //close connection
            }
        }

        ?>
    </center>
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