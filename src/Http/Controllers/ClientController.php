<?php

namespace Artifact2\Client\Http\Controllers;


use Artifact2\Client\Client as Client;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;



class ClientController extends BaseController
{
    /**
     * Serve the public website
     *
     * @return $this
     */
    public function index(){


        $collection_id = 1;

        return $this->renderCollection($collection_id , null);


    }



    /**
     * Serve the public website
     *
     * @return $this
     */
    public function userLogin(Request $request){


        $method = $request->method();
        $data['page']='login';
        $data['client_url'] = $_SERVER['SERVER_ADDR'] ;
        $sbObject = null;


        if ($method == 'POST')
        {
            $email = $request->input('email');
            $password = $request->input('password');

            if ( !$email  ){
                $data['errors'] = "Email is verplicht ";
                return view('client::pages.login')->with('data', $data)->with('sbObject', json_decode($sbObject));
            }

            if ( !$password  ){
                $data['errors'] = "Password is verplicht ";
                return view('client::pages.login')->with('data', $data)->with('sbObject', json_decode($sbObject));
            }

            // make request to servicebus
            $args = [   "user_ip" =>  $from_ip = $_SERVER['REMOTE_ADDR'] ,
                        "email" => $email ,
                        "password" => $password ,
                        "client_fqdn" => gethostname() ,
                        "client_ip" => $_SERVER['SERVER_ADDR'],
                        "authenticator" => "email"
            ];
            $sbObject = Client::requestMethod('Artifact', 'Manager' , 'login' , $args );

            $errors = null;

            if (!$sbObject){
                $data['errors'] = "Login is mislukt. ";
                return view('client::pages.login')->with('data', $data)->with('sbObject', json_decode($sbObject));
            }



            if ($sbObject->errors){
                $data['errors'] = $sbObject->errors;
                return view('client::pages.login')->with('data', $data)->with('sbObject', $sbObject);
            }

            $startcollection = 1;
            return $this->renderCollection($startcollection, $sbObject);



        }
        else {

        }

        // return login view with errors
        return view('client::pages.login')->with('data', $data)->with('sbObject', $sbObject);


    }


    public function renderCollection ( $collection_id , $sbObject = null){


        $token = null;
        if ($sbObject && $sbObject->auth){
            $token = $sbObject->auth->token;
        }


        $args = ["id" => $collection_id ];

        // retrieve new service bus object
        $sbObject = Client::requestMethod('Artifact', 'Manager' , 'getCollection' , $args , $token );


        if (!$sbObject->data){
            echo ("Error reported from client: no  data. See dump from ");
            if (env('APP_ENV') == 'local'){
                dump($sbObject);
            }
        }

        if ($sbObject->data && !$sbObject->data->collection){
            echo ("Error reported from client: data without collection. See dump:");
            if (env('APP_ENV') == 'local'){
                dump($sbObject);
            }
        }


        return view('client::pages.website')->with('collection', $sbObject->data)
            ->with('messages' , $sbObject->messages)
            ->with('errors' , $sbObject->errors)
            ->with('sbObject' , $sbObject);

        die();
    }




    /**
     * Check user and password at Service bus.
     * If credentials pass this check we receive an API key (from Service Bus)
     * and we create a local session variable 'api_key'.
     *
     * @param $email
     * @param $password
     * @return string
     */
    public function login222 ( $email, $password){


        // @param null $user_id
        // @param null $user_ip
        // @param null $expires
        // @param null $client_fqdn
        // @param null $client_ip
        // @param null $authenticator
        $args = [ "user_ip" =>  $from_ip = $_SERVER['REMOTE_ADDR'] ,
                  "email" => $email ,
                  "password" => $password ,
                  "client_fqdn" => gethostname() ,
                  "client_ip" => $_SERVER['SERVER_ADDR'],
                  "authenticator" => "email"
                ];


        dump($args);
        die();
        $result = Client::requestMethod('Artifact', 'Manager' , 'login' , $args );

        $errors = null;

        if (!$result){
            $errors['errors']= 'Could not login';
            return json_encode( $errors) ;
        }

        if (!$result->data ){
            $errors['errors']='Could not login (no data recieved)';
            return json_encode( $errors) ;
        }

        if (!$result->data->key ){
            $errors['errors']='Could not login (no key recieved)';
            return json_encode( $errors) ;
        }

        session()->put('api_key', $result->data->key);

        if (session()->get('api_key') == null){
            $errors['errors']='Could not create local session';
            return json_encode( $errors) ;
        }


        return json_encode( $result ) ;

    }


    /**
     * Serve the client admin panel
     *
     * Before we return the admin view we check the local session and validate the API key at the Service Bus.
     */
    public function admin (){


        if (session()->get('api_key') == null){
            echo "<h1>Error</h1>";
            echo "<p>Local session is absent, invalid, or expired.</p>";
            echo "Please go <a href='/'> back to the homepage</a> and try to login again.";
            die();
        }

        $args = ["key" =>  session()->get('api_key') ];
        $data = Client::requestMethod('Artifact', 'Manager' , 'checkApiToken' , $args );

        if (!$data){
            echo "<h1>Error</h1>";
            echo "<p>Could not connect to Authentication server ('null' data received).</p>";
            echo "Please go <a href='/'> back to the homepage</a> and try to login again.";
            die();
        }

        if ( $data->status != 'success'  ){
            echo "<h1>Error</h1>";
            echo "Please go <a href='/'> back to the homepage</a> and try to login again.";
            if (env('APP_ENV') == 'local'){
                echo "<h4>Local key</h4>";
                dump( session()->get('api_key'));
                echo "<h4>Data received from Service bus address: " . env('ESB_URI') . "</h4>";
                dump($data);

            }
            die();

        }

        if (env('APP_ENV') == 'local'){
            echo "<h4>Local key</h4>";
            dump( session()->get('api_key'));
            echo "<h4>Data received from Service bus address: " . env('ESB_URI') . "</h4>";
            dump($data);
            die();
        }

    }



}
