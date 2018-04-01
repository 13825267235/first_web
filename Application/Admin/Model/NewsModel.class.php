<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Model;
use Think\Model;
class NewsController extends Model{
    public function getInfo($a,$b){
        return $a*$b;
    }
    public function letsgo($c,$d){
        return $c/$d;
    }
}
