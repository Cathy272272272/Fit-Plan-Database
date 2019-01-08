<?php
if(isset($_REQUEST['mealID'], $_REQUEST['meal'], $_REQUEST['calories'])){
    $mealID = $_REQUEST['mealID'];
    $meal = $_REQUEST['meal'];
    $calories = $_REQUEST['calories'];
    // Connection parameters
    $host = 'mpcs53001.cs.uchicago.edu';
    $username = 'hanwenxu';
    $password = 'eso3ooV5';
    $database = $username.'DB';

    $connection = mysqli_connect($host,$username,$password,$database)
    or die('Could not connect '.mysqli_connect_error());
    echo 'Connection Established!<br>';

    if(!is_numeric($mealID))
        die('user ID must be numeric.');
    if ( $mealID > 100 || $mealID < 1 )
        die("The userID you entered does not exist.");
    $dupesql = "SELECT * FROM meals_details WHERE meals_details_id = '$mealID'";
    $duperaw = mysqli_query($connection, $dupesql);
    if (mysqli_num_rows($duperaw) <= 0) {
        die ("This meal category has been updated");
    }
    else {
//        $count = mysqli_field_count($duperaw);
////        "SELECT COUNT(*) FROM People_basic_info";
///
        $ud = "UPDATE meals_details SET meals_type = '$meal', calories_of_a_meal = '$calories' WHERE meals_details_id = '$mealID'";
        $change = mysqli_query($connection, $ud);
        $query2 = "SELECT * FROM meals_details where meals_type = '$meal' and calories_of_a_meal = $calories";
        $success = mysqli_query($connection, $query2);

        if (mysqli_num_rows($success) > 0) {
            print "Query success!<br>";
//            print "Updated User '$user''s GPA to be '$gpa' succesfully<br>";
        }
        else {
            print "Unsuccessful Update! Try again <br>";
        }
//        $retrieve_last = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM Sports ORDER BY people_id DESC"));
//        printf( "User %s %s is added into database!", $retrieve_last['first_name'], $retrieve_last['last_name']);
//        print "This record is retrieved by visiting the database for verification purpose.";
    }
}


// Closing connection
mysqli_close($connection);

?>
<!--<br>-->
<!--<form action="./index.html">-->
<!--    <input type="submit" value="Go back to Main Page">-->
<!--</form>-->
<!--</body>-->
<!--</html>-->
<nav>
    <ul>
        <li><a href="./index.html">Home</a></li>
    </ul>
</nav>

