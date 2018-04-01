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

<div class="container">
    <h4 style="float:right"><a href='<?php echo U("addType");?>'>添加分类</a></h4>
    <table class='table-condensed'>
        
        <tr>
            <td>分类ID</td>
            <td>分类名称</td>
            <td>父级分类</td>
            <td>操作</td>
        </tr>
        
        <?php if(is_array($type_list)): foreach($type_list as $key=>$type): ?><tr>
            <td><?php echo ($type["id"]); ?></td>
            <td><?php echo ($type["type_name"]); ?></td>
            <td><?php echo ($type["parent_type"]); ?></td>
            <td>修改| 删除</td>
            </tr><?php endforeach; endif; ?>
    </table>
</div>