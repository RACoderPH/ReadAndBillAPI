<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\db\Query;
use yii\web\ServerErrorHttpException;

class AppDownloadCsv extends Component{    
   
   public $action_name = "action";
   public $action_value = "download";
   public $data_provider;
   public $columns;
   public $filename = "data.csv";
   public $max_rows = 5000;

   public function init(){
        if(empty($this->data_provider) || empty($this->columns))
            throw new InvalidConfigException("Missing required paramater(s) for ".self::class);
        
        parent::init();
   }

    public function watch(){
        if(isset($_GET[$this->action_name]) && strtolower($_GET[$this->action_name]) == strtolower($this->action_value) ){
            
            $this->data_provider->pagination = false;
            
            if($this->_max_rows_reached()){            
                throw new ServerErrorHttpException("Hello. Your download request is too big, please use the filter to reduce the number of items. Limit to ".$this->max_rows." rows");
            }

            $models = $this->data_provider->getModels();
            $arr = [];
            foreach($models as $model){                
                $row = [];
                foreach($this->columns as $label => $datacol){
                    $row[] = $model->$datacol;
                }            
                $arr[] = $row;
            }
    
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename=$this->filename");
            header("Pragma: no-cache");
            header("Expires: 0");
            echo implode(", ",array_keys($this->columns))."\n";
            echo $this->_arrayToCsv($arr);
            exit();
        }
    }

    //Renders a button that would trigger the download request
    public function button(string $name, array $options = []){
        $action_name = $this->action_name;
	    $action_value = $this->action_value;
	    $id = isset($options["id"]) ? $options["id"] : uniqid();
        if(!empty($options["id"])){
            $id = $options["id"];
            unset($options["id"]); //remove it from the array so it wont be doubled rendered by the Html::renderTagAttributes($options);
        }else{
            $id = uniqid();
        }

        require __DIR__."/../partials/_app_download_csv_button.php";
    }


    /**Use this native sql to count the data instead count($this->>data_provider->getModels()) as that would result to server memory limit if the $models objects are too large*/
    private function _max_rows_reached(){
        $sql = $this->data_provider->query->createCommand()->getRawSql();            
        $query = (new Query())->select('COUNT(*)')
                ->from(['subquery' => "($sql)"]); // Wrap the original query as a subquery            
        $rows = $query->scalar();
        return ($rows > $this->max_rows) ? true : false;
    }


    private function _arrayToCsv($data) {        
        # don't create a file, use memory instead
        $fp = fopen('php://temp', 'rw');
        foreach ($data as $row) {
            fputcsv($fp, $row);
        }
        rewind($fp); //move to start of stream so we can stream_get_contents properly
        $csv_data = stream_get_contents($fp);   
        fclose($fp);        
        return $csv_data;
    }

    
}
