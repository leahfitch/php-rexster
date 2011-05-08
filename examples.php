<?php

require_once('Rexster.php');

/*
 * Create some vertices and edges
 */

$rexster = new Rexster();
$g = $rexster->get_graph('flintstones');

$flintstones = $g->create_vertex(null, array('name' => 'Flintstones'));
$fred = $g->create_vertex(null, array('name' => 'Fred Flintsone'));
$wilma = $g->create_vertex(null, array('name' => 'Wilma Flintsone'));
$pebbles = $g->create_vertex(null, array('name' => 'Pebbles Flintsone'));
$flintstones->create_edge($fred, 'has_member');
$flintstones->create_edge($wilma, 'has_member');
$flintstones->create_edge($pebbles, 'has_member');
$fred->create_edge($wilma, 'married_to');
$pebbles->create_edge($wilma, 'child_of');
$pebbles->create_edge($fred, 'child_of');

$rubbles = $g->create_vertex(null, array('name' => 'Rubbles'));
$barney = $g->create_vertex(null, array('name' => 'Barney Rubble'));
$betty = $g->create_vertex(null, array('name' => 'Betty Rubble'));
$bammbamm = $g->create_vertex(null, array('name' => 'Bamm-Bamm Rubble'));
$rubbles->create_edge($barney, 'has_member');
$rubbles->create_edge($betty, 'has_member');
$rubbles->create_edge($bammbamm, 'has_member');
$barney->create_edge($betty, 'married_to');
$bammbamm->create_edge($betty, 'child_of');
$bammbamm->create_edge($barney, 'child_of');

$flintstones->create_edge($rubbles, 'friends_with');

/*
 * List edges
 */
foreach ($rubbles->edges('out') as $edge)
{
    echo $edge->label.' '.$edge->in_id."\n";
}

/*
 * Create an index
 */
$idx = $g->create_index('by_first_name');
$idx->add_vertex($fred, 'first_name', 'Fred');

foreach ($idx->get('first_name', 'Fred') as $vertex)
{
    echo $vertex->name."\n";
}


/*
 * Use Gremlin
 */
$results = $g->gremlin('g.E.filter{it.label=="child_of"}.outV.uniqueObject');

foreach ($results as $vertex)
{
    echo $vertex->name."\n";
}
?>
