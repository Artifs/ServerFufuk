<?php
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Europe/Moscow');
ini_set('display_errors', 'Off'); 
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



//Augment new tovar
    if(isset($_POST['AugNewTovar'],$_POST['Name'],$_POST['Tags'] ,$_POST['Desc'] ,$_POST['Price'],$_POST['Razmer'] ,$_POST['MainImg'],$_POST['AllImgs'])){
        $name = $_POST['Name'];
        $Desc = $_POST['Desc'];
        $Tags = $_POST['Tags'];
        $Price = $_POST['Price'];
        $Razmer = $_POST['Razmer'];
        $MainImg = $_POST['MainImg'];
        $AllImgs = $_POST['AllImgs'];
        require_once 'login.php'; 
        $conn = mysqli_connect($hn, $un, $pw, $db); 
        if (!$conn) die('Невозможно запустить mysql'); 
        $query = "INSERT INTO tovarlist (name,price,mainImage,images,shortAbout,dimensions,tags) VALUES ('$name','$Price','$MainImg','$AllImgs','$Desc','$Razmer','$Tags')";
        $result = mysqli_query($conn, $query) or die('Resourse is undefined');  
        echo ("conf");
    }
//loading images for tovar
if(isset($_POST['imageForTovar']) === true){
    $name  = $_FILES['file']['name'];
    $type = $_FILES['file']['type'];
    $size = $_FILES['file']['size'];
    $names = '';
    $path = './images'; 
        if(($type == 'image/png') || ($type == 'image/jpg') || ($type == 'image/jpeg')){
            if ($size > 100000000){
                die("FileSoBig");
            }else{
                foreach($_FILES as $file){
                $extension = strtolower(substr(strrchr($file['name'], '.'), 1));
                $filename = DFileHelper::getRandomFileName($path, $extension);
                $target = $path . '/' . $filename . '.' . $extension;
                move_uploaded_file($file['tmp_name'], $target);
                $names = $names.$target.' ';
                $nameForBD = $filename . '.' . $extension;
                }
                echo ($nameForBD);
            }
        }else{
            die('badFormat');
        }
    
    }


//Order
if(isset($_POST['summ'] ,$_POST['name'] ,$_POST['tovar'] ,$_POST['secName'], $_POST['lastName'], $_POST['email'], $_POST['Country'], $_POST['City'], $_POST['Region'], $_POST['Apartmets'], $_POST['indexCity'] , $_POST['Order'])){
    $addictionalNote = $_POST['addictionalNote'];
    $FIO = $_POST['name'].' '.$_POST['secName'].' '.$_POST['lastName'];
    $Adress =  $_POST['indexCity'].', '.$_POST['Country'].', '.$_POST['City'] .', '.$_POST['Region'] .', '.$_POST['Apartmets'];
    $email = $_POST['email'];
    $tovar = $_POST['tovar'];
    $summ = $_POST['summ'];
    $date = date('d.m.y H:i');
    require_once 'login.php'; 
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "INSERT INTO orders (email,FIO,Adress,orderUser,summ,addictionalNote,date) VALUES ('$email','$FIO','$Adress','$tovar','$summ','$addictionalNote','$date')";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');  
    echo ("conf");
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
        $query  = "INSERT `info` (email,password) VALUES('$email','$password')";  
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

//Tech Support Questions Add
if(isset($_POST['email'], $_POST['question'], $_POST['TechSuppQuest'])){
        $email = $_POST['email'];
        $question = $_POST['question'];
        require_once 'login.php';  
        $conn = mysqli_connect($hn, $un, $pw, $db); 

        if (!$conn) die('Невозможно запустить mysql'); 
            $query  = "INSERT `questionstechsupp` (email,question) VALUES('$email','$question')";  
            $result = mysqli_query($conn, $query) or die('Ресурс не найден');
            echo ('Conf');
    }
    

//Personal area
if(isset($_POST['email'], $_POST['StrLog'])){
    $email = $_POST['email'];
    require_once 'login.php';
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query2 = "SELECT id,email,name,secondName,lastName,postCode,country,city,region,apartments,usertag FROM info";  
    $result2 = mysqli_query($conn, $query2) or die('Ресурс не найден11115');
    $rows2=mysqli_num_rows($result2); 
    for ($j=0;$j<$rows2;++$j)
    {$row=mysqli_fetch_row($result2);
        if($row[1] === $email){
            echo($row[2].';'.$row[3].';'.$row[4].';'.$row[5].';'.$row[6].';'.$row[7].';'.$row[8].';'.$row[9].';'.$row[10]);
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

//Change user status
if (isset($_POST['ChangingUserStatus']) === true){
    $email = $_POST['email'];
    $status = $_POST['status'];
    if ($status == 'Admin'){
        $status = 1;
    }else if ($status == 'TechSupp'){ 
        $status = 2;
    }else if ($status == 'Worker'){
        $status = 3;
    }else if ($status == 'Manager'){
        $status = 4;
    }else{
        $status = 0;
    }
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "UPDATE `info` SET `usertag` = '".$status."' WHERE `email` = '".$email."'" ;;
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    echo('1');
}


//JSONPARSE ITEMLIST CHECK
if (isset($_POST['JSONPARSE']) === true){
    // $file = file_get_contents('catalog.json');   
    // echo($file);    

    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "SELECT id,name, price,mainImage,images,shortAbout,dimensions,tags FROM tovarlist";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}

// history Orders JSON
if (isset($_POST['JsonHisOrders'], $_POST['email'])){
    $email = $_POST['email'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "SELECT id,orderUser, date,summ,Accepted FROM orders WHERE `email` = '".$email."'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}

//History orders portrets
if (isset($_POST['JsonHisOrdersPort'], $_POST['email'])){
    $email = $_POST['email'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "SELECT id,imagePortret,format ,Accepted, date FROM portretsoffer WHERE `email` = '".$email."'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}

//Zakaz portreta 
if(isset($_POST['ZakazPortreta'], $_POST['email'], $_POST['name'], $_POST['secName'], $_POST['lastName'], $_POST['indexCity'], $_POST['Country'], $_POST['City'], $_POST['Region'], $_POST['Apartmets'], $_POST['Format'], $_POST['Summ'], $_POST['addictionalNote'])){
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
    $Format = $_POST['Format'];
    $FIO = $_POST['name'].' '.$_POST['secName'].' '.$_POST['lastName'];
    $Adress =  $_POST['indexCity'].', '.$_POST['Country'].', '.$_POST['City'] .', '.$_POST['Region'] .', '.$_POST['Apartmets'];
    $email = $_POST['email'];
    $summ = $_POST['Summ'];
    $date = date('d.m.y H:i');
    require_once 'login.php'; 
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "INSERT INTO portretsoffer (email,FIO,adress,imagePortret,format,addictionalNote,date) VALUES ('$email','$FIO','$Adress','$names','$Format','$addictionalNote','$date')";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');  
    echo ("conf");
}

//QuestLoad
if (isset($_POST['TechSuppOrders'])){
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "SELECT id,email, question FROM questionstechsupp WHERE `Answered` = '0'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}

//CloseQuest
if(isset($_POST['CloseQuest'], $_POST['idQuest'])){
    $id = $_POST['idQuest'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "UPDATE `questionstechsupp` SET `Answered` = '1' WHERE `id` = '".$id."'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    echo('conf');
}

//UsersOffers
if (isset($_POST['UsersOffers'])){
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "SELECT id,orderUser,addictionalNote FROM orders WHERE `Accepted` = '0'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}  

//Accept Offer
if(isset($_POST['CloseOffer'], $_POST['idOffer'])){
    $id = $_POST['idOffer'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "UPDATE `orders` SET `Accepted` = '1' WHERE `id` = '".$id."'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    echo('conf');
}

//PortretsOffers
if (isset($_POST['PortretsOffers'])){
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "SELECT id,format,imagePortret,addictionalNote FROM portretsoffer WHERE `Accepted` = '0'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}

//Accept portrets
if(isset($_POST['CloseOfferPortret'], $_POST['idOfferPortret'])){
    $id = $_POST['idOfferPortret'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "UPDATE `portretsoffer` SET `Accepted` = '1' WHERE `id` = '".$id."'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    echo('conf');
}

//Sending offer
if (isset($_POST['UsersOffersSend'])){
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "SELECT id,orderUser,addictionalNote,FIO,Adress,email FROM orders WHERE `Accepted` = '1'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}  

//Sending portret
if (isset($_POST['UsersPortretsSend'])){
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "SELECT id,email,addictionalNote,FIO,Adress,format,imagePortret FROM portretsoffer WHERE `Accepted` = '1'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
} 

//Accept sending Offer
if(isset($_POST['CloseOfferSending'], $_POST['idOfferSending'])){
    $id = $_POST['idOfferSending'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "UPDATE `orders` SET `Accepted` = '2' WHERE `id` = '".$id."'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    echo('conf');
}

//Accept sending portret
if(isset($_POST['ClosePortretSending'], $_POST['idPortretSending'])){
    $id = $_POST['idPortretSending'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "UPDATE `portretsoffer` SET `Accepted` = '2' WHERE `id` = '".$id."'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    echo('conf');
}

//Accept portretst from user 
if(isset($_POST['AcceptPortretUser'], $_POST['idPortret'])){
    $id = $_POST['idPortret'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "UPDATE `portretsoffer` SET `Accepted` = '3' WHERE `id` = '".$id."'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    echo('conf');
}

//Accept offer from user
if(isset($_POST['AcceptOfferUser'], $_POST['idOffer'])){
    $id = $_POST['idOffer'];
    require_once 'login.php';  
    $conn = mysqli_connect($hn, $un, $pw, $db); 
    if (!$conn) die('Невозможно запустить mysql'); 
    $query = "UPDATE `orders` SET `Accepted` = '3' WHERE `id` = '".$id."'";
    $result = mysqli_query($conn, $query) or die('Resourse is undefined');
    echo('conf');
}
?>