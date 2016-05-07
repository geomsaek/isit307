<!doctype>
<html>
<head>
    <title></title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <form>
        <label>Product Name Search</label>
        <input id="product-name" type="text" class="form-control" />
        <div id="list">

        </div>
    </form>
    <script>
        jQuery(document).ready(function(){

            jQuery.ajax({
                url : 'http://isit.local/ass7/task3/scripts/product-list.php',
                success : function(data){
                    product = jQuery('product', data);
                }
            });

            jQuery('#product-name').keyup(function () {
                jQuery('#list').children().remove();
                for(var i = 0; i < product.length; i++){
                    var spec = product.filter(":eq(" + i + ")");

                    var val = jQuery(this).val();

                    var found = false;
                    var curVal = "";

                    var prodname = spec.find('name').text();
                    if(prodname.search(val) != -1){
                        found = true;
                    }

                    if(found){
                        jQuery('#list').append('<p class="update">' + prodname + '</p>');

                    }

                    jQuery('.update').each(function(){

                        jQuery(this).click(function(){
                            alert(jQuery(this).eq());
                            var val = jQuery(this).text();
                            jQuery('#product-name').val(val);
                            jQuery('#list').children().remove();
                        });
                    })
                }
            });

            jQuery('#product-name').blur(function(){
                setTimeout(removeItem, 100);
            });

            function removeItem(){
                jQuery('#list').children().remove();
            }



        });

    </script>
</body>
</html>