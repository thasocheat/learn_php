<?php
 
// បង្កើត Class : Create Class
class Tool{
 
    // បង្កើត function និងបំលែងពីលេខអង់គ្លេសទៅជាខ្នែរ : Create function 
    function toKhNum($number) {

        // ប្រកាស variable ដែលផ្ទក់តំម្លៃពីលេខអង់គ្លេសទៅជាលេខខ្មែរក្នុងទម្រង់ជា array
        $khNum = ['0'=>'០', '1'=>'១', '2'=>'២', '3'=>'៣', '4'=>'៤', '5'=>'៥', 
        '6'=>'៦', '7'=>'៧', '8'=>'៨', '9'=>'៩'];

        // Variable នេះធ្វើការផ្ទុក់តំម្លៃជា string តាមរយះ 'strval'
        $stringNum = strval($number);
        $khString = '';

        // Variable នេះផ្ទុក់តំម្លៃជា array ដែលបំលែងពី string ដោយ 'str_split'
        $chars = str_split($stringNum);
 
        foreach ($chars as $char){
            $khString .= $khNum[$char];
        }
        
        return $khString;
    }

 
    function getKhDate($rawDate){
        $KhmerDays = ['ច័ន្ទ', 'អង្គារ', 'ពុធ', 'ព្រហស្បតិ៍', 'សុក្រ', 'សៅរ៍', 'អាទិត្យ'];
        $KhmerMonths = ['មករា', 'កុម្ភៈ', 'មិនា', 'មេសា', 'ឧសភា', 'មិថុនា', 'កក្កដា', 
        'សីហា', 'កញ្ញា', 'តុលា', 'វិច្ឆិកា', 'ធ្នូ'];
        
        $month = date('m', strtotime($rawDate));
        $day = date("N", strtotime((date('l',strtotime($rawDate)))));
        $daym = $this->toKhNum(date('d', strtotime($rawDate)));
        $year = $this->toKhNum(date('Y', strtotime($rawDate)));

        

    
        return ('ថ្ងៃ '.$KhmerDays[$day-1].' ទី '.$daym.' '.$KhmerMonths[$month-1].' '.$year);
    }

    function khtime($rawtime){
        $h = $this->toKhNum(date("h", strtotime($rawtime)));//ចាប់តម្លៃជាម៉ោង
        $m = $this->toKhNum(date("i", strtotime($rawtime)));//ចាប់តម្លៃជានាទី
        $s = $this->toKhNum(date("s", strtotime($rawtime)));//ចាប់តម្លៃជាវិនាទី
        $am = date('H')<12?"ព្រឹក":"ល្ងាច";

        return ('ម៉ោង '.$h.' : '.$m.' : '.$s.' '.$am);
    }

    

   
 
}

 
	$_tool = new Tool();
	date_default_timezone_set("Asia/Phnom_Penh");
	$date = $_tool->getKhDate(date('Y/m/d'));
    $time = $_tool->khtime(date('h:i:s'));
    header('refresh:1');

    


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            setInterval(function(){
                $('#time').load('phploadtime.php')
            }, 1000);
        });
    </script> -->

    <style>
        body{
            font-family: 'Hanuman';
            font-size: 50px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center">ការបង្កើតថ្ងៃទី ខែ ឆ្នាំ និង ម៉ោង</h1>
        <h4 class="text-center">ដោយប្រើ (HTML, CSS, Bootstrap and PHP)</h4>
        <div class="row">
            <div class="col-md-12 text-center mt-5">
                <div class='wrapper region'>
                    <div class='datetime'>
                        <div class='date'><?php echo $date ?></div>
                        <div id="time"><?php echo $time ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>