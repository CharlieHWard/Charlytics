<?php
if ($CurrentUser->logged_in()) {
  $this->register_app('charlytics', 'Analytics', 5, 'Google Analytics Dashboard', '1.0', false);
  $this->require_version('charlytics', '2.2.7');
  $this->add_setting('charlytics_google_id', 'Google Analytics Client ID', 'text', '');
}
?>
