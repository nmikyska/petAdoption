<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
///////////////////////////////////////////////////////
// Name:       Nancy Mikyska
// Login:      nancy
// Class:      CIS-2360 Fall 2017
// Assignment: Project
// File:       ProjectNewPet.php
// Purpose:    User input a new Pet 
///////////////////////////////////////////////////////
-->

<?php
    ///////////////////////////////////////
    // Pets Query:

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
    $queryPets = "SELECT *
                FROM Pets
            ORDER BY PetName;";
            
    
    // STEP #4: Create and prepare the statement. The statement 
    // is the binary version of the statement
    $stmtPets = mysqli_stmt_init($dbc);
    if(!mysqli_stmt_prepare($stmtPets, $queryPets))
        die("Failed to prepare statement\n");
    

    // STEP #5: Bind the PHP variables from step #1 to the statement.
    // Each question mark in the $query must be bound to the 
    // statement ($stmt). Only bind true variables (e.g. no function 
    // calls).  Use "s" for strings, "d" for float (a.k.a. double), 
    // and "i" for integers. Skip this step if there are no bind variables 
    // in your SQL statement.    
    // mysqli_stmt_bind_param($stmt, "isd", $itemId, $itemDescription, $price);

    
    // STEP #6: Execute statement and show any errors.
    mysqli_stmt_execute($stmtPets);
    if(mysqli_errno($dbc) !== 0)
    {
        echo("Error number: " . mysqli_errno($dbc));
        echo("Error description: " . mysqli_error($dbc));
        die();
    }
    

    // STEP #7: Get results. Use only for SELECT statements. Skip for
    // INSERT, UPDATE, DELETE, etc.
    $resultPets = mysqli_stmt_get_result($stmtPets);
    
    // OPTIONAL STEP: Get the number of rows processed.  Skip if you 
    // do not need to use the number of rows in your code.
    // $numberRows = mysqli_affected_rows($dbc);

    
    // OPTIONAL STEP: Debug statement examples.  You can do this atan
    // at any point for any variable.
    // var_dump($numberRows);
    // echo "<!-- \$numberRows " . $numberRows . "-->";
    
    ////////////////////////////////////////////////////////////////
    // Instructors Query:

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
    
    $queryVet = "SELECT *
                    FROM Vets
                ORDER BY LastName,
                         FirstName;";
                
    
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
    
    
    ///////////////////////////////////////////////////////////////////////
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
    
    $queryAdoptions = "SELECT *
                     FROM Adoptions;";

    // STEP #4: Create and prepare the statement. The statement 
    // is the binary version of the statement
    
    $stmtAdoptions = mysqli_stmt_init($dbc);
    if(!mysqli_stmt_prepare($stmtAdoptions, $queryAdoptions))
        die("Failed to prepare statement\n");

    // STEP #5: Bind the PHP variables from step #1 to the statement.
    // Each question mark in the $query must be bound to the 
    // statement ($stmt). Only bind true variables (e.g. no function 
    // calls).  Use "s" for strings, "d" for float (a.k.a. double), 
    // and "i" for integers. Skip this step if there are no bind variables 
    // in your SQL statement.    
    // mysqli_stmt_bind_param($stmt, "isd", $itemId, $itemDescription, $price);

    
    // STEP #6: Execute statement and show any errors.
    
    mysqli_stmt_execute($stmtAdoptions);
    if(mysqli_errno($dbc) !== 0)
    {
        echo("Error number: " . mysqli_errno($dbc));
        echo("Error description: " . mysqli_error($dbc));
        die();
    }

    // STEP #7: Get results. Use only for SELECT statements. Skip for
    // INSERT, UPDATE, DELETE, etc.
    
    $resultAdoptions = mysqli_stmt_get_result($stmtAdoptions);
    
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
        <title>Nancy M. - New Section</title>
        <?php require("Header.php"); ?> <!--call to header file-->
    </head>
    <body>
        <div class="wrapper">
            <h1>Nancy M. - New Section</h1>

                <form action="CollegeNewSectionPost.php" method="post">
                
                    <table>
                    
                        <tr>
                            <td>Pet Number</td>
                            <td>
                                <select name="pet_id">
                                    <option value="0">Select...</option>
                                    <!--php code to create drop down list from course table-->
                                <?php
                                    while($row = mysqli_fetch_array($resultPets)) //loop for courses db table
                                    {
                                    ?>
                                    <option value="<?php echo $row['PetId']; ?>">
                                    <?php 
                                    echo htmlspecialchars($row["PetName"]); //display CourseNbr from db
                                    echo " - " . htmlspecialchars($row["Breed"]); //display Course Desc from db
                                    echo "</option>\n"; 
                                    }?> <!--end courses loop-->
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <!--<td>Section Number</td>
                            <td><input type="text" name="section_nbr" /></td> <!--display input field for sectionNbr-->
                        </tr>
                        <tr>
                            <td>Vets</td>
                            <td>
                            <select name="vet">
                                    <option value="0">Select...</option>
                                    <!--php code to create dropdown list from the vets table-->
                                <?php
                                    while($rowVet = mysqli_fetch_array($resultVet)) //loop for vets table db
                                    {
                                    ?>
                                    <option value="<?php echo $rowVet['VetId']; ?>">
                                    <?php
                                    echo htmlspecialchars($rowVet["LastName"]); //display vets last name
                                    echo ", " . htmlspecialchars($rowVet["FirstName"]); //display vets first name
                                    echo "</option>\n"; 
                                    }?> <!--end vets loop-->
                                    
                            </select>   
                            </td>
                        </tr>
                        <tr>
                            <td>Adoption Current Owner</td>
                            <td>
                                <select name="adoption">
                                    <option value="0">Select...</option>
                                    <!--php code to create dropdown list from Rooms table-->
                                    <?php
                                    while($rowAdoptions = mysqli_fetch_array($resultAdoptions)) //loop through Adoptions db table
                                    {
                                    ?>
                                    <option value="<?php echo $row['LastName']; ?>">
                                    <?php
                                    echo htmlspecialchars($row["LastName"]); //display RoomNbr
                                    echo "</option>\n"; 
                                    }?> <!--end Rooms loop-->
                                    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Micro Chip Id</td>
                            <td><input type="text" name="microChipId" /></td> <!--display input field for maxStudents-->
                        </tr>
                        
                        <tr>
                            <td>Check-In Date</td>
                            <td><input type="text" name="Check_in_date" /></td> <!--display input field for startDate-->
                        </tr>
                        <tr>
                            <td>Animal Type</td>
                            <td><input type="text" name="animal_type" /></td> <!--display input field for endDate-->
                        </tr>
                        <tr>
                            <td>Spayed/Neutered</td>
                            <td>
                            <input type="hidden" name="spayed_neutered" value="0" /> <!--value 0 = no projector needed input for table db-->
                            <input type="checkbox" name="spayed_neutered" value="1" />Spayed/Neutered?</td> <!--value 1 = projector needed input for table db-->
                            
                        </tr>
                        <tr>
                            <td>Dwelling Type</td>
                            <!--value HOM=home, APT=apartment, CND=condo class types-->
                            <td><input type="radio" name="dwelling_type" value="HOM" />Home <input type="radio" name="dwelling_type" value="APT" />Apartment
                            <input type="radio" name="dwelling_type" value="CND" />Condo</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td><input type="text" name="age" /></td> <!--number of students registered already-->
                        </tr>
                    <!--close stmts and $dbc--> 
                    <?php
                        mysqli_stmt_close($stmtPets);
                        mysqli_stmt_close($stmtVet);
                        mysqli_stmt_close($stmtAdoptions);
                        mysqli_close($dbc); 
                    ?>    
                    </table>
                
                
                    <br/><br/>
                
                    <input type="submit" class="button" />
                    &nbsp;
                    <input type="reset" class="button" />
                </form>
            
            <br /><br />
            
            <!--links to other pages-->
            <a href="ProjectDisplayAll.php" class="button">Display All List</a>
            &nbsp;
            <a href="ProjectViewPet.php" class="button">fix this link</a>
            <br /><br />
            <br /><br />

            <?php require("Footer.php"); ?> <!--call to footer file-->
        </div>
    </body>
</html>

