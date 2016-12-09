<?php
header('Content-Type: application/json');

ob_start();
?>
<div class="panel-brand brand-yellow">Select Language</div>
<div class="row">
	<div class="col-sm-4">
		<div class="list-group">
			<a class="list-group-item" href="#">Af-Soomaali</a>
		    <a class="list-group-item" href="#">Afrikaans</a>
		    <a class="list-group-item" href="#">Azərbaycan dili</a>
		    <a class="list-group-item" href="#">Bahasa Indonesia</a>
		    <a class="list-group-item" href="#">Bahasa Melayu</a>
		    <a class="list-group-item" href="#">Basa Jawa</a>
		    <a class="list-group-item" href="#">Bisaya</a>
		    <a class="list-group-item" href="#">Bosanski</a>
		    <a class="list-group-item" href="#">Brezhoneg</a>
		    <a class="list-group-item" href="#">Català</a>
		    <a class="list-group-item" href="#">Čeština</a>
		    <a class="list-group-item" href="#">Corsu</a>
		    <a class="list-group-item" href="#">Cymraeg</a>
		    <a class="list-group-item" href="#">Dansk</a>
		    <a class="list-group-item" href="#">Deutsch</a>
		    <a class="list-group-item" href="#">Eesti</a>
		    <a class="list-group-item active" href="#">English (UK)</a>
		    <a class="list-group-item" href="#">English (US)</a>
		    <a class="list-group-item" href="#">Español</a>
		    <a class="list-group-item" href="#">Español (España)</a>
		    <a class="list-group-item" href="#">Euskara</a>
		    <a class="list-group-item" href="#">Filipino</a>
		    <a class="list-group-item" href="#">Føroyskt</a>
		    <a class="list-group-item" href="#">Français (Canada)</a>
		    <a class="list-group-item" href="#">Français (France)</a>
		    <a class="list-group-item" href="#">Frysk</a>
		    <a class="list-group-item" href="#">Gaeilge</a>
		    <a class="list-group-item" href="#">Galego</a>
		    <a class="list-group-item" href="#">Guarani</a>
		    <a class="list-group-item" href="#">Hausa</a>
		    <a class="list-group-item" href="#">Hrvatski</a>
		    <a class="list-group-item" href="#">Ikinyarwanda</a>
		    <a class="list-group-item" href="#">Íslenska</a>
		    <a class="list-group-item" href="#">Italiano</a>
	    </div>
    </div>
    <div class="col-sm-4">
	    <div class="list-group">
		    <a class="list-group-item" href="#">Kiswahili</a>
		    <a class="list-group-item" href="#">Kurdî (Kurmancî)</a>
		    <a class="list-group-item" href="#">Latviešu</a>
		    <a class="list-group-item" href="#">Lietuvių</a>
		    <a class="list-group-item" href="#">Magyar</a>
		    <a class="list-group-item" href="#">Malagasy</a>
		    <a class="list-group-item" href="#">Malti</a>
		    <a class="list-group-item" href="#">Nederlands</a>
		    <a class="list-group-item" href="#">Nederlands (België)</a>
		    <a class="list-group-item" href="#">Norsk (bokmål)</a>
		    <a class="list-group-item" href="#">Norsk (nynorsk)</a>
		    <a class="list-group-item" href="#">O'zbek</a>
		    <a class="list-group-item" href="#">Polski</a>
		    <a class="list-group-item" href="#">Português (Brasil)</a>
		    <a class="list-group-item" href="#">Português (Portugal)</a>
		    <a class="list-group-item" href="#">Pulaar</a>
		    <a class="list-group-item" href="#">Română</a>
		    <a class="list-group-item" href="#">Sardu</a>
		    <a class="list-group-item" href="#">Shqip</a>
		    <a class="list-group-item" href="#">ślōnskŏ gŏdka</a>
		    <a class="list-group-item" href="#">Slovenčina</a>
		    <a class="list-group-item" href="#">Slovenščina</a>
		    <a class="list-group-item" href="#">Suomi</a>
		    <a class="list-group-item" href="#">Svenska</a>
		    <a class="list-group-item" href="#">Tiếng Việt</a>
		    <a class="list-group-item" href="#">Türkçe</a>
		    <a class="list-group-item" href="#">Ελληνικά</a>
		    <a class="list-group-item" href="#">Беларуская</a>
		    <a class="list-group-item" href="#">Български</a>
		    <a class="list-group-item" href="#">Қазақша</a>
		    <a class="list-group-item" href="#">Македонски</a>
		    <a class="list-group-item" href="#">Монгол</a>
		    <a class="list-group-item" href="#">Русский</a>
		    <a class="list-group-item" href="#">Српски</a>
	    </div>
    </div>
    <div class="col-sm-4">
	    <div class="list-group">
		    <a class="list-group-item" href="#">Тоҷикӣ</a>
		    <a class="list-group-item" href="#">Українська</a>
		    <a class="list-group-item" href="#">ქართული</a>
		    <a class="list-group-item" href="#">Հայերեն</a>
		    ‏<a class="list-group-item" href="#">עברית‏</a>
		    ‏<a class="list-group-item" href="#">اردو‏</a>
		    ‏<a class="list-group-item" href="#">العربية‏</a>
		    ‏<a class="list-group-item" href="#">پښتو‏</a>
		    ‏<a class="list-group-item" href="#">فارسی‏</a>
		    ‏<a class="list-group-item" href="#">کوردیی ناوەندی‏</a>
		    <a class="list-group-item" href="#">ⵜⴰⵎⴰⵣⵉⵖⵜ</a>
		    <a class="list-group-item" href="#">नेपाली</a>
		    <a class="list-group-item" href="#">मराठी</a>
		    <a class="list-group-item" href="#">हिन्दी</a>
		    <a class="list-group-item" href="#">অসমীয়া</a>
		    <a class="list-group-item" href="#">বাংলা</a>
		    <a class="list-group-item" href="#">ਪੰਜਾਬੀ</a>
		    <a class="list-group-item" href="#">ગુજરાતી</a>
		    <a class="list-group-item" href="#">ଓଡ଼ିଆ</a>
		    <a class="list-group-item" href="#">தமிழ்</a>
		    <a class="list-group-item" href="#">తెలుగు</a>
		    <a class="list-group-item" href="#">ಕನ್ನಡ</a>
		    <a class="list-group-item" href="#">മലയാളം</a>
		    <a class="list-group-item" href="#">සිංහල</a>
		    <a class="list-group-item" href="#">ภาษาไทย</a>
		    <a class="list-group-item" href="#">မြန်မာဘာသာ</a>
		    <a class="list-group-item" href="#">ភាសាខ្មែរ</a>
		    <a class="list-group-item" href="#">한국어</a>
		    <a class="list-group-item" href="#">中文(台灣)</a>
		    <a class="list-group-item" href="#">中文(简体)</a>
		    <a class="list-group-item" href="#">中文(香港)</a>
		    <a class="list-group-item" href="#">日本語</a>
		    <a class="list-group-item" href="#">日本語(関西)</a>
	    </div>
    </div>
</div>
<?php
$content = ob_get_clean();

$array = [
	"modal" => [
		"body" => $content,
		"class" => "col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1 col-lg-4 col-lg-offset-4"
	]
];

echo json_encode($array);