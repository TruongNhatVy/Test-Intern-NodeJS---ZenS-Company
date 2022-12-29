<?php
    class Connection{
		function getConnection(){
			$con=mysqli_connect("localhost","root","","joke_service");
			if(!$con){
				echo 'Không thể kết nối được cơ sở dữ liệu';
			}
			else{
				return $con;
			}
		}
	}
?>