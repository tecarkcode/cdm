<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\ServerProvider;

if(!function_exists('getAppropriateProfile'))
{
    function getAppropriateProfile($user)
    {
        dd("HELPERS: Agora funfou");
        $profile = "user.dashboard";
        if(is_null($user) || !is_a($user, Collection::class))
        {
            dd("Não é uma coleção.");
            return false;
        }

        return true;
    }
}

if(!function_exists('doCheckCPF'))
{
    function doCheckCPF($cpf) {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf);
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;    
    }
}

if(!function_exists('doRemoveSpecialCharacters'))
{
    function doRemoveSpecialCharacters($str, $keepLetters = true, $keepNumbers = true, $subs = false)
    {
        $str = str_replace(' ', '', $str);
        $str = str_replace('-', '', $str);
        $str = preg_replace('/[^'.($keepLetters ? 'A-Za-z' : '') . ($keepNumbers ? '0-9' : '').'-]/', ($subs ? $subs : ''), $str);
        return $str;
    }
}

if(!function_exists('setToJustNumber'))
{
    function setToJustNumber($value)
    {
        $value = doRemoveSpecialCharacters($value);
        return number_format((int) $value, 0, "", "");
    }
}

if(!function_exists('doConvertSerieToGroupId'))
{
    function doConvertSerieToGroupId($serie)
    {
        if($serie <= 3)
        {
            $group = 1;
        }
        else if($serie > 3 && $serie <= 5)
        {
            $group = 2;
        }
        else if($serie > 5 && $serie <= 7)
        {
            $group = 3;
        }
        else if($serie > 8)
        {
            $group = 4;
        }
        return $group;
    }
}

if(!function_exists('getGender'))
{
    function getGender($var = null)
    {
        $return = 0;
        if(isset($var)) {
            if(is_numeric($var)){
                $return = DB::table('genders')->whereId($var)->where("status", 1)->get()[0];
            } else {
                $return = DB::table('genders')->whereName(strtolower($var))->where("status", 1)->get()[0];
            }
        } else {
            $return = DB::table('genders')->where("status", 1)->get();
        }        
        return $return;
    }
}

if(!function_exists('limString')){
    function limString($string = null, $flag = '_')
    {
        if (empty($string)) {
        }
        $array = array('!', '@', '#', '$', '%', '&', '*', '_', '-', '+', ' ', '|', '(', ')', '¨', '=', '/', '\\');
        foreach ($array as $key => $value) {
            $string = str_replace($value, $flag, $string);
        }
        return $string;
    }
}

if(!function_exists('encode')){
    function encode($string = null)
    {
        if (empty($string)) {
        }
        $flag = '_';
        $string = limString($string, $flag);

        $array = explode($flag, $string);

        foreach ($array as $key => &$value)
            $value = base64_encode($value);
        $string = base64_encode(implode($flag, $array));
        return str_replace("=", "", $string);
    }
}

if(!function_exists('decode')){
    function decode($string = null)
    {
        if (empty($string)) {
        }
        $flag = '_';
        $string = base64_decode($string);

        $array = explode($flag, $string);

        foreach ($array as $key => &$value)
            $value = base64_decode($value);

        $string = implode($flag, $array);
        return $string;
    }
}

if(!function_exists('Telegram')){
    function Telegram($message)
    {

        $message = '['.env('APP_URL').']'.PHP_EOL.PHP_EOL.$message;
        $data = [
            'chat_id' => env('TELEGRAM_GROUP'),
            'text' => $message,
        ];
        try {
            $response = file_get_contents("https://api.telegram.org/bot".env('TELEGRAM_TOKEN')."/sendMessage?" . http_build_query($data));
            if($response){
                return true;
            }
        } catch (\Throwable $th) {
            return false;
        }
        return false;
    }
}

if(!function_exists('currentPage')){
 
    function currentPage($param)
    {
        $caminho = request()->path();
        if (strpos($caminho, $param) !== false) {
            return true;
        } else {
            return false;
        }
    }
}

if(!function_exists('formatPhone')){
    function formatPhone($number)
    {
        return "(".substr($number,0,2).") ".substr($number,2,-4)."-".substr($number,-4);
    }
}

if(!function_exists('formatCnpjCpf')){
    function formatCnpjCpf($value)
    {
    $cnpj_cpf = preg_replace("/\D/", '', $value);
    
    if (strlen($cnpj_cpf) === 11) {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
    } 
    
    return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }
}
