<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 * 模块配置目录下的自定义文件，该文件会被自动加载，里面的函数只需要实例化即可调用
 */
class alias{
    //自定义的求和函数
    function myself_sum($a,$b){
        return $a+$b;
    }
}
