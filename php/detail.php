<?php
$key=$_GET['detail'];
$sql="SELECT * FROM heroku_8c68daa40504b72.books where book_name = '$key'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo " <div class=\"detail\">
     <div class=\"buy-layout\">
        <img src=\"{$row[2]}\">
         <div class=\"bookname\">{$row[1]}</div>
         <div class=\"author\">저자 : {$row['author']}</div>
         <div class=\"price\">가격 : {$row['price']}원</div>
         <div class=\"btn\"><a href=\"?buy={$row[1]}\">구매</a></div>
         <div class=\"btn\"><a href=\"?basket={$row[1]}\">장바구니 담기</a></div>
     </div>
     <div class=\"description\">{$row[3]}</div>
     <div class=\"writecomment\">
    <form action=\"./php/writecomment.php\" method=\"post\">
        <textarea name=\"comment\" id=\"comment\" placeholder=\"댓글 입력\" wrap=\"off\"></textarea>
        <input type=\"hidden\" name=\"bookname\" value=\"{$row[1]}\">";
if(!isset($_SESSION['user_id'])){
  echo "<input type=\"hidden\" name=\"nickname\" value=\"익명\">";
}else{
  echo "<input type=\"hidden\" name=\"nickname\" value=\"{$_SESSION['user_nick']}\">";
}
echo"<input type=\"submit\" value=\"작성\">
    </form>
    </div>";

$sql="SELECT * FROM comment where book_name='{$row[1]}'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
  $commemt="
  <div class=\"comment\">
      <div class=\"username\">{$row[2]}</div>
      <div class=\"usercomment\">{$row[1]}</div>
  </div>
";
  echo $commemt;
}
echo "</div>";

 ?>
