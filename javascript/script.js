  //drop dow
  function drop(){
		var click=document.getElementById("drop");
		var body=document.getElementById("body");

		if(click.style.width === "0%" &&  click.style.visibility === "hidden")
		{
           click.style.width = "80%";
           body.style.filter="blur(2px)";
          click.style.transition= "width 2s ease";
           click.style.visibility = "visible";
          
		}
		else
		{
			click.style.width = "0%";
			 click.style.visibility = "hidden";
			 click.style.transition= "width 2s ease";
           

		}
	} 
	 function hide(){
	 	var hide=document.getElementById("drop");
	 	var body=document.getElementById("body");

	 	if(hide.style.width==="80%" &&  hide.style.visibility === "visible"){
	 		hide.style.width = "0%";
	 		 body.style.filter="blur(0)";
	 		 hide.style.visibility = "hidden";
	 		 hide.style.transition= "width 5s ease";

	 	}
	 	else{
	 		hide.style.width = "100%";
	 		 hide.style.visibility = "visible";
	 	}
	 }

   //sending an msg 
	 function verify(){
       var fnme=document.getElementById("fnme").value;
       var lnme=document.getElementById("lnme").value;
       var sbj=document.getElementById("sbj").value;
       var msg=document.getElementById("msg").value;

      if (fnme=="") {
      	alert(" Please fill your first name the form to submit your query. ");

      }
      if (lnme=="") {
      	alert(" Please fill your mail the form to submit your query. ");

      }
      if (sbj=="") {
      	alert(" Please fill your subject  the form to submit your query. ");

      }
     if (msg=="") {
      	alert(" Please fill in your message in the text-area  for the form to submit your query. ");

      }
	 } 

	 //login verifiction

	 function logverify(){
	 	var password=document.getElementById("pass").value;
	 	var mail=document.getElementById("mail").value;
	 	 if(pass=="" || mail==""){
	 	 	alert("Please all fill in the fields");
	 	 	return false;
	 	 	
	 	 }
	 	 else{
	 	 	return true;
	 	 }

	 	
	 }
      //regestration verification
     //correction
     function validateForm(){
         var x = document.forms["myForm"]["name"].value;
         var pass1= document.getElementById("pass1").value;
         var pass2= document.getElementById("pass2").value;
         
         if (x == "") {
            alert("Name must be filled out");
		    return false;

		  }
		  else{
		  	return true;
		  }
    }

    //no of counts
    function count(){
       var count=1
       var i;
	  for (var i = 0; i < count.length; i++) {
	  	console.log(count[i]);
	  	document.getElementById('display_div_id').innerHTML=count[i];
	  
	  }
	  
	  
   
   }
    //end of counts