
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getting Data</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <h1>Get parameter Assigment</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']
                    //The $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script. 
                    ?> ">
    </form>
</body>

</html>

<?php

//uses the get parameter with the first, and last name. Then it also gets the age
$firstName = filter_input(INPUT_GET, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName = filter_input(INPUT_GET, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
$age = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_EMAIL);

//tells the user what they inputed into the browser for their name information
echo "Your first name is $firstName and your last name is $lastName. <br/>";

//checks for special chars, checks for empty information, and attacks
if (isset($_GET['firstName']) && ($_GET['lastName'])) {
    $firstName = htmlspecialchars($_GET['firstName']);
    $lastName = htmlspecialchars($_GET['lastName']);
} else {
    echo "First name or last name is not set!<br/>";
}

//does the same as before for the age
if (isset($_GET['age'])) {
    $age = htmlspecialchars($_GET['age']);
} else {
    echo "Age is not set! <br/>";
}

//checks to see if the user can vote in the US based on their age
if ($age >= 18){

    echo "Since I am $age years old, I can vote in the US. <br/>";

}
else{

    echo "Since I am $age years old, I cannot vote in the US. <br/>";

}

//finds how old the user is in days old and gets the current date
$daysOld = $age * 365;
$curDate = date('m-d-y');

//tells the user about how many days old they are based ont their age
echo "You are $daysOld days old. <br/>";
//outputs the current date
echo "The current date is $curDate <br/>";



?>
