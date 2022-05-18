<?php

require '../controllers/RequestController.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shailesh Chotoe Examen</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
</head>
<body>
     <div class="balance"><span class="money">€ 100</span></div>

     <div class="play"><span onclick="play()" >Play</span></div>
</body>
</html>

<script>


let balance = 100;

document.querySelector('.money').innerHTML = '€ ' + balance;


function play() {
    yourbet = Math.floor(Math.random() * 5) + 1;
    balance-= yourbet;
    total = 0;
    for (let index = 0; index < 4; index++) {
        let bet = Math.floor(Math.random() * 5) + 1;
        total += bet + yourbet;
    }
    let winner = Math.floor(Math.random() * 5) + 1;
    if(winner == 1) {
        console.log("congrantz!! you won: " + balance + " + " + total);
        balance = balance + total;
    } else {
        console.log('lost')
    }
    document.querySelector('.money').innerHTML = '€ ' + balance;
}

</script>

<style>

body, html {
    margin: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    background: lightblue;
}

.play {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.play > span:hover {
 transform: scale(1.1);
}

.play > span {
    background: yellow;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    color: black;
    font-family: monospace;
    border: 14px solid orange;
    border-radius: 50px;
    font-size: 70px;
    width:15%;
    padding: 1em;
    height: 1%;
}

.balance > span {
    display: flex;
    padding: 1em;
    background: green;
    height: 10%;
    text-align: center;
    justify-content: center;
    align-items: center;
    border-radius: 100px;
    border: 8px solid darkgreen;
    font-family: 'Red Hat Display', sans-serif;
    font-size: 50px;
    color: white;
}


.balance {
    height: 20%;
    text-align: center;
    display: flex;
    justify-content: flex-end;
    padding-right: 4em;
    align-items: center;
}
</style>