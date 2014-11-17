<!-- Cobbled together by @charliehward -->

<?php
    # Side panel
	echo $HTML->side_panel_start();

	echo $HTML->para('This page gives you an overview of your Google Analytics data.');
	
	echo $HTML->side_panel_end();
	
	# Main panel
	echo $HTML->main_panel_start();
	
	include('_subnav.php');
	
	# Title panel
    echo $HTML->heading1('Google Analytics data for the last 30 days');
	echo $HTML->heading1('<div id="embed-api-auth-container"></div>');
    echo $HTML->heading1('For more detailed analytics please visit your Google Analytics account: <a href="#" target="blank">Overview</a>'); //Add a link to your google analytics account if you want
?>

<script>
(function(w,d,s,g,js,fs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
  js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
}(window,document,'script'));
</script>



<script>

gapi.analytics.ready(function() {

  /**
   * Authorize the user immediately if the user has already granted access.
   * If no access has been created, render an authorize button inside the
   * element with the ID "embed-api-auth-container".
   */
  gapi.analytics.auth.authorize({
    container: 'embed-api-auth-container',
    clientid: '<?php echo $Settings->get('charlytics_google_id')->settingValue(); ?>',
  });

	/**
   * Create a new ViewSelector instance to be rendered inside of an
   * element with the id "view-selector-container".
   */
  var viewSelector = new gapi.analytics.ViewSelector({
    container: 'view-selector-container'
  });

  // Render the view selector to the page.
  viewSelector.execute();


  /**
   * Create a new DataChart instance for pageviews over the past 7 days.
   * It will be rendered inside an element with the id "pageviews-container".
   *rename datachart to the appropriate number e.g. datachart1, datachart2 etc.
   */
  var dataChart1 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:date',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'sessions-container',
      type: 'LINE',
      options: {
        width: '100%'
      }
    }
  });

 /**
   * Create the DataChart for new vs returning visitors over the past 30 days.
   * It will be rendered inside an element with the id "visitors-container".
   *rename datachart to the appropriate number e.g. datachart1, datachart2 etc.
   */
  var dataChart2 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:userType',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'max-results': 5,
      sort: '-ga:sessions'
    },
    chart: {
      container: 'visitors-container',
      type: 'PIE',
      options: {
        width: '100%'
      }
    }
  });
  
   /**
   * Create the DataChart for visitors operating systems over the past 30 days.
   * It will be rendered inside an element with the id "os-container".
   *rename datachart to the appropriate number e.g. datachart1, datachart2 etc.
   */
  var dataChart3 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:pageviews,ga:uniquePageviews,ga:timeOnPage',
      dimensions: 'ga:pagePath',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'max-results': 10,
      sort: '-ga:pageviews'
    },
    chart: {
      container: 'top-content',
      type: 'TABLE',
      options: {
        width: '100%'
      }
    }
  });

  /**
   * Create the DataChart for top countries over the past 30 days.
   * It will be rendered inside an element with the id "countries-container".
   *rename datachart to the appropriate number e.g. datachart1, datachart2 etc.
   */
  var dataChart4 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:country',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'max-results': 5,
      sort: '-ga:sessions'
    },
    chart: {
      container: 'countries-container',
      type: 'PIE',
      options: {
        width: '100%'
      }
    }
  });
  
    /**
   * Create the DataChart for operating systems over the past 30 days.
   * It will be rendered inside an element with the id "os-container".
	*rename datachart to the appropriate number e.g. datachart1, datachart2 etc.
   */
  var dataChart5 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:browser,ga:browserVersion',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'max-results': 10,
      sort: '-ga:sessions'
    },
    chart: {
      container: 'os-container',
      type: 'TABLE',
      options: {
        width: '100%'
      }
    }
  });
  
    /**
   * Create the DataChart for devices over the past 30 days.
   * It will be rendered inside an element with the id "devices-container".
   *rename datachart to the appropriate number e.g. datachart1, datachart2 etc.
   */
  var dataChart6 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:mobileDeviceModel, ga:deviceCategory, ga:operatingSystem',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'max-results': 10,
      sort: '-ga:sessions'
    },
    chart: {
      container: 'devices-container',
      type: 'TABLE',
      options: {
        width: '100%'
      }
    }
  });

  /**
   * Render dataCharts on the page whenever a new view is selected.
   * add a new line per datachart and name accordingly.
   */
  viewSelector.on('change', function(ids) {
    dataChart1.set({query: {ids: ids}}).execute();
    dataChart2.set({query: {ids: ids}}).execute();
    dataChart3.set({query: {ids: ids}}).execute();
    dataChart4.set({query: {ids: ids}}).execute();
    dataChart5.set({query: {ids: ids}}).execute();
    dataChart6.set({query: {ids: ids}}).execute();
  });

});
</script>




<!------------------------- * ----------------------------->
<!------------------------- * ----------------------------->
<!------------------------- * ----------------------------->
<!------------------------- * ----------------------------->

<!--Charts and things go here-->
<div class="GAcharts">
	<div id="embed-api-auth-container"></div>

	<div class="chart">
		<p class="chart-title">Sessions</p>
		<div id="sessions-container"></div>
	</div>
	
	<div class="chart">
		<p class="chart-title">Top Content</p>
		<div id="top-content"></div>
	</div>

	<div class="chart">
		<p class="chart-title">New Vs Returning Visitors</p>
		<div id="visitors-container"></div>
	</div>

	<div class="chart">
		<p class="chart-title">Visiting Countries</p>
		<div id="countries-container"></div>
	</div>
	
	<div class="chart">
		<p class="chart-title">Operating System</p>
		<div id="os-container"></div>
	</div>
	
	<div class="chart">
		<p class="chart-title">Devices</p>
		<div id="devices-container"></div>
	</div>

	<div id="view-selector-container"></div>
</div>
<!------------------------- * ----------------------------->
<!------------------------- * ----------------------------->
<!------------------------- * ----------------------------->
<!------------------------- * ----------------------------->


<?php	
	echo $HTML->main_panel_end();
?>


<!-- Event bits from GA
addMetric 'ga:totalEvents', 'Total Events'
addMetric 'ga:uniqueEvents', 'Unique Events'
addMetric 'ga:eventValue', 'Event Value'
addMetric 'ga:avgEventValue', 'Average Event Value'
addMetric 'ga:visitsWithEvent', 'Visits With Event'
addMetric 'ga:eventsPerVisitWithEvent', 'Events Per Visit With Event'

addDimension 'ga:eventCategory', 'Event Category'
addDimension 'ga:eventAction', 'Event Action'
addDimension 'ga:eventLabel', 'Event Label'
-->
