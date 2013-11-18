<?php

class TestLogin extends PHPUnit_Extensions_Selenium2TestCase {
  public function setUp(){
    $this->setHost('localhost');
    $this->setPort(4444);
    $this->setBrowser('firefox');
    $this->setBrowserUrl('http://localhost/play-with-php-tdd');

  }

  public function testHasLoginForm()
  {
    $this->url('index.php');

    $username = $this->byName('username');
    $password = $this->byName('password');

    $this->assertEquals('', $username->value());
    $this->assertEquals('', $password->value());
  }

  public function testLoginFormSubmitsToAdmin()
  {
    $this->url('index.php');

    $form = $this->byCssSelector('form');
    $action = $form->attribute('action');

    $this->assertContains('admin.php', $action);

    $this->byName('username')->value('doe');
    $this->byName('password')->value('helloworld');
    $form->submit();

    $welcome = $this->byCssSelector('h1')->text();
    $this->assertRegExp('/doe/i',$welcome);
  }
}