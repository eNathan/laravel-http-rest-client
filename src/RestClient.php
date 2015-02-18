<?php namespace App\Providers;
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2/15/15
 * Time: 11:37 PM
 */

class RestClient {

    private $_response;
    private $_responseCode;

    private function _call($method, $url, $data = array(), $headers = array()){
        $curl = curl_init();

        // Perform some logic based on the request type
        switch($method){
            case "get":
                $url = $url . "?" . http_build_query($data);
                break;
            case "post":
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "delete":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "delete");
                break;
            case "put":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "put");
                break;
        }

        // If headers are provided, add them in
        if(empty($headers)){
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
        ));

        $_response = curl_exec($curl);
        $_responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        return $_response;
    }

    /**
     * Public function for GET method
     * @param $url
     * @param array $data
     */
    public function get($url, $data = array(), $headers = array()){
        return $this->_call('get', $url, $data);
    }

    /**
     * Public function for POST method
     * @param $url
     * @param array $data
     */
    public function post($url, $data = array(), $headers = array()){
        return $this->_call('post', $url, $data);
    }

    /**
     * Public function for DELETE method
     * @param $url
     * @param array $data
     */
    public function delete($url, $data = array(), $headers = array()){
        return $this->_call('delete', $url, $data);
    }


    /**
     * Public function for PUT method
     * @param $url
     * @param array $data
     */
    public function put($url, $data = array(), $headers = array()){
        return $this->_call('put', $url, $data);
    }

    /**
     * Public method to retrieve response code
     * @return mixed
     */
    function responseCode(){
        return $this->_responseCode;
    }
}
