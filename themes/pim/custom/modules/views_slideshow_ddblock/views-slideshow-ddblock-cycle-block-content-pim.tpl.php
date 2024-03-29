<?php
// $Id$

/*!
 * Dynamic display block module template: pim - content template
 * Copyright (c) 2008 - 2010 P. Blaauw All rights reserved.
 * Version 1.2 (13-APR-2010)
 * Licenced under GPL license
 * http://www.gnu.org/licenses/gpl.html
 */

/**
 * @file
 * Dynamic display block module template: pim - content template
 *
 * Available variables:
 * - $settings['origin']: From which module comes the block.
 * - $settings['delta']: Block number of the block.
 *
 * - $settings['template']: template name
 * - $settings['output_type']: type of content
 *
 * - $views_slideshow_ddblock_slider_items: array with slidecontent
 * - $settings['slide_text_position']: of the text in the slider (top | right | bottom | left)
 * - $settings['slide_direction']: direction of the text in the slider (horizontal | vertical )
 * - 
 * - $views_slideshow_ddblock_pager_content: Themed pager content
 * - $settings['pager_position']: position of the pager (top | bottom)
 *
 * notes: don't change the ID names, they are used by the jQuery script.
 */
 
$settings = $views_slideshow_ddblock_slider_settings;
$pager_settings = $views_slideshow_ddblock_pager_settings;

//print "<pre>";  var_dump($views_slideshow_ddblock_pager_content);  print "</pre>";
//print "<pre>";  var_dump($settings);  print "</pre>";
//print "<pre>"; dsm(array_keys(get_defined_vars())); print "</pre>";
//print "<pre>";  var_dump($views_slideshow_ddblock_slider_items); print "</pre>";

// add Cascading style sheet
drupal_add_css($directory . '/custom/modules/views_slideshow_ddblock/' . $settings['template'] . '/views-slideshow-ddblock-cycle-' . $settings['template'] . '.css', 'template', 'all', FALSE);
?>
<!-- dynamic display block slideshow -->
<div id="views-slideshow-ddblock-<?php print $settings['delta'] ?>" class="views-slideshow-ddblock-cycle-<?php print $settings['template'] ?> clear-block">
 <div class="container clear-block border">
 
   
  <div class="container-inner clear-block border">
   <?php if ($settings['pager_position'] == "top") : ?>
    <!-- prev/next pager --> 
    <?php print $views_slideshow_ddblock_pager_content ?>
   <?php endif; ?>
   
   
   
   <!-- slider content -->
   <div class="slider clear-block border">
   
  
    <div class="slider-inner clear-block border">
    
    <!--pim left pager -->
  <?php if ($settings['pager_position'] == "left") : ?>
  <div class="custom-pager custom-pager-left clear-block">
    <div class="custom-pager-inner">
      <div class="custom-pager-item">
        <div class="custom-pager-item-inner"> 
          <a class="pager-link" title="navigate to topic" href="#">
          <? print $views_slideshow_ddblock_slider_items[0]["slide_title"]; ?>
          </a>
        </div>
     </div>
     <div class="custom-pager-item">
        <div class="custom-pager-item-inner"> 
          <a class="pager-link" title="navigate to topic" href="#">
          <? print $views_slideshow_ddblock_slider_items[1]["slide_title"]; ?>
          </a>
        </div>
     </div>     
    
     <div class="custom-pager-item">
        <div class="custom-pager-item-inner"> 
          <a class="pager-link" title="navigate to topic" href="#">
          <? print $views_slideshow_ddblock_slider_items[2]["slide_title"]; ?>
          </a>
        </div>
     </div>     
    
     <div class="custom-pager-item">
        <div class="custom-pager-item-inner"> 
          <a class="pager-link" title="navigate to topic" href="#">
          <? print $views_slideshow_ddblock_slider_items[3]["slide_title"]; ?>
          </a>
        </div>
     </div>     
    </div>
  </div>
  <?php endif; ?>
  <!-- end pim pager -->
  
     <?php if ($settings['output_type'] == 'view_fields') : ?>
      <?php foreach ($views_slideshow_ddblock_slider_items as $slider_item): ?>
       <div class="slide clear-block border">
        <div class="slide-inner clear-block border">
         <?php print $slider_item['slide_image']; ?>
         
         
         
         <?php if ($settings['slide_text'] == 1) :?>
          <div class="slide-text slide-text-<?php print $settings['slide_direction'] ?> slide-text-<?php print $settings['slide_text_position'] ?> clear-block border">
           <div class="slide-text-inner clear-block border">
            <?php if (!empty($slider_item['slide_title'])) :?>
             <div class="slide-title slide-title-<?php print $settings['slide_direction'] ?> clear-block border">
              <div class="slide-title-inner clear-block border">
               <h2><?php print $slider_item['slide_title']; print " "; print $slider_item['slide_soustitre']; ?></h2>
              </div> <!-- slide-title-inner-->
             </div>  <!-- slide-title-->
            <?php endif; ?>
            <?php if (!empty($slider_item['slide_text'])) :?>
             <div class="slide-body-<?php print $settings['slide_direction'] ?> clear-block border">
              <div class="slide-body-inner clear-block border">
               <?php print $slider_item['slide_text'] ?>
              </div> <!-- slide-body-inner-->
             </div>  <!-- slide-body-->
            <?php endif; ?>
            <!--pim date -->
            <?php if (!empty($slider_item['slide_date'])) :?>
             <div class="slide-date-<?php print $settings['slide_direction'] ?> clear-block border">
              <div class="slide-date-inner clear-block border">
               <?php print $slider_item['slide_date'] ?>
              </div> <!-- slide-body-inner-->
             </div>  <!-- slide-body-->
            <?php endif; ?>
            
            <?php if (!empty($slider_item['slide_read_more'])) :?>
             <div class="slide-read-more slide-read-more-<?php print $settings['slide_direction'] ?> clear-block border">
              <?php print $slider_item['slide_read_more'] ?>
             </div><!-- slide-read-more-->
            <?php endif; ?>
           </div> <!-- slide-text-inner-->
          </div>  <!-- slide-text-->
         <?php endif; ?>
        </div> <!-- slide-inner-->
       </div>  <!-- slide-->
      <?php endforeach; ?>
     <?php endif; ?>
    </div> <!-- slider-inner-->
   </div>  <!-- slider-->
   <?php if ($settings['pager_position'] == "bottom") : ?>
    <!-- prev/next pager --> 
    <?php print $views_slideshow_ddblock_pager_content ?>
   <?php endif; ?>
  </div> <!-- container-inner-->
 </div> <!--container-->
</div> <!--  template -->
