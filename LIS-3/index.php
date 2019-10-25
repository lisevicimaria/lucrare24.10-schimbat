<html>

<head>
    <title> FORMULAR</title>
</head>
<form method="POST" action="" enctype="">
    <br>
    User name: <br />
    <input name="name" type="text"  value="" /> <br />
    E-mail: <br />
    <input name="email" type="text"  value="" /> <br />
    Phone number:<br />
    <input name="number" type="number" " value="" /> <br />
    Age:<br />
    <input name="age" type="number"  value="" /> <br />
    Password:<br />
    <input name="pass" type="password"  value="" /> <br />
    Confirm password:<br />
    <input name="repass" type="password"  value="" /> <br />
    Date of birth:<br />
    <input name="date" type="date" value="" /> <br />
    <br>
    <input name="enter"    type="submit"                   value="Enter" />
</form>

<?php
require_once __DIR__."/vendor/autoload.php";



if(isset($_POST) && !empty($_POST)){
    $v = new Valitron\Validator($_POST);
    $v->rules([
            'required' =>[
    ['name', 'email', 'pass', 'repass']
            ],
        'integer' =>[
                ['age']
        ],
        'equals' => [
                ['pass', 'repass']
        ],
        'email' => [
                ['email']
        ],
        'lengthBetween' => [
                ['name', 3, 15],
            ['pass', 10, 20],
            ['repass', 10,20]
        ],
        'date' =>[
                ['date']
        ],
        'max' =>[
                ['age', 100]
            ]
    ]);
    if($v->validate())
    {
        echo "УРАААА!!!! Ты все заполнил правильно!!!";
    }else{
        print_r($v->errors());
    }
}

?>



