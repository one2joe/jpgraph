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