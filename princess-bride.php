<?php
/**
 * @package Princess Bride
 * @version 1.1
 */
/*
Plugin Name: Princess Bride
Plugin URI: http://wordpress.org/extend/plugins/princess-bride/
Description: A plugin that displays various quotes from the film in your Wordpress admin panel.
Author: Jesse Winton
Version: 1.1
Author URI: http://jessewintondesign.com
*/

function princess_bride_get_quotes() {
	/** These are the quotes */
	$quotes = "<b>The Grandson:</b> A book? <b>Grandpa:</b> That's right. When I was your age, television was called books.
<b>Grandpa:</b> She doesn't get eaten by the eels at this time
<b>Wesley:</b> As you wish. 
<b>The Grandson:</b> Is this a kissing book? <b>Grandpa:</b> Keep your shirt on, and let me read. 
<b>Inigo Montoya:</b> Hello. My name is Inigo Montoya. You killed my father. Prepare to die. 
<b>Man in Black:</b> Look, are you just fiddling around with me or what? <b>Fezzik:</b> I just want you to feel you're doing well. 
<b>Vizzini:</b> Jump in after her! <b>Inigo Montoya:</b> I don't swim. <b>Fezzik:</b> I only dog paddle. <b>Vizzini:</b> AGGHH! 
<b>Wesley:</b> Death cannot stop true love. All it can do is delay it for a while. 
<b>Miracle Max:</b> You rush a miracle man, you get rotten miracles. 
<b>Inigo Montoya:</b> Fezzik, are there rocks ahead? <b>Fezzik:</b> If there are, we all be dead. 
<b>Vizzini:</b> No more rhymes now, I mean it. <b>Fezzik:</b> Anybody want a peanut? 
<b>Vizzini:</b> HE DIDN'T FALL? INCONCEIVABLE. <b>Inigo Montoya:</b> You keep using that word. I do not think it means what you think it means. 
<b>Inigo Montoya:</b> There's not a lot of money in revenge. 
<b>Wesley:</b> Why won't my arms move? <b>Fezzik:</b> You've been mostly-dead all day. 
<b>Man in Black:</b> I'm not left-handed either. 
<b>Vizzini:</b> Have you ever heard of Plato, Aristotle, Socrates? <b>Man in Black:</b> Yes. <b>Vizzini:</b> Morons. 
<b>Buttercup:</b> We'll never survive. <b>Wesley:</b> Nonsense. You're only saying that because no one ever has. 
<b>Vizzini:</b> HE DIDN'T FALL? INCONCEIVABLE. <b>Inigo Montoya</b> You keep using that word. I do not think it means what you think it means. 
<b>Inigo Montoya:</b> I do not mean to pry, but you don't by any chance happen to have six fingers on your right hand? <b>Man in Black:</b> Do you always begin conversations this way? 
<b>Miracle Max:</b> Have fun stormin' da castle.
<b>The Impressive Clergyman:</b> Mawage. Mawage is wot bwings us togeder tooday. Mawage, that bwessed awangment, that dweam wifin a dweam... 
";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This echoes the random line that the plugin has picked to display
function princess_bride() {
	$chosen = princess_bride_get_quotes();
	echo "<p id='quote'>$chosen</p>";
}

// Now we run that function when the Wordpress admin_notices function is called
add_action( 'admin_notices', 'princess_bride' );

// We add some CSS to position the quote correctly on the screen
function quote_css() {
	// Support for styling in right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#quote {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}

    #quote b {
    	font-weight: bold;
    }
	</style>
	";
}

add_action( 'admin_head', 'quote_css' );

?>
