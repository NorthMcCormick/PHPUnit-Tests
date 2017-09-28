<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Email
 */
class EmailTest extends TestCase
{
  /**
   * Can this email class be instantiated with a valid email address as the constructor?
   */
  public function testCanBeCreatedFromValidEmailAddress()
  {

  }

  /**
   * Will this email class fail to be instantiated with an invalid email address?
   */
  public function testCannotBeCreatedFromInvalidEmailAddress()
  {

  }

  /**
   * This class should be able to be used ~as a string~, can it be created and read as a string still?
   */
  public function testCanBeUsedAsString()
  {

  }

  /**
   * This should test that we are returning true when sending emails, but we need to ~mock~ the class so
   * that we can override the log function. Logging the mail exits the application so we need to bypass that.
   */
  public function testEmailSend() {

  }
}