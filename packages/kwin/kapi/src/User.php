<?php

namespace Kwin\Kapi;

/**
 * Class ServiceHandler
 *
 * @package Kwin\Kapi
 */
class User
{
    public function userAction($action, $param){
	dd('User get function call');
    }

    public function get($param){
	
	dd('User get function call'.$param);
    }
    
    public function add(){
	dd('User add function call');
    }
    
    public function update(){
	dd('User update function call');
    }
    
    public function delete(){
	dd('User delete function call');
    }
}