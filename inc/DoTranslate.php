<?php
            //$url = "http://www.mymemory.translated.net/api/get?q=Hello%20World!&langpair=en|fa";
            $curl = curl_init();
            curl_setopt($curl,CURLOPT_PUT,1);
            // Reading Value sends by Ajax 
            $fromvalueselected = $_POST["fromselect"];
            $tovalueselected = $_POST["toselect"];
            $from_text = $_POST["fromtext"];
            if(!empty($_POST["fromtext"]))
            {
                $from_textencoded = rawurlencode($from_text);
                // Call WebService to Translate the Text
                $url = "http://www.mymemory.translated.net/api/get?q=".$from_textencoded."!&langpair=".$fromvalueselected."|".$tovalueselected;
                //en|fa";
                curl_setopt($curl,CURLOPT_URL, $url);
                $result = file_get_contents($url);
                $json_object = json_decode($result,true);
                curl_close($curl);
                // Getting the translated text from webservice call
                $translate = $json_object['responseData']['translatedText']; 
                $translate = rawurldecode($translate);
                echo($translate); // Display for Ajax call use
            }
            //print_r(json_decode($result, true));  //keep to check response from server
            //echo $json_object['responseData']['translatedText'];
           
            //echo "<br/>";
            //echo $json_object['matches'][0]['segment'];    
            // Mapping Section, should move to DB laterone
            $Mapping = array();
            $Mapping['Afrikaans']='af';
            $Mapping['Albanian']='sq';
            $Mapping['Arabic']='ar';
            $Mapping['Armenian']='hy';
            $Mapping['Azerbaijani']='az';
            $Mapping['Basque']='eu';
            $Mapping['Belarusian']='be';
            $Mapping['Bengali, Bangla']='bn';
            $Mapping['Bosnian']='bs';
            $Mapping['Bulgarian']='bg';
            $Mapping['Catalan']='ca';
            $Mapping['Chinese']='zh';
            $Mapping['Croatian']='hr';
            $Mapping['Czech']='cs';
            $Mapping['Danish']='da';
            $Mapping['Dutch']='nl';
            $Mapping['English']='en';
            $Mapping['Esperanto']='eo';
            $Mapping['Estonian']='et'; 
            $Mapping['Finnish']='fi';
            $Mapping['French']='fr';
            $Mapping['Galician']='gl';
            $Mapping['Georgian']='ka';
            $Mapping['German']='de';
            $Mapping['Greek']='el';
            $Mapping['Gujarati']='gu';
            $Mapping['Haitian Creole']='ht';
            $Mapping['Hausa']='ha';
            $Mapping['Hebrew']='he';
            $Mapping['Hindi']='hi';
            $Mapping['Hungarian']='hu';
            $Mapping['Icelandic']='is';
            $Mapping['Igbo']='ig';
            $Mapping['Indonesian']='id';
            $Mapping['Irish']='ga';
            $Mapping['Italian']='it';
            $Mapping['Japanese']='ja';
            $Mapping['Javanese']='jv';
            $Mapping['Kannada']='kn';
            $Mapping['Khmer']='km';
            $Mapping['Korean']='ko';
            $Mapping['Lao']='lo';
            $Mapping['Latin']='la';
            $Mapping['Latvian']='lv';
            $Mapping['Lithuanian']='lt';
            $Mapping['Macedonian']='mk';
            $Mapping['Malay']='ms';
            $Mapping['Maltese']='mt';
            $Mapping['Maori']='mi';
            $Mapping['Marathi']='mr';
            $Mapping['Mongolian']='mn';
            $Mapping['Nepali']='ne';
            $Mapping['Norwegian']='no';
            $Mapping['Persian']='fa';
            $Mapping['Polish']='pl';
            $Mapping['Portuguese']='pt';
            $Mapping['Punjabi']='pa';
            $Mapping['Romanian']='ro';
            $Mapping['Russian']='ru';    
            $Mapping['Serbian']='sr';
            $Mapping['Slovak']='sk';
            $Mapping['Slovenian']='sl';
            $Mapping['Somali']='so';
            $Mapping['Spanish']='es';
            $Mapping['Swahili']='sw';
            $Mapping['Swedish']='sv';
            $Mapping['Tamil']='ta';
            $Mapping['Telugu']='te';
            $Mapping['Thai']='th';
            $Mapping['Turkish']='tr';
            $Mapping['Ukrainian']='uk';
            $Mapping['Urdu']='ur';
            $Mapping['Vietnamese']='vi';
            $Mapping['Welsh']='cy';
            $Mapping['Yiddish']='yi';
            $Mapping['Yoruba']='yo';
            $Mapping['Zulu']='zu';
?>
