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
        $resCount = 0;

        for($i = 0; $i < sizeof($details); $i++){

            $temp = array();
            $temp = explode(":",$details[$i]);

            if(check_record($temp,$userSearch)):

                echo "<div class='container result-wrap'>";
                    echo "<div class='row'>";
                        echo "<div class='col-sm-12 col-md-6'>";
                            echo "<div class='col-md-6 car-image-wrap'>";
                                echo "<img src='images/" . $temp[10] . "' />";
                            echo "</div>";
                            echo "<div class='col-md-6 car-content-wrap'>";
                                echo "<p class='seller-name'><strong>Name: </strong>" . $temp[0] . " " . $temp[1] . "</p>";
                                echo "<p class='seller-miles'><strong>Car Mileage: </strong>" . $temp[2] . "</p>";
                                echo "<p class='seller-price'><strong>Price: </strong>" . $temp[3] . "</p>";

                                if($userSearch[3]) {
                                    echo "<p class='seller-contact'><strong>Contact Number: </strong>" . $temp[4] . "</p>";
                                    echo "<p class='seller-owner-count'><strong>Owner Count: </strong>" . $temp[6] . "</p>";
                                    echo "<p class='seller-service'><strong>Service List: </strong>" . $temp[7] . "</p>";
                                }

                                echo "<p class='seller-license'><strong>License: </strong>" . $temp[5] . "</p>";
                                echo "<p class='seller-license'><strong>Make/Model: </strong>" . $temp[8] . "</p>";
                                echo "<p class='seller-license'><strong>Year: </strong>" . $temp[9] . "</p>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='col-sm-12 col-md-6'>";
                            echo "<button class='btn btn-info express-interest' type='button' data-toggle='modal' data-target='#myModal'>Express Interest</button>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";

                unset($temp);

                $resCount++;

            endif;


        }

        if($resCount == 0){
            echo "<p>Your query didn't return any results</p>";
            echo "<p>Please try your <a href='http://isit.local/ass2'>search again</a></p>";
        }

    }

    function check_record($details, $userSearch){

        $displayResult = false;
        $percent;

        $licenseRes;
        $userRes;

        if(all_fields($userSearch)){
            if($userSearch[0] == $details[5] && $userSearch[1] == $details[6]){
                similar_text($userSearch[2],$details[7], $percent);
                if($percent > 50){
                    return true;
                }else {
                    return false;
                }
            }else {
                return false;
            }

        }else {

            if(empty($userSearch[0]) && empty($userSearch[1]) && empty($userSearch[2])){
                return true;
            }

            $licenseRes = license_check($userSearch[0], $details[5]);
            $userRes = check_users($userSearch[1], $details[6]);
            $serviceRes = compare_service($userSearch[2], $details[7]);

            if($licenseRes && $userRes && $serviceRes){
                return true;
            }else {
                return false;
            }

        }

    }

    function all_fields($userSearch){

        $allFields = false;
        $counter = 0;

        for($i = 0; $i < sizeof($userSearch) -1; $i++){

            if(!empty($userSearch[$i])){
                $counter++;
            }

        }

        // if all fields are filled in return true
        if($counter == 3){
            return true;
        }else {
            return false;
        }
    }

    // check the registration - license number
    function license_check($licenseVal,$catLicense){
        if (strlen($licenseVal) > 0) {

            if ($licenseVal == $catLicense) {
                return true;
            }else {
                return false;
            }
        }else {
            return true;
        }
    }

    //check the user number
    function check_users($userVal, $catUser){
        if (strlen($userVal) > 0) {
            if ($userVal == $catUser) {
                return true;
            } else {
                return false;
            }
        }else {
            return true;
        }
    }

    // compare service string
    function compare_service($userService, $catService){

        $percent;

        if (strlen($userService) > 0) {
            similar_text($userService, $catService, $percent);
            if($percent > 50){
                return true;
            }else {
                return false;
            }
        }else {
            return true;
        }
    }

?>