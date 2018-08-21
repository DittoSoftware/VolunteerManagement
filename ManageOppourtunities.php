<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
        <?php include 'style.css'; ?>
        </style>
    </head>
    <body>
         <h2>Volunteer Management System</h2>
        <h3>Manage Oppourtunities</h3>
        
        <div class="absolute">
       <?php
        include 'DatabaseControl2.php'; 
        ?>
        </div>
              
        <section>
                <h3>Administrative Options:</h3>
                <ul>
                    <li><input type="submit" value="Change Opportunity Filter" name="ChangeFilterO" /></li>
                    <li><input type="submit" value="Search Oppourtunity" name="SearchO" /></li>
                    <li><input type="submit" value="View Volunteer Opportunity Matches" name="VVOM" /></li>
                    <li><input type="submit" value="Edit Oppourtunity" name="EditO" /></li>
                    <li><input type="submit" value="Add new Oppourtunity" name="AddO" /></li>
                    <li><input type="submit" value="Delete Oppourtunity" name="DeleteO" /></li>
                </ul>   
        </section>
        
    </body>
</html>


