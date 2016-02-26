<?php
    class Stylist
    {
        private $stylist_name;
        private $stylist_phone_number;
        private $id;

        function __construct($stylist_name, $stylist_phone_number, $id = null)
        {
            $this->stylist_name = $stylist_name;
            $this->stylist_phone_number = $stylist_phone_number;
            $this->id = $id;
        }
// SETTERS
        function setStylistName($new_stylist_name)
        {
            $this->stylist_name = $new_stylist_name;
        }

        function setStylistPhoneNumber($new_stylist_phone_number)
        {
            $this->stylist_phone_number = $new_stylist_phone_number;
        }
// GETTERS
        function getStylistName()
        {
            return $this->stylist_name;
        }

        function getStylistPhoneNumber()
        {
            return $this->stylist_phone_number;
        }

        function getId()
        {
            return $this->id;
        }
// END SETTERS/GETTERS
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylist (name, phone_number) VALUES ('{$this->getStylistName()}', {$this->getStylistPhoneNumber()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylist;");
            $stylists = array();
            foreach($returned_stylists as $stylist) {
                $name = $stylist['name'];
                $phone_number = $stylist['phone_number'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($name, $phone_number, $id);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylist");
        }

        static function find($search_id)
        {
            $found_stylist = null;
            $stylists = Stylist::getAll();
            foreach($stylists as $stylist) {
                $stylist_id = $stylist->getId();
                if($stylist_id == $search_id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }

        function getClients()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM client WHERE stylist_id = {$this->getId()};");
            $clients = array();
            foreach($returned_clients as $client) {
                $name = $client['name'];
                $phone_number = $client['phone_number'];
                $id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($name, $phone_number, $id, $stylist_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        function updateStylist($updated_stylist_name, $updated_stylist_phone_number)
        {
            $GLOBALS['DB']->exec("UPDATE stylist SET name = '{$updated_stylist_name}', phone_number = {$updated_stylist_phone_number} WHERE id = {$this->getId()};");
            $this->setStylistName($updated_stylist_name);
            $this->setStylistPhoneNumber($updated_stylist_phone_number);
        }

    }
?>
