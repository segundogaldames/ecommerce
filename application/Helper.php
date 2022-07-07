<?php
use models\Permiso;
use models\Modulo;
use models\Rol;

class Helper
{
    public static function getRolAdmin()
    {
        if (Session::get('usuario_rol') == 'Administrador') {
            return true;
        }

        return false;
    }

    public static function getRolAdminSuper()
    {
        if (Session::get('usuario_rol') == 'Administrador' || Session::get('usuario_rol') == 'Supervisor') {
            return true;
        }

        return false;
    }

    public static function getIniciales($nombre)
    {
        if ($nombre) {
            $name = '';
            $explode = explode(' ', $nombre);
            foreach ($explode as $ex) {
                $name .= $ex[0];
            }

            return $name;
        }
    }

    public static function friendlyRoute($value)
        {
        $ruta = strtolower(Helper::clearCadena($value));
        $ruta = str_replace(' ','-', $ruta);

        return $ruta;
    }

    public static function clearCadena($cadena)
    {
        //Reemplazamos la A y a
        $cadena = str_replace(
        array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
        array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
        $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
        array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
        array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
        $cadena );

        //Reemplazamos la I y i
        $cadena = str_replace(
        array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
        array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
        $cadena );

        //Reemplazamos la O y o
        $cadena = str_replace(
        array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
        array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
        $cadena );

        //Reemplazamos la U y u
        $cadena = str_replace(
        array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
        array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
        $cadena );

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
        array('Ñ', 'ñ', 'Ç', 'ç',',','.',';',':'),
        array('N', 'n', 'C', 'c','','','',''),
        $cadena
        );
        return $cadena;
    }

    public static function getPermisos($data){
        //print_r($data);exit;
        if ($data) {
            $modulo = Modulo::select('id')->where('titulo', $data)->first();
            $rol = Rol::select('id')->where('nombre', Session::get('usuario_rol'))->first();
            # code...
            //print_r($rol->id);exit;
            $permisos = Permiso::select('id','leer','escribir','actualizar','eliminar')
                ->where('modulo_id', $modulo->id)
                ->where('rol_id', $rol->id)
                ->first();

                #print_r($permisos);exit;
            if ($permisos) {
                return $permisos;
            }
        }
        Session::set('msg_error','Acceso prohibido');
        header('Location: ' . BASE_URL);

    }


    public static function sendEmail($data,$template)
    {
        $asunto = $data['asunto'];
        $emailDestino = $data['email'];
        $empresa = 'NOMBRE_REMITENTE';
        $remitente = 'EMAIL_REMITENTE';
        //ENVIO DE CORREO
        $de = "MIME-Version: 1.0\r\n";
        $de .= "Content-type: text/html; charset=UTF-8\r\n";
        $de .= "From: {$empresa} <{$remitente}>\r\n";
        ob_start();
        require_once("views/Template/Email/".$template.".php");
        $mensaje = ob_get_clean();
        $send = mail($emailDestino, $asunto, $mensaje, $de);
        return $send;
    }

    public static function strClean($string)
    {
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $string);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace("<script>
            ","
            ",$string);
            $string = str_ireplace("
        </script>","",$string);
        $string = str_ireplace("<script src>
        ","
        ",$string);
        $string = str_ireplace("<script type=>", "", $string);
        $string = str_ireplace("SELECT * FROM", "", $string);
        $string = str_ireplace("DELETE FROM", "", $string);
        $string = str_ireplace("INSERT INTO", "", $string);
        $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
        $string = str_ireplace("DROP TABLE", "", $string);
        $string = str_ireplace("OR '1'='1", "", $string);
        $string = str_ireplace('OR "1"="1"', "", $string);
        $string = str_ireplace('OR ´1´=´1´', "", $string);
        $string = str_ireplace("is NULL; --", "", $string);
        $string = str_ireplace("is NULL; --", "", $string);
        $string = str_ireplace("LIKE '", "", $string);
        $string = str_ireplace('LIKE "', "", $string);
        $string = str_ireplace("LIKE ´", "", $string);
        $string = str_ireplace("OR 'a'='a", "", $string);
        $string = str_ireplace('OR "a"="a', "", $string);
        $string = str_ireplace("OR ´a´=´a", "", $string);
        $string = str_ireplace("OR ´a´=´a", "", $string);
        $string = str_ireplace("--", "", $string);
        $string = str_ireplace("^", "", $string);
        $string = str_ireplace("[", "", $string);
        $string = str_ireplace("]", "", $string);
        $string = str_ireplace("==", "", $string);

        return $string;
    }

    public static function passGenerator($length = 10)
    {
        $pass = "";
        $longitudPass=$length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890$/.*";
        $longitudCadena=strlen($cadena);

        for($i=1; $i<=$longitudPass; $i++) {
            $pos=rand(0,$longitudCadena-1);
            $pass .=substr($cadena,$pos,1);
        }
        return $pass;
    }

    public static function token()
    {
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        return $token;
    }

    public static function encriptar($clave)
    {
        $clave = Hash::getHash('sha1', $clave, HASH_KEY);

        return $clave;
    }
}
