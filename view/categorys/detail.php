<?php

if (isset($this->category)) {
    echo $this->category->ID . "<br>"; echo $this->category->NAME . "<br>"; 
} else {
    echo '<h1>No data to display</h1>';
}

