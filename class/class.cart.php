<?php
class Cart 
{
    private $conn;

    public function __construct() 
    {
        $this->conn = new PDO('mysql:host=172.16.0.214;dbname=group14', 'group14', '123456');    }

    public function addToCart($product_id, $product_1, $quantity_1, $product_2 = null, $quantity_2 = null) 
    {
        // Validate input
        $product_id = (int)$product_id;
        $product_1 = (int)$product_1;
        $quantity_1 = (int)$quantity_1;
        if ($product_2 !== null) 
        {
            $product_2 = (int)$product_2;
        }
        if ($quantity_2 !== null) 
        {
            $quantity_2 = (int)$quantity_2;
        }
    }
    public function deleteCart($product_id) {
        $sql = "DELETE FROM tbl_cart WHERE product_id = :product_id";
        $q = $this->conn->prepare($sql);
        $q->execute([':product_id' => $product_id]);
        return $q->rowCount() > 0;
    }

    public function editCart($product_id, $quantity_1, $quantity_2 = null) 
    {
        $sql = "UPDATE tbl_cart SET quantity_1 = :quantity_1, quantity_2 = :quantity_2 WHERE product_id = :product_id";
		$q = $this->conn->prepare($sql);
		$q->execute(array( ':quantity_1'=>$quantity_1, ':quantity_2'=>$quantity_2,':product_id'=>$product_id));
		return true;
	}
    

    public function listCartItems() 
    {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_cart");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function addCart($product_id, $product_1, $product_2, $quantity_1, $quantity_2)
    {
        // Prepare and bind values
        $stmt = $this->conn->prepare("INSERT INTO tbl_cart (product_id, product_1, quantity_1, product_2, quantity_2) VALUES (:product_id, :product_1, :quantity_1, :product_2, :quantity_2)");
        $stmt->bindValue(':product_id', $product_id);
        $stmt->bindValue(':product_1', $product_1);
        $stmt->bindValue(':quantity_1', $quantity_1);
        $stmt->bindValue(':product_2', $product_2);
        $stmt->bindValue(':quantity_2', $quantity_2);

        // Execute query
        $stmt->execute();
    }    
    
	function get_quantity1($product_id){
		$sql="SELECT quantity_1 FROM tbl_cart WHERE product_id = :product_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['product_id' => $product_id]);
		$quantity_1 = $q->fetchColumn();
		return $quantity_1;
	}
    
    function get_quantity2($product_id){
		$sql="SELECT quantity_2 FROM tbl_cart WHERE product_id = :product_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['product_id' => $product_id]);
		$quantity_2 = $q->fetchColumn();
		return $quantity_2;
	}
}
   
    



