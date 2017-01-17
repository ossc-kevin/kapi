<?php

namespace Kwin\Kapi;

/**
 * Class ServiceHandler
 *
 * @package Kwin\Kapi
 */
class User
{
    public function __call($name, $arguments) {
       throw new \Exception('INVALID_REQUEST');
    }
    
    public function userAction($action, $param){
	return $this->$action($param);
    }
    
    public function get($param){
	$user = \App\User::findorFail($param);
	return ['code'=>200,'data'=>$user];
    }
    
    public function add(){
	['code'=>200,'data'=>['message'=>'User add function call']];
    }
    
    public function update(){
	return ['code'=>200,'data'=>['message'=>'User update function call']];
    }
    
    public function delete(){
	return ['code'=>200,'data'=>['message'=>'User delete function call']];
    }
}