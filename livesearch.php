<?php
require_once 'databases/db_conn.php';
if(isset($_POST['input'])){
    $searchQuery = $_POST['input'];
    $searchQuery = $db->real_escape_string($searchQuery);

    $pquery = $db->query("SELECT * FROM posts WHERE CONCAT(name) LIKE '%$searchQuery%' ORDER BY id DESC LIMIT 3");
    $playerquery = $db->query("SELECT * FROM players WHERE CONCAT(name,number) LIKE '%$searchQuery%' ORDER BY id DESC");
    $uquery = $db->query("SELECT * FROM users WHERE CONCAT(fname,lname) LIKE '%$searchQuery%' ORDER BY id DESC LIMIT 1");

if($playerquery->num_rows>0){
    while($pq = $playerquery->fetch_assoc()){?>
    <div class="sr" onclick="window.location.href='teams/first-team?profile=<?= $pq['url'];?>'" style="width:100%; margin-bottom: 5px; padding-bottom: 5px; border-bottom: 1px solid blue;"><?= $pq['name'];?></div>
<?php    }

}


}

?>