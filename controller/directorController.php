<?php
/*
 * 导演
 * */

namespace mvc\Controller;

include __DIR__ . '/../model/DB.php';

use mvc\Config;
use mvc\Model\DB;

class DirectorController
{
    private $table = 'director';

    public function __construct()
    {
        if (!empty($_GET['c'])) {
            switch ($_GET['c']) {
                case 'add':
                    $this->add();
                    break;
                case 'delete':
                    $this->delete();
                    break;
                case 'update':
                    $this->update();
                    break;
                default:
                    $this->select();
            }
        } else {
            $this->select();
        }
    }

    // 查询
    public function select()
    {
        // 条件
        $key = $_POST['key'];
        if (!empty($key)) {
            switch ($_POST['type']) {
                case 1:
                    $where['name'] = $key;
                    break;
                case 2:
                    $where['phone'] = $key;
                    break;
                case 3:
                    $where['country'] = $key;
                    break;
                default:
                    $where['name'] = $key;
            }
        } else {
            $where = '';
        }
        // 页码
        $page = (intval($_POST['page'], 10) - 1) * intval($_POST['pageSize']);
        $total = count(DB::table($this->table)->field('*')->where($where)->select());
        $data = DB::table($this->table)->field('*')->where($where)->order('id')->limit("{$page},{$_POST['pageSize']}")->select();
        if (gettype($data) == 'array') {
            echo json_encode(array('code' => 1, 'text' => '查询成功！', 'data' => $data, 'total' => $total));
        } else {
            echo json_encode(array('code' => 0, 'text' => '查询失败！', 'data' => [], 'total' => 0));
        }
    }

    // 添加
    public function add()
    {
        $data = [
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'country' => $_POST['country'],
            'add_time' => time(),
        ];
        $res = DB::table($this->table)->insert($data);
        if ($res) {
            echo json_encode(array('code' => 1, 'text' => '添加成功！'));
        } else {
            echo json_encode(array('code' => 0, 'text' => '添加失败！'));
        }
    }

    // 删除
    public function delete()
    {
        $id = $_POST['id'];
        $res = DB::table($this->table)->where('id = ' . $id)->delete();
        if ($res) {
            echo json_encode(array('code' => 1, 'text' => '删除成功！'));
        } else {
            echo json_encode(array('code' => 0, 'text' => '删除失败！'));
        }
    }

    // 更新
    public function update()
    {
        $id = $_POST['id'];
        $data = [
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'country' => $_POST['country'],
            'add_time' => time(),
        ];

        $res = DB::table($this->table)->where('id = ' . $id)->update($data);
        if ($res) {
            echo json_encode(array('code' => 1, 'text' => '更新成功！'));
        } else {
            echo json_encode(array('code' => 0, 'text' => '更新失败！'));
        }
    }
}

$director = new DirectorController();
