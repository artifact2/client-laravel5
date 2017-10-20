<?php



namespace Artifact2\Client;



class Client
{

    public function __construct()
    {

    }


    /**
     * Connect with the Service Bus
     *
     * @param $service
     * @param $class
     * @param $method
     * @param $args
     * @return mixed
     */
    public static function requestMethod( $service, $class, $method , $args , $token = null ){


        $esb_ip = env('ESB_URI');

        $data = array( "token"   => $token,
            "service" => $service,
            "class"   => $class,
            "method"  => $method ,
            "args"    => $args );

        $data_string = json_encode($data);

        $ch = curl_init($esb_ip);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            $result =  curl_error($ch);
        }

        curl_close($ch);

        return json_decode($result);
    }

}
