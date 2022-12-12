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
let fourStepDiv;
let area ;
let polyline;
let polylines = [];
let index ;

$(document).ready(function() {
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                var formmok = true
                var checkok = true
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        formmok = false;
                        event.stopPropagation()

                    }
                    if(!validateForm())
                    {
                        event.preventDefault()
                        event.stopPropagation()
                        checkok = false;
                    }

                    if(formmok && checkok)
                    {
                        //save data to local storage
                        localStorage.setItem("codepostale", $('#codepostale').val() );
                        //orientation saved in  exposition
                        //addresse
                        localStorage.setItem("codepostale", $('#fulladdress').val() );
                        //longeur
                        //longeur
                        localStorage.setItem("longeur", $('#longeur').val() );
                        //largeur
                        localStorage.setItem("largeur", $('#largeur').val() );
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
});

function validateForm()
{
   return  manageRadios()
}

function manageRadios()
{
    var checked = 0;
    $("input[name='exposition']").each(function(index) {
        if(this.checked) {
            checked = 1;
            selected = $(this).attr('value');
            $('#orientation-error').addClass('d-none');
            //save to local storage
            localStorage.setItem("exposition", selected );
        }
    });
    if(checked ==0)
    {
        //display error
        $('#orientation-error').removeClass('d-none');
        return false;
    }
    return true;

}
$(document).ready(function(){
    selectRadios();
});
function selectRadios()
{
    var checked = 0;
    $("input[name='exposition']").change(function(index) {
        if(this.checked) {
            element = this;
            selected = $(element).attr('value');
            //change src
           $(element).next().children('img').attr("src","img/"+selected+"_select.svg");

            //loop and set all the original src bk
            $("input[name='exposition']").each(function(index) {
                if(this != element) {
                    unselected = $(this).attr('value');
                    //set src back
                    $(this).next().children('img').attr("src","img/"+unselected+".svg");
                }
            });
        }
    });


}

