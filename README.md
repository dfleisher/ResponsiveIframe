<p>Author: Dave Fleisher (http://davefleisher.com)<br/>
Author Email: dave@davefleisher.com<br/>
Version: 1.0<br/>
License: GPL v3</p>

<h4>About:</h4>
<p>This plugin will allow you to take iframes meant for embedding in your site and make them responsive, maintaining their original aspect ratio (which is passed in as 2 parameters). You have the option to whitelist hosts (this checks the src parameter of the iframe for a string passed in using the hosts array (e.g. $hosts = array("youtube","vimeo"))). Useful if you want to resize your YouTube and Vimeo embeds but not override default resizing of Soundcloud embeds (these have native resizing and it is likely that aspect ratio is unimportant - making them 16:9 makes them ugly).</p>

<h4>Usage:</h4>
<ul>
<li>Include ResponsiveIframe.css</li>
<li>Include ResponsiveIframe.php</li>
<li>Call make_iframe_responsive($content,$widthCommonDenom,$heightCommonDenom,$hosts)</li>
</ul>

<code>
$content = 'Hello world...<iframe width="560" height="315" src="//www.youtube.com/embed/jofNR_WkoCE" frameborder="0" allowfullscreen></iframe>';
echo make_iframe_responsive($content,16,9,array("youtube","vimeo"));
</code>

<h4>Limitations:</h4>
<ul>
<li>Will only work if there is a maximum of ONE (1) iframe in the content passed in</li>
<li>Assumes width, height, and source parameters are contained within double quotes "..."</li>
<li>Although we can provide a whitelist array of different hosts that require replacement, all videos must have the same ratio $widthCommonDenom : $heightCommonDenom</li>
</ul>