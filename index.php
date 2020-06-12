<!DOCTYPE html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<html>
<head>
	<title>OpenSooq Assignment - Software Engineer</title>
</head>
<?php
require "Hamming.php";
require "Levenshtein.php";

if(isset($_POST["hamming"]))
{
    $fields = ['string 1'=>'str1','string 2'=>'str2'];
    foreach ($fields as $key=>$field){
        if(!isset($_POST[$field]) || empty(trim($_POST[$field]))){
            $errors[] = "$key is required";
        }
    }
    if(empty($errors)) {
        $string1 = trim($_POST['str1']);
        $string2 = trim($_POST['str2']);
        if(strlen($string1) != strlen($string2)){
            $errors[] = "you should enter the same length";
        }else {
            $hamming = new Hamming();
            $hamming->__set('string1', $string1);
            $hamming->__set('string2', $string2);
            $success = $hamming->hamming_dis();
        }
    }
}

if(isset($_POST["levenshtein"]))
{
    $fields = ['string 1'=>'str1','string 2'=>'str2'];
    foreach ($fields as $key=>$field){
        if(!isset($_POST[$field]) || empty(trim($_POST[$field]))){
            $errors[] = "$key is required";
        }
    }
    if(empty($errors)) {
        $string1 = trim($_POST['str1']);
        $string2 = trim($_POST['str2']);
        $levenshtein=new Levenshtein();
        $levenshtein->__set('string1',$string1);
        $levenshtein->__set('string2',$string2);
        $success = $levenshtein->levenshtein_dis();
    }
}


?>
<body>
   <div class="container" style="margin-top: 20px">
	<form  method="POST">
        <div class="form-group">
            <label  class="font-weight-bold" for="str1">String1</label>
            <input type="text" class="form-control" value="<?php if(isset($_POST['str1'])){echo $_POST['str1']; }?>" id="str1" name="str1" placeholder="Enter String 1">
        </div>
        <div class="form-group">
            <label  class="font-weight-bold" for="str2">String2</label>
            <input type="text" class="form-control"  value="<?php if(isset($_POST['str2'])){echo $_POST['str2']; }?>" name="str2" placeholder="Enter String 1">
        </div>
        <button class="btn btn-success" name="hamming" type="submit">Hamming</button>
        <p>
            <small>Hamming distance that only have substitute operations </small>
        </p>
        <button class="btn btn-primary" name="levenshtein" type="submit">Levenshtein</button>
        <p>
            <small>Levenshtein distance: that have 3 possible operators: insert, delete or substitution operations </small>
        </p>
	</form>

    <br>
   <?php
   if(isset($errors)){
       foreach ($errors as $error){ ?>
           <div class="alert alert-danger">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Errors!</strong> <?php echo $error; ?>
           </div>
       <?php    }
   }

   if(isset($success)){
       ?>
       <div class="alert alert-success">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>success!</strong> <?php echo $success; ?>
       </div>
       <?php
   }
   ?>
</div>
</body>
</html>