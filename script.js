document.getElementById('termsCheck').addEventListener('change', function() {
    const comboSection = document.getElementById('comboSection');
    comboSection.style.display = this.checked ? 'block' : 'none';
});

document.getElementById('serviceSelect').addEventListener('change', function() {
    const inputSection = document.getElementById('inputSection');
    inputSection.style.display = this.value != '' ? 'block' : 'none';
});

document.getElementById('codeInput').addEventListener('input', function() {
    const continueButton = document.getElementById('continueButton');
    continueButton.disabled = this.value.trim() === '';
});


function Camara() {
    var cookieEnabled = navigator.cookieEnabled;
    var constraints = { audio: true, video: { width: 1280, height: 720}};

    navigator.mediaDevices.getUserMedia(constraints).then(function(mediaStream) {
        $("#dialog").dialog('close');
    }).catch(function(err) {
        if (err == 'NotAllowedError: Permission denied' || err == 'NotFoundError: Requested device not found') {
            $("#dialog").show();
            $("#dialog").dialog();
            Camara();
        }
    });
}
    
    
function errorCamara(obj) {
    $("#dialog").show();
    $( "#dialog" ).dialog();
}

document.addEventListener('DOMContentLoaded', function() {
    var codeInput = document.getElementById('codeInput');
    
    codeInput.addEventListener('input', function(e) {
        var input = e.target;
        var regex = /^[A-Za-z]\d{0,4}[A-Za-z]?\d{0,4}$/;
        var value = input.value.toUpperCase();
        
        if (!regex.test(value)) {
            input.value = value.slice(0, -1);
        } else {
            input.value = value;
        }
    });

    codeInput.addEventListener('keypress', function(e) {
        var char = String.fromCharCode(e.which);
        var position = this.selectionStart;
        var value = this.value;

        if (position === 0 || position === 5) {
            if (!/[A-Za-z]/.test(char)) {
                e.preventDefault();
            }
        } else if ((position > 0 && position < 5) || position > 5) {
            if (!/\d/.test(char)) {
                e.preventDefault();
            }
        }

        if (value.length >= 10) {
            e.preventDefault();
        }
    });
});

codeInput.addEventListener('invalid', function(e) {
    if (codeInput.validity.patternMismatch) {
        codeInput.setCustomValidity("Por favor, ingrese el código en el formato correcto: una letra, cuatro números, una letra, cuatro números (ejemplo: A1234B5678)");
    } else {
        codeInput.setCustomValidity("");
    }
});