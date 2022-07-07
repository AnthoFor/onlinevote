<!-- modal event -->
<div id="modalConf">
    <div id="modalContent">
        <?=$drawCloseModal?>
        <div id="insideModal">
            <div>
            <?=!empty($whatModalShouldShow)?$whatModalShouldShow : '' ?>
            </div>
        </div>
    </div>
</div>
<script>
    modalConf.style.display = '<?=!empty($confHasToBeDraw)?$confHasToBeDraw:'none'?>';
</script>