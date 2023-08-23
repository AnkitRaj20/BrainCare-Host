<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        nav{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 40px;
            padding-left: 10%;
            padding-right: 10%;
            background-color: #d84b4b;
            /* background-color: #ffd2d2; */
        }

        nav ul li{
            list-style-type: none; 
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
        }
        
        nav ul li a{
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a:hover{
            color: #ffd2d2;
            transition: .3s;
        }

        button{
            border: none;
            background: #ffd2d2;
            padding: 12px 30px;
            border-radius: 30px;
            color: #fff;
            font-weight: bold;
            font-size: 15px;
            transition: .4s;
            cursor: pointer;
        }

        button:hover{
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <nav>
        <h2 class="logo">BrainCare</h2>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Education</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <button>Login</button>
    </nav>
</body>
</html>