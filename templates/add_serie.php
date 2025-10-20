<?php require_once 'layout/header.phtml' ?>

<section class="add_serie">
    <form action="addSerie" method="post">
        <label for="title">Titulo:</label><br>
        <input type="text" name="title"><br>

        <label for="genre">Genero:</label>
        <select name="genre">
            <option value="comedy">Comedia</option>
            <option value="romance">Romance</option>
            <option value="action">Accion</option>
            <option value="horror">Terror</option>
        </select><br>

        <label for="synopsis">Sinopsis:</label>
        <input type="text" name="synopsis"><br>

        <label for="seasons">Temporadas:</label>
        <input type="number" name="seasons" min="1"><br>

        <label for="age_rating">Clasificacion:</label>
        <select name="age_rating">
            <option value="atp">ATP</option>
            <option value="13">+13</option>
            <option value="14">+14</option>
            <option value="16">+16</option>
            <option value="18">+18</option>
        </select><br>

        <label for="img">Portada</label>
        <input type="url" name="img"><br>

        <button type="submit">AGREGAR</button>
    </form>
</section>

<?php require_once 'layout/footer.phtml' ?>
