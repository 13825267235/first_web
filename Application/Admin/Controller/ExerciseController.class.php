<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

use Think\Controller;
require "Public/redis/autoload.php";

class ExerciseController extends Controller {
    
    //redis学以致用（使用Predis：完全使用PHP代码实现的原生客户端
    public function predis(){
         \Predis\Autoloader::register();  
        $redis=new \Predis\Client();
        
//        $redis=new \Think\Cache\Driver\Redis();
//        echo $redis->get("c");
        echo $redis->ping();
//        $redis->set("car","宝马");
//        print_r($redis->get("car"));
    }
    

    public function index() {
        
        define("MYSELF", "中华人民共和国"); //定义常量
        echo MYSELF;

        define("MYSELF", "美利坚人民共和国"); //常量只可以定义一次，常量一旦定义就不能重新定义或取消定义
        echo MYSELF . "<br/>";

        $fee = 300; //房价
        $serviceprice = 50; //服务小费
//        function totalfee($fee, $serviceprice) {
//            $fee = $fee + $serviceprice;
//            echo "总共需要支付的费用是:$fee"."元";
//        }

        function totalfee(&$fee, $serviceprice) {//此处使用了参数引用
            $fee = $fee + $serviceprice;
            echo "总共需要支付的费用是:$fee" . "元";
        }

        totalfee($fee, $serviceprice); //函数外部调用fun()函数前$fee =300

        totalfee($fee, $serviceprice); //函数外部调用fun()函数后$fee=350

        echo "<hr/>";

        $value0 = "guest"; // 定义变量$value0并赋值

        $$value0 = "customer"; // 再次给变量赋值

        echo $guest . "<br />"; // 输出变量

        $guest = "feifei";
        echo $guest . "\t" . $$value0 . "<br />";

        $value1 = "xiaoming"; // 定义变量$value1

        $value2 = &$value1; // 引用变量并传递变量
        echo $value1 . "\t" . $value2 . "<br />"; // 输出变量

        $value2 = "lili";

        echo $value1 . "\t" . $value2 . "<br/>";
        echo "<hr/>";

        $arr = array // 定义数组并赋值
            (
            0 => 15,
            2 => 1E+05,
            1 => "开始学习PHP基本语法了",
        );

        for ($i = 0; $i < count($arr); $i++) { // 使用for循环输出数组内容
            $arr1 = each($arr);

            echo "$arr1[value]<br />";
        }


        /*
         * 获得30以内的偶数
         */
        $num = 1;
        $str = "30以内的偶数有：";
        while ($num < 30) {
            if ($num % 2 == 0) {
                $str .= $num . " ";
            }
            $num++;
        }
        echo $str . "<hr/>";


        /*
         * 自增自减
         */
        $cc = 8;
        $dd = 2;
        $ee = 1;
        $dd += $cc;
        $ee -= $cc;
        echo "变量dd的值是：" . $dd . ";变量ee的值是：" . $ee . "<br/>";

        /*
         * 字符串的应用
         */
        //单引号和双引号的区别
        $new_str = "这是一串新的字符串";
        echo "双引号内会直接输出变量的值：$new_str" . " ；；； " . '单引号内则会输出变量的名称$new_str' . "<br/>";

        //使用strlen()函数计算字符串的长度
        $someinput = "这个字符串的长度不长。length is not long."; //定义字符串变量
        echo "该字符串的长度是：" . strlen($someinput) . "<br/>";

        echo str_word_count("welcome to my hometown") . "<br/>"; //该函数统计单词的数量，此处输出 4

        echo join("，", array("how", "are", "you")) . "<br/>"; //使用join（）函数将数组内的值用某个符号连接起来,跟implode（）函数的用途一样

        print_r(explode(" ", "how old are you")); //explode()函数使用需要分解的字符串内的任意内容将字符串分解

        echo "<br/>";
        //截取字符串
        echo substr("sweet", 0, -1) . "<br/>"; //截取长度为负数时从后面开始截取

        echo substr("伟大复兴中国梦", 0, 3) . "<br/>"; //跟下面函数的区别
        echo mb_substr("伟大复兴中国梦", 0, 3) . "<br/>"; //mb_substr()函数针对的是中文，而substr()函数针对的是英文

        $str = "hello I have a dream"; //定义英文字符串

        echo strtolower($str) . "<br />"; //转换为小写

        echo strtoupper($str) . "<br />"; //转换为大写
        echo ucfirst($str) . "<br />"; //整个字符串首字母大写

        echo ucwords($str) . "<br />"; //整个字符串中以空格为分隔符的单词首字母大写
        
        /*
         * 正则表达式是把文本或字符串按照一定的规范或模型表示的方法，经常用于文本的匹配操作。例如，验证用户在线输入的邮件地址的格式是否正确。使用正则表达式技术，用户所填写的表单信息将会被正常处理；反之，如果用户输入的邮件地址与正则表达的模式不匹配，就会弹出提示信息，要求用户重新输入正确的信息。可见正则表达式在web应用的逻辑判断中具有举足轻重的作用。
         * 一般情况下，正则表达式有元字符和文本字符组成。元字符就是具有特殊含义的字符，例如“？”、“*”等。文本字符就是普通的文本，例如字母和数字。
         * 1.方括号（[]）：方括号内的一串字符是将要用来进行匹配的字符，例如正则表达式在方括号内的[name]是指在目标字符串中寻找字母n、a、m、e
         * 2.连字符（-）：
         * [a-z]：表示匹配英文小写从a-z的任意字符
         * [A-Z]：表示匹配英文大写从A-Z的任意字符
         * [A-Za-z]：表示匹配英文大小写的A-z的任意字符
         * [0-9]：表示匹配0-9的任意数字
         * 
         */
        
        //正则表达式暂放，后续再学习
        
        $pattern1="is";//匹配模式
        $pattern2="^[A-Za-z0-9]+";
        
        
        
        $string="My name is xiaolinzi.com";
        ereg($pattern1,$string,$new_arr1);//ereg()函数用于正则表达式的匹配，其中，$new_arr为匹配后形成的数组，此处匹配到了is字符
        ereg($pattern2,$string,$new_arr2);
        var_dump($new_arr1,$new_arr2);
        echo "<hr/>";
        
        //数组
        $arr=array("小明"=>"技术员","小利"=>"客服","小芳"=>"行政","小林"=>"总经理");
        //使用foreach遍历一维数组
        foreach($arr as $key=>$value){
            echo $key.":".$value."<br/>";
        }
        
        reset($arr);//前面使用foreach（）函数遍历数组后如需使用while循环来遍历数组，则需要使用reset()函数来重置数组
        //使用each()函数遍历一维数组
        while($element=each($arr)){
            echo "姓名：".$element['key']." ";
            echo "职位：".$element['value'];
            echo '<br/>';
        }
        
        reset($arr);//重置数组
        //使用list()函数将each()函数遍历出来的键名和键值分别赋值和输出，如：此处将键名赋值给$name,键值赋值给$job
        while(list($name,$job)=each($arr)){
            echo $name."是".$job."<br/>";
        }
        
        //使用for循环+while()循环+each()函数+list()函数遍历多维数组,此处为二维数组
        $many_arr=array(array("name"=>"jack","job"=>"工程师","age"=>26),array("name"=>"lili","job"=>"前台","age"=>23),array("name"=>"marry","job"=>"客服妹子","age"=>20),array("name"=>"Tom","job"=>"部门经理","age"=>28));
        for($i=0;$i<count($many_arr);$i++){
             while($vv=each($many_arr[$i])){
                echo $vv['key']."：".$vv['value']."  ";
            }
            
            
//            while(list($k,$v)=each($many_arr[$i])){
//                echo $k."：".$v."<br/>";
//            }
            echo "<br/>";
        }
        echo "<hr/>";
        reset($many_arr);//数组在前面遍历后需再次遍历时需要使用reset()函数重置数组
        
        //使用foreach（）遍历多维数组
        foreach($many_arr as $k=>$v){
            foreach($v as $kkk=>$vvv){
                echo $kkk.":".$vvv." ";
            }
            echo "<br/>";
        }
        
        //数组排序
        $sort_arr=array("1"=>20,"3"=>30,"8"=>10,"4"=>50,"2"=>100,"9"=>80);
//        rsort($sort_arr);//降序排序，即按照数组键值降序排列
//        asort($sort_arr);//升序排序，跟rsort()相反
        ksort($sort_arr);//按照下标升序排序
        print_r($sort_arr);
        echo "<hr/>";
        
        //往数组中添加元素,使用array_push()函数在数组的后面追加元素，array_unshift()函数在数组的头部添加元素
        $old_array=array("小明","小芳","晓东");
        array_unshift($old_array,"小丽","小李");
//        array_push($old_array,"小丽","小李");
        print_r($old_array);echo "<br/>";
        
        //删除数组中的元素
        //使用array_shift()函数删除指定数组中的第一个元素
        $deleted_element= array_shift($old_array);
        echo $deleted_element;
        print_r($old_array);echo "<br/>";
        
        //array_pop()函数删除指定数组中的最后一个元素，并返回该值
        $relation_array=array("name"=>"小凤","sex"=>"女","age"=>26);
        $deleted_element2=array_pop($relation_array);
        echo $deleted_element2;
        print_r($relation_array);echo "<br/>";
        
        /*
         * 查询数组
         */
        //in_array()查询目标字符串是否为指定数组的键值
        if(in_array("小明",array("name"=>"小明"))){echo "小明存在于该数组中"."；  ";};
        
        //array_key_exists()函数查询数组中是否存在改下标
        if(array_key_exists("sex", array("name"=>"小凤","sex"=>"女","age"=>26))) echo "该数组中存在”sex“下标"."；  ";
        
        //array_search()函数查询数组中键值是否存在指定值
        if(array_search("26",array("name"=>"小凤","sex"=>"女","age"=>26))) echo "该数组中存在该值";
        echo "<br/>";
        
        //array_keys()函数取得关联索引数组的键名（下标）成为一个新的数字索引数组
        $old_relation_arr=array("name"=>"小凤","sex"=>"女","age"=>26);
        $new_num_arr1=array_keys($old_relation_arr);
        print_r($new_num_arr1);echo "<br/>";
        
        //array_values()函数取得关联索引数组的键值成为一个新的数字索引数组
        $new_num_arr2=array_values($old_relation_arr);
        print_r($new_num_arr2);echo "<br/>";
        
        //array_count_values()函数用于统计数组内各键值的个数,并形成一个以键值为下标，以键值数量为键值的新数组
        $new_arr3=array("苹果"=>28,"香蕉"=>8,"桃子"=>28,"李子"=>18,"榴莲"=>28,"菠萝"=>18);
        $count_arr= array_count_values($new_arr3);
        print_r($count_arr);echo "<br/>";
        
        //使用array_unique()函数删除数组中重复的元素，即删除键值相同的后面所有元素
        print_r(array_unique($new_arr3));echo "<br/>";
        
        //array_flip()函数用于调换数组内的键值（即下标）和元素值，如果有相同的元素值将会保留最后的那个。例如调换$new_arr3将会得到array("28"=>"榴莲",8=>"香蕉","18"=>"菠萝")
        print_r(array_flip($new_arr3));echo "<br/>";
        
        //serialize()函数用于数组的序列化处理，unserialize()函数用于反序列化
        echo serialize($new_arr3);echo "<hr/>";
        
        /*
         * 日期和时间
         */
        //time()函数输出当前的时间戳
        echo "当前的时间戳为：".time();echo "<br/>";
        
        //date（）函数返回当前日期
        echo "现在是".date("Y-m-d H:i:s")."  ";
        echo "这个月有".date("t")."天"."<br/>";//往date()函数中传入参数t，将得到这个月的总天数
        
        date_default_timezone_get("PRC");//设置默认时区为北京时间
        
        print_r(getdate());//getdate()函数返回一个数组，包含日期和时间的各个部分，若参数为空即返回当前日期和时间
        echo "<br/>";
        
        echo strtotime("2018-03-03 19:30:20")."<br/>";//strtotime()函数用于将指定日期转换为时间戳
        
        //checkdate()检测用户输入的时间是否正确
        if(checkdate(2, 30, 2018)){
            echo "天呐，太不可思议了";
        }else{
            echo "2月份没有30号"."<hr/>";
        }
        
        /*
         * 面向对象
         * 面向对象的主要的特性可封装性、可继承性和多态性。
         * 面向对象编程的主要优势就是把编程的重心从处理过程转移到了对现实世界实体的表达。
         * OOP是面向对象编程（Object-Oriented Programming）的缩写。对象（Object)在OOP中是由属性和操作组成的。属性（attributes）就是对象的特性或与对象关联的变量。操作（operation）就是对象中的方法（method）或函数（function）。
         * 由于OOP中最为重要的特性之一就是可封装性，因此对对象内部数据的访问只能通过对象的”操作“来完成，这也被称为对象的”接口“（interfaces)。因为类是对象的模板，所以类描述了对象的属性和方法。
         * 面向对象编程具有三大特点：
         *   1.封装性：将类的使用和实现分开管理，只保留类的接口，这样开发人员就不用知道类的实现过程，只需要知道如何使用类即可，从而大大的提高了开发的效率。
         *   2.继承性：”继承“是面向对象软件技术中的一个概念。继承可以使得子类具有父类的各种属性和方法，而不需要再次编写相同的代码。在令子类继承父类的同时，可以重新定义某些属性，并重写某些方法，即覆盖父类的原有属性和方法，
         *       使其获得与父类不同的功能。另外，还可以为子类追加新的属性和方法。继承可以实现代码的可重用性，简化对象和类的创建过程。另外，PHP支持单继承，即一个子类只能有一个父类。
         *   3.多态性：多态是面向对象程序设计的重要特征之一，是扩展性在”继承“之后的又一重大表现。同一操作作用于不同的类的实例，将产生不同的执行结果，即不同类的对象收到相同的信息时，得到不同的结果。
         * 
         * 面向对象编程的思想是一切皆为对象。类是对一个事物抽象出来的结果，因此，类是抽象的。对象是某类事物中具体的那个，因此，对象就是具体的。
         * 构造方法的作用是执行一些初始化的任务。如果类中没有直接声明构造方法，那么类会默认生成一个没有参数且内存为空的构造方法。一个类只能声明一个构造方法。
         * 抽象类和接口都是特殊的类，因为它们都不能被实例化。抽象类只能作为父类使用，因为抽象类不能被实例化。抽象类使用abstract关键字来声明。
         * 抽象类和普通类的主要区别在于抽象类的方法没有方法内容，而且至少包含一个抽象方法。另外，抽象方法也必须使用关键字abstract来修饰，抽象方法后必须有分号。
         * 继承特性简化了对象和类的创建，增加了代码的可重用性。但是PHP只支持单继承，如若想实现多继承，则需要使用接口。PHP可以实现多个接口。
         * 
         * 在PHP中可以通过继承实现多态，也可以通过接口实现多态
         */

        
        //使用封装函数求和，$this代表当前类（对象）
        echo $this->get_sum(3,5)." ";
        //调用其他文件的自定义封装函数
        echo PublicController:: getInfo(3,0);
        echo "<br>";
        
//        print_r(D("Admin/News")->select()) ;
        
        /*
         * 常见的错误处理方法包括使用错误处理机制、使用Die语句调试、自定义错误和错误触发器等。
         * 
         * 异常（Exception）用于在指定的错误发生时改变脚本的正常流程。
         */
        
        //自定义错误处理函数
//        function customError($errNo,$errMsg){
//            echo "<b>错误：</b>".[$errNo].$errMsg;
//        }
//        set_error_handler("customError");
        
        
        /*
         * PHP是一种专门用于web开发的服务器端脚本语言。PHP要打交道的主要是服务器（server）和HTML（超文本标识语言）。
         * 表单传递数据的常用方法有POST和GET两种。POST和GET的区别：POST安全，传输量大；GET方式会将所传输的数据以URL的形式显示在浏览器地址栏里。
         */
        //对URL中传递的参数进行编码，既可以实现对数据的加密，又可以对无法通过浏览器地址栏传递的参数进行传递。
        //urlencode()编码所传递的参数，将空格转换为”+“
        $names="小小 芳芳";
        $link1="index.php?name=".urlencode($names);
        $link2="index.php?name=".rawurlencode($names);//rawurlencode()函数在对URL中传递的参数进行编码的时候会将空格编码为”%20“
        echo $link1."<br/>".$link2."<br/>";
        echo urldecode($link1)."<br/>";//反编码，即解码，下同
        echo rawurldecode($link2)."<br/>";
        
        
        /*
         * 文件与目录的操作
         * fopen($file,$method)函数用于打开文件，其中$file为文件路径，后者为打开方式
         * fwrite($file,$str,$str_len)用于在打开的文件上写入数据
         * 
         */
        $file="D:/office/exercises.txt";
//        $fp=fopen($file,"r");//打开文件用于读取，且从该文件的头部开始读取
//        $fp=fopen($file,"r+");//打开文件用于读取和写入，且从该文件的头部开始读取和写入
        
//        $fp=fopen($file,"w");//w模式用于写入；当文件存在时将清空文件内容后从头写入，不存在时将创建该文件并写入内容
//        $fp=fopen($file,"w+");//w+模式用于写入和读取；当文件存在时将清空文件内容后从头写入，不存在时将创建该文件并写入内容
        
        $fp=fopen($file,"a");//添加写入（即追加内容）
        
        fwrite($fp,"小仙女，i love you");
//        while(!feof($fp)){//feof()函数检查是否到了文件尾部，在此处的话不到文件尾就一直循环下去
//            $file_info=fgets($fp);
//            echo $file_info."<br/>";
//        }
        fclose($fp);//关闭文件
        
        //常用的文件目录函数
        echo getcwd();//返回当前的工作目录
        
        print_r(scandir(getcwd()));//获取指定目录下的文件和目录，此处获取当前工作目录下的文件和目录
        echo "<br/>";
        echo microtime();
        
        
        /*
         * 应对高并发的策略有：尽可能的HTML静态化，图片服务器分离，数据库集群和库表散列，负载均衡
         */
    }
    
    //表单传输方式测试，即测试POST和GET的区别
    public function info(){
        print_r($_POST);
        $this->display();
    }
    
    /*
     * MySQL知识点
     */
    public function mysql_info(){
        //mysqldump用来备份数据库，mysqldump -u用户名 -p密码 --opt 数据库名 > 备份地址（保存指定数据库中所有的表）
        //mysqldump -u用户名 -p密码  数据库名 表名> 备份地址（备份指定数据库中的指定表及内容）
    }
    
    /*
     * Think PHP的全面系统学习（知识要点）
     */
    public function think_php(){
        /*
         *应用编译机制是ThinkPHP独创的功能特色。
         * 应用编译缓存的基础原理是第一次运行的时候把核心需要加载的文件去掉空白和注释后合并到一个文件，第二次运行的时候就直接加载编译缓存而无需加载众多的核心文件，当第二次执行的时候就会根据当前的应用模式直接载入编译过的缓存文件，从而省去很多IO开销，加快执行速度
         */
    }

    //求和
    public function get_sum($a,$b) {
        return $a+$b;
    }

}
