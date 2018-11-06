<?php 

   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('my_database.sqlite');
      }
   };
   $db = new MyDb();