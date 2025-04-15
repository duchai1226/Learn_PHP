<?php
class Menu {
    private $items = [];
    private $theme;

    // Constructor
    public function __construct($theme = 'red') {
        $this->theme = $theme;
    }

    // Thêm mục vào menu
    public function addItem($item) {
        $this->items[] = $item;
    }

    // Lấy theme
    public function getTheme() {
        return $this->theme;
    }

    // Hiển thị menu
    public function render() {
        $output = '<nav class="menu ' . $this->theme . '">';
        $output .= '<ul>';
        foreach ($this->items as $item) {
            $output .= '<li><a href="#">' . $item . '</a></li>';
        }
        $output .= '</ul>';
        $output .= '</nav>';
        return $output;
    }
}
?>