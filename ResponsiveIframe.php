<?php
function make_iframe_responsive($content,$widthCommonDenom = 16,$heightCommonDenom = 9,array $hosts = null) {	
	// Define regex's and match arrays to store regex matches
	$iframePattern = '/<iframe(.*?)><\/iframe>/';
	$srcPattern = '/src="(.*?)"/';
	$wPattern = '/width="(.*?)"/';
	$hPattern = '/height="(.*?)"/';
	$matches = array();	
	
	if(preg_match($iframePattern,$content,$matches)) :								// Check for iframe				
		$matches[0] = preg_replace($wPattern,"",$matches[0]);						// Remove width attribute
		$matches[0] = preg_replace($hPattern,"",$matches[0]);						// Remove height attribute
		$responsiveIframe = '<div class="frameWrapper"><div class="h_iframe"><img src="//placehold.it/' . $widthCommonDenom . 'x' . $heightCommonDenom . '" class="ratio"/>' . $matches[0] . '</div></div>';
				
		if($hosts != null) :														// If we are limiting replacement to only certain hosts
			$srcMatch = array();													// Define src regex match array
			preg_match($srcPattern,$matches[0],$srcMatch);							// Get src of iframe
			
			foreach($hosts as $host) :
				if(strpos($srcMatch[0],$host)) :									// Look for the specific host							
					return preg_replace($iframePattern,$responsiveIframe,$content);	// If found, replace and return
				endif;
			endforeach;	
		else :							
			return preg_replace($iframePattern,$responsiveIframe,$content);			// If we are not limiting replacement to a certain host, replace and return
		endif;							
	endif;	
	return $content;																// If there was no iframe, output original content
}	
?>