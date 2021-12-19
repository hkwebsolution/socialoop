<?php

namespace App\Supports;

use mysqli;

abstract class Database {

    private $host = HOST;
    private $user = USER;
    private $pass = PASS;
    private $db = DB;
    private $connection;

    private function connection(){

       return $this-> connection = new mysqli($this-> host, $this-> user, $this->pass , $this -> db); 
    }

    /**
     * Get All data
     */
    protected function all($table, $order = 'DESC'){
        return $this -> connection() -> query( "SELECT * FROM {$table} ORDER BY id {$order} " );


    }

    /**
     * Get single data by id
     */
    protected function find($table, $id){
       $data = $this-> connection() ->query("SELECT * FROM {$table} WHERE id={$id} LIMIT 1" );
       return $data->fetch_object();

    }

     /**
     * Create/send data to database
     */
    protected function create($sql){
        $this ->connection() ->query($sql);

    }

     /**
     * Update data to database
     */
    protected function update($updatesql){
        $this ->connection() ->query($updatesql);

    }

    /**
     * Delete data to database
     */
    protected function delete($table, $id){

        $this ->connection() -> query ("DELETE FROM {$table} WHERE id={$id}");

    }



}
