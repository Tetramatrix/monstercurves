<?php
/***************************************************************
*   hilbert curve
*   Version 0.3
*   Copyright (c) 2010-2013 Chi Hoang 
*   All rights reserved
*
*   Permission is hereby granted, free of charge, to any person obtaining a
*	copy of this software and associated documentation files (the "Software"),
*	to deal in the Software without restriction, including without limitation
*	the rights to use, copy, modify, merge, publish, distribute, sublicense,
*	and/or sell copies of the Software, and to permit persons to whom the
*	Software is furnished to do so, subject to the following conditions:
*
*   Free for non-commercial use
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
/**************************************************************
*  hilbert_map_1  =  N
*  hilbert_map_9  =  S
*  hilbert_map_3  = W
*  hilbert_map_7  =  E
***************************************************************/

class hilbert {
	
	var $moore_map = array ( 	"0,0" => array ( 0, "hilbert_map_7"), 
								"0,1" => array ( 1, "hilbert_map_7"),
								"1,1" => array ( 2, "hilbert_map_3"),
								"1,0" => array ( 3, "hilbert_map_3"),
							);
					
	var $hilbert_map_1 = array (	'a' => array (
											"0, 0" => array (0, 'd'),
											"0, 1" => array (1, 'a'), 
											"1, 0" => array (3, 'b'),
											"1, 1" => array (2, 'a')
									), 
									 'b' => array ( 
											 "0, 0" => array (2, 'b'), 
											 "0, 1" => array (1, 'b'), 
											 "1, 0" => array (3, 'a'),
											 "1, 1" => array (0, 'c')
									), 
									'c' => array ( 
											"0, 0" => array (2, 'c'),
											"0, 1" => array (3, 'd'),
											"1, 0" => array (1, 'c'),
											"1, 1" => array (0, 'b')
										), 
									'd' => array (
											"0, 0" => array (0, 'a'), 
											"0, 1" => array (3, 'c'), 
											"1, 0" => array (1, 'd'), 
											"1, 1" => array (2, 'd')
									),
								);

	var $hilbert_map_7 = array ( 		'a' => array (
											 "0, 0" => array (2, 'a'), 
											 "0, 1" => array (1, 'a'), 
											 "1, 0" => array (3, 'b'),
											 "1, 1" => array (0, 'c')
									), 
									 'b' => array ( 
											"0, 0" => array (0, 'd'),
											"0, 1" => array (1, 'b'), 
											"1, 0" => array (3, 'a'),
											"1, 1" => array (2, 'b')
										), 
									'c' => array ( 
											"0, 0" => array (2, 'c'),
											"0, 1" => array (3, 'd'),
											"1, 0" => array (1, 'c'),
											"1, 1" => array (0, 'a')
										), 
									'd' => array (
											"0, 0" => array (0, 'b'), 
											"0, 1" => array (3, 'c'), 
											"1, 0" => array (1, 'd'), 
											"1, 1" => array (2, 'd')
									),
							);

	var $hilbert_map_3 = array ( 	'a' => array (
										"0, 0" => array (0, 'b'), 
										"0, 1" => array (3, 'c'), 
										"1, 0" => array (1, 'a'), 
										"1, 1" => array (2, 'a')
								), 
								 'b' => array ( 
								 		"0, 0" => array (0, 'a'),
										"0, 1" => array (1, 'b'), 
										"1, 0" => array (3, 'd'),
										"1, 1" => array (2, 'b')
									), 
								'c' => array ( 
										"0, 0" => array (2, 'c'),
										"0, 1" => array (3, 'a'),
										"1, 0" => array (1, 'c'),
										"1, 1" => array (0, 'd')
									), 
								'd' => array (
										 "0, 0" => array (2, 'd'), 
										 "0, 1" => array (1, 'd'), 
										 "1, 0" => array (3, 'b'),
										 "1, 1" => array (0, 'c')
								),
						);
			
	var $hilbert_map_9 = array ( 	'a' => array (
										"0, 0" => array (2, 'a'),
										"0, 1" => array (3, 'c'),
										"1, 0" => array (1, 'a'),
										"1, 1" => array (0, 'd')
								), 
								 'b' => array ( 
								 		"0, 0" => array (0, 'c'),
										"0, 1" => array (1, 'b'), 
										"1, 0" => array (3, 'd'),
										"1, 1" => array (2, 'b')
									), 
								'c' => array ( 
										"0, 0" => array (0, 'b'), 
										"0, 1" => array (3, 'a'), 
										"1, 0" => array (1, 'c'), 
										"1, 1" => array (2, 'c')
									), 
								'd' => array (
										 "0, 0" => array (2, 'd'), 
										 "0, 1" => array (1, 'd'), 
										 "1, 0" => array (3, 'b'),
										 "1, 1" => array (0, 'a')
								),
							);
			
var $rev_map = Array ( 'a' => Array (
									  Array (3, 'd'),
									  Array (1, 'a'),
									  Array (0, 'a'),
									  Array (2, 'c')
					     ),
					     'b' => Array (
								  Array (0, 'c'),
								  Array (2, 'b'),
								  Array (3, 'b'),
								  Array (1, 'd')
					     ),
					     'c' => Array (
								  Array (0, 'b'),
								  Array (1, 'c'),
								  Array (3, 'c'),
								  Array (2, 'a')
					     ),
					     'd' => Array (
								  Array (3, 'a'),
								  Array (2, 'd'),
								  Array (0, 'd'),
								  Array (1, 'b')
					     ),
	);

	var $rev_map2 = Array (       'a' => Array (
										Array (0, 'b'),
										Array (2, 'a'),
										Array (3, 'a'),
										Array (1, 'c')
							),
							'b' => Array (
										Array (0, 'a'),
										Array (1, 'b'),
										Array (3, 'b'),
										Array (2, 'd')
							),
							'c' => Array (
										Array (3, 'd'),
										Array (2, 'c'),
										Array (0, 'c'),
										Array (1, 'a')
							),
							'd' => Array (
										Array (3, 'c'),
										Array (1, 'd'),
										Array (0, 'd'),
										Array (2, 'b')
							),
					);
	
	var $z_map = array       (  'a' => array (
									"0, 0" => array (1, 'a'),
									"0, 1" => array (3, 'a'), 
									"1, 0" => array (0, 'a'),
									"1, 1" => array (2, 'a')
							), 
				);
			
		// a b c d  e  f g h  i  j   k   l     m  n  o    p  q    r   s   t    u   v  w   x    y  z
		// 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26
	var $zcurve3d_map = array (    
								'a' => array (
											"0, 0, 0" => array(0,'a'),
											"0, 0, 1" => array(1,'a'),
											"0, 1, 1" => array(5,'a'),
											"0, 1, 0" => array(4,'a'),
											"1, 1, 0" => array(6,'a'),
											"1, 1, 1" => array(7,'a'),
											"1, 0, 1" => array(3,'a'),
											"1, 0, 0" => array(2,'a'),
										),
								);		
	
	
	function point_to_quadtree($x, $y, $order=16, $map="hilbert_map_1", $mode="hilbert")
	{		
		switch ($mode)
		{
			case "moore":
			{	
				list( $moore, $map)  = $this->point_to_moore ($x, $y, $order, "quadtree");
				//echo "\n$moore:$map\n";
				list( $x, $y) = $this->hilbert_to_point($moore, $order);
				//echo "\n$x:$y\n";
				$payload = $this->point_to_quadtree_hilbert($x, $y, $order, $map);
				break;
			}
			default:
			{
				$current_square = 'a' ;
				$payload = 0; 
				foreach (range($order-1, 0, -1) as $i) { 
					$quad_x = $x & (1 << $i) ? 1 : 0;
					$quad_y = $y & (1 << $i) ? 1 : 0;
					list($quad_position, $current_square) = $this->{$map}[$current_square]["$quad_x, $quad_y"];
					$payload .= $quad_position;
				}
				break;
			}
		}
		return $payload;
	}
		
	function point_to_hilbert3D($x, $y, $z, $order=16)
	{
		$current_square = 'a' ;
		$position = 0; 
		foreach (range($order-1, 0, -1) as $i) { 
			$position <<= 2; 
			$quad_x = $x & (1 << $i) ? 1 : 0;
			$quad_y = $y & (1 << $i) ? 1 : 0;
			$quad_z = $z & (1 << $i) ? 1 : 0;
			list($quad_position, $current_square) = $this->zcurve3d_map[$current_square]["$quad_x, $quad_y, $quad_z"];
			$position |= $quad_position;
		}
		return $position;
	}
		
	function point_to_hilbert($x, $y, $order=16, $map="hilbert_map_1", $mode = "hilbert")
	{		
		$current_square = 'a' ;
		$position = 0; 
		foreach (range($order-1, 0, -1) as $i)
		{ 
			$position <<= 2; 
			$quad_x = $x & (1 << $i) ? 1 : 0;
			$quad_y = $y & (1 << $i) ? 1 : 0;
			list($quad_position, $current_square) = $this->{$map}[$current_square]["$quad_x, $quad_y"];
			$position |= $quad_position;
		}
		return $position;
	}
	
	function hilbert_to_point ( $hilbert, $order ) {
		$current_square = "a";
		$amount = 1 << $order - 1;
		$x = $y = 0;
		for ( $i = 2*$order;  $i > 0; $i -= 2 ) {
			list ( $position, $current_square ) = $this->rev_map [ $current_square ] [ $hilbert >> $i - 2 ];
			switch ( $position ) {
				case 1:  $x+=$amount;
				break;
				case 2:  $y+=$amount;
				break;
				case 3:  $y+=$amount;
				         $x+=$amount;
				default: break;
			}
			$amount /= 2;
			$hilbert &=(1 << ($i - 2)) - 1;
	}
		
	
	function point_to_z($x, $y, $order=16)
	{
		$current_square = 'a' ;
		$position = 0; 
		foreach (range($order-1, 0, -1) as $i)
		{ 
			$position <<= 2; 
			$quad_x = $x & (1 << $i) ? 1 : 0;
			$quad_y = $y & (1 << $i) ? 1 : 0;
			list($quad_position, $current_square) = $this->z_map[$current_square]["$quad_x, $quad_y"];
			$position |= $quad_position;
		}
		return $position;
	}
		
		// points $x,$y should be 2^1 higher than $order
		// example $this->point-to-moore(7,7,2);
		//               $this->point-to-moore(15,15,3);
	function point_to_moore($x, $y, $order=4, $mode = "normal")
	{
		$quad = pow(2, $order)-1;
		switch ($order)
		{
			case 2:
			{
				$curve_length = 16;
				break;
			}
			case  1:
			{
				$curve_length = 8;
				break;
			}
			case 0:
			{
				$curve_length = 4;
				break;	
			}
			default:
			{
				$curve_length = pow(2, $quad)+1;
				break;
			}
		}
		
		$quad_x = $x & (1 << $order) ? 1 : 0;
		$quad_y = $y & (1 << $order) ? 1 : 0;
		
		list( $pos, $map ) = $this->moore_map[  "$quad_x,$quad_y" ];
		$pos *= $curve_length; 
		$quad_x *= $quad+1;
		$quad_y *= $quad+1;
		list( $px, $py ) =  array ( $x - $quad_x ,  $y - $quad_y );
		
		switch ($mode)
		{
			case "quadtree":
			{
				echo "\n$pos:$x:$y:$order:$map:$curve_length\n";
				$payload = array ($pos - $this->point_to_hilbert($px, $py, $order, $map)-$curve_length, $map);
				break;
			}
			default:
			{
 				$payload =  $pos - $this->point_to_hilbert($px, $py, $order, $map)-$curve_length;
				break;
			}
		}
		return $payload;
	}
	
	function test_ptm()
	{
		foreach (range(31,0,-1) as $x)
		{
			foreach (range(31,0,-1) as $y)
			{
				$sort[] = $points["$x, $y"] = $this->point_to_moore($x, $y, 4);
			}
		}
		array_multisort($points, $sort);
		foreach ($points as $k => $v)
		{
			echo $k."\n";
		}
	}
	
	function test_pth() {
		foreach (range(7,0,-1) as $x)
		{
			foreach (range(7,0,-1) as $y)
			{
				$sort[] = $points["$x, $y"] = $this->point_to_hilbert($x, $y, 3);
			}
		}
		array_multisort($points, $sort);
		foreach ($points as $k => $v)
		{
			echo $k."\n";
		}
	}
	
	function test_pth3d() {
		foreach (range(7,0,-1) as $x)
		{
			foreach (range(7,0,-1) as $y)
			{
				foreach (range(7,0,-1) as $z)
				{
					$sort[] = $points["$x,$y,$z"] = $this->point_to_hilbert3D($x, $y, $z, 3);
				}
			}
		}
		array_multisort($points, $sort);
		foreach ($points as $k => $v)
		{
			echo $k."\n";
		}
	}
}
?>