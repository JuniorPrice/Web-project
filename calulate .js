var price = document.getElementById("price");
var rom1 = document.getElementById("1bed")
var rom2 = document.getElementById("2beds1")
var rom3 = document.getElementById("3beds")
var car = document.getElementById("cleancar");
var CleanRoom = document.getElementById("cleanroom"); 
var  Breakfast =document.getElementById("Breakfast");
var coupon = document.getElementById("haveCopon1");






   
   function getPrice1(){
    var calulate1 = document.getElementById("calulate").getElementsByTagName("input")
  
    var totelPrice=0.0;
    
       if(rom1.checked){

        totelPrice+=15.0;
       }
       if(rom2.checked){

        totelPrice+=20.0;
       }
       if(rom3.checked){

        totelPrice+=25.0;
       }
    
        if(car.checked){
        
            totelPrice+=2.0;
        }
        if(CleanRoom.checked){
        
            totelPrice+=1.0;
        }
        if(Breakfast.checked){
        
            totelPrice+=3.0;
        }
        if( coupon.checked){

            totelPrice-=3.0;
        }
       

        document.getElementById("price").innerHTML= totelPrice + "ROM";


    }



   
    function clear1(){

        document.getElementById("price").innerHTML="0.0OMR"
        
        
        
        }
        


