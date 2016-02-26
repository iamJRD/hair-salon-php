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
    }
?>
