<?php
    class Client
    {
        private $client_name;
        private $client_phone_number;
        private $id;
        private $stylist_id;

        function __construct($client_name, $client_phone_number, $id = null, $stylist_id)
        {
            $this->client_name = $client_name;
            $this->client_phone_number = $client_phone_number;
            $this->id = $id;
            $this->stylist_id = $stylist_id;
        }
// SETTERS
        function setClientName($new_client_name)
        {
            $this->client_name = $new_client_name;
        }

        function setClientPhoneNumber($new_client_phone_number)
        {
            $this->client_phone_number = $new_client_phone_number;
        }
// GETTERS
        function getClientName()
        {
            return $this->client_name;
        }

        function getClientPhoneNumber()
        {
            return $this->client_phone_number;
        }

        function getId()
        {
            return $this->id;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }
// END SETTERS/GETTERS
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO client (name, phone_number, stylist_id) VALUES ('{$this->getClientName()}', {$this->getClientPhoneNumber()}, {$this->getStylistId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM client;");
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM client;");
            $clients = array();
            foreach ($returned_clients as $client) {
                $name = $client['name'];
                $phone_number = $client['phone_number'];
                $id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($name, $phone_number, $id, $stylist_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function find($search_id)
        {
            $found_client = null;
            $clients = Client::getAll();
            foreach($clients as $client) {
                $client_id = $client->getId();
                if($client_id == $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }

        function deleteClient()
        {
            $GLOBALS['DB']->exec("DELETE FROM client WHERE id = {$this->getId()};");
        }

        function updateClient($updated_client_name, $updated_client_phone_number)
        {
            $GLOBALS['DB']->exec("UPDATE client SET name = '{$updated_client_name}', phone_number = {$updated_client_phone_number} WHERE id = {$this->getId()};");
            $this->setClientName($updated_client_name);
            $this->setClientPhoneNumber($updated_client_phone_number);
        }
    }
?>
