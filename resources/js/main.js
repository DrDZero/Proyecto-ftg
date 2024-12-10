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