<?php
class Schedule {
    private $data = [];

    // Constructor: Đọc dữ liệu từ file XML
    public function __construct($xmlFile) {
        $xml = simplexml_load_file($xmlFile);
        foreach ($xml->day as $day) {
            $dayName = (string)$day['name'];
            $this->data[$dayName] = [];
            foreach ($day->period as $period) {
                $periodName = (string)$period['name'];
                $this->data[$dayName][$periodName] = (string)$period->slot;
            }
        }
    }

    // Hiển thị thời khóa biểu
    public function render() {
        $output = '<table border="1">';
        
        // Header
        $output .= '<tr><th></th>';
        foreach (array_keys($this->data) as $day) {
            $output .= '<th>' . $day . '</th>';
        }
        $output .= '<th>Ghi chú</th></tr>';

        // Rows
        $periods = ['Môn học', 'Lớp', 'Phòng', 'Thời gian'];
        foreach ($periods as $period) {
            $output .= '<tr>';
            $output .= '<td>' . $period . '</td>';
            foreach ($this->data as $day => $info) {
                $output .= '<td>' . ($info[$period] ?? '-') . '</td>';
            }
            $output .= '<td></td>'; // Cột Ghi chú để trống
            $output .= '</tr>';
        }

        $output .= '</table>';
        return $output;
    }
}
?>