<?php
    if(isset($_POST['express-interest'])){

        $name = $_POST['interest-name'];
        $license = $_POST['interest-lic-num'];
        $price = $_POST['interest-price'];
        $contact  =$_POST['interest-contact'];

        $file = fopen("buyer.txt",'a');
        if($file){
            $details = $name . ":" . $license . ":" . $price . ":" . $contact . chr(0x0D) . chr(0x0A);

            fwrite($file,$details);
            fclose($file);
        }

        header("Location: http://isit.local/ass2/?enquiry=true");
        exit;
    }

?>