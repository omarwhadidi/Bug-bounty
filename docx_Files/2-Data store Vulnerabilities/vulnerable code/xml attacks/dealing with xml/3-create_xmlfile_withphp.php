<!--  https://www.c-sharpcorner.com/article/what-is-xml-and-how-to-use-xml-in-php/ -->
<?php

	$dom = new DOMDocument();

		$dom->encoding = 'utf-8';

		$dom->xmlVersion = '1.0';

		$dom->formatOutput = true;


		$xml_file_name = 'movies_list.xml';

		
		$root = $dom->createElement('Movies');

 //----------------------------------------- First Movie ----------------------------------------------

			$movie_node = $dom->createElement('movie');


				$attr_movie_id = new DOMAttr('movie_id', '5467');

				$movie_node->setAttributeNode($attr_movie_id);


				$child_node_title = $dom->createElement('Title', 'The Campaign');

				$movie_node->appendChild($child_node_title);

				
				$child_node_year = $dom->createElement('Year', 2012);

				$movie_node->appendChild($child_node_year);

				
				$child_node_genre = $dom->createElement('Genre', 'Drama');

				$movie_node->appendChild($child_node_genre);

				
				$child_node_ratings = $dom->createElement('Ratings', 6.2);

				$movie_node->appendChild($child_node_ratings);

		
			$root->appendChild($movie_node);

 //----------------------------------------- Second Movie ----------------------------------------------

			$movie_node = $dom->createElement('movie');


				$attr_movie_id = new DOMAttr('movie_id', '2343');

				$movie_node->setAttributeNode($attr_movie_id);


				$child_node_title = $dom->createElement('Title', 'Wolf Of wall Street');

				$movie_node->appendChild($child_node_title);

				
				$child_node_year = $dom->createElement('Year', 2018);

				$movie_node->appendChild($child_node_year);

				
				$child_node_genre = $dom->createElement('Genre', 'Comedy');

				$movie_node->appendChild($child_node_genre);

				
				$child_node_ratings = $dom->createElement('Ratings', 9.2);

				$movie_node->appendChild($child_node_ratings);

		
			$root->appendChild($movie_node);




			

		$dom->appendChild($root);

	$dom->save($xml_file_name);

	echo "$xml_file_name has been successfully created";
