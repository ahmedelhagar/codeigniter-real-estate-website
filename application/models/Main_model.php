<?php
class Main_model extends CI_Model{
        function insertData($table,$data){
        $this->db->insert($table,$data);
    }
        function getByData($table,$con_col,$con){
        $q=$this->db->get_where($table,array($con_col=>$con));
        if($q->num_rows() > 0){
            
            return $q->result();
            
        }else{return false;}
    }
    function getAllData($table='items',$col='',$order='',$xyz='',$iaa='',$limit='', $start='',$xyz2='',$iaa2=''){
        /*
        How to use?
        getAllData(columnOrder,orderBy,firstConition,firstConitionValue,limit,start,secondConition,secondConitionValue);
        Don`t forget to change the table or make it dynamic.
        Ahmed Elhagar 20/7/2019.
        */
        $this->db->from($table);
        $this->db->limit($limit, $start);
        if($xyz !== '' OR $iaa !== ''){
        $this->db->where($xyz,$iaa);
        }
        if($xyz2 !== '' OR $iaa2 !== ''){
        $this->db->where($xyz2,$iaa2);
        }
        $this->db->order_by($col,$order);
        $q = $this->db->get(); 
        
        if($q->num_rows() > 0){
            
            return $q->result();
            
        }else{return false;}
    }
    function getByDataw($table,$con_col,$count=''){
        $q=$this->db->get_where($table,$con_col);
        if($q->num_rows() > 0){
            if($count==''){
                return $q->result();
            }else{
                return $q->num_rows();
            }
        }else{return false;}
    }
    function update($table,$con,$id,$data){
        $this->db->where($con,$id);
        $this->db->update($table,$data);
        return TRUE;
    }
    function deleteData($table,$col,$value){
        $this->db->where($col,$value);
        $this->db->delete($table);
    }
    function p_link($state=0,$id=1){
        if($state == 0){
            return base_url().'page/'.$id;
        }elseif($state == 1){
            return base_url().'hayatadmin/edit/'.$id;
        }elseif($state == 2){
            $record = $this->getByData('items','id',$id);
            $row = (array) $record[0];
            return $row['content'];
        }
    }
    function dateTime($kind='date' ,$fullTime1 ='',$fullTime2 =''){
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Africa/Cairo'));
        $dateNow = (array) $now;
        $dateTime = explode(' ',$dateNow['date']);
        if($kind=='date'){
            return $dateTime[0];
        }elseif($kind == 'current'){
                $full = explode('.',$dateNow['date']);
                return $full[0];
            }elseif($kind == 'diff'){
            // Declare and define two dates 
            $currentDTime = explode('.',$dateNow['date']);
            $date1 = strtotime($fullTime1);  
            $date2 = strtotime($fullTime2); 
            // Formulate the Difference between two dates 
            $diff = abs($date2 - $date1);  
            // To get the minutes, subtract it with years, 
            // To get the year divide the resultant date into 
            // total seconds in a year (365*60*60*24) 
            $years = floor($diff / (365*60*60*24));  


            // To get the month, subtract it with years and 
            // divide the resultant date into 
            // total seconds in a month (30*60*60*24) 
            $months = floor(($diff - $years * 365*60*60*24) 
                                           / (30*60*60*24));  


            // To get the day, subtract it with years and  
            // months and divide the resultant date into 
            // total seconds in a days (60*60*24) 
            $days = floor(($diff - $years * 365*60*60*24 -  
                         $months*30*60*60*24)/ (60*60*24)); 


            // To get the hour, subtract it with years,  
            // months & seconds and divide the resultant 
            // date into total seconds in a hours (60*60) 
            $hours = floor(($diff - $years * 365*60*60*24  
                   - $months*30*60*60*24 - $days*60*60*24) 
                                               / (60*60));  


            // To get the minutes, subtract it with years, 
            // months, seconds and hours and divide the  
            // resultant date into total seconds i.e. 60 
            $minutes = floor(($diff - $years * 365*60*60*24  
                     - $months*30*60*60*24 - $days*60*60*24  
                                      - $hours*60*60)/ 60);  
            // months, seconds, hours and minutes  
            $seconds = floor(($diff - $years * 365*60*60*24  
                     - $months*30*60*60*24 - $days*60*60*24 
                        - $hours*60*60 - $minutes*60));  
            // Print the result 
                $diffrentiation = array(
                    'years' => $years,
                    'months' => $months,
                    'days' => $days,
                    'hours' => $hours,
                    'minutes' => $minutes,
                    'seconds' => $seconds
                );
                return $diffrentiation;
            }else{
            $timer = explode(':',$dateTime[1]);
            if($timer[0] > 12){
                $hours =$timer[0]-12;
            }else{
                $hours = $timer[0];
            }
            return $hours.':'.$timer[1];
        }
    }
    function random_number($maxlength = 30) {
        $chary = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
                        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
                        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $return_str = "";
        for ( $x=0; $x<=$maxlength; $x++ ) {
            $return_str .= $chary[rand(0, count($chary)-1)];
        }
        return $return_str;
    }
        public function is_logged_in($accessUser = '')
  {
            if($accessUser == ''){
    $username = $this->session->userdata('username');
    $password = $this->session->userdata('password');
    $records = $this->getByData('admins','username',$username);
        if($records == TRUE){
        foreach ($records as $row){
            $password_f = $row->password;
            $username_f = $row->username;
            if($password == $password_f and $username == $username_f){
                //Logged In
                return 1;
            } else {
                return 0;
            }
        }
        }else {
                return 0;
            }
        }elseif($accessUser == 1){
                //Access User Data
                $username = $this->session->userdata('username');
                $records = $this->getByData('admins','username',$username);
                return $records;
            }else{
                //Access User Data
                $records = $this->getByData('users','username',$accessUser);
                if($records == TRUE){
                return $records;
                }else{
                    return 0;
                }
            }
  }
        function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
    }
    function state($state){
        $s_arr = array(
            '0' => 'صفحة عادية',
            '1' => 'قائمة منسدلة',
            '2' => 'صفحة رابط',
            '3' => 'Certificate',
            '4' => 'Client',
            '5' => 'Slide',
            '6' => 'Footer Link',
            '7' => 'Project',
            '8' => 'Project Image',
            '9' => 'News',
            '10' => 'Career',
            '11' => 'Supplies',
            '12' => 'Chart',
            '13' => 'job application',
            '14' => 'supp application',
            '15' => 'Enq',
            '16' => 'Categories'
        );
        return $s_arr[$state];
    }
    function insertVisit($data){
        $this->db->insert('visits',$data);
    }
    function item_search($search_item){

                 $this->db->like('title', $search_item);
                 $query = $this->db->get_where('items',array('state'=>9));
                 return $query->result();
  }
}

?>