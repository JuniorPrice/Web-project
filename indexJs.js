function displayBanner(){                     //function to be called by text banner div
    setInterval(function(){                   //set interval method to execute the proccec every second to update the time
        var banner=document.getElementById("textBanner");                        //get element that display the banner
        var date= new Date();                                                    //create new Date opject
        var today= date.getDate() +' / '+ (date.getMonth()+1) +' / '+ date.getFullYear();      //get the date from Date Opject and orgnize the format
        var time= date.getHours() +' : '+ date.getMinutes()+' : '+ date.getSeconds() ;         //get the time from Data Opject and orgnize the format
        var output= "Welcom Sunset Hotel Website! Today is "+ today +  " , and the time is " + time;  //preparing output for display
        banner.innerHTML=output;           //take the output to be displayed
    },1000)    //run the function every second
    
}

function gallery(){                                //gallery function 
    var img=document.getElementById("phGall");     //get the emlement taht display the photos
    var gallery=[                                  //array of images
        "photo-gallery/01.jpeg",
        "photo-gallery/02.jpeg",
        "photo-gallery/03.jpeg",
        "photo-gallery/04.jpeg",
        "photo-gallery/05.jpeg",
        "photo-gallery/06.jpeg"
        
    ]

    var index=0;                                    //the index of image
    setInterval(function(){                         //setInterval method to execute the procces every 3 seconds
        img.src = gallery[index];                   //set the sourse of image in the element
        index++                                     //inc the indix
        if (index==6){index=0;}                     //if statment to return the index to the beginning if gallery array
    },3000)                                         //execute again in 3 seconds
}