<?php require_once 'layout/header.phtml'; ?>

<section class="edit_serie">
    <form action="editSerie/<?= $s->id_serie ?>" method="post">
        <label for="title">Titulo:</label>
        <input type="text" name="title" value="<?= $s->titulo ?>">

        <label for="genre">Genero:</label>
        <select name="genre">
            <option value="">Seleccionar</option>
            <option value="comedy">Comedia</option>
            <option value="romance">Romance</option>
            <option value="action">Accion</option>
            <option value="horror">Terror</option>
        </select></br>

        <label for="synopsis">Sinopsis:</label>
        <input type="text" name="synopsis" value= "<?= $s->sinopsis ?>">

        <label for="seasons">Temporadas:</label>
        <input type="number" name="seasons" min="1" value = "<?= $s->cant_temporadas ?>">

        <label for="age_rating">Clasificacion:</label>
        <select name="age_rating">
            <option value="">Seleccionar</option>
            <option value="atp">ATP</option>
            <option value="13">+13</option>
            <option value="14">+14</option>
            <option value="16">+16</option>
            <option value="18">+18</option>
        </select>

        <label for="img">Portada</label>

        <input type="url" name="img" value="<?= $s->img ?>">

        <button type="submit">GUARDAR</button>
    </form>
        <a href="list_series">CANCELAR</a>
</section>
<?php require_once 'layout/footer.phtml';?>
