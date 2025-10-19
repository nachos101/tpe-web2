<?= require_once 'layout/header.phtml'; ?>

<section class="add_serie">
    <form action="" method="post">
        <label for="title">Titulo:</label><br>
        <input type="text" name="title"><br>

        <label for="genre">Genero:</label>
        <select name="genre">
            <option value="comedy">Comedia</option>
            <option value="romance">Romance</option>
            <option value="action">Accion</option>
            <option value="horror">Terror</option>
        </select><br>

        <label for="synopsis">Sinopsis:</label><
        <input type="text" name="synopsis">

        <label for="age_rating">Clasificacion:</label>
        <select name="age_rating">
            <option value="atp">ATP</option>
            <option value="13">+13</option>
            <option value="14">+14</option>
            <option value="16">+16</option>
            <option value="18">+18</option>
        </select>

        <button type="submit">AGREGAR</button>
    </form>
</section>

<?= require_once 'layout/footer.phtml';?>
