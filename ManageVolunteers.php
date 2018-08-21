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
        <header><h2>Volunteer Management System</h2></header>
        <div id="wrapper">
        <h2>Manage Volunteer</h2>
       <div class="absolute">
       <?php 
        include 'DatabaseControl.php'; 
        
         
       ?>
       </div>
         <section>
            <nav>
                <h3>Administrative Options:</h3>
                <ul>
                    <li><input type="submit" value="Change Volunteer Filter" name="ChangeFilterV" /></li>
                    <li><input type="submit" value="Search Volunteers" name="SearchV" /></li>
                    <li><input type="submit" value="View Volunteer Opportunity Matches" name="VVOM" /></li>
                    <li><input type="submit" value="Edit Volunteer" name="EditV" /></li>
                    <li><input type="submit" value="Add new Volunteer" name="AddV" /></li>
                </ul>
            </nav>
        </section>
       
        </div>
    </body>
</html>
