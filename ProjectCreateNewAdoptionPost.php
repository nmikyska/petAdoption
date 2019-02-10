<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
///////////////////////////////////////////////////////
// Name:       Nancy Mikyska
// Login:      nancy
// Class:      CIS-2360 Fall 2017
// Assignment: project create new adoption post
// File:       ProjectCreateNewAdoptionPost.php
// Purpose:    Create a new adoption POST
///////////////////////////////////////////////////////
-->

<?php
///////////////////////////////////////
    

// Get values from the form
$firstName = ucwords(filter_input(INPUT_POST, "first_name"));
$lastName = ucwords(filter_input(INPUT_POST, "last_name"));
$streetAddress = ucwords(filter_input(INPUT_POST, "street_address"));
$city = ucwords(filter_input(INPUT_POST, "city"));
$state = strtoupper(filter_input(INPUT_POST, "state"));
$zip = filter_input(INPUT_POST, "zip_code");
$phoneNbr = filter_input(INPUT_POST, "phone_number");
$adoptionDate = date("Y-m-d", strtotime(filter_input(INPUT_POST, "adoption_date")));
$petExp = filter_input(INPUT_POST, "previousPetExp");
$dwelling = filter_input(INPUT_POST, "dwelling");


// Connect to the database
require_once("MySqlConnectStudentDb.php");

///////////////////////////////////////
// Insert row from Adoptions table

// SQL SELECT statement, with question marks for bind variables if needed
$queryIns = "INSERT INTO Adoptions VALUES
				(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

// $stmt is the binary version of the statement
$stmtIns = mysqli_stmt_init($dbc);
if(!mysqli_stmt_prepare($stmtIns, $queryIns))
	die("Failed to prepare statement\n");


// Each question mark in the $query must be bound to the statement ($stmt)
// Only bin true variables (e.g. no function calls)
// Use "s" for strings, "d" for float (a.k.a. double), and "i" for integers
mysqli_stmt_bind_param($stmtIns, "ssssssssss", $lastName, $firstName, $streetAddress, $city, $state, $zip, $phoneNbr, $adoptionDate, $petExp, $dwelling);

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
        <title>Nancy M. - Project Post a new Adoption Person</title>
        <?php require("ProjectHeader.php"); ?>
    </head>
    <body>
        <h1>Nancy M. - Project Post a New Adoption Person</h1>
        
        <h3>Adoptive Person entered successfully!</h3>
        <br /><br />
        <a href="ProjectDisplayAll.php" class="button">Back to Pet List</a>
        &nbsp;
        <a href="ProjectCreateNewAdoption.php" class="button">Add another Adoptive Person</a>
        <br /><br />
        <br /><br />
    <?php require("ProjectFooter.php"); ?>      
            
    </body>
</html>
