@extends('template')

@section('content')
	<div class="panel panel-default" style="background-color: #f9f9f9;">
        <div class="panel-body">
        	<h4>About RS Meet</h4>
        	<p class="larger">
                I am a high school student who has played runescape on-and-off since about 7. Although I have always enjoyed playing
                with real-life friends, sometimes it is difficult to coordinate with them. So, I created this website to make it easier
                to find people to play with. Using the searching and filtering functionality offered by the website, I hope you can easily match up with people who enjoy
                the same activities as you do.
            </p>
            <p class="larger">
                I quickly built this website over a few days, so it is likely that you will encounter some errors. If you do, please send a message to my reddit account,
                <b>/u/yolodysseus</b>, so that I can resolve it as soon as possible.
            </p>
            <p class="larger">
                Additionally, by donating a small sum of money to me, you can aid me in paying for the cost of running the website's server and owning the domain name. 
                However, this is completely optional. 
            </p>

            <br>

        	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>

        </div>
    </div>
@endsection