<?php

namespace common\widgets;

use yii\base\InvalidConfigException;
use yii\base\Widget;


class DownloadCsvButton extends Widget{	
	public $action_name = "action";
	public $action_value = "download";
	public $id = "i-download-data";

	public function run(){
		//add alert message
		
		return $this->render('download_csv_button', [
			"action_name" => $this->action_name,
			"action_value" => $this->action_value,
			"id" => $this->id,
			//add alert message here
		],
		
	);
		
    }
	
	
}