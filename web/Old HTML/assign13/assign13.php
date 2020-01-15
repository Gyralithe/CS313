<?php
class performanceObject {
  public $performance;
  public $first_name;
  public $last_name;
  public $student_id;
  public $first_name_2;
  public $last_name_2;
  public $student_id_2;
  public $skill;
  public $instrument;
  public $location;
  public $room;
  public $time;
}

$fileString = "";

if ($_GET['new'] == 1) {
  $newPerformance = new performanceObject();
  $newPerformance->performance = $_GET['performance'];
  $newPerformance->first_name = $_GET['first_name'];
  $newPerformance->last_name = $_GET['last_name'];
  $newPerformance->student_id = $_GET['student_id'];
  if ($newPerformance->performance == "Duet") {
    $newPerformance->first_name_2 = $_GET['first_name_2'];
    $newPerformance->last_name_2 = $_GET['last_name_2'];
    $newPerformance->student_id_2 = $_GET['student_id_2'];
  }
  $newPerformance->skill = $_GET['skill'];
  $newPerformance->instrument = $_GET['instrument'];
  $newPerformance->location = $_GET['location'];
  $newPerformance->room = $_GET['room'];
  $newPerformance->time = $_GET['time'];

  $fileString = file_get_contents("../data/performances.txt");
  $array = Array();
  if ($fileString == "") {
    $array[0] = $newPerformance;
  }
  else {
    $array = json_decode($fileString);
    $i = count($array);
    $array[$i] = $newPerformance;
  }
  $fileString = json_encode($array);

  file_put_contents("../data/performances.txt", $fileString);
}
else if ($_GET['new'] == 0) {
  $fileString = file_get_contents("../data/performances.txt");
}

echo $fileString;
?>