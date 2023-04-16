<html>
   <head>
<?php
//error_reporting(0);
       include("head.php");
	   ?>

       <script type="text/javascript">
              $(document).ready(function() {
    $("#ajaxButton").click(function() {
        $.ajax({
              type: "Post",
              url: "get_itemdesc.php",
              success: function(data) {
                    var obj = $.parseJSON(data);      
                    var result = "<ul>"
                    $.each(obj, function() {
                        result = result + "<li>First Name : " + this['itemCode'] + " , Last Name : " + this['itemDesc'] + "</li>";
                    });
                    result = result + "</ul>"
                    $("#result").html(result);
              }
        }); 
    });
});
       </script>
   </head>
 
<body>
<input type="button" value="Click Here" id="ajaxButton"/>
<div id="result"></div>
</body>
</html>
   </body>
</html>