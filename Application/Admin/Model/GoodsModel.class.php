<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
    /*
     * 自动验证
     * 通过create（）方法创建数据对象时自动验证
     */
    protected $_validate=array(
        array("goods_name","require","商品名称不能为空！")
    );
    
    /*
     * 自动完成
     * 通过create（）方法创建数据对象时自动完成
     */
    protected $_auto=array(
        array("create_time","time",1,"function")
    );
    
    public function my_sum($a,$b,$c){
        return $a+$b+$c;
    }
    
    /*
     * 动态链接数据库的实例
     * 此处展示的是链接别的数据库，并执行SQL查询
     */
    public function db_action(){
        $list=$this->db(1,"mysql://root:@localhost:3306/combat")->query("SELECT * FROM combat_album");//添加了一个编号为1的数据库链接，在该类中可以直接调用，如下面的模型方法
        return $list;
    }
    public function zhijie_db(){
        $list= $this->db(1)->query("SELECT * FROM combat_menu");
        return $list;
    }
    
    
}