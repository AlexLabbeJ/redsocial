<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');
class LibraryCustom {
	public static function haceTiempo($fecha){ 
				date_default_timezone_set('America/Santiago');
				$diferencia = time() - $fecha ; 
				$segundos = $diferencia ; 
				$minutos = round($diferencia / 60 ); 
				$horas = round($diferencia / 3600 ); 
				$dias = round($diferencia / 86400 ); 
				$semanas = round($diferencia / 604800 ); 
				$mes = round($diferencia / 2419200 ); 
				$anio = round($diferencia / 29030400 ); 
				$tooltip = date("d/m/Y (h:i a.)", $fecha);
				if($segundos <= 60){ 
					echo "<span class='tooltipFecha' title='".$tooltip."'>hace segundos.</span>"; 

				}else if($minutos <=60){ 
				if($minutos==1){ 
					echo "<span class='tooltipFecha' title='".$tooltip."'>hace un minuto.</span>"; 
				}else{ 
					echo "<span class='tooltipFecha' title='".$tooltip."'>hace $minutos minutos.</span"; 
				} 
				}else if($horas <=24){ 
					if($horas==1){ 
						echo "<span class='tooltipFecha' title='".$tooltip."'>hace una hora.</span>"; 
					}else{ 
						echo "<span class='tooltipFecha' title='".$tooltip."'>hace $horas horas.</span>"; 
					} 
				}else if($dias <= 7){ 
					if($dias==1){ 
						echo "<span class='tooltipFecha' title='".$tooltip."'>hace un dia.</span>"; 
					}else{ 
						echo "<span class='tooltipFecha' title='".$tooltip."'>hace $dias dias.</span>"; 
					} 
				}else if($semanas <= 4){ 
					if($semanas==1){ 
						echo "<span class='tooltipFecha' title='".$tooltip."'>hace una semana.</span>"; 
					}else{ 
						echo "<span class='tooltipFecha' title='".$tooltip."'>hace $semanas semanas.</span>"; 
					} 
				}else if($mes <=12){ 
					if($mes==1){ 
						echo "<span class='tooltipFecha' title='".$tooltip."'>hace un mes.</span>"; 
					}else{ 
						echo "<span class='tooltipFecha' title='".$tooltip."'>hace $mes meses.</span>"; 
					} 
				}else{ 
					if($anio==1){ 
						echo "<span class='tooltipFecha' title='".$tooltip."'>hace un a&ntilde;o.</span>"; 
					}else{ 
						echo "<span class='tooltipFecha' title='".$tooltip."'>hace $anio a&ntildeo;s.</span>"; 
					} 
				} 
		} 
}
 ?>