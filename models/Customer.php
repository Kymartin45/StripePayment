<?php   
    class Customer {
        private $db;

        public function __construct() {
            // From pdo_db.php
            $this->db = new Database
        }

        public function addCustomer($data) {
            // Prepare query to add customer data to db
            $this->db->query('INSERT INTO customers (id, first_name, last_name, email) VALUES():id, :first_name, :last_name, :email)');
        } 
    }