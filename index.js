/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
// @ts-nocheck TODO remove when fixed
let map;
let markers = [];
let geocoder;
let response;
let address;
let nextbuttondiv;
let newposition;
let polygon;
let secondStepDiv;
let thirdStepDiv;
let area ;
let polyline;
let polylines = [];
function validateForm()
{
     address = document.getElementById('address').value;
    if(address)
    {
            geocode({
                address: address
            })
    }
}

function initMap() {
    let lat = -34.397;
    let lng =  150.644;
    var mapOption =  {zoom: 8,
        center: {
            lat: lat,
            lng: lng
        },
        mapTypeControl: false,
        mapTypeId:'satellite',
        zoomControl: false,
        fullscreenControl: false,
        scaleControl: false,
        streetViewControl: false,}
    map = new google.maps.Map(document.getElementById("map"), mapOption);
    geocoder = new google.maps.Geocoder();
    const bounds = [
        { lat: lat, lng: lng + 0.0001 },
        { lat: lat, lng: lng },
        { lat: lat - 0.0001, lng: lng },
        { lat: lat-0.0001, lng: lng+ 0.0001 },
    ]

    response = document.getElementById('response');
    response.innerText = "";
    // Define a polygon
    var polygonOptions = {
        paths: bounds,
        visible:false,
        strokeColor: "#03fc03",
    }
    polygon = new google.maps.Polygon(polygonOptions);
    polygon.setMap(map);

    const clearButton = document.getElementById('clear');
    clearButton.addEventListener("click", () => {
        clear();
    });
    nextbuttondiv = document.getElementById('nextbutton');
    const nextbotton = document.createElement("input")
    nextbotton.type = "button";
    nextbotton.value = "Suivant";
    nextbotton.classList.add("button", "button-secondary");
    nextbotton.addEventListener('click', () => {
        drawOnMap(newposition);

    });

    nextbuttondiv.appendChild(nextbotton);
    secondStepDiv = document.getElementById('secondbutton');
    thirdStepDiv = document.getElementById('thirdbutton');
    const secondbutton = createButton("Suivant");
    //event listener on the second button
    secondbutton.addEventListener('click', () => {
        //make the polygon unmoveable
        makerMovable(markers,false);
        // draw polyline
        drawPolyLine();
        //calculate the area of the roof
        calculateArea();
        //remove polygon now
        removePolygon();
        //hide the second step
        secondStepDiv.style.display = "none";
        response.style.display = "block";
        response.innerText = "4. Sélectioner le coté la plus élever de votre toiture.\n" ;
        thirdStepDiv.style.display = "block";
    })
    secondStepDiv.appendChild(secondbutton)

    const thirdbutton = createButton("Suivant3");
    //event listener on the second button
    thirdbutton.addEventListener('click', () => {
        // add envent listner on the polygon to determine click vertices and change its color



    });
    thirdStepDiv.appendChild(thirdbutton)
    clear();

    map.addListener("click", (mapsMouseEvent) => {
       newposition = mapsMouseEvent.latLng
       var location =  document.getElementById('location');
        location.setAttribute('data-lat', newposition.lat())
        location.setAttribute('data-lng', newposition.lng())

        return newposition;
    });

}
function removePolygon()
{
    polygon.setMap(null);
}
function drawPolyLine()
{
    var bounds = polygon.getPath();
    var coord = bounds.getArray()
    $first = coord[0];
    //coord.push($first);
    var point = [];
    point.push([coord[0], coord[1]]);
    point.push([coord[1], coord[2]]);
    point.push([coord[2], coord[3]]);
    point.push([coord[3], coord[0]]);

    for(i = 0; i < point.length; i ++)
    {
        var options = {
            path: point[i],
            geodesic: true,
            strokeColor: "#5fd59d",
            strokeOpacity: 1.0,
            strokeWeight: 5,
            clickable: true,
            editable:false,

        }
        polyline = new google.maps.Polyline(options);
        polyline.setMap(map);
        polylines.push(polyline);
        google.maps.event.addListener(polyline, "click", changeColor(polyline,i));
    }
  return polyline;
}

function changeColor(polyline, i) {
    return function (event) {
        var options = {}
        for (j = 0; i < polylines.length; j++) {
            if (j == i) {
                options = {
                    strokeColor: "#ffffff",
                }

            } else {
               options = {
                    strokeColor: "#5fd59d",
                }
            }
            polylines[j].setOptions(options);
        }
    }
}
function createButton(buttonName)
{
    const button = document.createElement("input")
    button.type = "button";
    button.value = buttonName;
    button.classList.add("button", "button-secondary");
    return button;
}
function update_polygon_closure(polygon, i){
    return function(event){
        polygon.getPath().setAt(i, event.latLng);
    }
}
function makerMovable(markers, status = true)
{
    for (let i = 0; i < markers.length; i++) {
        markers[i].setDraggable(status);
    }
    return markers;
}
function calculateArea()
{

    // Use the Google Maps geometry library to measure the area of the polygon
    var area = google.maps.geometry.spherical.computeArea(polygon.getPath());
    response.style.display = "block";
    response.innerText = "3. La surface de votre toiture est de  " +
        area +" metre caré\n" ;

}
function drawOnMap(newposition){
    polygon.setMap(null);
    polygon.setMap(map);
    map.setCenter(newposition);
   // marker.setPosition(newposition);
    map.setZoom(20);
    const bounds = [
        { lat: newposition.lat(), lng: newposition.lng() + 0.0001 },
        { lat: newposition.lat(), lng: newposition.lng() },
        { lat: newposition.lat() - 0.0001, lng: newposition.lng() },
        { lat: newposition.lat() -0.0001, lng: newposition.lng() + 0.0001 },
    ]

    // Define a polygon and set its editable property to true.
    polygon.setPath(bounds)
    var icon = {
//path: google.maps.SymbolPath.CIRCLE,
        path: "M -1 -1 L 1 -1 L 1 1 L -1 1 z",
        strokeColor: "#FF0000",
        strokeOpacity: 0,
        fillColor: "#FF0000",
        fillOpacity: 1,
        scale: 5
    };


    let marker_options = {};
    // map.controls[google.maps.ControlPosition.LEFT_TOP].push(responseDiv);

    for (var i=0; i<bounds.length; i++){
        marker_options.position = bounds[i];
        marker_options.map = map;
        marker_options.draggable = true;
        marker_options.raiseOnDrag = false;
        marker_options.flat = true;
        marker_options.icon = icon;
        var point = new google.maps.Marker(marker_options);
        markers.push(point);
        google.maps.event.addListener(point, "drag", update_polygon_closure(polygon, i));
    }


    polygon.setVisible(true)

    //Sélectionnez le pan de toiture en déplaçant les 4 coins du carré vert
    response.innerText = "2. Sélectionnez le pan de toiture en déplaçant les 4 coins du carré  sur la carte puis" +
        " cliquez sur " +
        " Suivant.\n"
       ;
    nextbuttondiv.style.display = "none";
    secondStepDiv.style.display = "block";


}
function clear() {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
    markers = [];
    polygon.setMap(null);
    response.style.display = "none";
    nextbuttondiv.style.display = "none";
    secondStepDiv.style.display = "none";
    thirdStepDiv.style.display = "none";
}

function geocode(request) {
    clear();
    geocoder
        .geocode(request)
        .then((result) => {
            const {
                results
            } = result;

            map.setCenter(results[0].geometry.location);
            map.setZoom(20);
         //   marker.setPosition(results[0].geometry.location);
         //   marker.setMap(map);
            response.style.display = "block";
            response.innerText = "1. Repérez votre toit et cliquez le sur la carte puis cliquez sur " +
                " suivant.\n" +
                "Si vous ne le trouvez pas, appuyez sur le bouton « Je ne trouve pas ma maison »";
            nextbuttondiv.style.display = "block";
            return results;
        })
        .catch((e) => {
            alert("Geocode was not successful for the following reason: " + e);
        });
}

//window.initMap = initMap;

