<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'EventDAO.php';

class EventsController extends Controller {

  private $eventDAO;

  function __construct() {
    $this->eventDAO = new EventDAO();
  }

  public function index() {
    // $allEvents = $this->eventDAO->selectAll();
    // $upcomingEvents = [];
    //
    // for ($i = 0; $i < 3; $i++) {
    //   $upcomingEvents[$allEvents[$i]["id"]] = $allEvents[$i];
    // }
    //
    // $this->setEvents($upcomingEvents);
  }

  public function programma() {
    // //Get & set all the months & tags from the database
    // $this->setMonths();
    // $this->setTags();
    //
    // //Set the events of the first month
    // $this->setEvents($this->eventDAO->selectEventsByMonth($this->eventDAO->selectMonths()[0]["month"]));
    //
    // //Handle months submits
    // $this->monthSubmit();
    // $this->tagSubmit();
  }

  public function details() {
    // if (!isset($_GET["id"]) || empty($_GET["id"])) {
    //   $this->redirect("index.php?page=programma");
    //   exit();
    // }
    //
    // $event = $this->eventDAO->selectById($_GET["id"]);
    // if ($tags = $this->eventDAO->selectTagsByEventId($event["id"])) {
    //   $event["tags"] = $tags;
    // }
    //
    // $event["images"] = $this->getImages($event["images_id"]);
    // $this->set("event", $event);
  }

  private function setMonths() {
    $eventMonths = $this->eventDAO->selectMonths();
    $months = [];

    foreach ($eventMonths as $month) {
      $monthName = "";
      switch ($month["month"]) {
        case 1:
        $monthName = "Jan";
        break;
        case 2:
        $monthName = "Feb";
        break;
        case 3:
        $monthName = "Maa";
        break;
        case 4:
        $monthName = "Apr";
        break;
        case 5:
        $monthName = "Mei";
        break;
        case 6:
        $monthName = "Jun";
        break;
        case 7:
        $monthName = "Jul";
        break;
        case 8:
        $monthName = "Aug";
        break;
        case 9:
        $monthName = "Sept";
        break;
        case 10:
        $monthName = "Oct";
        break;
        case 11:
        $monthName = "Nov";
        break;
        case 12:
        $monthName = "Dec";
        break;
      }
      $months[$month["month"]] = $monthName;
    }

    $this->set('months', $months);
  }

  private function setTags() {
    $tags = $this->eventDAO->selectTags();
    $this->set('tags', $tags);
  }

  private function getImages($id) {
    $dir = "./assets/img/events/$id/";
    $res = [];

    //If this directory exists
    if (is_dir($dir)) {
      $files = scandir($dir);

      //Looping through the directory
      for ($i = 0; $i < count($files); $i++) {

        if ($files[$i] != "." && $files[$i] != "..") {
          //Pathinfo function is an array with file information
          $file = pathinfo($files[$i]);

          //Checking the extension
          $ext = "";
          if (isset($file["extension"])) {
            $ext = $file["extension"];
          }

          if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "svg" || $ext == "gif" || $ext == "webp") {
            //Inserting the files in the array
            $res[] = $dir.$file["basename"];
          }
        }

      }
    }

    return $res;
  }

  private function setEvents($parsedEvents) {
    $events = [];

    foreach ($parsedEvents as $event) {
      if ($tags = $this->eventDAO->selectTagsByEventId($event["id"])) {
        $event["tags"] = $tags;
      }
      $event["images"] = $this->getImages($event["images_id"]);
      $events[$event["id"]] = $event;
    }

    if ($this->isAjax) {
      header('Content-Type: application/json');
      echo json_encode($events);
      exit();
    }

    $this->set('events', $events);
  }

  private function monthSubmit() {
    if (isset($_GET["month"])) {
      if ($_GET["month"] < 1 || $_GET["month"] > 12 || empty($_GET["month"])) {
        $this->redirect("index.php?page=programma");
      }
      $events = $this->eventDAO->selectEventsByMonth($_GET["month"]);
      $this->setEvents($events);
    }
  }

  private function tagSubmit() {
    if (isset($_GET["tags"])) {
      $conditions = [];

      foreach ($_GET["tags"] as $tag) {
        $conditions[] = array(
          'field' => 'tag',
          'comparator' => '=',
          'value' => $tag
        );

      }

      $events = $this->eventDAO->search($conditions);
      $this->setEvents($events);
    }
  }

}
