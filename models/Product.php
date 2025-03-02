<?php
class Product {
    private $conn;
    private $table_name = "products";

    public $id;
    public $category_id;
    public $name;
    public $description;
    public $price;
    public $image_url;
    public $stock;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get all products
    public function getAll($page = 1, $items_per_page = 12) {
        $offset = ($page - 1) * $items_per_page;
        
        $query = "SELECT p.*, c.name as category_name 
                FROM " . $this->table_name . " p
                LEFT JOIN categories c ON p.category_id = c.id
                ORDER BY p.created_at DESC
                LIMIT :limit OFFSET :offset";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":limit", $items_per_page, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt;
    }

    // Get product by ID
    public function getById($id) {
        $query = "SELECT p.*, c.name as category_name 
                FROM " . $this->table_name . " p
                LEFT JOIN categories c ON p.category_id = c.id
                WHERE p.id = :id
                LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get products by category
    public function getByCategory($category_id, $page = 1, $items_per_page = 12) {
        $offset = ($page - 1) * $items_per_page;
        
        $query = "SELECT p.*, c.name as category_name 
                FROM " . $this->table_name . " p
                LEFT JOIN categories c ON p.category_id = c.id
                WHERE p.category_id = :category_id
                ORDER BY p.created_at DESC
                LIMIT :limit OFFSET :offset";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":category_id", $category_id);
        $stmt->bindParam(":limit", $items_per_page, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt;
    }

    // Create new product
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                (category_id, name, description, price, image_url, stock)
                VALUES
                (:category_id, :name, :description, :price, :image_url, :stock)";

        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->image_url = htmlspecialchars(strip_tags($this->image_url));
        $this->stock = htmlspecialchars(strip_tags($this->stock));

        // Bind values
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":image_url", $this->image_url);
        $stmt->bindParam(":stock", $this->stock);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Update product
    public function update() {
        $query = "UPDATE " . $this->table_name . "
                SET category_id = :category_id,
                    name = :name,
                    description = :description,
                    price = :price,
                    image_url = :image_url,
                    stock = :stock
                WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->image_url = htmlspecialchars(strip_tags($this->image_url));
        $this->stock = htmlspecialchars(strip_tags($this->stock));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind values
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":image_url", $this->image_url);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete product
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Search products
    public function search($keyword, $page = 1, $items_per_page = 12) {
        $offset = ($page - 1) * $items_per_page;
        
        $query = "SELECT p.*, c.name as category_name 
                FROM " . $this->table_name . " p
                LEFT JOIN categories c ON p.category_id = c.id
                WHERE p.name LIKE :keyword OR p.description LIKE :keyword
                ORDER BY p.created_at DESC
                LIMIT :limit OFFSET :offset";

        $stmt = $this->conn->prepare($query);
        $keyword = "%{$keyword}%";
        $stmt->bindParam(":keyword", $keyword);
        $stmt->bindParam(":limit", $items_per_page, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt;
    }

    // Update stock
    public function updateStock($id, $quantity) {
        $query = "UPDATE " . $this->table_name . "
                SET stock = stock + :quantity
                WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
}
?>
