<?php
include 'includes/header.php';
include 'includes/navbar.php';

?>

        <div id="slider">  
  <!-- ################################################## -->
  
          <ul id="slideWrap"> 
          <?php
                $blog_category = $db->query(
                    "SELECT p.*, c.name AS cname FROM posts p, categories c WHERE c.id = p.category_id AND p.status = '0' ORDER BY p.id DESC LIMIT 6"
                );
                if ($blog_category->num_rows > 0) {
                    foreach ($blog_category as $blogitems) { ?>

<?php if ($blogitems["image"] != null): ?>

  <li class="li"><a href="news/<?= date('Y/m/j', strtotime($blogitems["created_at"])); ?>/<?= $blogitems["url"] ?>"><img src="uploads/posts/<?= $blogitems["image"] ?>" alt="<?= $blogitems["name"]?>"></a></li>
      <?php endif; 
    }
    }?>
          </ul>
          <a id="prev" href="#"><i class="fa fa-angle-left"></i></a>
          <a id="next" href="#"><i class="fa fa-angle-right"></i></a>
        </div>


    <!-- image slider section  -->
<section id="imgSlider">
  
  

</section>
<section>
<h2>Latest video</h2>  
<div class="videoB">
<?php
                $blog_category = $db->query(
                    "SELECT p.*, c.name AS cname FROM posts p, categories c WHERE c.id = p.category_id AND p.status = '0' ORDER BY p.id DESC LIMIT 5"
                );
                if ($blog_category->num_rows > 0) {
                    foreach ($blog_category as $blogitems) { ?>

<?php if ($blogitems["image"] != null): ?>

  <div class="vid">
    <img src="uploads/posts/<?= $blogitems["image"] ?>" alt="<?= $blogitems["name"]?>">
  </div>
  <?php endif; 
    }
    }?>
  </div>

  <button id="allVids" class="loginBtn">see all videos</button>

  <div id="ads">
    <span>adverts goes here..., styled it blue for now</span>
    </div>
</section>

<section id="newsSection">
  <h1>news</h1>

        <?php
                $blog_category = $db->query(
                    "SELECT p.*, c.name AS cname FROM posts p, categories c WHERE c.id = p.category_id AND p.status = '0' ORDER BY p.id DESC LIMIT 4"
                );
                if ($blog_category->num_rows > 0) {
                    foreach ($blog_category as $blogitems) { ?>
<?php if ($blogitems["image"] != null): ?>
  <div>
<span class="divN"><?= $blogitems["cname"] ?></span>
  <img src="uploads/posts/<?= $blogitems["image"] ?>" alt="<?= $blogitems["name"]?>">
  <p><?= $blogitems["name"]?></p>
    <span class="newsdate"><?= date("d F Y",strtotime($blogitems["created_at"]))?></span>
  </div>
<?php endif; 
  }
  }?>


  <div id="newsads">
    <div>
      <span> this is just a text: that will help you know that another AD Goes here</span>
    </div>
  </div>

  <button id="allNews" class="loginBtn"> see all news</button>

</section>


<section id="matchtab">
  <h1>THE HUBLOT WATCH TABLE/DESIGN GOES HERE</h1>
  <div>unique matches styling goes here: the div would be deleted eventually and the styling of how the ACTUAL table looks like would be done.
    also the height would be made to look exactly like the main site looks...,it must be perfect
  </div>
</section>


<?php
include 'includes/footer.php';
?>