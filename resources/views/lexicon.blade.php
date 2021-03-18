@include ('commons.header')

<div class="centent" style="
    width: 30%;
    margin: 7rem auto;">
    <h2>Ajouter un terme?</h2>
    <form action="/addword" style="display: flex; 
    flex-direction: column;" method="POST">
        @csrf
        <input type="text" name="word" placeholder="terme" required>
        <!-- <input type="text" name="categorie" placeholder="catégorie" required> -->
        <input type="text" name="definition" placeholder="définition" required>
        <button>Envoyer</button>
    </form>
    <a href="./php/views/list.php">Voir la liste des mots</a>
</div>
<table>
    <thead>
        <tr>
            <th colspan="1">Le mot</th>
            <th colspan="1">Sa définition</th>
        </tr>
    </thead>
    <tbody>
          <?php
          //foreach($listWDC as $element){
          
        //     echo"<tr><td>".$element['name'] ."</td>";
        //     echo"<td>".$element['content']."</td></tr>";
        //   }
          
           ?>
    </tbody>
</table>

@include ('commons.footer')