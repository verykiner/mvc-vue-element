<?php
/*
 * 数据库操作类
 * */

namespace mvc\Model;

class Query
{
    private static $pdo = null;
    private $table;
    private $fields = '*'; // 默认为所有
    private $where;
    private $order;
    private $limit;

    public function __construct($pdo)
    {
        self::$pdo = $pdo;
    }

    // 数据表
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    // 查询列
    public function field($fields)
    {
        $this->field = empty($fields) ? '*' : $fields;
        return $this;
    }

    // where条件
    public function where($where)
    {
        $this->where = empty($where) ? '' : ' where ';
        if (is_string($where)) {
            $this->where .= $where;
        }
        if (is_array($where)) {
            foreach ($where as $k => $v) {
                $this->where .= $k . ' like \'%' . $v . '%\' , ';
            }
            $this->where = rtrim(rtrim($this->where), ',');
        }
        return $this;
    }

    // 排序
    public function order($order)
    {
        $this->order = empty($order) ? '' : ' order by ' . $order;
        return $this;
    }

    // 分页
    public function limit($limit)
    {
        $this->limit = empty($limit) ? '' : ' limit ' . $limit;
        return $this;
    }

    // select
    public function select()
    {
        $sql = 'select ' . $this->field . ' from ' . $this->table . $this->where . $this->order . $this->limit;
        $stmt = self::$pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            die('查询失败：' . print_r($stmt->errorInfo()));
        }
    }

    // delete
    public function delete()
    {
        $sql = 'delete from ' . $this->table . $this->where;
        $stmt = self::$pdo->prepare($sql);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return true;
            }
        }
        return false;
    }

    // insert
    public function insert($data)
    {
        $set = ' set ';
        foreach ($data as $key => $value) {
            $set .= $key . " = '" . $value . "',";
        }
        $set = trim($set, ',');
        $sql = 'insert into ' . $this->table . $set;
        $stmt = self::$pdo->prepare($sql);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return true;
            }
        }
        return false;
        // if ($stmt->execute()) {
        //     echo '新增了' . $stmt->rowCount() . '条记录，最后新增id为' . self::$pdo->lastInsertId();
        // } else {
        //     die('新增失败，错误信息为：' . print_r($stmt->errorInfo(), true));
        // }
    }

    // update
    public function update($data)
    {
        $set = ' set ';
        foreach ($data as $key => $value) {
            $set .= $key . " = '" . $value . "',";
        }
        $set = trim($set, ',');
        $sql = 'update ' . $this->table . $set . $this->where;
        $stmt = self::$pdo->prepare($sql);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return true;
            }
        }
        return false;
        // if ($stmt->execute()) {
        //     echo '更新了' . $stmt->rowCount() . '条记录';
        // } else {
        //     die('更新失败，错误信息为：' . print_r($stmt->errorInfo(), true));
        // }
    }
}

