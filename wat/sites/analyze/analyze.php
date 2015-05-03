<?php echo '<pre>';

include 'autoload.php';



$tokenizer = new HybridLogic\Classifier\Basic;
$classifier = new HybridLogic\Classifier($tokenizer);


include 'dataset/train.php';

//$groups = $classifier->classify('bạn bị nhớ nhà');
//var_dump($groups);

?>