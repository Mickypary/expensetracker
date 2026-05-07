<?php

$function = [
  function (callable $next) {
    echo "A <br>";
    $next();
    echo "After Main Content";
  },
  function (callable $next) {
    echo "B <br>";
    $next();
  },
  function (callable $next) {
    echo "C <br>";
    $next();
  }
];

$a = function () {
  echo "Main Content <br>";
};



foreach ($function as $function) {
  $a =  fn() => $function($a);
}

$a();
