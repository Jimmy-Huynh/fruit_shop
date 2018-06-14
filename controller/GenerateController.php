<?php

class GenerateController extends BaseController {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $generate = new GenerateModel();
        $data = array(
            'data' => $generate->getAllTables()
        );
        $this->view->render("generate/index", $data);
    }

    public function create() {
        if (parent::getData()) {
            $generate = new GenerateModel();
//            create model
            $this->createModel($this->table);
            $this->createController($this->table);
            $this->createIndex($this->table);
            $this->createCU($this->table);
            $this->createDetail($this->table);
            $this->createDelete($this->table);
//            print_r($generate->getAllForeignKeyInTable($this->table));
//            print_r($generate->getAll($this->table));
//            print_r(SITE_PATH . "model/" . $this->table . "Model.php");
        } else {
            header("Location: " . SITE_ROOT . 'Generate');
            die();
        }
    }

    private function createFolder($folder) {
        if (!file_exists($folder)) {
            $oldmask = umask(0);
            mkdir($folder, 0777);
            umask($oldmask);
        }
    }

    private function createFile($file, $text) {
        if (!file_exists($file)) {
            touch($file);
            $handle = fopen($file, "w");
            fwrite($handle, $text);
            fclose($handle);
        }
        chmod($file, 0777);
    }

    private function createModel($table) {

        $myfile = fopen(SITE_PATH . "public/assets/model", "r") or die("Unable to open file!");
        $text = fread($myfile, filesize(SITE_PATH . "public/assets/model"));
        fclose($myfile);
        $text = str_replace('{table}', $table, $text);

        $this->createFile(SITE_PATH . "model/" . $table . "Model.php", $text);
    }

    private function createController($table) {
        $generate = new GenerateModel();
        $columns = $generate->getAllColumsTable($table);
        $createTmp = 'if (isset($this->{col})) {
                $data["{col}"] = $this->{col};
            }
            ';
        $searchTmp = 'if (isset($this->{col}) && $this->{col} != "") {
                $data["{col}"] = $this->{col};
                $arr["{col}"] = $this->{col};
            }
            ';
        $sCreate = "";
        $sSearch = "";
        foreach ($columns as $value) {
            $sCreate .= str_replace('{col}', $value->COLUMN_NAME, $createTmp);
            $sSearch .= str_replace('{col}', $value->COLUMN_NAME, $searchTmp);
        }

        $myfile = fopen(SITE_PATH . "public/assets/controller", "r") or die("Unable to open file!");
        $text = fread($myfile, filesize(SITE_PATH . "public/assets/controller"));
        fclose($myfile);

        $text = str_replace('{table}', $table, $text);
        $text = str_replace('{stable}', strtolower($table), $text);
        $text = str_replace('{stables}', substr(strtolower($table), 0, -1), $text);
        $text = str_replace('{search}', $sSearch, $text);
        $text = str_replace('{update}', $sCreate, $text);
        $text = str_replace('{create}', $sCreate, $text);

        $this->createFile(SITE_PATH . "controller/" . $table . "Controller.php", $text);
    }

    private function createIndex($table) {
        $generate = new GenerateModel();
        $columns = $generate->getAllColumsTable($table);
        $titleTmp = '<td>{col}</td>';
        $searchTmp = '<td><input type="text" name="{col}" 
                    <?php
                    if (isset($this->{col})) {
                        echo ' . "'" . 'value ="' . "'" . ' . $this->{col} . ' . "'" . '"' . "'" . ';
                    }
                    ?>></td>
                    ';

        $displayTmp = '<td><?php echo $' . strtolower($table) . '->{col}; ?></td>
                ';
        $sTitle = "";
        $sSearch = "";
        $sDisplay = "";
        foreach ($columns as $value) {
            $sTitle .= str_replace('{col}', $value->COLUMN_NAME, $titleTmp);
            $sSearch .= str_replace('{col}', $value->COLUMN_NAME, $searchTmp);
            $sDisplay .= str_replace('{col}', $value->COLUMN_NAME, $displayTmp);
        }

        $myfile = fopen(SITE_PATH . "public/assets/index", "r") or die("Unable to open file!");
        $text = fread($myfile, filesize(SITE_PATH . "public/assets/index"));
        fclose($myfile);
        $text = str_replace('{table}', $table, $text);
        $text = str_replace('{stable}', strtolower($table), $text);
        $text = str_replace('{title}', $sTitle, $text);
        $text = str_replace('{search}', $sSearch, $text);
        $text = str_replace('{display}', $sDisplay, $text);
        //Create folder
        $this->createFolder(SITE_PATH . "view/" . strtolower($table));
        //Create file
        $this->createFile(SITE_PATH . "view/" . strtolower($table) . "/index.php", $text);
    }

    private function createCU($table) {
        $generate = new GenerateModel();
        $columns = $generate->getAllColumsTable($table);
        $filedTmp = '<div class="row">
            <div class="col-lg-4">{col}</div>
            <div class="col-lg-8">
                <input type="text" name="{col}" value="<?php if (isset($this->' . substr(strtolower($table), 0, -1) . ')) echo $this->' . substr(strtolower($table), 0, -1) . '->{col}; ?>"/>
            </div>
        </div>
        ';
        $sFileds = "";
        foreach ($columns as $value) {
            if ($value->COLUMN_NAME != 'Id') {
                $sFileds .= str_replace('{col}', $value->COLUMN_NAME, $filedTmp);
            }
        }
        $myfile = fopen(SITE_PATH . "public/assets/create_update", "r") or die("Unable to open file!");
        $text = fread($myfile, filesize(SITE_PATH . "public/assets/create_update"));
        fclose($myfile);
        $text = str_replace('{table}', $table, $text);
        $text = str_replace('{stables}', substr(strtolower($table), 0, -1), $text);
        $text = str_replace('{fields}', $sFileds, $text);
        //Create file
        $this->createFile(SITE_PATH . "view/" . strtolower($table) . "/create_update.php", $text);
    }

    private function createDetail($table) {
        $generate = new GenerateModel();
        $columns = $generate->getAllColumsTable($table);
        $displayTmp = 'echo $this->' . substr(strtolower($table), 0, -1) . '->{col} . "<br>"; ';
        $sDisplay = "";
        foreach ($columns as $value) {
            $sDisplay .= str_replace('{col}', $value->COLUMN_NAME, $displayTmp);
        }
        $myfile = fopen(SITE_PATH . "public/assets/detail", "r") or die("Unable to open file!");
        $text = fread($myfile, filesize(SITE_PATH . "public/assets/detail"));
        fclose($myfile);
        $text = str_replace('{stables}', substr(strtolower($table), 0, -1), $text);
        $text = str_replace('{display}', $sDisplay, $text);
        //Create file
        $this->createFile(SITE_PATH . "view/" . strtolower($table) . "/detail.php", $text);
        
    }

    private function createDelete($table) {
        $myfile = fopen(SITE_PATH . "public/assets/delete", "r") or die("Unable to open file!");
        $text = fread($myfile, filesize(SITE_PATH . "public/assets/delete"));
        fclose($myfile);
        //Create file
        $this->createFile(SITE_PATH . "view/" . strtolower($table) . "/delete.php", $text);
    }

}
