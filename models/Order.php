<?php
class Order {
    private $conn;
    private $table_name = "orders";
    private $items_table = "order_items";

    public $id;
    public $user_id;
    public $total_amount;
    public $status;
    public $shipping_address;
    public $payment_method;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create new order
    public function create() {
        // Start transaction
        $this->conn->beginTransaction();

        try {
            // Insert order
            $query = "INSERT INTO " . $this->table_name . "
                    (user_id, total_amount, status, shipping_address, payment_method)
                    VALUES
                    (:user_id, :total_amount, :status, :shipping_address, :payment_method)";

            $stmt = $this->conn->prepare($query);

            // Sanitize input
            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
            $this->total_amount = htmlspecialchars(strip_tags($this->total_amount));
            $this->status = htmlspecialchars(strip_tags($this->status));
            $this->shipping_address = htmlspecialchars(strip_tags($this->shipping_address));
            $this->payment_method = htmlspecialchars(strip_tags($this->payment_method));

            // Bind values
            $stmt->bindParam(":user_id", $this->user_id);
            $stmt->bindParam(":total_amount", $this->total_amount);
            $stmt->bindParam(":status", $this->status);
            $stmt->bindParam(":shipping_address", $this->shipping_address);
            $stmt->bindParam(":payment_method", $this->payment_method);

            $stmt->execute();
            $this->id = $this->conn->lastInsertId();

            // Commit transaction
            $this->conn->commit();
            return true;
        } catch(Exception $e) {
            // Rollback transaction on error
            $this->conn->rollback();
            return false;
        }
    }

    // Add order items
    public function addOrderItems($items) {
        $query = "INSERT INTO " . $this->items_table . "
                (order_id, product_id, quantity, price)
                VALUES
                (:order_id, :product_id, :quantity, :price)";

        $stmt = $this->conn->prepare($query);

        foreach($items as $item) {
            $stmt->bindParam(":order_id", $this->id);
            $stmt->bindParam(":product_id", $item['product_id']);
            $stmt->bindParam(":quantity", $item['quantity']);
            $stmt->bindParam(":price", $item['price']);
            
            if(!$stmt->execute()) {
                return false;
            }

            // Update product stock
            $product = new Product($this->conn);
            $product->updateStock($item['product_id'], -$item['quantity']);
        }

        return true;
    }

    // Get order by ID
    public function getById($id) {
        $query = "SELECT o.*, u.username, u.email 
                FROM " . $this->table_name . " o
                LEFT JOIN users u ON o.user_id = u.id
                WHERE o.id = :id
                LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get order items
    public function getOrderItems($order_id) {
        $query = "SELECT oi.*, p.name, p.image_url 
                FROM " . $this->items_table . " oi
                LEFT JOIN products p ON oi.product_id = p.id
                WHERE oi.order_id = :order_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":order_id", $order_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get user orders
    public function getUserOrders($user_id, $page = 1, $items_per_page = 10) {
        $offset = ($page - 1) * $items_per_page;
        
        $query = "SELECT * FROM " . $this->table_name . "
                WHERE user_id = :user_id
                ORDER BY created_at DESC
                LIMIT :limit OFFSET :offset";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":limit", $items_per_page, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt;
    }

    // Update order status
    public function updateStatus($id, $status) {
        $query = "UPDATE " . $this->table_name . "
                SET status = :status
                WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Get order count by status
    public function getCountByStatus($status = null) {
        $query = "SELECT COUNT(*) as count FROM " . $this->table_name;
        if($status) {
            $query .= " WHERE status = :status";
        }

        $stmt = $this->conn->prepare($query);
        if($status) {
            $stmt->bindParam(":status", $status);
        }
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['count'];
    }

    // Calculate total revenue
    public function getTotalRevenue($start_date = null, $end_date = null) {
        $query = "SELECT SUM(total_amount) as total FROM " . $this->table_name . "
                WHERE status = 'completed'";
        
        if($start_date && $end_date) {
            $query .= " AND created_at BETWEEN :start_date AND :end_date";
        }

        $stmt = $this->conn->prepare($query);
        if($start_date && $end_date) {
            $stmt->bindParam(":start_date", $start_date);
            $stmt->bindParam(":end_date", $end_date);
        }
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total'] ?? 0;
    }
}
?>
