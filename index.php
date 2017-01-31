<?php

if(isset($_GET["type"])){
 
		switch ($_GET["type"])
		 {
		 	case 'Legislators':
		 		Get_Legislators_Data();
			break;

		 	case 'Bills':
		 		Get_Bills_Data();
			break;

		 	case 'Committees':
		 		Get_Committeess_Data();
			break;
      
      case 'CDetails':
		 		Get_PC_Details();
			break;
      
      case 'BDetails':
		 		Get_BC_Details();
			break;

			default:
				echo "Please check the parameters";
			break;
	 	}
	 
	
}
else
	echo "Please verify the URL";

function Get_Legislators_Data(){
	echo file_get_contents("http://104.198.0.197:8080/legislators?apikey=557e1c43ef49410ba98106c87347f140&per_page=all");
	#echo file_get_contents("https://congress.api.sunlightfoundation.com/legislators?apikey=557e1c43ef49410ba98106c87347f140&per_page=all");
}

function Get_Bills_Data(){
  if($_GET["status"]=="active"){
    echo file_get_contents("http://104.198.0.197:8080/bills?history.active=true&apikey=557e1c43ef49410ba98106c87347f140&per_page=100");
  }
  else if($_GET["status"]=="new")
  {
    echo file_get_contents("http://104.198.0.197:8080/bills?history.active=true&apikey=557e1c43ef49410ba98106c87347f140&per_page=100");
  }
	#echo file_get_contents("http://104.198.0.197:8080/bills?apikey=557e1c43ef49410ba98106c87347f140&per_page=all");
	#echo file_get_contents("http://congress.api.sunlightfoundation.com/bills?apikey=557e1c43ef49410ba98106c87347f140&per_page=all");
}

function Get_Committeess_Data(){
	echo file_get_contents("http://104.198.0.197:8080/committees?apikey=557e1c43ef49410ba98106c87347f140&per_page=all");
	#echo file_get_contents("http://congress.api.sunlightfoundation.com/committees?apikey=557e1c43ef49410ba98106c87347f140&per_page=all");
}

function Get_PC_Details(){
  echo file_get_contents("http://104.198.0.197:8080/committees?member_ids=".$_GET["bioguid"]."&apikey=557e1c43ef49410ba98106c87347f140&per_page=all");
  #echo file_get_contents("http://congress.api.sunlightfoundation.com/committees?member_ids=".$_GET["bioguid"]."&apikey=557e1c43ef49410ba98106c87347f140&per_page=all");
}

function Get_BC_Details(){
  echo file_get_contents("http://104.198.0.197:8080/bills?sponsor.party=".$_GET["party"]."&apikey=557e1c43ef49410ba98106c87347f140&per_page=all");
  #echo file_get_contents("http://congress.api.sunlightfoundation.com/bills?sponsor.party=".$_GET["party"]."&apikey=557e1c43ef49410ba98106c87347f140&per_page=all");
}

?>