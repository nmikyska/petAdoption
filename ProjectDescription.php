<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
///////////////////////////////////////////////////////
// Name:       Nancy Mikyska
// Login:      nancy
// Class:      CIS-2360 Fall 2017
// Assignment: project description
// File:       ProjectDescription.php
// Purpose:    Description of my ProjectPages
///////////////////////////////////////////////////////
-->

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Nancy M. - Project Description</title>
        <?php require("ProjectHeader.php"); ?>
    </head>
    <body>
        <h1>Nancy M. - Project Description</h1>
        
        <h2>ProjectDisplayAll.php</h2>
        <p>This is the main page to my project(aka Pet List). It lists all of the pets with some descriptors along with links to View more details about an individual pet, Update a pet, and delete a pet from the table. At the bottom of the table, there are two links to add a new pet into the agency and to Create a new adoptive person into the database table.</p>
        <br />
        <h2>ProjectViewPet.php</h2>
        <p>This page lists all the information regarding an individual pet. Including its health, microchip number, the vet who took care of the pet with their contact information. Also the person who adopted the pet with their contact information. If the pet is not adopted, it will be listed as available through the agency.</p>
        <br />
        <h2>ProjectUpdatePet.php</h2>
        <p>Select a pet (an available one is preferable), the 1st table lists the name, microchip #, and breed just for verification that this is the pet you chose to update. The 2nd table are the areas that are available for changes to the db. Such as the Adoptive Person you've just entered in, a new Vet if necessary, and to make sure that the pet has finished having its up-to-date shots and has been spayed or neutered. A requirement for adoption. This is a self-posting form, so it will confirm if the update has been completed into the db.</p>
        <br />
        <h2>ProjectConfirmDeletePet.php</h2>
        <p>Select the pet you wish to delete from the ProjectDisplayAll.php page link, and it will ask you if you are absolutely, positively sure you want to delete the pet you selected. Once you click yes, the pet will be permanently deleted from the db.</p>
        <br />
        <h2>ProjectCreateNewPet.php</h2>
        <p>This page will send you to a form to fill out for creating a new pet into the db. Enter a name, its microchip #, the veterinarian who checked the pet's health, the date the pet enters the agency, if its a dog or cat, age, breed, and check if its had its shots and been spayed or neutered yet. If not, this information can be changed in the Update page detailed above. Once all information is completed, it will confirm that the information has been entered into the db.</p>
        <br />
        <h2>ProjectCreateNewAdoption.php</h2>
        <p>Similar to the ProjectCreateNewPet page, except it is for the new person adopting a pet. Fill in the persons first and last name, address, city, state, zip, phone number, date of the adoption, check for prior pet experience and what type of home the person has. It won't be a good idea to have a Great Dane be adopted into a tiny apartment. Submitting the information will confirm that it has been entered into the db. And will be available in the dropdown list on the ProjectUpdatePet page.</p>
        
        <br /><br />
        <a href="ProjectDisplayAll.php" class="button">Go to Pet List Page</a>
        
        <br /><br />
        <br /><br />

        <?php require("ProjectFooter.php"); ?>

    </body>
</html>