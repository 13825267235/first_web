<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 * 商品控制器，实现商品及分类的添加及管理
 */

namespace Admin\Controller;

use Think\Controller;

class GoodsController extends Controller {
    /*
     * 开发建议：
     * 遵循框架的命名规范和目录规范
     * 开发过程中尽量开启调试模式，及早发现问题
     * 多看看日志文件，查找隐患问题
     * 养成使用I函数获取输入变量的好习惯
     * 更新或者环境改变后遇到问题首要问题是清空Runtime目录
     * 
     * 控制器：
     *    控制器的命名采用驼峰法（首字母大写）
     * 
     * 操作方法只能定义为公共方法（即public修饰符修饰的方法），而private方法和protected方法只能被调用（不能直接访问），比如下面的my_cases()方法只能被用来调用
     * 
     * URL伪静态通常是为了满足更好的SEO效果
     * 
     * JSON是一种数据交换格式，而JSONP是一种非官方跨域数据交互协议。
     * 
     * 在框架中统一使用I函数进行变量获取和过滤：有利于安全防范以及便于维护。I函数主要用于更方便和安全的获取系统输入变量，可以用于任何地方
     * 
     */

    public function __construct() {
        parent::__construct();
        $goods2 = M("Goods");
        $this->goods2 = $goods2;
    }

    protected function my_cases() {
        echo date("Y-m-d H:i:s");
    }

    //商品首页
    public function index() {
        
        G("begin");//统计代码运行时间的开始，若要测试运行速度，此为必填项

        $goods = D("Goods"); //实例化Goods模型，以便于在后面的程序中直接调用
        $goods1 = M("Goods"); //直接操纵数据表
        //调用模块配置文件下的函数（即conf目录下的文件）
        $myself = new \alias();
        echo $myself->myself_sum(5, 500);

        $this->my_cases(); //调用受保护的方法
        echo "<br/>";

        echo I("get.name", "默认的值", "htmlspecialchars"); //使用I函数获取$_GET['name']的值，如若不存在将返回默认值
        echo "<br/>";
        echo I("name"); //此方法为I函数param类型获取变量的简写方式，结果同上
        echo "<hr/>";

        echo I("get.email", "错误的邮箱格式", FILTER_VALIDATE_EMAIL); //验证输入的邮箱是否合法

        $my_sum = $goods->my_sum(1, 2, 30); //当定义的的模型类拥有自己的业务逻辑时，不能使用M（）方法去实例化该模型，只能通过D（） 方法或其他方法实例化
        echo $my_sum;
        echo "<br/>";

        print_r($goods->db_action()); //动态连接数据库
        echo "<hr/>";
        print_r($goods->zhijie_db()); //动态链接数据库，更加方便的形式链接（即自定义的新添加的数据库连接）
        echo "<hr/>";

        print_r($goods1->where(array("id" => array("gt", 6)))->select()); //gt：大于，lt：小于；eq：等于
        echo "<hr/>";
        print_r($goods1->where(array("goods_name" => array("like", "%无%")))->select()); //LIKE用于模糊查询
        echo "<br/>";

        print_r($goods1->field("id,SUM(goods_price)")->find()); //使用field（）方法查询指定的字段，该方法可以直接使用函数
        echo "<hr/>";
        print_r($goods1->field(true)->select()); //显式调用数据表的所有字段，该方法便于优化性能
        echo "<hr/>";
        print_r($goods1->select());
        echo "<hr/>";

        print_r($goods1->field("goods_detail", true)->select()); //排除指定字段进行查询，这里排除goods_detail字段
        echo "<hr/>";
        print_r($goods1->field(array("id", "goods_price"))->order("goods_price desc,id desc")->select());
        echo "<hr/>";
        print_r($this->goods2->field("id,max(goods_price)")->group("goods_price")->select()); //使用group()函数进行分组查询

        $many_table = $goods1->alias("a")->field("a.*,b.type_name")->join("goods_type as b on a.type_id=b.id")->select(); //多表联合查询，默认为INNER JOIN连接，如果表中有至少一个连接的话，则返回行
        print_r($many_table);
        echo "<hr/>";
        /*
         * left join方式：即使右表中没有匹配，也从左表中返回所有的行
         * right join方式：即使左表中没有匹配，也从右表中返回所有的行
         * 
         */

        $cache = $goods1->cache(true)->where("id<10")->select(); //使用cache()方法进行缓存查询，之后再次进行该查询的话就会直接从缓存中获取
        print_r($cache);
        echo '<hr/>';

        dump($goods1->getByGoodsName("测试缓存")); //根据字段名查询一条记录
        echo "<br/>";

        print_r($goods1->select(false)); //当select（）方法的参数传入false时，将不会执行SQL查询，而只是生成SQL语句

        echo L(_ACTION_); //调用语言包内的配置参数
        echo "<br/>";

        /*
         * 参数绑定是指绑定一个参数到预处理的SQL语句中的对应命名占位符或问号占位符指定的变量，可以提高SQL处理的效率，需要数据库驱动类的支持。目前只有PDO和Sqlsrv驱动支持绑定参数功能
         */
        
        print_r($goods1->lock(true)->select(false));//使用悲观锁机制查询数据，但此处之输出SQL语句
        echo "<hr/>";

        G("end");
        echo G("begin","end")."s";//输出G("begin")到G("end")之间代码段的运行时间
        

        /*
         * 
         * SQL优化：
         *   查询优化：1.只查询需要的字段（利于提高查询速度）
         *            2.使用数组方式传入查询条件会更加高效以及安全
         * 
         * 
         *            
         */
        
        /*
         * 开发安全：
         *    1.防止SQL注入：防止SQL注入是web应用首要防范的安全问题
         *       防止SQL注入的措施：1.查询条件尽量使用数组方式，这是更为安全的方式
         *                         2。如果不得已必须使用字符串查询条件，应使用预处理机制
         *                         3.使用自动验证和自动完成机制进行针对应用的自定义过滤
         *                         4.如果环境允许，尽量使用PDO方式
         *     2.输入过滤：输入过滤势在必行
         *     3.表单令牌：开启表单令牌可以有效防止数据的重复提交等安全操作
         *     4.表单合法性验证
         *     5.目录安全文件：即瞒天过海，添加空白的文件以扰乱视听
         *     6。保护模板文件：1。第一种方式：针对apache服务器，配置.htaccess文件
         *                     2.第二种方式：针对独立服务器，不适合虚拟主机。将项目目录部署到网站web目录之外。
         *     7.上传安全：开启上传安全检查是尤其必要的
         *     8.防止XSS（跨站脚本攻击）攻击
         *     9.添加权限处理机制（针对后台系统）
         *     
         */
        
        //使用预处理机制进行查询,更为安全（不得已使用字符串查询条件时）
        M()->query("SELECT * FROM goods WHERE id=%d AND goods_name=%s",$id,$goods_name);
        

        $goods_list = $goods1->order("id desc")->select();
        $this->assign("goods_list", $goods_list);
        $this->display();
    }

    /*
     * 添加商品
     */

    public function addGoods() {
        $goods = D("Goods");
        if ($_POST) {
            $data = I(".");
            $goods_picture = $_FILES['goods_picture'];
            $config = array("maxSize" => 10000000, "exts" => array("png", "jpg", "jpeg", "gif"), "rootPath" => "Public/", "savePath" => "/images/"); //配置上传信息

            $upload = new \Think\Upload($config); //实例化上传类
            $images = $upload->upload(); //实行上传
            $data['goods_picture'] = $images['goods_picture']['savepath'] . $images['goods_picture']['savename'];
            $result = $goods->create(); //使用create（）方法创建数据对象，会更加高效以及安全，可以完成数据的自动验证以及自动完成
            if (!$result) {
                //创建数据对象失败,表示自动验证失败或者自动完成失败，将输出错误提示信息
                exit($goods->getError());
            } else {
                $goods->add();
            }

            $this->success("成功添加商品", U("index"));
        } else {
            $this->display();
        }
    }

    /*
     * 修改商品
     */

    public function manageGoods() {
        if ($_POST) {
            $id = $_POST['id'];
            $data = $_POST;
            $result = $goods->where(array("id" => $id))->data($data)->save();
            $this->success("成功修改商品信息", U("index"));
        } else {
            $id = $_GET['id'];
            $where = array("id" => $id);
            $goods_info = $goods->where($where)->find();
            $this->assign("goods", $goods_info);
            $this->display();
        }
    }

    /*
     * 删除商品
     * 使用ajax方式删除
     */

    public function del_goods() {
        $goods = $_REQUEST['id'];
        $del_result = $goods->where(array("id" => $goods))->delete();
        if ($del_result) {
            echo 1; //成功删除
        } else {
            echo 0; //失败
        }
    }

    /*
     * 添加商品分类
     */

    public function addType() {
        if ($_POST) {
            $data = $_POST;
            $result = M("Goods_type")->data($data)->add();
            $this->success("成功添加商品分类", U("typeList"));
        } else {
//            $type_list = $this->get_type();
            $type_list = $this->set_cat("goods_type", 0);
            print_r($type_list);

            $this->metaTitle = "添加商品分类";
            $this->assign("type_list", $type_list);
            $this->display();
        }
    }

    /*
     * 获取商品分类
     */

    public function get_type() {

        $list = M("Goods_type")->select();

        return $list;
    }

    /*
     * 递归函数实现无限级分类
     */

    public function set_cat($a, $pid) {

        $a = M("Goods_type")->select();
        foreach ($a as $v) {
            $tree = array(); //每次都声明一个新的数组用来存放子元素

            if ($v['pid'] == $pid) {//匹配子记录
                $v['children'] = $this->set_cat($a, $v['id']);
                if ($v['children'] == null) {
                    unset($v['children']); //如果子元素为空则使用unset()删除，说明已经到该分支的最后一个元素了
                }
                $new_tree[] = $v; //将记录存入新数组
            }
        }

        return $new_tree;
    }

    //调用递归
    public function get_cat() {

        print_r($this->set_cat("goods_type", 0));
    }

    /*
     * 非递归实现无限级分类
     */

    public function general_cat() {
        $list = M("Goods_type")->select();
        $tree = array();
        //第一步，将分类id作为数组key，并创建children单元
        foreach ($list as $k => $category) {
            $tree[$category['id']] = $category;
            $tree[$category['id']]['children'] = array();
        }
        //第二步，利用引用将每个分类添加到父类children数组中，这样一次遍历即可形成树形结构
        foreach ($tree as $key => $item) {
            if ($item['pid'] != 0) {
                $tree[$item['pid']['children']][] = &$tree[$key]; //此处必须传引用，否则结果不对
                if ($tree[$key]['children'] == null) {
                    unset($tree[$key]['children']); //如若children为空，则删除该children元素
                }
            }
        }
        //第三步，删除无用的非根节点数据
        foreach ($tree as $key => $category) {
            if ($category['pid'] != 0) {
                unset($tree[$key]);
            }
        }
        print_r($tree);
    }

    /*
     * 递归函数的使用案例
     */

    //递归函数封装
    function tests($n = 0) {
        echo $n . "  ";
        if ($n > 0) {
            $this->tests($n - 1);
        } else {
            echo " OR ";
        }
        echo $n . "sss ";
    }

    //递归函数调用
    public function cases() {
        echo $this->tests(5);
    }

    /*
     * 商品分类列表
     */

    public function typeList() {
        $type_list = M("Goods_type")->select();

        foreach ($type_list as $k => $v) {
            //查询当前分类的父级分类
            $parent_type = M("Goods_type")->field("type_name")->where(array("id" => $v['pid']))->find();
            $type_list[$k]['parent_type'] = $parent_type['type_name'];
        }
        $this->assign("type_list", $type_list);
        $this->display();
    }

}
