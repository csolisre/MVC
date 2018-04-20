// JavaScript libary

/**************** DOM functies *******************/

function leegNode(objNode) {
    /* verwijdert alle inhoud/children van een Node
     @ objNode: node, verplicht, de node die geleegd wordt
     */
    while (objNode.hasChildNodes()) {
        objNode.removeChild(objNode.firstChild)
    }
}

/**************** Datum, tijd functies *************/

//globale datum objecten
var vandaag = new Date();

function getVandaagStr() {
//returnt een lokale datumtijdstring

    var strNu = "Momenteel: " + vandaag.toLocaleDateString() + ", ";
    strNu += vandaag.toLocaleTimeString();
    return strNu;
}
//---------------------------------------------

//----------datum arrays----------------------

//dagen volgens getDay() volgorde
var arrWeekdagen = new Array('zondag', 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag');

//vervang feb dagen voor een schrikkeljaar
var arrMaanden = new Array(['januari', 31], ['februari', 28], ['maart', 31], ['april', 30], ['mei', 31], ['juni', 30], ['juli', 31],
        ['augustus', 31], ['september', 30], ['oktober', 31], ['november', 30], ['december', 31]);

//---------------------------------------------

//globale datum objecten te gebruiken in je pagina
var vandaag = new Date();
var huidigeDag = vandaag.getDate(); //dag van de maand
var huidigeWeekDag = vandaag.getDay(); //weekdag
var huidigeMaand = vandaag.getMonth();
var huidigJaar = vandaag.getFullYear();


/************** cookies ****************************/

//------------Set Cookie-------------------------------

function setCookie(naam, waarde, tijd) {
    var exp = "";
    if (tijd) {
        var expDate = new Date(vandaag.getTime() + tijd * 24 * 60 * 60 * 1000);
        exp = expDate.toUTCString();
    }
    document.cookie = naam + "=" + waarde + ";expires" + exp;
}

//--------------Get Cookie-----------------------------
function getCookie(naam) {
    var busca = naam + "=";
    if (document.cookie.length > 0) { //las cookies se da como un solo elemento dentro de un array
        var inicio = document.cookie.indexOf(busca);//busca en que posision inicial de la cookie
        console.log('las cookies en DOM ' + document.cookie);
        console.log('posc inicial ' + inicio); //29
        console.log('palabra a buscar ' + busca);
        console.log('longitud ' + busca.length);
        if (inicio !== -1) { //condicion si encontro o no la palabra. en caso de no encontrar la palabra siempre dara -1
            inicio += busca.length;
            console.log('posc inicial despues del = ' + inicio);
            var fin = document.cookie.indexOf(";", inicio);//primero que palabara busca ";" y luego a partir de que posicion "35";
            console.log('final ' + fin);
            if (fin == -1) {
                fin = document.cookie.length;
                console.log('posc final ' + fin);//posicion final 38
            }
            console.log('valor de la cookie! ' + document.cookie.substring(inicio, fin));//regresa em stgring de la posicion 35 a 38 pero no tomara el ultimo valor entonces 37
            console.log('posc 35 ' + document.cookie[35]);
            console.log('posc 37 ' + document.cookie[37]);
            return document.cookie.substring(inicio, fin);

        }
    }
}
//--------------clear cookie----------------
function clearCookie(naam) {
    setCookie(naam, "", -1);
}
/******************FUNCTIES*********************************/
function maakKnop(tekst) {
    /*
     returnt een DOM button element
     */
    var eKnop = document.createElement('button');
    var sTekst = document.createTextNode(tekst);
    eKnop.appendChild(sTekst);
    eKnop.setAttribute('type', 'button');
    return eKnop;
}

//----------------------------------------------------------

function rekeningOpenen() {
    // console.log('rekening openen'); para comprobar que funciona
    var sNaam = window.prompt("Uw naam ", "");
    if (sNaam != "" && sNaam != null) {
        localStorage.setItem('klantnaam', sNaam);
        localStorage.setItem('saldo', 100);
        window.history.go(0);//hace el refresh de la pagina para que los cambios se hagan efectivos sin necesidad de hacer refresh go(aqui es indice de paginas atras en donde 0 es la pagina actual)
    }
}

//----------------------------------------------------------

function rekeningSluiten() {
    console.log('rekening sluiten');
    localStorage.clear(); //limpia toda el storage
    //clearCookie('klantnaam');
    //clearCookie('saldo');
    window.history.go(0);//actualiza la pagina
}

//---------Function berekenen "calcular"

function berekenen(bewerking) {// espera si es una suma o resta
    var nNieuwSaldo = 0;
    var eBedrag = document.getElementById('bedrag');// el elemento input del formulario
    var sBedrag = eBedrag.value; //el valor insertado en el campo(lo tomara de forma string)
    var sSaldo = localStorage.getItem('saldo');//regresa el saldo en forma de string
    var sBericht = "";
    //en belgica usan la como como punto decimal por eso debemos cambiar
    var re=','; //
    sBedrag=sBedrag.replace(re,'.');

    if (sSaldo != null && sSaldo != "") {//comprobar si existe o no saldo si no hat saldo entonces no hay usuario(en este caso al abrir cuenta pone un saldo de 100)
            if(sBedrag !="" && !isNaN(sBedrag)){//comprobar que el valor introducido sea numero y no esta en blanco
                nSaldo=parseFloat(sSaldo);//pasamos los valores string a numeros
                nBedrag=parseFloat(sBedrag);
                switch(bewerking){//calculamos el nuevo saldo
                    case '+':
                        nNieuwSaldo= nSaldo+nBedrag;
                        break;
                    case '-':
                        nNieuwSaldo= nSaldo-nBedrag;
                        break;
                }//end switch
                //comprobar que la cuenta no vaya a menos de 0
              if (nNieuwSaldo<=0){
                  var nMax= nSaldo-0.01;//minimo debe tener 0.01 centavos(lo que tiene en su cuenta menos el minimo que debe de quedar dara el maximo disponible)
                  sBericht+="Uw saldo is onvoldoende";
                  sBericht+="U kunt maximaal "+nMax+" euro afhalen";
                  eBedrag.value=nMax;// pone el maximo disponible en el formulario;
                  eBedrag.focus(); // pone el cursor encima del formulario
                  toonWaarschuwing(sBericht);//muestra un mensaje al usuario
                          
              }else{
                //actualizamos el valor de la cookie
                //setCookie('saldo', nNieuwSaldo, 100);
                localStorage.setItem('saldo', nNieuwSaldo);
                window.history.go(0);//refrescamos la ventana
                eBedrag.value="";// reseteamos el valor del formulario 
            }
                
            }else{
                alert('U moet en correct bedrag ingeven');
            }//fin coprobacion si el valor insertado es numerico
    } else {
        //si no tiene cuenta
        var bOpenen=window.confirm('U heeft nog geen rekening geopend, nu even doen? ');
        if(bOpenen === true){rekeningOpenen()};
    }//fin tiene cuenta?
}

//-----------Mensaje
function toonWaarschuwing(msg){//el mnaje pasa cuando llaman la funcion
    var eWarning= document.getElementsByClassName('waarschuwing')[0];
    console.log(eWarning);
    eWarning.innerHTML=msg;
    eWarning.style.display="block";
}