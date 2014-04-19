<?php
/***************************************************************
*      Hilbert curve
*      Version 0.2
*      Copyright (c) 2010 Chi Hoang (info@chihoang.de)
*      All rights reserved
*
*      http://www.chihoang.de
*
*      Permission is hereby granted, free of charge, to any person obtaining a
*	copy of this software and associated documentation files (the "Software"),
*	to deal in the Software without restriction, including without limitation
*	the rights to use, copy, modify, merge, publish, distribute, sublicense,
*	and/or sell copies of the Software, and to permit persons to whom the
*	Software is furnished to do so, subject to the following conditions:
*
*      Free for non-commercial use
*
*	The above copyright notice and this permission notice shall be included
*	in all copies or substantial portions of the Software.
*	
*	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
*	OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
*	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
*	THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
*	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
*	FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
*	DEALINGS IN THE SOFTWARE.
*
***************************************************************/
require_once("hilbert.php");
require_once("GlobalMapTiles.php");

define('MAXZOOM', 21);

class db {
	var $connid;
	var $erg;

	function db ($host,$user,$passwort) {
		if(!$this->connid = mysql_connect($host, $user, $passwort)) {
		    echo "Fehler beim Verbinden...";
		}
		return $this->connid;
	}

	function select_db($db) {
		if (!mysql_select_db($db, $this->connid)) {
		    echo "Fehler beim Auswaehlen der DB...";
		}
	}

	function sql ($sql) {
		if (!$this->erg = mysql_query($sql, $this->connid)) {
		    echo "Fehler beim Senden der Abfrage...";
		}
		return $this->erg;
	}
}

class quadtree {

	function loop() {
		
		$tree = new hilbert();
		$mercator = new GlobalMercator();

		$connection = new db("localhost", "root", "typo3" );
		$connection->select_db("amici");
		
		$q = "SELECT uid, plz, laengengrad, breitengrad FROM tx_chhaendlersuche_plz";
		
		$res = $connection->sql($q);                                                                                                                                     
		
		while ($row = mysql_fetch_assoc($res)) {
			
			list($lng, $lat) = array ($row['laengengrad'], $row['breitengrad']);

			list($mx, $my) = $mercator->LatLonToMeters($lat, $lng);
			list($tx, $ty) = $mercator->MetersToTile($mx, $my, MAXZOOM);
			list($tx, $ty) = array ($tx, ((1 << MAXZOOM) - 1) - $ty );
			
			//~ $string = $mercator->LatLonToQuadTree($lat, $lng, MAXZOOM);
			//~ $string = $mercator->QuadTree($tx, $ty, MAXZOOM);
			$string = $tree->point_to_quadtree( $tx, $ty, pow(2, 5) );
			//~ $string = $tree->point_to_quadtree( $tx, $ty, 5, "moore" );
			
			echo "$tx, $ty ".$row["uid"].": $string\n";
			
			mysql_query("UPDATE tx_chhaendlersuche_plz SET quadtree=".$string." WHERE uid=".$row['uid']); 
		}
	}
}

$main = new quadtree();
$main->loop();

?>