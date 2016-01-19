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
/*                   VUE AFFICHE FIELDS OF ILE                             */
/*                                                                         */
/***************************************************************************/
/*********************************  ****************************************/
/*********************************  ****************************************/
  global $base_url, $language;
?>

<?php foreach ($fields as $id => $field): ?>


<?php if ($id == 'title') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $title = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'nid') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $nid = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_connaiss_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $connaissances = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_interet_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $interet = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_pression_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $pression = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_gest_conserv_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $gestion = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_image_fid') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $url_picture = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_have_ss_bassin_nid') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $have_ss_bassin = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_have_cluster_nid') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $have_ss_cluster = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_biblio_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $biblio = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_autor_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $author = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_tab_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $tab = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_desc_gen_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $descGen = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_code_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $code_ile = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'field_ile_id_ss_bassin_value') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $idSousBassinParent = $field->content; ?>
  <?php endif; ?>
<?php endif;?>

<?php if ($id == 'tid') : ?>
  <?php if (!empty($field->content)): ?>
    <?php $tid = $field->content; ?>
  <?php endif; ?>
<?php endif;?>


<?php endforeach; ?>

<?php //echo $code_ile; ?>
<?php //echo $tid; ?>


<?php if($language->language == 'fr'): ?>

  <a class='titleIsland' title='Editer' href="<?php echo $base_url; ?>/node/<?php echo $nid; ?>/edit"><h1><?php echo $title; ?></h1></a>
  <br/>Rédigé par : <i><?php echo $author; ?></i>

  <br/>
  <br/>
  <?php if($url_picture): ?>

    <div>
      <?php echo $url_picture; ?>
    </div>
    
  <?php endif; ?>
  <br/>
  
  <?php if($tid != ''): ?>
  
    <!-- lien vers la fiche ile -->
    <?php echo  "<a class='linkToFicheIle' href=".$base_url."/fiche-Ile/".$code_ile.">Modifier les valeurs des tableaux pour cette île.</a>"; ?>

    <!-- Status description physique -->
    <?php print views_embed_view('v_atlas_tab_data_ile', 'block_1', $tid); ?>
    
    <!-- Status de propriete fonciere -->
    <TABLE class='tableRecapIle'>
      <?php print views_embed_view('v_atlas_tab_data_ile', 'block_2', $tid); ?>
    </TABLE>

    <!-- Status de protection internationnal-->
    <br/>
    <TABLE class='tableRecapIle'>
      <TR>
        <td></td>
        <td>Nom</td>
        <td>Année</td>
        <td>Zone concernée</td>        
      </TR>
        <?php print views_embed_view('v_atlas_tab_data_ile', 'block_3', $tid); ?>
    </TABLE>
    

    <!-- Status de protection nationnal-->
    <br/>
    <TABLE class='tableRecapIleN'>
      <TR>
        <td></td>
        <td>Nom</td>
        <td>Année</td>
        <td>Zone concernée</td>        
      </TR>
        <?php print views_embed_view('v_atlas_tab_data_ile', 'block_5', $tid); ?>
    </TABLE>
    <br/>
    <!-- AUCUN STATUT 
    <br/>
    <TABLE class='tableRecapIleA'>
      <TR>
        <td></td>
        <td>Nom</td>
        <td>Année</td>
        <td>Zone concernée</td>        
      </TR>
        <?php //print views_embed_view('v_atlas_tab_data_ile', 'block_6', $tid); ?>
    </TABLE>-->
    
       
    <!-- Status de Gestion -->
    <?php $countNbTotalItem = views_get_view_result('v_atlas_tab_data_ile', 'block_4', $tid); ?>
    <?php if(!(empty($countNbTotalItem[0]))): ?>
    <table class='tableRecapIle'>
      <TR>
        <td></td>
        <td>Nom du gestionnaire</td>
        <td>Année de début de gestion</td>
        <td>Type d'accord</td>
      </TR>
      <?php print views_embed_view('v_atlas_tab_data_ile', 'block_4', $tid); ?> 
      
    </table>
    <br/>
    <?php endif; ?>
    
  <?php endif; ?>

  <?php echo $tab; ?>

  <div class='responsableBloc'>
    <h2>Responsable(s) :</h2>
    <?php $nodeOfSousBassinParent = node_load($idSousBassinParent, $revision = NULL, $reset = NULL);  ?>
    <?php 
    //On récupere un tableau d'uid des utilisateur enregsitré dans le champs "field_ss_bassin_responsable"
    $arrayOfUidOfResponsable = $nodeOfSousBassinParent->field_ss_bassin_responsable;


    //Parcour des uid
    foreach ($arrayOfUidOfResponsable as $value){
        
      //Charge l'utilisateur concerné
      $userCourant = user_load( $value['uid'] );

      //Concaténation des mails des responsables
      $allName .= "<a href=$base_url/user/$value[uid]>".$userCourant->name.'</a><br/>';

    }

    //Nettoyage de la string
    $allName = trim($allName, ",");
    echo $allName;
    ?>
  </div>

  <h3> Description générale</h3>

  <?php echo $descGen; ?>

  <?php 
  
  //Get termName
  $termName = $code_ile;     

  //État des connaissances                
  //Bota
 /* $sql = "select b.niveau from picto_etaco_bota b where code_ile = '".$termName."'";           
  $result = db_query($sql);
  $result = db_fetch_array($result); 
  $etatBota = $result['niveau'];
  echo 'Bota : '.$result['niveau']."<br/>";   */ 

/*  //Ornithologie
  $sql = "select b.niveau from picto_etaco_ornitho b where code_ile = '".$termName."'";           
  $result = db_query($sql);
  $result = db_fetch_array($result);             
  $etatOrni = $result['niveau'];
  echo 'Ornithologie : '.$result['niveau']."<br/>";        

  //Herpétologie
  $sql = "select b.niveau from picto_etaco_herpeto b where code_ile = '".$termName."'";           
  $result = db_query($sql);
  $result = db_fetch_array($result);
  $etatHerpe = $result['niveau'];
  echo 'Herpétologie : '.$result['niveau']."<br/>";    

  //Mammifères
  $sql = "select b.niveau from picto_etaco_mamm b where code_ile = '".$termName."'";           
  $result = db_query($sql);
  $result = db_fetch_array($result);             
  $etatMami = $result['niveau'];
  echo 'Mammifères : '.$result['niveau']."<br/>";    

  //Chiroptères
  $sql = "select b.niveau from picto_etaco_chiro b where code_ile = '".$termName."'";           
  $result = db_query($sql);
  $result = db_fetch_array($result);             
  $etatChiro = $result['niveau'];
  echo 'Chiroptères : '.$result['niveau']."<br/>";    
              
  //Invertébrés
  $sql = "select b.niveau from picto_etaco_invert b where code_ile = '".$termName."'";           
  $result = db_query($sql);
  $result = db_fetch_array($result);             
  $etatInvert = $result['niveau'];
  echo 'Invertébrés : '.$result['niveau']."<br/>";  */
    
  //On enregistre tous les chemins de pictos en fonction du type de picto (bota, ornito ...) et de son genre (connaissance, intérêt, pression...)
  /*$sql = "SELECT d.filepath, c.field_book_value_picto_connaiss_value FROM drp_files d LEFT JOIN drp_content_type_book_les_pictos_connaissances c ON c.field_book_picto_connaissance_fid = d.fid LEFT JOIN drp_node n ON n.vid = c.vid LEFT JOIN drp_term_data t ON t.tid = c.field_book_value_picto_connaiss_value WHERE n.type = 'book_les_pictos_connaissances' AND t.name = 'Botanique';";  
  $result = db_query($sql);
  while (  $row  =  db_fetch_array($result) ) $rowsBota[$row['field_book_value_picto_connaiss_value']] = $row['filepath'];*/

  //On enregistre tous les chemins de pictos en fonction du type de picto (bota, ornito ...) et de son genre (connaissance, intérêt, pression...)
/*  $sql = "SELECT d.filepath, c.field_book_picto_valeur_value FROM drp_files d LEFT JOIN drp_content_type_book_les_pictos_connaissances c ON c.field_book_picto_connaissance_fid = d.fid LEFT JOIN drp_node n ON n.vid = c.vid LEFT JOIN drp_term_data t ON t.tid = c.field_book_picto_connaiss_bota_value WHERE n.type = 'book_les_pictos_connaissances' AND t.name = 'Invertébrés';";  
  $result = db_query($sql);
  while (  $row  =  db_fetch_array($result) ) $rowsInvert[$row['field_book_picto_valeur_value']] = $row['filepath'];*/

  //On stock le bon picto en fonction de la valeur
  /*$urlOfPictoBotaToDisplay = $rowsBota[$etatBota];*/
  /*$urlOfPictoInvertToDisplay = $rowsInvert[$etatInvert];*/

  
  /*$urlOfPictoOrniToDisplay = $pathBota[$etatOrni];
  $urlOfPictoHerpeToDisplay = $pathBota[$etatHerpe];
  $urlOfPictoMamiToDisplay = $pathBota[$etatMami];
  $urlOfPictoChiroToDisplay = $pathBota[$etatChiro];*/
  
  

  ?>

  <h4>Connaissances :</h4> 
  
  <!-- <div class="onePicto bota <?php echo $etatBota; ?>"><?php echo "<img src='$base_url/$urlOfPictoBotaToDisplay' alt='' title='' />"; ?></div> -->
  <!-- <div class="onePicto invert <?php echo $etatBota; ?>"><?php echo "<img src='$base_url/$urlOfPictoInvertToDisplay' alt='' title='' />"; ?></div> -->
  
  <!--
  <div class="onePicto orni <?php echo $etatBota; ?>"><?php echo "<img src='$base_url/$urlOfPictoOrniToDisplay' alt='' title='' />"; ?></div>
  <div class="onePicto herpe <?php echo $etatBota; ?>"><?php echo "<img src='$base_url/$urlOfPictoHerpeToDisplay' alt='' title='' />"; ?></div>
  <div class="onePicto mammi <?php echo $etatBota; ?>"><?php echo "<img src='$base_url/$urlOfPictoMamiToDisplay' alt='' title='' />"; ?></div>
  <div class="onePicto chirop <?php echo $etatBota; ?>"><?php echo "<img src='$base_url/$urlOfPictoChiroToDisplay' alt='' title='' />"; ?></div>
     -->

  <?php echo $connaissances; ?>

  <h4>Intérêts :</h4>
  <?php echo $interet; ?>
    
  <h4>Pressions :</h4>
  <?php echo $pression; ?>

  <h4>Gestion / conservation :</h4>
  <?php echo $gestion; ?>
    

  <h3>Principales ressources bibliographiques :</h3>
  <div class='indentRight1'>
    
    <?php echo $biblio; ?>
    
  </div>

<?php else: ?>

  <a class='titleIsland' title='Edit' href="<?php echo $base_url; ?>/node/<?php echo $nid; ?>/edit"><h1><?php echo $title; ?></h1></a>
  <br/>Written by: <i><?php echo $author; ?></i>

  <br/>
  <br/>
  <?php if($url_picture): ?>

    <div>
      <?php echo $url_picture; ?>
    </div>
    
  <?php endif; ?>
  <br/>

  <!-- lien vers la fiche ile -->
  <?php echo  "<a class='linkToFicheIle' href=".$base_url."/fiche-Ile/".$code_ile.">Island sheet</a>"; ?>

  <?php if($tid != ''): ?>
    <!-- Status description physique -->
    <?php print views_embed_view('v_atlas_tab_data_ile', 'block_1', $tid); ?>
    
    <!-- Status de propriete fonciere -->
    <TABLE class='tableRecapIle'>
      <?php print views_embed_view('v_atlas_tab_data_ile', 'block_2', $tid); ?>
    </TABLE>

    <!-- Status de protection internationnal-->
    <br/>
    <TABLE class='tableRecapIle'>
      <TR>
        <td></td>
        <td>Nom</td>
        <td>Année</td>
        <td>Zone concernée</td>        
      </TR>
        <?php print views_embed_view('v_atlas_tab_data_ile', 'block_3', $tid); ?>
    </TABLE>
    

    <!-- Status de protection nationnal-->
    <br/>
    <TABLE class='tableRecapIleN'>
      <TR>
        <td></td>
        <td>Nom</td>
        <td>Année</td>
        <td>Zone concernée</td>        
      </TR>
        <?php print views_embed_view('v_atlas_tab_data_ile', 'block_5', $tid); ?>
    </TABLE>
    
       
    <!-- Status de Gestion -->
    <?php $countNbTotalItem = views_get_view_result('v_atlas_tab_data_ile', 'block_4', $tid); ?>
    <?php if(!(empty($countNbTotalItem[0]))): ?>
    <table class='tableRecapIle'>
      <TR>
        <td></td>
        <td>Nom du gestionnaire</td>
        <td>Année de début de gestion</td>
        <td>Type d'accord</td>
      </TR>
      <?php print views_embed_view('v_atlas_tab_data_ile', 'block_4', $tid); ?> 
      
    </table>
    <br/>
    <?php endif; ?>
    
  <?php endif; ?>

  <?php echo $tab; ?>

  <div class='responsableBloc'>
    <h2>Responsable(s) :</h2>
    <?php $nodeOfSousBassinParent = node_load($idSousBassinParent, $revision = NULL, $reset = NULL);  ?>
    <?php 
    //On récupere un tableau d'uid des utilisateur enregsitré dans le champs "field_ss_bassin_responsable"
    $arrayOfUidOfResponsable = $nodeOfSousBassinParent->field_ss_bassin_responsable;


    //Parcour des uid
    foreach ($arrayOfUidOfResponsable as $value){
        
      //Charge l'utilisateur concerné
      $userCourant = user_load( $value['uid'] );

      //Concaténation des mails des responsables
      $allName .= "<a href=$base_url/user/$value[uid]>".$userCourant->name.'</a><br/>';

    }

    //Nettoyage de la string
    $allName = trim($allName, ",");
    echo $allName;
    ?>
  </div>

  <h3>General description</h3>

  <?php echo $descGen; ?>

  <h4>State of knowledge:</h4>

  <?php echo $connaissances; ?>

  <h4>Interest:</h4>
  <?php echo $interet; ?>
    
  <h4>Pressure and threats:</h4>
  <?php echo $pression; ?>

  <h4>Managment / Conservation:</h4>
  <?php echo $gestion; ?>
    

  <h3>Main bibliographic references:</h3>
  <div class='indentRight1'>
    
    <?php echo $biblio; ?>
    
  </div>

<?php endif; ?>