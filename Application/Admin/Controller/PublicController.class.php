<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{
    function getInfo($a,$b){
        return $a*$b;
    }
}
