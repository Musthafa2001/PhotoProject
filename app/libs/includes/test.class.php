<?php 
class Mic {
public $brand;
public $color;
public $usb_port;
public $model;
public $light;

public function __construct()
{
    print("constructing object.....");
}

public function setLight($light){
    $this->$light=$light;
    print($light);
    print($this->$light);
}

public function setModel($model){
    // $this->model=$model;
    $this->model=ucwords($model);
}

public function getModel(){
    if($this->model!=null){
        return $this->model;
    }
    else{
        print("cool");
    }
}

    
}

$mic1=new Mic();
$mic2=new Mic();
$mic1->setLight("white");
// print($mic1->getModel());
$mic1->setModel("sony");
print($mic1->getModel());
?>