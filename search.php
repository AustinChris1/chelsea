<?php
require_once 'databases/db_conn.php';
include 'includes/header.php';
include 'includes/navbar.php';
if(isset($_GET['search'])){
    $searchQuery = $_GET['search'];
    $searchQuery = $db->real_escape_string($searchQuery);



    if(isset($_GET['search']) && isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $num = 04;
    $start_from = ($page-1)*04;

    $pquery = $db->query("SELECT * FROM posts WHERE CONCAT(name,sub_description,description) LIKE '%$searchQuery%' ORDER BY id DESC LIMIT $start_from,$num");
    $playerquery = $db->query("SELECT * FROM players WHERE CONCAT(name,number,sub_description,description) LIKE '%$searchQuery%' ORDER BY id DESC LIMIT $start_from,$num");
    $uquery = $db->query("SELECT * FROM recruits WHERE CONCAT(fname,lname) LIKE '%$searchQuery%' ORDER BY id DESC LIMIT $start_from,$num");

    $urow = $uquery->num_rows;
    $prow = $pquery->num_rows;
    $playerrow = $playerquery->num_rows;
    $total_row = $urow + $prow + $playerrow;
    ?>
    <section class="mainSearch" style="margin-top: 7rem; margin-left: 2rem; z-index: 10000;">
    <h1>SEARCH RESULTS</h1>
    <button type="submit" class="loginBtn">ALL</button>
    <button type="submit" class="loginBtn">VIDEOS</button>
    <button type="submit" class="loginBtn">NEWS</button>
    <h2><?= $total_row?> result(s) for '<?= $searchQuery?>' in 'All'</h2>
    <?php

if($pquery->num_rows > 0){
    ?>
                <?php
foreach($pquery as $data){
        ?>
        <div class="postSearch"> <a href="news/<?= date("Y/m/j",strtotime($data["created_at"]))?>/<?= $data['url'] ?>"><img src="uploads/posts/<?= $data['image']?>" alt="<?= $data['name'] ?>" style="width: 300px; height: 200px;">
        <p class="postP"><?= $data['name'] ?><br><?= $data['sub_description'] ?></p></a></div>
        <?php
    }
}
if($playerquery->num_rows > 0){
    ?>
                <?php
foreach($playerquery as $data){
        ?>
        <div class="postSearch"> <a href="teams/first-team/<?= $data['url'] ?>"><img src="uploads/players/<?= $data['image']?>" alt="<?= $data['name'] ?>" style="width: 300px; height: 200px;">
        <div class="postP" style="margin-top: 0rem;"><div class="num"><?= $data['number'] ?></div>
        <?= $data['name'] ?><button class="loginBtn" style="width: 20rem; height: 3.5rem; margin-top: 1rem;">View Profile</button></div></a></div>
        <?php
    }
}
if($uquery->num_rows > 0){
        ?>
        <?php
        foreach($uquery as $data){
            ?>
        <div class="postSearch"> <a href="teams/recruits/<?= $data['url'] ?>"><img src="uploads/recruits/<?= $data['image']?>" alt="<?= $data['name'] ?>" style="width: 300px; height: 200px;">
        <div class="postP" style="margin-top: 0rem; width: 60px; height: 20px;"><div class="num"><?= $data['position'] ?></div>
        <?= $data['name'] ?><button class="loginBtn" style="width: 20rem; height: 3.5rem; margin-top: 1rem;">View Profile</button></div></a></div>
            <?php
        }
    }



    $postquery = $db->query("SELECT * FROM posts");
    $playersquery = $db->query("SELECT * FROM players");
    $recruitquery = $db->query("SELECT * FROM recruits");

    $recruitrow = $recruitquery->num_rows;
    $postrow = $postquery->num_rows;
    $playersrow = $playersquery->num_rows;
    $total_num_row = $recruitrow + $postrow + $playersrow;
    $total_page = ceil($total_num_row/$num);
    // echo $total_page;
    if($page > 1){
        ?>
      <button onclick="window.location.href='?search=<?=$searchQuery?>&page=<?=($page-1)?>'">Previous</button>
    <?php }
    for($i=1;$i<=$total_page;$i++){
        ?>
        <button onclick="window.location.href='?search=<?=$searchQuery?>&page=<?=$i?>'"><?= $i ?></button>
        <?php }
        if($page < $i){
            ?>
            <button onclick="window.location.href='?search=<?=$searchQuery?>&page=<?=($page+1)?>'">Next</button>
          <?php }
      
}


?>
    </section>

<style>
    .mainSearch h1{
        font-size: 50px;
        color: #fff;
        -webkit-text-stroke: 1px silver;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    }
    .mainSearch h2{
        margin-left: .5rem;
        color: silver;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    .postP{
        font-size: 20px;
        margin-left: 22rem;
        margin-top: 2rem;
        color: #000;
        text-decoration: none;
        overflow: hidden !important;
        white-space: nowrap !important;
        text-overflow: ellipsis !important;
        display: flex;
    flex-direction: column;
    z-index: 5;

    }
    .postSearch{
    height: 100%;
    width: 100%;
    display: flex;
    flex-direction: row;
    margin-bottom: 4rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid silver;
}
.postSearch a{
    overflow: hidden;
    position: relative;
margin-right: 2rem;
width: 45rem;
height: 10rem;
text-decoration: none;
display: flex;
    flex-direction: row;
}
.postSearch a >img {
    position: absolute; 
    inset: 0;
    height: 100%;
    width: 100%;
    z-index: -1;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    transition: transform 200ms;
}
.postSearch a:hover > img{
    transform: scale(1.05);
}
.num{
    display: inline-block;
    padding: 10px ;
    height: 40px;
    width: 50px;
    background-color: #39579A;
    color: #fff;
    font-weight: bold;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 30px;
    text-align: center;
}
    .loginBtn{
    display: inline-block;
    width: 9rem;
    height: 2.5rem;
    padding: 18px;
    border: 2.5px solid #39579A;
    transition: all 0.2s ease-in;
    position: relative;
    overflow: hidden;
    font-size: 17px;
    color: blue;
    z-index: 1;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    margin-right: 12px;

   }
   
.loginBtn:before {
    content: "";
    position: absolute;
    left: 50%;
    transform: translateX(-50%) scaleY(1) scaleX(1.25);
    top: 100%;
    width: 140%;
    height: 180%;
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 50%;
    display: block;
    transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
    z-index: -1;
   }
   
.loginBtn:after {
    content: "";
    position: absolute;
    left: 55%;
    transform: translateX(-50%) scaleY(1) scaleX(1.45);
    top: 180%;
    width: 160%;
    height: 190%;
    background-color: blue;
    border-radius: 50%;
    display: block;
    transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
    z-index: -1;
   }
   
.loginBtn:hover {
    color: #ffffff;
    border: 1px solid #39579A;
   }
   
.loginBtn:hover:before {
    top: -35%;
    background-color: blue;
    transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
   }
   
.loginBtn:hover:after {
    top: -45%;
    background-color: blue;
    transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
   }

</style>

<?php
include 'includes/footer.php';

?>