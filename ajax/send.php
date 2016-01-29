<?php ob_start();session_start();

$method = $_POST;
if(isset($method['apimaster-type']))
{
    $send_class = new send;
    
   
    
    $send_class->_index(array('method'=>$method));
}
class send
{
    var $logs_sess = 'apimaster-cookie';
    function _read_logs()
    {
	if(!isset($_SESSION[$this->logs_sess])){exit("");}
	
	$str_array= explode("\r\n",trim($_SESSION[$this->logs_sess]));
	$final_array = array();
	for($x=0;$x<count($str_array);$x++)
	{
	    array_push($final_array,json_decode($str_array[$x],true));
	}
	
	foreach($final_array as $key=>$val)
	{
	    $arrange[] = strtotime($val['date']);
	}
	array_multisort($arrange,SORT_DESC,$final_array);
	
	$value ='<ul class="ul-logs">';
	for($x=0;$x<count($final_array);$x++)
	{
	   
	    $value.="<li><a href=''  data-hidden='".rawurlencode(stripcslashes(json_encode($final_array[$x])))."'>";
	    $count = 0;
	    $date = $final_array[$x]['date'];
	    
	    unset($final_array[$x]['date']);
	    $value.=$date;
	    
	    foreach($final_array[$x] as $key=>$val)
	    {
		
		$delimiter = "&nbsp|&nbsp";
		
		$value.=$delimiter.rawurldecode($key).':'.rawurldecode($val);
		$count++;
	    }
	    $value.="</a></li>";
	}
	$value.='</ul>';
	exit($value);
    }
    function _logs($method)
    {
	
	$sess_name = $this->logs_sess;
	foreach($method as $key=>$val){ $method[$key] = ($val);}
	
	
	//$date = date("Y-m-d H:i:s");
	//$method['date'] = $date;
	$json_str = stripcslashes(json_encode($method));
	
	if(isset($_SESSION[$sess_name]))
	{
	    $_SESSION[$sess_name] .= $json_str."\r\n";
	}
	else{
	    $_SESSION[$sess_name] = $json_str."\r\n";
	}
	
    }
    function _index($array_params)
    {
	
	
        $method = $array_params['method'];
	
	$type = $method['apimaster-type'];
	unset($method['apimaster-type']);
	switch($type)
	{
	    case "request":
		$this->_request($method);
	    break;
	    case "read-logs":
	        $this->_read_logs();
	    break;
	}
	
	
    }
    
    function _request($method)
    {
	//save logs
        $this->_logs($method);
       //end save logs
        
       $response =$this->_curl(array('method'=>$method));
        if($response=='')
        {
            $value = 'Connection timeout.';
        }
        else
        {
           $json_array = json_decode($response,true);
           $value='';
           if(count($json_array)>=1)
           {
                $value.='<pre>';
                $value.=json_encode($json_array,JSON_PRETTY_PRINT);
                $value.='</pre>';
           }
            else{
              
            $value ='<pre>'. htmlentities($response) . '</pre>';
            }
        }
        exit($value);
    }
    
    function _curl($array_params)
    {
        $method = $array_params['method'];
      
        foreach($method as $key=>$val)
        {
            $method[urldecode($key)] = urldecode($val); 
        }
        
        $send_type =  $method['send-type'];
       
        $url = $method['url'];
        $method_type = $method['method'];
        unset($method['url']);
        unset($method['method']);
        unset($method['send-type']);
       
        $field_array = $method;
        $field_str = '';
        $x=0;
        foreach($field_array as $key=>$val)
        {
            $and = '&';
            if($x==0){$and='';}
            
            $field_str.=$and.$key.'='.$val;
            $x++;
        }
        
        
      
        $value='';
		$get_str='';
		$curl = curl_init();
                if($method_type=='POST')
                {
                    $post = $field_str;
		    
		curl_setopt($curl,CURLOPT_POST,1);
                curl_setopt($curl,CURLOPT_POSTFIELDS,$post);
                }
                else{
                    $get_str=$field_str;
                }
		curl_setopt($curl,CURLOPT_URL,$url.$get_str);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl,CURLOPT_HEADER,0);
                
                
		curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,10);
		curl_setopt($curl,CURLOPT_TIMEOUT,10);
		
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($curl,CURLOPT_VERBOSE,true);
		$value = curl_exec($curl);
		$value.=curl_error($curl);
		curl_close($curl);
		//return curl_getinfo($curl);
		return $value;
    }
}

ob_end_flush();?>