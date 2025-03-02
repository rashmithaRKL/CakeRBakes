<?php
class Cart {
    private $conn;
    private $table_name = "cart";

    public $id;
    public $user_id;
    public $product_id;
    public $quantity;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Add item to cart
    public function addItem() {
        // Check if item already exists in cart
        $existing_item = $this->getCartItem($this->user_id, $this->product_id);
        
        if($existing_item) {
            // Update quantity if item exists
            $query = "UPDATE " . $this->table_name . "
                    SET quantity = quantity + :quantity
                    WHERE user_id = :user_id AND product_id = :product_id";
        } else {
            // Insert new item if it doesn't exist
            $query = "INSERT INTO " . $this->table_name . "
                    (user_id, product_id, quantity)
                    VALUES
                    (:user_id, :product_id, :quantity)";
        }

        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));

        // Bind values
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":quantity", $this->quantity);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Get cart items for a user
    public function getUserCart($user_id) {
        $query = "SELECT c.*, p.name, p.price, p.image_url, p.stock 
                FROM " . $this->table_name . " c
                LEFT JOIN products p ON c.product_id = p.id
                WHERE c.user_id = :user_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get specific cart item
    private function getCartItem($user_id, $product_id) {
        $query = "SELECT * FROM " . $this->table_name . "
                WHERE user_id = :user_id AND product_id = :product_id
                LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":product_id", $product_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update cart item quantity
    public function updateQuantity($user_id, $product_id, $quantity) {
        $query = "UPDATE " . $this->table_name . "
                SET quantity = :quantity
                WHERE user_id = :user_id AND product_id = :product_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":quantity", $quantity);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":product_id", $product_id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Remove item from cart
    public function removeItem($user_id, $product_id) {
        $query = "DELETE FROM " . $this->table_name . "
                WHERE user_id = :user_id AND product_id = :product_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":product_id", $product_id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Clear user's cart
    public function clearCart($user_id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE user_id = :user_id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Get cart total
    public function getCartTotal($user_id) {
        $query = "SELECT SUM(c.quantity * p.price) as total 
                FROM " . $this->table_name . " c
                LEFT JOIN products p ON c.product_id = p.id
                WHERE c.user_id = :user_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total'] ?? 0;
    }

    // Get cart item count
    public function getCartCount($user_id) {
        $query = "SELECT COUNT(*) as count FROM " . $this->table_name . "
                WHERE user_id = :user_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['count'];
    }

    // Check if product is in stock
    public function checkStock($product_id, $quantity) {
        $query = "SELECT stock FROM products WHERE id = :product_id LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":product_id", $product_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($row && $row['stock'] >= $quantity);
    }
}
?>
