<?php   
    class Customer {
        private $db;

        public function __construct() {
            // From pdo_db.php
            $this->db = new Database;
        }

        public function addCustomer($data) {
            // Prepare query to add customer data to db
            $this->db->query('INSERT INTO customers (id, first_name, last_name, email) VALUES(:id, :first_name, :last_name, :email)');

            //Bind values from pdo_db.php  
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':email', $data['email']);

            // Execute function
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } 
    }