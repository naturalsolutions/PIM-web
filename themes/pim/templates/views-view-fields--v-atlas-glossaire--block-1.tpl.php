<?php
// $Id$
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
/***************************************************************************/
/***************************************************************************/
/*                        VUE AFFICHE GLOSSAIRE                            */
/*                                                                         */
/***************************************************************************/
/*********************************  ****************************************/
/*********************************  ****************************************/
  global $base_url, $language;
?>

<?php foreach ($fields as $id => $field): ?>


<?php if ($id == 'field_book_glossaire_body_en_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $body_en = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_book_glossaire_title_en_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $title_en = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_book_glossaire_body_fr_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $body_fr = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_book_glossaire_title_fr_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $title_fr = $field->content; ?>
  <?php endif; ?>
<?php endif;?>


<?php endforeach; ?>



<?php if($language->language == 'fr'): ?>

  <h1><?php echo $title_fr; ?></h1>

  <?php echo $body_fr; ?>
  

<?php else: ?>
  <h1><?php echo $title_en; ?></h1>

  <?php echo $body_en; ?>

<?php endif; ?>

  <?php echo $edit_node; ?>