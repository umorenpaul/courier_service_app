<?php
/*
 * DB Class
 * This class is used for database related (connect, insert, update, and delete) operations
 */
class DB{
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "courier";

    public function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }

    /*
     * Returns rows from the database based on the conditions
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
    public function getRows($table,$conditions = array()){
        $sql = 'SELECT ';
        $sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
        $sql .= ' FROM '.$table;
        if(array_key_exists("where",$conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions['where'] as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }

        if(array_key_exists("order_by",$conditions)){
            $sql .= ' ORDER BY '.$conditions['order_by'];
        }

        if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
            $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];
        }elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
            $sql .= ' LIMIT '.$conditions['limit'];
        }

        $result = $this->db->query($sql);

        if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
            switch($conditions['return_type']){
                case 'count':
                    $data = $result->num_rows;
                    break;
                case 'single':
                    $data = $result->fetch_assoc();
                    break;
                default:
                    $data = '';
            }
        }else{
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
        }
        return !empty($data)?$data:false;
    }


     public function getRowsState($table,$conditions){
        $row=array();
        $sql = "SELECT * FROM $table WHERE country_id = $conditions";
        $result = $this->db->query($sql);

                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
                  return $data;
            }

        public function getData($query)
   {
       $result = $this->db->query($query);

       if ($result == false) {
           return false;
       }

       $rows = array();

       while ($row = $result->fetch_assoc()) {
           $rows[] = $row;
       }

       return $rows;
   }

           public function login($table,$email,$pw,$status){
        $row=array();
		
	
        $sql = "SELECT * FROM $table WHERE email ='$email' AND password='$pw' AND status='$status'";
        $result = $this->db->query($sql);

          if($result){
                while($row = $result->fetch_assoc()){

                   return $data[] = $row;
                }

           }
           else{
           return false;

           }
           }
/*
*  fetching shipment method from the databse
*
**/
           public function getShipmentMethod($shipment_method_id){

        $sql = "SELECT * FROM shipment_method WHERE 	shipment_method_id ='$shipment_method_id' ";
        $result = $this->db->query($sql);

          if($result){
                while($row = $result->fetch_assoc()){

                   return $row['method'];
                }

           }
           else{
           return false;

           }
           }

           /*
           *  fetching Destination country
           *
           **/
                      public function getDestinationCountry($country_id){

                   $sql = "SELECT * FROM helper_country WHERE 	ID ='$country_id' ";
                   $result = $this->db->query($sql);

                     if($result){
                           while($row = $result->fetch_assoc()){

                              return $row['name'];
                           }

                      }
                      else{
                      return false;

                      }
                      }
    /*
     * Insert data into the database
     * @param string name of the table
     * @param array the data for inserting into the table
     */
    //public function insert($table,$data){
    //
    //    if(!empty($data) && is_array($data)){
    //        $columns = '';
    //        $values  = '';
    //        $i = 0;
    //        if(!array_key_exists('created',$data)){
    //            $data['created'] = date("Y-m-d H:i:s");
    //        }
    //        if(!array_key_exists('modified',$data)){
    //            $data['modified'] = date("Y-m-d H:i:s");
    //        }
    //        foreach($data as $key=>$val){
    //            $pre = ($i > 0)?', ':'';
    //            $columns .= $pre.$key;
    //            $values  .= $pre."'".$val."'";
    //                   $i++;
    //          }
    //        $query = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";
    //        $insert = $this->db->query($query);
    //
    //
    //        return $insert?$this->db->insert_id:false;
    //    }else{
    //        return false;
    //    }
    //}
    function insert($table, array $dataArray)
{

	$getColumnsKeys = array_keys($dataArray);
	$implodeColumnKeys = implode(",",$getColumnsKeys);

	$getValues = array_values($dataArray);
	$implodeValues = "'".implode("','",$getValues)."'";

	$qry = "insert into $table (".$implodeColumnKeys.") values (".$implodeValues.")";
	$insert = $this->db->query($qry );

	return $insert?$this->db->insert_id:false;

}

    /*
     * Update data into the database
     * @param string name of the table
     * @param array the data for updating into the table
     * @param array where condition on updating data
     */

 function update($table_name, $fields, $where_condition)
      {

           $query = '';
           $condition = '';
           foreach($fields as $key => $value)
           {
                $query .= $key . "='".$value."', ";
           }
           $query = substr($query, 0, -2);
           /*This code will convert array to string like this-
           input - array(
                'key1'     =>     'value1',
                'key2'     =>     'value2'
           )
           output = key1 = 'value1', key2 = 'value2'*/
           foreach($where_condition as $key => $value)
           {
                $condition .= $key . "='".$value."' AND ";
           }
           $condition = substr($condition, 0, -5);
           /*This code will convert array to string like this-
           input - array(
                'id'     =>     '5'
           )
           output = id = '5'*/
           $query = "UPDATE ".$table_name." SET ".$query." WHERE ".$condition."";
           $update = $this->db->query($query);
           {
                return true;
           }
      }

    /*
     * Delete data from the database
     * @param string name of the table
     * @param array where condition on deleting data
     */
    public function delete($table,$conditions){
        $whereSql = '';
        if(!empty($conditions)&& is_array($conditions)){
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $whereSql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $query = "DELETE FROM ".$table.$whereSql;
        $delete = $this->db->query($query);
        return $delete?true:false;
    }

    public function trackShipment($table,$id,$column){
 $row=array();
 $sql = "SELECT * FROM $table WHERE $column='$id'";
 $result = $this->db->query($sql);

   if($result){
         while($row = $result->fetch_assoc()){

            return $data[] = $row;
         }

    }
    else{
    return false;

    }
    }

    // AN EMAIL VALIDATION SCRIPT THAT RETURNS TRUE OR FALSE
function check_valid_email($email)
{
    // IF PHP 5.2 OR ABOVE, WE CAN USE THE FILTER
    // MAN PAGE: http://php.net/manual/en/intro.filter.php
    if (strnatcmp(phpversion(),'5.2') >= 0)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) return FALSE;
    }
    // IF LOWER-LEVEL PHP, WE CAN CONSTRUCT A REGULAR EXPRESSION
    else
    {
        $regex
        = '/'                       // START REGEX DELIMITER
        . '^'                       // START STRING
        . '[A-Z0-9_-]'              // AN EMAIL - SOME CHARACTER(S)
        . '[A-Z0-9._-]*'            // AN EMAIL - SOME CHARACTER(S) PERMITS DOT
        . '@'                       // A SINGLE AT-SIGN
        . '([A-Z0-9][A-Z0-9-]*\.)+' // A DOMAIN NAME PERMITS DOT, ENDS DOT
        . '[A-Z\.]'                 // A TOP-LEVEL DOMAIN PERMITS DOT
        . '{2,6}'                   // TLD LENGTH >= 2 AND =< 6
        . '$'                       // ENDOF STRING
        . '/'                       // ENDOF REGEX DELIMITER
        . 'i'                       // CASE INSENSITIVE
        ;
        if (!preg_match($regex, $email)) return FALSE;
    }

    // FILTER or PREG DOES NOT TEST IF THE DOMAIN OF THE EMAIL ADDRESS IS ROUTABLE
    $domain = explode('@', $email);
    if ( checkdnsrr($domain[1],"MX") || checkdnsrr($domain[1],"A") ) return TRUE;

    // EMAIL NOT ROUTABLE
    return FALSE;
}
}
