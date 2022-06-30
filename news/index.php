<?php
include 'url.php';

include 'includes/header.php';
include 'includes/navbar.php';

if (isset($_GET["date"])) {
  $slug = $_GET["date"];
  $getdate = $db->query("SELECT * FROM posts WHERE DATE_FORMAT(created_at, '%Y/%m/%e') = '$slug' LIMIT 1");

  if ($getdate->num_rows > 0) {
    $date = $getdate->fetch_array();
    //getting title
    if (isset($_GET['title'])) {
      $title = $_GET['title'];
      $getTitle = $db->query("SELECT * FROM posts WHERE url = '$title' AND DATE_FORMAT(created_at, '%Y/%m/%e') = '$slug' LIMIT 1");
      if ($getTitle->num_rows > 0) {
        $url = $getTitle->fetch_array();
?>
        <title><?= $url["name"] ?> | Chelsea FC</title>
    <?php
      }
    }
    ?>
    <title><?= date('Y/m/d', strtotime($date["created_at"])); ?> | Chelsea FC</title>
  <?php

  } else { ?>
    <title>News | Chelsea FC</title>
  <?php
  }
} else { ?>
  <title>News | Chelsea FC</title>
  <!-- news according to details -->
<?php
}
if (isset($_GET['date']) && isset($_GET['title'])) {
  $mainTitle = $_GET['title'];
  $main = $db->query("SELECT p.*, c.name AS cname FROM posts p, categories c WHERE p.url = '$mainTitle' AND DATE_FORMAT(p.created_at, '%Y/%m/%e') = '$slug' AND c.id = p.category_id AND p.status = '0' LIMIT 1");
  if ($main->num_rows > 0) {
    $getT = $main->fetch_array();
?>
    <section style="margin-top: 4rem; padding:2rem 2rem 2rem 2rem;">
      <?php
      foreach ($main as $details) :
        $detname= $details['cname'];
        $postid= $details['id'];
        if ($details["image"] != null) : ?>
                      <span class="divN" style="margin-bottom:2rem;"><?= $details['cname'] ?></span>
<h1 style="font-size: 35px; color: blue; "><?= $details['name']; ?></h1>
            <span><?= date("d F Y, h:i A", strtotime($details["created_at"])) ?></span>
           <div class="member" style="width: 100%; margin-right: 5rem;">
            <img src="<?= base_url('../uploads/posts/'.$details['image']) ?>" alt="<?= $details["name"] ?>">
            </div> 
            <p style="max-width: 80%; margin-right:20%;"><?= $details["description"]; ?></p>

             <!-- more news below according to category -->
    <section id="newsSection" style="margin-top: 8rem;">
  <?php
  $category = $db->query(
    "SELECT p.*, c.name AS cname FROM posts p, categories c WHERE c.id = p.category_id AND p.status = '0' AND c.name ='$detname' AND p.id !='$postid' ORDER BY p.id DESC LIMIT 3"
  );
  if ($category->num_rows > 0) { ?>
    <h1>More from Chelsea</h1>
<?php
    foreach ($category as $cat_items) { ?>
      <?php if ($cat_items["image"] != null) : ?>
        <div style="border: 0.15rem solid #39579A;" onclick="window.location.href='<?= $cat_items['url']; ?>'">
          <span class="divN"><?= $cat_items["cname"] ?></span>
          <img src="<?= base_url('../uploads/posts/'.$cat_items['image']) ?>" alt="<?= $cat_items["name"] ?>">
          <p><?= $cat_items["name"] ?></p>
          <span class="newsdate"><?= date("d F Y", strtotime($cat_items["created_at"])) ?></span>
        </div>
  <?php endif;
    }
  } ?>

    </section>
            </section>

<?php endif;
      endforeach;
?>
<?php
  }
}

//  news according to date
elseif (isset($_GET["date"])) {
  $slug = $_GET["date"];

  $slug = $db->real_escape_string($slug);

  $posts = $db->query("SELECT p.*, c.name AS cname FROM posts p, categories c WHERE DATE_FORMAT(p.created_at, '%Y/%m/%e') = '$slug' AND c.id = p.category_id AND p.status = '0' ORDER BY p.id DESC LIMIT 1");
  if ($posts->num_rows > 0) {

?>

<section id="newsSection" style="margin-top: 8rem;">
  <h1>Chelsea FC News - <?= date("d F Y", strtotime($slug)); ?></h1>
  <?php
    foreach ($posts as $post_items) : ?>
    <?php if ($post_items["image"] != null) : ?>
      <div onclick="window.location.href='<?= base_url(date('Y/m/j', strtotime($post_items['created_at'])).'/'.$post_items['url']); ?>'">
        <span class="divN"><?= $post_items["cname"] ?></span>
        <img src="<?= base_url('../uploads/posts/'.$post_items['image']) ?>" alt="<?= $post_items["name"] ?>">
        <p><?= $post_items["name"] ?></p>
        <span class="newsdate"><?= date("d F Y", strtotime($post_items["created_at"])) ?></span>
      </div>
  <?php endif;
    endforeach;
  ?>
  <div>
    <span class="divN">Hello</span>
    <p>Here for calendar</p>
    <span class="newsdate">15 June 2022</span>
  </div>
  <?php
    $post_category = $db->query(
      "SELECT p.*, c.name AS cname FROM posts p, categories c WHERE DATE_FORMAT(p.created_at, '%Y/%m/%e') = '$slug' AND c.id = p.category_id AND p.status = '0' AND p.id !=(SELECT MAX(id) FROM posts) ORDER BY p.id DESC"
    );
    if ($post_category->num_rows > 0) {
      foreach ($post_category as $postitems) { ?>
      <?php if ($postitems["image"] != null) : ?>
        <div onclick="window.location.href='<?= base_url(date('Y/m/j', strtotime($postitems['created_at'])).'/'.$postitems['url']); ?>'">
          <span class="divN"><?= $postitems["cname"] ?></span>
          <img src="<?= base_url('../uploads/posts/'.$postitems['image']) ?>"" alt="<?= $postitems["name"] ?>">
          <p><?= $postitems["name"] ?></p>
          <span class="newsdate"><?= date("d F Y", strtotime($postitems["created_at"])) ?></span>
        </div>
  <?php endif;
      }
    } ?>

</section>
<?php
  } 
else {
?>
  <section id="newsSection" style="margin-top: 8rem;">
    <h1>Chelsea FC News</h1>

    <div><i class="fa fa-newspaper-o"></i> No News Available</div>
  </section>
<?php
  }
} else {











?>
<section id="newsSection" style="margin-top: 8rem;">
  <h1>Latest Chelsea FC News</h1>

  <?php
  $blog_category = $db->query(
    "SELECT p.*, c.name AS cname FROM posts p, categories c WHERE c.id = p.category_id AND p.status = '0' ORDER BY p.id DESC LIMIT 1"
  );
  if ($blog_category->num_rows > 0) {
    foreach ($blog_category as $blogitems) { ?>
      <?php if ($blogitems["image"] != null) : ?>
        <div onclick="window.location.href='<?= date('Y/m/j', strtotime($blogitems['created_at'])); ?>/<?= $blogitems['url']; ?>'">
          <span class="divN"><?= $blogitems["cname"] ?></span>
          <img src="<?= base_url('../uploads/posts/'.$blogitems['image']) ?>" alt="<?= $blogitems["name"] ?>">
          <p><?= $blogitems["name"] ?></p>
          <span class="newsdate"><?= date("d F Y, h:i A", strtotime($blogitems["created_at"])) ?></span>
        </div>
  <?php endif;
    }
  } ?>
  <div>
    <span class="divN">Hello</span>
    <img src="../assets/go_-_footer_-_trans.webp" alt="">
    <p>Here for calendar</p>
    <span class="newsdate">15 June 2022</span>
  </div>

  <?php
  $blog_category = $db->query(
    "SELECT p.*, c.name AS cname FROM posts p, categories c WHERE c.id = p.category_id AND p.status = '0' AND p.id !=(SELECT MAX(id) FROM posts) ORDER BY p.id DESC LIMIT 5"
  );
  if ($blog_category->num_rows > 0) {
    foreach ($blog_category as $blogitems) { ?>
      <?php if ($blogitems["image"] != null) : ?>
        <div onclick="window.location.href='<?= date('Y/m/j', strtotime($blogitems['created_at'])); ?>/<?= $blogitems['url']; ?>'">
          <span class="divN"><?= $blogitems["cname"] ?></span>
          <img src="../uploads/posts/<?= $blogitems["image"] ?>" alt="<?= $blogitems["name"] ?>">
          <p><?= $blogitems["name"] ?></p>
          <span class="newsdate"><?= date("d F Y, h:i A", strtotime($blogitems["created_at"])) ?></span>
        </div>
  <?php endif;
    }
  } ?>
  <p class="moreN">More News...</p>
  <?php
  $blog_category = $db->query(
    "SELECT p.*, c.name AS cname FROM posts p, categories c WHERE c.id = p.category_id AND p.status = '0' ORDER BY p.id DESC LIMIT 6"
  );
  if ($blog_category->num_rows > 0) {
    foreach ($blog_category as $blogitems) { ?>
      <?php if ($blogitems["image"] != null) : ?>
        <div onclick="window.location.href='<?= date('Y/m/j', strtotime($blogitems['created_at'])); ?>/<?= $blogitems['url']; ?>'">
          <span class="divN"><?= $blogitems["cname"] ?></span>
          <img src="../uploads/posts/<?= $blogitems["image"] ?>" alt="<?= $blogitems["name"] ?>">
          <p><?= $blogitems["name"] ?></p>
          <span class="newsdate"><?= date("d F Y", strtotime($blogitems["created_at"])) ?></span>
        </div>
  <?php endif;
    }
  } ?>
  <button id="allNews" class="loginBtn">Show more</button>

</section>

<?php
}
include 'includes/footer.php';

?>