<?php

    class Utilities{

        public $response;
    
        public function getPaging($page, $total_rows, $records_per_page, $page_url){
    
            // paging array
            $paging_arr=array();
    
            // button for first page
            $paging_arr["first"] = $page>1 ? "{$page_url}page=1" : "";
    
            // count all client in the database to calculate total pages
            $total_pages = ceil($total_rows / $records_per_page);
    
            // range of links to show
            $range = 2;
    
            // display links to 'range of pages' around 'current page'
            $initial_num = $page - $range;
            $condition_limit_num = ($page + $range)  + 1;
    
            $paging_arr['pages']=array();
            $page_count=0;
            
            for($x=$initial_num; $x<$condition_limit_num; $x++){
                // be sure '$x is greater than 0' AND 'less than or equal to the $total_pages'
                if(($x > 0) && ($x <= $total_pages)){
                    $paging_arr['pages'][$page_count]["page"]=$x;
                    $paging_arr['pages'][$page_count]["url"]="{$page_url}page={$x}";
                    $paging_arr['pages'][$page_count]["current_page"] = $x==$page ? "yes" : "no";
    
                    $page_count++;
                }
            }
    
            // button for last page
            $paging_arr["last"] = $page<$total_pages ? "{$page_url}page={$total_pages}" : "";
    
            // json format
            return $paging_arr;
        }

        // API Call function
        function APIRequest($method, $data){
            
            // Curl Initialization
            $curl = curl_init();
            
            // Methods
            switch ($method) {
                
                case "GET":
                    $url = "http://web/clients/read.php"; 
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_HTTPGET, true);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    ob_start();
                    $response_json = curl_exec($curl);
                    ob_end_clean();
                    $this->response = json_decode($response_json, true);
                    break;

                case "POST":
                    $url = "http://web/clients/create.php";
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    ob_start();
                    $response_json = curl_exec($curl);
                    ob_end_clean();
                    $this->response = json_decode($response_json, JSON_PRETTY_PRINT, true);
                    break;

                case "DELETE":
                    $url = "http://web/clients/delete.php";
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'DELETE');
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    ob_start();
                    $response_json = curl_exec($curl); 
                    ob_end_clean();
                    $this->response=json_decode($response_json,true);
                    break;

                case "UPDATE":
                    $url = "http://web/clients/update.php";
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'UPDATE');
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    ob_start();
                    $response_json = curl_exec($curl); 
                    ob_end_clean();
                    $this->response=json_decode($response_json,true);
                    break;
                
                default:
                    header("Location: ../web/error_connection.php");


            }

            curl_close($curl);

            if(!$this->response) { return false; }

            return true;

         }

        public function redirect($url, $permanent = false){
            header('Location: ' . $url, true, $permanent ? 301 : 302);
            exit();
        }
    
    }
?>