<?php

if (isset($this->user)) {
    echo $this->user->Id . '<br>';
    echo $this->user->UserName . '<br>';
    echo $this->user->Description . '<br>';
} else {
    echo '<h1>No data to display</h1>';
}

