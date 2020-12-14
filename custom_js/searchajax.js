function showSearch() {

    var marka = document.getElementById("ime_marka").value;
    var karoserija = document.getElementById("tip_karoserija").value;
    var registracija = document.getElementById("tip_registracija").value;
    var godinaod = document.getElementById("godinaod").value;
    var godinado = document.getElementById("godinado").value;
    var cenaod = document.getElementById("cenaod").value;
    var cenado = document.getElementById("cenado").value;
    var menuvac = document.getElementById("ime_menuvac").value;
    var gorivo = document.getElementById("ime_gorivo").value;

    document.getElementById("scrollbar").innerHTML="";



     var xmlhttp=new XMLHttpRequest();

       xmlhttp.onreadystatechange=function() {
           if (this.readyState==4 && this.status==200) {
               document.getElementById("scrollbar").innerHTML=this.responseText;
           }
       }

    xmlhttp.open("GET","php/search.php?marka="+marka+"&karoserija="+karoserija+"&registracija="+registracija+"&godinaod="+godinaod+"&godinado="+godinado+"&cenaod="+cenaod+"&cenado="+cenado+"&menuvac="+menuvac+"&gorivo="+gorivo,true);
    xmlhttp.send();

};







