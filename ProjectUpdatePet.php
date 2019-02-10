<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
///////////////////////////////////////////////////////
// Name:       Nancy Mikyska
// Login:      nancy
// Class:      CIS-2360 Fall 2017
// Assignment: project UpdatePet
// File:       ProjectUpdatePet.php
// Purpose:    Pet assigned to adoptive person
///////////////////////////////////////////////////////
-->

<?php
///////////////////////////////////////


// STEP #2: Connect to the database.  Do this only once, even if
// you have multiple queries on your page.
require_once("MySqlConnectStudentDb.php");

// get the pet Id
if($_SERVER["REQUEST_METHOD"] === "POST")
	$petId = intval(filter_input(INPUT_POST, "pet_id"));
else
	$petId = intval(filter_input(INPUT_GET, "pet"));

//if this is a post then update the db--
if($_SERVER["REQUEST_METHOD"] === "POST")
	$updatedRows = updatePet();
else
	$updatedRows = NULL;

$queryPets = "SELECT *
			FROM Pets
			WHERE PetId = ?;";
			
$stmtPets = mysqli_stmt_init($dbc);
if(!mysqli_stmt_prepare($stmtPets, $queryPets))
{
	die("Failed to prepare statement.\n");
}

mysqli_stmt_bind_param($stmtPets, "i", $petId);

mysqli_stmt_execute($stmtPets);
$resultPets = mysqli_stmt_get_result($stmtPets);
////////////////////////////////////////////////////////////////
// Adoptions Query:

// STEP #1: Create PHP Variables for each variable that you need
// to bind to your SQL statements.  Skip this step if your SQL
// SQL statement does not have bind variables (question marks).    

// *** Skipped - no bind variables in SQL statement ***


// STEP #2: Connect to the database.  Do this only once, even if
// you have multiple queries on your page.
//require_once("MySqlConnectStudentDb.php");


// STEP #3: Create your SQL statement as a string.  Use bind 
// variables (question marks) for any user input.  Do not use
// user content directly in your SQL statement.

$queryAdopt = "SELECT *
				FROM Adoptions
			ORDER BY LastName,
					 FirstName;";
			

// STEP #4: Create and prepare the statement. The statement 
// is the binary version of the statement

$stmtAdopt = mysqli_stmt_init($dbc);
if(!mysqli_stmt_prepare($stmtAdopt, $queryAdopt))
	die("Failed to prepare statement\n");


// STEP #5: Bind the PHP variables from step #1 to the statement.
// Each question mark in the $query must be bound to the 
// statement ($stmt). Only bind true variables (e.g. no function 
// calls).  Use "s" for strings, "d" for float (a.k.a. double), 
// and "i" for integers. Skip this step if there are no bind variables 
// in your SQL statement.    
// mysqli_stmt_bind_param($stmt, "isd", $itemId, $itemDescription, $price);


// STEP #6: Execute statement and show any errors.

mysqli_stmt_execute($stmtAdopt);
if(mysqli_errno($dbc) !== 0)
{
	echo("Error number: " . mysqli_errno($dbc));
	echo("Error description: " . mysqli_error($dbc));
	die();
}


// STEP #7: Get results. Use only for SELECT statements. Skip for
// INSERT, UPDATE, DELETE, etc.

$resultAdopt = mysqli_stmt_get_result($stmtAdopt);


// OPTIONAL STEP: Get the number of rows processed.  Skip if you 
// do not need to use the number of rows in your code.
// $numberRows = mysqli_affected_rows($dbc);


// OPTIONAL STEP: Debug statement examples.  You can do this atan
// at any point for any variable.
// var_dump($numberRows);
// echo "<!-- \$numberRows " . $numberRows . "-->";

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
        <title>Nancy M. - Project Update Pet</title>
        <?php require("ProjectHeader.php"); ?> <!--call to header file-->
    </head>
    <body>
       <div class="background"> 
            <h1>Nancy M. - Project Update Pet</h1>
                <?php
                //update user if changes were made to the db
                if($updatedRows === 0)
                    echo "<h2>No changes have been made.</h2>";
                elseif($updatedRows === 1)
                    echo "<h2>Changes saved.</h2>";
                ?>
            <br /><br />
            <?php 
                //pull one record from the Sections query
                if($petRow = mysqli_fetch_array($resultPets))  
                {
                                
            ?>
            <table>
                <tr>
                    <td>Pet Name</td>
                    <td><?php echo $petRow["PetName"]; ?></td>
                </tr>
                <tr>
                    <td>MicroChip Id</td>
                    <td><?php echo $petRow["MicroChipId"]; ?></td>
                </tr>
                <tr>
                    <td>Breed</td>
                    <td><?php echo $petRow["Breed"]; ?></td>
                </tr>
            </table>
            <br /><br />
                <form action="ProjectUpdatePet.php" method="post">
                <input type="hidden" name="pet_id" value="<?php echo $petRow["PetId"]; ?>" />
                    <table>
                    
                        <tr>
                            <td>Adoptive Person</td>
                            <td>
                            <select name="adopt">
                                <option value="0">Select...</option>
                                    
                                <?php
                                    //pull all records from the adoptions table in db
                                    while($rowAdopt = mysqli_fetch_array($resultAdopt)) 
                                    { 
                                    ?>
                                    <!--display currently set person for the pets, allow user to change the persons and save it to the db -->
                                    <!--loop to display all persons in the dropdown field-->
                                    <option value="<?php echo $rowAdopt['AdoptionId']; ?>" <?php if($rowAdopt['AdoptionId'] == $petRow['AdoptionId']) echo 'selected="selected"'; else echo ''; ?> >
                                    <?php
                                    echo htmlspecialchars($rowAdopt["LastName"]); //display persons last name
                                    echo ", " . htmlspecialchars($rowAdopt["FirstName"]); //display persons first name
                                    echo "</option>\n"; 
                                    }?> <!--end persons loop-->
                                    
                            </select>   
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Veterinarian</td>
                            <td>
                            <select name="vet">
                                <option value="0">Select...</option>
                                    
                                <?php
                                    //pull all records from the vet table in db
                                    while($rowVet = mysqli_fetch_array($resultVet)) 
                                    { 
                                    ?>
                                    <!--display currently set vet for the pets, allow user to change the vet and save it to the db -->
                                    <!--loop to display all vet in the dropdown field-->
                                    <option value="<?php echo $rowVet['VetId']; ?>" <?php if($rowVet['VetId'] == $petRow['VetId']) echo 'selected="selected"'; else echo ''; ?> >
                                    <?php
                                    echo htmlspecialchars($rowVet["DrLastName"]); //display vet last name
                                    echo ", " . htmlspecialchars($rowVet["DrFirstName"]); //display vet first name
                                    echo "</option>\n"; 
                                    }?> <!--end Vet loop-->
                                    
                            </select>   
                            </td>
                        </tr>
                                <?php
                                } ?> 
                            
                        
                        <tr>
                            <td>Spayed/Neutered Required</td>
                            <td>
                                <input type="hidden" name="spayed_neutered" value="0"<?php if($petRow["SpayedNeuteredNeededFlag"] == "0") echo ' checked=""'; ?> />
                                <input type="checkbox" name="spayed_neutered" value="1"<?php if ($petRow["SpayedNeuteredNeededFlag"] == "1") echo ' checked="checked"'; ?> />Spayed/Neutered
                            </td>
                            <!--display if the pet was spayed or not was set in the creation, allow user to change value and update to db-->
                        </tr>
                        <tr>
                            <td>Shots Required</td>
                            <td>
                                <input type="hidden" name="shots" value="0"<?php if($petRow["ShotsNeededFlag"] == "0") echo ' checked=""'; ?> />
                                <input type="checkbox" name="shots" value="1"<?php if ($petRow["ShotsNeededFlag"] == "1") echo ' checked="checked"'; ?> />Shots
                            </td>
                            <!--display if the pet was spayed or not was set in the creation, allow user to change value and update to db-->
                        </tr>
                    <?php
                        //close stmts and $dbc
                        mysqli_stmt_close($stmtAdopt);
                        mysqli_stmt_close($stmtVet);
                        mysqli_close($dbc); 
                    ?>    
                   
                    </table>
                    <br/><br/>
                
                    <input class="clickInput" type="submit" value="Update" />
                    &nbsp;
                    <input class="clickInput" type="reset" />
                 
                </form>
            <br /><br />
            <!--links to other pages-->
            <a href="ProjectDisplayAll.php" class="button">Back to Pet List</a>
            
            <br /><br />
            <br /><br />

            <?php require("ProjectFooter.php"); ?> <!--call to footer file-->
        </div>
    </body>
</html>

<?php
//function to update the db
function updatePet()
{
    global $dbc;
    
    // STEP #1: Create PHP Variables for each variable that you need
    // to bind to your SQL statements.  Skip this step if your SQL
    // SQL statement does not have bind variables (question marks).    
    
    
    $petId = filter_input(INPUT_POST, "pet_id");
    $adopt = filter_input(INPUT_POST, "adopt");
    $vet = filter_input(INPUT_POST, "vet");
    $spayedNeutered = filter_input(INPUT_POST, "spayed_neutered");
    $shots = filter_input(INPUT_POST, "shots");
    
    
    // STEP #3: Create your SQL statement as a string.  Use bind 
    // variables (question marks) for any user input.  Do not use
    // user content directly in your SQL statement.
    $queryUpd = "UPDATE Pets 
            SET AdoptionId = ?,
                     VetId = ?,
  SpayedNeuteredNeededFlag = ?,
           ShotsNeededFlag = ?        
               WHERE PetId = ?;";

    // STEP #4: Create and prepare the statement. The statement 
    // is the binary version of the statement
    $stmtUpd = mysqli_stmt_init($dbc);
    
    if(!mysqli_stmt_prepare($stmtUpd, $queryUpd))
    {
        echo "Failed to prepare statement on ";
        echo "line " . __LINE__ . " in file " . __FILE__ . "<br />\n";
        die();
    }

    // STEP #5: Bind the PHP variables from step #1 to the statement.
    // Each question mark in the $query must be bound to the 
    // statement ($stmt). Only bind true variables (e.g. no function 
    // calls).  Use "s" for strings, "d" for float (a.k.a. double), 
    // and "i" for integers. Skip this step if there are no bind variables 
    // in your SQL statement.    
     mysqli_stmt_bind_param($stmtUpd, "iissi", $adopt, $vet, $spayedNeutered, $shots, $petId);

    
    // STEP #6: Execute statement and show any errors.
    mysqli_stmt_execute($stmtUpd);
    if(mysqli_errno($dbc) !== 0)
    {
        echo "Error number: " . mysqli_errno($dbc) . "<br />";
        echo "Line " . __LINE__ . " in file " . __FILE__ . "<br />\n";
        echo "Error description: " . mysqli_error($dbc) . "<br />";        
        die();
    }


    // STEP #7: Get results. Use only for SELECT statements. Skip for
    // INSERT, UPDATE, DELETE, etc.
    //$resultUpd = mysqli_stmt_get_result($stmtUpd);

    
    // OPTIONAL STEP: Get the number of rows processed.  Skip if you 
    // do not need to use the number of rows in your code.
    $numberRows = mysqli_affected_rows($dbc);

    
    // STEP #8: Read rows from the result set.  Use a
    // while loop if you expect more than one row. Use                
    // Use an if statement if expecting only one row.
    // Include only for SELECT statements.  Skip this
    // step for INSERT, UPDATE, DELETE, etc.
    /*while($row = mysqli_fetch_array($resultUpd))
    {
        echo "<li><a href=\"Demo16b.php?state=" . $row["StateCode"];
        echo "\">" . $row["StateCode"] . "</a></li>\n";
    }*/

    // STEP #9: Close statement(s) and database connection.
    mysqli_stmt_close($stmtUpd);
    //mysqli_close($dbc);
    
    return $numberRows;
    
    
}



?>