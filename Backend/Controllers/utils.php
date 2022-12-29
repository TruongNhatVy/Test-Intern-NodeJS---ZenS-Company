<?php
    class Utils{
        function setCookie($name,$value,$expiryDays,$path='/')
        {
            $secondOfADay = 86400;

            setcookie($name,$value,time() + ($secondOfADay * $expiryDays),$path);
        }
        function getCookie($cookieName)
        {
            if(isset($_COOKIE[$cookieName]))
                return $_COOKIE[$cookieName];

            return null;
        }
        function getValueOfCookie($cookieName)
        {
            $cookie = $this->getCookie($cookieName);

            if($cookie != null)
                return substr($cookie,stripos($cookie,'='));

            return null;
        }
        function deleteCookie($cookieName){
            if(isset($_COOKIE[$cookieName]))
            {
                unset($_COOKIE[$cookieName]);
                setcookie($cookieName, null, -1, '/'); 
            }
        }
    }
?>