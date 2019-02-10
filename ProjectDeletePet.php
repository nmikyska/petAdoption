<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
///////////////////////////////////////////////////////
// Name:       Nancy Mikyska
// Login:      nancy
// Class:      CIS-2360 Fall 2017
// Assignment: delete Pet
// File:       ProjectDeletePet.php
// Purpose:    Pet to be deleted from db
///////////////////////////////////////////////////////
-->

<?php
///////////////////////////////////////

// get the pet Id

$petId = filter_input(INPUT_GET, "pet");

// STEP #2: Connect to the database.  Do this only once, even if
// you have multiple queries on your page.
require_once("MySqlConnectStudentDb.php");


$queryPet = "DELETE 
            FROM Pets
            WHERE PetId = ?;";
            
$stmtPet = mysqli_stmt_init($dbc);
if(!mysqli_stmt_prepare($stmtPet, $queryPet))
{
    die("Failed to prepare statement.\n");
}

mysqli_stmt_bind_param($stmtPet, "i", $petId);

mysqli_stmt_execute($stmtPet);

// Show errors
if(mysqli_errno($dbc) !== 0)
{
    echo("Error number: " . mysqli_errno($dbc));
    echo("Error description: " . mysqli_error($dbc));
    die();
}
// STEP #7: Get results. Use only for SELECT statements. Skip for
// INSERT, UPDATE, DELETE, etc.
//$resultPet = mysqli_stmt_get_result($stmtPet);

// OPTIONAL STEP: Get the number of rows processed.  Skip if you 
// do not need to use the number of rows in your code.
$numberPets = mysqli_affected_rows($dbc);

    
?>


<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Nancy M. - Project Delete Pet</title>
        <?php require("ProjectHeader.php"); ?> <!--call to header file-->
    </head>
    <body>
        
            <h1>Nancy M. - Project Delete Pet</h1>
            
            <?php if($numberPets ===1)
            {
            ?>
                <h3>Pet has been deleted.</h3>
            <?php 
            }
            else
            {
            ?>
                <h3>Pet does not exist.</h3>
            <?php
            }?>
            
            <br /><br />
            <?php
            mysqli_stmt_close($stmtPet);
            mysqli_close($dbc);
            ?>
            <br /><br />
            <a href="ProjectDisplayAll.php" class="button">Back to Pet List</a>
        <br /><br />
        <br /><br />
        <?php require("ProjectFooter.php"); ?>
            
    </body>
</html>