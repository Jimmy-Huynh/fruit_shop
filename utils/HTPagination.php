<?php

/**
 * Description of HTPagination
 *
 * @author HuynhHuuTam
 */
class HTPagination {

    //put your code here
    public $offset = 0;
    public $limit = 1;
    public $arr = array();
    public $pages = 0;
    public $element = 0;
    public $class = 'row';
    public $data = array();
    private $activeClass = 'class="disabled"';
    private $noneDisplay = 'style="display:none;"';

    public function getOffset() {
        return $this->offset;
    }

    public function getLimit() {
        return $this->limit;
    }

    public function getCount() {
        return count($this->arr);
    }

    public function getPage() {
        if ($this->getOffset() != '') {
            return ceil($this->getCount() / $this->getOffset());
        } else {
            return 0;
        }
    }

    public function getdata($arr) {
        foreach ($arr as $key => $value) {
            switch ($key) {
                case 'data': $this->data = $value;
                    break;
                case 'offset': $this->offset = $value;
                    break;
                case 'limit': $this->limit = $value;
                    break;
                case 'pages': $this->pages = $value;
                    break;
                case 'element': $this->element = $value;
                    break;
            }
        }
        $start = $this->limit;
        if (isset($_GET['route'])) {
            if (is_numeric($_GET['route']) && $_GET['route'] <= $this->pages && $_GET['route'] >= 1) {
                $start = $_GET['route'];
            }
        }
        return array_slice($this->data, ($start - 1) * $this->offset, $this->offset);
    }

    public function pagination($arr) {
        foreach ($arr as $key => $value) {
            switch ($key) {
                case 'limit':$this->limit = $value;
                    break;
                case 'offset':$this->offset = $value;
                    break;
                case 'pages': $this->pages = $value;
                    break;
                case 'element': $this->element = $value;
                    break;
                case 'class': $this->class = $value;
                    break;
            }
        }
        $pos = 1;
        if (isset($_GET['route'])) {
            if (is_numeric($_GET['route']) && $_GET['route'] <= $this->pages && $_GET['route'] >= 1) {
                $pos = $_GET['route'];
            } else {
                $pos = 1;
            }
        }
        echo '<div class="' . $this->class . '">';
        echo '<ul class="pagination pagination-sm pull-right" id = "pagination">';
        echo '<li ';
        if ($pos == 1) {
            echo $this->noneDisplay;
        }
        echo '><a href="?route=' . $this->limit . '"';
        echo '> << </a>';
        echo '</li><li ';
        if ($pos == 1) {
            echo $this->noneDisplay;
        }
        echo '><a href="?route=' . ($pos - 1) . '"';
        echo '> < </a></li>';
        if ($this->pages > 10) {
            for ($i = 0; $i < 3; $i++) {
                if (($pos + 3) < (($this->pages - 2))) {
                    echo '<li ';
                    if ($pos == (($i) + $pos)) {
                        echo $this->activeClass;
                    }
                    echo '><a href="?route=' . (($i) + $pos) . '"';
                    echo'>' . ($i + $pos) . '</a></li>';
                } else {
                    for ($i = ($this->pages - 5); $i < $this->pages - 2; $i++) {
                        echo '<li ';
                        if ($pos == ($i)) {
                            echo $this->activeClass;
                        }
                        echo '><a href="?route=' . ($i) . '" ';
                        echo '>' . ($i) . '</a></li>';
                    }
                }
            }
            if (($pos + 3) < ($this->pages - 2)) {
                echo '<li><a href="#" class="more"> ... </a></li>';
                for ($i = ($this->pages - 2); $i <= $this->pages; $i++) {
                    echo '<li ';
                    if ($pos == ($i)) {
                        echo $this->activeClass;
                    }
                    echo '><a href="?route=' . $i . '" ';
                    echo '>' . $i . '</a></li>';
                }
            } else {
                for ($i = ($this->pages - 2); $i <= $this->pages; $i++) {
                    echo '<li ';
                    if ($pos == $i) {
                        echo $this->activeClass;
                    }
                    echo '><a href="?route=' . $i . '" ';
                    echo '>' . $i . '</a></li>';
                }
            }
        } else {
            for ($i = 1; $i <= $this->pages; $i++) {
                echo '<li ';
                if ($pos == $i) {
                    echo $this->activeClass;
                }
                echo '><a href="?route=' . ($i) . '" ';
                echo '>' . ($i) . '</a></li>';
            }
        }
        echo '<li ';
        if ($pos == (($this->pages))) {
            echo $this->noneDisplay;
        }
        if ($this->pages <= 0) {
            echo $this->noneDisplay;
        }
        echo '><a href="?route=' . ($pos + 1) . '"';
        echo '> > </a></li>';
        echo '<li ';
        if ($pos == ($this->pages)) {
            echo $this->noneDisplay;
        }
        if ($this->pages <= 0) {
            echo $this->noneDisplay;
        }
        echo '><a href="?route=' . ($this->pages) . '"';
        echo '> >> </a></li>';
        echo '</ul></div>';
        echo '<div style="float: right;">Hiển thị mẫu tin từ ' . (($pos - 1) * $this->offset + 1)
        . ' - ' . (($pos - 1) * $this->offset + count($this->getdata($arr)))
        . ' trong ' . $this->element . ' mẫu tin. Trong '
        . $this->pages . ' Trang</div>';
    }

}
