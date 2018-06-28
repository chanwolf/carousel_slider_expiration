# expired-post
Carousel Slider plugin that pulls users post and creates a slider with a default set expiration date of 6 months on the posts published date.
### Installation 
```
SFTP Route (recommend FileZilla)
1. Download this repository and extract the .zip file
2. SFTP to your wordpress server
3. Navigate to /var/www/wordpress/wp-content/plugins
4. Copy the unziped file into the directory specified above
```
```
Wordpress Admin Page Installation 
1. Navigate into your Wordpress admin page
2. Select plugins on the left handside toolbar
3. Click Add New
4. Click Upload Plugin
5. Select the .zip file that you downloaded and hit install now
```
### Usage Explanation
1. To use this plugin have it activated in the Wordpress plugin. 
2. Have the Carousel Metabox enabled in posts (Screen Options -> Check the **Carousel Metabox** option)
3. Go to the page (or create a new page) where you want to place the carousel slider
4. Inside that page use the shortcode **[carousel_slider]** this will create a carousel slider for you and the default category is "News   Slider" and the default expiration time is 6 months

### Notes
To change the category and expiration time, input parameters to the shortcode with **quotes**. 

### How to Change Category Example:
```
[carousel_slider category="YOUR CATEGORY NAME"] 
```
### How to Change Expiration Date Example (4 months in example):
```
[carousel_slider expiration="4"] 
```

### Use them Together: 
```
[carousel_slider category="YOUR CATEGORY NAME" expiration="4"] 
```
