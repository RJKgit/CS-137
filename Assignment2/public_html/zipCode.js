/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 var xhr;
 var response;
 var city;
 var state;

 function getPlace(zip) { 
        xhr = new XMLHttpRequest();
        xhr.onreadystatechange =processXhrUpdate;
        xhr.open("GET", "getCityState.php?zip=" + zip, true);
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
        xhr.send("zip=" + zip);    
 }

 function processXhrUpdate() {
     if (xhr.readyState===4) {
         if (xhr.status===200) {
 document.forms[0].output.value  = xhr.responseText;
 response  = xhr.responseXML.documentElement;
 city = response.getElementsByTagName('city')[0].firstChild.data;
 state = response.getElementsByTagName('state')[0].firstChild.data;
 document.forms[0].city.value = city;
 document.forms[0].state.value = state;
         } else {
             alert("Please enter a valid zip code:\n" +
                 xhr.statusText);
         }
     }
 }

