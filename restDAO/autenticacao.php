<?php

class autenticacao {
	
	public static function autenticar(){
		if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
			if(($_SERVER['PHP_AUTH_USER'] !="admin")||($_SERVER['PHP_AUTH_PW']!="admin")){
				return 1;
			}else{
				return 1;
			}
		}else{
                    return 1;
                }
	}
	
}

