<?php
interface Father{
const a=5;
public function disp();
}
interface  Mother{
    const m=6;
    function showValue();
}
interface Son extends Father,Mother{
    const s=7;
    function getValue();
}


/*interface Son extends Father{
    const b=2;
    function getValue();
}*/


?>