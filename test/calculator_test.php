<?php

require 'lib/calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase
{
  public function testAdd(){
    $calculator = new Calculator();
    $result = $calculator->add(5, 10);
    $this->assertEquals(15, $result);
  }

  public function testSubtract(){
    $calculator = new Calculator();
    $result = $calculator->subtract(12, 8);
    $this->assertEquals(4, $result);
  }

  public function testMultiply(){
    $calculator = new Calculator();
    $result = $calculator->multiply(2, 9);
    $this->assertEquals(18, $result);
  }
} 