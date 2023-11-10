<div class="form-filter">
        <form action="Action/ActionFilter.php" method="post">
            <label for="filterLetter">Filter by Letters</label>
            <select name="filterLetter" id="filterLetter">
                <option value="letter">Letter</option>
                <?php foreach($tabLetters as $tabLetter): ?>
                    <option value="<?php echo $tabLetter; ?>"><?php echo $tabLetter; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="filterAuthor">Filter by Author :</label>
            <select name="filterAuthor" id="filterAuthor">
                <option value="author">Author</option>
                <?php foreach($tabNameAuths as $tabNameAuth): ?>
                    <option value="<?php echo $tabNameAuth;?>"><?php echo $tabNameAuth;?></option>
                <?php endforeach; ?>
            </select>
            <label for="filterGenre">Filter by Genre :</label>
            <select name="filterGenre" id="filterGenre">
            <option value="genre">Genre</option>
            <?php sort($categorys); ?>
                <?php foreach($categorys as $category): ?>
                    <option value="<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="filterYear">Filter by Year :</label>
            <select name="filterYear" id="filterYear">
                <option value="year">Year</option>
                <?php foreach($dates as $date): ?>
                    <option value="<?php echo $date; ?>"><?php echo  $date; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="filterText">Recherche :</label>
            <input type="text" name="filterText" placeholder="Recherche">
            <input type="submit" value="Filter" name="filter">
        </form>
    </div>