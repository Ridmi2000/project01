<?php
namespace classes;

use PDO;
use PDOException;

class Order {
    private $dbConnection;

    public function __construct(PDO $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function viewOrders() {
        try {
            $query = "SELECT * FROM orders";
            $statement = $this->dbConnection->query($query);

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle exceptions as needed, such as logging errors
            return []; // Return an empty array or false to indicate failure
        }
    }
}

// Usage example:
try {
    $dbConnection = \classes\DbConnector::getConnection();
    $order = new \classes\Order($dbConnection);
    $orders = $order->viewOrders();
    
    // Process or display $orders as needed
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
