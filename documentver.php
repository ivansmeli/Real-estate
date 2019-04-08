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
</head>
<body>
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
            $query="SELECT propname,type, number, imagever FROM realestate";
            $stmnt=$pdo->prepare($query);
            $stmnt->execute();
            $results=$stmnt->fetchAll(PDO::FETCH_OBJ);
            $stmnt->closeCursor();
            foreach ($results as $key => $value) {
                    echo '<div class="column">
                    <div class="item-image">
                        <img src="images/'.$value->imagever.'" alt="">
                    </div>
                    <form class="item-desc">
                        <div class="details">
                            <fieldset>
                                <label for="item0" class="label-desc">Name</label>
                                <input type="text" name="item0" value="'.$value->propname.'" readonly class="text-no-edit">
                            </fieldset> 
                            <fieldset>
                                <label for="item1" class="label-desc">Type</label>
                                <input type="text" name="item1" value="'.$value->type.'" readonly class="text-no-edit">
                            </fieldset>
                            <fieldset>
                                <label for="item1" class="label-desc">Plot No.</label>
                                <input type="text" name="item1" value="'.$value->number.'" readonly class="text-no-edit">
                            </fieldset>
                        </div>
                    </form>
                </div>';
            }
            ?>
        </div>
    </div>
</body>
<script src="js/main.js"></script>
</html>