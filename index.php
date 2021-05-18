<?php
header("Access-Control-Allow-Origin: *");

//Registration
if(isset($_POST['email'], $_POST['password'],$_POST['register'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql');

    $query2 = "SELECT email FROM info";  
    $result2 = mysqli_query($conn, $query2) or die('Ресурс не найден11115');
    $rows2=mysqli_num_rows($result2); 
    for ($j=0;$j<$rows2;++$j)
    {$row=mysqli_fetch_row($result2);
    if ($row[0] === $email){
        echo('emailIsbusy');
        die;
    }}
    if (!$conn) die('Невозможно запустить mysql'); 
        $query  = "INSERT INTO info (email,password) VALUES('$email','$password')";  
        $result = mysqli_query($conn, $query) or die('Ресурс не найден');
        echo ('Conf');
}

//authentication
if(isset($_POST['email'], $_POST['password'],$_POST['auth'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 

    $query2 = "SELECT email,password FROM info";  
    $result2 = mysqli_query($conn, $query2) or die('Ресурс не найден11115');
    $rows2=mysqli_num_rows($result2); 
    for ($j=0;$j<$rows2;++$j)
    {$row=mysqli_fetch_row($result2);
    if ($row[0] == $email && $row[1] == $password){
        die('Confirm');
    }
    }
    echo ('err');
}

//????????????????????????????????????????????????????????
if(isset($_POST['name'] ,$_POST['secName'], $_POST['lastName'], $_POST['Country'], $_POST['City'], $_POST['Region'], $_POST['Apartmets'], $_POST['indexCity']))
{
$name = $_POST['name'];
$secName = $_POST['secName'];
$lastName = $_POST['lastName'];
$Country = $_POST['Country'];
$City = $_POST['City'];
$Region = $_POST['Region'];
$Apartmets = $_POST['Apartmets'];
$email = $_POST['email'];
$indexCity = $_POST['indexCity'];

require_once 'login.php';  
$conn = mysqli_connect($hn, $un, $pw, $db); 
if (!$conn) die('Невозможно запустить mysql'); 
$query = "INSERT INTO info (name,secondName,lastName,email,postСode,country,city,region,apartments) VALUES ('$name','$secName','$lastName','$email','$indexCity','$Country','$City','$Region','$Apartmets')";
$result = mysqli_query($conn, $query) or die('Resourse is undefined');
}

//Personal area
if(isset($_POST['email'], $_POST['StrLog'])){
    $email = $_POST['email'];
    require_once 'login.php';
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query2 = "SELECT id,email,name,secondName,lastName,postCode,country,city,region,apartments FROM info";  
    $result2 = mysqli_query($conn, $query2) or die('Ресурс не найден11115');
    $rows2=mysqli_num_rows($result2); 
    for ($j=0;$j<$rows2;++$j)
    {$row=mysqli_fetch_row($result2);
        if($row[1] === $email){
            echo($row[2].';'.$row[3].';'.$row[4].';'.$row[5].';'.$row[6].';'.$row[7].';'.$row[8].';'.$row[9]);
        }  
    }
}

//Changing personal data
if (isset($_POST['name'],$_POST['secName'],$_POST['lastName'],$_POST['email'],$_POST['isChangePers'])){
    $name = $_POST['name'];
    $secName = $_POST['secName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "UPDATE `info` SET `name` = '".$name."' , `secondName` = '".$secName."' , `lastName` = '".$lastName."' WHERE `email` = '".$email."'" ;
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    echo('loadAcceptPersData');
}

//Changing adress data
if (isset($_POST['Region'],$_POST['Country'],$_POST['City'],$_POST['email'],$_POST['isChangeAdressPers'],$_POST['Index'],$_POST['Apartmets'])){
    $Region = $_POST['Region'];
    $Country = $_POST['Country'];
    $City = $_POST['City'];
    $Index = $_POST['Index'];
    $Apartmets = $_POST['Apartmets'];
    $email = $_POST['email'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "UPDATE `info` SET `country` = '".$Country."' , `city` = '".$City."' , `region` = '".$Region."' , `apartments` = '".$Apartmets."' , `postCode` = '".$Index."' WHERE `email` = '".$email."'" ;
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    echo('loadAcceptAdress');
}

// if(isset($_POST['name'] ,$_POST['secName'],$_POST['addictionalNote'] , $_POST['lastName'], $_POST['Country'], $_POST['City'], $_POST['Region'], $_POST['Apartmets'], $_POST['Format'] , $_POST['indexCity'] , $_POST['email']))
// {
// $addictionalNote = $_POST['addictionalNote'];
// $name = $_POST['name'];
// $secName = $_POST['secName'];
// $lastName = $_POST['lastName'];
// $Country = $_POST['Country'];
// $City = $_POST['City'];
// $Region = $_POST['Region'];
// $Apartmets = $_POST['Apartmets'];
// $email = $_POST['email'];
// $Format = $_POST['Format'];
// $indexCity = $_POST['indexCity'];
// $file = $_FILES['file']['name'];
// require_once 'login.php';  
// $conn = mysqli_connect($hn, $un, $pw, $db); 
// if (!$conn) die('Невозможно запустить mysql'); 
// $query2 = "SELECT origImg,secImg FROM images";  
// $result2 = mysqli_query($conn, $query2) or die('Ресурс не найден11115');
// $rows2=mysqli_num_rows($result2); 
// for ($j=0;$j<$rows2;++$j)
// {$row=mysqli_fetch_row($result2);
// if ($row[0] === $file){
// 	$file = $row[1]; 
// } 
// }
// $query = "INSERT INTO info (name,secondName,lastName,format,email,postСode,country,city,region,apartments,addictionalNote,image) VALUES ('$name','$secName','$lastName','$Format','$email','$indexCity','$Country','$City','$Region','$Apartmets','$addictionalNote','$file')";
// $result = mysqli_query($conn, $query) or die('Resourse is undefined');
// }

//Randomise name for file
class DFileHelper
{public static function getRandomFileName($path, $extension=''){
        $extension = $extension ? '.' . $extension : '';
        $path = $path ? $path . '/' : '';
        do {
            $name = md5(microtime() . rand(0, 9999));
            $file = $path . $name . $extension;
        } while (file_exists($file));
        return $name;}}


//Load photo
if(isset($_POST['loadedimg']) === true){
$path = './upload'; 
$extension = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
$name  = $_FILES['file']['name'];
$type = $_FILES['file']['type'];
$size = $_FILES['file']['size'];
    if(($type == 'image/png') || ($type == 'image/jpg') || ($type == 'image/jpeg')){
        if ($size > 100000000){
            die("FileSoBig");
        }else{
            $filename = DFileHelper::getRandomFileName($path, $extension);
            $target = $path . '/' . $filename . '.' . $extension;
            move_uploaded_file($_FILES['file']['tmp_name'], $target);
            require_once 'login.php'; 
            $conn = mysqli_connect($hn, $un, $pw, $db); 
            if (!$conn) die('Невозможно запустить mysql'); 
            $query = "INSERT INTO images (origImg,secImg) VALUES ('$name','$target')";
            $result = mysqli_query($conn, $query) or die('Resourse is undefined');
            echo ('LoadAccept');
        }
    }else{
        die('badFormat');
    }

}
    

?>