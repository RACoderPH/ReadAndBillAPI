<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\FileHelper; 
use yii\helpers\BaseFileHelper; 
use Imagine\Gd\Imagine;
use Imagine\Image\Box;

/** @var yii\web\View $this */
/** @var app\common\models\ViewReading $model */

$this->title = $model->sin;
$this->params['breadcrumbs'][] = ['label' => 'View Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<html>
<head>
<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 800px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: 500px;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</head>
<div class="form-row">
<div class="view-reading-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <!-- <div class="form-row"> -->
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'sin',
            'account:ntext',
            'cname:ntext',
            'status:ntext',
            'meter_no:ntext',
            'PREVRDG',
            'PRESRDG',
            'reading_date',
            'USAGE',
            'ffcode',
            'mcode',
            'remarks',
            'mreader',
            'amount',
            'is_average',
            'consumption_status'
            
        ],
    ]) 
    
    ?>

    

<!-- </div> -->
</div>

<div class="gallery">

     <?php $photos = $model->photo; // Get all related photos 

        if (!empty($model->photo)) { 
            try {
                //check if photo column has data
                //var_dump($model->photo);
                // Check if the string starts with "data:image/" (indicates base64 encoded image)
                //if (strpos($model->photo, 'data:image/') !== false) {
                    // Decode the base64 encoded image data
                    //$imageData = base64_decode($model->photo); 
                    // Add the "data:image/jpeg;base64," prefix 
                    //$imageData = 'data:image/jpeg;base64,' . $model->photo; 
                    //var_dump($model->photo);
                    //Decode the base64 encoded image data
                    //$imageData = base64_decode($imageData);  


                    // Create a temporary directory (if it doesn't exist)
                    $tempDir = Yii::getAlias('@runtime/temp');
                    //echo $tempDir;
                    FileHelper::createDirectory($tempDir, 0777, true); 

                    // Generate a unique filename for the temporary file 
                    $tempFile = $tempDir . DIRECTORY_SEPARATOR . uniqid('photo_', true) . '.jpg'; 
                    //$imageUrl = '/runtime/temp/' . basename($tempFile); // Assuming your web root is accessible at the root of the domain
                    
                    // Write image data to the temporary file OPTION 1
                    if (file_put_contents($tempFile, $model->photo) === false) {
                        throw new \Exception('Failed to write image to temporary file.');
                    }

                     // Write image data to the temporary file (using binary mode) OPTION 2 
                    // $fp = fopen($tempFile, 'wb'); 
                    // if ($fp === false) {
                    //     throw new \Exception("Could not open temporary file for writing.");
                    // }
                    // fwrite($fp, $model->photo); 
                    // fclose($fp);

                     // Check if the generated file is a valid image (using getimagesize())
                    $imageInfo = @getimagesize($tempFile); 
                    if ($imageInfo === false) {
                        throw new \Exception('Generated file is not a valid image.');
                    }else{
                        //echo $imageInfo[0];//display image size just to check
                    }

                    // // Load the image using Imagine library
                    // $imagine = new Imagine();
                    // $image = $imagine->open($tempFile);

                    // // Resize the image to 500x500
                    // $image->resize(new Box(1500, 1500)); 

                    // // Save the resized image to the temporary file
                    // $image->save($tempFile);
                    // Publish the asset 
                    $assetUrl = Yii::$app->assetManager->publish($tempFile)[1]; 

                    // Display the image
                    ?>
                    <!-- <div class="gallery"> -->
                        <img src="<?= $assetUrl ?>" alt="Reading Image">
                        <div class="desc">Water Meter Actual Image Captured</div>
                    <!-- </div> -->
                    <?php

                // } else {
                //     // Handle invalid data (not a base64 encoded image)
                //     throw new \Exception('Invalid image data.');
                // }
            } catch (\Exception $e) {
                // Handle errors gracefully
                Yii::error("Error displaying image: " . $e->getMessage());
                // You might want to display an error message to the user
                echo '<p>Failed displaying image.</p>'; 
                //echo $e;
            } finally {
                // Clean up the temporary file
                //@unlink($tempFile); 
            }
        } else {
            echo '<p>No image available.</p>';
        }
        ?>
    </div>
    </div>