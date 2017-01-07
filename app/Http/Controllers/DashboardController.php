<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;


/**
 * Description of login_controller
 *
 * @author victor
 */

class DashboardController extends Controller
{
   
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    
    function index(Request $request)
    {
       if  ($request->session()->get('user')=="")
       {
          return redirect('/');
       }
       $value = $request->session()->get('user');
       $results = DB::select('select v.puesto, c.nombre, c.apellidos, c.email,c.id_status, c.id_tag,c.curp,c.ruta_cv from candidatos as c inner join vacantes as v on v.id_vacante = c.id_vacante');
       $data['usuario']=$value;
       $data['tabla']=$results;
;
       return View::make('dashboard')->with('data', $data);   
    }
    
    function savePosition(Request $request)
    {
     $error = 0;
        $msjError="";
        $success=true;
        
        $puesto = trim($request->input('position'));
        $tipoPuesto = trim($request->input('positionKind'));
        $escolaridad = trim($request->input('school'));
        $habilidades = trim($request->input('skills'));
        $sueldo = trim($request->input('salary'));
        $hentrada=$request->input('hentrada');
        $hsalida=$request->input('hsalida');
        $horario = $request->input('hentrada')." a ".$request->input('hsalida');
        $descripcion = trim($request->input('description'));
       

        
        if ($puesto=="" || $tipoPuesto=="" || $escolaridad=="" || $habilidades=="" || $sueldo=="" || $hentrada=="" || $hsalida=="" || $descripcion=="")
        {
            $error=5;
        }
        
   
                switch ($error)
                {
                    
                   case 5:
                       $msjError="Todos los campos son obligatorios";
                    break;
                }
                
                if ($error>0)
                {
                    $success=false;
                }
              
                else 
                {
                    DB::insert('insert into vacantes (puesto,escolaridad,experiencia,sueldo,horario,descripcion,tipo_vacante) values ( ?, ?, ?, ?, ?, ?, ?)', array($puesto,$escolaridad, $habilidades,$sueldo,$horario,$descripcion,$tipoPuesto));
                }
              
                    $jsonModel = array(
                        'mensaje' => $msjError,
                        'success' => $success
                    );
               
      
            return Response::json($jsonModel);
    }
    
}
