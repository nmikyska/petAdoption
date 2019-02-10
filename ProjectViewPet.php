<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
///////////////////////////////////////////////////////
// Name:       Nancy Mikyska
// Login:      nancy
// Class:      CIS-2360 Fall 2017
// Assignment: project create new adoption 
// File:       ProjectViewPet.php
// Purpose:    Display all details of single pet
///////////////////////////////////////////////////////
-->

<?php
///////////////////////////////////////
//pet query:

// STEP #1: Create PHP Variables for each variable that you need
// to bind to your SQL statements.  Skip this step if your SQL
// SQL statement does not have bind variables (question marks).    

$petId = filter_input(INPUT_GET, "pet");

// STEP #2: Connect to the database.  Do this only once, even if
// you have multiple queries on your page.
require_once("MySqlConnectStudentDb.php");


// STEP #3: Create your SQL statement as a string.  Use bind 
// variables (question marks) for any user input.  Do not use
// user content directly in your SQL statement.
$queryPet = "SELECT *
            FROM PetsView
            WHERE PetId = ?";   
            

//return just one pet don't need the order by       

// STEP #4: Create and prepare the statement. The statement 
// is the binary version of the statement
$stmtPet = mysqli_stmt_init($dbc);


if(!mysqli_stmt_prepare($stmtPet, $queryPet))
    die("Failed to prepare statement\n");


// STEP #5: Bind the PHP variables from step #1 to the statement.
// Each question mark in the $query must be bound to the 
// statement ($stmt). Only bind true variables (e.g. no function 
// calls).  Use "s" for strings, "d" for float (a.k.a. double), 
// and "i" for integers. Skip this step if there are no bind variables 
// in your SQL statement.    
mysqli_stmt_bind_param($stmtPet, "i", $petId);


// STEP #6: Execute statement and show any errors.
mysqli_stmt_execute($stmtPet);
if(mysqli_errno($dbc) !== 0)
{
    echo("Error number: " . mysqli_errno($dbc));
    echo("Error description: " . mysqli_error($dbc));
    die();
}

// STEP #7: Get results. Use only for SELECT statements. Skip for
// INSERT, UPDATE, DELETE, etc.
$resultPet = mysqli_stmt_get_result($stmtPet);


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
        <title>Nancy M. - Project View Selected Pet</title>
        <?php require("ProjectHeader.php"); ?>
    </head>
    <body>
        <h1>Nancy M. - Project View Selected Pet Details</h1>

        <h2>Pet Details</h2>
       
        
            <?php
                // STEP #8: Read rows from the result set.  Use a
                // while loop if you expect more than one row. Use                
                // Use an if statement if expecting only one row.
                // Include only for SELECT statements.  Skip this
                // step for INSERT, UPDATE, DELETE, etc.
                if($row = mysqli_fetch_array($resultPet)) //only 1 row
                {
            ?>
                 <table>
                    <tr>
                        <td>Pet Microchip ID</td>
                        <td><?php echo htmlspecialchars($row["MicroChipId"]); ?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo htmlspecialChars($row["PetName"]); ?></td>
                    </tr>
                    <tr>
                        <td>Check-In Date</td>
                        <td><?php echo date("m/d/Y", strtotime($row["CheckInDate"])); ?></td>
                    </tr>
                    <tr>
                        <td>Animal Type</td>
                        <td><?php echo htmlspecialchars($row["AnimalType"]); ?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><?php $gender = htmlspecialchars($row["Gender"]);
                                if($gender == 'F') echo 'Female';
                                else echo 'Male';
                            ?></td>
                    </tr>
                    <tr>
                        <td>Breed</td>
                        <td><?php echo htmlspecialchars($row["Breed"]); ?></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><?php echo htmlspecialchars($row["Age"]); ?></td>
                    </tr>
                    <tr>
                        <td>Spayed/Neutered</td>
                        <td><?php $spay = htmlspecialchars($row["SpayedNeuteredNeededFlag"]); 
                                if($spay == 0) echo 'No';
                                else echo 'Yes';
                            ?></td>
                    </tr>
                    <tr>
                        <td>Shots up to Date</td>
                        <td><?php $shots = htmlspecialchars($row["ShotsNeededFlag"]);
                                if ($shots == 0) echo 'No';
                                else echo 'Yes';
                            ?></td>
                    </tr>
                    
                        
                </table>
                <br />
                    <h2>Veterinarian</h2>
                    <table>
                        <tr>
                            <td>Dr. Name</td>
                            <td><?php echo $row["DrLastName"] . ", " . $row["DrFirstName"]; ?></td>
                        </tr>
                        <tr>
                            <td>Non-Emergency Phone Number</td>
                            <td><?php echo substr($row["NonEmergencyPhone"], 0, 3) . "-" . substr($row["NonEmergencyPhone"], 3, 3) . "-" . substr($row["NonEmergencyPhone"], 6, 4)  ; ?></td>
                        </tr>
                        <tr>
                            <td>Emergency Phone Number</td>
                            <td><?php echo substr($row["EmergencyPhone"], 0, 3) . "-" . substr($row["EmergencyPhone"], 3, 3) . "-" . substr($row["EmergencyPhone"], 6, 4)  ; ?></td>
                        </tr>
                        
                                
                    </table>
                    <br />
                    <h2>Pet Owner</h2>
                    <table>
                    <tr>
                        <td>Name</td>
                        <td><?php echo htmlspecialchars($row["LastName"] . ", " . $row["FirstName"]); ?></td>
                    </tr>
                    <tr>
                        <td>Adoption Date</td>
                        <td><?php echo date("m/d/Y", strtotime($row["DateOfAdoption"])); ?></td>
                    </tr>
                    <tr>
                        <td>Street Address</td>
                        <td><?php echo htmlspecialchars($row["StreetAddress"]); ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?php echo htmlspecialchars($row["City"]); ?></td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td><?php echo htmlspecialchars($row["State"]); ?></td>
                    </tr>
                    <tr>
                        <td>Zip Code</td>
                        <td><?php echo htmlspecialchars($row["ZipCode"]); ?></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><?php echo substr($row["PhoneNmbr"], 0, 3) . "-" . substr($row["PhoneNmbr"], 3, 3) . "-" . substr($row["PhoneNmbr"], 6, 4)  ; ?></td>
                    </tr>
                    <tr>
                        <td>Previous Pet Experience</td>
                        <td><?php $exp = htmlspecialchars($row["PreviousPetExp"]);
                                if($exp == 0) echo 'No';
                                else echo 'Yes';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Dwelling Type</td>
                        <td><?php $dwelling = htmlspecialchars($row["DwellingType"]); 
                                if($dwelling == 'HOM') echo 'Home';
                                else if($dwelling == 'APT') echo 'Apartment';
                                else echo 'Condo';
                        
                            ?>
                        </td>
                    </tr>
                    </table>
                    
                <?php 
                } ?>
                <?php
                // STEP #9: Close statement(s) and database connection.
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