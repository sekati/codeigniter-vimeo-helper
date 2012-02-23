
CodeIgniter Vimeo Video Helper
============================

A small [CodeIgniter](http://codeigniter.com) helper library for working with the [Vimeo](http://vimeo.com) API. _If you are interested in YouTube integration please see [video helper](https://github.com/mpmont/video_helper)._


Installation
-------------------------------------

1. Copy `vimeo_helper.php` to your `application/helpers` folder.
2. Autoload the helper `$autoload['helper'] = array('vimeo');`.
3. Employ helper functions as needed.


Usage
-------------------------------------

	<?php
		// returns FALSE if invalid URL || non-existant Vimeo Video URL
		$vimeo_video_id = vimeo_id( 'http://vimeo.com/12345' );
	
		// returns FALSE if no API data available for video
		$vimeo_video_data = vimeo_data( $vimeo_video_id );
		print_r( $vimeo_video_data );
	
		// returns vimeo iframe embed with optional player control arguments
		$width=640, $height=480, $color='#666666', $title=FALSE, $autoplay=TRUE;
		vimeo_embed( $vimeo_video_id, $width, $height, $color, $title, $autoplay );
	?>


License
-------------------------------------

Copyright © 2012 Jason M Horwitz, Sekati LLC. All Rights Reserved.

Released under the MIT License: [http://www.opensource.org/licenses/mit-license.php](http://www.opensource.org/licenses/mit-license.php)

	The MIT License

	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and 
	associated documentation files (the “Software”), to deal in the Software without restriction, 
	including without limitation the rights to use, copy, modify, merge, publish, distribute, 
	sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is 
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in all copies or 
	substantial portions of the Software.

	THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING 
	BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND 
	NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, 
	DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, 
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.	
	