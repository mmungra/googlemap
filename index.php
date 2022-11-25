<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 400px;
            /* The height is 400 pixels */
            width: 50%;
            /* The width is the width of the web page */
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        /* Set the size of the div element that contains the map */


    </style>
</head>
<body>

<div class="container">
    <form >
        <div class="form-group">

            <div class="forminput">
                <label>
                    Enter your address :
                </label>
                <input type="text" class="form-control" id="address">
            </div>
                <input type="button" id="submit" value="search" class="btn btn-default" onclick="validateForm()">
                <input type="button" id="clear" value="clear" class="btn btn-default">

        </div>
        <div id="location" data-lat="" data-lng=""></div>
    </form>
    <p id ="response"></p>
    <div id="nextbutton">
    </div>
    <div id="secondbutton">
    </div>
    <div id="thirdbutton">
    </div>
    <div id="map"></div>
</div>
<script src="index.js" type="application/javascript"></script>
<script>


 //   var map;
    function initMap11() {

        //map options
        var options = {
            zoom:4,
            center:{ lat: 44.5452, lng: -78.5389,
            },
            mapId: "23b5f774331b4e96",
            mapTypeId: "terrain",
        }
        const contentString =
            '<div id="content">' +
            '<div id="siteNotice">' +
            "</div>" +
            '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
            '<div id="bodyContent">' +
            "<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large " +
            "sandstone rock formation in the southern part of the " +
            "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
            "south west of the nearest large town, Alice Springs; 450&#160;km " +
            "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
            "features of the Uluru - Kata Tjuta National Park. Uluru is " +
            "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
            "Aboriginal people of the area. It has many springs, waterholes, " +
            "rock caves and ancient paintings. Uluru is listed as a World " +
            "Heritage Site.</p>" +
            '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
            "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
            "(last visited June 22, 2009).</p>" +
            "</div>" +
            "</div>";
        const infowindow = new google.maps.InfoWindow({
            content: contentString,
            ariaLabel: "Uluru",
        });
        var markerpoint = options.center

        map = new google.maps.Map(document.getElementById('map'), options);
        var marker = new google.maps.Marker({
            position:  markerpoint,
            map:map,
            zoomControl: true,
            mapTypeControl:true,
            scaleControl: true,
            streetViewControl: true,
            rotateControl: true,
            fullscreenControl: true
        })
        marker.addListener("click", () => {
            infowindow.open({
                anchor: marker,
                map,
            });
        });

        // Define the LatLng coordinates for the polygon's path.
        const triangleCoords = [
            { lat: 25.774, lng: -80.19 },
            { lat: 25.774, lng: -85.19 },
            { lat: 30.774, lng: -85.19 },
            { lat: 30.774, lng: -80.19 },

        ];
        // Construct the polygon.
        /*const bermudaTriangle = new google.maps.Polygon({
            paths: triangleCoords,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FF0000",
            fillOpacity: 0.35,
        });

        bermudaTriangle.setMap(map);
        // Add a listener for the click event.
        bermudaTriangle.addListener("click", showArrays);
        infoWindow = new google.maps.InfoWindow();
*/
      // rectangle shape
        const bounds = {
            north: 44.599,
            south: 44.49,
            east: -78.443,
            west: -78.649,
        }
        // Define a rectangle and set its editable property to true.
        const rectangle = new google.maps.Rectangle({
            bounds: bounds,
            editable: true,
            draggable: true,
        });

        rectangle.setMap(map)
            ["bounds_changed", "dragstart", "drag", "dragend"].forEach((eventName) => {
            rectangle.addListener(eventName, () => {
                console.log({ bounds: rectangle.getBounds()?.toJSON(), eventName });
            });
        });



    }
    function showArrays(event) {
        // Since this polygon has only one path, we can call getPath() to return the
        // MVCArray of LatLngs.
        // @ts-ignore
        const polygon = this;
        const vertices = polygon.getPath();
        let contentString =
            "<b>Bermuda Triangle polygon</b><br>" +
            "Clicked location: <br>" +
            event.latLng.lat() +
            "," +
            event.latLng.lng() +
            "<br>";

        // Iterate over the vertices.
        for (let i = 0; i < vertices.getLength(); i++) {
            const xy = vertices.getAt(i);

            contentString +=
                "<br>" + "Coordinate " + i + ":<br>" + xy.lat() + "," + xy.lng();
        }

        // Replace the info window's content and position.
        infoWindow.setContent(contentString);
        infoWindow.setPosition(event.latLng);
        infoWindow.open(map);
    }

  //  window.initMap = initMap;
 </script>

<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0DOyCn7fHMdEN7HVumjmZTldMdmEfrpI&callback=initMap&v=weekly"
        defer
></script>

</body>
</html>