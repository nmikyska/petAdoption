<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
///////////////////////////////////////////////////////
// Name:       Nancy Mikyska
// Login:      nancy
// Class:      CIS-2360 Fall 2017
// Assignment: project create new adoption 
// File:       ProjectCreateNewPet.php
// Purpose:    Create a new pet 
///////////////////////////////////////////////////////
-->

<?php
////////////////////////////////////////////////////////////////
// Vets Query:

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

$queryVet = "SELECT *
                FROM Vets
            ORDER BY DrLastName,
                     DrFirstName;";
            

// STEP #4: Create and prepare the statement. The statement 
// is the binary version of the statement

$stmtVet = mysqli_stmt_init($dbc);
if(!mysqli_stmt_prepare($stmtVet, $queryVet))
    die("Failed to prepare statement\n");


// STEP #5: Bind the PHP variables from step #1 to the statement.
// Each question mark in the $query must be bound to the 
// statement ($stmt). Only bind true variables (e.g. no function 
// calls).  Use "s" for strings, "d" for float (a.k.a. double), 
// and "i" for integers. Skip this step if there are no bind variables 
// in your SQL statement.    
// mysqli_stmt_bind_param($stmt, "isd", $itemId, $itemDescription, $price);


// STEP #6: Execute statement and show any errors.

mysqli_stmt_execute($stmtVet);
if(mysqli_errno($dbc) !== 0)
{
    echo("Error number: " . mysqli_errno($dbc));
    echo("Error description: " . mysqli_error($dbc));
    die();
}


// STEP #7: Get results. Use only for SELECT statements. Skip for
// INSERT, UPDATE, DELETE, etc.

$resultVet = mysqli_stmt_get_result($stmtVet);


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
        <title>Nancy M. - Project Create a New Pet</title>
        <?php require("ProjectHeader.php"); ?>
    </head>
    <body onload="document.getElementById('petName').focus();">
        <h1 class="backlit">Nancy M. - Project Create a New Pet</h1>
        
        <form action="ProjectCreateNewPetPost.php" method="post">
        
        <table>
            <tr>
                <td>Pet Name</td>
                <td><input type="text" name="pet_name" id="petName" /></td>
            </tr>
            <tr>
                <td>Micro Chip #</td>
                <td><input type="text" name="microchip_nbr" placeholder="1234" /></td>
            </tr>
            <tr>
                <td>Veterinarian</td>
                <!--<td><input type="text" name="vetId" /></td>-->
                <td>
                <select name="vetId">
                        <option value="0">Select...</option>
                        <!--php code to create dropdown list from the vets table-->
                    <?php
                        while($rowVet = mysqli_fetch_array($resultVet)) //loop for vets table db
                    {
                    ?>
                        <option value="<?php echo $rowVet['VetId']; ?>">
                        <?php
                        echo htmlspecialchars($rowVet["DrLastName"]); //display vets last name
                        echo ", " . htmlspecialchars($rowVet["DrFirstName"]); //display vets first name
                        echo "</option>\n"; 
                    }?> <!--end vets loop-->
                        
                </select>   
                </td>   
            </tr>
            <tr>
                <td>Adoption # <br /><span class="tiny">(Always enter 1 in this field)</span></td>
                <td><input type="text" name="adoptionId" placeholder="1 (agency)"/></td>
            </tr>
            <tr>
                <td>Check-In Date</td>
                <td><input type="text" name="check_in_date" placeholder="12/15/2017" /></td>
            </tr>
            <tr>
                <td>Animal Type</td>
                <td><input type="text" name="animal_type" placeholder="Dog or Cat" /></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="gender" value="M" />Male&nbsp;<input type="radio" name="gender" value="F" />Female</td>
            </tr>
            <tr>
                <td>Breed</td>
                <td><input type="text" name="breed" /></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" /></td>
            </tr>
            <tr>
                <td>Spayed/Neutered</td>
                <td><input type="hidden" name="spayed_neutered" value="0" /> <!--0=pet not spayed-->
                <input type="checkbox" name="spayed_neutered" value="1" /><span class="tiny">Check if Spayed or Neutered (leave blank if not)</span> <!--1=pet is spayed-->
            </td>
            </tr>
            <tr>
                <td>Shots Up-to-Date</td>
                <td><input type="hidden" name="shots" value="0" /> <!--0=pet shots not up to date-->
                    <input type="checkbox" name="shots" value="1" /><span class="tiny">Check if Shots are up to date (leave blank if not)</span> <!--1=pet shots is up to date-->
            </td>
            </tr>
                    
            
            <!--close stmts and $dbc--> 
            <?php
                mysqli_stmt_close($stmtVet);
                mysqli_close($dbc); 
            ?>  
        </table>
        <br /><br />
            <input class="clickInput" type="submit" />
            &nbsp;
            <input class="clickInput" type="reset" />
        <br /><br />
        </form>
        <a href="ProjectDisplayAll.php" class="button">Back to Pet List</a>
    <br /><br />
    <br /><br />
    <?php require("ProjectFooter.php"); ?>      
            
    </body>
</html>

