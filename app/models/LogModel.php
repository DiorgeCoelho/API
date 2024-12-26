<?php
require_once __DIR__ . '/../core/Database.php';
class LogModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function saveLog($url, $status,  $method)
    {
        $query = "INSERT INTO logs (request_url, request_method, response_status, created_at) 
                  VALUES (:url, :method, :status, :created_at)";

        $stmt = $this->db->prepare($query);

        $stmt->execute([
            ':url' => $url,
            ':method' => $method, 
            ':status' => $status,
            ':created_at' => date('Y-m-d H:i:s'),
        ]);
    }
    
    

}
