<?php
namespace App;
use App\Events\Broadcastnotificacion;

use Illuminate\Database\Eloquent\Model;

Class Proyecto extends Model{

	protected $table='proyecto';

	protected $primaryKey='id';

	protected $fillable=['id',
	                    'titulo',
	                    'usuario',
	                    'categoria',
	                    'subcategoria',
	                    'forma_pago',
	                    'tipo_trabajo',
	                    'archivo',
	                    'tipo_proyecto',
	                    'presupuesto',
	                    'tiempo_entrega',
	                    'cantidad_tiempo',
	                    'estado',
	                    'habilidades',
	                    'descripcion',
	                    'pais',
	                    'calculo',
	                    'urgente',
	                    'fecha_publicacion'];
			public $timestamps = false;

	protected $dispatchesEvents = [
		'created'=>Broadcastnotificacion::class
	];

 public function scopeTitulo($query,$name,$precio,$pais,$estado,$categoria,$tipo)
    {
        if($name or $pais or $precio or $estado or $categoria or $tipo){
	        switch ($pais) {
	        	case '1':
	        	$pais = '82';
	        	break;
	        	case '2':
	        	$pais='5';
	        	break;
	        	case '3':
	        	$pais = '89';
	        	break;
	        	case '4':
	        	$pais = '';
	        	break;
	        	default:
	        	$pais ='';
	        	break;
	        }


             $mostrar = $query;

            	if ($precio!="") {
		        if ($precio==1) {
		        	$mostrar->Where('presupuesto','>=','100')
	        				->Where('presupuesto','<=','500');
		        }elseif ($precio==2) {
		        			$mostrar->Where('presupuesto','>=','500');
		        }elseif($precio==3){
		            	$mostrar->Where('presupuesto','<=','100');
		        }

        	}


        	if ($pais!="") {$mostrar->Where('pr.pais','=',$pais);}



        	if ($estado==1 or $estado==3 or $estado==4  or $estado==5) {
        		$mostrar->Where('pr.estado','=',$estado);
        	}

        	if ($categoria!='') {
        		$mostrar->Where('categoria','=',$categoria);
        	}
        	if ($tipo!="") {
        		$mostrar->Where('tipo_trabajo',$tipo);
        	}
        
                $mostrar->LeftJoin('categories_ability as cax','cax.id_category','=','pr.categoria')
                        ->Where(function($query) use($name){
                     $query->orWhere('pr.descripcion','LIKE',"%".$name."%")
                          ->orWhere('pr.habilidades','LIKE',"%".$name."%")
                          ->orWhere('pr.subcategoria','LIKE',"%".$name."%")
						  ->orWhere('usu.nombre_empresa','LIKE',"%".$name."%")
						  ->orWhere('usu.nombres','LIKE',"%".$name."%")
                          ->orWhere('cax.description','LIKE',"%".$name."%")
                          ->orWhere('titulo','LIKE',"%".$name."%");
        	});



        	return $mostrar;
        }
    }

}

 ?>
