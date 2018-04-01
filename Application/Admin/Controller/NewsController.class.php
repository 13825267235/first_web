<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 * 新闻控制器
 * @author 小林子
 * create_time 2017-11-17
 */

namespace Admin\Controller;

use Think\Controller;

class NewsController extends Controller {

    //新闻频道
    public function index() {
        $newsList = M("News as a")->field("a.*,b.classname")->join("News_class as b on a.type=b.id")->order("a.id desc")->select();
        foreach ($newsList as $k => $v) {
            $newsList[$k]['create_time'] = date("Y-m-d H:i:s", $v['create_time']);
        }
        $this->assign("newsList", $newsList);
        $this->display();
    }

    //修改新闻 OR 添加新闻
    public function manage($id = 0) {
        if ($_POST) {
            $id = $_POST['old_id'];
            $data = $_POST;
            if ($id) {
                //修改新闻
                $result = M("News")->where(array('id' => $id))->data($data)->save();
                if ($result) {
                    $this->success("成功修改新闻", U('index'));
                }
            } else {
                //添加新闻
                $data['create_time'] = time();
                $result = M("News")->data($data)->add();
                if ($result) {
                    $this->success("成功添加新闻", U('index'));
                }
            }
        } else {
            //新闻详情
            $newsDetail = M("News")->where(array('id' => $id))->find();
            //新闻类型
            $newsType = M("News_class")->select();

            $this->assign("newsType", $newsType);
            $this->assign("news", $newsDetail);
            $this->display();
        }
    }

    //删除新闻
    public function delete($id = 0) {
        $where = array('id' => $id);
        $result = M("News")->where($where)->delete();
        if ($result) {
            echo '删除成功';
        } else {
            echo '删除失败';
        }
    }
    //新闻类型列表
    public function type_list(){
        $typeList=M("News_class")->select();
        $this->assign('typeList',$typeList);
        $this->display();
    }
    
    //新闻类型管理
    public function news_type($id=0,$delete=0){
        $where=array("id"=>$id);
        
        if($_POST){
            $data=$_POST;
            if($id){
                if($delete){
                    //删除类型
                    $message='删除类型成功';
                    $result=M("News_class")->where($where)->delete();
                }else{
                    //修改类型
                    $message='修改类型成功';
                    $result=M("News_class")->where($where)->data($data)->save();
                }
            }else{
                //添加类型
                $message='添加类型成功';
                $result=M("News_class")->data($data)->add();
            }
            if($result){
                $this->success($message,U("news_type"));
            }
        }else{
            $newsType=M("News_class")->where($where)->find();
            $this->assign("type",$newsType);
            $this->display();
        }
    }

}
