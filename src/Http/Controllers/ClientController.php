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






}
