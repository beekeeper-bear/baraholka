<?php
require_once 'config_class.php';

class Check
{

    private $config;


    public function __construct($amp = true)
    {

        $this->config = new Config();

    }

    public function id($id, $zero = false)
    {

        if (!$this->intNumber($id)) return false;
        if ((!$zero) && ($id === 0)) return false;
        return $id >= 0;

    }

    public function oneOrZero($number)
    {

        //	$_SESSION ['number']= $number;

        if (!$this->intNumber($number)) return false;
        return (($number == 0) || ($number == 1) || ($number == 2));

    }

    public function ids($ids)
    {
        //	$_SESSION ['ids']= $ids;
        $reg = "/^\d+(,\d+)*\d?$/i";
        return preg_match($reg, $ids);

    }

    public function amount($amount)
    {
        if (!$this->doubleNumber($amount)) return false;
        return $amount >= 0;
    }

    public function names($names)
    {

        //$_SESSION ['namess']= $names;
        if ($this->isContainQuotes($names)) return false;
        return $this->isString($names, 3, $this->config->max_name);
    }

    public function title($title)
    {
        return $this->isstring($title, 1, $this->config->max_title);


    }

    public function email($email)
    {
        if ($this->isContainQuotes($email)) return false;
        $reg = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9_]*@([a-z0-9]+[a-z0-9]*[a-z0-9]*\.)+[a-z]+$/i";
        return preg_match($reg, $email);

    }

    public function text($text, $empty = false)
    {
        if ($this->isContainQuotes($text)) return false;
        if (($empty) && ($text == "")) return true;

        return $this->isString($text, 1, $this->config->max_text);
    }

    public function ts($ts)
    {

        return $this->noNegativeInteger($ts);
    }


    public function count($count)
    {

        return $this->noNegativeInteger($count);

    }

    public function offset($offset)
    {

        return $this->intaNumber($offset);
    }

    private function noNegativeInteger($number)
    {

        if (!$this->intNumber($number)) return false;
        return ($number >= 0);


    }


    private function intNumber($number)
    {

        if (!is_int($number) && (!is_string($number))) return false;
        return preg_match("/^-?(([1-9][0-9]*)|(0))$/", $number);


    }

    private function isContainQuotes($string)
    {
        $array = array('"', "'", "`", '&quot&', '&apos&');
        //$_SESSION ['quotes'] = '';
        //$_SESSION ['quotes'].= $key.'=>'.$value.'    ';
        foreach ($array as $key => $value) {
            if (strpos($string, $value) !== false) return true;


        }
        return false;

    }

    private function isString($string, $min_length, $max_length)
    {
        if (!is_string($string)) return false;
        if (strlen($string) < $min_length) return false;
        if (strlen($string) > $max_length) return false;
        return true;

    }

    private function doubleNumber($number)
    {
        return is_numeric($number);
    }

}

?>