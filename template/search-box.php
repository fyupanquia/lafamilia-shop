<!-- search box -->
<div class="aa-search-box">
<form action="/index.php" method="GET">
    <input type="hidden" name="page" value="search">
    <input type="text" name="sentence" placeholder="Busca aquí 'gaseosa' " value="<?=$_GET["sentence"]?>">
    <button type="submit"><span class="fa fa-search"></span></button>
</form>
</div>
<!-- / search box -->  