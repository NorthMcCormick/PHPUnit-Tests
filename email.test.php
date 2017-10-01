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
    $emailStr = "mike.reed.vallejo@gmail.com";
    
    $emailClassObj = new Email($emailStr);
    $this->assertInstanceOf("Email", $emailClassObj);
  }

  /**
   * Will this email class fail to be instantiated with an invalid email address?
   */
  /**
   * @expectedException InvalidArgumentException
   */
  public function testCannotBeCreatedFromInvalidEmailAddress()
  {
    $emailStr = "This-is-an-invalid-email-string";
    
    $emailClassObj = new Email($emailStr);
  }

  /**
   * This class should be able to be used ~as a string~, can it be created and read as a string still?
   */
  public function testCanBeUsedAsString()
  {
    $emailStr = "mike.reed.vallejo@gmail.com";
    
    $emailClassObj = new Email($emailStr);
    $result = $emailClassObj->fromString($emailStr);
    $this->assertTrue($emailStr == $result);
  }

  /**
   * This should test that we are returning true when sending emails, but we need to ~mock~ the class so
   * that we can override the log function. Logging the mail exits the application so we need to bypass that.
   */
  public function testEmailSend() {
    $emailStr = "mike.reed.vallejo@gmail.com";

    $emailMock = $this->getMockBuilder("Email")
      ->setConstructorArgs(array($emailStr))
      ->setMethods(array("logMail","phpMail"))
      ->getMock();

    $emailMock->expects($this->once())
      ->method("logMail");
    $emailMock->expects($this->once())
      ->method("phpMail");

    $emailMock->sendEmail();

  }

}
