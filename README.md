# expired-post
Carousel Slider plugin that pulls users post and creates a slider with a default set expiration date of 6 months on the posts published date.

### Pre-installation
1. Need to have **Insert Headers and Footers** plugin installed
2. Go to Wordpress **Settings -> Insert Headers and Footers**
3. Paste these script in to have the Owl Carousel Libraries:
```
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
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
