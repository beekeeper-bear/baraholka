<?php require_once "config_class.php";

class DataBase
{

    private static $db = null;
    private $cofig;
    private $mysqli;

    public static function getDB()
    {

        if (self::$db == null) self::$db = new DataBase(); // проверяем был ли создан обект если нет то новая база данных
        return self::$db;

    }

    private function __construct()
    {

        $this->config = new Config();

        $this->mysqli = new mysqli($this->config->db_host, $this->config->db_user, $this->config->db_password, $this->config->db_name);

        $this->mysqli->query("SET NAMES 'utf8'");  // запрос для кодировки
    }

    private function getQuery($query, $params)
    {
        // $arg=false;
        /*echo $query;
        print_r ($params);
        exit;*/

        if ($params) {

            for ($i = 0; $i < count($params); $i++) {

                // $pos=30;
                $pos = strpos($query, $this->config->sum_query);
                // $pos = strlen($this->config->sum_query);
                //echo '<br/>'.$query.'<br/>';
                //echo '<br/>'.$pos.'<br/>';
                $arg = "'" . $this->mysqli->real_escape_string($params[$i]) . "'";   //функция безопасности данных


                //echo '<br/>'.$pos.'<br/>';
                //echo '<br/>'.$arg.'<br/>';
                //echo '<br/>'.$query.'<br/>';


                $query = substr_replace($query, $arg, $pos, strlen($this->config->sum_query));

            }
            /* echo '<br/>'.$query.'<br/>';
            exit;
              */
        }
        // $_SESSION ['query3']=$query;
        //echo '<br/>'.$query.'<br/>';
        return $query;

    }

    public function select($query, $params = false)
    {
        // echo $query;

        $result_set = $this->mysqli->query($this->getQuery($query, $params));
        //echo $query;
        if (!$result_set) return false;
        // print_r ($result_set);
        return $this->resultSetToArray($result_set);
    }

    public function selectRow($query, $params = false)
    {  //вытаскиваем одну строку

        // print_r ($query);
        // print_r ($params);
        $result_set = $this->mysqli->query($this->getQuery($query, $params));

        // echo $result_set.'0';

        // foreach ($result_set as $result){
        //print_r ($result);
        //  }

        // echo  $result_set.'0';

        if ($result_set->num_rows == 1)


            return $result_set->fetch_assoc();


    }

    public function query($query, $params = false)
    {
        //$_SESSION ['query2']=$query;
        $success = $this->mysqli->query($this->getQuery($query, $params));
        if ($success) {

            if ($this->mysqli->insert_id === 0) return true;
            else return $this->mysqli->insert_id;

        } else return false;
    }


    public function selectCell($query, $params = false)
    {     // вытащить конкретную ячейку записи
        $result_set = $this->mysqli->query($this->getQuery($query, $params));
        if ((!$result_set) || ($result_set->num_rows != 1)) return false;

        else {
            $arr = array_values($result_set->fetch_assoc());
            return $arr [0];
        }


    }

    private function resultSetToArray($result_set)
    {

        $array = array();

        //  echo $result_set->fetch_assoc();

        while (($row = $result_set->fetch_assoc()) != false) {      // вытаскиваем несколько записей с таблицы

            $array [] = $row;
        }
        // print_r ($array);
        return $array;
    }

    public function __destruct()
    {
        if ($this->mysqli) $this->mysqli->close();

    }


}


?>