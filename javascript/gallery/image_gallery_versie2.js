/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var versie= 2.0;
window.onload = function () {
     //versie info
     var eKop = document.querySelector('h1');
     eKop.innerHTML = eKop.innerHTML + versie;
     
     //fincion principal
     var eImg = document.getElementById('plaatshouder');
     //var eSidebar = document.querySelector('sidebar');
     //var eLinks = eSidebar.getElementsByTagName('a'); //collection
     var eLinks = document.querySelectorAll('sidebar a'); //collection
     //console.log('eLinks %s',eLinks.length);
     for(var i=0;i<eLinks.length;i++){
          eLinks[i].addEventListener('click',function (e){
                e.preventDefault();
                //toonFoto(this,eImg);
                })
          eLinks[i].addEventListener('mouseover',function (e){
          toonFoto(this,eImg);
          })
     }
}
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
