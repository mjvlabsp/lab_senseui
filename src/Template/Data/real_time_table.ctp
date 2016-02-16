<?php
        echo "<table>";
        echo "<tr>";
        echo "<td>";
        echo "Local";
        echo "</td>";
        echo "<td>";
        echo "Valor";
        echo "</td>";
        echo "<td>";
        echo "Horário";
        echo "</td>";
        echo "</tr>";
        
        foreach($last_values as $lv) {
            echo "<tr>";
            if(!is_null($lv[0])) {
                echo '<td>' . $lv[1] . '</td>';
                echo '<td>' . $lv[0]->value . '</td>';
                echo '<td>' . $lv[0]->created . '</td>';        
            } else {
                echo '<td>' . $lv[1] . '</td>';
                echo '<td> - </td>';
                echo '<td> - </td>';
            }
            echo "</tr>";
        }
        echo "</table>";
        
?>