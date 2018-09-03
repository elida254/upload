<?php
//connect to server
$connection = mysqli_connect("localhost","root","","test");
if ($connection) {
    echo "connected";
}else {
    echo "error in connecting";
    
    }
    //uploading and displaying image.
    if(isset($_POST['Submit1']))
    { 
    
        //$file = $_FILES['file']['name'];
       // $fileTMP = $_FILES['file']['tmp_name'];

    $filepath = "images/" . $_FILES["file"]["name"];
    $text = $_POST['text'];

    if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath))
        $sql = "INSERT INTO `testdb`( `imagename`,`type`) VALUES ('$filepath','$text')";
        $qry = mysqli_query($connection, $sql);
        if ($qry) {
        echo "uploaded";
        }
    {
    echo "<img src=".$filepath." height=120px width=120px />";
        echo ".$text";
    } 
    } else {
        echo "not uploaded";
    } 
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div class="upload">
            <form action="upload.php" enctype="multipart/form-data" method="post">
                        Select image :
                <input  type="hidden" name="size" value="100000"><br><br>
                <input id="in" type="file" name="file"><br><br>
                <input id="out" type="submit" value="Upload" name="Submit1"> <br><br>
                <textarea name="text" cols="30" rows="4" placeholder="say something about the image...">
                </textarea>
            </form>
        </div>
    </body>
</html>