<?php
header("Access-Control-Allow-Origin: *");


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

//Order
if(isset($_POST['summ'] ,$_POST['name'] ,$_POST['tovar'] ,$_POST['secName'], $_POST['lastName'], $_POST['email'], $_POST['Country'], $_POST['City'], $_POST['Region'], $_POST['Apartmets'], $_POST['indexCity'] , $_POST['Order'])){
    if(isset($_FILES)){
        $names = '';
        $path = './upload'; 
        foreach($_FILES as $file){
            $extension = strtolower(substr(strrchr($file['name'], '.'), 1));
            $filename = DFileHelper::getRandomFileName($path, $extension);
            $target = $path . '/' . $filename . '.' . $extension;
            move_uploaded_file($file['tmp_name'], $target);
            $names = $names.$target.' ';
        }}
    $addictionalNote = $_POST['addictionalNote'];
    $FIO = $_POST['name'].' '.$_POST['secName'].' '.$_POST['lastName'];
    $Adress =  $_POST['indexCity'].', '.$_POST['Country'].', '.$_POST['City'] .', '.$_POST['Region'] .', '.$_POST['Apartmets'];
    $email = $_POST['email'];
    $tovar = $_POST['tovar'];
    $summ = $_POST['summ'];
    $date = date('Y/m/d H:i:s');
    require_once 'login.php'; 
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "INSERT INTO orders (email,FIO,Adress,orderUser,summ,imgPortret,addictionalNote,date) VALUES ('$email','$FIO','$Adress','$tovar','$summ','$names','$addictionalNote','$date')";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');  

}

//History orders
if(isset($_POST['HistoryOrders'],$_POST['email'])){
    $email = $_POST['email'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql');
    $query = "SELECT orderUser, date FROM orders WHERE `email` = '".$email."'";
    $result = mysqli_query($conn, $query) or die('Ресурс не найден');
    $rows=mysqli_num_rows($result);
    for ($j=0;$j<$rows;++$j)
    {$row=mysqli_fetch_row($result);
        echo($row[0].','.$row[1].',');
    } 
}



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
        $query  = "INSERT `orders` (email,password) VALUES('$email','$password')";  
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



//Load photo
if(isset($_POST['loadedimg']) === true){
$name  = $_FILES['file']['name'];
$type = $_FILES['file']['type'];
$size = $_FILES['file']['size'];
    if(($type == 'image/png') || ($type == 'image/jpg') || ($type == 'image/jpeg')){
        if ($size > 100000000){
            die("FileSoBig");
        }else{
            
            echo ('LoadAccept');
        }
    }else{
        die('badFormat');
    }

}

?>