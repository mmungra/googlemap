<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="row margin-top">
        <div class="col-sm-4">
            <form id="mainform">
                <div class="form-group">
                    <label for="address">Entrez votre adresse:</label>
                    <input type="text" class="form-control" id="address" aria-describedby="emailHelp"
                           placeholder="Entrer votre Adresse">
                    <small id="emailHelp" class="form-text text-muted">Vos données restent confidentielles
                        .</small>
                    <div class="invalid-feedback alert alert-danger hide address_msg">
                        Veillez renseigner votre adresse.
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="validateForm()">Rechercher</button>
                <button type="button" id="clear" value="clear" class="btn btn-default">Effacer</button>
                <a class="btn btn-warning hide" id="roofnotfound" role="button">Je trouve pas mon toit</a>
                <div id="location" data-lat="" data-lng=""></div>
            </form>

            <p id="response"></p>
            <section id="step_one">
                <div id="nextbutton">
                </div>
            </section>
            <section id="step_two">
                <div id="secondbutton">
                </div>
            </section>
            <section id="step_three">
                <div id="thirdbutton">
                </div>
            </section>
            <section id="step_four" class="hide">
                <h2 class="">Quelle est l’exposition de <span>votre toiture ? </span></h2>
                <p class="font-italic">Cette réponse nous permet d’estimer la durée d'ensoleillement</p>
                <div class="exposition-list">
                    <div class="expo-hover selected-expo">
                        <div><input type="radio" id="N"
                                    name="exposition"
                                    value="Nord"><label
                                    for="N"><img src="img/Nord.svg"
                                                 alt="N"><span><br>Nord</span></label></div>
                        <div><input type="radio"
                                    id="S"
                                    name="exposition" value="Sud"><label for="S"><img src="img/Sud.svg"
                                                                                      alt="S"><span><br>Sud</span></label>
                        </div>
                    </div>
                    <div class="expo-hover">
                        <div><input type="radio" id="NE" name="exposition" value="Nord-Est"><label for="NE"><img
                                        src="img/Nord-Est.svg" alt="NE"><span><br>Nord-Est</span></label></div>
                        <div><input type="radio" id="SO" name="exposition" value="Sud-Ouest"><label for="SO"><img
                                        src="img/Sud-Ouest.svg" alt="SO"><span><br>Sud-Ouest</span></label></div>
                    </div>
                    <div class="expo-hover">
                        <div><input type="radio" id="E" name="exposition" value="Est"><label for="E"><img
                                        src="img/Est.svg" alt="E"><span><br>Est</span></label></div>
                        <div><input type="radio" id="O" name="exposition" value="Ouest"><label for="O"><img
                                        src="img/Ouest.svg" alt="O"><span><br>Ouest</span></label></div>
                    </div>
                    <div class="expo-hover">
                        <div><input type="radio" id="SE" name="exposition" value="Sud-Est"><label for="SE"><img
                                        src="img/Sud-Est.svg" alt="SE"><span><br>Sud-Est</span></label></div>
                        <div><input type="radio" id="NO" name="exposition" value="Nord-Ouest"><label for="NO"><img
                                        src="img/Nord-Ouest.svg" alt="NO"><span><br>Nord-Ouest</span></label></div>
                    </div>
                </div>
                <div id="fourthbutton">
                    <div class="alert alert-danger hide" id="orientation-error" role="alert">
                        Choissez une orientation !
                    </div>
                    <button id="buttonforthStep" value="Suivant" class="btn btn-primary">Suivant</button>
                </div>
            </section>
            <section id="sectionroofnotfound" class="hide">
                <h1 class="text-dark">Information de votre Toiture</span></h1>
                <form id ="form_roof_not_found" class="needs-validation"  data-toggle="validator" novalidate
                      method="post">
                    <h3 class="text-secondary">Quelle est l´orientation de <span> votre toiture ?</span></h3>
                    <div class="form-group exposition-container">
                        <div class="exposition-list form-check">
                            <div class="expo-hover form-check">
                                <div><input type="radio" id="N"
                                            name="exposition"
                                            value="Nord" required><label
                                            for="N"><img src="img/Nord.svg"
                                                         alt="N"><span><br>Nord</span></label></div>
                                <div><input type="radio"
                                            id="S"
                                            name="exposition" value="Sud" required><label for="S"><img src="img/Sud.svg" alt="S"><span><br>Sud</span></label>
                                </div>
                            </div>
                            <div class="expo-hover form-check">
                                <div><input type="radio" id="NE" name="exposition" value="Nord-Est" required><label for="NE"><img
                                                src="img/Nord-Est.svg" alt="NE"><span><br>Nord-Est</span></label></div>
                                <div><input type="radio" id="SO" name="exposition" value="Sud-Ouest" required><label for="SO"><img
                                                src="img/Sud-Ouest.svg" alt="SO"><span><br>Sud-Ouest</span></label></div>
                            </div>
                            <div class="expo-hover form-check">
                                <div><input type="radio" id="E" name="exposition" value="Est" required><label for="E"><img
                                                src="img/Est.svg" alt="E"><span><br>Est</span></label></div>
                                <div><input type="radio" id="O" name="exposition" value="Ouest" required><label for="O"><img
                                                src="img/Ouest.svg" alt="O"><span><br>Ouest</span></label></div>
                            </div>
                            <div class="expo-hover form-check">
                                <div><input type="radio" id="SE" name="exposition" value="Sud-Est" required><label for="SE"><img
                                                src="img/Sud-Est.svg" alt="SE"><span><br>Sud-Est</span></label></div>
                                <div><input type="radio" id="NO" name="exposition" value="Nord-Ouest" required><label for="NO"><img
                                                src="img/Nord-Ouest.svg" alt="NO"><span><br>Nord-Ouest</span></label></div>
                            </div>
                        </div>
                        <div class="invalid-feedback alert alert-danger hide">
                            Choissez votre orientation.
                        </div>
                    </div>

                    <h3 class="text-secondary">Quelle est la surface disponible <span>sur votre toiture ? </span></h3>
                    <div class="form-group">
                        <label for="fulladdress">Longeur:</label>
                        <input type="text" class="form-control" id="longeur" name = "longeur"
                               aria-describedby="emailHelp"
                               placeholder="Entrez la longeur de votre toit" required>
                        <div class="invalid-feedback alert alert-danger hide">
                            Entrez la longeur de votre toit
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fulladdress">Largeur:</label>
                        <input type="text" class="form-control" id="largeur" name = "largeur"
                               aria-describedby="emailHelp"
                               placeholder="Entrez la largeur de votre toit" required>
                        <div class="invalid-feedback alert alert-danger hide">
                            Entrez la largeur de votre toit
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" name = "submit" value="submit" class="btn btn-primary">Suivant</button>
                    </div>
                </form>

            </section>
        </div>
        <div class="col-sm-8">
            <div id="map"></div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="index.js" type="application/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0DOyCn7fHMdEN7HVumjmZTldMdmEfrpI&callback=initMap
&libraries=places&v=weekly"
        defer></script>
</body>
</html>