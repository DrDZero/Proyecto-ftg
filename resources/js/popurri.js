// INICIALIZA EL TOOLTIP DE BOOSTRAP
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

// GENERA LA ACCION DE BOTON REGRESAR DE CADA HERRAMIENTA
$('#returnBtn').click(function() {    
    location.href="../index.html";
});

// **************** FUNCIONES GENERALES PARA EL PROYECTO  *****************//

// FUNCIÓN QUE ME GENERA UN NÚMERO ALEATORIO ENTERO AMBOS INCLUSIVOS
function getNumRand(min, max) {       
    return Math.round(Math.random()*(max-min)+parseInt(min));
}

// FUNCIÓN QUE ME GENERA UN NÚMERO ALEATORIO SIN REPETIRSE ENTERO AMBOS INCLUSIVOS
function getNumRandUnique(min, max, arrayHistory) {      
    var NumAleatorio =  getNumRand(min, max);

    if(! arrayHistory.includes( NumAleatorio )){  
        arrayHistory.push(NumAleatorio);
        return NumAleatorio;
    }  
    else{
        getNumRandUnique(min, max, arrayHistory)
    }  
}

function lanzardados() {
    let dado1 =  getNumRand(1, 6);
    let dado2 =  getNumRand(1, 6);
    let suma = dado1 + dado2;

    $({ deg: 0 }).animate({ deg: 360 }, {
        duration: 600,
        step: function (now) {
            var scale = (1 * now / 360);
            $('#ImgDado1').css({
                transform: 'rotate(' + now + 'deg) scale(' + scale + ')'
            });
            $('#ImgDado2').css({
                transform: 'rotate(' + now + 'deg) scale(' + scale + ')'
            });
        }
    }); 


    document.getElementById("ImgDado1").src="../img/dados/"+dado1+".svg";
    document.getElementById("ImgDado2").src="../img/dados/"+dado2+".svg";    
    document.getElementById("SumaDados").innerHTML = suma;
}