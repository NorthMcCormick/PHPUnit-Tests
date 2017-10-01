<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers RemoteConnect
 */
class RemoteConnectTest extends TestCase
{

  /**
   * Test that the connection object is valid on instantiation
   */
  public function testConnectionType()
  {
    $connection = new RemoteConnect();
    $connectionObject = $connection->returnSampleObject();
    $this->assertInstanceOf("RemoteConnect", $connectionObject);
  }

  /**
   * Test that the connection is valid
   */
  public function testConnectionIsValid()
  {
    $connection = new RemoteConnect();
    $server = "www.ebay.com";
    $this->assertTrue($connection->connectToServer($server) == true);
  }

  /**
   * Test that the server name is valid
   */
  public function testInvalidServerName() {
    $connection = new RemoteConnect();
    $server = "www.this-is-an-invalid-server-name.com";
    $this->assertTrue($connection->connectToServer($server) == false);
  }
  
}
