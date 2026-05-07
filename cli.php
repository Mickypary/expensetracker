<?php

include_once __DIR__ . "/vendor/autoload.php";

include_once __DIR__ . '/src/Framework/Database.php';

use Framework\Database;
use App\Config\Paths;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(Paths::ROOT);
$dotenv->load();

$db = new Database($_ENV['DB_DRIVER'], ['host' => $_ENV['DB_HOST'], 'dbname' => $_ENV['DB_NAME'], 'port' => $_ENV['DB_PORT']], $_ENV['DB_USER'], $_ENV['DB_PASS']);

// try {
//   // sql injection example
//   // $search = "Hats' OR 1=1 -- ";
//   // $query = "SELECT * FROM products WHERE name='{$search}'";
//   // echo $query;
//   // $stmt = $db->connection->query($query, PDO::FETCH_ASSOC);
//   // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));

//   $db->connection->beginTransaction();

//   $db->connection->query("INSERT INTO products VALUES (99,'Gloves')");


//   $search = "Hats";
//   // $query = "SELECT * FROM products WHERE name = ?";
//   $query = "SELECT * FROM products WHERE name = :name";

//   $stmt = $db->connection->prepare($query);
//   $stmt->bindValue(':name', 'Gloves', PDO::PARAM_STR);
//   // For Positional placeholder
//   // $stmt->execute([
//   //   $search,
//   // ]);

//   // For Named placeholder
//   // $stmt->execute([
//   //   'name' => $search,
//   // ]);

//   $stmt->execute();

//   var_dump($stmt->fetchAll(PDO::FETCH_OBJ));

//   // End Transaction
//   $db->connection->commit();
// } catch (Exception $error) {
//   if ($db->connection->inTransaction()) {
//     $db->connection->rollBack();
//   }
//   echo "Transaction failed";
// }


$sqlFile = file_get_contents("./database.sql");
$db->query($sqlFile);
