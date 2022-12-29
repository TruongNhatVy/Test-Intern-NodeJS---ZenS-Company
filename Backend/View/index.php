<?php
include ('../Modules/connection.php');
include ('../Modules/joke.php');
include ('../Controllers/jokeController.php');
include ('../Controllers/utils.php');
ob_start();

$jokeController = new JokeController();
$utils = new Utils();

// echo "<pre>";
// print_r($jokeController->getAll());
// echo "</pre>";	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joke Single Serving Website</title>
    <link type="text/css" rel="stylesheet" href="./css/bootstrap.min.css"></link>
    <script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
    <script type="module" src="js/index.js"></script>
</head>
<body>
    <header >
        <div class="d-flex justify-content-around">
            <img class="p-2" src="./images/zensLogo.png" width="8%" />

            <div class="d-flex justify-content-end">
                 <div class="p-2">
                    <a style="color:darkgray;">Handcrafted By</a>
                    <p class="text-end">Vy Truong</p>
                </div>    

                <img class="p-2" src="./images/avatar.jpg" width="11%" height="90%" />                                     
            </div>
        </div>
    </header>

    <main>     
        <div class="text-white text-center" style="background-color: #29B363;padding:4%">
            <h1>A joke a day keeps the doctor away</h1>
            <p class="mt-3" style="color:rgb(240, 240, 232)">If you joke wrong way, your teeth have a pay. (Serious)</p>
        </div>
        
        <div class="mt-5" style="margin: auto;width: 50%;padding: 10px;">
            <?php
                $joke = [];
                $oldJoke = [];

                if($utils->getValueOfCookie('voted') == null)
                {                   
                    $joke = $jokeController->getNewJoke($oldJoke);
                }
                else
                {      
                    $valCookieVoted = json_decode($utils->getValueOfCookie('voted'));
              
                    foreach($valCookieVoted as $element)
                    {
                        $oldJoke[] = $element->id;
                    }

                    $joke = $jokeController->getNewJoke($oldJoke);
                }
                
                
                if(count($joke) == 0)
                {
                    echo '<p class="lh-base fs-5" style="color: #636363;">That is all the jokes for today! Come back another day !</p>';                         
                }
                else
                {
                    echo           
                    '
                    <form method="post">
                        <p class="lh-base fs-5" style="color: #636363;">
                            '.$joke[0]['Content'].'
                        </p>

                        <div class="d-flex justify-content-center" style="margin-top:10%">
                            <button name="btnLike" type="submit" class="btn btn-primary" style="padding: 10px 80px;font-weight: 400;font-size: larger; margin-right: 5%;">This is Funny !</button>
                            <button name="btnDislike" type="submit" class="btn text-white" style="padding: 10px 70px;font-weight: 400;font-size: larger;background-color: #29B363;">This is not funny</button>
                            <input type="text" name="idJoke" value="'.$joke[0]['Id'].'" hidden />
                        </div>
                    </form>';
                }
            ?>
        </div>

    </main>

    <footer>
        <hr class="mb-5" style="margin-top: 5%;">

        <div class="container p-4 text-center">                
            <section class="mb-4">
            <p style="color:darkgray">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                eum harum corrupti dicta, aliquam sequi voluptate quas.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, corrupti accusamus? Eum, consequatur vel ex nemo expedita, aspernatur rerum in voluptate vitae aut unde quae minima, nulla sit ipsa numquam!
            </p>
            </section>      
        </div>

        <div class="text-center p-3">
            © 2020 Copyright:
            <a href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
    </footer>
</body>
</html>

<?php
    if(isset($_POST['btnLike']))
    {
        $jokeController->voteJoke('voted',$_POST['idJoke'],1);
        $jokeController->updateVote($_POST['idJoke'],1);

        header("Refresh:0");

    }

    if(isset($_POST['btnDislike']))
    {
        $jokeController->voteJoke('voted',$_POST['idJoke'],0);
        $jokeController->updateVote($_POST['idJoke'],0);

        header("Refresh:0");
    }
?>
