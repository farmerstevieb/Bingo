<!doctype html>
<?php include_once("include/functions.php"); ?>
<html>
<head>
<title><?php printf("Bingo Card Number %s%'04s",$setid,$_GET["cardnumber"]); ?>
</title>
    <style>/* Pen-specific styles */
            html, body, section {
              height: 100%;
            }

            body {
              color: #000;
              font-family: sans-serif;
              font-size: 1.25rem;
              line-height: 150%;
              text-align: center;
              text-shadow: 0 2px 2px #b6701e;
            }

            div {
              display: flex;
              flex-direction: column;
              justify-content: center;
            }

            h1 {
              font-color:#000;
              font-size: 1.75rem;
              margin: 0 0 0.75rem 0;
            }

            /* Pattern styles */
            .container {
              display: flex;
            }

            .left-half {
            /*  background-color: #ff9e2c;
            */  flex: 1;
              padding: 1rem;
            }

            .right-half {
            /*  background-color: #b6701e;
            */  flex: 1;
              padding: 1rem;
            }

            #tableContainer {
              display: table;
              padding: 1px;
              margin-right: auto;
              margin-left: auto;
            }

            td {
              border: 1px solid;

              padding: .5px;
              background-color: skyblue;
              display: table-cell;
              align-items: center;
              cursor: pointer;
            }

            td:hover {

              background-color: grey;
            }

            .clicked {
              background-color: red;
            }
    </style>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>
<body>
<section class="container">
  <div class="left-half">
    <article><div id="serverdata"></div>
      </article>
    </div>
  <div class="right-half">
    <article>
        <?php // echo $viewheader."<br />"; ?>
        <div id="tableContainer">
            <?php	$names = load_name_file();   
                
                display_card($_GET["cardnumber"]-1,0,((($_GET["cardnumber"]-1<=count($names))&&$namefile)?$names[$_GET["cardnumber"]-1]:""));
               
            ?>    
        </div>
        <?php // echo "<br />".$viewfooter; ?>
    </article>
  </div>
</section>
    
<script type="text/javascript">
    $(document.body).on('click', 'td', changeColor);

    function changeColor() {
      const $this = $(this);
      if ($this.hasClass("clicked")) {
        $this.removeClass("clicked")
      } else {
        $this.addClass("clicked");
      }
    }
</script>
<script>
    if(typeof(EventSource) !== "undefined") {
      var source = new EventSource("test.php");
    //document.getElementById("serverdata").innerHTML += event.data ; + "<br />";
      source.onmessage = function(event) {  
        document.getElementById("serverdata").innerHTML = event.data ;//+ "<br />";
      };
    } else {
      document.getElementById("serverdata").innerHTML = "Sorry, your browser does not support server-sent events...";
    }
</script>
 </body>
 </html>
