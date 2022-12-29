<?php
    class Joke{
        function getAll(){
			$connection = new Connection();
			$query = "select * from joke";
            $result = mysqli_query($connection->getConnection(),$query);
            $jokes = [];

            while ($row=mysqli_fetch_array($result)){
				$id=$row['Id'];
				$content=$row['Content'];
				$like=$row['Like'];
				$dislike=$row['Dislike'];

                $joke =  ['Id' => $id, 'Content' => $content, 'Like' => $like, 'Dislike' => $dislike];
                $jokes[] = $joke;			
		    }

            return( $jokes);
        }
        function getNewJoke($oldJoke)
        {
            $connection = new Connection();
            $query = '';

            if(count($oldJoke) != 0)
            {
                $query = "select * from joke where Id not in (";         

                foreach($oldJoke as $value)
                {
                    $query .= $value.',';
                }

                $query = substr($query, 0, strlen($query) - 1);
                $query .= ") limit 1";
            }
            else{
                $query = 'select * from joke limit 1';
            }

            $result = mysqli_query($connection->getConnection(),$query);
            $jokes = [];

            while ($row=mysqli_fetch_array($result)){
				$id=$row['Id'];
				$content=$row['Content'];
				$like=$row['Like'];
				$dislike=$row['Dislike'];

                $joke =  ['Id' => $id, 'Content' => $content, 'Like' => $like, 'Dislike' => $dislike];
                $jokes[] = $joke;			
		    }

            return( $jokes);
        }
        function getJokeById($id)
        {
            $connection = new Connection();
			$query = "select * from joke where Id =" . $id;
            $result = mysqli_query($connection->getConnection(),$query);
            $jokes = [];

            while ($row=mysqli_fetch_array($result)){
				$id=$row['Id'];
				$content=$row['Content'];
				$like=$row['Like'];
				$dislike=$row['Dislike'];

                $joke =  ['Id' => $id, 'Content' => $content, 'Like' => $like, 'Dislike' => $dislike];
                $jokes[] = $joke;			
		    }

            return( $jokes);
        }
        function updateVote($idJoke,$isLike)
        {          
            $joke = $this->getJokeById($idJoke);
            $query = 'update joke set ';

            if($isLike == 1)
            {
                $like = $joke[0]['Like'] + 1;              
                $query .= '`Like` = ' . $like;

            }
            else
            {
                $dislike = $joke[0]['Dislike'] + 1;
                $query .= '`Dislike` = ' . $dislike;
            }
            $query .= ' where Id = ' . $idJoke;

            $connection = new Connection();
            mysqli_query($connection->getConnection(),$query);           
        }
    }
?>