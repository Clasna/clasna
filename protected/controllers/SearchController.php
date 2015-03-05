<?php
class SearchController extends CController
{
    const ITEMS_PER_PAGE = 10;
 
    // public function actionIndex($query)
    // {
    //     // $from = "(
    //     //     SELECT CONCAT('new_', id) AS id, title, text FROM {{new}} UNION
    //     //     SELECT CONCAT('post_', id) AS id, title, text FROM {{post}} UNION
    //     //     SELECT CONCAT('page_', id) AS id, title, text FROM {{page}}
    //     // )";
    //     $from = "(
    //         SELECT CONCAT('new_', id) AS id, title, text FROM {{product}}
    //     )";          
    //     $where = 'WHERE t.title LIKE :query OR t.text LIKE :query';        
    //     $params = array(
    //         ':query'=>'%' . $query . '%',
    //     );
 
    //     $countSql = 'SELECT COUNT(*) FROM ' . $from . ' AS t ' . $where;
    //     $dataSql = 'SELECT t.* FROM ' . $from . ' AS t ' . $where;
 
    //     $count = Yii::app()->db->createCommand($countSql)->queryScalar($params);
    //     $sqlDataProvider = new CSqlDataProvider($dataSql, array(
    //         'params'=>$params,
    //         'keyField'=>'id',
    //         'totalItemCount'=>$count,
    //         'pagination'=>array(
    //             'pageSize'=>self::ITEMS_PER_PAGE,
    //         ),
    //     ));
 
    //     $this->render('index', array(
    //         'dataProvider'=>$sqlDataProvider,
    //         'query'=>$query,
    //     ));
    // }

    public function actionIndex()
    {
        if(isset($_GET['search'])){
            $query = htmlspecialchars(mysql_escape_string($_GET['search']));
            $from = "SELECT * FROM ";          
            $where = "";        
            $params = array(
                ':query'=>'%' . $query . '%',
            );
     
            $countSql = "SELECT COUNT(*) FROM {{product}} WHERE `name` LIKE '%".$query."%' OR `title` LIKE '%".$query."%'";
            $dataSql = "SELECT * FROM {{product}} WHERE `name` LIKE '%".$query."%' OR `title` LIKE '%".$query."%'";
     
            $count = Yii::app()->db->createCommand($countSql)->queryScalar();
            $sqlDataProvider = new CSqlDataProvider($dataSql, array(
                /*'params'=>$params,*/
                'keyField'=>'id',
                'totalItemCount'=>$count,
                'pagination'=>array(
                    'pageSize'=>self::ITEMS_PER_PAGE,
                ),
            ));
        }

        $this->render('index',array('dataProvider'=>$sqlDataProvider,'query'=>$query)); 
    }
}
?>