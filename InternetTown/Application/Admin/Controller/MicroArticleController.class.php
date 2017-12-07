<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/7
 * Time: 16:11
 */

namespace Admin\Controller;

class MicroArticleController extends AuthLoginController
{
    public function index()
    {
        /*
         * 获取所有文章
         */
        $micro_arts = D('MicroArticle');
        $m_arts = $micro_arts->select();
        $categorys = D('Category');
        foreach ($m_arts as $index => $item) {
            $ctg = $categorys->where("id='$item[category]'")->find();
            $m_arts[$index]['category'] = $ctg['name'];
            $m_arts[$index]['content'] = json_encode(strip_tags(htmlspecialchars_decode($item['content'])));
        }
        $this->assign('micro_arts', $m_arts);
        $this->display('MicroArticle/list');
    }

    public function add()
    {
        if (IS_POST && IS_AJAX) {
            $current_user = session('user');
            $m_art = array(
                'title' => I('post.title'),
                'author' => $current_user['username'],
                'category' => I('post.category'),
                'content' => I('post.content'),
                'status' => 0,
                'created_time' => time(),
                'published_time' => time()
            );
            $art = D('MicroArticle');
            $art->add($m_art);
            $this->ajaxReturn(array('status' => true, 'msg' => '添加成功！'));
        }
        $categorys = D('Category');
        $categorys = $categorys->select();
        $this->assign('categorys', $categorys);
        $this->display('MicroArticle/add');
    }

    public function detail()
    {
        $id = I('get.id');
        if (!$id) {
            $this->ajaxReturn(array('status' => true, 'msg' => '未知的ID！'));
        }
        $m_art = D('MicroArticle');
        $art = $m_art->where('id=' . $id)->find();
        if (!$art) {
            $this->ajaxReturn(array('status' => false, 'msg' => '没找到此内容！'));
        }
        $this->assign('art', $art);
        $this->display('MicroArticle/detail');
    }

    public function edit()
    {
        $m_art = D('MicroArticle');
        $id = I('get.id');
        if (IS_POST && IS_AJAX) {
            $id = I('post.id');
            if (!$id) {
                $this->ajaxReturn(array('status' => false, 'msg' => '未知的ID！'));
            }
            $current_user = session('user');
            $new_art = array(
                'id' => $id,
                'title' => I('post.title'),
                'author' => $current_user['username'],
                'category' => I('post.category'),
                'content' => I('post.content'),
                'status' => 0,
                'created_time' => time(),
                'published_time' => time()
            );
            $m_art->save($new_art);
            $this->ajaxReturn(array('status' => true, 'msg' => '更新成功！'));
        }
        $art = $m_art->where('id=' . $id)->find();
        $category = D('Category');
        $categorys = $category->select();
        $this->assign('art', $art);
        $this->assign('categorys', $categorys);
        $this->display('MicroArticle/edit');
    }

    public function del()
    {
        if (IS_POST && IS_AJAX) {
            $id = I('post.id');
            if (!$id) {
                $this->ajaxReturn(array('status' => false, 'msg' => '未知的ID！'));
            }
            $m_art = D('MicroArticle');
            $m_art->where('id=' . $id)->delete();
            $this->ajaxReturn(array('status' => true, 'msg' => '删除成功！'));
        }
    }
}