$(document).ready(function(){

    //retrieved the save data
    ele = $('.summary');
    //degree declinaision
    declinaison =  localStorage.getItem("tilt");
    ele.append("<p>Déclinaison du toiture : "+declinaison+"</p>");
    //address
    address =  localStorage.getItem("address");
    ele.append("<p>Adresse : "+address+"</p>")
    //exposition
    exposition = localStorage.getItem("exposition");
    ele.append("<p>Orientation du toit : "+exposition+"</p>")
    //longeur
    longeur = localStorage.getItem("longeur");
    ele.append("<p>Longeur du toit : "+longeur+"</p>")
    //largeur
    largeur = localStorage.getItem("largeur");
    ele.append("<p>Largeur du toit : "+largeur+"</p>")
    //area
    area = localStorage.getItem("area");
    ele.append("<p>Surface du toit : "+area+" m²</p>")

});