<?php
    class JokeController {
        function getAll(){
            $joke = new Joke();
            
            return $joke->getAll();
        }
        function getNewJoke($oldJokes){
            $joke = new Joke();
              
            return $joke->getNewJoke($oldJokes);
        }
        function voteJoke($cookieName,$idJoke,$isLike)
        {
            $utils = new Utils();
            $flag = false;
            $cookieVoted = $utils->getCookie($cookieName);

            if ($cookieVoted != null) {
                $votedJoke = ['id' => $idJoke,'isLike' => $isLike];
                $valCookieVoted = json_decode($utils->getValueOfCookie("voted"));
              
                foreach($valCookieVoted as $element)
                {
                    if ($element->id == $idJoke)
                    {
                        $element->isLike = $isLike;

                        $flag = true;
                        break;
                    }                  
                }

                if($flag == false)
                {
                    $valCookieVoted[] = $votedJoke;
                }

                $utils->setCookie("voted", json_encode($valCookieVoted), 1);              
            } else {
                $voted = [];
                $votedJoke = ['id' => $idJoke, 'isLike' => $isLike];              

                $voted[] = $votedJoke;
                $utils->setCookie("voted", json_encode($voted), 1);
            }
        }
        function updateVote($idJoke,$isLike)
        {
            $joke = new Joke();

            return $joke->updateVote($idJoke,$isLike);
        }
    }
?>