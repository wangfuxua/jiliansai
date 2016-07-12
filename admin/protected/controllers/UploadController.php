<?php

class UploadController extends CController {

    private $tool;
    private $uid;

    function init() {
        parent::init();
        Yii::import('application.library.toolkit');
        $this->tool = new toolkit();
        $this->uid = Yii::app()->user->id;
    }

    //编辑器错误
    private function xheditor_error($error) {
        $ret['err'] = $error;
        $ret['msg'] = '11';
        echo json_encode($ret);
        exit();
    }

    /**
     * 
     * bbs部分编辑器上传
     * @return boolean ***
     * @author luxilang
     */
    public function actionbbs_xheditor_upload() {
        if (empty($this->uid))
            $this->xheditor_error("请先登录");

        Yii::import('application.library.toolkit');
        // 生成路径
        $t['y'] = date('Y', time());
        $t['m'] = date('m', time());
        $t['d'] = date('d', time());
        $path = 'attachment/bbs/img/' . $this->uid . '/' . $t['y'] . '/' . $t['m'] . '/' . $t['d'];
        $tool = new toolkit();
        $tool->createFolder($path);

        $picname = $_FILES['filedata']['name'];
        $picsize = $_FILES['filedata']['size'];
        if ($picname != "") {
            if ($picsize > 1024000 * 2)
                $this->xheditor_error("图片大小不能超过2M");
            $info = pathinfo($picname); //限制上传格式 
            $type = $info['extension'];
            if (
                    $type != "gif" && $type != "GIF" && $type != "jpg" && $type != "JPG" && $type != "jpeg" && $type != "JPEG" && $type != "png" && $type != "PNG"
            )
                $this->xheditor_error("图片格式不对！");

            $rand = rand(100, 999);
            $pics = date("YmdHis") . $rand;
            $pic_path = $path . "/" . $pics . "." . $type; //上传路径
            move_uploaded_file($_FILES['filedata']['tmp_name'], $pic_path);
            Yii::import('application.library.thumbhandler');
            $t = new thumbhandler();
            $t->setSrcImg($pic_path);
            $t->setDstImg($pic_path);
            $t->setCutType(0); //0 等比，1 强制
            $t->setImgDisplayQuality(100);
            $t->createImg(650, 1050);
        }
        $size = round($picsize / 1024, 2); //转换成kb 
        $ret['err'] = '';
        $ret['msg'] = array(
            'url' => '!' . base_url() . $pic_path,
            //'url' => '!'.base_url($pic_path).'||'.base_url($pic_path_big),
            'name' => $picname,
            'pic' => $pics,
            'size' => $size
        );
        echo json_encode($ret); //输出json数据 
    }

    //public $layout='main';
    /**
     * 上传群组头像
     */
    public function actionUpload() {
        Yii::import('application.library.toolkit');
        // 生成路径
//        var_dump($_FILES);die;
        $t['y'] = date('y', time());
        $t['m'] = date('m', time());
        $path = 'attachment/game/head/' . $t['y'] . '/' . $t['m'];
        $tool = new toolkit();
        $tool->createFolder($path);

        $action = Yii::app()->request->getParam('act'); //删除群组头像
        if ($action == 'delimg') {
            $filename = $_POST['imagename'];
            //  echo base_url().$path.'/'.$filename;exit;
            if (!empty($filename)) {
                unlink($path . '/' . $filename); //删除图片文件
                echo '1';
            } else {
                echo '删除失败.';
            }
        } else {//上传图片 
            $picname = $_FILES['btn_header']['name'];
            $picsize = $_FILES['btn_header']['size'];
            if ($picname != "") {
                if ($picsize > 1024000 * 2) {//限制上传大小 
                    echo '图片大小不能超过2M';
                    exit;
                }
                $type = strstr($picname, '.'); //限制上传格式 
                if (
                        $type != ".gif" && $type != ".GIF" && $type != ".jpg" && $type != ".JPG" && $type != ".jpeg" && $type != ".JPEG" && $type != ".png" && $type != ".PNG"
                ) {
                    echo '图片格式不对！';
                    exit;
                }
                $rand = rand(100, 999);
                $pics = date("YmdHis") . $rand . $type; //命名图片名称 
                $pic = date("YmdHis") . $rand; //命名图片名称 
                $pic_path = $path . "/" . $pics; //上传路径
                move_uploaded_file($_FILES['btn_header']['tmp_name'], $pic_path);
                // 保存到头像目录，以及分别生成对应尺寸的头像
                //require_once('./plugins/thumbHandler.php');
                //include_once(dirname(dirname(__FILE__))."/library/thumbhandler.php");
                Yii::import('application.library.thumbhandler');
                $t = new thumbhandler();
                //生成120头像
                $t->setSrcImg($path . '/' . $pics);
                $t->setDstImg($path . '/' . $pics);
                //$t->setDstImg($path . '/' . $pic . '_s.jpg');
                $t->setCutType(1); //1 截图，0 等比例缩放
                $newphoto = $t->createImg(125, 125);
                //生成中图
                /* $t->setSrcImg($path . '/' . $pics);
                  $t->setDstImg($path . '/' . $pic . '_m.jpg');
                  $t->setCutType(0);
                  $newphoto = $t->createImg(580, 580); */
            }
            $size = round($picsize / 1024, 2); //转换成kb 
            $arr = array(
                'path' => $pic_path,
                'name' => $picname,
                'pic' => $pics,
                'size' => $size
            );
            echo json_encode($arr); //输出json数据 
        }
    }

    //public $layout='main';
    /**
     * 
     */
    public function actionUploadheader() {
        $uid = $this->uid ? $this->uid : Yii::app()->request->getParam('uid');
        // 如果没登录则T到登录页面
        if (!$uid) {
            Yii::app()->user->returnUrl = base_url("passport/checkdoctor");
            $this->redirect('/passport/login');
        }
        $type = $_GET;
        // 生成对应路径
        $t = time();
        $dir1 = substr($uid, 0, 3);
        $dir2 = substr($uid, 3, 2);
        $path = "attachment/header/{$dir1}/{$dir2}";
        $this->tool->createFolder($path);
        // upload
        $file = CUploadedFile::getInstanceByName("btn_header");
        // print_r($file); die;
        $savename = "./{$path}/{$uid}";
        $name = "{$savename}_b.{$file->extensionName}";

        // 处理图片
        $ret['status'] = 0;
        if ($file->saveAs($name)) {
            Yii::import('application.library.easyimage.EasyImage');
            $image = new EasyImage($name);
            $name_b = "{$savename}.jpg";
            // $image->resize(113, 123, EasyImage::RESIZE_NONE);
            $image->resize(100, 100);
            $image->save($name_b);

//			// $image = new EasyImage($name);
//			$image->resize(54, 59);
//			$image->save("{$savename}_s.jpg");
//
//			// $image = new EasyImage($name);
//			$image->resize(62, 76);
//			$image->save("{$savename}_m.jpg");

            $ret['status'] = 1;
            $ret['url'] = ltrim($name_b, './');
        }

        // 如果变更了文件类型，则删除源文件
        if ('jpg' !== strtolower($file->extensionName)) {
            unlink($name);
        }

        echo json_encode($ret);
        die;
        // $this->redirect(array('index','dir'=>$currentDir));
    }

    
    
      public function actionGoodsimg() {
        $uid = $this->uid ? $this->uid : Yii::app()->request->getParam('uid');
        // 如果没登录则T到登录页面
        if (!$uid) {
            Yii::app()->user->returnUrl = base_url("passport/checkdoctor");
            $this->redirect('/passport/login');
        }
        $type = $_GET;
        // 生成对应路径
        $t = time();
        $dir1 = substr($uid, 0, 3);
        $dir2 = substr($uid, 3, 2);
        $path = "attachment/goodsimg/{$dir1}/{$dir2}";
        $this->tool->createFolder($path);
        // upload
        $file = CUploadedFile::getInstanceByName("goodsimgs");
        // print_r($file); die;
        $savename = "./{$path}/{$t}";
        $name = "{$savename}_b.{$file->extensionName}";

        // 处理图片
        $ret['status'] = 0;
        if ($file->saveAs($name)) {
            Yii::import('application.library.easyimage.EasyImage');
            $image = new EasyImage($name);
            $name_b = "{$savename}.jpg";
            // $image->resize(113, 123, EasyImage::RESIZE_NONE);
            $image->resize(100, 100);
            $image->save($name_b);

//			// $image = new EasyImage($name);
//			$image->resize(54, 59);
//			$image->save("{$savename}_s.jpg");
//
//			// $image = new EasyImage($name);
//			$image->resize(62, 76);
//			$image->save("{$savename}_m.jpg");

            $ret['status'] = 1;
            $ret['url'] = ltrim($name_b, './');
        }

        // 如果变更了文件类型，则删除源文件
        if ('jpg' !== strtolower($file->extensionName)) {
            unlink($name);
        }

        echo json_encode($ret);
        die;
        // $this->redirect(array('index','dir'=>$currentDir));
    }
    /**
     * 上传活动
     */
    public function actioneventupload() {
        Yii::import('application.library.toolkit');
        // 生成路径
        $t['y'] = date('y', time());
        $t['m'] = date('m', time());
        $path = 'attachment/event/head/' . $t['y'] . '/' . $t['m'];
        $tool = new toolkit();
        $tool->createFolder($path);

        $action = Yii::app()->request->getParam('act'); //删除群组头像
        if ($action == 'delimg') {
            $filename = $_POST['imagename'];
            //  echo base_url().$path.'/'.$filename;exit;
            $pic_name = explode('.', $filename); //获取图片名称
            if (!empty($filename)) {
                unlink($path . '/' . $filename);
                unlink($path . '/' . $pic_name['0'] . '_thumb.jpg'); //删除小图
                unlink($path . '/' . $pic_name['0'] . '_middle_thumb.jpg'); //删除中图
                echo '1';
            } else {
                echo '删除失败.';
            }
        } else {//上传图片 
            $picname = $_FILES['mypic']['name'];
            $picsize = $_FILES['mypic']['size'];
            if ($picname != "") {
                if ($picsize > 1024000 * 2) {//限制上传大小 
                    echo '图片大小不能超过2M';
                    exit;
                }
                $type = strstr($picname, '.'); //限制上传格式 
                if (
                        $type != ".gif" && $type != ".GIF" && $type != ".jpg" && $type != ".JPG" && $type != ".jpeg" && $type != ".JPEG" && $type != ".png" && $type != ".PNG"
                ) {
                    echo '图片格式不对！';
                    exit;
                }
                $rand = rand(100, 999);
                $pics = date("YmdHis") . $rand . $type; //命名图片名称 
                $pic = date("YmdHis") . $rand; //命名图片名称 
                $pic_path = $path . "/" . $pics; //上传路径
                move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
                // 保存到头像目录，以及分别生成对应尺寸的头像
                //require_once('./plugins/thumbHandler.php');
                //include_once(dirname(dirname(__FILE__))."/library/thumbhandler.php");
                Yii::import('application.library.thumbhandler');
                $t = new thumbhandler();
                //生成120头像
                $t->setSrcImg($path . '/' . $pics);
                $t->setDstImg($path . '/' . $pics);
                $t->setDstImg($path . '/' . $pic . '_thumb.jpg');
                $t->setCutType(1); //1 截图，0 等比例缩放
                $newphoto = $t->createImg(120, 120);
                //生成中图
                $t->setSrcImg($path . '/' . $pics);
                $t->setDstImg($path . '/' . $pic . '_middle_thumb.jpg');
                $t->setCutType(0);
                $newphoto = $t->createImg(580, 580);
            }
            $size = round($picsize / 1024, 2); //转换成kb 
            $arr = array(
                'path' => $pic_path,
                'path_img' => $path . '/' . $pic,
                'name' => $picname,
                'pic' => $pics,
                'size' => $size
            );
            echo json_encode($arr); //输出json数据 
        }
    }

    /**
     * 上传编辑器照片
     */
    public function actionxheditor_upload() {
        Yii::import('application.library.toolkit');
        // 生成路径
        $t['y'] = date('y', time());
        $t['m'] = date('m', time());
        $path = 'attachment/group/article/' . $t['y'] . '/' . $t['m'];
        $tool = new toolkit();
        $tool->createFolder($path);

        //var_dump($_FILES['filedata']); exit;
        //上传图片 
        $picname = $_FILES['filedata']['name'];
        $picsize = $_FILES['filedata']['size'];
        if ($picname != "") {
            if ($picsize > 1024000 * 2) {//限制上传大小 
                $this->xheditor_error("图片大小不能超过2M");
                exit;
            }
            //$type = strstr($picname, '.');//限制上传格式 
            $info = pathinfo($picname); //限制上传格式 
            $type = $info['extension'];
            if (
                    $type != "gif" && $type != "GIF" && $type != "jpg" && $type != "JPG" && $type != "jpeg" && $type != "JPEG" && $type != "png" && $type != "PNG"
            ) {
                echo '图片格式不对！';
                exit;
            }
            $rand = rand(100, 999);
            //$pics = date("YmdHis") . $rand . $type;//命名图片名称 
            //$pic_path = $path."/". $pics;//上传路径
            $pics = date("YmdHis") . $rand;
            $pic_path = $path . "/" . $pics . "." . $type; //上传路径
            $pic_path_big = $path . "/" . $pics . "_big." . $type; //上传路径
            //move_uploaded_file($_FILES['filedata']['tmp_name'], $pic_path);
            move_uploaded_file($_FILES['filedata']['tmp_name'], $pic_path_big);
            //缩略图
            Yii::import('application.library.thumbhandler');
            $t = new thumbhandler();
            $t->setSrcImg($pic_path_big);
            $t->setDstImg($pic_path);
            $t->setCutType(0); //0 等比，1 强制
            $t->createImg(650, 650);
        }
        $size = round($picsize / 1024, 2); //转换成kb 
        $ret['err'] = '';
        $ret['msg'] = array(
            //'url' => '!'.base_url($pic_path),
            'url' => '!' . base_url($pic_path) . '||' . base_url($pic_path_big),
            'name' => $picname,
            'pic' => $pics,
            'size' => $size
        );

//var_dump($ret);
        echo json_encode($ret); //输出json数据 
    }

    /**
     * 上传文件
     */
    public function actionxheditor_upload_file() {
        //header('Content-Type: text/html; charset=UTF-8');
        Yii::import('application.library.toolkit');
        // 生成路径
        $t['y'] = date('y', time());
        $t['m'] = date('m', time());
        $path = 'attachment/group/article/' . $t['y'] . '/' . $t['m'];
        $tool = new toolkit();
        $tool->createFolder($path);

        //var_dump($_FILES['filedata']); exit;
        //上传图片 
        $picname = $_FILES['filedata']['name'];
        $picsize = $_FILES['filedata']['size'];

        if ($picname != "") {
            if ($picsize > 1024000 * 20) {//限制上传大小 
                $this->xheditor_error("文件大小不能超过20M");
                exit;
            }
            //$type = strstr($picname, '.');//限制上传格式 
            $info = pathinfo($picname); //限制上传格式 
            $type = $info['extension'];
            //Qii::dump($type);//exit;
            if (
                    $type != "zip" && $type != "rar" && $type != "txt" && $type != "doc" && $type != "docx" && $type != "ppt" && $type != "pptx" && $type != "xls" && $type != "xlsx" && $type != "pdf"
            ) {
                echo '文件格式不对！';
                exit;
            }
            $rand = rand(100, 999);
            $pics = date("YmdHis") . $rand . "." . $type; //命名图片名称 
            //$pic_path = $path."/". $pics;//上传路径
            //$pics = date("YmdHis") . $rand;
            $pic_path = $path . "/" . $pics; //上传路径
            move_uploaded_file($_FILES['filedata']['tmp_name'], $pic_path);
        }
        $picname = str_replace(" ", "", "$picname");
        $size = round($picsize / 1024, 2); //转换成kb 
        $ret['err'] = '';
        $ret['msg'] = array(
            'url' => '!' . base_url($pic_path) . '||' . $picname,
            'name' => $picname,
            'pic' => $pics,
            'size' => $size
        );


        echo json_encode($ret); //输出json数据 
    }

    /**
     * 上传问诊图片
     */
    public function actionInquiry_Upload() {
        Yii::import('application.library.toolkit');
        // 生成路径
        $t['y'] = date('y', time());
        $t['m'] = date('m', time());
        $path = 'attachment/inquiry/' . $t['y'] . '/' . $t['m'];
        $tool = new toolkit();
        $tool->createFolder($path);

        $action = Yii::app()->request->getParam('act'); //删除群组头像
        if ($action == 'delimg') {
            $filename = $_POST['imagename'];
            //  echo base_url().$path.'/'.$filename;exit;
            $pic_name = explode('.', $filename); //获取图片名称
            if (!empty($filename)) {
                unlink($path . '/' . $filename); //删除图片文件
                unlink($path . '/' . $pic_name['0'] . '_s.jpg'); //删除小图
                unlink($path . '/' . $pic_name['0'] . '_m.jpg'); //删除中图
                echo '1';
            } else {
                echo '删除失败.';
            }
        } else {//上传图片 
            $picname = $_FILES['mypic']['name'];
            $picsize = $_FILES['mypic']['size'];
            if ($picname != "") {
                if ($picsize > 1024000 * 2) {//限制上传大小 
                    echo '图片大小不能超过2M';
                    exit;
                }
                $type = strstr($picname, '.'); //限制上传格式 
                if (
                        $type != ".gif" && $type != ".GIF" && $type != ".jpg" && $type != ".JPG" && $type != ".jpeg" && $type != ".JPEG" && $type != ".png" && $type != ".PNG"
                ) {
                    echo '图片格式不对！';
                    exit;
                }
                $rand = rand(100, 999);
                //$pics = date("YmdHis") . $rand . $type;//命名图片名称 
                $pics = date("YmdHis") . $rand . '.jpg'; //命名图片名称 
                $pic = date("YmdHis") . $rand; //命名图片名称 
                $pic_path = $path . "/" . $pics; //上传路径
                move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
                // 保存到头像目录，以及分别生成对应尺寸的头像
                Yii::import('application.library.thumbhandler');
                $t = new thumbhandler();
                //生成120头像
                $t->setSrcImg($path . '/' . $pics);
                //$t->setDstImg($path . '/' . $pics);
                $t->setDstImg($path . '/' . $pic . '_s.jpg');
                $t->setCutType(1); //1 截图，0 等比例缩放
                $newphoto = $t->createImg(120, 120);
                //生成中图
                $t->setSrcImg($path . '/' . $pics);
                $t->setDstImg($path . '/' . $pic . '_m.jpg');
                $t->setCutType(0);
                $newphoto = $t->createImg(580, 580);
            }
            $size = round($picsize / 1024, 2); //转换成kb 
            $arr = array(
                //'path'=>$pic_path,
                'path' => $path . '/' . $pic . '_m.jpg',
                'path_s' => $path . '/' . $pic . '_s.jpg',
                'name' => $picname,
                'pic' => $pics,
                'size' => $size
            );
            echo json_encode($arr); //输出json数据 
        }
    }

    public function actionUploadidcard() {
        $uid = $this->uid ? $this->uid : Yii::app()->request->getParam('uid');
        // 如果没登录则T到登录页面
        if (!$uid) {
            Yii::app()->user->returnUrl = base_url("passport/checkdoctor");
            $this->redirect('/passport/login');
        }
        $type = $_GET;
        // 生成对应路径
        $t = time();
        $dir1 = substr($uid, 0, 3);
        $dir2 = substr($uid, 3, 2);
        $path = "attachment/card/{$dir1}/{$dir2}";
        $this->tool->createFolder($path);
        // upload
        $file = CUploadedFile::getInstanceByName("btn_header");
        // print_r($file); die;
        $savename = "./{$path}/{$uid}";
        $name = "{$savename}_{$type['type']}.{$file->extensionName}";

        // 处理图片
        $ret['status'] = 0;
        if ($file->saveAs($name)) {
            Yii::import('application.library.easyimage.EasyImage');
            $image = new EasyImage($name);
            $name_b = "{$savename}_{$type['type']}.jpg";

            $name_b2 = "{$savename}_{$type['type']}_y.jpg";
            $image->save($name_b2);
            // $image->resize(113, 123, EasyImage::RESIZE_NONE);
            $image->resize(150, 350);
            $image->save($name_b);
            $ret['status'] = 1;
            $ret['url'] = ltrim($name_b, './');
        }

        // 如果变更了文件类型，则删除源文件
        if ('jpg' !== strtolower($file->extensionName)) {
            unlink($name);
        }

        echo json_encode($ret);
        die;
        // $this->redirect(array('index','dir'=>$currentDir));
    }

    public function actionUploadPaper() {
        $uid = $this->uid ? $this->uid : Yii::app()->request->getParam('uid');
        // 如果没登录则T到登录页面
        if (!$uid) {
            Yii::app()->user->returnUrl = base_url("passport/checkdoctor");
            $this->redirect('/passport/login');
        }
        // 生成对应路径
        $t = time();
        $dir1 = substr($uid, 0, 3);
        $dir2 = substr($uid, 3, 2);
        $path = "attachment/paper/{$dir1}/{$dir2}";
        $this->tool->createFolder($path);
        // upload
        $loc = Yii::app()->request->getParam('loc');
        $file = CUploadedFile::getInstanceByName("btn_paper_{$loc}");
        // print_r($file); die;
        $name = "./{$path}/{$uid}_{$loc}.{$file->extensionName}";
        // $name = "./{$path}/{$uid}_{$loc}.jpg";
        $file->saveAs($name);
        // 处理图片
        $ret['status'] = 0;
        Yii::import('application.library.easyimage.EasyImage');
        $image = new EasyImage($name);
        $image->resize(1000);
        $savename = "./{$path}/{$uid}_{$loc}.jpg";
        if ($image->save($savename)) {
            $ret['status'] = 1;
            $ret['url'] = ltrim($savename, './');
        }

        // 如果变更了文件类型，则删除源文件
        if ('jpg' !== strtolower($file->extensionName)) {
            unlink($name);
        }

        echo json_encode($ret);
        die;
        // $this->redirect(array('index','dir'=>$currentDir));
    }

    //上传微博图片
    public function actionmicroblogupload() {
        Yii::import('application.library.toolkit');
        // 生成路径
        $t['y'] = date('y', time());
        $t['m'] = date('m', time());
        $path = 'attachment/microblog/head/' . $t['y'] . '/' . $t['m'];
        $tool = new toolkit();
        $tool->createFolder($path);

        $action = Yii::app()->request->getParam('act'); //删除群组头像
        if ($action == 'delimg') {
            $filename = $_POST['imagename'];
            $pic_name = explode('.', $filename); //获取图片名称
            //  echo base_url().$path.'/'.$filename;exit;
            if (!empty($filename)) {
                unlink($path . '/' . $filename); //删除图片文件
                unlink($path . '/' . $pic_name['0'] . "_s.jpg");
                unlink($path . '/' . $pic_name['0'] . "_m.jpg");
                echo '1';
            } else {
                echo '删除失败.';
            }
        } else {//上传图片 
            $picname = $_FILES['mypic']['name'];
            $picsize = $_FILES['mypic']['size'];
            if ($picname != "") {
                if ($picsize > 1024000 * 2) {//限制上传大小 
                    echo '图片大小不能超过2M';
                    exit;
                }
                $type = strstr($picname, '.'); //限制上传格式 
                if (
                        $type != ".gif" && $type != ".GIF" && $type != ".jpg" && $type != ".JPG" && $type != ".jpeg" && $type != ".JPEG" && $type != ".png" && $type != ".PNG"
                ) {
                    echo '图片格式不对！';
                    exit;
                }
                $rand = rand(100, 999);
                $pics = date("YmdHis") . $rand . $type; //命名图片名称 
                $pic = date("YmdHis") . $rand; //命名图片名称 
                $pic_path = $path . "/" . $pics; //上传路径
                move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
                // 保存到头像目录，以及分别生成对应尺寸的头像
                //require_once('./plugins/thumbHandler.php');
                //include_once(dirname(dirname(__FILE__))."/library/thumbhandler.php");
                Yii::import('application.library.thumbhandler');
                $t = new thumbhandler();
                //生成120头像
                $t->setSrcImg($path . '/' . $pics);
                $t->setDstImg($path . '/' . $pics);
                $t->setDstImg($path . '/' . $pic . '_s.jpg');
                $t->setCutType(0); //1 截图，0 等比例缩放
                $newphoto = $t->createImg(120, 120);
                //生成中图
                $t->setSrcImg($path . '/' . $pics);
                $t->setDstImg($path . '/' . $pics);
                $t->setDstImg($path . '/' . $pic . '_m.jpg');
                $t->setCutType(0);
                $newphoto = $t->createImg(1000, 1000);
            }
            $size = round($picsize / 1024, 2); //转换成kb 
            $arr = array(
                'paths' => $pic_path,
                'name' => $picname,
                'pic' => $pics,
                'size' => $size
            );
            echo json_encode($arr); //输出json数据 
        }
    }

    /**
     * 资料文献上传文件
     */
    public function actionresource_upload_file() {

        //header('Content-Type: text/html; charset=UTF-8');
        Yii::import('application.library.toolkit');
        // 生成路径
        $t['y'] = date('y', time());
        $t['m'] = date('m', time());
        $path = 'attachment/resource/' . $t['y'] . '/' . $t['m'];
        $tool = new toolkit();
        $tool->createFolder($path);
        $action = Yii::app()->request->getParam('act'); //删除群组头像
        if ($action == 'delimg') {
            $filename = $_POST['imagename'];
            $pic_name = explode('.', $filename); //获取图片名称
            //  echo base_url().$path.'/'.$filename;exit;
            if (!empty($filename)) {
                if (!!file_exists($filename)) {
                    //unlink($path.'/'.$filename);//删除图片文件
                    unlink($filename); //删除图片文件
                    echo '1';
                } else {
                    echo '文件不存在.';
                }
            } else {
                echo '删除失败.';
            }
        } else {//上传图片 
            //var_dump($_FILES['filedata']); exit;
            //上传图片 
            $filename = $_FILES['filedata']['name'];
            $filesize = $_FILES['filedata']['size'];

            if ($filename != "") {
                if ($filesize > 1024000 * 20) {//限制上传大小 
                    echo '文件大小不能超过20M';
                    exit;
                }
                //$type = strstr($filename, '.');//限制上传格式 
                $info = pathinfo($filename); //限制上传格式 
                $type = $info['extension'];
                //Qii::dump($type);//exit;
                if (
                        $type != "doc" && $type != "docx" && $type != "ppt" && $type != "pptx" && $type != "xls" && $type != "xlsx" && $type != "pdf"
                ) {
                    echo '文件格式不对！';
                    exit;
                }
                $rand = rand(100, 999);
                $file = date("YmdHis") . $rand . "." . $type; //命名图片名称 
                $swf = date("YmdHis") . $rand . ".swf"; //命名图片名称 
                $title = $_FILES['filedata']['name'];
                $docurl = $path . "/" . $swf;
                $downurl = $path . "/" . $file; //上传路径
                move_uploaded_file($_FILES['filedata']['tmp_name'], $downurl);
            }
            //$title=str_replace(" ","","$filename");
            $size = round($filesize / 1024, 2); //转换成kb 
            //$ret['err'] = '';
            $d = array(
                //'url' => base_url($swf_path),

                'docurl' => $docurl,
                'downurl' => $downurl,
                'title' => $title,
                'size' => $size,
                'type' => $type
            );


            echo json_encode($d); //输出json数据 
        }
    }

    /**
     * 资料文献上传文件
     */
    public function actioncase_upload_file() {

        //header('Content-Type: text/html; charset=UTF-8');
        Yii::import('application.library.toolkit');
        // 生成路径
        $t['y'] = date('y', time());
        $t['m'] = date('m', time());
        $path = 'attachment/case/' . $t['y'] . '/' . $t['m'];
        $tool = new toolkit();
        $tool->createFolder($path);
        $action = Yii::app()->request->getParam('act'); //删除群组头像
        if ($action == 'delimg') {
            $filename = $_POST['imagename'];
            $pic_name = explode('.', $filename); //获取图片名称
            //  echo base_url().$path.'/'.$filename;exit;
            if (!empty($filename)) {
                unlink($path . '/' . $filename); //删除图片文件
                echo '1';
            } else {
                echo '删除失败.';
            }
        } else {//上传图片 
            //var_dump($_FILES['filedata']); exit;
            //上传图片 
            $filename = $_FILES['filedata']['name'];
            $filesize = $_FILES['filedata']['size'];

            if ($filename != "") {
                if ($filesize > 1024000 * 20) {//限制上传大小 
                    echo '文件大小不能超过20M';
                    exit;
                }
                //$type = strstr($filename, '.');//限制上传格式 
                $info = pathinfo($filename); //限制上传格式 
                $type = $info['extension'];
                //Qii::dump($type);//exit;
                if (
                        $type != "doc" && $type != "docx" && $type != "ppt" && $type != "pptx" && $type != "xls" && $type != "xlsx" && $type != "pdf"
                ) {
                    echo '文件格式不对！';
                    exit;
                }
                $rand = rand(100, 999);
                $file = date("YmdHis") . $rand . "." . $type; //命名图片名称 
                $swf = date("YmdHis") . $rand . ".swf"; //命名图片名称 
                $title = $_FILES['filedata']['name'];
                $docurl = $path . "/" . $swf;
                $downurl = $path . "/" . $file; //上传路径
                move_uploaded_file($_FILES['filedata']['tmp_name'], $downurl);
            }
            //$title=str_replace(" ","","$filename");
            $size = round($filesize / 1024, 2); //转换成kb 
            //$ret['err'] = '';
            $d = array(
                //'url' => base_url($swf_path),

                'docurl' => $docurl,
                'downurl' => $downurl,
                'title' => $title,
                'size' => $size,
                'type' => $type
            );


            echo json_encode($d); //输出json数据 
        }
    }

    private function createPath($p = 'tmp') {
        // 生成路径
        $t = time();
        $y = date('y', $t);
        $m = date('m', $t);
        // $dh = date('dH', $t);
        $path = "attachment/{$p}/{$y}/{$m}";
        // $path = "attachment/{$p}/{$t['y']}/{$t['m']}";
        $this->tool->createFolder($path);
        return $path;
    }
    
    
    public function actionUploadgoodsimg() {
        $uid = $this->uid ? $this->uid : Yii::app()->request->getParam('uid');
        // 如果没登录则T到登录页面
        if (!$uid) {
            Yii::app()->user->returnUrl = base_url("passport/checkdoctor");
            $this->redirect('/passport/login');
        }
        $type = $_GET;
        // 生成对应路径
        $t = time();
        $dir1 = substr($uid, 0, 3);
        $dir2 = substr($uid, 3, 2);
        $path = "attachment/goods/{$dir1}/{$dir2}";
        $this->tool->createFolder($path);
        // upload
        $file = CUploadedFile::getInstanceByName("goodsimg");
        // print_r($file); die;
        $savename = "./{$path}/{$t}";
        $name = "{$savename}_{$type['type']}.{$file->extensionName}";

        // 处理图片
        $ret['status'] = 0;
        if ($file->saveAs($name)) {
            Yii::import('application.library.easyimage.EasyImage');
            $image = new EasyImage($name);
            $name_b = "{$savename}_{$type['type']}.jpg";

            $name_b2 = "{$savename}_{$type['type']}_s.jpg";
            $image->save($name_b);
            // $image->resize(113, 123, EasyImage::RESIZE_NONE);
            $image->resize(150, 350);
            $image->save($name_b2);
            $ret['status'] = 1;
            $ret['url'] = ltrim($name_b, './');
        }

        // 如果变更了文件类型，则删除源文件
        if ('jpg' !== strtolower($file->extensionName)) {
            unlink($name);
        }

        echo json_encode($ret);
        die;
        // $this->redirect(array('index','dir'=>$currentDir));
    }

     public function actionUploaddesignerimg() {
        $uid = $this->uid ? $this->uid : Yii::app()->request->getParam('uid');
        // 如果没登录则T到登录页面
        if (!$uid) {
            Yii::app()->user->returnUrl = base_url("passport/checkdoctor");
            $this->redirect('/passport/login');
        }
        $type = $_GET;
        // 生成对应路径
        $t = time();
        $dir1 = substr($uid, 0, 3);
        $dir2 = substr($uid, 3, 2);
        $path = "attachment/designer/{$dir1}/{$dir2}";
        $this->tool->createFolder($path);
        // upload
        $file = CUploadedFile::getInstanceByName("designersimg");
        // print_r($file); die;
        $savename = "./{$path}/{$t}";
        $name = "{$savename}_{$type['type']}.{$file->extensionName}";

        // 处理图片
        $ret['status'] = 0;
        if ($file->saveAs($name)) {
            Yii::import('application.library.easyimage.EasyImage');
            $image = new EasyImage($name);
            $name_b = "{$savename}_{$type['type']}.jpg";

            $name_b2 = "{$savename}_{$type['type']}_s.jpg";
            $image->save($name_b);
            // $image->resize(113, 123, EasyImage::RESIZE_NONE);
            $image->resize(150, 350);
            $image->save($name_b2);
            $ret['status'] = 1;
            $ret['url'] = ltrim($name_b, './');
        }

        // 如果变更了文件类型，则删除源文件
        if ('jpg' !== strtolower($file->extensionName)) {
            unlink($name);
        }

        echo json_encode($ret);
        die;
        // $this->redirect(array('index','dir'=>$currentDir));
    }
}
