<?php
require 'vendor/autoload.php';

require_once __DIR__ . '\vendor\amenadiel\jpgraph\src\config.inc.php';

use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;
use Amenadiel\JpGraph\Text;

$datay = [
	array('ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','ม.ย.'),
	array(12, 18, 19, 7, 17, 6), 
	array(3, 5, 2, 7, 5, 25), 
	array(6, 1.5, 2.4, 2.1, 6.9, 12.3)
];

$nbrbar = 6; // number of bars and hence number of columns in table
$cellwidth = 50;  // width of each column in the table
$tableypos = 200; // top left Y-coordinate for table
$tablexpos = 60;  // top left X-coordinate for table
$tablewidth = $nbrbar * $cellwidth; // overall table width
$rightmargin = 30;  // right margin in the graph
$topmargin = 30;  // top margin of graph

$height = 350;  // a suitable height for the image
$width = $tablexpos + $tablewidth + $rightmargin; // the width of the image

$graph = new Graph\Graph($width, $height);	
$graph->img->SetMargin($tablexpos, $rightmargin, $topmargin, $height - $tableypos);
$graph->SetScale('textlin');
$graph->SetMarginColor('white');

$graph->SetUserFont(
	'D:\wamp64\www\jpgraph\fonts\THSarabunNew.ttf',
	'D:\wamp64\www\jpgraph\fonts\THSarabunNew Bold.ttf',
	'D:\wamp64\www\jpgraph\fonts\THSarabunNew Italic.ttf',
	'D:\wamp64\www\jpgraph\fonts\THSarabunNew BoldItalic.ttf'
);

// Create the bars and the accbar plot
$bplot = new Plot\BarPlot($datay[3]);
$bplot->SetFillColor('orange');
$bplot2 = new Plot\BarPlot($datay[2]);
$bplot2->SetFillColor('red');
$bplot3 = new Plot\BarPlot($datay[1]);
$bplot3->SetFillColor('darkgreen');
$accbplot = new Plot\AccBarPlot(array($bplot, $bplot2, $bplot3));
$accbplot->value->Show();
$graph->Add($accbplot);

$table = new Text\GTextTable();
$table->Set($datay);
$table->SetPos($tablexpos, $tableypos + 30);

$table->SetFont(FF_USERFONT, FS_NORMAL, 15);
$table->SetAlign('right');
$table->SetMinColWidth($cellwidth);
$table->SetNumberFormat('%0.1f');

// Format table header row
$table->SetRowFillColor(0,'teal@0.7');
$table->SetRowFont(0, FF_USERFONT, FS_BOLD, 16);
$table->SetRowAlign(0, 'center');

// .. and add it to the graph
$graph->Add($table);
$graph->Stroke();

// $graph = new Graph\CanvasGraph(800,	600);

// $data = array( array(1,2,3,4),array(5,6,7,8));
// $table = new Text\GTextTable();
// $table->Init(5,7); // Create a 5 rows x 7 columns table
// $table->Set($data);

// $graph->Add($table);
// $graph->Stroke();