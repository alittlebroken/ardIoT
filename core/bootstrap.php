<?php
/**
 * bootstrap.php
 *
 * used by the app for setup and config
 *
 * @author Paul Locker <plockyer@googlemail.com>
 */

 // Include configuration
 require("core/configuration.php");

 //Include and setup the database class
 require("core/database.class.php");
 $dbo = new Database();
 
 // Connect to the database
 $dbo->connect();
 
 
