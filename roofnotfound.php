<?php

if(isset($_POST['submit']) && $_POST['submit'] =="submit")
{
    // save data and move to elevation
    header("Location: degreeinclinaision.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Je trouve pas mon toit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
       input[type='radio']{
            cursor: pointer;
        }
        .exposition-list{
            display: grid;
            grid-template-columns: auto auto auto;
        }
        .exposition-list > .expo-hover {
            margin: 3px;
            padding: 3px;
            text-align: center;
            border : 3px solid #ccc;
        }
        .expo-hover img {
            width: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row" style="margin-top:15px;">
        <div class="col-sm-8">


            <p id="response"></p>

        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="roofnotfound.js" type="application/javascript"></script>



</body>
</html>