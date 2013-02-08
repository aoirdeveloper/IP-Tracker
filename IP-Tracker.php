<html>
<!-- GNU GPL v3.0 License

AOIR IP Tracker : Developed by AOIR Developer (Mumbai)
  Shivam Vahia (AOIR Manager) Developed by AOIR Developer

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; version 2
of the License.

Rights:
A. You are free to distrubute this program in any forms without any
prior permission from the developer. But you need to attach this license
to every edited or modified file

B. You may copy and distribute verbatim copies of the Program's source code 
as you receive it, in any medium, provided that you conspicuously and 
appropriately publish on each copy an appropriate copyright notice and 
disclaimer of warranty

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to AOIR Developer

@ info@aoir.co.in

For more details log onto
www.aoir.co.in --!>
</html>


<?php
// PHP is stupid
function startsWith($haystack, $needle) {
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

ini_set('display_errors', 'On');
error_reporting(E_ALL);

function html_response() {
    header('Content-type: text/html; charset=UTF-8');
    ?>
<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-20805386-1']);
      _gaq.push(['_setDomainName', 'none']);
      _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
</head>
<body lang=en>
    <!-- User Agent: "<?= $_SERVER['HTTP_USER_AGENT'] ?>" -->
    <code id="address"><?= $_SERVER['REMOTE_ADDR'] ?></code>
</body>
</html>
<?php
}

function plain_response() {
    header('Content-type: text/plain; charset=UTF-8');

    echo $_SERVER['REMOTE_ADDR'] . "\n";
}


$agent = $_SERVER['HTTP_USER_AGENT'];

$html = True;
if (startswith($agent, 'curl/')) {
    $html = False;
} else if (startswith($agent, 'Wget/')) {
    $html = False;
}

if ($html) {
    html_response();
} else {
    plain_response();
}

?>
