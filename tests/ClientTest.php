<?php
    require_once 'src/Client.php';
    require_once 'src/Stylist.php';

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        function testGetClientName()
        {
            // Arrange
            $client_name = 'Jared';
            $client_phone_number = '5033123649';
            $id = 1;
            $stylist_id = 1;
            $test_client = new Client($client_name, $client_phone_number, $id, $stylist_id);

            // Act
            $result = $test_client->getClientName();

            // Assert
            $this->assertEquals($client_name, $result);
        }

        function testGetClientPhoneNumber()
        {
            // Arrange
            $client_name = 'Jared';
            $client_phone_number = '5033123649';
            $id = 1;
            $stylist_id = 1;
            $test_client = new Client($client_name, $client_phone_number, $id, $stylist_id);

            // Act
            $result = $test_client->getClientPhoneNumber();

            // Assert
            $this->assertEquals($client_phone_number, $result);
        }

        function testGetId()
        {
            // Arrange
            $client_name = 'Jared';
            $client_phone_number = '5033123649';
            $id = 1;
            $stylist_id = 1;
            $test_client = new Client($client_name, $client_phone_number, $id, $stylist_id);

            // Act
            $result = $test_client->getId();

            // Assert
            $this->assertEquals($id, $result);
        }

        function testGetStylistId()
        {
            // Arrange
            $stylist_name = 'Ann';
            $stylist_phone_number = '5555555555';
            $id = null;
            $test_stylist = new Stylist($stylist_name, $stylist_phone_number, $id);

            $client_name = 'Jared';
            $client_phone_number = '5033123649';
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $client_phone_number, $id, $stylist_id);

            // Act
            $result = $test_client->getStylistId();

            // Assert
            $this->assertEquals($stylist_id, $result);
        }
    }
?>
