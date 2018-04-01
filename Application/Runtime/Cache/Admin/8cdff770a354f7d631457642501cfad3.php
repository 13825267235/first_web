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

<div class='container'>
    <form method='post' enctype="multipart/form-data">
    <table class='table-condensed'>
        <tr>
            <td>商品名称</td>
            <td><input type='text' name='goods_name' value='<?php echo ($goods["goods_name"]); ?>'/><td>
        </tr>
        <tr>
            <td>商品价格</td>
            <td><input type='text' name='goods_price' value='<?php echo ($goods["goods_price"]); ?>'/><td>
        </tr>
        <tr>
            <td>商品图片</td>
            <td><input type='file' name='goods_picture'/><td>
        </tr>
        <tr>
            <td>商品属性</td>
            <td><input type='text' name='goods_attr'/><td>
        </tr>
        <tr>
            <td>商品详情</td>
            <td><textarea name='goods_detail'><?php echo ($goods_detail); ?></textarea></td>
        </tr>            
        <tr>
            <td colspan='2'>
            <input type='hidden' name='id' value='<?php echo ($goods["id"]); ?>'/>    
            <input type='submit' value='修改'/>
            <td>
        </tr>
    </table>

</div>