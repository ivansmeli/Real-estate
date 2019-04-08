
<?php
@session_start();
if(isset($_SESSION["name"])&&isset($_SESSION["message"])){
    //echo $_SESSION["message"]." ".$_SESSION["name"];
}
else{
    header("location:login.php");
} 
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/main.css" media="all">
    <link rel="stylesheet" type="text/css" href="styles/mobile.css" media="all and (min-width: 250px) and (max-width: 460px)">
    <link rel="stylesheet" type="text/css" href="styles/tablet.css" media="all and (min-width: 461px) and (max-width: 960px)">
    <link rel="stylesheet" type="text/css" href="styles/desktop.css" media="all and (min-width: 961px)">

  <style type="text/css">
        .dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}



.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    

}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
    </style>
</head>
    <header id="header">
    <div class="container" style="margin-left: 90%">
    <div class="dropdown">
  <button class="dropbtn">Profile</button>
  <div class="dropdown-content">
    <a href="#"><?php echo $_SESSION["name"]?></a>
    <a href="logout.php">Sign Out</a>
    <a href="payment.php">Payment</a>
  </div>
</div>
</div>
</header>
<body>
    <script type="text/javascript">
        //var sender=window.prompt("Enter your name");
        //var receiver=window.prompt("Who do you want to chat with?");
        //localStorage.sender=sender;
        //localStorage.receiver=receiver;
    </script>
    <div class="container">
        <div class="row props">
             <?php
            $pdo=null;
            try{
                $pdo=new PDO("mysql:host=localhost;dbname=realestate","root","");
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $pdoe){
                echo $pdoe->getMessage();
            }
            $query="SELECT * FROM realestate";
            $stmnt=$pdo->prepare($query);
            $stmnt->execute();
            $results=$stmnt->fetchAll(PDO::FETCH_OBJ);
            $stmnt->closeCursor();
            foreach ($results as $key => $value) {
                    echo '<div class="column">
                    <div class="item-image">
                        <img src="images/'.$value->image.'" alt="">
                    </div>
                    <form class="item-desc">
                        <div class="details">
                            <fieldset>
                                <label for="item0" class="label-desc">Type</label>
                                <input type="text" name="item0" value="'.$value->type.'" readonly class="text-no-edit">
                            </fieldset> 
                            <fieldset>
                                <label for="item1" class="label-desc">Name</label>
                                <input type="text" name="item1" value="'.$value->propname.'" readonly class="text-no-edit">
                            </fieldset>
                            <fieldset>
                                <label for="item2" class="label-desc">Location</label>
                                <input type="text" name="item2" value="'.$value->proploc.'" readonly class="text-no-edit">
                            </fieldset>
                            <fieldset>
                                <label for="item4" class="label-desc">Price</label>
                                <input type="text" name="item4" value="'.$value->price.'" readonly class="text-no-edit">
                            </fieldset>
                            <fieldset>
                                <label for="item5" class="label-desc">Plot No.</label>
                                <input type="text" name="item5" value="'.$value->plotno.'" readonly class="text-no-edit">
                            </fieldset>
                        </div>
                        <div class="action">
                            <fieldset>
                                <input type="submit" name="buy" value="Book/Buy" class="buy">
                            </fieldset>
                        </div>
                    </form>
                </div>';
            }
            ?>
        </div>
    </div>
    <div id="chatbox">
        <div class="chat-head">
            <div><h2>Chat</h2></div>
            <div><button id="chat-hide"><hr/></button></div>
        </div>
        <div class="chat-subject">
            
        </div>
        <div class="chat-body">
            
        </div>
        <div class="chat-textField">
            <form id="chat-form">
                <textarea name="item1" placeholder="Message" id="chat-message" autofocus required></textarea>
                <input type="submit" name="item1" value="SEND" id="chat-send">
            </form>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>