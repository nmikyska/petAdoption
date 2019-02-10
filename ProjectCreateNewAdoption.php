<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
///////////////////////////////////////////////////////
// Name:       Nancy Mikyska
// Login:      nancy
// Class:      CIS-2360 Fall 2017
// Assignment: project create new adoption
// File:       ProjectCreateNewAdoption.php
// Purpose:    Create a new adoption 
///////////////////////////////////////////////////////
-->

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Nancy M. - Project Create a new Adoptive Person</title>
        <?php require("ProjectHeader.php"); ?>
    </head>
    <body onload="document.getElementById('firstName').focus();">
        <h1>Nancy M. - Project Create a New Adoptive Person</h1>
        
        <form action="ProjectCreateNewAdoptionPost.php" method="post">
        
        <table>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="first_name" id="firstName" /></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" /></td>
            </tr>
            <tr>
                <td>Street Address</td>
                <td><input type="text" name="street_address" /></td>
                            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" name="city" /></td>
            </tr>
            <tr>
                <td>State<br /></td>
                <td>
                    <select name="state" id="state">
                        <?php
                            $states = file_get_contents('states.txt');
                            echo $states;
                        ?>
                    </select>
                </td>   
            </tr>
            <tr>
                <td>Zip Code</td>
                <td><input type="text" name="zip_code" /></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><input type="text" name="phone_number" placeholder="1235551234" /></td>             
            </tr>
            <tr>
                <td>Date of Adoption</td>
                <td><input type="text" name="adoption_date" placeholder="12/15/2017" /></td>                
            </tr>
            <tr>
                <td>Previous Pet Experience</td>
                <td><input type="hidden" name="previousPetExp" value="0" /> <!--0 = no pet experience-->
                    <input type="checkbox" name="previousPetExp" value="1" /><span class="tiny">Check if person has prior pet experience (leave blank if not)</span> <!--1 = prior pet experience-->
                </td>   
            </tr>
            <tr>
                <td>Dwelling Type</td>
                <td><input type="radio" name="dwelling" value="HOM" />Home&nbsp;
                    <input type="radio" name="dwelling" value="CND" />Condo&nbsp;
                    <input type="radio" name="dwelling" value="APT" />Apartment
                </td>
            </tr>
            
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

