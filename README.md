Yii2 fine uploader
==================
Image uploader for Yii2 framework

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist justyork/yii2-fine-uploader "*"
```

or add

```
"justyork/yii2-fine-uploader": "*"
```

to the require section of your `composer.json` file.

It's copy from [here](https://github.com/modernkernel/yii2-fineuploader), but have a little change

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \justyork\fineuploader\Fineuploader::widget([

    'options' => [ 
        'request' => [
            'endpoint' => \yii\helpers\Url::to(['ajax/upload-image']),
            'params' => [Yii::$app->request->csrfParam => Yii::$app->request->csrfToken]
        ],
        'validation' => [
            'allowedExtensions' => ['jpeg', 'jpg', 'png', 'bmp', 'gif'],
        ],
        'classes' => [
            'success' => 'alert alert-success hidden',
            'fail' => 'alert alert-error'
        ],
        // other options like
        //'multiple'=>false,
        //'autoUpload'=>false
    ],
    //'events' => [
    //    'allComplete' => '$("#loading").modal("hide"); ',
    //]
])
?>
```