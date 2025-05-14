<?php
class Schedule
{
    private $data = [];

    // Constructor: Đọc dữ liệu từ file XML
    public function __construct($xmlFile)
    {
        $xml = simplexml_load_file($xmlFile);
        foreach ($xml->day as $day) {
            $dayName = (string) $day['name'];
            $this->data[$dayName] = [];
            foreach ($day->period as $period) {
                $periodName = (string) $period['name'];
                $this->data[$dayName][$periodName] = (string) $period->slot;
            }
        }
    }

    public function load()
    {
        $result = '<table border="1">';

        $result .= '<tr><th></th>';
        foreach (array_keys($this->data) as $day) {
            $result .= '<th>' . $day . '</th>';
        }
        $result .= '<th>Ghi chú</th></tr>';

        $periods = ['Môn học', 'Lớp', 'Phòng', 'Thời gian'];
        foreach ($periods as $period) {
            $result .= '<tr>';
            $result .= '<td>' . $period . '</td>';
            foreach ($this->data as $day => $info) {
                $result .= '<td>' . ($info[$period] ?? '-') . '</td>';
            }
            $result .= '<td></td>';
            $result .= '</tr>';
        }

        $result .= '</table>';
        return $result;
    }
}
?>