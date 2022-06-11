<?php 
namespace App\Helper;

class ApiHelper{
    protected static $response=[
        "meta"=>[
            "code"=>"",
            "message"=>null,
            "status"=>null
        ],
        "data"=>null
    ];
    static public function CreateApi($message=null,$statusCode=null,$data=null)
    {
        self::$response['meta']['message']=$message;
        self::$response['meta']['status']=$statusCode;
        self::$response['data']=$data;
       return response()->json(self::$response,self::$response['status']);
    }

    static public function Api($message=null,$statusCode=null,$data=null)
    {
        self::$response['meta']['message']=$message;
        self::$response['meta']['status']=$statusCode;
        self::$response['data']=$data;
       return response()->json(self::$response,self::$response['status']);
    }

    static public function CreateApi($message=null,$statusCode=null,$data=null)
    {
        self::$response['meta']['message']=$message;
        self::$response['meta']['status']=$statusCode;
        self::$response['data']=$data;
       return response()->json(self::$response,self::$response['status']);
    }
}