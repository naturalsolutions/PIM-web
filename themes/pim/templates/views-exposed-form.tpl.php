<?php
// $Id$
/**
 * @file views-exposed-form.tpl.php
 *
 * This template handles the layout of the views exposed filter form.
 *
 * Variables available:
 * - $widgets: An array of exposed form widgets. Each widget contains:
 * - $widget->label: The visible label to print. May be optional.
 * - $widget->operator: The operator for the widget. May be optional.
 * - $widget->widget: The widget itself.
 * - $button: The submit button for the form.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($q)): ?>
  <?php
    // This ensures that, if clean URLs are off, the 'q' is added first so that
    // it shows up first in the URL.
    print $q;
  ?>
<?php endif; ?>

<div class="views-exposed-form pim-exposed-filter">
  <div class="views-exposed-widgets clear-block">
    <?php foreach($widgets as $id => $widget): ?>
            
            
      <div class="views-exposed-widget" <?php if ($widget->id =='edit-field-bd-t-protection-value') print 'style="clear: both;"' ?>>
        <?php if (!empty($widget->label)): ?>
          <label for="<?php print $widget->id; ?>">
            <?php print t($widget->label); ?>
          </label>
        <?php endif; ?>
        <?php if (!empty($widget->operator)): ?>
        	<div>
		        <div class="views-operator" style="float: left;">
		          <?php print $widget->operator; ?>
		        </div>
		        <div class="views-widget" style="float: left;">
		        <?php print $widget->widget; ?>
		     		</div>
		     	</div>
        <?php else: ?>
        <div class="views-widget">
          <?php print $widget->widget; ?>
        </div>
        <?php endif; ?>
        
      </div>
    <?php endforeach; ?>
    <div class="views-exposed-widget" style="clear: both;">
      <?php print $button ?>
    </div>
  </div>
</div>

