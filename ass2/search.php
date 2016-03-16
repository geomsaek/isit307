<?php


    function open_read_file(){
        $filename = "directory.txt";
        $file = fopen("directory.txt","r");
        $contents = "";

        $details = array();
        $arrayCounter = 0;
        $temp;

        if($file != false){
            while(!feof($file)){
                $temp = fgets($file);
                if(!empty($temp)) {
                    $details[$arrayCounter] = $temp;
                    $arrayCounter++;
                }
            }

            fclose($file);

            return $details;
        }

        return $details;

    }

    function display_results($details, $userSearch){

        $temp;

        for($i = 0; $i < sizeof($details); $i++){

            $temp = array();
            $temp = explode(":",$details[$i]);

            echo "<div class='container result-wrap'>";
                echo "<div class='row'>";
                    echo "<div class='col-sm-12 col-md-6'>";
                        echo "<p class='seller-name'><strong>Name: </strong>" . $temp[0] . " " . $temp[1] . "</p>";
                        echo "<p class='seller-miles'><strong>Car Mileage: </strong>" . $temp[2] . "</p>";
                        echo "<p class='seller-price'><strong>Price: </strong>" . $temp[3] . "</p>";

                        if($userSearch[3]) {
                            echo "<p class='seller-contact'><strong>Contact Number: </strong>" . $temp[4] . "</p>";
                            echo "<p class='seller-owner-count'><strong>Owner Count: </strong>" . $temp[6] . "</p>";
                            echo "<p class='seller-service'><strong>Service List: </strong>" . $temp[7] . "</p>";
                        }

                        echo "<p class='seller-license'><strong>License: </strong>" . $temp[5] . "</p>";
                        echo "<p class='seller-license'><strong>Car Make/Model: </strong>" . $temp[8] . "</p>";
                        echo "<p class='seller-license'><strong>Car Year: </strong>" . $temp[9] . "</p>";
                    echo "</div>";
                    echo "<div class='col-sm-12 col-md-6'>";
                        echo "<button class='btn btn-info express-interest' type='button' data-toggle='modal' data-target='#myModal'>Express Interest</button>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";

            unset($temp);


        }

    }

?>