<?php

// Create some vertices and edges

$rexster = new Rexster();
$g = $rexster->get_graph('emptygraph');

$flintstones = $g->vertex(null, array('name' => 'Flintstones'))
$fred = $g->create_vertex(null, array('name' => 'Fred Flintsone'));
$wilma = $g->create_vertex(null, array('name' => 'Wilma Flintsone'));
$pebbles = $g->create_vertex(null, array('name' => 'Pebbles Flintsone'));
$flintstones->create_edge($fred, 'has_member');
$flintstones->create_edge($wilma, 'has_member');
$fred->create_edge($wilma, 'married_to');
$pebbles->create_edge($wilma, 'child_of');
$pebbles->create_edge($fred, 'child_of');

$rubbles = $g->vertex(null, array('name' => 'Rubbles'))
$barney = $g->create_vertex(null, array('name' => 'Barney Rubble'));
$betty = $g->create_vertex(null, array('name' => 'Betty Rubble'));
$bammbamm = $g->create_vertex(null, array('name' => 'Bamm-Bamm Rubble'));
$rubbles->create_edge($barney, 'has_member');
$rubbles->create_edge($betty, 'has_member');
$barney->create_edge($betty, 'married_to');
$bammbamm->create_edge($betty, 'child_of');
$bammbamm->create_edge($barney, 'child_of');

$flintstones->create_edge($rubbles, 'friends_with');


?>
