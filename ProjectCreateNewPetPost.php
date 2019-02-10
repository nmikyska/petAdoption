<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
///////////////////////////////////////////////////////
// Name:       Nancy Mikyska
// Login:      nancy
// Class:      CIS-2360 Fall 2017
// Assignment: project create new adoption post
// File:       ProjectCreateNewPetPost.php
// Purpose:    Create a new pet POST
///////////////////////////////////////////////////////
-->

<?php
///////////////////////////////////////
// Get values from the form
$petName = ucwords(filter_input(INPUT_POST, "pet_name"));
$microchipNbr = filter_input(INPUT_POST, "microchip_nbr");
$vetId = filter_input(INPUT_POST, "vetId");
$adoptionId = filter_input(INPUT_POST, "adoptionId");
$checkInDate = date("Y-m-d", strtotime(filter_input(INPUT_POST, "check_in_date")));
$animalType = ucwords(filter_input(INPUT_POST, "animal_type"));
$gender = filter_input(INPUT_POST, "gender");
$breed = ucwords(filter_input(INPUT_POST, "breed"));
$age = filter_input(INPUT_POST, "age");
$spayedNeutered = filter_input(INPUT_POST, "spayed_neutered");
$shots = filter_input(INPUT_POST, "shots");

// Connect to the database
require_once("MySqlConnectStudentDb.php");

///////////////////////////////////////
// Insert row from Pets table

// SQL SELECT statement, with question marks for bind variables if needed
$queryIns = "INSERT INTO Pets VALUES
				(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

// $stmt is the binary version of the statement
$stmtIns = mysqli_stmt_init($dbc);
if(!mysqli_stmt_prepare($stmtIns, $queryIns))
	die("Failed to prepare statement\n");


// Each question mark in the $query must be bound to the statement ($stmt)
// Only bin true variables (e.g. no function calls)
// Use "s" for strings, "d" for float (a.k.a. double), and "i" for integers
mysqli_stmt_bind_param($stmtIns, "iiisssssssd", $microchipNbr, $vetId, $adoptionId, $checkInDate,$animalType, $gender, $petName, $breed, $spayedNeutered, $shots, $age);

// Execute statement and get the result set
mysqli_stmt_execute($stmtIns);

// Show errors
if(mysqli_errno($dbc) !== 0)
{
	echo("Error number: " . mysqli_errno($dbc));
	echo("Error description: " . mysqli_error($dbc));
	die();
}
//no step 8

// STEP #9: Close statement(s) and database connection.
			
mysqli_stmt_close($stmtIns);
mysqli_close($dbc);
?>


<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Nancy M. - Project Post a New Pet</title>
        <?php require("ProjectHeader.php"); ?>
    </head>
    <body>
        <h1>Nancy M. - Project Post a New Pet</h1>
        
        <h3>Pet entered successfully!</h3>
        
        <a href="ProjectDisplayAll.php" class="button">Back to Pet List</a>
        &nbsp;
        <a href="ProjectCreateNewPet.php" class="button">Create another Pet</a>
        <br /><br />
        <br /><br />
    <?php require("ProjectFooter.php"); ?>      
            
    </body>
</html>
