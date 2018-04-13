/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var versie = ' 3.2';

window.onload = function () {

    document.getElementById('noscript').style.display = 'none';
    
    //Verificar si har erores en la conexcion

    if (typeof aModernArt == 'undefined') {
        throw new Error('El array no se pudo cargar');
    } else {
        //comprobar si jala nuestra conexion de datos
        console.log(aModernArt[0][1]);
        aAr=aModernArt
        var eTitel = document.getElementsByTagName('h1')[0];
        eTitel.innerHTML = eTitel.textContent + versie;
        //Empezamos por indicar que objeto modificara
        var eImage= document.getElementById('plaatshouder');// nos regresa el array del elemento <img>
        //Identifificamos donde insertara la lista
        var eSide=document.querySelector('sidebar');//como no es un id si no un elemento o usamos ver elemento con [array position] o suamos querySelector
        //especificamos lo que va insertar
        var eList=hacerLista(aModernArt);//aqui decimos que ejecute una fucncion con el array aModernArt
        //Lo insertamos
        eSide.appendChild(eList);
        
        //crear el eventlistener
        
        eList.addEventListener("change", function(){ //el event listener tiene dos parametros (event, action) en este caso el event is "change" puede ser, click, mouse over, etc
            var waarde=this.value;// el attributo value de la option dentro del select
            //console.log(waarde); aqui lo podemos comprobar que funcione.
            //le decimos que cambie el sorce de la imagen
            //comrobamos que no tenga un valor nulo
            if (waarde != "" && waarde !=null){
            mostrar(eImage, waarde);//eImage es el elemento <img> y waarde es el valor del index en el array
        };
        });     
    };
};

//Crear la funcion hacerLista. aqui creamos la lista select con todas las opciones

function hacerLista(a){ //el a tomara el valor del array
    var nArt=aModernArt.length; //nos regresara el numero de opciones que debe tener la lista
    // ahora indicamos el elemento que se debera crear
    
    var eSelect= document.createElement('select');
    // creamos la opcion por default
    var eOption= document.createElement('option');
    //Le asigamos el texto
    eOption.innerHTML='seleciona una imagen';
    //le asinamo un valor. aqui deveran ser los numeros del array
    eOption.setAttribute('value',"");
    // lo agregamos a la lista
    eSelect.appendChild(eOption);
    //corremos el loop para los elementos dentro del array
    
    for(i=0; i < nArt; i++){
        var eOption=document.createElement('option');//creamos un elemento
        eOption.setAttribute('value', i);//le asignamos un valor en este caso el index del array
        eOption.innerHTML=a[i][2];//le asignamos el texto que mostrara en este caso es el 3 valor del array (0,1,2) dos es el tercer valor
        eSelect.appendChild(eOption);//lo insertamos en el elemento select
    }
    return eSelect; //solo pedimos que regrese la lista pues la insersion appenChil ya se cade en eSide.appendChild(eList); en el windowonload
}
//Despues de crear la lista regeresamos a la funcion onload para crear el event listener

function mostrar(eImage,nIndex){//nIndex es la variable que tiene el valor en el array como el "$i" la funcion en window.load no dara el valor numerico para hacer esta constulta
    aArt=aModernArt[nIndex];//aqui ya nos posisiona en cada registro del array;
    sPath=aArt[0];//no da el primer valor dentro del registro en este caso la url de la imagen
    sDesc=aArt[1];// Nos da el segundo valor dentro del registro en este caso la descriocion
    sName=aArt[2];//Nos da el tercer valor del registro en este caso al nombre del artista
    //le cambiamos el atributo "src" al alemento <img>
    eImage.src='art/'+ sPath;
    var eInfo=document.getElementById('info');
    //ahora creamos el parrafo en la parte superior
    if (eInfo){
        eInfo.innerHTML=sDesc + ', '+ sName;
    }else{
    var eInfo = document.createElement('p');
          eInfo.id = "info";
          eInfo.innerHTML = sDesc;
          eImage.parentNode.insertBefore(eInfo,eImage);
    }
}