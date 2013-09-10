<?php

class Mixpanel {
  public $token = 'f9396fdc93a94c71e178b275d41bad01';
  public $host = 'http://api.mixpanel.com/';
  
  /*
  public function __construct($token_string) {
    $this->token = $token_string;
  }
  */
  
  function track($event, $properties=array()) {
  
    if(!isset($properties['ip'])){
      $properties['ip'] = $_SERVER['REMOTE_ADDR'];
    }
    
    $params = array(
      'event' => $event,
      'properties' => $properties
    );
    
    if (!isset($params['properties']['token'])){
      $params['properties']['token'] = $this->token;
    }
    
    $url = $this->host . 'track/?data=' . base64_encode(json_encode($params));
    
    exec("curl '" . $url . "' >/dev/null 2>&1 &");
  }
  
  function track_funnel($funnel, $step, $goal, $properties=array()) {
    $properties['funnel'] = $funnel;
    $properties['step'] = $step;
    $properties['goal'] = $goal;
    $this->track('mp_funnel', $properties);
  }
}