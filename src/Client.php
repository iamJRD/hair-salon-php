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
    }
?>
