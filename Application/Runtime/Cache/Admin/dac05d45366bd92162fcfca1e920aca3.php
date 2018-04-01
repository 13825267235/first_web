<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title><?php echo ($metaTitle); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/university/Public/admin/css/main.css"/>
        <link rel='stylesheet' href='/university/Public/bootstrap/css/bootstrap.min.css'/>
        <script src='/university/Public/bootstrap/js/bootstrap.min.js'></script>
        <script src='/university/Public/ueditor/ueditor.config.js'></script>
        <script src='/university/Public/ueditor/ueditor.all.min.js'></script>
        <script src='/university/Public/jquery/jquery-1.4.js'></script>
        <script src='/university/Public/admin/js/main.js'></script>
    </head>
    <body>
        <div class="contanier">
            <div class="page-header"><h2>Welcome to my website</h2></div>
            <div class="menu">
                <ul>
                    <li><a href="<?php echo U('Index/index');?>">首页</a></li>
                    <li>
                        <a href="">商品管理</a>
                        <ul class="childClass">
                            <li>
                                <a href="<?php echo U('Goods/addGoods');?>">添加商品</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Goods/manageGoods');?>">管理商品</a> 
                            </li>
                            <li>
                                <a href="<?php echo U('Goods/addType');?>">添加商品分类</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="">栏目管理</a>
                        <ul class="childClass">
                            <li>
                                <a href="#">添加栏目</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">新闻频道</a>
                        <ul class="childClass">
                            <li>
                                <a href="<?php echo U('News/index');?>">新闻列表</a>
                            </li>
                            <li>
                                <a href="<?php echo U('News/manage');?>">添加新闻</a>
                            </li>
                            <li>
                                <a href="<?php echo U('News/type_list');?>">新闻类型</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="">活动中心</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>

<div class='content'>
    <table class='table-condensed table-hover'>
        <tr>
            <td>新闻ID</td>
            <td>新闻标题</td>
            <td>新闻来源</td>
            <td>新闻类型</td>
            <td>创建时间</td>
            <td>操作</td>
        </tr>
        <?php if(is_array($newsList)): foreach($newsList as $key=>$news): ?><tr>
                <td><?php echo ($news["id"]); ?></td>
                <td><?php echo ($news["title"]); ?></td>
                <td><?php echo ($news["source"]); ?></td>
                <td><?php echo ($news["classname"]); ?></td>
                <td><?php echo ($news["create_time"]); ?></td>
                <td><a href="<?php echo U('manage',array('id'=>$news[id]));?>">修改</a>|<a href='#' data-i='<?php echo ($news["id"]); ?>' data-url="delete" data-msg="是否确认删除该新闻？" class='delete'>删除</a></td>
            </tr><?php endforeach; endif; ?>
    </table>
    <!--引入音视频播放器 start-->
    <video autoplay>
        <source src="/university/Public/music/saysay.mp3"/>
    </video>
    <!--引入音视频播放器 end-->
</div>