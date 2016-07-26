<?php

class commonModel extends CFormModel {
	public $db = '';
	public $tool = null;
    /*
        * 添加数据
        */
    public function init() {
        parent::init();

    }
    /**
     * 修改数据，用法语Yii的update相同
     * @param  string $table	  [description]
     * @param  string $columns	[description]
     * @param  string $conditions [description]
     * @param  array  $params	 [description]
     * @return [type]			 [description]
     */
    public function updateData($table = '', $columns = '', $conditions = '', $params = array()) {
        if (!$table || !$columns || !$conditions || !$params)
            return false;
        $command = Yii::app()->db->createCommand();
        return $command->update($table, $columns, $conditions, $params);
    }
    public function addData($table, $columns) {
        if (!$table || !$columns)
            return false;
        $command = Yii::app()->db->createCommand();
        return $command->insert($table, $columns);
    }

    /**
     * 保存数据，如果不存在则插入，如果存在则修改
     * @param string $table   表名
     * @param string $columns 条件
     * @param string $id	  [description]
     */
    public function setData($table = '', $columns = '', $id = '') {
        if (!$table || !$columns)
            return false;
        // 如果没有传入id，则表示插入
        if (!$id) {
            return $this->addData($table, $columns);
        }
        // 默认id字段名
        $field = 'id';
        if (is_array($id)) {
            $field = array_keys($id);
            $field = $field[0];
            $id = $id[$field];
        }
        // 判断是否存在
        $sql = "SELECT COUNT(1) FROM `{$table}` WHERE `{$field}`='{$id}'";
        // echo $sql; die;
        $command = Yii::app()->db->createCommand($sql);
        $c = $command->queryScalar();
        // 如果不存在则插入
        if (!$c) {
            $columns[$field] = $id;
            return $this->addData($table, $columns);
        }
        // 如果存在则修改
        $conditions = "{$field}=:id";
        $params = array(':id' => $id);
        return $this->updateData($table, $columns, $conditions, $params);
    }


}
