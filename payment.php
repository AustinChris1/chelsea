<?php
include 'includes/header.php';
include 'includes/navbar.php';
// include 'paypalcode.php';


if ($_SESSION["auth_user"]) {
$secret = 'EAcuTZo1gD3osmC6XoWoG5z60wYkhLu-wMUbpTgtBwsjlhkevVKJV9qaPZNYKKYSa2QzD8Uj2nFh_9x1';
$id = 'AZDzDdp-ohTWJinSE8ZZMjq5smGqScKjFsAsgOXD4qGBgoybkG4XMnS3g1lZWSZVd46VhI3DwkumCXnE';
$user_id = $_SESSION['auth_user']['id'];
    ?>
    <div class="member"style="width: 100%; margin-right: 5rem;" >
        <img src="assets/realchelsea.jpeg" alt="chelseafc">
    </div>
    
<section id="newsSection" style="margin-top: 3rem; margin-bottom: 3rem;">
<h1 style="margin: auto; text-align: center; margin-bottom: 3rem;">Payment Page</h1>
<?php
$query = $db->query("SELECT r.* FROM recruits r, users u WHERE user_id = '$user_id' AND u.id = r.user_id");
if($query->num_rows>0){
    foreach ($query as $items) : ?>
          <?php if ($items["image"] != null) : ?>
            <div style="border: 2px solid blue;">
          <span class="divN"><?= $items["position"] ?></span>
          <img src="assets/member.jpeg" alt="<?= $items["lname"] ?>">
          <p><?= $items["fname"]; ?> <?= $items["lname"]; ?></p>
          <span class="newsdate">$200</span>
        </div>
        <form action="paypal_payment.php" method="post">
            <input type="text" name="amount" value="200">
        <button type="submit" id="btn-paypal" name="paypal" class="loginBtn">Proceed with payment</button>
</form>        
<?php endif;
        endforeach; 
    }else{?>
<h1 style="margin: auto; text-align: center; font-size:35px;">You have not filled the recruitment form</h1>
<?php } ?>
</section>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="/chelsea/jquery.js"></script>
    <script src="/chelsea/paypal.js"></script>

<?php
}else{    ?>
    <div class="member"style="width: 100%; margin-right: 5rem;" >
        <img src="/chelsea/assets/realchelsea.jpeg" alt="chelseafc">
    </div>
    <h1 style="margin: auto; text-align: center; font-size:35px;">You have to log in to access here</h1>
<?php 
}
include 'includes/footer.php';
?>