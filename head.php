<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shoppe Kart - Salnazi@gmail.com</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

 <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"><!-- -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script>
        function toggle(id) {
            if (document.getElementById(id).style.display == 'none') {
                document.getElementById(id).style.display = 'block';
            } else {
                document.getElementById(id).style.display = 'none';
            }
        }
    </script>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  

<style type='text/css'>
#example1
{
color:black;
}
input, select
{
color:black;
}
body
{
font-family:calibri;
font-weight:bold;
}
td
{
font-family:calibri;
font-weight:bold;
color:#0174DF;
}

</style>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	function tally (selector) {
		$(selector).each(function () {
			var total = 0,
				column = $(this).siblings(selector).andSelf().index(this);
			$(this).parents().prevUntil(':has(' + selector + ')').each(function () {
				total += parseFloat($('td.sum:eq(' + column + ')', this).html()) || 0;
			})
			$(this).html(total.toFixed(2));
		});
	}
	tally('td.subtotal');
});
 
</script>

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("itemDesc").value = "";
		document.getElementById("itemDescData").value = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;

				document.getElementById("itemDesc").value = this.responseText;
		
				document.getElementById("itemDescData").value = this.responseText;
            }
        };
        xmlhttp.open("GET","get_itemdesc.php?q="+str,true);
        xmlhttp.send();
    }
}

function showUser1(str) {
    if (str == "") {
        document.getElementById("itemDesc1").value = "";
		document.getElementById("itemDescData").value = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;

				document.getElementById("itemDesc1").value = this.responseText;
				document.getElementById("itemDescData").value = this.responseText;
            }
        };
        xmlhttp.open("GET","get_itemdesc.php?q="+str,true);
        xmlhttp.send();
    }
}

function showUser2(str) {
    if (str == "") {
        document.getElementById("itemDesc2").value = "";
		document.getElementById("itemDescData").value = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;

				document.getElementById("itemDesc2").value = this.responseText;
				document.getElementById("itemDescData").value = this.responseText;
            }
        };
        xmlhttp.open("GET","get_itemdesc.php?q="+str,true);
        xmlhttp.send();
    }
}
function showUser3(str) {
    if (str == "") {
        document.getElementById("itemDesc3").value = "";
		document.getElementById("itemDescData").value = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;

				document.getElementById("itemDesc3").value = this.responseText;
				document.getElementById("itemDescData").value = this.responseText;
            }
        };
        xmlhttp.open("GET","get_itemdesc.php?q="+str,true);
        xmlhttp.send();
    }
}
function showUser4(str) {
    if (str == "") {
        document.getElementById("itemDesc4").value = "";
		document.getElementById("itemDescData").value = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;

				document.getElementById("itemDesc4").value = this.responseText;
				document.getElementById("itemDescData").value = this.responseText;
            }
        };
        xmlhttp.open("GET","get_itemdesc.php?q="+str,true);
        xmlhttp.send();
    }
}
function showUser5(str) {
    if (str == "") {
        document.getElementById("itemDesc5").value = "";
		document.getElementById("itemDescData").value = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;

				document.getElementById("itemDesc5").value = this.responseText;
				document.getElementById("itemDescData").value = this.responseText;
            }
        };
        xmlhttp.open("GET","get_itemdesc.php?q="+str,true);
        xmlhttp.send();
    }
}
function showUser6(str) {
    if (str == "") {
        document.getElementById("itemDesc6").value = "";
		document.getElementById("itemDescData").value = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;

				document.getElementById("itemDesc6").value = this.responseText;
				document.getElementById("itemDescData").value = this.responseText;
            }
        };
        xmlhttp.open("GET","get_itemdesc.php?q="+str,true);
        xmlhttp.send();
    }
}
function returnSales(str) {
    if (str == "") {
        document.getElementById("returnAmt").value = "";
		
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;

				document.getElementById("returnAmt").value = this.responseText;
				
            }
        };
        xmlhttp.open("GET","get_returnsales.php?q="+str,true);
        xmlhttp.send();
    }
}

</script>
</head>
<?php $skin = "hold-transition ". _SKIN ." sidebar-mini"; ?>
<body class="<?php echo $skin; ?>">