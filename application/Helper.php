<?php

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
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890$.*";
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

}
