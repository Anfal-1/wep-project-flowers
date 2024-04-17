function product(){
  var Flower1=parseInt(document.getElementById("flower1").value);
  var Flower2=parseInt(document.getElementById("flower2").value);
  var Flower3=parseInt(document.getElementById("flower3").value);
  var Flower4=parseInt(document.getElementById("flower4").value);
  var result=0;
  var act= document.getElementById("SelectActive").value;
  if(act==="Red Rose"){
    result=150;
  }
  else if(act==="White Tulips"){
    result=190;
  }
  else if(act==="Rosy Love"){
    result=200;
  }
  else if (act==="Red Baby Roses"){
    result=250;
  }
    alert(document.getElementById("totalproduct").innerHTML=Math.round(result));
}
