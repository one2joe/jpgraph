<?php
require 'vendor/autoload.php';

require_once __DIR__ . '\vendor\amenadiel\jpgraph\src\config.inc.php';

use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;
use Amenadiel\JpGraph\Text;

$graph = new Graph\CanvasGraph(800,	600);

$data = array( array(1,2,3,4),array(5,6,7,8));
$table = new Text\GTextTable();
$table->Init(5,7); // Create a 5 rows x 7 columns table
$table->Set($data);

$graph->Add($table);
$graph->Stroke();

exit;

$graph = new Graph\PieGraph(800, 600);

$graph->title->Set("Member Traffic Light");
$graph->SetBox(true);

// $title = iconv("tis-620", "utf-8", "ทดสอบ");
// $graph->title->Set($title);
// $graph->title->Set("ทดสอบ");
// $graph->title->SetFont(FF_USERFONT4, FS_NORMAL, 16);

$data = array(40, 21, 17, 14, 23);
$p1   = new Plot\PiePlot($data);
$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#1E90FF', '#2E8B57', '#ADFF2F', '#DC143C', '#BA55D3'));

$graph->Add($p1);
$graph->Stroke();