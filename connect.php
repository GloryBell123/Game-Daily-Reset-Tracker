  <?php
class connect {

  function conn()
  {
    $host = 'localhost';
    $dbname = 'gdrt';
    $user = 'root';
    $pass = '';
    $conn = new PDO
    ("mysql:host=$host;dbname=$dbname","$user","$pass");
    $conn -> exec("set names utf8"); 
    return $conn;
  }
  function query($sql)
  {
    $conn = $this ->conn();
    $res = $conn->prepare($sql);
    $res->execute();
    return $res;
  }
}

?>