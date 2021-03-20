<?php
require_once "config_class.php";

class URL
{

    private $config;
    private $amp;

    public function __construct($amp = true)
    {

        $this->config = new Config();
        $this->amp = $amp;

    }

    public function getView()
    {

        //echo $_SERVER ['REQUEST_URI'];


        $view = $_SERVER ['REQUEST_URI'];
        //echo '<br/>'.$view.'<br/>';

        /// if ($view=='/velo5/') $view='';

        //$trans= array ('/Velo/'=>'');

        // $view = strtr ($view,$trans);
        //$viev= trim ($view);
        $view = substr($view, 1);


        //echo $view;


        if (($pos = strpos($view, '?')) !== false) {
            $view = substr($view, 0, $pos);
            //echo '</br>'.'*'.$view.'*' ;
        }

        //echo $view;
        //exit;
        return $view;

    }

    public function setAMP($amp)
    {

        $this->amp = $amp;
    }

    public function getThisURL()
    {

        $uri = substr($_SERVER["REQUEST_URI"], 1);
        return $this->config->address . $uri;
    }

    public function getid()
    {

        $view = $_SERVER ['REQUEST_URI'];
        $view = substr($view, 7);
        /*if (($pos = strpos($view,'section?id=')) !==false) {
            $view = substr($view,11,1);
            //echo '</br>'.'*'.$view.'*' ;
        }*/
        //$view = str_getcsv($view,'=');
        //$view = parse_str($view);
        //$view = str_split($view);

        $view = explode('=', $view);

        return $view;


    }

    private function deleteGET($url, $param)
    {
        $res = $url;
        if (($p = strpos($res, "?") !== false)) {
            $paramstr = substr($res, $p + 1);
            $params = explode("&", $paramstr);
            $paramsarr = array();
            foreach ($params as $value) {
                $tmp = explode("=", $value);
                $paramsarr[$tmp[0]] = $tmp[1];
            }
            if (array_key_exists($param, $paramsarr)) {

                unset ($paramsarr[$param]);
                $res = substr($res, 0, $p + 1);
                foreach ($paramsarr as $key => $value) {
                    $str = $key;
                    if ($value !== "") {
                        $str .= "$str=$value";
                    }
                    $res .= "$str&";
                }
                $res = substr($res, 0, -1);
            }
        }
        return $res;

    }


    public function index()
    {

        return $this->returnURL('');

    }

    public function notfound()
    {

        return $this->returnURL('notFound');

    }

    public function cart()
    {

        return $this->returnURL('cart');
    }

    public function link_order()
    {

        return $this->returnURL('order');
    }

    public function message()
    {

        return $this->returnURL('message');
    }

    public function action()
    {

        return $this->returnURL('function.php');

    }

    public function delivery()
    {
        return $this->returnURL('delivery');
    }

    public function contacts()
    {
        return $this->returnURL('contacts');
    }

    public function search()
    {
        return $this->returnURL('search');
    }

    public function section($id)
    {
        //echo $id;
        return $this->returnURL('section?id=' . $id);
    }

    public function product($id)
    {
        return $this->returnURL('product?id=' . $id);
    }


    public function addCart($id)
    {
        return $this->returnURL('function.php?func=add_cart&id=' . $id);
    }

    public function delete_cart($id)
    {
        return $this->returnURL('function.php?func=delete_cart&id=' . $id);
    }

    private function returnUrl($url, $index = false)
    {


        if (!$index) $index = $this->config->address;
        if ($url == '') return $index;
        if (strpos($url, $index) !== 0) $url = $index . $url;

        if ($this->amp) $url = str_replace("&", "&amp;", $url);
        return $url;
    }


}


?>