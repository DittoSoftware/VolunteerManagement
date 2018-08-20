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
            h3
            {
               color: #FFFFFF;
            }
            table, th, td
            {
                border: 1px solid black;
            }
            
            div.absolute
            {
                position: absolute;
                top: 112px;
                right: 0;
                width: 400px;
                height: 100px;
            }
            
            section
            {
                content:"";
                display: table;
                clear: both;
            }
            nav ul
            {
                list-style-type: none;
                padding: 0px;
            }
            nav
            {
              float: left;
              width: 230.5px;
              height: 180px;
              background-color: #006666;
              padding: 10px;
            }
            article
            {
               padding: 20px;
               border: 1px solid black;
               width: 300px;
               
            }
        </style>
    </head>
    <body>
        <header><h2>Volunteer Management System</h2></header>
        <div id="wrapper">
        <h2>Manage Volunteer</h2>
       <div class="absolute">
       <?php
       
        echo "<table border='1'>";
        echo "<tr>"
            ."<th>First Name</th>"
            ."<th>Last Name</th>"
            ."<th>Preferred Centers</th>"
            ."</tr>";
        
        class TableRows extends RecursiveIteratorIterator
        {
           function __construct($it) 
           {
               parent::__construct($it, self::LEAVES_ONLY);
           } 
           
           function current()
           {
               return "<td style='width: 150px; border: 1px solid black>". 
                       parent::current(). "</td>";
           }
           
           function beginChildren() 
           {
               echo "<tr>";
           }
           
           function endChildren() {
               echo "</tr>"."\n";
           }
        }
        
        $servername = "localhost";
        $username = "root";
        $password = "Database";
        $dbname = "volunteer";
        
        try
        {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, 
                              $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connection->query("SELECT FirstName, LastName, CenterPref FROM volunteerdata");
        $stmt->execute();
        
                

        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v)
        {
         echo $v;
        }
        
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $connection = null;
        echo "</table>";
        ?>
       </div>
         <section>
            <nav>
                <h3>Administrative Options:</h3>
                <ul>
                    <li><input type="submit" value="Change Volunteer Filter" name="ChangeFilter" /></li>
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
