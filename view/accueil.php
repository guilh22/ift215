<h1>Forum</h1>
<table class="forum" cellpadding="0" cellspacing="0" border="1">
    <tr>
        <th>Sujet</th>
        <th>Nombre de discussion</th>
    </tr>
    <?
        $c = 0;
        foreach($data as $k => $v){
        ?>
    <tr class="<?php echo ($c == 1)? "turn":"";$c = ($c == 1)? 0:1; ?>">
        <td><a href="?page=forum&sujet=<?php echo str_replace(" ","_",$k); ?>"><?php echo $k;?></a></td>
        <td><?php echo count($v);?></td>
    </tr>
    <?php } ?>
</table>
