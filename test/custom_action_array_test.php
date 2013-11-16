<?php

require 'lib/custom_action_array.php';
class CustomActionArrayTest extends PHPUnit_Framework_TestCase {

  /**
   * @dataProvider provider_square_method
   */
  public function testSquare($number, $squared_number){
    // $array_action = new CustomActionArray();
    // $class = new ReflectionClass($array_action);
    // $method = $class->getMethod('square');
    // $method->setAccessible(true);
    // $result = $method->invoke($class, 2);
    // $this->assertEquals(4, $result);

    // $array_action = new CustomActionArray();
    // $reflector = new ReflectionProperty('CustomActionArray', 'square');
    // $reflector->setAccessible(true);
    // $result = $reflector->setValue($array_action, 2);
    // $this->assertEquals(4, $result);

    $method = new ReflectionMethod(
          'CustomActionArray', 'square'
        );
 
    $method->setAccessible(TRUE);
    $array_action = new CustomActionArray();
    $result = $method->invokeArgs($array_action, [$number]);
    // echo $number." ". $squared_number." \n";
    $this->assertEquals($squared_number, $result);
  }

  public function provider_square_method(){
    return array(
      array(2, 4),
      array(3, 9)

    );
  }

  /**
   * @dataProvider provider_square_my_array
   */
  public function testSquareMyArray($input, $expected_ouput){
    $array_action = new CustomActionArray();
    $result = $array_action->square_my_array($input);
    $this->assertEquals($expected_ouput,$result);
  }

  public function provider_square_my_array(){
    return array(
      array([1,2,3], [1,4,9]),
      array([1],[1]),
      array([2,3],[4,9])
    );
  }
}