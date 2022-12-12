<!DOCTYPE html>
<html>
<head>
    <title>Degree inclinaison</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .toiture-container {
            height: 500px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row" style="margin-top:15px;">
        <div class="col-sm-8">
            <form id="mainform" class="needs-validation" data-toggle="validator" novalidate method="post">
                <div class="form-group">
                    <h2 class="lead-h2">Quel est le degré d'inclinaison <br class="is-hidden-mobile"><span>de votre toiture ? </span>
                    </h2>
                    <p class="lead-p mv-20">Cette information nous permet de déterminer précisément <br
                                class="is-hidden-mobile">le rendement de vos panneaux solaires.</p>
                    <div class="toiture-container">
                        <div class="toiture-img-container"><img id="tilt" src="img/tilt/tilt-15.svg"
                                                                alt="tilt"></div>
                    </div>

                    <div class="whiteBoxContainer">
                        <div><p>Pente du toit </p>
                            <h2 class="slidervalue">15°</h2>
                        </div>
                    </div>
                    <input type="range" class="form-range" min="0" max="45" step="11.25" id="slider" value="11.25">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" name="submit" id="submit" value="submit" class="btn
                    btn-primary">Suivant</button>
                </div>
            </form>
        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="degreeinclinaision.js" type="application/javascript"></script>
</body>
</html>