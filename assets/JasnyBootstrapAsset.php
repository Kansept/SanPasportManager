<?php

namespace app\assets;

use yii\web\AssetBundle;

class JasnyBootstrapAsset extends AssetBundle
{
    public $sourcePath = "@bower/jasny-bootstrap";
    public $js = [
       'dist\js\jasny-bootstrap.min.js'
    ];
    public $css = [
        'dist\css\jasny-bootstrap.min.css'
    ];
}
