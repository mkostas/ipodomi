<?php

function getFirstWords($string, $limit) {
	$pieces = explode(" ", $string);
	if (count($pieces) > $limit)
    	$first_part = implode(" ", array_splice($pieces, 0, $limit)) . ' [...]';
    else
    	$first_part = $string;
    return $first_part;
}