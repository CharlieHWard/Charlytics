Charlytics
==========

A Perch Widget to display google analytics within perch

Since oocharts is no longer working I needed a new way to bring an overview of analytics into perch, so this was cobbled together from a few different peoples work, mainly Paul Gregg  and his Spicy Analytics app/widget https://github.com/spicy-it/spicy_analytics and Cliver Walkers analytics widget https://github.com/clivewalker/cvw_googleanalytics

Instructions:

This requires you to have a google account along with an analytics account (obviously).

Download the zip folder, extract it, rename it to 'charlytics' and drop it into perch / addons / apps. You should see the Analytics tab appear in Perch once you reload it.

Next you need to create a Client ID with Googles developer console (https://console.developers.google.com/). Create a new project, name accordingly.

Onces its set up click 'API & AUTH' > 'APIs', then scroll down and enable Analytics API. Next hit 'CREDENTITALS' and create a new client ID. Select 'Web application'. Full in the options if you want. Hit save. 

In the next pop up, select 'Web application' again and add your websites addrress to the 'Authorized JavaScript origins' field.

You will now be able to see your client ID, copy this and go to PERCH. Go to settings and scroll to the bottom, you should see a Google Analytics Client ID field, paste your client ID here.

Go to the analytics tab and it should either begin to show you analytics (if you are signed into GA) or you might need to hit the 'ACCESS GOOGLE ANALYTICS' orange button. 
