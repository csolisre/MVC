<?php
require __DIR__ . '/vendor/autoload.php';

/**
 * @var Info $info
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
       
        
            
    
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scrum</title>
</head>
<body>
<div id="locked_view" class="container">
</div>
    <script>
       
                    
            $(document).ready(function () {
                $("#locked_view").load("src/loadChoices.php");
                
            })

            $(document).on("click", ".box", function(){
                var id = this.id;
               $("#locked_view").load("src/loadChoices.php?action="+id);
            })
            
        

    </script>
</body>

</html>