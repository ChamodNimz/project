<?php 
	class Validations{
		function sanitize($dirtyString){
			return htmlentities($dirtyString,ENT_QUOTES,"UTF-8");
		}
		
	}	
?>