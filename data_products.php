<style>
.error {
    color: #ff0000
}
</style>
<?php
$name = $description =$price =$photo ="";
$nameErr = $descriptionErr =$priceErr =$photoErr ="";
$name_valid = $description_valid =$price_valid =$photo_valid =false;

if ($_SERVER ["REQUEST_METHOD"] =="POST"){
  
      if (empty($_POST["name"])) {
        $namaErr = "Name is required";
      } else {
        $nama = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $namaErr = "Only letters and white space allowed";
        } else{
          $name_valid= true;
        }
      }

      if (empty($_POST["description"])) {
        $descriptionErr = "Description is required";
      } else {
        $description = test_input($_POST["description"]);
        //$valid_desc = true;
      }
    
      if (empty($_POST["price"])) {
        $priceErr = "Price is required";
      } else {
        $price = test_input($_POST["price"]);
        //$valid_price = true;
      }
    
      if (empty($_POST["photo"])) {
        $photoErr = "Photo is required";
      } else {
        $photo = test_input($_POST["photo"]);
        //$valid_photo = true;
      }
    }  
    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?><h2>Tambah Produk</h2>
<form action="insert.php" method="post">
    Name of Product : <br>
    <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span><br><br>

    Description : <br>
    <textarea rows="5" cols="50" name="description"></textarea>
    <span class="error">* <?php echo $descriptionErr;?></span><br><br>

    Price : <br>
    <input type="number" name="price" value="<?php echo $price;?>">
    <span class="error">* <?php echo $priceErr;?></span><br><br>

    Upload Photo : <br>
    <input type="file" accept="image/*" name="photo" onchange="loadFile(event)" value="<?php echo $photo; ?>"><img id="output" />
    <span class="error">* <?php echo $photoErr;?></span><br><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
//     var_dump($email,$nama,$password, $repassword, $role);
//    var_dump ($valid_email ,$valid_name ,$valid_password , $valid_role);
//     echo "Your Input:";

    if($name_valid && $description_valid && $price_valid && $photo_valid == true){
        // echo $email;
        // echo "<br>";
        // echo $nama;
        // echo "<br>";
        // echo $password;
        // echo "<br>";
        // echo $repassword;
        // echo "<br>";
        // echo $role;
        include "insert.php";
    }
?>