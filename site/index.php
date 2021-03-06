<?php

    include_once("includes/header.inc");

?>

<?php
    if (!isLoggedIn()) {
?>
    <div id="whatisvlmbox" class="basic">
      <h1><?php echo getLocalizedString("homeofsailing"); ?></h1>
      <p><?php echo getLocalizedString("q1"); ?></p>
      <p><?php echo getLocalizedString("a1"); ?></p>

      <p><?php echo getLocalizedString("sh1"); ?>
      <a href="<?php echo DOC_SERVER_URL; ?>" target="_vlmwiki">
          <?php echo getLocalizedString("doc"); ?>
      </a>
      <?php echo getLocalizedString("sh2"); ?>
      <a href="<?php echo TOOLS_SERVER_URL; ?>" target="_outils">
      <?php echo getLocalizedString("tools"); ?>
      </a></p>

      <p><?php echo getLocalizedString("sh3"); ?>
      <a href="<?php echo FORUM_SERVER_URL; ?>" target="_forum"><?echo getLocalizedString("forum")?></a>
      <?php echo getLocalizedString("sh4"); ?>
            <a href="<?echo DOC_SERVER_URL.'Chat/'.getCurrentLang(); ?>" target="_vlmwiki"><?echo getLocalizedString("tchat"); ?></a> 
            </p>
    </div>
<?php
    } else {
        $users = new Users(getLoginId());
        if ( $users->engaged != 0 ) {
            $fullUsersObj = new fullUsers($users->idusers, $users);
            $fullUsersObj->displayAbandonDiv();
        }
    }
?>    

    <div id="oneoneonebox" class="basic">
      <h1 class="info"><?php echo getLocalizedString("one-one-one"); ?></h1>
    </div>

      <?php include "includes/raceslist.inc"; ?>

    <div id="time" class="basic">
      <?php
          lastUpdate();
      ?>
    </div>

    <div id="userstatsbox" class="basic">

<?php
    // Nombre d'inscrits sur VLM
    $querynbp = "SELECT count(*) as nbp FROM players where idplayers > 0";

    $resultnbp = mysqli_query( $GLOBALS['slavedblink'],$querynbp) or die("Query [$querynbp] failed \n");
    $row = mysqli_fetch_array($resultnbp, MYSQLI_ASSOC);

    printf( "<h4>" . getLocalizedString("nbplayers"), $row['nbp']);

    $querynbu = "SELECT count(*) as nbu FROM users where idusers >0";
    $resultnbu = mysqli_query( $GLOBALS['slavedblink'],$querynbu) or die("Query [$querynbu] failed \n");
    $row = mysqli_fetch_array($resultnbu, MYSQLI_ASSOC);

    printf( "&nbsp;" . getLocalizedString("nbboats"). "</h4>", $row['nbu']);

?>
    </div>
    
    <div id="joinvlmbox"  class="basic">
      <h1 class="info"><?php echo getLocalizedString("Join v-l-m.org, it's free !"); ?></h1>;
    </div>

<?php
    include_once("includes/footer.inc");
?>
