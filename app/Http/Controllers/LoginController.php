<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

/**
 * Description of login_controller
 *
 * @author victor
 */

class LoginController extends Controller
{
   
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    
    function sendCv(Request $request)
	{
        $error = 0;
        $msjError="";
        $success=true;
       
        $nombres = trim($request->input('firstname'));
        $apellidos = trim($request->input('lastname'));
        $direccion = trim($request->input('address'));
        $tel1 = trim($request->input('phone1'));
        $tel2 = trim($request->input('phone2'));
        $email = trim($request->input('email'));
        $curp = strtoupper(trim($request->input('curp')));
        $puesto = trim($request->input('vacante'));
        $idPuesto = trim($request->input('idPuesto'));
        
         
        if (preg_match("/^[A-Z]{4}[0-9]{6}H|M[A-Z]{5}[0-9]{2}$/i",$curp))
        {
            $error=0;
        }
        else
        {
            $error=6;
        }
          
        
        if ($nombres=="" || $apellidos=="" || $direccion=="" || $tel1=="" || $tel2=="" || $email=="" || $puesto=="" || sizeof($_FILES) == 0)
        {
            $error=5;
        }
        
        
	else if (sizeof($_FILES) == 0)
		{
		$error = 4;
		}
                
        else if ($_FILES['cv']['name'] == "")
		{
		$error = 3;
		}  
	else if ($_FILES['cv']['size'] <= 0)
	        {
		$error = 1;
		}

	else if (!(strpos($_FILES['cv']['type'], "pdf")))
		{
		$error = 2;
		}
			
		
	
                switch ($error)
                {
                    case 1:
                       $msjError="El tamaño del archivo supera los 2MB";
                    break;
                    case 2:
                       $msjError="El tipo de archivo debe ser PDF";
                    break;
                    case 3:
                       $msjError="No se ha seleccionado ningún archivo";
                    break;
                    case 4:
                       $msjError="No se ha podido cargar el archivo";
                    break;
                   case 5:
                       $msjError="Todos los campos son obligatorios";
                    break;
                    case 6:
                        $msjError="El CURP ingresado no es válido";
                    break;
                }
                
                if ($error>0)
                {
                    $success=false;
                }
              
                else 
                {
                    
                    
                    //$results = DB::select('select curp from candidatos where curp = ?', array($curp));
                    $user = DB::table('candidatos')->where('curp', $curp)->first();
                    //var_dump($user);
                    (int)$numrows=sizeof($user);
                    if ($numrows>0)
                    {
                        $msjError="Ya se ha registrado con anterioridad";
                        $success=false;
                    }
                    else
                    {
                 
                    $target_path = "uploads/";
                    $target_path = $target_path . basename( $_FILES['cv']['name']); 
                    if(move_uploaded_file($_FILES['cv']['tmp_name'], $target_path)) 
                    {
                         DB::insert('insert into candidatos (id_vacante,nombre,apellidos,direccion,telefono_local,celular,email,curp,ruta_cv) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', array($idPuesto,$nombres, $apellidos,$direccion,$tel1,$tel2,$email,$curp,$_FILES['cv']['name']));
                        
                    } else{
                        $msjError = "Ha ocurrido un error al copiar el archivo, intento de nuevo!";
                        $success=false;
                        
                    }
                    }
                    
                    
                   
                }
              
                    $jsonModel = array(
                        'mensaje' => $msjError,
                        'success' => $success
                    );
               
      
            return Response::json($jsonModel);
           //return $jsonModel;
                
                
	
	}


    
     function logout(Request $request)
     {
         $request->session()->forget("user");
         $request->session()->forget("mail");
         $request->session()->forget("tiempo");
          return redirect('/');
     }
    
    function login(Request $request)
    {
      
        $username = $request->input('username');
        $password = $request->input('password');
        
        
        $ldap_dn_usuarios = "CN=Users,DC=vsys,DC=com";
        $ldap_dn_roles    = "OU=SGC,DC=vsys,DC=com";
        $dn               = 'sAMAccountName=' . $username . ',OU=SGC,DC=vsys,DC=com';
        $msg              = "";
        $msgError         = 0;
        //		print_r($username);
        
        if ($username == "" || $password == "") {
            $msgError = 1;
        }
        
        
        else
        {
        $pos    = strstr($username, "@");
        $unmail = "";
        if ($pos === false) {
            $username = $username . "@vsys.com";
        }
        
      
        $unmail = explode("@", $username);
        
          $usuario = $unmail[0];
        
        $domext  = $unmail[1];
       
        $username = $unmail[0];
        
        if ($domext != "") {
            
            if ($domext != "vsys.com") {
                $msgError = 4;
            }
        }
        
        
        //conexión a ldap
        $ldapconn = ldap_connect("10.1.17.54");
        
        //Si hay conexión
        if ($ldapconn) {
            
            // realizando la autenticación al servidor ldap
           
                $ldapbind = @ldap_bind($ldapconn, $username . '@vsys.com', $password);
                
           
            if ($ldapbind) {
                
                $filter  = "(sAMAccountName=" . $username . ")";
                $attr    = array(
                    "displayname",
                    "userPrincipalName",
                    "sAMAccountname",
                    "memberof"
                );
                $result  = ldap_search($ldapconn, $ldap_dn_usuarios, $filter, $attr);
                $entries = ldap_get_entries($ldapconn, $result);
                
                if ($entries["count"] > 0) {
                    
                    // var_dump($entries );exit;
                    
                    for ($i = 0; $i < $entries["count"]; $i++) {
                        // Store d in session
                   
                        $request->session()->set('user', $entries[$i]["displayname"][0]);
                        $request->session()->set('mail', $entries[$i]["userprincipalname"][0]);
                        $request->session()->set('tiempo', time());
                       
                    }
                    
                 
                    //obtener todas las variables de sesión
                    //$data = $request->session()->all();

                  
 
                    //redireccion a dashboard
                    $jsonModel = array(
                        'url' => 'dashboard',
                        'success' => true
                    );
                    
                } else { //if count $entries            	 
                    //el usuario o la contraseña son incorrectos
                    $msgError = 2;
                }
                
            } else { //if $ldapbind
                //No se ha podido iniciar la sesión
                $msgError = 2;
            }
            
           
        } else { //if $ldapconn conexión
            //No se pudo conectar con el servidor
            $msgError = 3;
        }
        }
        if ($msgError>0)
        {
        switch ($msgError) {
            
            case 1:
                $msg = "Usuario y contraseña son campos obligatorios.";
                break;
            
            case 2:
                $msg = "Usuario o contraseña incorrectos";
                break;
            
            case 3:
                $msg = "No se pudo conectar al servidor de autenticación.";
            case 4:
                $msg = "El correo no es una dirección válida.";
                break;
                
        }
        
        //regresa el valor del error
       
             $jsonModel = array(
                        'mensaje' => $msg,
                        'success' => false
                    );
        }    

           return $jsonModel;
            
        
     
    }
}
