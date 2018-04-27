<?php

/*one point entry to access database

/**
 * Description of database
 *
 * @author dongf
 */
class Database {
   
    private static $_hostName = "den1.mysql6.gear.host";
    private static $_dbUser = "easymovedb";  
    private static $_dbPass = "Vi3C?b~tp9ad"; 
    private static $_dbname= "easymovedb"; 
    
    private static $_connection = NULL;
    
    
    //to prevent making object for this class, make a private construct
    private function __construct() {
        
    }
    
    //a function to get the connection
    public static function getConnection() {
        if(!self::$_connection){
        self::$_connection = new mysqli(self::$_hostName, self::$_dbUser, self::$_dbPass,self::$_dbname);
        if(self::$_connection->connect_error) {
            die('Connect Error: ' . self::$_connection->connect_error);
            }   
        }
        return self::$_connection;  
        
        }
        
 

}



