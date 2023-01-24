<?php
session_start(); // permet d'accéder à $_SESSION
$isConnected = $_SESSION['isConnected'] ?? false;
include "../../header.php";

// var_dump($_SESSION['nickname']);
?>

<h1>Bienvenu sur Mon site</h1>

<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore ad quod voluptas magni officiis qui facere rerum voluptate harum, consequuntur asperiores cum veritatis veniam dolor temporibus fugit ipsam dolore? Repellat?</p>
<p>Alias itaque, magni cupiditate reiciendis cum beatae neque illum dignissimos iste quae ducimus deleniti impedit. Illo voluptates sequi aspernatur nemo itaque, similique quis voluptas dolore voluptatem minima, adipisci quam molestiae!</p>
<p>Soluta illum, veniam delectus nesciunt, illo modi facilis omnis odio quae ipsa quisquam, ullam ipsum tempore alias esse pariatur maxime sint tempora fugit quis veritatis! Ea sequi cumque eveniet officia.</p>
<p>Dolore id porro libero, nobis accusamus cum provident dicta dignissimos recusandae, veritatis rem aperiam a at nemo repellendus, praesentium quidem tempora veniam aut quasi distinctio maiores quaerat quo? Accusamus, fugiat!</p>
<p>Dolorum, fuga aut numquam deleniti reiciendis quae mollitia quasi esse iste nam modi exercitationem aspernatur sit cupiditate natus assumenda quod expedita, fugit eum ea aperiam quam. Nesciunt sit officiis vel!</p>

<?php include "../../footer.php"; ?>