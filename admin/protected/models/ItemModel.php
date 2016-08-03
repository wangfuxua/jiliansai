<?php
class ItemModel extends CommonModel{
    function init(){
        parent::init();
    }
    function GetItems(){
        $criteria = new CDbCriteria;
        $item=new Dtable('items');
        $num=$item->count();
//        echo $num;die;
        $page=new CPagination($num);
        $page->pageSize=20;//每页数量
        $page->applyLimit($criteria);
        $criteria->limit=$page->pageSize;
        $criteria->offset=$page->currentPage*$page->pageSize;
        $dd= $item->findAll($criteria);
        return array('data'=>$dd,'page'=>$page);
    }
    /*
     * 获取比赛人数
     * */
    public function GetPnums(){
        $item=new Dtable('pnums');
        return $item->findAll();
    }
    /*
     * 添加项目
     * */
    public function AddItem($data=''){
        if(!$data) return 0;
        $item=new Dtable('items');
        $item->name=$data['name'];
        $item->logo=$data['logo'];
        $item->p_num=implode(',',$data['p_num']);
        $item->intr=$data['intr'];
        $item->timeline=time();
        return $item->save();
    }
    /*
     * 获取比赛
     * 若给了项目则获取该项目的比赛  没有则获取所有的比赛
     * */
    public function GetganmeByI($itemid=0){
           $game=new Dtable('games');
         $criteria = new CDbCriteria;
        if($itemid){
        $criteria->addCondition('item_id='.$itemid);
        }
        return $game->findAll($criteria);
    }
    /*
     *添加比赛
     * */
    public function Addgame($data){
        $game=new Dtable('games');
        $game->item_id=$data['item_id'];
        $game->pnum=$data['pnum'];
        $game->stime=strtotime($data['stime']);
        $game->etime=strtotime($data['etime']);
        $game->turn=1;
        $game->verify_id=implode($data['verify_id']);
        $game->timeline=time();
        return $game->save();
    }
    /*
     * 分组
     *group 分的组 例如 1 组
     * tids  所选的队伍
     * */
     public function AddGoup($data,$group,$tids){
        $group=new Dtable('group');
         $t=time();
        foreach($tids as $v){
        $group->game_id=$data['game_id'];
            $group->group=$group;
            $group->turn=$data['turn'];
            $group->tid=$v;
            $group->timeline=$t;;
        }
     }
   /*
    * 跟新比赛轮次
    * $type  为真则强制更新
    * */
    function Upturn($gameid=0,$type=0){
            if(!$gameid) return 0;
            if(!$type){
                $sql="select id from `jls_groups` where status=0";
                $command = Yii::app()->db->createCommand($sql);
                $r= $command->queryScalar();
                if($r){
                    return -1;
                }
            }
       $sql="update `jls_games` set `turn`=`turn`+1 where `id`=:id";
        return Yii::app()->db->createCommand($sql)->bindParam(':id',$gameid)->execute();
    }
    /*
     * 获取比赛的人数要求
     * */
    function GetPnumByI($itemid){
        $sql="select p_num from `jls_items` where id={$itemid}";
        $data= Yii::app()->db->createCommand($sql)->queryScalar();
        $data=explode(',',$data);
        $datas=[];
        foreach($data as $v){
            $sql="select * from `jls_pnums` where id={$v}";
            $datas[]= Yii::app()->db->createCommand($sql)->queryRow();
        }
        return $datas;
        var_dump($data);die;
    }
    /*
     * 获取项目名称
     * */
    function GetItemByI($itemid){
        $sql="select id,name from `jls_items` where id={$itemid}";
       return  Yii::app()->db->createCommand($sql)->queryRow();
    }
    /*
     * 获取验证项
     * */
      function GetVers(){
          $sql="select * from `jls_vervitys`";
          return  Yii::app()->db->createCommand($sql)->queryAll();
      }
    /*
     * 获取所有项目
     * */
    function GetItemsBySql(){
        $sql="select * from `jls_items`";
        return  Yii::app()->db->createCommand($sql)->queryAll();
    }
    /*
     * 获取所有比赛
     * */
    function GetGames($item){
        $criteria = new CDbCriteria;
        $w='where 1';
        if($item){
            $w.=' and item_id='.$item;
        }
        $sql="select count(1) from `jls_games`".$w;
        $num=Yii::app()->db->createCommand($sql)->queryScalar();;
//        echo $num;die;
        if($item){
            $w.=' and a.item_id='.$item;
        }
        $page=new CPagination($num);
        $page->pageSize=20;//每页数量
         $sql="select a.*,b.name from `jls_games` as a left join `jls_items` as b on a.item_id=b.id  {$w}";
        $sql=$sql." limit :offset,:limit";
        $page->applyLimit($criteria);
        $model=Yii::app()->db->createCommand($sql);
        $model->bindValue(':offset',$page->currentPage*$page->pageSize);
        $model->bindValue(':limit',$page->pageSize);
        $data=$model->queryAll();
        foreach($data as $k=>$v){
            $data[$k]['bmnum']=$this->GetTnumByG($v['id']);
            $data[$k]['fznum']=$this->GetGnumByG($v['turn'],$v['id']);
        }
//        var_dump($data);die;
        return array('data'=>$data,'page'=>$page);
    }

    /*
     * 获取报名比赛的队伍数量
     * */
    function GetTnumByG($gameid){
            if(!$gameid) return 0;
        $sql="select count(1) from `jls_teams` where game_id={$gameid}";
       return  Yii::app()->db->createCommand($sql)->queryScalar();;
    }

    /*
     * 获取轮次的已经分组的队伍数量
     * */
    function GetGnumByG($turn,$gameid){
        if(!$turn and !$gameid ) return 0;
        if($turn){
            $w=' and turn='.$turn;
        }
        if($gameid){
            $w=' and game_id='.$gameid;
        }else{
            return 0;
        }
        $sql="select count(1) from `jls_groups` where 1".$w;
        return  Yii::app()->db->createCommand($sql)->queryScalar();;
    }

}

?>