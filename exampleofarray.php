<?php
// $arr = array(
//     (0) => array(
//         'Name' => 'janviparmar',
//         'Price' => '67000',
//         'ID' => '3',
//         'qty' => '6'
//     ),

//     (1) => array(
//         'Name' => 'janvi',
//         'Price' => '4000',
//         'ID' => '1',
//         'qty' => '4'
//     ),

//     (2) => array(
//         'Name' => 'janvi',
//         'Price' => '4000',
//         'ID' => '1',
//         'qty' => '5'
//     ),
//     (3) => array(
//         'Name' => 'pABC',
//         'Price' => '50000',
//         'ID' => '2',
//         'qty' => '2'
//     )
// );


// echo "<pre>";
// print_r($arr);

// /*$a = [];
// foreach ($arr as $userdb) :

//     if (($userdb['ID'] === $userdb['ID'])  )
//      {
//         echo "success";
//         $a[] = $userdb;
//     }

// endforeach;



// $output = array_map("unserialize", array_unique(array_map("serialize", $arr['ID'])));
// print_r($output);

// $arr= $a;
// print_r($a);

// $final = [];
// foreach ($arr as $array) {
//     if(!in_array($array, $final)){
//         $final[] = $array;
//     }
// }
// print_r($final);  */

//     $arr = $arr;
//     $temp_array = [];
//     $i = 0;
//     $key_array = [];

//     foreach($arr as $val) {
//         if (!in_array($val[ID], $key_array)) {
//             $key_array[$i] = $val[ID];
//             $temp_array[$i] = $val;
//         }
//         $i++;
//     }
//     return $temp_array;

// print_r($temp_array);




// $attribs[] = array(
//     "name"         => "Test Product 1",
//     "length"     => "42 cm",
//     "weight"     => "0,5 kg",
//     "price"     => "10 $",
//     "stock"     => "100",
// );

// $attribs[] = array(
//     "name"         => "Test Product 2",
//     "length"     => "42 cm",
//     "weight"     => "1,5 kg",
//     "price"     => "10 $",
//     "stock"     => "200",
// );

// /* The nice stuff */

// $new = array();
// $exclude = array("");
// for ($i = 0; $i <= count($attribs) - 1; $i++) {
//     if (!in_array(trim($attribs[$i]["price"]), $exclude)) {
//         $new[] = $attribs[$i];
//         $exclude[] = trim($attribs[$i]["price"]);
//     }
// }
// echo "<pre>";
// print_r($new); // $new is our sorted array




// $products_list[] = [
//     'manufacturer' => 'manufacturer1',
//     'mpn' => 'mpn1',
//     'description' => 'desc',
//     'quantity' => 2,
//     'condition' => 'condition',
//     'price' => 10
// ];

// $products_list[] = [
//     'manufacturer' => 'manufacturer1',
//     'mpn' => 'mpn1',
//     'description' => 'desc',
//     'quantity' => 3,
//     'condition' => 'condition',
//     'price' => 10
// ];

// $products_list[] = [
//     'manufacturer' => 'manufacturer2',
//     'mpn' => 'mpn2',
//     'description' => 'desc2',
//     'quantity' => 4,
//     'condition' => 'condition2',
//     'price' => 15
// ];

// $quantities   = [];

// foreach ( $products_list as $product ) {
//     $key = $product['description'].'|'.$product['condition']; // fields you want to compare
//     if ( !isset($quantities[$key]) ) {
//         $quantities[$key] = $product;
//     } else {
//         $quantities[$key]['quantity'] += $product['quantity'];
//     }
// }

// $products   = array_values($quantities);
// echo "<pre>";

// print_r($products);




// $products=

 $session = array(
   (0) => array(
      'Name' => 'janviparmar',
        'Price' => '67000',
       'ID' => '3',
        'qty' => '6'
     ),
    
    (1) => array(
       'Name' => 'janvi',
       'Price' => '4000',
        'ID' => '1',
     'qty' => '4'
    ),
    
   (2) => array(
      'Name' => 'janvi',
      'Price' => '4000',
      'ID' => '1',
      'qty' => '5'
    ),
   (3) => array(
      'Name' => 'pABC',
     'Price' => '50000',
      'ID' => '2',
         'qty' => '2'
    )
);
echo "<pre>";
print_r($session);
$b= [];

foreach($session as $session){
    $key = $session['ID'].'|'.$session['Name'];
    if(!isset($b[$key]))
    {
        $b[$key] = $session;
    }else
    {
        $b[$key]['Price'] += $session['Price'];
        $b[$key]['qty'] += $session['qty'];
    }
}
echo "<pre>";
$session = array_values($b);
print_r($session);



