<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
///////////////////////////////////////////////////////
// Name:       Nancy Mikyska
// Login:      nancy
// Class:      CIS-2360 Fall 2017
// Assignment: project main page
// File:       ProjectDisplayAll.php
// Purpose:    Display all pets from the PetsView Table
///////////////////////////////////////////////////////
-->

<?php
///////////////////////////////////////


// STEP #1: Create PHP Variables for each variable that you need
// to bind to your SQL statements.  Skip this step if your SQL
// SQL statement does not have bind variables (question marks).    

// *** Skipped - no bind variables in SQL statement ***


// STEP #2: Connect to the database.  Do this only once, even if
// you have multiple queries on your page.
require_once("MySqlConnectStudentDb.php");


// STEP #3: Create your SQL statement as a string.  Use bind 
// variables (question marks) for any user input.  Do not use
// user content directly in your SQL statement.
$query = "SELECT *
			FROM PetsView
		ORDER BY PetName, 
				 Breed;";
				 

// STEP #4: Create and prepare the statement. The statement 
// is the binary version of the statement
$stmt = mysqli_stmt_init($dbc);
if(!mysqli_stmt_prepare($stmt, $query))
	die("Failed to prepare statement\n");


// STEP #5: Bind the PHP variables from step #1 to the statement.
// Each question mark in the $query must be bound to the 
// statement ($stmt). Only bind true variables (e.g. no function 
// calls).  Use "s" for strings, "d" for float (a.k.a. double), 
// and "i" for integers. Skip this step if there are no bind variables 
// in your SQL statement.    
// mysqli_stmt_bind_param($stmt, "isd", $itemId, $itemDescription, $price);


// STEP #6: Execute statement and show any errors.
mysqli_stmt_execute($stmt);
if(mysqli_errno($dbc) !== 0)
{
	echo("Error number: " . mysqli_errno($dbc));
	echo("Error description: " . mysqli_error($dbc));
	die();
}

// STEP #7: Get results. Use only for SELECT statements. Skip for
// INSERT, UPDATE, DELETE, etc.
$result = mysqli_stmt_get_result($stmt);


// OPTIONAL STEP: Get the number of rows processed.  Skip if you 
// do not need to use the number of rows in your code.
// $numberRows = mysqli_affected_rows($dbc);


// OPTIONAL STEP: Debug statement examples.  You can do this atan
// at any point for any variable.
// var_dump($numberRows);
// echo "<!-- \$numberRows " . $numberRows . "-->";
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Nancy M. - Project Main Page</title>
        <?php require("ProjectHeader.php"); ?>
    </head>
    <body>
        <h1>Nancy M. - Project Main Page</h1>
        <table>
        
            <?php
                // STEP #8: Read rows from the result set.  Use a
                // while loop if you expect more than one row. Use                
                // Use an if statement if expecting only one row.
                // Include only for SELECT statements.  Skip this
                // step for INSERT, UPDATE, DELETE, etc.
                while($row = mysqli_fetch_array($result))
                {
                ?>
                    <tr>
                        <td><?php echo $row["PetName"]. " the " . $row["Breed"]. " owned by " . $row["LastName"] . ", " . $row["FirstName"]; ?></td>
                        <td><a href="ProjectViewPet.php?pet=<?php echo htmlspecialchars($row["PetId"]); ?>">View</a></td>
                        <td><a href="ProjectUpdatePet.php?pet=<?php echo htmlspecialchars($row["PetId"]); ?>">Update for Adoption</a></td>
                        <td><a href="ProjectConfirmDelPet.php?pet=<?php echo htmlspecialchars($row["PetId"]); ?>">Delete</a></td>
                    </tr>
                <?php
                }

                // STEP #9: Close statement(s) and database connection.
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
                ?>
       
        </table>
        <br /><br />
        <a href="ProjectDescription.php" class="button">Description of Site</a>
        <a href="ProjectCreateNewPet.php" class="button">Add a New Pet</a>
        <a href="ProjectCreateNewAdoption.php" class="button">Add New Adoptive Person</a>
        <br /><br />
        <br /><br />

        <?php require("ProjectFooter.php"); ?>

    </body>
</html>