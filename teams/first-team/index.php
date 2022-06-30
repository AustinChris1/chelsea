<?php
include '../includes/header.php';
include '../includes/navbar.php';
if (isset($_GET["profile"])) {
    $slug = $_GET["profile"];
  
    $getprofile = $db->query("SELECT * FROM players WHERE url = '$slug' LIMIT 1");
  
      if ($getprofile->num_rows > 0) {
        $profile = $getprofile->fetch_array();?>
          <title><?= $profile["name"]?> | Chelsea FC</title>
<?php
      } else {
      $page_title = "Profile | Chelsea FC";
    }
  } else {
    $page_title = "Profile | Chelsea FC";
  }
  ?>
  
  <?php if (isset($_GET["profile"])) {
    $slug = $_GET["profile"];
  
    $slug = $db->real_escape_string($slug);
  
    $posts = $db->query("SELECT p.*, c.name AS cname FROM players p, player_category c WHERE p.url = '$slug' AND c.id = p.player_category_id LIMIT 1");
    $posta = $posts->fetch_array();

    if ($posts->num_rows > 0) {
      foreach ($posts as $post_items) { 
        $dob = new DateTime($post_items['dob']);
        $now = new DateTime();
        $difference = $now->diff($dob);
        $age = $difference->y;
        ?>
      
            <?php if ($post_items["image"] != null) : ?>
              <div class="member"style="width: 100%; height: 35rem; margin-right: 5rem;" >
              <img src="../../uploads/players/<?= $post_items["image"] ?>" style="height: 35rem;"  alt="<?= $post_items["name"] ?>">
</div>
<div class="details">
        <p class="dfp"><?= $post_items['name']?></p>
        <div class="extra">
        <p>0 <br> Appearances</p>
        <p>0 <br> Goals</p>
        <p>0 <br> Assists</p>
        <p>0% <br> Pass accuracy</p>

        </div>
        <div class="info">
        <p class="pinfo">Personal Information</p>
        <div class="pinfo">Name <p><?= $post_items['name'];?></p></div>
        <div class="pinfo">Date of birth <p><?= date('F j, Y', strtotime($post_items['dob']))?>  (age <?= $age;?>)</p></div>
        <div class="pinfo">Birthplace <p><?= $post_items['birthplace']?></p></div>
        <div class="pinfo">Height <p><?= $post_items['height']?>m</p></div>
        <div class="pinfo">Weight <p><?= $post_items['weight']?> Kg</p></div>
        <div class="pinfo">Position <p><?= $post_items['cname']?></p></div>
        <div class="pinfo">Number <p><?= $post_items['number']?></p></div>
        </div>
      </div>

<?php endif; ?>
<div class="navdesc">
<a href="" class="nd">Biography</a>
<a href="" class="nd">Statistics</a>
<a href="" class="nd">News</a>
<a href="" class="nd">Videos</a>
</div>
            <div class="desc">
              <?= $post_items["description"] ?>
            </div>
          </div>
  
        </div>
        </div>
  
      <?php }
    } else {
      ?>
      <h4><i class="fa fa-user"></i> No Player</h4>
    <?php
    }
  } else {
  
  
  
  
  
  
  
  
  
  
  
  ?>
  
<section style="margin-top: 7rem; margin-left: 5rem;">
    <div class="sideBtn">
        <h1 style="font-size: 40px; margin-top: -1rem;">Men</h1>
        <div>
    <button type="submit" style="font-size: 12px; width: 7rem; height: .8rem; margin-right: 1rem; text-align: center;" class="loginBtn">PLAYERS</button>
    <button type="submit"  style="font-size: 12px; width: 7rem; height: .8rem; margin-right: 1rem; text-align: center;" class="loginBtn">MANGEMENT</button>
</div>
    </div>
</section>
<section>
    <h2 style="font-size: 35px;">GoalKeepers</h2>   
     <div class="playercont">

<?php
                $player_category = $db->query(
                    "SELECT p.*, c.name AS cname FROM players p, player_category c WHERE c.id = p.player_category_id AND p.player_category_id = '1' AND p.status = '0'"
                );
                if ($player_category->num_rows > 0) {
                    foreach ($player_category as $playeritems) { ?>

<?php if ($playeritems["image"] != null): ?>
    <div class="player" onclick="window.location.href='?profile=<?=$playeritems['url'];?>'"><div class="num"><?= $playeritems['number'] ?></div>
<img src="../../uploads/profile/<?=$playeritems['p_image']?>" alt="">
<p class="playname"><?= $playeritems['name'] ?></p>
    </div> 
     <?php endif; 
    }
    }?>
</div>

</section>

<section>
    <h2 style="font-size: 35px;">Defenders</h2>   
     <div class="playercont">

<?php
                $player_category = $db->query(
                    "SELECT p.*, c.name AS cname FROM players p, player_category c WHERE c.id = p.player_category_id AND p.player_category_id = '4' AND p.status = '0'"
                );
                if ($player_category->num_rows > 0) {
                    foreach ($player_category as $playeritems) { ?>

<?php if ($playeritems["image"] != null): ?>
    <div class="player" onclick="window.location.href='?profile=<?=$playeritems['url'];?>'"><div class="num"><?= $playeritems['number'] ?></div>
<img src="../../uploads/profile/<?=$playeritems['p_image']?>" alt="<?=$playeritems['name']?>">
<p class="playname"><?= $playeritems['name'] ?></p>
    </div> 
     <?php endif; 
    }
    }?>
</div>
</section>
<?php
  }
include '../includes/footer.php';

?>
<style>
    .sideBtn{
display: flex;
flex-direction: row;
justify-content: space-between;
}
.playercont{
    display: flex;
flex-direction: row;
margin: auto;
justify-content: space-between;
margin-left: 2rem;
margin-bottom: 10rem;
width: 38rem;
height: 27rem;
}
.player{
margin-left: 7.5rem;
width: 38rem;
height: 27rem;
}
.num{
    display: inline-block;
    padding: 10px ;
    height: 48px;
    width: 55px;
    background-color: #39579A;
    color: #fff;
    font-weight: bold;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 30px;
    text-align: center;
    position: relative;
    top: 24rem;
    left: -1.5rem;
}
.playname{
    font-size: 25px;
    color: #39579A;
    font-weight: bold;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: justify;
    width: 18px;
}
</style>