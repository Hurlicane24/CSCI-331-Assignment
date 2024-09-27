<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <style>
        table {
            width: 100%;
        }

        th {
            background-color: lightgray;
            border: 2px solid darkgray;
            padding: 6px;
        }
        td {
            background-color: white;
            border: 2px solid darkgray;
            padding: 6px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Form Results</h1>
    <?php
    $structureConditions = array_fill(0, 15, false);
    $operations = array_fill(0, 2, "");
    $keyArray = [];
    $valueArray = [];
    /* The form submission is collected in a PHP array called $_GET or $_POST */
    echo "<h2>Request Method: " . ($_GET ? "GET" : "POST") . "</h2>";
    echo "<h2> Name-Value pairs:</h2>";
    echo "<table>";
    echo "<tbody>";
    echo "<tr>";
    echo "<th> Name </th>";
    echo "<th> Value </th>";
    echo "</tr>";
    $counter = 0;

    if($_GET) {
        foreach($_GET as $key => $value) {
            if($key == "send_method") {
                break;
            }
            $keyArray[$counter] = $key;
            $valueArray[$counter] = $value;
            echo "<tr>";
            if(is_array($value)) {
                echo "<td>" . $key . "</td>";
                echo "<td>";
                foreach($value as $element) {
                    echo $element . "<br>";
                }
                echo "</td>";
            }
            else {
                echo "<td> " . $key . "</td>";
                echo "<td> " . $value . "</td>";
                echo "</tr>"; 
            }  
            $counter += 1;
        }
    }

    else if($_POST) {
        foreach($_POST as $key => $value) {
            if($key == "send_method") {
                break;
            }
            $keyArray[$counter] = $key;
            $valueArray[$counter] = $value;
            echo "<tr>";
            if(is_array($value)) {
                echo "<td>" . $key . "</td>";
                echo "<td>";
                foreach($value as $element) {
                    echo $element . "<br>";
                }
                echo "</td>";
            }
            else {
                echo "<td> " . $key . "</td>";
                echo "<td> " . $value . "</td>";
                echo "</tr>"; 
            }  
            $counter += 1;
        }
    } 

    echo "</tbody>";
    echo "</table>";

    for($i = 0; $i < count($keyArray); $i++) {
        if($keyArray[$i] == "operation1") {
            $structureConditions[0] = true;
            $operations[0] = $valueArray[$i];
        }
        else if($keyArray[$i] == "associative1") {
            $structureConditions[1] = true;
        }
        else if($keyArray[$i] == "identity_exists1") {
            $structureConditions[2] = true;
        }
        else if($keyArray[$i] == "inverses_exist1") {
            $structureConditions[3] = true;
        }
        else if($keyArray[$i] == "closed1") {
            $structureConditions[4] = true;
        }
        else if($keyArray[$i] == "additional_properties1") {
            if(count($valueArray[$i]) == 1) {
                if($valueArray[$i][0] == "commutative"){
                    $structureConditions[5] = true;
                }
                else {
                    $structureConditions[6] = true;
                }
            }
            else {
                $structureConditions[5] = true;
                $structureConditions[6] = true;
            }
        }
        else if($keyArray[$i] == "operation2") {
            $structureConditions[7] = true;
            $operations[1] = $valueArray[$i];
        }
        else if($keyArray[$i] == "associative2") {
            $structureConditions[8] = true;
        }
        else if($keyArray[$i] == "identity_exists2") {
            $structureConditions[9] = true;
        }
        else if($keyArray[$i] == "inverses_exist2") {
            $structureConditions[10] = true;
        }
        else if($keyArray[$i] == "closed2") {
            $structureConditions[11] = true;
        }
        else if($keyArray[$i] == "additional_properties2") {
            if(count($valueArray[$i]) == 1) {
                if($valueArray[$i][0] == "commutative"){
                    $structureConditions[12] = true;
                }
                else {
                    $structureConditions[13] = true;
                }
            }
            else {
                $structureConditions[12] = true;
                $structureConditions[13] = true;
            }
        }
        else if($keyArray[$i] == "experience") {
            $structureConditions[14] = true;
        }
    } 

    //Check if it's equipped with operations. If not, it is not a group, ring, or field
    if(($structureConditions[0] == false && $structureConditions[7] == false) || ($structureConditions[0] == false && $operations[1] == "None")) {
        echo "<h2>This is not a group, ring, or field since the set is equipped with no operations</h2>";
    }

    //Check if it's a field
    else if($structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true
    && $structureConditions[4] == true && $structureConditions[5] == true  && $structureConditions[7] == true
    && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true && $structureConditions[11] == true
    && $structureConditions[12] == true) {
       echo "<h2>This is a field</h2>";
    }

    //Check if it's a division ring
    else if($structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true && $structureConditions[4] == true && $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true &&
    $structureConditions[11] == true && $structureConditions[12] == true && $operations[0] == "x" || $structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true && $structureConditions[4] == true &&
    $structureConditions[5] == true && $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true &&
    $structureConditions[11] == true && $operations[1] == "x") {
       echo "<h2>This is a division ring</h2>";
    }
   
    //Check if it's a commutative ring with unity
    else if($structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[4] == true && $structureConditions[5] == true && $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true &&
    $structureConditions[11] == true && $structureConditions[12] == true && $operations[0] == "x" || $structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true && $structureConditions[4] == true &&
    $structureConditions[5] == true && $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true &&
    $structureConditions[11] == true && $structureConditions[12] == true && $operations[1] == "x") {
        echo "<h2>This is a commutative ring with unity</h2>";
    }

    //Check if it's a commutative ring
    else if($structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[4] == true && $structureConditions[5] == true && $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true &&
    $structureConditions[11] == true && $structureConditions[12] == true && $operations[0] == "x" || $structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true && $structureConditions[4] == true &&
    $structureConditions[5] == true && $structureConditions[7] == true && $structureConditions[8] == true &&
    $structureConditions[11] == true && $structureConditions[12] == true && $operations[1] == "x") {
        echo "<h2>This is a commutative ring</h2>";
    }

    //Check if it's a ring with unity
    else if($structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[4] == true && $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true &&
    $structureConditions[11] == true && $structureConditions[12] == true && $operations[0] == "x" || $structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true && $structureConditions[4] == true &&
    $structureConditions[5] == true && $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true &&
    $structureConditions[11] == true && $operations[1] == "x") {
        echo "<h2>This is a ring with unity</h2>";
    }

    //Check if it's a ring
    else if($structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[4] == true && $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true &&
    $structureConditions[11] == true && $structureConditions[12] == true && $operations[0] == "x" || $structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true && $structureConditions[4] == true &&
    $structureConditions[5] == true && $structureConditions[7] == true && $structureConditions[8] == true &&
    $structureConditions[11] == true && $operations[1] == "x") {
        echo "<h2>This is a ring</h2>";
    }

    //Check if it's an abelian group under addition, but not a ring
    else if($structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true && $structureConditions[4] == true && $structureConditions[5] == true
    && $operations[0] == "+" || $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true && $structureConditions[11] == true &&
    $structureConditions[12] == true && $operations[1] == "+") {
        echo "<h2>This is an abelian group under addition</h2>";
    }

    //Check if it's an abelian group under multiplication, and a group under addition
    else if($structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true && $structureConditions[4] == true && $structureConditions[5] == true
    && $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true && $structureConditions[11] == true && $operations[0] == "x" || $structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true &&
    $structureConditions[4] == true && $structureConditions[7] == true && $structureConditions[8] == true && 
    $structureConditions[9] == true && $structureConditions[10] == true && 
    $structureConditions[11] == true &&
    $structureConditions[12] == true && $operations[1] == "x") {
        echo "<h2>This is an abelian group under multiplication, and a group under addition</h2>";
    }
    
    //Check if it's an abelian group under multiplication
    else if($structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true && $structureConditions[4] == true && $structureConditions[5] == true
    && $operations[0] == "x" || $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true && $structureConditions[11] == true &&
    $structureConditions[12] == true && $operations[1] == "x") {
        echo "<h2>This is an abelian group under multiplication</h2>";
    }

    //Check if it's a group under multiplication and addition
    else if($structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true && $structureConditions[4] == true
    && $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true && $structureConditions[11]) {
        echo "<h2>This is an group under multiplication and addition</h2>";
    }

    //Check if it's a group under multiplication
    else if($structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true && $structureConditions[4] == true 
    && $operations[0] == "x" || $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true && $structureConditions[11] == true && 
    $operations[1] == "x") {
        echo "<h2>This is a group under multiplication</h2>";
    }

    //Check if it's a group under addition
    else if($structureConditions[0] == true && $structureConditions[1] == true && $structureConditions[2] == true && $structureConditions[3] == true && $structureConditions[4] == true 
    && $operations[0] == "+" || $structureConditions[7] == true && $structureConditions[8] == true && $structureConditions[9] == true && $structureConditions[10] == true && $structureConditions[11] == true && 
    $operations[1] == "+") {
        echo "<h2>This is a group under addition</h2>";
    }

    //Check if it is nothing
    else {
        echo "<h2>This does not have any notable algebraic structure</h2>";
    }

    ?>

</body>

</html>