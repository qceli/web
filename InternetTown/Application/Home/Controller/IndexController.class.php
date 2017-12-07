<?php

namespace Home\Controller;

use Think\Controller;
use Admin\Model\CategoryModel;
use Admin\Model\MicroArticleModel;

class IndexController extends Controller
{
    public function articleList()
    {
        $art = new MicroArticleModel();
        $ctg = new CategoryModel();

        $article = $art->select();
        foreach ($article as $index => $item) {
            $category = $ctg->where("id='$item[category]'")->find();
            $article[$index]['category'] = $category['name'];
            $article[$index]['created'] = date('Y-m-d H:i:s', $item['created_time']);
            $article[$index]['published_time'] = date('Y-m-d H:i:s', $item['published_time']);
        }
        $this->ajaxReturn($article);
    }

    public function articleDetail()
    {
        $art = new MicroArticleModel();
        $ctg = new CategoryModel();

        $aid = I('get.id');
        if (!$aid) {
            $this->ajaxReturn(array('status' => false, 'msg' => '未知的ID！'));
        }
        $article = $art->where("id='$aid'")->find();
        if (!$article) {
            $this->ajaxReturn(array('status' => false, 'msg' => '没有此文章'));
        }
        $category = $ctg->where("id='$article[category]'")->find();
        $article['category'] = $category['name'];
        $article['created_time'] = date('Y-m-d H:i:s', $article['created_time']);
        $article['published_time'] = date('Y-m-d H:i:s', $article['published_time']);
        $this->ajaxReturn($article);

    }
}