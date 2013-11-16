<?php
class CustomActionArray {
  private function square($number){
    return $number * $number; 
  }
  public function square_my_array($number_array){
    return array_map(array($this, "square"), $number_array);
  }
}