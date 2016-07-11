<?php
/**
3. * 创建时间： 2012年5月21日
4. *
5. * 说明：分卷文件是以_v1.sql为结尾(20120522021241_all_v1.sql)
6. * 功能：实现mysql数据库分卷备份,选择表进行备份,实现单个sql文件及分卷sql导入
7. * 使用方法：
8. *
9. * ------1. 数据库备份（导出）------------------------------------------------------------
10.//分别是主机，用户名，密码，数据库名，数据库编码
11.$db = new DBManage ( 'localhost', 'root', 'root', 'test', 'utf8' );
12.// 参数：备份哪个表(可选),备份目录(可选，默认为backup),分卷大小(可选,默认2000，即2M)
13.$db->backup ();
14. * ------2. 数据库恢复（导入）------------------------------------------------------------
15.//分别是主机，用户名，密码，数据库名，数据库编码
16.$db = new DBManage ( 'localhost', 'root', 'root', 'test', 'utf8' );
17.//参数：sql文件
18.$db->restore ( './backup/20120516211738_all_v1.sql');
19. *----------------------------------------------------------------------
20. */
class DBManage
{
    var $db; // 数据库连接
    var $database; // 所用数据库
    var $sqldir; // 数据库备份文件夹
    var $record;
    // 换行符
    private $ds = "\n";
    // 存储SQL的变量
    public $sqlContent = "";
    // 每条sql语句的结尾符
    public $sqlEnd = ";";
    /**
    34.     * 初始化
    35.     *
    36.     * @param string $host
    37.     * @param string $username
    38.     * @param string $password
    39.     * @param string $thisatabase
    40.     * @param string $charset
    41.     */
  function __construct($host = 'localhost', $username = 'maijin1014', $password = '76Y9mmYzEhELunxM', $thisatabase = 'maijin', $charset = 'utf8')
    {
               $this->host = $host;
    $this->username = $username;
        $this->password = $password;
        $this->database = $thisatabase;
        $this->charset = $charset;
        // 连接数据库
        $this->db = mysql_connect ( $this->host, $this->username, $this->password ) or die ( "数据库连接失败." );
        // 选择使用哪个数据库
        mysql_select_db ( $this->database, $this->db ) or die ( "无法打开数据库" );
        // 数据库编码方式
        mysql_query ( 'SET NAMES ' . $this->charset, $this->db );
    }

    /*
      * ------------------------------------------数据库备份start----------------------------------------------------------       */

    /**
    62.     * 数据库备份
    63.     * 参数：备份哪个表(可选),备份目录(可选，默认为backup),分卷大小(可选,默认2000，即2M)
    64.     *
    65.     * @param $string $dir
    66.     * @param int $size
    67.     * @param $string $tablename
    68.     */
    function backup($tablename = '', $dir, $size)
    {
           $dir = $dir ? $dir : 'backup/';
        $size = $size ? $size : 2000;
       $sql = '';
        // 只备份某个表
        if (! empty ( $tablename ))
                    {
                        echo '正在备份表' . $tablename . '<br />';
            // 插入dump信息
            $sql = $this->_retrieve();
            // 插入表结构信息
            $sql .= $this->_insert_table_structure ( $tablename );
            // 插入数据
            $data = mysql_query ( "select * from " . $tablename );
            // 文件名前面部分
            $filename = date ( 'YmdHis' ) . "_" . $tablename;
            // 字段数量
            $num_fields = mysql_num_fields ( $data );
            // 第几分卷
            $p = 1;
            // 循环每条记录
            while ( $record = mysql_fetch_array ( $data ) )
                            {
                                // 单条记录
                $sql .= $this->_insert_record ( $tablename, $num_fields, $record );
                // 如果大于分卷大小，则写入文件
                if (strlen ( $sql ) >= $size * 1000)
                                    {
                                        $file = $filename . "_v" . $p . ".sql";
                   if ($this->_write_file ( $sql, $file, $dir ))
                                            {
                                                echo "表-" . $tablename . "-卷-" . $p . "-数据备份完成,生成备份文件 <span style='color:#f00;'>$dir$filename</span><br />";
                    }
                    else
                    {
                                                echo "备份表-" . $tablename . "-失败<br />";
                    }
                    // 下一个分卷
                    $p ++;
                    // 重置$sql变量为空，重新计算该变量大小
                    $sql = "";
                }
            }
            // sql大小不够分卷大小
            if ($sql != "")
                            {
                                $filename .= "_v" . $p . ".sql";
                if ($this->_write_file ( $sql, $filename, $dir ))
                                    {
                                        echo "表-" . $tablename . "-卷-" . $p . "-数据备份完成,生成备份文件 <span style='color:#f00;'>$dir$filename</span><br />";
                }
                else
                {
                                        echo "备份卷-" . $p . "-失败<br />";
               }
            }
        }
        else
        { // 备份全部表
                     if ($tables = mysql_query ( "show table status from " . $this->database ))
                            {
                                //echo "读取数据库结构成功！<br />";
            }
            else
            {
                               // exit ( "读取数据库结构成功！<br />" );
            }
            // 插入dump信息
            $sql .= $this->_retrieve();
            // 文件名前面部分
            $filename = date ( 'YmdHis' ) . "_all";
            // 查出所有表
            $tables = mysql_query ( 'SHOW TABLES' );
            // 第几分卷
            $p = 1;
            // 循环所有表
            while ( $table = mysql_fetch_array ( $tables ) )
                            {
                                // 获取表名
                $tablename = $table [0];
                // 获取表结构
                               // echo $tablename;die;
                $sql .= $this->_insert_table_structure ( $tablename );
                               // echo $sql;die;
                $data = mysql_query ( "select * from " . $tablename );

                 $num_fields = @mysql_num_fields($data);


                // 循环每条记录
                while ( $record = @mysql_fetch_array ( $data ) )
                                   {
                                        // 单条记录
                    $sql .= $this->_insert_record ( $tablename, $num_fields, $record );
                    // 如果大于分卷大小，则写入文件
                    if (strlen ( $sql ) >= $size * 1000)
                                           {

                        $file = $filename . "_maijin" . $p . ".sql";
                        // 写入文件
                        if ($this->_write_file ( $sql, $file, $dir ))
                                                    {
                                                        echo "-卷-" . $p . "-数据备份完成,生成备份文件<span style='color:#f00;'>$dir$file</span><br />";
                        }
                        else
                        {
                                                       echo "备份卷-" . $p . "-失败<br />";
                        }
                        // 下一个分卷
                        $p ++;
                        // 重置$sql变量为空，重新计算该变量大小
                        $sql = "";
                    }
                }
            }
            // sql大小不够分卷大小
            if ($sql != "")
                            {
                                $filename .= "_maijin" . $p . ".sql";
                if ($this->_write_file ( $sql, $filename, $dir ))
                                    {
                                        return $filename;
                }
                else
               {
                   return 0;
                }
            }
        }
    }

    /**
    198.     * 插入数据库备份基础信息
    199.     *
    200.     * @return string
    201.     */
    private function _retrieve() {
                $value = '';
    $value .= '--' . $this->ds;
        $value .= '-- MySQL database dump' . $this->ds;
        $value .= '-- Created by DBManage class, Power By yanue. ' . $this->ds;
        $value .= '-- http://yanue.net ' . $this->ds;
        $value .= '--' . $this->ds;
        $value .= '-- 主机: ' . $this->host . $this->ds;
        $value .= '-- 生成日期: ' . date ( 'Y' ) . ' 年  ' . date ( 'm' ) . ' 月 ' . date ( 'd' ) . ' 日 ' . date ( 'H:i' ) . $this->ds;
        $value .= '-- MySQL版本: ' . mysql_get_server_info () . $this->ds;
        $value .= '-- PHP 版本: ' . phpversion () . $this->ds;
        $value .= $this->ds;
        $value .= '--' . $this->ds;
        $value .= '-- 数据库: `' . $this->database . '`' . $this->ds;
        $value .= '--' . $this->ds . $this->ds;
        $value .= '-- -------------------------------------------------------';
        $value .= $this->ds . $this->ds;
        return $value;
    }

    /**
    223.     * 插入表结构
    224.     *
    225.     * @param unknown_type $table
    226.     * @return string
    227.     */
    private function _insert_table_structure($table) {
                $sql = '';
        $sql .= "--" . $this->ds;
        $sql .= "-- 表的结构" . $table . $this->ds;
        $sql .= "--" . $this->ds . $this->ds;

        // 如果存在则删除表
        $sql .= "DROP TABLE IF EXISTS `" . $table . '`' . $this->sqlEnd . $this->ds;
        // 获取详细表信息
        $res = mysql_query ( 'SHOW CREATE TABLE `' . $table . '`' );
        $row = mysql_fetch_array ( $res );
        $sql .= $row [1];
                $sql .= $this->sqlEnd . $this->ds;
        // 加上
        $sql .= $this->ds;
        $sql .= "--" . $this->ds;
        $sql .= "-- 转存表中的数据 " . $table . $this->ds;
        $sql .= "--" . $this->ds;
        $sql .= $this->ds;
        return $sql;
    }

    /**
    251.     * 插入单条记录
    252.     *
    253.     * @param string $table
    254.     * @param int $num_fields
    255.     * @param array $record
    256.     * @return string
    257.     */
    private function _insert_record($table, $num_fields, $record) {
                // sql字段逗号分割
        $insert = $comma = "";
        $insert .= "INSERT INTO `" . $table . "` VALUES(";
        // 循环每个子段下面的内容
        for($i = 0; $i < $num_fields; $i ++) {
                       $insert .= ($comma . "'" .mysql_real_escape_string ( $record [$i] ) . "'");
            $comma = ",";
        }
        $insert .= ");" . $this->ds;
        return $insert;
    }

    /**
    272.     * 写入文件
    273.     *
    274.     * @param string $sql
    275.     * @param string $filename
    276.     * @param string $dir
    277.     * @return boolean
    278.     */
    private function _write_file($sql, $filename, $dir) {
                $dir = $dir ? $dir : './backup/';
        // 不存在文件夹则创建
        if (! file_exists ( $dir )) {
                        mkdir ( $dir );
        }
        $re = true;
        if (! @$fp = fopen ( $dir . $filename, "w+" )) {
                       $re = false;
            echo "打开文件失败！";
        }
        if (! @fwrite ( $fp, $sql )) {
                       $re = false;
            echo "写入文件失败，请文件是否可写";
        }
        if (! @fclose ( $fp )) {
                        $re = false;
            echo "关闭文件失败！";
        }
        return $re;
    }

    /*
302.      *
303.      * -------------------------------上：数据库导出-----------分割线----------下：数据库导入--------------------------------
304.      */

    /**
    307.     * 导入备份数据
    308.     * 说明：分卷文件格式20120516211738_all_v1.sql
    309.     * 参数：文件路径(必填)
    310.     *
    311.     * @param string $sqlfile
    312.     */
    function restore($sqlfile)
    {
               // 检测文件是否存在
        if (! file_exists ( $sqlfile ))
                    {
                        exit ( "文件不存在！请检查" );
        }
        $this->lock ( $this->database );
        // 获取数据库存储位置
        $sqlpath = pathinfo ( $sqlfile );
        $this->sqldir = $sqlpath ['dirname'];
        // 检测是否包含分卷，将类似20120516211738_all_v1.sql从_v分开,有则说明有分卷
        $volume = explode ( "_v", $sqlfile );
        $volume_path = $volume [0];
        echo "请勿刷新及关闭浏览器以防止程序被中止，如有不慎！将导致数据库结构受损<br />";
        echo "正在导入备份数据，请稍等！<br />";
        if (empty ( $volume [1] ))
                    {
                       echo "正在导入sql：<span style='color:#f00;'>" . $sqlfile . '</span><br />';
            // 没有分卷
            if ($this->_import ( $sqlfile )) {
                                echo "数据库导入成功！";
            }
            else
            {
                                exit ( '数据库导入失败！' );
            }
        }
        else
        {
                        //$volume_id = array();
            // 存在分卷，则获取当前是第几分卷，循环执行余下分卷
            $volume_id = explode ( ".sq", $volume [1] );
            // 当前分卷为$volume_id
            $volume_id = intval ( $volume_id [0] );
            while ( $volume_id )
                            {
                                $tmpfile = $volume_path . "_v" . $volume_id . ".sql";
                // 存在其他分卷，继续执行
                if (file_exists ( $tmpfile )) {
                                       // 执行导入方法
                    echo "正在导入分卷$volume_id：<span style='color:#f00;'>" . $tmpfile . '</span><br />';
                   if ($this->_import ( $tmpfile ))
                                            {

                    }
                    else
                    {
                                               exit ( "导入分卷$volume_id：<span style='color:#f00;'>" . $tmpfile . '</span>失败！可能是数据库结构已损坏！请尝试从分卷1开始导入' );
                    }
                }
                else
                {
                                      echo "此分卷备份全部导入成功！<br />";
                   return;
                }
                $volume_id++;
            }
        }
    }

    /**
    375.     * 将sql导入到数据库（普通导入）
    376.     *
    377.     * @param string $sqlfile
    378.     * @return boolean
    379.     */
    private function _import($sqlfile) {
                // sql文件包含的sql语句数组
        $sqls = array ();
        $f = fopen ( $sqlfile, "rb" );
        // 创建表缓冲变量
        $create = '';
        while ( ! feof ( $f ) ) {
                        // 读取每一行sql
            $line = fgets ( $f );
            // 如果包含'-- '等注释，或为空白行，则跳过
            if (trim ( $line ) == '' || preg_match ( '/--*?/', $line, $match )) {
                                continue;
            }
            // 如果结尾包含';'(即为一个完整的sql语句，这里是插入语句)，并且不包含'ENGINE='(即创建表的最后一句)，
            if (! preg_match ( '/;/', $line, $match ) || preg_match ( '/ENGINE=/', $line, $match )) {
                                // 将本次sql语句与创建表sql连接存起来
                $create .= $line;
                // 如果包含了创建表的最后一句
                if (preg_match ( '/ENGINE=/', $create, $match )) {
                                        // 则将其合并到sql数组
                    $sqls [] = $create;
                    // 清空当前，准备下一个表的创建
                    $create = '';
                }
                // 跳过本次
                continue;
            }
            $sqls [] = $line;
        }
        fclose ( $f );
        // 循环sql语句数组，分别执行
        foreach ( $sqls as $sql ) {
                        str_replace ( "\n", "", $sql );
            if (! mysql_query ( trim ( $sql ) )) {
                                echo mysql_error ();
                return false;
            }
        }
        return true;
    }

    /*
422.      * -------------------------------数据库导入end---------------------------------
423.      */

    // 关闭数据库连接
    private function close() {
                mysql_close ( $this->db );
    }

    // 锁定数据库，以免备份或导入时出错
    private function lock($tablename, $op = "WRITE") {
                if (mysql_query ( "lock tables " . $tablename . " " . $op ))
                       return true;
        else
            return false;
    }

    // 解锁
    private function unlock() {
                if (mysql_query ( "unlock tables" ))
                        return true;
        else
            return false;
    }

    // 析构
    function __destruct() {
                mysql_query ( "unlock tables", $this->db );
        mysql_close ( $this->db );
    }
}
