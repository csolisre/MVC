/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
var versie = " versie 1.0";


window.onload = function (){
    
    var eKop=document.querySelector('h1');
    console.log(eKop);
    eKop.innerHTML=eKop.textContent + versie;
    //donde de mostrara la imagen
    var eImagen= document.getElementById('plaatshouder');//no regresa toto el objeto <img>
    //console.log(eImagen);
    //buscar todas las imagenes
    var eLinks= document.querySelectorAll('sidebar a');//nos regresa un array con todos los objetos <a>
    //console.log(eLinks.length);// regresa el numeto de objetos <a> en este caso 5
    //console.log(eLinks[2]);//asi podriamos ver cada objeto dentro del array
    
    //inicial el event listener
    
    for (i=0; i < eLinks.length; i++){
        eLinks[i].addEventListener('click', function (e){
            e.preventDefault();
            toonFoto(this, eImagen);
        });
    };
    
};

function toonFoto(eLink, eImage){//eLink nos da el objeto <a> y e Imagen nos da el objeto <img>
    //console.log(eImage.href);
    
    eImage.src=eLink.href;
     var sInfo = eLink.getAttribute('title');
     var eInfo = document.getElementById('info');
     if (eInfo){
         eInfo.innerHTML=sInfo;
     }else{
     eInfo=document.createElement('p');    
     eInfo.id = "info";
     eInfo.innerHTML = sInfo;
     //eImage.parentNode.appendChild(eInfo);
     eImage.parentNode.insertBefore(eInfo,eImage);
     }
     
    
}

