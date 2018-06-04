# housing-project-2018
Nazim's housing project

URL: http://student30008.bucomputing.uk/housing_project_2018/index.html

Instructions:

Using the website is simple go to any council page and then select your desired information from the left hand side 

Mainstream media: Prints out JSON files for guardian articles with keywords 'regeneration' + the council name

All available JSON: Prints out all avaliable JSON files just keep scrolling this till it's unable to retrieve anymore

Pre-plan + design and planning: Keep scrolling to keep making requests, to check how many JSON files are in the council you need to go to the script
get the URL that feeds into the $json value and enter this URL into a browser. You need a JSON formatter installed and right at the end of the page 
it'll give you a total JSON. To find out what record the script is searching you need to go to browser and open dev console and then check 'networks' 
then as you scroll you'll see curl scripts click on them to see the 'end' value and you'll see what record it is on.


TO-DO

Top priority is to find the councils with APIs, check if they are potential regeneration info and then integrate them to the site. 

Find a way to show how many JSON files a council has to the user. Find a way to show what JSON record the curl script is searching to the user. 

Not sure what the plan is for councils without API, maybe resort back to creating a database backend for their documents. 

Add login system 

Add search feature 

Add mailing server 

Maybe format the upload section so it is more visually pleasing




