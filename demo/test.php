<?php
function LetterChanges($str) {

    // code goes hered
    $arr = str_split($str,1);
//     $arr = quick_sort($arr);
    $arr = bubble_sort($arr);
  $str = implode('',$arr);
  return $str; 
}

function quick_sort($arr){
    $length = count($arr);
    if($length <= 1){
        return $arr;
    }
    $flag = $arr[0];
    $leftArr   = array();
    $rightArr  = array();
    
    for($i = 1 ; $i < $length ; $i++){
       if ($flag > $arr[$i]){
           $leftArr[]  = $arr[$i];
       } else {
           $rightArr[] = $arr[$i]; 
       }
    }
    $leftArr    = quick_sort($leftArr);
    $rightArr   = quick_sort($rightArr); 
    return array_merge($leftArr,array($flag),$rightArr);
}

function bubble_sort($arr){
    $length = count($arr);
    for($i = 1 ; $i < $length ; $i++){
        for($k = 0 ;$k <$length-$i ; $k++){
            if($arr[$k] > $arr[$k+1]){
                $temp       = $arr[$k];
                $arr[$k]    = $arr[$k+1];
                $arr[$k+1]    = $temp; 
            }
        }
    }
    
    return $arr;
}

$str ="coderbyte"; 
$str ="coderbyte"; 
// var_dump(LetterChanges($str));


function get_Ext($url){
    $url = parse_url($url);
    $filename = basename($url['path']);
    
   $arr = explode('.', $filename);
   echo $arr[count($arr)-1]; 
}
$url = "http://php.net/manual/zh/function.parse-url.php";
// get_Ext($url);




function tree(){
$dbConfig = [
    'server'    =>  '192.168.0.249',
    'username'  =>  'root',
    'password'  =>  '123456',
    'port'      =>  '3306',
    'database'  =>  'zxshop'
];

$conn = mysqli_connect($dbConfig['server'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database'], $dbConfig['port']);
if(mysqli_connect_errno()){
    die("连接失败：".mysqli_connect_error());
}else{
//     echo 'success';
}
$sql = "select * from admin_permissions";
$res = mysqli_query($conn, $sql);
$arr = array();
while($row = mysqli_fetch_assoc($res)){
    $arr[] = $row; 
}
$res =  tree_core($arr);

for($i=0;$i<count($res);$i++){
    var_dump($res[$i]);
    echo '<br>';
}
}


function tree_core($arr,$pid=0,$level=0){
    static $list = array();
    foreach ($arr as $value) {
        if($value['fid'] == $pid){
            $value['level'] = $level;
            $list[] = $value;
            tree_core($arr,$value['id'],$level+1);
        }
    }
    return $list;
}


// tree();

function myylisttest(){
    $arr = array("Dog","Cat","Horse");
    list($a, $b) = $arr;
    echo "I have several animals, a $a, a $b and.";
}
myylisttest();