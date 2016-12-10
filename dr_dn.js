function dropdownlist(listindex)
 {
 
document.formname.sub.options.length = 0;
 switch (listindex)
 {

 case " " :
 document.formname.sub.options[0]=new Option("Select sub","");
 break;
 
 case "city" :
 document.formname.sub.options[0]=new Option("Select Cities","");
 document.formname.sub.options[1]=new Option("Chennai","chennai");
 document.formname.sub.options[2]=new Option("Delhi","delhi");
 document.formname.sub.options[3]=new Option("Mumbai","mumbai");
 document.formname.sub.options[4]=new Option("Banglore","banglore");
 break;

 case "opinion" :
 document.formname.sub.options[0]=new Option("Select Opinion sub","");
 document.formname.sub.options[1]=new Option("Editorial","editorial");
 document.formname.sub.options[2]=new Option("Interview","interview");
 break;
 
 case "business" :
 document.formname.sub.options[0]=new Option("Select Business sub","");
 document.formname.sub.options[1]=new Option("All","all");
 document.formname.sub.options[2]=new Option("Top Stories","top");
 document.formname.sub.options[3]=new Option("Stock MArket","stocks");
 break;
 
 case "exams" :
 document.formname.sub.options[0]=new Option("Select JOB/Entrance sub","");
 document.formname.sub.options[1]=new Option("Current Affairs","current");
 document.formname.sub.options[2]=new Option("Exams","exams");
 break;

 case "sports" :
 document.formname.sub.options[0]=new Option("Select Sports","");
 document.formname.sub.options[1]=new Option("All","all");
 document.formname.sub.options[2]=new Option("Cricket","cricket");
 document.formname.sub.options[3]=new Option("Football","football");
 document.formname.sub.options[4]=new Option("Hockey","hockey");
 document.formname.sub.options[5]=new Option("Tennis","tennis");
 document.formname.sub.options[6]=new Option("Races","race");
 document.formname.sub.options[7]=new Option("Formula-One","formula-one");
 document.formname.sub.options[8]=new Option("Golf","golf");
 break;



 }
 return true;
 }