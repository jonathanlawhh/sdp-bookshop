<form action="search.php" method="GET">
    <div class="col s12">
      <div class="input-field col s10 m5 l4">
        <input placeholder="Harry potter" id="searchterm" type="text" class="validate" name="searchterm">
        <label for="searchterm">Use me to search</label>
      </div>
      <button type="submit" class="btn-floating btn-large waves-effect waves-light
      <?php if(isset($_SESSION['tpmb-userstatus']) && $_SESSION['tpmb-userstatus']==='admin'){
        echo 'deep-purple darken-3'; } else { echo 'red'; }?>">
        <i class="material-icons">search</i>
      </button>
    </div>
</form>
