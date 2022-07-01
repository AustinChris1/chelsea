<?php 
include 'includes/header.php';
include 'includes/navbar.php';
$user_id = $_SESSION['auth_user']['id'];

if (!isset($_SESSION["auth"])) {
?>
<div class="member"style="width: 100%; margin-right: 5rem;" >
    <img src="assets/member.jpeg" alt="">
</div>
<h1 style="margin: auto; text-align: center; font-size:35px;">You have to log in before you fill the form</h1>

<?php }
else{
?>
<div class="member"style="width: 100%; margin-right: 5rem;" >
    <img src="assets/member.jpeg" alt="">
</div>
<?php
$query = $db->query("SELECT * FROM users WHERE id = '$user_id' LIMIT 1");
foreach($query as $data):
?>
<div class="memberB">
    <form action="recruitcode" method="POST">
        <h1 style="margin: auto;">Player Recruitment Form</h1>
        <div class="field">
            <input type="text" name="fname" value="<?= $data['fname'];?>" readonly required>
            <span></span>
            <label>First Name*</label>
        </div>
        <div class="field">
            <input type="text" name="lname" value="<?= $data['lname'];?>" readonly required>
            <span></span>
            <label>Last Name*</label>
        </div>
        <div class="field">
            <input type="email" name="email" value="<?= $data['email'];?>" readonly required>
            <span></span>
            <label>Email*</label>
        </div>
        <div class="field">
            <input type="text" name="address" value="" required>
            <span></span>
            <label>Home Address*</label>
        </div>
        <div class="field">
            <input type="text" name="raddress" id="" required>
            <span></span>
            <label>Residential Address*</label>
        </div>
        <div class="field">
            <input type="text" name="birthplace" id="" required>
            <span></span>
            <label>Place Of Birth*</label>
        </div>
        <div class="field">
            <input type="number" name="phone" id="" required>
            <span></span>
            <label>Phone*</label>
        </div>
        <div class="fieldh" style="display: flex; flex-direction: row; ">
            <div class="field" style="width: 40%; margin-right: 5rem;">
            <input type="number" name="height" id="" required>
            <span></span>
            <label>Height (m)*</label>
        </div>
            <div class="field" style="width: 40%; margin-right: 5rem;">
            <input type="number" name="weight" id="" required>
            <span></span>
            <label>Weight (Kg)*</label>
        </div>
        </div>
        <div class="fieldh" style="display: flex; flex-direction: row; ">
            <div style="width: 40%; margin-right: 5rem;">
   <select name="gender" class="field" style="width: 100%; height: 3rem; margin-right: 5rem;" required>
                    <option value="">Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                </div>
            <div style="width: 40%; margin-right: 5rem;">
   <select name="position" class="field" style="width: 100%; height: 3rem;" required>
                    <option value="">Position</option>
                    <option value="Goalkeeper">GoalKeeper</option>
                    <option value="Defender">Defender</option>
                    <option value="Midfielder">Midfielder</option>
                    <option value="Forward">Forward</option>
                </select>
                </div>
                </div>
                <div class="fieldh" style="display: flex; flex-direction: row; ">
            <div class="field" style="width: 40%; margin-right: 5rem;">
                <input type="text" name="country" value="<?= $data['country'];?>" required>
                <span></span>
                <label>Country*</label>
            </div>
            <div class="field" style="width: 40%;">
                <input type="text" name="state"
                    required>
                <span></span>
                <label>State*</label>
            </div>
        </div>
        <div class="fieldh" style="display: flex; flex-direction: row; ">
            <div class="field" style="width: 40%; margin-right: 5rem;">
                <input type="text" name="zip" id="" required>
                <span></span>
                <label>Zip Code*</label>
            </div>
            <div class="field" style="width: 40%;">
                <input type="text" name="date" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'"
                    required>
                <span></span>
                <label>Date of birth*</label>
            </div>
        </div>
        <div class="fieldh" style="display: flex; flex-direction: row; ">
            <div class="field" style="width: 40%; margin-right: 5rem;">
                            <label>ID Card / Passport*</label>
<input type="file" name="id_image" capture="user" accept="image/*"
                    required>
                <span></span>
            </div>
            <div class="field" style="width: 40%;">
                               <label>User Image*</label>
 <input type="file" name="image"
                    required>
                <span></span>
            </div>
        </div>
        <!-- medical info -->

        <h1 style="margin: auto;">Medical Information</h1>
        <div class="fieldh" style="display: flex; flex-direction: row; ">
        <div class="field" style="width: 40%; margin-right: 5rem;">
                <input type="text" name="bgroup" id="" required>
                <span></span>
                <label>Blood Group*</label>
            </div>
            <div class="field" style="width: 40%;">
                <input type="text" name="genotype"
                    required>
                <span></span>
                <label>Genotype*</label>
            </div>
        </div>
        <div class="fieldh" style="display: flex; flex-direction: row; ">
        <div class="field" style="width: 40%; margin-right: 5rem;">
                <input type="text" name="allergy" id="" required>
                <span></span>
                <label>Allergies</label>
            </div>
            <div class="field" style="width: 40%;">
            <input type="text" name="deformation" id="" required>
                <span></span>
                <label>Deformation</label>
            </div>
        </div>
        <div class="fieldh" style="display: flex; flex-direction: row; ">
        <div class="field" style="width: 40%; margin-right: 5rem;">
        <input type="text" name="med_image" accept="image/*" onfocus="(this.type='file')" onblur="if(!this.value) this.type='text'"
                   >
                <span></span>
                <label>Medical Report*</label>
            </div>
        </div>
        <!-- medical info -->

        <h1 style="margin: auto;">Emergency Contact Information</h1>
        <div class="field">
            <input type="text" name="contactname" id="">
            <span></span>
            <label>Emergency Contact</label>
        </div>
        <div class="field">
            <input type="text" name="relname" id="">
            <span></span>
            <label>Relationship to player</label>
        </div>
        <div class="field">
            <input type="email" name="cont_email" id="">
            <span></span>
            <label>Email</label>
        </div>
        <div class="field">
            <input type="text" name="cont_address" id="">
            <span></span>
            <label>Contact Address</label>
        </div>
        <div class="field">
            <input type="number" name="cont_phone" id="">
            <span></span>
            <label>Telephone</label>
        </div>




        <span class="hlog"><input type="checkbox" name="" id="">Keep me posted! Yes, please send me news and promotional
            information from Chelsea FC and its official sponsors and partners via email
        </span>
        <span class="hlog"><input type="checkbox" name="" id="">By clicking this button, you agree to Chelsea FC Terms &
            Conditions


        </span>
        <button type="submit" name="recruit" class="loginBtn" style="width: 70%; margin-left:5rem; height: 4rem;" >Join Us</button>
    </form>

</div>
</div>
<!-- <img src="assets/chelsea21.jpg" alt=""> -->
<?php
endforeach;
}
include 'includes/footer.php';
?>