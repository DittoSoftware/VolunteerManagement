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
        $stmt = $connection->query("SELECT * FROM volunteerdata");
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

