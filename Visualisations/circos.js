	  var query,i,d;
      var row=["sch_count","male_count","female_count","stud_count","referal_count","report_count"];
      var count;
      var dataReceived;

      function getData(phpname,index)
      {
        var xhttp=new XMLHttpRequest();
         
        xhttp.onreadystatechange = function (){
            if(xhttp.readyState==4 && xhttp.status==200){
                dataReceived=xhttp.responseText;
                
            }
        };
        xhttp.open("POST","http://"+ip_address+"/Web_Portal/"+phpname,false);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.send(index);
      }
	  getData("file_handle.php","p");
	