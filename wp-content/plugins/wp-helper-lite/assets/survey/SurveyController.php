<?php
class SurveyController {
    public function submit() {
        $params = $_GET;
        $result = [
            'params' => $params,
        ];
        echo json_encode($result);
       
    }
}