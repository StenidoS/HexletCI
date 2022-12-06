<?php 

echo "Hello World!!!";

function test($name)
{
    strtoupper($name);
    return strtoupper($name);
}
test('test');