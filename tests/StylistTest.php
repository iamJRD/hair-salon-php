<?php
    require_once 'src/Stylist.php';
    require_once 'src/Client.php';

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        function testGetStylistName()
        {
            // Arrange
            $stylist_name = 'Ann';
            $stylist_phone_number = '5555555555';
            $id = 1;
            $test_stylist = new Stylist($stylist_name, $stylist_phone_number, $id);

            // Act
            $result = $test_stylist->getStylistName();

            // Assert
            $this->assertEquals($stylist_name, $result);
        }

        function testGetStylistPhoneNumber()
        {
            // Arrange
            $stylist_name = 'Ann';
            $stylist_phone_number = '5555555555';
            $id = 1;
            $test_stylist = new Stylist($stylist_name, $stylist_phone_number, $id);

            // Act
            $result = $test_stylist->getStylistPhoneNumber();

            // Assert
            $this->assertEquals($stylist_phone_number, $result);
        }

        function testGetId()
        {
            // Arrange
            $stylist_name = 'Ann';
            $stylist_phone_number = '5555555555';
            $id = 1;
            $test_stylist = new Stylist($stylist_name, $stylist_phone_number, $id);

            // Act
            $result = $test_stylist->getId();

            // Assert
            $this->assertEquals($id, $result);
        }
    }
?>
