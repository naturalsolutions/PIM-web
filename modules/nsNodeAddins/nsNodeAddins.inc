<?php

function clean_textfield($value) {
  /* suppression des balises html */
  $value = preg_replace("/<\/?[^<>]+>/", "", $value);
  //$value = preg_replace("/&.{3,5};/", "", $value);
  $value = clean_weirdchars($value);
  return trim($value);
}

function clean_htmlfield($value) {
  
  $value = preg_replace('/\\\r/', "", $value);
  $value = preg_replace('/\\\n/', "", $value);
  $value = preg_replace('/<!--(.|\s)*?-->/', "", $value);
  
  //$value = preg_replace('<\/? ?style>[^<>]*>', "", $value);
  /* suppression des balises html non support�es */
  /* $balises = "/<\/? ?(^(p|span|br|a|em|u|strong|cite|ul|ol|li|dl|dt|dd|blockquote))[^<>]?>/";*/
  $balises = '/<\/*?(?!(p|span|br|a|em|u|strong|cite|ul|ol|li|dl|dt|dd|blockquote))[^<>]*>/';
  //drupal_set_message(check_markup(preg_replace($balises, "", $value)));
  
  //$value = preg_replace('/<p class="MsoNormal">(.|\s)*?</p>/', "", $value);
  
  return $value;
}

function clean_exturlfield($value) {
  global $base_url;
  
  $base_url2 = str_replace("http://", "", $base_url);
  
  /* suppression des balises html */
  $value = preg_replace("/<\/?[^<>]+>/", "", $value);
  /* refuse internal url */
  if (strpos($value, $base_url) !== False) {
    return "";
  }
  if (strpos($value, $base_url2) !== False) {
    return "";
  }
  $url = preg_replace('%.*://%', "", $value);
  $url_parts = explode('/', $url);
  if (strpos($url_parts[0], ".") == FALSE) {
    return "";
  }
  /* check_url use url encoding and should be used for display only (in template) */
  return $value;
}


function clean_weirdchars($value) {
  /* quote */
  $value = preg_replace( "/\xe2\x80\x99/", "'", $value);
  
  /* croix extinction */
  $value = preg_replace( "/\xe2\x80\xa0/", "", $value);
  
  /* weird espace */
  $value = preg_replace( "/\xc2\xa0/", " ", $value);
  
  /* weird fin de string */
  //$value = preg_replace( "/[\xa0\xc2]/", "", $value);
  $value = preg_replace( "/\xa0$/", "", $value);
  $value = preg_replace( "/[\xef\xbf\xbd]/", "", $value);
  
  /* standard invisible chars */
  //$value = preg_replace( '/[\x00-\x1f\x7f-\x97]/', "", $value);
  
  /*Capitales accentu�es ������ */
  //$value = preg_replace( "/[������]/", "A", $value);
  //$value = preg_replace( "/[����]/", "E", $value);
  //$value = preg_replace( "/[����]/", "I", $value);
  //$value = preg_replace( "/[�����]/", "O", $value);
  //$value = preg_replace( "/[����]/", "U", $value);
  //$value = preg_replace( "/[�]/", "Y", $value);
  //$value = preg_replace( "/[�]/", "C", $value);
  //$value = preg_replace( "/[�]/", "N", $value);
  /* guillemets */
  /* � */
  $value = preg_replace( "/\xc2\xab/", '"', $value);
  /* � */
  $value = preg_replace( "/\xc2\xbb/", '"', $value);
  //drupal_set_message("8: ".$value);
  
  return $value;
}

function nsNodeAddins_bd_i_description_physique_submit($form, &$form_state) {
  $form_state['values']['field_bdi_dp_autres_noms_calcules'] = array(array('value' => $form_state['values']['field_bdi_dp_noms']));
}

function nsNodeAddins_update_synonyms_after_save($node) {
  // Obtain the term id for the island code
  $tid = $node->field_bdi_dp_nom_ile_code_ile[0]['value'];

  // Read synonyms form user input
  $form_syns = array_map('trim', explode(',', $node->field_bdi_dp_autres_noms_calcules[0]['value']));

  // Clean-up old synonyms
  db_query('DELETE FROM {term_synonym} WHERE tid = %d', $tid);

  // Add synonyms from form
  foreach ($form_syns as $term) {
    db_query('INSERT INTO {term_synonym} (tid, name) VALUES (%d, \'%s\')', $tid, $term);
  }
}
