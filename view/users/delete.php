<?php
if(isset($this->delete)){
    if($this->delete){
        echo '<h1>delete is success...</h1>';
    }else{
        echo '<h1>delete is failure...</h1>';
    }
}else{
    echo '<h1>Nothing to show</h1>';
}

