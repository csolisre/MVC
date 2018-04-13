/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



window.onload= function(){
        var eImg=document.getElementsByClassName('toggle'); //array con todos los elementos <img>
        eKnop=document.getElementById('hoofdknop'); // si no ponemos var se convierte en variable global
        eKnop.addEventListener('click',function(){
            hideShowAll(eImg);//Pasa todo el array a la funcion hide
            
        });
        createLinks(eImg);//Pasa todos los elementos dela array a la funcion crear Links
        //esconder cada imagen
        eSingleKnop=document.querySelectorAll('dl'); //los elementos que detonara el evento en este caso en toda la seccion <dl>
        eSingleKnop[0].addEventListener('click', function(e){
           var target = e.target; 
           if(target.classList.contains('img-hide')){
           target.nextSibling.style.display='none';
       }
        });

        
};

function hideShowAll(a){
    var nImg = a.length;
    console.log(eKnop.textContent);
    if(eKnop.textContent =='Alle schermen verbergen'){
        
         for (i=0; i<nImg; i++){   
        
            a[i].style.display='none';
            eKnop.innerHTML='Toon alles';
        }    
    }else{
        
        for (i=0; i<nImg; i++){   
        
            a[i].style.display='block';
            eKnop.innerHTML='Alle schermen verbergen';
        }
    }   
}
function createLinks(a){
    var nImg= a.length; // no da el numero de elementos aue se deben crear
    for (i=0; i<nImg; i++){
        
        var eBlink =document.createElement('button');
       eBlink.id=i;
       eBlink.setAttribute('class','img-hide');
       eBlink.innerHTML='Toggle';
        //console.log(a[1]);
        a[i].parentNode.insertBefore(eBlink, a[i]);
       
    }
}
