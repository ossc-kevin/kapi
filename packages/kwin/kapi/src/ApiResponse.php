<?php

namespace Kwin\Kapi;
use Illuminate\Http\Response;
/**
 * Class ServiceHandler
 *
 * @package Kwin\Kapi
 */
class ApiResponse
{
    
    public $statusTexts = [
        'INVALID_REQUEST'=>400,
    ];
    public function jsonResponse($response){
         return response($response['data'], $response['code'])
                 ->withHeaders([
                'Content-Type' => 'application/json',
                'X-Token' => 'kevin patel',
            ]);
 
    }
    
    public function exceptions($exception) {
        $message = $exception->getMessage();
        if (in_array($message, $this->statusTexts)) {
            return response(['message' => $message], $this->statusTexts[$message])
                            ->withHeaders([
                                'Content-Type' => 'application/json',
            ]);
        }
        return response($exception, 417)
                        ->withHeaders([
                            'Content-Type' => 'application/json',
        ]);
    }

}