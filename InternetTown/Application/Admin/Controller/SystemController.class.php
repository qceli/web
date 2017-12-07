<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/7
 * Time: 17:26
 */

namespace Admin\Controller;


use Admin\Model\SightModel;

class SystemController extends AuthLoginController
{
    /*
     * 管理员管理
     */
    public function adminUserList()
    {
        //
        $adminusers = D('AdminUser');
        $admingroups = D('AdminGroup');
        $adminusers = $adminusers->select();
        foreach ($adminusers as $index => $item) {
            $group = $admingroups->where('id=' . $adminusers[$index]['gid'])->find();
            $adminusers[$index]['gid'] = $group['name'];
        }
        $this->assign('adminusers', $adminusers);
        $this->display('System/adminlist');
    }

    public function adminUserAdd()
    {
        $adminGroups = D('AdminGroup');
        $adminUsers = D('AdminUser');
        if (IS_POST && IS_AJAX) {
            $username = I('post.username');
            $password = md5(I('post.password'));
            $repwd = md5(I('post.repwd'));
            $newUser_data = array(
                'username' => "$username",
                'password' => "$password",
                'repwd' => "$repwd",
                'group' => I('post.group'),
                'last_login' => time(),
                'created_time' => time(),
                'login_time' => 0
            );

            if ($adminUsers->where("username='$newUser_data[username]'")->find()) {
                $this->ajaxReturn(array('status' => false, 'msg' => '用户已存在，请勿重复添加！'));
            }
            if ($newUser_data['password'] != $newUser_data['repwd']) {
                $this->ajaxReturn(array('status' => false, 'msg' => '两次密码输入不一致！'));
            }

            $adminUsers->add($newUser_data);
            $this->ajaxReturn(array('status' => true, 'msg' => '添加成功！'));
        }
        $adminGroups = $adminGroups->select();
        $this->assign('admingroups', $adminGroups);
        $this->display('System/addadminuser');
    }

    public function adminUserDel()
    {
        if (IS_POST && IS_AJAX) {
            $uid = I('post.uid');
            $adminusers = D('AdminUser');
            if (!$uid) {
                $this->ajaxReturn(array('status' => false, 'msg' => '无效的用户ID！'));
            }
            if ($uid == 1) {
                $this->ajaxReturn(array('status' => false, 'msg' => '权限不足！'));
            }
            $adminusers->where("id='$uid'")->delete();
            $this->ajaxReturn(array('status' => true, 'msg' => '删除成功！'));
        }
    }

    /*
     * 景点管理
     */
    public function signtList()
    {
        $sights = D('sight');
        $sights = $sights->select();
        $this->assign('sights', $sights);
        $this->display('System/sightlist');
    }

    public function sightAdd()
    {
        $name = I('post.sight_name');
        $sight = D('Sight');
        if ($sight->where('name="' . $name . '"')->find()) {
            $this->ajaxReturn(array('status' => false, 'msg' => '分类已存在，请勿重复添加！'));
        } else {
            $data = array('name' => $name);
            if ($sight->add($data)) {
                $this->ajaxReturn(array('status' => true, 'msg' => '景点添加成功！'));
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '景点添加失败！'));
            }
        }
    }

    public function sightEdit()
    {
        $id = I('post.id');
        $sight_name = I('post.sight_name');
        if (!empty($id) && !empty($sight_name)) {
            $sight = D('Sight');
            if ($sight->where('name="' . $sight_name . '"')->find()) {
                $this->ajaxReturn(array('status' => false, 'msg' => '名称已存在，请勿重复添加！'));
            } else {
                $data = array(
                    'id' => "$id",
                    'name' => "$sight_name"
                );
                $sight->save($data);
                $this->ajaxReturn(array('status' => true, 'msg' => '更新成功！'));
            }
        }
    }

    public function sightDel()
    {
        $id = I('post.id');
        $sight = D('Sight');
        if ($sight->where('id=' . $id)->find()) {
            $sight->delete();
            $this->ajaxReturn(array('status' => true, 'msg' => '删除成功！'));
        } else {
            $this->ajaxReturn(array('status' => false, 'msg' => '未知的分类！'));
        }
    }

    /*
     * 分组管理
     */
    public function groupList()
    {
        $admingroups = D('AdminGroup');
        $admingroups = $admingroups->select();
        $this->assign('admingroups', $admingroups);
        $this->display('System/grouplist');
    }

    public function groupAdd()
    {
        if (IS_POST && IS_AJAX) {
            $group_name = I('post.group_name');
            $groups = D('AdminGroup');
            if ($groups->where('name="' . $group_name . '"')->find()) {
                $this->ajaxReturn(array('status' => false, 'msg' => '群名已存在，请勿重复添加！'));
            }
            $data = array('name' => $group_name);
            if ($groups->add($data)) {
                $this->ajaxReturn(array('status' => true, 'msg' => '添加成功！'));
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '添加失败！'));
            }
        }
    }

    public function groupEdit()
    {
        if (IS_POST && IS_AJAX) {
            $gid = I('post.gid');
            $group_name = I('post.group_name');

            $groups = D('AdminGroup');
            if ($groups->where('name="' . $group_name . '"')->find()) {
                $this->ajaxReturn(array('status' => false, 'msg' => '群名已存在，请勿重复添加！'));
            }
            $data = array(
                'id' => $gid,
                'name' => $group_name
            );
            if ($groups->save($data)) {
                $this->ajaxReturn(array('status' => true, 'msg' => '修改成功！'));
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '添加失败！'));
            }
        }
    }

    public function groupDel()
    {
        if (IS_POST && IS_AJAX) {
            $gid = I('post.gid');
            $group = D('AdminGroup');
            if ($group->where('id=' . $gid)->find()) {
                $group->delete();
                $this->ajaxReturn(array('status' => true, 'msg' => '删除成功'));
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '删除失败'));
            }
        }
    }

    /*
     * 分类管理
     */
    public function categoryList()
    {
        $categorys = D('Category');
        $categorys = $categorys->select();
        foreach ($categorys as $index => $item) {
            if ($item['parent_id'] == 0) {
                $categorys[$index]['parent_id'] = " 一级分类 ";
            } else { // 非0 parent_id，
                $category = D('Category')->where("id=' $item[parent_id]'")->find();
                $categorys[$index]['parent_id'] = $category['name'];
            }
        }
        $this->assign('categorys', $categorys);
        $this->display('System/categorylist');
    }

    public function categoryAdd()
    {
        $category = D('Category');
        if (IS_POST && IS_AJAX) {
            $parent_id = I('post.parent_id');
            $cate_name = I('post.name');

            if ($category->where("name='$cate_name'" . " AND parent_id='$parent_id'")->find()) {
                $this->ajaxReturn(array('status' => false, 'msg' => '分类已存在，请勿重复添加！'));
            } else {
                $data = array('parent_id' => $parent_id, 'name' => $cate_name);
                $category->add($data);
                $this->ajaxReturn(array('status' => true, 'msg' => '添加成功！'));
            }
        } else {
            $categorys = $category->where("parent_id='0'")->select(); // 主分类
            $this->assign('categorys', $categorys);
            $this->display('System/categoryadd');
        }
    }

    public function categoryEdit()
    {
        $category = D('Category');
        $id = I('get.id');
        if (IS_POST && IS_AJAX) {
            // new params
            $params = array(


                'cid' => I('post.id'),
                'name' => I('post.name'),
                'parent_id' => I('post.parent_id')
            );
            $cate = $category->where("id='$params[cid]'")->find();
            if (!$cate) {
                $this->ajaxReturn(array('status' => true, 'msg' => '未知的ID！'));
            }
            if ($category->where("name='$params[name]' AND parent_id='$params[parent_id]'")->find()) {
                $this->ajaxReturn(array('status' => false, 'msg' => '已有相同的分类，请勿重复添加！'));
            }

            $category->where("id='$params[cid]'")->save($params);
            $this->ajaxReturn(array('status' => true, 'msg' => '更新成功'));
        }
        $cate = $category->where("id='$id'")->find();
        $categorys = $category->select();
        $this->assign('categorys', $categorys);
        $this->assign('cate', $cate);
        $this->display('System/categoryedit');

    }

    public function categoryDel()
    {
        if (IS_POST && IS_AJAX) {
            $cid = I('post.id');
            if ($cid) {
                $category = D('Category');
                if ($category->where("id='$cid'")->find()) {
                    $category->delete();
                    $this->ajaxReturn(array('status' => true, 'msg' => '删除成功！'));
                } else {
                    $this->ajaxReturn(array('status' => false, 'msg' => '未知的ID！'));
                }
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '参数错误！'));
            }
        }
    }

    /*
     * 权限管理
     */
    public function permissionList()
    {
        $this->display('System/permissionlist');
    }

    public function permissionAdd()
    {
        //
    }

    /*
     * 接口管理
     */
    public function interfaceList()
    {
        $this->display('System/interfacelist');
    }

    public function interfaceAdd()
    {
        //
    }
}