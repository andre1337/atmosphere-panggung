<?php // content="text/plain; charset=utf-8"
 
define('__ROOT__', dirname(dirname(__FILE__))); 
require_once ('jpgraph.php');
require_once ('jpgraph_line.php');
require_once ('jpgraph_error.php');
 
$y_axis = array();
 
for($i=0; $i<40; $i++) {
    //    $y_axis[] = rand(0,100);//DB
    }
	
 for($i=0; $i<40; $i++) {
        $y_axis[$i] = rand(0,100);//DB
    }
$graph = new Graph(1200,500);
$graph->img->SetMargin(40,40,40,40);  
$graph->img->SetAntiAliasing();
$graph->SetScale("textlin");
$graph->SetShadow();
$graph->title->Set("Example of line centered plot");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
 
 
$p1 = new LinePlot($y_axis);
$p1->mark->SetType(MARK_FILLEDCIRCLE);
$p1->mark->SetFillColor("red");
$p1->mark->SetWidth(4);
$p1->SetColor("blue");
$p1->SetCenter();
$graph->Add($p1);
 
$graph->Stroke();
 
?>