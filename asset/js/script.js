const idProductEl = document.querySelectorAll(".idProduct");
const  qtyInputEl = document.querySelectorAll(".qtyInput");

//supItemCart
const supItemCartEl = document.querySelectorAll(".supItemCart");

for (let i = 0; i < supItemCartEl.length; i++) {

  supItemCartEl[i].addEventListener('click',()=>{
    
    supItemCartEl[i].click();

    document.cookie = String(idProductEl[i].value)+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";  

    history.go(0);
  });      
}

//x_z/liste.php


//.getElementById("OkResetDiv").style.display = "none";

function xz_Periode(){

 document.getElementById("btnXzPeriode").click(); 

}

function xz_Uact(){
    
 document.getElementById("btnXzUact").click();
  
 }

 function xz_Etat(){
  
  document.getElementById("btnXz").click();
   
  }

  const qtyPlusEl = document.querySelectorAll(".qtyPlus");
  for (let i = 0; i < qtyPlusEl.length; i++) {

    qtyPlusEl[i].addEventListener('click',()=>{
   
    qtyInputEl[i].value= parseInt(qtyInputEl[i].value)+1;
      
    document.cookie = String(idProductEl[i].value)+" = "+ String(qtyInputEl[i].value) +"; expires=Thu, 18 Dec 2030 12:00:00 UTC; path=/"; 
      
    history.go(0);
    })
    
  }


  const qtyMinusEl = document.querySelectorAll(".qtyMinus");
  for (let i = 0; i < qtyPlusEl.length; i++) {

    qtyMinusEl[i].addEventListener('click',()=>{
   
      if(parseInt(qtyInputEl[i].value)> 0 ){
        qtyInputEl[i].value= parseInt(qtyInputEl[i].value)-1;        
      }  
      
    document.cookie = String(idProductEl[i].value)+" = "+ String(qtyInputEl[i].value) +"; expires=Thu, 18 Dec 2030 12:00:00 UTC; path=/"; 
      
    history.go(0);
    })
    
  }

  //=========== Lignes Tickets ================
 