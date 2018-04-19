// JavaScript libary
 
/**************** DOM functies *******************/
 
function leegNode(objNode){
/* verwijdert alle inhoud/children van een Node
     @ objNode: node, verplicht, de node die geleegd wordt
*/
     while(objNode.hasChildNodes()){
          objNode.removeChild(objNode.firstChild)
     }
}

/**************** Datum, tijd functies *************/
 
//globale datum objecten
var vandaag = new Date();

function getVandaagStr(){
//returnt een lokale datumtijdstring
 
var strNu = "Momenteel: " + vandaag.toLocaleDateString() + ", ";
strNu += vandaag.toLocaleTimeString();
return strNu;
}
//---------------------------------------------

//----------datum arrays----------------------
 
//dagen volgens getDay() volgorde
var arrWeekdagen= new Array('zondag', 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag');
 
//vervang feb dagen voor een schrikkeljaar
var arrMaanden= new Array(['januari',31], ['februari',28], ['maart',31], ['april',30], ['mei',31], ['juni',30], ['juli',31],
['augustus',31], ['september',30], ['oktober',31], ['november',30], ['december',31]);

//---------------------------------------------

//globale datum objecten te gebruiken in je pagina
var vandaag = new Date();
var huidigeDag = vandaag.getDate(); //dag van de maand
var huidigeWeekDag = vandaag.getDay(); //weekdag
var huidigeMaand = vandaag.getMonth();
var huidigJaar = vandaag.getFullYear();


/************** cookies ****************************/

//------------Set Cookie-------------------------------

function setCookie(naam, waarde, tijd){
    var exp="";
    if (tijd){
        var expDate= new Date(vandaag.getTime()+tijd*24*60*60*1000);
        exp= expDate.toUTCString();
    }
    document.cookie=naam + "="+waarde+";expires"+exp;
}

//--------------Get Cookie-----------------------------
function getCookieWaarde (naam){
    var busca= naam+"=";
    if (document.cookie.length>0){ //las cookies se da como un solo elemento dentro de un array
        var inicio= document.cookie.indexOf(busca);//busca en que posision inicial de la cookie
        console.log('las cookies en DOM '+document.cookie);  
        console.log('posc inicial '+inicio);
        console.log(busca);
        console.log(busca.length);
        console.log(document.cookie[29]);
        if (inicio!== -1){ //condicion si encontro o no la palabra
            inicio += busca.length;
            var fin = document.cookie.indexOf(";",inicio);
            console.log(fin);
            if (fin ){
                
            }
        }
    }
}