<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    protected $table= 'usuario';
    protected $primaryKey='id';
    public $timestamps = false;
    public function getAuthPassword()
    {
        return $this->pass;
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                'usuario', 'correo','pass','pass_dinero','estado','pais','perfil','profesion','enviar','nombres','apellidos','imagen',
                'logo_empresa','tipo','token_pass','token_correo','token_recuperar','correo_history','email_verified_at','actividad_dinero',
                'reconocimiento','nivel','fecha','flag','urllinkedin','tpu','baja','unosubcategoria','unoconocimiento','dossubcategoria',
                'dosconocimiento','tressubcategoria','tresconocimiento','fe_baja','tok_baja','activo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pass','pass_dinero', 'remember_token'
    ];

    public function scopeTitulo($query,$name,$precio,$paiss)
    {


        if($name or $precio or $paiss) {

            switch ($paiss) {
	        	case '1':
	        	$paiss = '82';
	        	break;
	        	case '2':
	        	$paiss='5';
	        	break;
	        	case '3':
	        	$paiss = '89';
	        	break;
	        	case '4':
	        	$paiss = '';
	        	break;
	        	default:
	        	$paiss ='';
	        	break;
	        }
	        //print_r($query->get());exit();
	        //return $query;
	        $mostrar = $query;
	       /* $mostrar->distinct('usuario.id');*/
	        if($precio!='')
	        {
		        if ($precio==1) {
		        	$mostrar->Where('precio_hora','<=','100');
	        				//->Where('precio_hora','>=','500');
		        }elseif ($precio==2) {
		        	$mostrar->Where('precio_hora','>=','100')
	        				->Where('precio_hora','<=','500');
		        }elseif($precio==3){
		            	$mostrar->Where('precio_hora','>=','500');
		        }
	        }

	        if ($paiss!="") {$mostrar->Where('pais','=',$paiss);}
	       // $mostrar->distinct();

                     $mostrar->LeftJoin('work_experiences as ex','ex.id_user','=','usuario.id')
                        ->Leftjoin('studies as st','st.id_user','=','usuario.id')
                        ->Leftjoin('user_abilities as ua','ua.id_user','=','usuario.id')
                        ->Leftjoin('abilities as aa','aa.id_ability','=','ua.id_ability')
                        ->Leftjoin('categories_ability as ca','aa.id_category','=','ca.id_category')



                            ->where(function($querys) use ($name){
                            $querys->orWhere('nombres','LIKE',"%".$name."%")
                            ->orWhere('ca.description','LIKE',"%".$name."%")
                            ->orWhere('st.institute','LIKE',"%".$name."%")
                            ->orWhere('st.degree','LIKE',"%".$name."%")
                            ->orWhere('st.type_study','LIKE',"%".$name."%")
                            ->orWhere('ex.charge','LIKE',"%".$name."%")
                            ->orWhere('ex.company','LIKE',"%".$name."%")
                            ->orWhere('ex.description_profile','LIKE',"%".$name."%")
                            ->orWhere('perfil','LIKE',"%".$name."%")
                            ->orWhere('apellidos','LIKE',"%".$name."%")
                            ->orWhere('unosubcategoria','LIKE',"%".$name."%")
                            ->orWhere('profesion','LIKE',"%".$name."%")
                            ->orWhere('unoconocimiento','LIKE',"%".$name."%")
                            ->orWhere('dossubcategoria','LIKE',"%".$name."%")
                            ->orWhere('dosconocimiento','LIKE',"%".$name."%")
                            ->orWhere('tressubcategoria','LIKE',"%".$name."%")
                            ->orWhere('tresconocimiento','LIKE',"%".$name."%");
                        });


            return $mostrar;

        }

    }

    public function noty()
    {
        return $this->hasMany('App\Notifications','destination','id')->orderBy('id_notification','desc');

    }

    public function getCustomAttribute()
    {
        // return;;
    }

    public function ability(){
        return $this->hasMany('App\User_Abilities','id_user','id');
    }


    //Chats

    public function friendsofmine()
    {
        return $this->belongsToMany('App\User','contactos','id_usuario','id_contacto');
    }
    public function friendsof()
    {
        return $this->belongsToMany('App\User','contactos','id_contacto','id_usuario');
    }
    public function friends()
    {
        return $this->friendsofmine->merge($this->friendsof);
    }

    public function contacto(){
        return  $this->hasMany('App\Chat','id_contacto','id')
                     ->select(DB::raw('max(id) as id'))->groupBy('id_usuario');
    }

    public function chat(){
  $ee = $this->hasMany('App\Contactos','id_usuario','id')
                    ->select('ch.id_usuario as id_u','ch.id as aa','ch.chat','nombres','apellidos','imagen','perfil','u.id','c.codigo_pais','ch.v','precio_hora','usuario','rol')
                    ->join('usuario as u','u.id','=','id_contacto')
                    ->LeftJoin('countries as c','c.id_country','=','u.pais')
                    ->LeftJoin('chat as ch',function($join){
                        $join->whereIn('ch.id_usuario',[DB::raw('u.id'),Auth::user()->id])
                        ->whereIn('ch.id_contacto',[DB::raw('u.id'),Auth::user()->id])
                        ->whereIn('ch.v',[2,3])
                        ->orderBy('desc');
                    })
                    ->distinct();   
                    // ->get();
                    // print_r($ee);exit;
                    return $ee;
    }











}
