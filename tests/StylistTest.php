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
        protected function tearDown()
        {
            Stylist::deleteAll();
        }

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

        function testSave()
        {
            // Arrange
            $stylist_name = 'Ann';
            $stylist_phone_number = '5555555555';
            $test_stylist = new Stylist($stylist_name, $stylist_phone_number);

            // Act
            $test_stylist->save();


            // Assert
            $result = Stylist::getAll();
            $this->assertEquals($test_stylist, $result[0]);
        }

        function testGetAll()
        {
            // Arrange
            $stylist_name = 'Ann';
            $stylist_phone_number = '5555555555';
            $id = null;
            $test_stylist = new Stylist($stylist_name, $stylist_phone_number, $id);
            $test_stylist->save();

            $stylist_name2 = 'Jack';
            $stylist_phone_number2 = '2222222222';
            $test_stylist2 = new Stylist($stylist_name2, $stylist_phone_number2, $id);
            $test_stylist2->save();

            // Act
            $result = Stylist::getAll();

            // Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

        function testDeleteAll()
        {
            // Arrange
            $stylist_name = 'Ann';
            $stylist_phone_number = '5555555555';
            $id = null;
            $test_stylist = new Stylist($stylist_name, $stylist_phone_number, $id);
            $test_stylist->save();

            $stylist_name2 = 'Jack';
            $stylist_phone_number2 = '2222222222';
            $test_stylist2 = new Stylist($stylist_name2, $stylist_phone_number2, $id);
            $test_stylist2->save();

            // Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            // Arrange
            $stylist_name = 'Ann';
            $stylist_phone_number = '5555555555';
            $id = null;
            $test_stylist = new Stylist($stylist_name, $stylist_phone_number, $id);
            $test_stylist->save();

            // Act
            $result = Stylist::find($test_stylist->getId());

            // Assert
            $this->assertEquals($test_stylist, $result);
        }

        function testGetClients()
        {
            // Arrange
            $stylist_name = 'Ann';
            $stylist_phone_number = '5555555555';
            $id = null;
            $test_stylist = new Stylist($stylist_name, $stylist_phone_number, $id);
            $test_stylist->save();

            $client_name = 'Jared';
            $client_phone_number = '5033123649';
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $client_phone_number, $id, $stylist_id);
            $test_client->save();

            $client_name2 = 'Bob';
            $client_phone_number2 = '5033307236';
            $stylist_id = null;
            $test_client2 = new Client($client_name, $client_phone_number, $id, $stylist_id);
            $test_client2->save();

            // Act
            $result = $test_stylist->getClients();

            // Assert
            $this->assertEquals([$test_client], $result);
        }

        function testUpdateStylist()
        {
            // Arrange
            $stylist_name = 'Ann';
            $stylist_phone_number = '5555555555';
            $id = null;
            $test_stylist = new Stylist($stylist_name, $stylist_phone_number, $id);
            $test_stylist->save();

            $updated_stylist_name = 'Anna';
            $updated_stylist_phone_number = '1234567890';

            // Act
            $test_stylist->updateStylist($updated_stylist_name, $updated_stylist_phone_number);

            // Assert
            $this->assertEquals(['Anna', '1234567890'], [$test_stylist->getStylistName(), $test_stylist->getStylistPhoneNumber()]);
        }

        function testDeleteStylist()
        {
            // Arrange
            $stylist_name = 'Ann';
            $stylist_phone_number = '5555555555';
            $id = null;
            $test_stylist = new Stylist($stylist_name, $stylist_phone_number, $id);
            $test_stylist->save();

            $stylist_name2 = 'Jack';
            $stylist_phone_number2 = '2222222222';
            $test_stylist2 = new Stylist($stylist_name2, $stylist_phone_number2, $id);
            $test_stylist2->save();

            // Act
            $test_stylist->deleteStylist();
            $result = Stylist::getAll();

            // Assert
            $this->assertEquals([$test_stylist2], $result);
        }

    }
?>
