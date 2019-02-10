<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
///////////////////////////////////////////////////////
// Name:       Nancy Mikyska
// Login:      nancy
// Class:      CIS-2360 Fall 2017
// Assignment: Confirm delete Pet
// File:       ProjectConfirmDelPet.php
// Purpose:    Pet to be deleted from db confirmation
///////////////////////////////////////////////////////
-->

<?php
///////////////////////////////////////

// get the pet Id

$petId = filter_input(INPUT_GET, "pet");

?>
    
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Nancy M. - Project Confirm to Delete Pet</title>
        <?php require("ProjectHeader.php"); ?> <!--call to header file-->
    </head>
    <body>
        
            <h1>Nancy M. - Project Confirm to Delete Pet</h1>
            
            
            <h3 class="bold">Are you absolutely, positively sure your want to delete this pet?</h3>      <br /><br />
            <a href="ProjectDeletePet.php?pet=<?php echo $petId; ?>" class="button">Yes</a>
            &nbsp;&nbsp;
            <a href="ProjectDisplayAll.php" class="button">No</a>
            
            <br /><br />
            <br /><br />
            <a href="ProjectDisplayAll.php" class="button">Back to Pet List</a>
            <br /><br />
            <br /><br />
            <?php require("ProjectFooter.php"); ?>
            
    </body>
</html>