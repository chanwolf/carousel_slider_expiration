# expired-post
Carousel Slider plugin that pulls users post and creates a slider with a default set expiration date of 6 months on the posts published date.

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
