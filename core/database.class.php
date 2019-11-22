<?php
/**
 * Wrapper class for the applications database intercativity with PDO
 *
 * @author Paul Lockyer <plockyer@googlemail.com>
 *
 */
 class Database{
 
     /**
      * @param string $_host host where the DB resides
      */
     private $_host;
     
     /**
      * @param string $_name name of the DB that we wish to user
      */
     private $_name;
     
     /**
      * @param string $_port The port the DB listens on
      */
     private $_port;
     
     /**
      * @param string $_charset The charset to use
      */
     private $_charset;
     
     /**
      * @param string $_uid The user to connect into the database with
      */
     private $_uid;
     
     /**
      * @param string $_pass The pass to be used with the DB user
      */
     private $_pass;
     
     /**
      * @param string $_connStr The connection string to pass to PDO
      */
     private $_connStr;
     
     /**
      * @param object $_dbo Holds the generated PDO object
      */
     private $_dbo;
     
     /**
      * Sets the classes internal vars from the configuration file
      *
      * @returns nothing
      */
     public function __construct()
     {
     
       // Assign the configuration parameters
       $this->_host = DBHOST;
       $this->_name = DBNAME;
       $this->_port = DBPORT;
       $this->_charset = DBCHARSET;
       $this->_uid = DBUID;
       $this->_pass = DBPASS;
     
       // Create the connection string
       $this->_connStr = "mysql:host=" . $this->_host . ";dbname=" . $this->_name . ";charset=" . $this->_charset;
 
     }
     
     /**
      * Connect to the database
      *
      * @returns nothing
      * @todo set attributes for PDO after creation
      */
     public function connect()
     {
     
      // Always wrap PDO connection in a try catch block
      try
      {
          $this->_dbo = new PDO($this->_connStr,$this->_uid,$this->_pass);
          
      }
      catch(PDOException $e)
      {
          /**
           * @todo Write this out to log instead
           */
          echo $e->getMessage() . "<br><br>";
        
      }
    
     }
 
 }
