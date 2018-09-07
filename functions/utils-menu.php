<?php

// WPML
//Affiche les langues sous forme de liste (affiche plusieurs langues en même temps)
function languages_list(){
	$order_language = array('fr','en','es');
    $languages = icl_get_languages('skip_missing=1&orderby=name&order=desc');
    if(!empty($languages)){
		// Sort le array dnas le bonne ordre
		uksort($languages, function ($a, $b) use ($order_language) {
			$sortMe = array_flip($order_language);
			if ($sortMe[$a] == $sortMe[$b]) { return 0; }
			return ($sortMe[$a] < $sortMe[$b]) ? -1 : 1;
		});

		foreach($languages as $l){
            echo '<li>';
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
                echo $l['language_code'];
                if(!$l['active'])  echo '</a>';
            
			echo '</li>';
        }
    }
}

// Affiche l'autre langue disponible
function language_only($class=''){
	$languages = icl_get_languages('skip_missing=1&orderby=name&order=desc');
    if(!empty($languages)){
		foreach($languages as $l) {
            
			if(!$l['active']) 
				echo '<li class="'.$class.'"><a href="'.$l['url'].'">' . $l['native_name'] . '</a></li>';
        }
    }
}
