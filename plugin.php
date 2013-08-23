<?php

class KokenPiwikAnalytics extends KokenPlugin {

	function __construct()
	{
		$this->require_setup = true;
		$this->register_hook('before_closing_body', 'render');
	}

	function render()
	{

		echo <<<OUT
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(["trackPageView"]);
  _paq.push(["enableLinkTracking"]);

  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://{$this->data->tracking_url}/";
    _paq.push(["setTrackerUrl", u+"piwik.php"]);
    _paq.push(["setSiteId", "{$this->data->site_id}"]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
    g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><img src="http://{$this->data->tracking_url}/piwik.php?idsite={$this->data->site_id}&amp;rec=1" style="border:0" alt="" /></noscript>
<!-- End Piwik Code -->
OUT;

	}
}